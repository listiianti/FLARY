<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- FIXED FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box; /* PENTING */
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            background: linear-gradient(135deg, #0a0f5a, #1b2cc1);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            width: 350px;
            background: #e6e6e6;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        h2 {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 6px;
            border: 1px solid #ccc;
            outline: none;
            transition: 0.2s;
        }

        .form-control:focus {
            border-color: #5ffbf1;
            box-shadow: 0 0 5px rgba(95,251,241,0.5);
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border-radius: 6px;
            border: none;
            background: linear-gradient(90deg, #c86dd7, #5ffbf1);
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-login:hover {
            opacity: 0.9;
        }

        p {
            margin-top: 15px;
        }

        a {
            color: blue;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="login-box">

    <h2>Login</h2>

    @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ url('/login') }}">
        @csrf

        <input type="text" name="username" class="form-control" placeholder="Username" required>
        <input type="password" name="password" class="form-control" placeholder="Password" required>

        <button type="submit" class="btn-login">LOGIN</button>

        <p>Belum punya akun? <a href="{{ url('/register') }}">Register</a></p>
    </form>
</div>

</body>
</html>