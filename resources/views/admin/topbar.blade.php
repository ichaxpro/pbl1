
    <!-- File CSS -->
    <link rel="stylesheet" href="{{ asset('css/topbar.css') }}">

    <div class="topbar">
        <div class="topbar-right">
           <span class="user-name">
            {{ Auth::user()->name }}
        </span>

        <div class="user-menu">
            <img src="{{ Auth::user()->photo_url ? asset(Auth::user()->photo_url) : asset('images/default.png') }}"
                 class="user-avatar"
                 id="userAvatar">

            <div class="dropdown" id="dropdownMenu">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="dropdown-item">Logout</button>
                </form>
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
