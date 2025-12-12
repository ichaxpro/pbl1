<head>
<link rel="stylesheet" href="{{ asset('css/publication_search.css') }}">
</head>
<body>
<section class="publication-search-section">
    <h2>Publication</h2>

    <div class="search-box">
        <span class="search-icon">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
        </span>
        <input type="text" placeholder="Search...">
    </div>

    <div class="publication-controls">

        <!-- SORT DROPDOWN -->
        <div class="dropdown">
            Sort by <span>▾</span>

            <div class="dropdown-menu">
                <div class="dropdown-item" data-sort="newest">Newest</div>
                <div class="dropdown-item" data-sort="oldest">Oldest</div>
            </div>
        </div>

        <!-- FILTER DROPDOWN -->
        <div class="dropdown">
            Filter <span>▾</span>

            <div class="dropdown-menu">
                <div class="dropdown-item" data-year="2025">2025</div>
                <div class="dropdown-item" data-year="2024">2024</div>
                <div class="dropdown-item" data-year="2023">2023</div>
                <div class="dropdown-item" data-year="2022">2022</div>
                <div class="dropdown-item" data-year="2021">2021</div>
                <div class="dropdown-item" data-year="2020">2020</div>
            </div>
        </div>
        <script>
            document.querySelectorAll(".dropdown").forEach(drop => {
                drop.addEventListener("click", function (e) {
                    e.stopPropagation();

                    const menu = this.querySelector(".dropdown-menu");

                    // Close other dropdowns first
                    document.querySelectorAll(".dropdown-menu").forEach(m => {
                        if (m !== menu) m.style.display = "none";
                    });

                    // Toggle this dropdown
                    menu.style.display = menu.style.display === "flex" ? "none" : "flex";
                });
            });

            // Close dropdown if clicking outside
            document.addEventListener("click", () => {
                document.querySelectorAll(".dropdown-menu").forEach(menu => {
                    menu.style.display = "none";
                });
            });
        </script>
    </div>
</body>
</section>