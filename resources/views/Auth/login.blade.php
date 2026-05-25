<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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
            /* 🌟 DIUBAH: Menggabungkan gradien transparan dengan gambar latar belakang */
            background: linear-gradient(135deg, rgba(10, 15, 90, 0.8), rgba(27, 44, 193, 0.8)), 
                        url('https://images.unsplash.com/photo-1521587760476-6c12a4b040da?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .login-box{
            width:380px;
            /* 🌟 MODIFIKASI: Mengubah background menjadi putih semi-transparan (efek glassmorphism ringan) agar menyatu dengan background */
            background: rgba(255, 255, 255, 0.92);
            padding:35px;
            border-radius:12px;
            text-align:center;
            box-shadow:0 8px 32px rgba(0,0,0,0.3);
            backdrop-filter: blur(4px); /* Memberikan efek blur pada background di belakang kotak login */
        }

        h2{
            margin-bottom:25px;
            color:#222;
            font-weight: 600;
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
            background: rgba(255, 255, 255, 0.8);
        }

        .form-control:focus{
            border-color:#1b2cc1;
            box-shadow:0 0 5px rgba(27, 44, 193, 0.3);
        }

        .btn-login{
            width:100%;
            padding:12px;
            margin-top:15px;
            border:none;
            border-radius:6px;
            background: linear-gradient(90deg, #6200ea, #1b2cc1);
            color:white;
            font-size:16px;
            font-weight: 500;
            cursor:pointer;
            transition:0.3s;
            box-shadow: 0 4px 15px rgba(27, 44, 193, 0.2);
        }

        .btn-login:hover{
            opacity:0.95;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(27, 44, 193, 0.3);
        }

        .error{
            color:red;
            margin-bottom:10px;
            font-size: 14px;
        }

        p{
            margin-top:18px;
            color:#333;
            font-size: 14px;
        }

        a{
            color:#1b2cc1;
            text-decoration:none;
            font-weight: 500;
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