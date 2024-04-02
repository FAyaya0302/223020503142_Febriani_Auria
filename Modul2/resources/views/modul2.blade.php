<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/Style.css') }}">
    <script src="{{ asset('js/showpas.js') }}"></script>
    <title>Document</title>

</head>

<body>
    <div class="container">
        <div class="content">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" maxlength="7" required><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <input type="checkbox" id="showPasswordCheckbox" onclick="showPassword()">
                <label for="showPasswordCheckbox">Show Password</label><br><br>
                <input type="submit" value="Login">
            </form>
            <ul>
                <li>Username Max 7 karakter</li>
                <li>Password terdiri dari huruf kapital, huruf kecil, angka, dan karakter Khusus</li>
                <li>Password Minimal 10 karakter</li>
            </ul>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
