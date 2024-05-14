<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }

        .btn-logout {
            background-color: #dc3545;
            color: white;
        }

        .welcome-msg {
            margin-bottom: 20px;
            text-align: center;
        }

        .auth-links {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Dashboard</h4>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <a href="{{ route('admins.index') }}" class="btn btn-primary">Kelola Admin</a>
                            <a href="{{ route('posts.index') }}" class="btn btn-success">Kelola Buku</a>
                            {{-- <form action="{{ route('logout') }}" method="POST" style="display: inline;"> --}}
                            @csrf
                            <button type="submit" class="btn btn-logout">Logout</button>
                            {{-- </form> --}}
                        </div>
                        <div class="auth-links">
                            <p>Belum memiliki akun? <a href="{{ route('register.index') }}">Register</a></p>
                            <p>Sudah memiliki akun? <a href="{{ route('login') }}">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
