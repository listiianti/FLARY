<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            min-height:100vh;
            /* 🌟 BG SAMA: Menggabungkan gradien transparan biru gelap dengan gambar perpustakaan */
            background: linear-gradient(135deg, rgba(10, 15, 90, 0.8), rgba(27, 44, 193, 0.8)), 
                        url('https://images.unsplash.com/photo-1521587760476-6c12a4b040da?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed; /* Mencegah background bergeser saat di-scroll jika form panjang */
            display:flex;
            justify-content:center;
            align-items:center;
            padding: 20px 0;
        }

        .register-box{
            width:420px; /* Sedikit lebih lebar dari login box karena field form register lebih banyak */
            background: rgba(255, 255, 255, 0.92);
            padding:35px;
            border-radius:12px;
            text-align:center;
            box-shadow:0 8px 32px rgba(0,0,0,0.3);
            backdrop-filter: blur(4px);
        }

        h2{
            margin-bottom:20px;
            color:#222;
            font-weight: 600;
        }

        .form-control{
            width:100%;
            padding:11px 12px;
            margin:8px 0;
            border-radius:6px;
            border:1px solid #ccc;
            outline:none;
            font-size:14px;
            transition:0.3s;
            background: rgba(255, 255, 255, 0.8);
        }

        .form-control:focus{
            border-color:#1b2cc1;
            box-shadow:0 0 5px rgba(27, 44, 193, 0.3);
        }

        .btn-register{
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

        .btn-register:hover{
            opacity:0.95;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(27, 44, 193, 0.3);
        }

        .error-message{
            color: red;
            font-size: 12px;
            text-align: left;
            margin-top: -5px;
            margin-bottom: 5px;
            display: block;
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

<div class="register-box">

    <h2>Daftar Akun</h2>

    <form method="POST" action="{{ url('/register') }}">
        @csrf

        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="{{ old('nama') }}" required>
        @error('nama') <span class="error-message">{{ $message }}</span> @enderror

        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
        @error('email') <span class="error-message">{{ $message }}</span> @enderror

        <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}" required>
        @error('username') <span class="error-message">{{ $message }}</span> @enderror

        <input type="text" name="alamat" class="form-control" placeholder="Alamat Rumah" value="{{ old('alamat') }}" required>
        @error('alamat') <span class="error-message">{{ $message }}</span> @enderror

        <input type="password" name="password" class="form-control" placeholder="Password (Min. 8 Karakter)" required>
        @error('password') <span class="error-message">{{ $message }}</span> @enderror

        <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>

        <button type="submit" class="btn-register">
            REGISTER
        </button>

        <p>
            Sudah punya akun? 
            <a href="{{ url('/login') }}">
                Login di sini
            </a>
        </p>

    </form>

</div>

</body>
</html>