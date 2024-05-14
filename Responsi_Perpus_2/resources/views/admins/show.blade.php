<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Admin - SantriKoding.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="text-center">
                            <img src='{{asset("$admin->profile_image") }}'
                                class="rounded-circle" alt="{{ $admin->name }}"
                                style="width: 150px; height: 150px; object-fit: cover;">
                            <h3 class="mt-3">{{ $admin->name }}</h3>
                        </div>
                        <div class="mt-4">
                            <p><strong>Username:</strong> {{ $admin->username }}</p>
                            <p><strong>Email:</strong> {{ $admin->email }}</p>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-primary">Edit</a>
                            <form class="d-inline" action="{{ route('admins.destroy', $admin->id) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus admin ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                            <a href="{{ route('admins.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
