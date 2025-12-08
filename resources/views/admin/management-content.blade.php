<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Content Management</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/management-content-admin.css') }}">
</head>

<body class="bg-gray-50">

 <div class="flex w-full min-h-screen">

        <!-- Sidebar (hidden on small screens) -->
        <aside class="w-64 h-screen border-r flex flex-col sticky top-0">
            @include('admin.sidebar')
        </aside>

        <div class="flex-1 flex flex-col min-h screen">
            <!-- Topbar -->
            <div class="w-full">
                @include('admin.topbar')
            </div>


        </div>

        <main class="flex-grow p-5 overflow-auto pl-20">
            <h1 class="page-title">Content Management</h1>

            <!-- TOP BAR -->
            <div class="top-bar">
                <!-- Search -->
                <div class="search-box">
                    <img src="{{ asset('images/search_icon.png') }}" alt="Search" class="search-icon">
                    <input type="text" placeholder="Search by title, operator..." class="search-text">
                </div>

                <!-- Filters -->
                <div class="filters">
                    <span class="filter-label">Filters:</span>
                    <button class="filter-btn">Type</button>
                    <button class="filter-btn">Status</button>
                </div>
            </div>

            <!-- TABLE -->
                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th style="width: 20%;">Title</th>
                                <th style="width: 15%;">Type</th>
                                <th style="width: 12%;">Date</th>
                                <th style="width: 15%;">Operator</th>
                                <th style="width: 12%;">Status</th>
                                <th style="width: 16%;">Note</th>
                                <th style="width: 10%;">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- Row 1 -->
                            <tr>
                                <td>Getting Started with Web Development</td>
                                <td>Article</td>
                                <td>11/11/2025</td>
                                <td><span class="tag operator">Gunawan</span></td>
                                <td>
                                    <div class="status-dropdown" data-status="accepted">
                                        <div class="status-toggle status-accepted">
                                            <span>Accepted</span>
                                            <span class="arrow">▼</span>
                                        </div>
                                        <div class="status-dropdown-menu">
                                            <div class="status-option status-accepted" data-value="accepted">Accepted</div>
                                            <div class="status-option status-rejected" data-value="rejected">Rejected</div>
                                            <div class="status-option status-requested" data-value="requested">Requested</div>
                                        </div>
                                    </div>
                                </td>
                                <td>Published on homepage</td>
                                <td class="action-cell">
                                    <div class="action-buttons">
                                        <button class="view-btn" title="View Content">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4b5563" stroke-width="1.5">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                                <circle cx="12" cy="12" r="3"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 2 -->
                            <tr>
                                <td>Advanced CSS Techniques</td>
                                <td>Tutorial</td>
                                <td>01/11/2025</td>
                                <td><span class="tag operator">Adi</span></td>
                                <td>
                                    <div class="status-dropdown" data-status="rejected">
                                        <div class="status-toggle status-rejected">
                                            <span>Rejected</span>
                                            <span class="arrow">▼</span>
                                        </div>
                                        <div class="status-dropdown-menu">
                                            <div class="status-option status-accepted" data-value="accepted">Accepted</div>
                                            <div class="status-option status-rejected" data-value="rejected">Rejected</div>
                                            <div class="status-option status-requested" data-value="requested">Requested</div>
                                        </div>
                                    </div>
                                </td>
                                <td>Needs more practical examples</td>
                                <td class="action-cell">
                                    <div class="action-buttons">
                                        <button class="view-btn" title="View Content">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4b5563" stroke-width="1.5">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                                <circle cx="12" cy="12" r="3"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 3 -->
                            <tr>
                                <td>JavaScript Best Practices</td>
                                <td>Guide</td>
                                <td>06/11/2025</td>
                                <td><span class="tag operator">Bagas</span></td>
                                <td>
                                    <div class="status-dropdown" data-status="requested">
                                        <div class="status-toggle status-requested">
                                            <span>Requested</span>
                                            <span class="arrow">▼</span>
                                        </div>
                                        <div class="status-dropdown-menu">
                                            <div class="status-option status-accepted" data-value="accepted">Accepted</div>
                                            <div class="status-option status-rejected" data-value="rejected">Rejected</div>
                                            <div class="status-option status-requested" data-value="requested">Requested</div>
                                        </div>
                                    </div>
                                </td>
                                <td>Pending review</td>
                                <td class="action-cell">
                                    <div class="action-buttons">
                                        <button class="view-btn" title="View Content">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4b5563" stroke-width="1.5">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                                <circle cx="12" cy="12" r="3"/>
                                            </svg>
                                        </button>
                                        <button class="danger" title="Reject">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4b5563" stroke-width="1.5">
                                                <line x1="18" y1="6" x2="6" y2="18"/>
                                                <line x1="6" y1="6" x2="18" y2="18"/>
                                            </svg>
                                        </button>
                                        <button class="success" title="Accept">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4b5563" stroke-width="1.5">
                                                <polyline points="20 6 9 17 4 12"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 4 -->
                            <tr>
                                <td>Responsive Design Principles</td>
                                <td>Article</td>
                                <td>05/11/2025</td>
                                <td><span class="tag operator">Gunawan</span></td>
                                <td>
                                    <div class="status-dropdown" data-status="accepted">
                                        <div class="status-toggle status-accepted">
                                            <span>Accepted</span>
                                            <span class="arrow">▼</span>
                                        </div>
                                        <div class="status-dropdown-menu">
                                            <div class="status-option status-accepted" data-value="accepted">Accepted</div>
                                            <div class="status-option status-rejected" data-value="rejected">Rejected</div>
                                            <div class="status-option status-requested" data-value="requested">Requested</div>
                                        </div>
                                    </div>
                                </td>
                                <td>Scheduled for next week</td>
                                <td class="action-cell">
                                    <div class="action-buttons">
                                        <button class="view-btn" title="View Content">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4b5563" stroke-width="1.5">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                                <circle cx="12" cy="12" r="3"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 5 -->
                            <tr>
                                <td>Backend Security Basics</td>
                                <td>Whitepaper</td>
                                <td>03/11/2025</td>
                                <td><span class="tag operator">Adi</span></td>
                                <td>
                                    <div class="status-dropdown" data-status="in-progress">
                                        <div class="status-toggle status-in-progress">
                                            <span>In progress</span>
                                            <span class="arrow">▼</span>
                                        </div>
                                        <div class="status-dropdown-menu">
                                            <div class="status-option status-accepted" data-value="accepted">Accepted</div>
                                            <div class="status-option status-rejected" data-value="rejected">Rejected</div>
                                            <div class="status-option status-requested" data-value="requested">Requested</div>
                                        </div>
                                    </div>
                                </td>
                                <td>Technical review in progress</td>
                                <td class="action-cell">
                                    <div class="action-buttons">
                                        <button class="view-btn" title="View Content">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4b5563" stroke-width="1.5">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                                <circle cx="12" cy="12" r="3"/>
                                            </svg>
                                        </button>
                                        <button class="danger" title="Reject">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4b5563" stroke-width="1.5">
                                                <line x1="18" y1="6" x2="6" y2="18"/>
                                                <line x1="6" y1="6" x2="18" y2="18"/>
                                            </svg>
                                        </button>
                                        <button class="success" title="Accept">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4b5563" stroke-width="1.5">
                                                <polyline points="20 6 9 17 4 12"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <!-- PAGINATION -->
            <div class="pagination">
                <span class="prev">❮</span>
                <span class="page-number active">1</span>
                <span class="page-number">2</span>
                <span class="page-number">3</span>
                <span class="next">❯</span>
            </div>

        </main>
    </div>
</div>

<!-- Optional JavaScript for Interactions -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Pagination click handler
        document.querySelectorAll('.page-number').forEach(button => {
            button.addEventListener('click', function() {
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
            button.addEventListener('click', function() {
                // Toggle active state
                this.classList.toggle('active');
                // Add your filter logic here
            });
        });

        // Search functionality
        const searchInput = document.querySelector('.search-text');
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            // Add your search logic here
        });
    });

        document.addEventListener('DOMContentLoaded', function() {
            // Status dropdown functionality
            const statusDropdowns = document.querySelectorAll('.status-dropdown');

            // Toggle dropdown
            statusDropdowns.forEach(dropdown => {
                const toggle = dropdown.querySelector('.status-toggle');
                const menu = dropdown.querySelector('.status-dropdown-menu');

                toggle.addEventListener('click', function(e) {
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
                    option.addEventListener('click', function(e) {
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
            document.addEventListener('click', function() {
                statusDropdowns.forEach(dropdown => {
                    dropdown.classList.remove('active');
                });
            });

            // Prevent dropdown close when clicking inside
            document.querySelectorAll('.status-dropdown-menu').forEach(menu => {
                menu.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            });
        
            // Pagination click handler
            document.querySelectorAll('.page-number').forEach(button => {
                button.addEventListener('click', function() {
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
                button.addEventListener('click', function() {
                    // Toggle active state
                    this.classList.toggle('active');
                    // Add your filter logic here
                });
            });
        
            // Search functionality
            const searchInput = document.querySelector('.search-text');
            searchInput.addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();
                // Add your search logic here
            });
        });
</script>

</body>
</html>