<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- File CSS -->
    <link rel="stylesheet" href="{{ asset('css/topbar.css') }}">
</head>

<body>
    <div class="topbar">
        <div class="topbar-right">
            <span class="user-name">Haechan Lee</span>

            <div class="user-menu">
                <img src="{{ asset('images/lee_haechan.jpg') }}" class="user-avatar" id="userAvatar">

                <!-- Dropdown (dummy) -->
                <div class="dropdown" id="dropdownMenu">
                    <a href="#" class="dropdown-item">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        const avatar = document.getElementById('userAvatar');
        const dropdown = document.getElementById('dropdownMenu');

        avatar.addEventListener('click', (e) => {
            e.stopPropagation();
            dropdown.classList.toggle("show");
        });

        document.addEventListener('click', () => {
            dropdown.classList.remove("show");
        });
    </script>
</body>
</html>