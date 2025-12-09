<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Link to the dedicated CSS file -->
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <!-- Load Font Awesome for social icons -->
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<footer class="footer">
    <div class="footer-container">
        
        <!-- Section 1: Logo and Address -->
        <div class="footer-section footer-logo-section">
            <img src="{{ asset('/images/footer-image.png') }}" alt="LAB Technology Data Logo" class="footer-logo">
            <p class="footer-address">
                Information Technology Building 8th Floor <br>
                State Polytechnic of Malang
            </p>
        </div>

        <!-- Section 2: Contact -->
        <div class="footer-section">
            <h4>Contact</h4>
            <div class="contact-info">
                <a href="mailto:labdti@polinema.ac.id">@labdti.jti.polinema.ac.id</a>
                <a href="tel:+6234123456089">+6234123456089</a>
            </div>
        </div>

        <!-- Section 3: Find Us (Social Media) -->
        <div class="footer-section">
            <h4>Find Us</h4>
            <div class="social-icons">
                <!-- Replace with actual icon paths or classes if not using Font Awesome -->
                 <a href="#">
                  <img src="{{ asset('images/logo_linkedin_putih.png') }}" alt="LinkedIn Logo" class="custom-icon">
                  </a>
                <a href="#">
                  <img src="{{ asset('images/logo_yt_putih.png') }}" alt="YouTube Logo" class="custom-icon">
                  </a>
                <a href="#">
                  <img src="{{ asset('images/logo_ig_putih.png') }}" alt="Instagram Logo" class="custom-icon">
                  </a>
            </div>
        </div>

        <!-- Section 4: Admin Login -->
        <div class="footer-section">
        <a href="/login" class="contact-info-link">
          <h4>Admin Login</h4>
        </a>
        </div>

    </div>
</footer>
</html>