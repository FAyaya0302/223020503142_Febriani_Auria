<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        //get all posts from Models
        $posts = Post::latest();

        // if(isset($request->search)){
        //     $posts = $posts->whereLike($request->search);
        // }

        $posts = $posts->paginate(5);

        //return view with data
        return view('buku.index', compact('posts'));
    }

    public function create(): View
    {
        return view('buku.create');
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
            'kategori' => 'required',
            'status' => 'required',
        ]);

        //upload image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = strval(time()) . $file->getClientOriginalName();
            $path = "assets/foto_produk/";
            $fullPath = $path . $name;

            $file->move($path, $name);
        }

        //create product
        Post::create([
            'image' => $fullPath,
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'kategori' => $request->kategori,
            'status' => $request->status
        ]);

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        //get product by ID
        $posts = Post::findOrFail($id);

        //render view with product
        return view('buku.show', compact('posts'));
    }

    public function edit(string $id): View
    {
        //get product by ID
        $posts = Post::findOrFail($id);

        //render view with product
        return view('buku.edit', compact('posts'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|min:1',
            'content' => 'required|min:1',
            'author' => 'required|min:2',
            'kategori' => 'required|min:2',
            'status' => 'required|',
        ]);

        //get product by ID
        $posts = Post::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $file = $request->file('image');
            $name = strval(time()) . $file->getClientOriginalName();
            $path = "assets/foto_produk/";
            $fullPath = $path . $name;

            $file->move($path, $name);

            //delete old image                        
            File::delete($posts->image);

            //update product with new image
            $posts->update([
                'image' => $fullPath,
                'title' => $request->title,
                'content' => $request->content,
                'author' => $request->author,
                'kategori' => $request->kategori,
                'status' => $request->status
            ]);
        } else {

            //update product without image
            $posts->update([
                'title' => $request->title,
                'content' => $request->content,
                'author' => $request->author,
                'kategori' => $request->kategori,
                'status' => $request->status
            ]);
        }

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $posts = Post::findOrFail($id);

        //delete image
        File::delete($posts->image);

        //delete product
        $posts->delete();

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    // app/Http/Controllers/PostController.php
    public function search(Request $request)
    {
        $query = $request->get('title');
        // dd($query);
        $posts = Post::where('title', 'LIKE', "%{$query}%")->paginate(10);
        return view('buku.search', compact('posts', 'query'))->render();
    }


    // Method untuk menangani perubahan status
    public function toggleStatus(Request $request)
    {
        
        $postId = $request->post_id;
        $status = $request->status;
        
        $post = Post::find($postId);
        if (!$post) {
            return response()->json(['success' => false]);
        }

        // dd($post);
        
        
        // Perubahan status berdasarkan nilai yang diterima dari frontend
        $post->status = $status == 'Tersedia' ? 'Tersedia' : 'Dipinjam';
        // return response()->json(['success' => true, 'post' => $post->status]);
        $post->save();
        return response()->json(['success' => true]);

    }


    public function updateStatusInIndex()
    {
        $posts = Post::latest();

        // if(isset($request->search)){
        //     $posts = $posts->whereLike($request->search);
        // }

        $posts = $posts->paginate(5);
        // return response()->json(['success' => true]);


        return view('buku.index', compact('posts'));
    }


}