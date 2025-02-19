<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/images/auth/Login_bg.jpg') }}" type="image/png"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/login.css')}}">
    <!-- API Url -->
    <script>
        let appUrl = '{{ env('APP_URL') }}';
    </script>
    @include('layouts.style')
</head>
<body>
    <div class="d-flex">
        <div class="container justify-content-center align-items-center">
        <div class="card login-card">
            <img src="{{ asset('assets/images/STMIK.png') }}" alt="Logo" class="logo-header img-fluid" >
            <h3 class="text-center fw-bold  text-header">Login</h3>
            <form id="loginForm" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email"><i class="fas fa-email pr-2"></i>Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" autocomplete="off">
                    <div class="input-group-append">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password"><i class="fas fa-lock pr-2"></i>Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off">
                    <div class="input-group-append">
                    </div>
                </div>
                <div class="pt-2">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
            </form>
            <div class="login-footer d-flex justify-content-center align-items-center pt-3">
                <p>&copy; 2025 Sistem Penjadwalan STIMIK Adhi Guna</p>
            </div>
        </div>
    </div>
    </div>
    <script type="module" src="{{ asset('js/auth/auth.controller.js') }}"></script>
    @include('layouts.scripts')

</body>
</html>