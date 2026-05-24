<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            height:100vh;
            background:linear-gradient(135deg,#0a0f5a,#1b2cc1);
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .login-box{
            width:380px;
            background:#e6e6e6;
            padding:35px;
            border-radius:12px;
            text-align:center;
            box-shadow:0 5px 15px rgba(0,0,0,0.25);
        }

        h2{
            margin-bottom:25px;
            color:#222;
        }

        .form-control{
            width:100%;
            padding:12px;
            margin:10px 0;
            border-radius:6px;
            border:1px solid #ccc;
            outline:none;
            font-size:15px;
            transition:0.3s;
        }

        .form-control:focus{
            border-color:#5ffbf1;
            box-shadow:0 0 5px rgba(95,251,241,0.5);
        }

        .btn-login{
            width:100%;
            padding:12px;
            margin-top:15px;
            border:none;
            border-radius:6px;
            background:linear-gradient(90deg,#c86dd7,#5ffbf1);
            color:white;
            font-size:16px;
            cursor:pointer;
            transition:0.3s;
        }

        .btn-login:hover{
            opacity:0.9;
        }

        .error{
            color:red;
            margin-bottom:10px;
        }

        p{
            margin-top:18px;
            color:#333;
        }

        a{
            color:blue;
            text-decoration:none;
        }

        a:hover{
            text-decoration:underline;
        }
    </style>
</head>
<body>

<div class="login-box">

    <h2>Login</h2>

    @if(session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ url('/login') }}">
        @csrf

        <input type="text"
               name="username"
               class="form-control"
               placeholder="Username"
               required>

        <input type="password"
               name="password"
               class="form-control"
               placeholder="Password"
               required>

        <button type="submit" class="btn-login">
            LOGIN
        </button>

        <p>
            Belum punya akun?
            <a href="{{ url('/register') }}">
                Register
            </a>
        </p>

    </form>

</div>

</body>
</html>