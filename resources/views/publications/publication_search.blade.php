<head>
<link rel="stylesheet" href="{{ asset('css/publication_search.css') }}">
</head>
<body>
<section class="publication-search-section">
    <h2>Publication</h2>

    <form method="GET" action="/publications" id="publicationSearchForm">
        <div class="search-box">
            <span class="search-icon">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </span>
            <input type="text" name="search" placeholder="Search publications..." value="{{ request('search') }}">
        </div>
        <input type="hidden" name="sort" id="sortInput" value="{{ request('sort', 'newest') }}">
        <input type="hidden" name="year" id="yearInput" value="{{ request('year') }}">
    </form>

    <div class="publication-controls">

        <!-- SORT DROPDOWN -->
        <div class="dropdown">
            Sort by: <span id="currentSort">{{ request('sort') === 'oldest' ? 'Oldest' : 'Newest' }}</span> <span>▾</span>

            <div class="dropdown-menu">
                <div class="dropdown-item {{ request('sort', 'newest') === 'newest' ? 'active' : '' }}" data-sort="newest">Newest</div>
                <div class="dropdown-item {{ request('sort') === 'oldest' ? 'active' : '' }}" data-sort="oldest">Oldest</div>
            </div>
        </div>

        <!-- FILTER DROPDOWN -->
        <div class="dropdown">
            Filter: <span id="currentYear">{{ request('year') ? request('year') : 'All Years' }}</span> <span>▾</span>

            <div class="dropdown-menu">
                <div class="dropdown-item {{ !request('year') ? 'active' : '' }}" data-year="">All Years</div>
                <div class="dropdown-item {{ request('year') === '2025' ? 'active' : '' }}" data-year="2025">2025</div>
                <div class="dropdown-item {{ request('year') === '2024' ? 'active' : '' }}" data-year="2024">2024</div>
                <div class="dropdown-item {{ request('year') === '2023' ? 'active' : '' }}" data-year="2023">2023</div>
                <div class="dropdown-item {{ request('year') === '2022' ? 'active' : '' }}" data-year="2022">2022</div>
                <div class="dropdown-item {{ request('year') === '2021' ? 'active' : '' }}" data-year="2021">2021</div>
                <div class="dropdown-item {{ request('year') === '2020' ? 'active' : '' }}" data-year="2020">2020</div>
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

            // Handle search input
            const searchInput = document.querySelector('input[name="search"]');
            if (searchInput) {
                searchInput.addEventListener('keyup', function(e) {
                    if (e.key === 'Enter') {
                        document.getElementById('publicationSearchForm').submit();
                    }
                });
            }

            // Handle sort selection
            document.querySelectorAll('[data-sort]').forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    const sortValue = this.getAttribute('data-sort');
                    document.getElementById('sortInput').value = sortValue;
                    document.getElementById('currentSort').textContent = this.textContent;
                    document.getElementById('publicationSearchForm').submit();
                });
            });

            // Handle year filter selection
            document.querySelectorAll('[data-year]').forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    const yearValue = this.getAttribute('data-year');
                    document.getElementById('yearInput').value = yearValue;
                    document.getElementById('currentYear').textContent = yearValue || 'All Years';
                    document.getElementById('publicationSearchForm').submit();
                });
            });
        </script>
    </div>
</body>
</section>