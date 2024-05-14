<!-- resources/views/buku/search.blade.php -->
@forelse ($posts as $post)
    <tr>
        <td class="text-center">
            <img src="{{ asset($post->image) }}" class="rounded" style="width: 150px">
        </td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->author }}</td>
        <td>{{ $post->content }}</td>
        <td>{{ $post->kategori }}</td>
        <td>{{ $post->status }}</td>
        <td class="text-center">
            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
            </form>
        </td>
    </tr>
@empty
    <div class="alert alert-danger">
        Data Products dengan judul "{{ $query }}" tidak ditemukan.
    </div>
@endforelse
