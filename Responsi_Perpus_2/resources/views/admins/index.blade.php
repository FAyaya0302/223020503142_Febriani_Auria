<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Admins - SantriKoding.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Kelola Data Admin</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('admins.create') }}" class="btn btn-md btn-success mb-3">ADD ADMIN</a>
                        <a href="{{ route('dashboard.index') }}" class="btn btn-md btn-success mb-3">DASHBOARD</a>
                        <a href="{{ route('posts.index') }}" class="btn btn-md btn-success mb-3">KELOLA DATA BUKU</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Image</th>
                                    <th scope="col" style="width: 20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($admins as $admin)
                                    <tr>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->username }}</td>
                                        <td>{{ $admin->password }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td class="text-center">
                                            <img src='{{ asset("$admin->profile_image") }}'
                                                class="rounded" style="width: 150px">
                                        </td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('admins.destroy', $admin->id) }}" method="POST">
                                                <a href="{{ route('admins.show', $admin->id) }}"
                                                    class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('admins.edit', $admin->id) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>

                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Data admins belum Tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $admins->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById('adminForm').addEventListener('submit', function(event) {
            // Cek apakah username atau email sudah ada
            var username = document.getElementById('username').value;
            var email = document.getElementById('email').value;
            var exists = false;

            // Lakukan validasi menggunakan JavaScript XMLHttpRequest atau fetch API
            // Contoh menggunakan XMLHttpRequest
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.exists) {
                            exists = true;
                        }
                        if (exists) {
                            alert('Username atau email sudah digunakan, harap ganti.');
                            event.preventDefault(); // Mencegah pengiriman form
                        }
                    } else {
                        console.error('Terjadi kesalahan saat mengirim permintaan.');
                    }
                }
            };

            xhr.open('GET', '/check-admin-exists?username=' + username + '&email=' + email, true);
            xhr.send();
        });
    </script>

    <script>
        //message with sweetalert
        @if (session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif (session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>

</body>

</html>
