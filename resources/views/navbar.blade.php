<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/navbar.css') }}"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar</title>

  
  
</head>
<body>
  <div class= "container">
      <img class="flag-image" src="{{ asset('images/bendera_indo.png') }}" alt="Bendera Indonesia">
      <img class="flag-image" src="{{ asset('images/bendera_inggris.png') }}" alt="Bendera Inggris">
</div>
    <nav class="navbar">
       <img class="logo-image" src="{{ asset('images/Jti_polinema.png') }}" alt="">
       <img class="logo-image" src="{{ asset('images/logo_dt1.png') }}" alt="">
    <div class="navbar-content">
      <a href="#" class="active">Profile</a>
      <a href="#">News</a>
      <a href="#">Gallery</a>
      <a href="#">Publications</a>
    </div>
    
  </nav>

  
</body>
</html>