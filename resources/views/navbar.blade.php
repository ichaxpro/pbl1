<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/navbar.css') }}"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  <title>Navbar</title>
</head>
<body>
  <div class= "top-navbar">
      <img class="flag-image" src="{{ asset('images/bendera_indo.png') }}" alt="Bendera Indonesia">
      <img class="flag-image" src="{{ asset('images/bendera_inggris.png') }}" alt="Bendera Inggris">
</div>
    <nav class="navbar">
      <a href="{{ route('homepage') }}" class="logo-wrapper">
       <img class="logo-image" src="{{ asset('images/Jti_polinema.png') }}" alt="">
       <img class="logo-image" src="{{ asset('images/logo_dt1.png') }}" alt="">
      </a>
    <div class="navbar-content">
      <a href="{{ route('profile') }}" class="{{ Request::is('profile') ? 'active' : '' }}">Profile</a>
      <a href="{{ route('news') }}" class="{{ Request::is('news') ? 'active' : '' }}">News</a>
      <a href="{{ route('publication') }}" class="{{ Request::is('galery') ? 'active' : '' }}">Gallery</a>
      <a href="{{ route('publication') }}" class="{{ Request::is('publications') ? 'active' : '' }}">Publications</a>
    </div>
    
  </nav>

  
</body>
</html>