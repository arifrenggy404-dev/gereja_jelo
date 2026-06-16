<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GKS Cabang Payeti</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body{
            background: linear-gradient(
                135deg,
                #0d6efd,
                #0a58ca
            );
            min-height:100vh;
        }

        .login-card{
            border:none;
            border-radius:20px;
            box-shadow:0 15px 35px rgba(0,0,0,.2);
            overflow:hidden;
        }

        .logo-box{
            text-align:center;
            margin-bottom:20px;
        }

        .logo-box i{
            font-size:70px;
            color:white;
        }

        .logo-title{
            color:white;
            font-weight:bold;
            font-size:28px;
        }

        .logo-subtitle{
            color:#e9ecef;
        }

        .form-control{
            border-radius:10px;
            padding:12px;
        }

        .btn-primary{
            border-radius:10px;
            padding:10px;
            font-weight:bold;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="row justify-content-center align-items-center min-vh-100">

        <div class="col-md-5">

            <div class="logo-box">

                <i class="bi bi-building"></i>

                <div class="logo-title">
                    GKS Cabang Payeti
                </div>

                <div class="logo-subtitle">
                    Sistem Informasi Gereja
                </div>

            </div>

            <div class="card login-card">

                <div class="card-body p-5">

                    {{ $slot }}

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>