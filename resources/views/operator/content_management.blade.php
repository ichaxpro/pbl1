<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Content Management</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/content_management.css') }}">

    <style>
        /* FIX TABLE HEADER */
        thead {
            background: #D9D9D9 !important;
        }

        thead th {
            color: #1E4A52 !important;
            font-weight: 600;
        }

        /* FIX TABLE BORDER RADIUS */
        .table-wrapper {
            border-radius: 12px !important;
            overflow: hidden !important;
        }

        /* FIX BADGES */
        .badge {
            border-radius: 20px !important;
            padding: 6px 16px !important;
            min-width: 90px;
            text-align: center;
        }

        /* FIX TOP BAR LAYOUT */
        .top-bar {
            justify-content: space-between;
        }

        @media (max-width: 768px) {
            .top-bar {
                flex-direction: column;
                align-items: stretch;
                gap: 15px;
            }

            .filters {
                margin-left: 0;
                justify-content: flex-start;
            }
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">

    <div class="flex w-full min-h-screen">

        <!-- Sidebar -->

        <aside class="w-64 h-screen border-r flex flex-col sticky top-0">
            @include('operator.sidebaroperator')
        </aside>

        <!-- Main area -->
        <div class="flex-1 flex flex flex-col min-h screen" style="min-height: 100vh">

            <!-- Topbar -->
            <div class="w-full">
                @include('operator.topbar')
            </div>
        </div>
        <!-- Content -->
        <main class="flex-grow p-5 pl-20">
            <!-- Content Management PART -->
            <!-- <div class="page"> -->

                <h1 class="page-title">Content Management</h1>

                <div class="top-bar">

                    <!-- Search -->
                    <div class="search-box">
                        <form method="GET" action="{{ route('operator.content_management') }}">
                                <img src="{{ asset('images/search_icon.png') }}" class="search-icon">

                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..."
                                    class="search-text">
                        </form>
                        <!-- <input type="text" placeholder="Search..." class="search-text"> -->
                    </div>

                    <!-- Add Button -->
                    <button class="btn-add text-[#1E4A52]">
                        <span class="plus-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </span>
                        Add
                    </button>
                    <div class="overlay" id="overlay">
                        <div class="overlay-box">
                            <h2 class="overlay-header">Add Content</h2>

                            <a href="{{ url('/add-activities') }}" class="overlay-btn">Add Activities</a>
                            <a href="{{ route('operator.publication.create') }}" class="overlay-btn">Add Publication</a>
                            <a href="{{ route('operator.news.create') }}" class="overlay-btn">Add News</a>
                            <a href="{{ url('/add-facilities') }}" class="overlay-btn">Add Facilities</a>

                            <button class="close-overlay">Close</button>
                        </div>
                    </div>

                    <!-- Filters -->
                    <!-- Filters -->
                    <div class="filters">
                        <span class="filter-label">Filters:</span>
                        <div class="filter-dropdown">
                            <button class="filter-btn filter-type-btn">
                                Type
                                <span class="filter-arrow">▼</span>
                            </button>
                            <div class="filter-dropdown-menu type-menu">
                                <label class="filter-option">
                                    <input type="checkbox" value="activities" checked>
                                    <span>Activities</span>
                                </label>
                                <label class="filter-option">
                                    <input type="checkbox" value="publications" checked>
                                    <span>Publications</span>
                                </label>
                                <label class="filter-option">
                                    <input type="checkbox" value="news" checked>
                                    <span>News</span>
                                </label>
                                <label class="filter-option">
                                    <input type="checkbox" value="facilities" checked>
                                    <span>Facilities</span>
                                </label>
                            </div>
                        </div>

                        <div class="filter-dropdown">
                            <button class="filter-btn filter-status-btn">
                                Status
                                <span class="filter-arrow">▼</span>
                            </button>
                            <div class="filter-dropdown-menu status-menu">
                                <label class="filter-option">
                                    <input type="checkbox" value="accepted" checked>
                                    <span class="status-badge accepted">Accepted</span>
                                </label>
                                <label class="filter-option">
                                    <input type="checkbox" value="rejected" checked>
                                    <span class="status-badge rejected">Rejected</span>
                                </label>
                                <label class="filter-option">
                                    <input type="checkbox" value="requested" checked>
                                    <span class="status-badge requested">Requested</span>
                                </label>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Table -->
                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Upload Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($content as $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ ucfirst($item->type) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</td>

                                    <td>
                                        @if (in_array($item->status, ['approved', 'accepted']))
                                            <span class="badge approved">Approved</span>
                                        @elseif ($item->status == 'rejected')
                                            <span class="badge rejected">Rejected</span>
                                        @else
                                            <span class="badge requested">Requested</span>
                                        @endif
                                    </td>

                                    <td class="actions">
                                        <form action="{{ route('operator.content.delete', [$item->table, $item->id]) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this content?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" style="background:none;border:none;">
                                                <img src="{{ asset('images/delete-icon.png') }}" class="icon-btn">
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <!-- <tr>
                                <td>Lorem Ipsum</td>
                                <td>Lorem Ipsum</td>
                                <td>11 November 2025</td>
                                <td><span class="badge rejected">Rejected</span></td>
                                <td class="actions">
                                    <img src="{{ asset('images/delete-icon.png') }}" class="icon-btn">
                                </td>
                            </tr>

                            <tr>
                                <td>Lorem Ipsum</td>
                                <td>Lorem Ipsum</td>
                                <td>01 November 2025</td>
                                <td><span class="badge requested">Requested</span></td>
                                <td class="actions">
                                    <img src="{{ asset('images/delete-icon.png') }}" class="icon-btn">
                                </td>
                            </tr>

                            <tr>
                                <td>Lorem Ipsum</td>
                                <td>Lorem Ipsum</td>
                                <td>06 November 2025</td>
                                <td><span class="badge requested">Requested</span></td>
                                <td class="actions">
                                    <img src="{{ asset('images/delete-icon.png') }}" class="icon-btn">
                                </td>
                            </tr>

                            <tr>
                                <td>Lorem Ipsum</td>
                                <td>Lorem Ipsum</td>
                                <td>06 November 2025</td>
                                <td><span class="badge requested">Requested</span></td>
                                <td class="actions">
                                    <img src="{{ asset('images/delete-icon.png') }}" class="icon-btn">
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $content->links('pagination::tailwind') }}
                </div>
                <!-- <div class="pagination">
                    <span class="prev">❮</span>
                    <span class="page-number active">1</span>
                    <span class="page-number">2</span>
                    <span class="page-number">3</span>
                    <span class="next">❯</span>
                </div> -->

            <!-- </div> -->

        </main>
    </div>

    </div>

    <script>
        const overlay = document.getElementById("overlay");
        const openBtn = document.querySelector(".btn-add");
        const closeBtn = document.querySelector(".close-overlay");

        openBtn.addEventListener("click", () => {
            overlay.style.display = "flex";
        });

        closeBtn.addEventListener("click", () => {
            overlay.style.display = "none";
        });

        // Close when clicking outside box
        overlay.addEventListener("click", (e) => {
            if (e.target === overlay) {
                overlay.style.display = "none";
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            // Status dropdown functionality
            const statusDropdowns = document.querySelectorAll('.status-dropdown');

            // Toggle dropdown
            statusDropdowns.forEach(dropdown => {
                const toggle = dropdown.querySelector('.status-toggle');
                const menu = dropdown.querySelector('.status-dropdown-menu');

                toggle.addEventListener('click', function (e) {
                    e.stopPropagation();

                    // Close all other dropdowns
                    statusDropdowns.forEach(other => {
                        if (other !== dropdown) {
                            other.classList.remove('active');
                        }
                    });

                    // Toggle current dropdown
                    dropdown.classList.toggle('active');
                });

                // Handle option selection
                const options = menu.querySelectorAll('.status-option');
                options.forEach(option => {
                    option.addEventListener('click', function (e) {
                        e.stopPropagation();

                        const value = this.getAttribute('data-value');
                        const text = this.textContent;
                        const currentStatus = dropdown.getAttribute('data-status');

                        // Update dropdown
                        dropdown.setAttribute('data-status', value);

                        // Update toggle button
                        toggle.innerHTML = `
                            <span>${text}</span>
                            <span class="arrow">▼</span>
                        `;

                        // Update toggle class
                        toggle.className = 'status-toggle';
                        toggle.classList.add(`status-${value}`);

                        // Show notification (optional)
                        if (currentStatus !== value) {
                            console.log(`Status changed from ${currentStatus} to ${value}`);
                            // You can add AJAX call here to update server
                        }

                        // Close dropdown
                        dropdown.classList.remove('active');
                    });
                });
            });

            // Close dropdowns when clicking outside
            document.addEventListener('click', function () {
                statusDropdowns.forEach(dropdown => {
                    dropdown.classList.remove('active');
                });
            });

            // Prevent dropdown close when clicking inside
            document.querySelectorAll('.status-dropdown-menu').forEach(menu => {
                menu.addEventListener('click', function (e) {
                    e.stopPropagation();
                });
            });

            // Pagination click handler
            document.querySelectorAll('.page-number').forEach(button => {
                button.addEventListener('click', function () {
                    // Remove active class from all buttons
                    document.querySelectorAll('.page-number').forEach(btn => {
                        btn.classList.remove('active');
                    });
                    // Add active class to clicked button
                    this.classList.add('active');
                });
            });

            // Filter buttons
            document.querySelectorAll('.filter-btn').forEach(button => {
                button.addEventListener('click', function () {
                    // Toggle active state
                    this.classList.toggle('active');
                    // Add your filter logic here
                });
            });

            // Search functionality
            const searchInput = document.querySelector('.search-text');
            searchInput.addEventListener('input', function (e) {
                const searchTerm = e.target.value.toLowerCase();
                // Add your search logic here
            });
        });

        // Filter Dropdown Functionality
        document.addEventListener('DOMContentLoaded', function () {
            // ... kode yang sudah ada ...

            // Filter dropdowns
            const filterDropdowns = document.querySelectorAll('.filter-dropdown');

            filterDropdowns.forEach(dropdown => {
                const toggle = dropdown.querySelector('.filter-btn');
                const menu = dropdown.querySelector('.filter-dropdown-menu');

                toggle.addEventListener('click', function (e) {
                    e.stopPropagation();

                    // Close all other dropdowns
                    filterDropdowns.forEach(other => {
                        if (other !== dropdown) {
                            other.classList.remove('active');
                        }
                    });

                    // Toggle current dropdown
                    dropdown.classList.toggle('active');
                });

                // Prevent closing when clicking inside menu
                menu.addEventListener('click', function (e) {
                    e.stopPropagation();
                });
            });

            // Close dropdowns when clicking outside
            document.addEventListener('click', function () {
                filterDropdowns.forEach(dropdown => {
                    dropdown.classList.remove('active');
                });
            });

            // Filter checkboxes change handler
            const filterCheckboxes = document.querySelectorAll('.filter-option input[type="checkbox"]');

            filterCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    applyFilters();
                    updateFilterButtons();
                });
            });

            // Clear all filters button
            const clearFiltersBtn = document.querySelector('.clear-filters-btn');
            if (clearFiltersBtn) {
                clearFiltersBtn.addEventListener('click', function () {
                    filterCheckboxes.forEach(checkbox => {
                        checkbox.checked = true;
                    });
                    applyFilters();
                    updateFilterButtons();
                });
            }

            // Function to apply filters
            function applyFilters() {
                // Get selected types
                const selectedTypes = [];
                document.querySelectorAll('.type-menu input[type="checkbox"]:checked').forEach(cb => {
                    selectedTypes.push(cb.value);
                });

                // Get selected statuses
                const selectedStatuses = [];
                document.querySelectorAll('.status-menu input[type="checkbox"]:checked').forEach(cb => {
                    selectedStatuses.push(cb.value);
                });

                // Filter table rows
                const tableRows = document.querySelectorAll('tbody tr');

                tableRows.forEach(row => {
                    const typeCell = row.cells[1].textContent.toLowerCase();
                    const statusElement = row.querySelector('.status-toggle span:first-child');
                    const statusText = statusElement ? statusElement.textContent.toLowerCase() : '';

                    // Check if row matches filters
                    const matchesType = selectedTypes.some(type =>
                        typeCell.includes(type) || typeCell.includes('lorem ipsum') // Demo fallback
                    );

                    const matchesStatus = selectedStatuses.some(status =>
                        statusText.includes(status)
                    );

                    // Show/hide row
                    row.style.display = (matchesType && matchesStatus) ? '' : 'none';
                });

                // Update pagination or show no results message
                updateNoResultsMessage();
            }

            // Function to update filter button appearance
            function updateFilterButtons() {
                // Update Type button
                const typeCheckboxes = document.querySelectorAll('.type-menu input[type="checkbox"]');
                const typeChecked = Array.from(typeCheckboxes).filter(cb => cb.checked);

                const typeBtn = document.querySelector('.filter-type-btn');
                if (typeChecked.length < typeCheckboxes.length) {
                    typeBtn.classList.add('has-selection');
                    typeBtn.innerHTML = `Type <span class="filter-arrow">▼</span> <span class="filter-count">${typeChecked.length}</span>`;
                } else {
                    typeBtn.classList.remove('has-selection');
                    typeBtn.innerHTML = `Type <span class="filter-arrow">▼</span>`;
                }

                // Update Status button
                const statusCheckboxes = document.querySelectorAll('.status-menu input[type="checkbox"]');
                const statusChecked = Array.from(statusCheckboxes).filter(cb => cb.checked);

                const statusBtn = document.querySelector('.filter-status-btn');
                if (statusChecked.length < statusCheckboxes.length) {
                    statusBtn.classList.add('has-selection');
                    statusBtn.innerHTML = `Status <span class="filter-arrow">▼</span> <span class="filter-count">${statusChecked.length}</span>`;
                } else {
                    statusBtn.classList.remove('has-selection');
                    statusBtn.innerHTML = `Status <span class="filter-arrow">▼</span>`;
                }
            }

            // Function to show/hide no results message
            function updateNoResultsMessage() {
                const visibleRows = document.querySelectorAll('tbody tr[style=""]').length;
                const allRows = document.querySelectorAll('tbody tr').length;

                let noResultsMsg = document.querySelector('.no-results-message');

                if (visibleRows === 0 && allRows > 0) {
                    if (!noResultsMsg) {
                        noResultsMsg = document.createElement('div');
                        noResultsMsg.className = 'no-results-message';
                        noResultsMsg.innerHTML = `
                    <p>No content found matching the selected filters.</p>
                    <button class="clear-filters-btn">Clear All Filters</button>
                `;
                        document.querySelector('.table-wrapper').appendChild(noResultsMsg);

                        // Add event listener to clear button in message
                        noResultsMsg.querySelector('.clear-filters-btn').addEventListener('click', function () {
                            filterCheckboxes.forEach(checkbox => {
                                checkbox.checked = true;
                            });
                            applyFilters();
                            updateFilterButtons();
                        });
                    }
                } else if (noResultsMsg) {
                    noResultsMsg.remove();
                }
            }

            // Initialize filter buttons
            updateFilterButtons();

            // ... kode JavaScript lainnya yang sudah ada ...
        });

    </script>
</body>

</html>