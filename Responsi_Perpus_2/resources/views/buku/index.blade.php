<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Products - SantriKoding.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body style="background: lightgray">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top bg-light navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img id="MDB-logo" src="https://mdbcdn.b-cdn.net/wp-content/uploads/2018/06/logo-mdb-jquery-small.png"
                 alt="MDB Logo" draggable="false" height="30"/>
        </a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link mx-2" href="{{ route('admins.index') }}"><i
                            class="fas fa-plus-circle pe-2"></i>ADMIN</a>
                </li>
                <li class="nav-item ms-3">
                    <a class="btn btn-black btn-rounded" href="{{ route('dashboard.index') }}">DASHBOARD</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ route('posts.create') }}" class="btn btn-md btn-success mb-3">ADD PRODUCT</a>
                    <table class="table table-bordered">

                    {{--  search  --}}
                        <thead>
                        <input type="text" id="search" class="form-control mb-3" placeholder="Search by title...">
                        <tr>
                    {{--  end search  --}}

                            <th scope="col">IMAGE</th>
                            <th scope="col">TITLE</th>
                            <th scope="col">AUTHOR</th>
                            <th scope="col">DESKRIPSI</th>
                            <th scope="col">KATEGORI</th>
                            <th scope="col">STATUS</th>
                            <th scope="col" style="width: 23%">ACTIONS</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse ($posts as $post)
                            <tr>
                                <td class="text-center">
                                    <img src="{{ asset($post->image) }}" class="rounded"
                                    style="width: 150px">

                                </td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->author }}</td>
                                <td>{{ $post->content }}</td>
                                <td>{{ $post->kategori }}</td>
                                <td>

                          {{--  kode untuk mengaktifkan toggel status untuk data buku  --}}
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input status-toggle"
                                               data-post-id="{{ $post->id }}"
                                               data-status="{{ $post->status == 'Tersedia' ? '1' : '0' }}"
                                               {{ $post->status == 'Tersedia' ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ $post->status }}</label>
                                    </div>
                                </td>
                     {{--  end toggell  --}}

                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                          action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        <a href="{{ route('posts.show', $post->id) }}"
                                           class="btn btn-sm btn-dark">SHOW</a>
                                        <a href="{{ route('posts.edit', $post->id) }}"
                                           class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    <div class="alert alert-danger">
                                        Data Products belum Tersedia.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


{{--  kode untuk mengaktifkan ajax  --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

    {{--  search ajax  --}}
    $(function () {
        $('#search').on('keyup', function () {
            var query = $(this).val();
            console.log(query);
            $.ajax({
                url: "{{ route('postsSearch') }}",
                type: "GET",
                data: {'title': query},
                success: function (data) {
                    $('tbody').html(data);
                }
            });
        });
    });
     {{--  end ajax  --}}



    //message with sweetalert
    @if(session('success'))
        Swal.fire({
            icon: "success",
            title: "BERHASIL",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @elseif(session('error'))
        Swal.fire({
            icon: "error",
            title: "GAGAL!",
            text: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @endif
    // end message with sweetalert



 {{--  kode untuk mengaktifkan toggel status untuk data buku kode ajax jqury  --}}
    $(document).ready(function () {
        // Fungsi untuk menampilkan pesan status terpinjam dan tersedia
        function showStatusMessage(status) {
            Swal.fire({
                icon: status == 'Tersedia' ? 'success' : 'warning',
                title: status == 'Tersedia' ? 'Produk Tersedia' : 'Produk Terpinjam',
                text: status == 'Tersedia' ? 'Produk telah diubah menjadi tersedia.' : 'Produk telah diubah menjadi terpinjam.',
                position: 'top-end', // Perbaikan: gunakan koma, bukan titik koma
                showConfirmButton: false,
                timer: 5000
            });
        }

        $('.status-toggle').change(function () {
            var postId = $(this).data('post-id');
            var newStatus = $(this).prop('checked') ? 'Tersedia' : 'Terpinjam';

            console.log(postId, newStatus);

            $.ajax({
                url: "{{ route('toggleStatus') }}",
                type: "POST",
                data: {
                    '_token': '{{ csrf_token() }}',
                    'post_id': postId,
                    'status': newStatus
                },
                success: function (response) {
                    // console.log(response);
                    if (response.success) {
                        // Update label status
                        $('.status-toggle[data-post-id="' + postId + '"]').next('.form-check-label').text(newStatus);

                        // Tampilkan pesan status terpinjam atau tersedia
                        showStatusMessage(newStatus);

                        // Perbarui status di bagian index secara otomatis
                        updateStatusInIndex();
                    } else {
                        // Handle error jika diperlukan
                    }
                },
                error: function (xhr, status, error) {
                    // Handle error jika diperlukan
                }
            });
        });


        // Fungsi untuk mengupdate status di bagian index secara otomatis

        function updateStatusInIndex() {
            $.ajax({
                url: "{{ route('updateStatusInIndex') }}",
                type: "GET",
                success: function (data) {
                    console.log(data);
                    // $('tbody').html(data);
                },
                error: function (xhr, status, error) {
                    // Handle error jika diperlukan
                }
            });
        }
    });

    // end toggell

</script>

</body>
</html>
