<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gereja</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #0b1d3a;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            width: 100%;
            max-width: 900px;
            display: flex;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.45);
        }

        /* ── SIDEBAR KIRI ── */
        .login-left {
            flex: 1;
            min-width: 320px;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            min-height: 560px;

           
        }

        /* Overlay gelap navy di atas gambar */
        .login-left::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(
                to bottom,
                rgba(11, 29, 58, 0.55) 0%,
                rgba(11, 29, 58, 0.85) 60%,
                rgba(11, 29, 58, 0.97) 100%
            );
        }

        .left-content {
            position: relative;
            z-index: 1;
            padding: 36px 36px 40px;
        }

        .login-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: auto;
            position: absolute;
            top: 32px;
            left: 36px;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .logo-text {
            font-size: 18px;
            font-weight: 600;
            color: #fff;
            letter-spacing: 0.3px;
        }

        .left-tagline {
            font-size: 22px;
            font-weight: 600;
            color: #fff;
            line-height: 1.4;
            margin-bottom: 12px;
        }

        .left-desc {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.65);
            line-height: 1.7;
            margin-bottom: 24px;
        }

        .features {
            display: flex;
            flex-direction: column;
            gap: 9px;
        }

        .feat {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 12.5px;
            color: rgba(255, 255, 255, 0.8);
        }

        .feat-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #4b9fff;
            flex-shrink: 0;
        }

        /* ── PANEL KANAN (FORM) ── */
        .login-right {
            flex: 1;
            background: #fff;
            padding: 52px 48px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-header {
            margin-bottom: 32px;
        }

        .form-header h1 {
            font-size: 24px;
            font-weight: 700;
            color: #0b1d3a;
            margin-bottom: 6px;
        }

        .form-header p {
            font-size: 13.5px;
            color: #888;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #555;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .input-wrap {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrap svg {
            position: absolute;
            left: 14px;
            width: 17px;
            height: 17px;
            color: #aaa;
            pointer-events: none;
        }

        .form-input {
            width: 100%;
            height: 44px;
            padding: 0 14px 0 42px;
            border: 1.5px solid #e5e7eb;
            border-radius: 10px;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            color: #1a1a2e;
            background: #f9fafb;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-input:focus {
            outline: none;
            border-color: #1d5fc7;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(29, 95, 199, 0.12);
        }

        .form-input.error-input {
            border-color: #ef4444;
        }

        .remember-row {
            display: flex;
            align-items: center;
            gap: 7px;
            margin-bottom: 28px;
            font-size: 13px;
            color: #666;
        }

        .remember-row input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #1d5fc7;
            cursor: pointer;
        }

        .btn-login {
            width: 100%;
            height: 46px;
            background: #0b1d3a;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: background 0.2s, transform 0.15s;
        }

        .btn-login:hover {
            background: #1d3a6e;
            transform: translateY(-1px);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .btn-icon {
            width: 18px;
            height: 18px;
        }

        .alert-error {
            background: #fee2e2;
            border: 1px solid #fca5a5;
            color: #b91c1c;
            padding: 11px 15px;
            border-radius: 10px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .footer-note {
            margin-top: 32px;
            font-size: 11.5px;
            color: #bbb;
            text-align: center;
            line-height: 1.6;
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 768px) {
            .login-left {
                display: none;
            }

            .login-right {
                padding: 40px 28px;
            }
        }
    </style>
</head>

<body>

<div class="login-card">

    <!-- SIDEBAR KIRI - background gambar gereja -->
    <div class="login-left">
        <div class="login-logo">
            <div class="logo-icon">⛪</div>
            <span class="logo-text">Gereja</span>
        </div>

        <div class="left-content">
            <p class="left-tagline">Sistem Manajemen<br>Jemaat Digital</p>
            <p class="left-desc">
                Kelola seluruh data dan kegiatan gereja dalam satu platform yang terintegrasi.
            </p>
            <div class="features">
                <div class="feat"><span class="feat-dot"></span>Data jemaat &amp; keluarga</div>
                <div class="feat"><span class="feat-dot"></span>Jadwal pelayanan &amp; ibadah</div>
                <div class="feat"><span class="feat-dot"></span>Pengumuman &amp; berita gereja</div>
                <div class="feat"><span class="feat-dot"></span>Laporan keuangan gereja</div>
            </div>
        </div>
    </div>

    <!-- PANEL KANAN - FORM LOGIN -->
    <div class="login-right">

        <div class="form-header">
            <h1>Masuk</h1>
            <p>Masukkan email dan kata sandi Anda</p>
        </div>

        @if($errors->any())
            <div class="alert-error">
                Email atau kata sandi yang Anda masukkan salah.
            </div>
        @endif

        <form action="{{ url('/login') }}" method="POST">
            @csrf

            <!-- Email -->
            <div class="form-group">
                <label class="form-label">Email</label>
                <div class="input-wrap">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                    <input
                        type="email"
                        name="email"
                        class="form-input @error('email') error-input @enderror"
                        value="{{ old('email') }}"
                        placeholder="nama@email.com"
                        required
                        autocomplete="email">
                </div>
            </div>

            <!-- Kata Sandi -->
            <div class="form-group">
                <label class="form-label">Kata Sandi</label>
                <div class="input-wrap">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="11" width="18" height="11" rx="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                    <input
                        type="password"
                        name="password"
                        class="form-input"
                        placeholder="••••••••"
                        required
                        autocomplete="current-password">
                </div>
            </div>

            <!-- Ingat Saya -->
            <label class="remember-row">
                <input type="checkbox" name="remember">
                <span>Ingat saya</span>
            </label>

            <!-- Tombol Masuk -->
            <button type="submit" class="btn-login">
                <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                    <polyline points="10 17 15 12 10 7"/>
                    <line x1="15" y1="12" x2="3" y2="12"/>
                </svg>
                Masuk
            </button>

        </form>

        <p class="footer-note">
            Hanya untuk pengguna yang telah terdaftar.<br>
            Hubungi admin gereja jika membutuhkan akses.
        </p>

    </div>

</div>

</body>
</html>