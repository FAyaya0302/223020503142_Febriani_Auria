<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login Akun</title>
</head>

<body>

    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <label>LOGIN</label>
                        <hr>

                        <!-- resources/views/auth/login.blade.php -->

                        <form method="POST" action="{{ route('postsLogin') }}">
                            @csrf

                            <div>
                                <label for="username">Username</label>
                                <input id="username" type="text" name="username" value="{{ old('username') }}"
                                    required autofocus>

                                @error('username')
                                    <span role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="password">Password</label>
                                <input id="password" type="password" name="password" required
                                    autocomplete="current-password">

                                @error('password')
                                    <span role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <button type="submit">
                                    Login
                                </button>
                            </div>
                        </form>


                        <div class="text-center" style="margin-top: 15px">
                            Belum punya akun? <a href="admins/create">Silahkan Register</a>
                        </div>

                    </div>
                </div>
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

</body>

</html>
