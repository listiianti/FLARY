<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <!-- FONT (FIX) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            background: linear-gradient(135deg, #0a0f5a, #1b2cc1);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-box {
            width: 380px;
            background: #e6e6e6;
            padding: 25px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 20px;
            background: linear-gradient(90deg, #c86dd7, #5ffbf1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border-radius: 6px;
            border: 1px solid #ccc;
            outline: none;
            transition: 0.2s;
        }

        .form-control:focus {
            border-color: #5ffbf1;
            box-shadow: 0 0 5px rgba(95,251,241,0.5);
        }

        textarea.form-control {
            resize: none;
            height: 60px;
        }

        .btn-register {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            border: none;
            background: linear-gradient(90deg, #c86dd7, #5ffbf1);
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
            transition: 0.3s;
        }

        .btn-register:hover {
            opacity: 0.9;
        }

        .login-link {
            margin-top: 15px;
            font-size: 14px;
        }

        .login-link a {
            color: blue;
            text-decoration: none;
        }

        .error {
            color: red;
            font-size: 13px;
        }
    </style>
</head>
<body>

<div class="register-box">

    <div class="title">Perpustakaan Digital</div>

    {{-- ERROR --}}
    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ url('/register') }}">
        @csrf

        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
        <input type="email" name="email" class="form-control" placeholder="Email" required>
        <input type="text" name="username" class="form-control" placeholder="Username" required>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
        <textarea name="alamat" class="form-control" placeholder="Alamat" required></textarea>

        <button type="submit" class="btn-register">REGISTER</button>

        <div class="login-link">
            Sudah punya akun? <a href="{{ url('/login') }}">Login</a>
        </div>
    </form>

</div>

</body>
</html>