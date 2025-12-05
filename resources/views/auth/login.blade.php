<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

    <!-- TOP BAR -->
    <div class="top-bar"></div>

    <!-- BACKGROUND LAYOUT -->
    <div class="background-wrapper">

        <div class="bg-top-space"></div>

        <div class="bg-image"></div>

        <div class="bg-bottom-space"></div>

        <!-- LOGIN CARD -->
        <div class="login-card">

            <!-- LOGOS -->
            <div class="login-logos">
                <img src="/images/Jti_polinema.png">
                <img src="/images/logo_dt1.png">
            </div>

            <!-- LOGIN BOX -->
            <div class="login-box">
                <h2>Login Admin</h2>

                {{-- SHOW ERROR MESSAGE --}}
                @if(session('error'))
                    <p class="error-message">{{ session('error') }}</p>
                @endif

                <form method="POST" action="{{ route('login.submit') }}">
                    @csrf

                    <label>Email:</label>
                    <input type="text" name="email" required>

                    <label>Password:</label>
                    <input type="password" name="password" required>

                    <button>Log In</button>
                </form>
            </div>

        </div>

    </div>

    <!-- BOTTOM BAR -->
    <div class="bottom-bar"></div>

</body>
</html>
