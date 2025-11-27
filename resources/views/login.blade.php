<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

    <div class="top-bar"></div>

    <div class="background-wrapper">

        <!-- solid color padding above image -->
        <div class="bg-top-space"></div>

        <!-- image section -->
        <div class="bg-image"></div>

        <!-- solid color padding below image -->
        <div class="bg-bottom-space"></div>
    </div>

    <div class="login-box">
        <h2>Login</h2>
        <form action="#" method="POST">
            <label>Username</label>
            <input type="text" name="username">

            <label>Password</label>
            <input type="password" name="password">

            <button type="submit">Login</button>
        </form>
    </div>

    <div class="bottom-bar"></div>

</body>
</html>
