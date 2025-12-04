<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/topbar.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="topbar">
        <div class="topbar-right">
            <span class="user-name">Nama Operator</span>

            <div class="user-menu">
                <img src="{{ asset('images/profile.png') }}" class="user-avatar" id="userAvatar">

            <!-- Popup -->
                <div class="dropdown" id="dropdownMenu">
                    <a href="{{ route('logout') }}" class="logout-btn">Log Out</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        const avatar = document.getElementById('userAvatar');
        const dropdown = document.getElementById('dropdownMenu');

        avatar.addEventListener('click', () => {
            dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
        });

    // Klik area luar → close
        document.addEventListener('click', function(e) {
            if (!avatar.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.style.display = "none";
            }
        });
    </script>
</body>
</html>
