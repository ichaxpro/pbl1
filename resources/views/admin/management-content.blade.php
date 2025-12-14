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

        <main class="flex-grow p-5 pl-20">
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

                    <!-- Type Filter Dropdown -->
                    <div class="filter-dropdown" data-filter="type">
                        <button class="filter-toggle">
                            <span>Type</span>
                            <span class="filter-arrow">▼</span>
                        </button>
                        <div class="filter-menu">
                            <div class="filter-option">
                                <input type="checkbox" id="type-all" data-value="all" checked>
                                <label for="type-all">All Types</label>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" id="type-article" data-value="article">
                                <label for="type-article">Article</label>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" id="type-tutorial" data-value="tutorial">
                                <label for="type-tutorial">Tutorial</label>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" id="type-guide" data-value="guide">
                                <label for="type-guide">Guide</label>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" id="type-whitepaper" data-value="whitepaper">
                                <label for="type-whitepaper">Whitepaper</label>
                            </div>
                            <div class="filter-actions">
                                <button class="filter-clear">Clear</button>
                                <button class="filter-apply">Apply</button>
                            </div>
                        </div>
                    </div>

                    <!-- Status Filter Dropdown -->
                    <div class="filter-dropdown" data-filter="status">
                        <button class="filter-toggle">
                            <span>Status</span>
                            <span class="filter-arrow">▼</span>
                        </button>
                        <div class="filter-menu">
                            <div class="filter-option">
                                <input type="checkbox" id="status-all" data-value="all" checked>
                                <label for="status-all">All Status</label>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" id="status-accepted" data-value="accepted">
                                <label for="status-accepted">Accepted</label>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" id="status-rejected" data-value="rejected">
                                <label for="status-rejected">Rejected</label>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" id="status-requested" data-value="requested">
                                <label for="status-requested">Requested</label>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" id="status-in-progress" data-value="in-progress">
                                <label for="status-in-progress">In Progress</label>
                            </div>
                            <div class="filter-actions">
                                <button class="filter-clear">Clear</button>
                                <button class="filter-apply">Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter Chips Display -->
            <div class="filter-chips" id="filterChips">
                <!-- Filter chips akan muncul di sini -->
            </div>

            <!-- TABLE -->
            <div class="table-wrapper">
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Operator</th>
                            <th>Status</th>
                            <th>Note Admin</th>
                            <th>Action</th>
                        </tr>
                    </thead>
            
                    <tbody>
                        @foreach ($contents as $content)
                            <tr>
                                <td>{{ $content->title }}</td>
                                <td>{{ ucfirst($content->type) }}</td>
                                <td>{{ \Carbon\Carbon::parse($content->date)->format('d M Y') }}</td>
                                <td>
                                    <span class="tag operator">{{ $content->operator_name }}</span>
                                </td>
            
                                <td>
                                    @php
                                        $statusClass = 'requested';
                                        if(in_array($content->status, ['approved','accepted'])) $statusClass = 'accepted';
                                        if($content->status == 'rejected') $statusClass = 'rejected';
                                    @endphp
                                    <span class="tag {{ $statusClass }}">
                                        {{ ucfirst($content->status) }}
                                    </span>
                                </td>
            
                                <td>{{ $content->note_admin ?? '-' }}</td>
            
                                <td class="action-cell">
                                    <div>
                                        <div class="action-buttons">
                                            <!-- Preview Button -->
                                            <a href="{{ route('admin.content.preview', [$content->table, $content->id]) }}"
                                               class="view-btn" title="Preview Content">
                                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4b5563" stroke-width="1.5">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                                    <circle cx="12" cy="12" r="3"/>
                                                </svg>
                                            </a>
                                            
                                            @if($content->status === 'requested')
                                                <!-- Approve Button -->
                                                <form action="{{ url('/admin/content/' . $content->table . '/' . $content->id . '/approve') }}"
                                                      method="POST" class="inline-form">
                                                    @csrf
                                                    <button type="submit" class="success" title="Approve">
                                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4b5563" stroke-width="1.5">
                                                            <polyline points="20 6 9 17 4 12"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                                
                                                <!-- Reject Form -->
                                                <div class="reject-form-wrapper">
                                                    <button class="danger reject-toggle" title="Reject" data-id="{{ $content->id }}">
                                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4b5563" stroke-width="1.5">
                                                            <line x1="18" y1="6" x2="6" y2="18"/>
                                                            <line x1="6" y1="6" x2="18" y2="18"/>
                                                        </svg>
                                                    </button>
                                                    <form id="reject-form-{{ $content->id }}"
                                                          action="{{ url('/admin/content/' . $content->table . '/' . $content->id . '/reject') }}"
                                                          method="POST" 
                                                          style="display: none; position: absolute; background: white; padding: 10px; border: 1px solid #ddd; border-radius: 8px; z-index: 10;">
                                                        @csrf
                                                        <input type="text" name="note_admin" placeholder="Reason for rejection" 
                                                               class="border px-2 py-1 text-sm rounded" style="min-width: 200px;">
                                                        <button type="submit" class="ml-2 text-red-600 text-sm font-medium">Submit</button>
                                                    </form>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- TABLE -->
            <!-- <div class="table-wrapper">
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Operator</th>
                            <th>Status</th>
                            <th>Note Admin</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($contents as $content)
                            <tr>
                                <td>{{ $content->title }}</td>
                                <td>{{ ucfirst($content->type) }}</td>
                                <td>{{ \Carbon\Carbon::parse($content->date)->format('d M Y') }}</td>
                                <td>{{ $content->operator_name }}</td>

                                <td>
                                    <span
                                        class="status 
                                    {{ $content->status == 'approved' ? 'active' : ($content->status == 'rejected' ? 'inactive' : 'pending') }}">
                                        {{ ucfirst($content->status) }}
                                    </span>
                                </td>

                                <td>{{ $content->note_admin ?? '-' }}</td>

                                <td class="actions flex gap-2"> -->

                                    <!-- Preview -->
                                    <!-- <a href="/admin/content/{{ $content->table }}/{{ $content->id }}"
                                        class="text-blue-600 underline">
                                        Preview
                                    </a> -->

                                    <!-- Approve -->
                                    <!-- <form
                                        action="{{ url('/admin/content/' . $content->table . '/' . $content->id . '/approve') }}"
                                        method="POST">
                                        @csrf
                                        <button class="text-green-600">Approve</button>
                                    </form> -->

                                    <!-- Reject -->
                                    <!-- <form
                                        action="{{ url('/admin/content/' . $content->table . '/' . $content->id . '/reject') }}"
                                        method="POST" class="flex items-center gap-1">
                                        @csrf
                                        <input type="text" name="note_admin" placeholder="Reason"
                                            class="border px-2 text-sm">
                                        <button class="text-red-600">Reject</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody> -->
                    <!-- <thead>
                            <tr>
                                <th style="width: 20%;">Title</th>
                                <th style="width: 15%;">Type</th>
                                <th style="width: 12%;">Date</th>
                                <th style="width: 15%;">Operator</th>
                                <th style="width: 12%;">Status</th>
                                <th style="width: 16%;">Note</th>
                                <th style="width: 10%;">Action</th>
                            </tr>
                        </thead> -->

                    <!-- <tbody> -->
                    <!-- Row 1 -->
                    <!-- <tr>
                                <td>Getting Started with Web Development</td>
                                <td>Article</td>
                                <td>11/11/2025</td>
                                <td><span class="tag operator">Gunawan</span></td>
                                <td>
                                    <span class="badge requested">Requested</span>
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
                            </tr> -->

                    <!-- Row 2 -->
                    <!-- <tr>
                                <td>Advanced CSS Techniques</td>
                                <td>Tutorial</td>
                                <td>01/11/2025</td>
                                <td><span class="tag operator">Adi</span></td>
                                <td>
                                    <span class="badge rejected">Rejected</span>
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
                            </tr> -->

                    <!-- Row 3 -->
                    <!-- <tr>
                                <td>JavaScript Best Practices</td>
                                <td>Guide</td>
                                <td>06/11/2025</td>
                                <td><span class="tag operator">Bagas</span></td>
                                <td>
                                    <span class="badge accepted">Accepted</span>
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
                            </tr> -->

                    <!-- Row 4 -->
                    <!-- <tr>
                                <td>Responsive Design Principles</td>
                                <td>Article</td>
                                <td>05/11/2025</td>
                                <td><span class="tag operator">Gunawan</span></td>
                                <td>
                                    <span class="badge rejected">Rejected</span>
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
                            </tr> -->

                    <!-- Row 5 -->
                    <!-- <tr>
                                <td>Backend Security Basics</td>
                                <td>Whitepaper</td>
                                <td>03/11/2025</td>
                                <td><span class="tag operator">Adi</span></td>
                                <td>
                                    <span class="badge rejected">Rejected</span>
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
                            </tr> -->
                    <!-- </tbody> -->
                <!-- </table>
            </div> -->
            <!-- PAGINATION -->
            <div class="mt-4">
                {{ $contents->links('pagination::tailwind') }}
            </div>
            <!-- <div class="pagination">
                <span class="prev">❮</span>
                <span class="page-number active">1</span>
                <span class="page-number">2</span>
                <span class="page-number">3</span>
                <span class="next">❯</span>
            </div> -->

        </main>
    </div>
    </div>

    <!-- Optional JavaScript for Interactions -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
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

        document.addEventListener('DOMContentLoaded', function () {
            // Filter dropdown functionality
            const filterDropdowns = document.querySelectorAll('.filter-dropdown');
            const filterChipsContainer = document.getElementById('filterChips');
            let activeFilters = {
                type: [],
                status: [],
                date: 'all'
            };

            // Toggle filter dropdown
            filterDropdowns.forEach(dropdown => {
                const toggle = dropdown.querySelector('.filter-toggle');
                const menu = dropdown.querySelector('.filter-menu');
                const filterType = dropdown.getAttribute('data-filter');
                const clearBtn = menu.querySelector('.filter-clear');
                const applyBtn = menu.querySelector('.filter-apply');

                // Toggle dropdown
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

                // Handle checkbox changes
                const checkboxes = menu.querySelectorAll('input[type="checkbox"]');
                const radios = menu.querySelectorAll('input[type="radio"]');

                checkboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', function () {
                        const value = this.getAttribute('data-value');
                        const isAll = value === 'all';

                        if (isAll && this.checked) {
                            // Uncheck other checkboxes
                            checkboxes.forEach(cb => {
                                if (cb !== this) cb.checked = false;
                            });
                        } else if (!isAll && this.checked) {
                            // Uncheck "All" if specific option selected
                            const allCheckbox = menu.querySelector('input[data-value="all"]');
                            if (allCheckbox) allCheckbox.checked = false;
                        }

                        updateOptionSelection(this);
                    });
                });

                radios.forEach(radio => {
                    radio.addEventListener('change', function () {
                        updateOptionSelection(this);
                    });
                });

                // Clear button
                clearBtn.addEventListener('click', function (e) {
                    e.stopPropagation();

                    if (filterType === 'date') {
                        // For date radio buttons
                        const allRadio = menu.querySelector('input[data-value="all"]');
                        if (allRadio) allRadio.checked = true;
                    } else {
                        // For type/status checkboxes
                        checkboxes.forEach(checkbox => {
                            checkbox.checked = checkbox.getAttribute('data-value') === 'all';
                        });
                    }

                    updateOptionSelection(this);
                });

                // Apply button
                applyBtn.addEventListener('click', function (e) {
                    e.stopPropagation();

                    if (filterType === 'date') {
                        const selectedRadio = menu.querySelector('input[name="date"]:checked');
                        activeFilters.date = selectedRadio ? selectedRadio.getAttribute('data-value') : 'all';
                    } else {
                        const selectedCheckboxes = menu.querySelectorAll('input[type="checkbox"]:checked');
                        activeFilters[filterType] = Array.from(selectedCheckboxes)
                            .map(cb => cb.getAttribute('data-value'))
                            .filter(value => value !== 'all');
                    }

                    updateFilterChips();
                    applyFilters();
                    dropdown.classList.remove('active');
                });

                // Update visual selection
                function updateOptionSelection(element) {
                    const option = element.closest('.filter-option');
                    const allOptions = menu.querySelectorAll('.filter-option');

                    allOptions.forEach(opt => opt.classList.remove('selected'));

                    if (filterType === 'date') {
                        const selectedRadio = menu.querySelector('input[name="date"]:checked');
                        if (selectedRadio) {
                            selectedRadio.closest('.filter-option').classList.add('selected');
                        }
                    } else {
                        const selectedCheckboxes = menu.querySelectorAll('input[type="checkbox"]:checked');
                        selectedCheckboxes.forEach(cb => {
                            cb.closest('.filter-option').classList.add('selected');
                        });
                    }
                }

                // Initialize selection
                if (filterType === 'date') {
                    const defaultRadio = menu.querySelector('input[data-value="all"]');
                    if (defaultRadio) {
                        defaultRadio.checked = true;
                        defaultRadio.closest('.filter-option').classList.add('selected');
                    }
                } else {
                    const defaultCheckbox = menu.querySelector('input[data-value="all"]');
                    if (defaultCheckbox) {
                        defaultCheckbox.checked = true;
                        defaultCheckbox.closest('.filter-option').classList.add('selected');
                    }
                }
            });

            // Close dropdowns when clicking outside
            document.addEventListener('click', function () {
                filterDropdowns.forEach(dropdown => {
                    dropdown.classList.remove('active');
                });
            });

            // Prevent dropdown close when clicking inside
            document.querySelectorAll('.filter-menu').forEach(menu => {
                menu.addEventListener('click', function (e) {
                    e.stopPropagation();
                });
            });

            // Update filter chips display
            function updateFilterChips() {
                filterChipsContainer.innerHTML = '';

                // Type chips
                if (activeFilters.type.length > 0) {
                    activeFilters.type.forEach(type => {
                        if (type !== 'all') {
                            const chip = createFilterChip('Type', type);
                            filterChipsContainer.appendChild(chip);
                        }
                    });
                }

                // Status chips
                if (activeFilters.status.length > 0) {
                    activeFilters.status.forEach(status => {
                        if (status !== 'all') {
                            const chip = createFilterChip('Status', status);
                            filterChipsContainer.appendChild(chip);
                        }
                    });
                }

                // Date chip
                if (activeFilters.date !== 'all') {
                    const chip = createFilterChip('Date', activeFilters.date);
                    filterChipsContainer.appendChild(chip);
                }

                // Show/hide chips container
                if (filterChipsContainer.children.length > 0) {
                    filterChipsContainer.style.display = 'flex';
                } else {
                    filterChipsContainer.style.display = 'none';
                }
            }

            // Create filter chip element
            function createFilterChip(label, value) {
                const chip = document.createElement('div');
                chip.className = 'filter-chip';
                chip.innerHTML = `
            <span>${label}: ${formatValue(value)}</span>
            <button class="filter-chip-remove" data-filter="${label.toLowerCase()}" data-value="${value}">×</button>
        `;

                // Add remove functionality
                const removeBtn = chip.querySelector('.filter-chip-remove');
                removeBtn.addEventListener('click', function () {
                    const filterType = this.getAttribute('data-filter');
                    const valueToRemove = this.getAttribute('data-value');

                    if (filterType === 'date') {
                        activeFilters.date = 'all';
                        const dateDropdown = document.querySelector('.filter-dropdown[data-filter="date"]');
                        const allRadio = dateDropdown.querySelector('input[data-value="all"]');
                        if (allRadio) allRadio.checked = true;
                    } else {
                        activeFilters[filterType] = activeFilters[filterType].filter(v => v !== valueToRemove);
                        const filterDropdown = document.querySelector(`.filter-dropdown[data-filter="${filterType}"]`);
                        const checkbox = filterDropdown.querySelector(`input[data-value="${valueToRemove}"]`);
                        if (checkbox) checkbox.checked = false;

                        // If no specific filters selected, check "All"
                        if (activeFilters[filterType].length === 0) {
                            const allCheckbox = filterDropdown.querySelector('input[data-value="all"]');
                            if (allCheckbox) allCheckbox.checked = true;
                        }
                    }

                    updateFilterChips();
                    applyFilters();
                });

                return chip;
            }

            // Format value for display
            function formatValue(value) {
                return value.split('-').map(word =>
                    word.charAt(0).toUpperCase() + word.slice(1)
                ).join(' ');
            }

            // Apply filters to table
            function applyFilters() {
                const rows = document.querySelectorAll('.content-table tbody tr');

                rows.forEach(row => {
                    let shouldShow = true;

                    // Type filter
                    if (activeFilters.type.length > 0) {
                        const typeCell = row.children[1].textContent.toLowerCase();
                        if (!activeFilters.type.includes(typeCell.toLowerCase())) {
                            shouldShow = false;
                        }
                    }

                    // Status filter
                    if (activeFilters.status.length > 0) {
                        const statusElement = row.querySelector('.status-toggle span:first-child');
                        if (statusElement) {
                            const status = statusElement.textContent.toLowerCase();
                            if (!activeFilters.status.includes(status)) {
                                shouldShow = false;
                            }
                        }
                    }

                    // Date filter (basic implementation)
                    if (activeFilters.date !== 'all') {
                        // Add date filtering logic here
                        console.log('Date filter:', activeFilters.date);
                    }

                    // Show/hide row
                    row.style.display = shouldShow ? '' : 'none';
                });

                console.log('Active filters:', activeFilters);
            }

            // Initialize filter chips
            updateFilterChips();

            // ... existing JavaScript code for status dropdown, pagination, etc. ...

            // Tambahkan di dalam DOMContentLoaded event
            document.addEventListener('DOMContentLoaded', function () {
                // Fungsi untuk mengecek apakah tabel membutuhkan scroll
                function checkTableScroll() {
                    const tableWrapper = document.querySelector('.table-wrapper');
                    const table = document.querySelector('.content-table');
                    const tbody = table.querySelector('tbody');

                    if (!tableWrapper || !table) return;

                    // Cek jika tidak ada data
                    const rows = tbody.querySelectorAll('tr');
                    const hasVisibleRows = Array.from(rows).some(row =>
                        row.style.display !== 'none' && row.style.display !== ''
                    );

                    if (!hasVisibleRows) {
                        // Jika tidak ada data yang visible
                        tableWrapper.classList.add('no-data');
                        return;
                    }

                    tableWrapper.classList.remove('no-data');

                    // Cek apakah konten tabel lebih lebar dari wrapper
                    const tableWidth = table.scrollWidth;
                    const wrapperWidth = tableWrapper.clientWidth;

                    if (tableWidth > wrapperWidth) {
                        tableWrapper.style.overflowX = 'auto';
                    } else {
                        tableWrapper.style.overflowX = 'hidden';
                    }

                    // Cek apakah konten lebih tinggi dari wrapper
                    const tableHeight = table.offsetHeight;
                    const wrapperHeight = tableWrapper.clientHeight;

                    if (tableHeight > wrapperHeight) {
                        tableWrapper.style.overflowY = 'auto';
                    } else {
                        tableWrapper.style.overflowY = 'hidden';
                    }
                }

                // Panggil fungsi saat pertama kali load
                setTimeout(checkTableScroll, 100);

                // Panggil saat filter berubah
                window.addEventListener('filterApplied', checkTableScroll);

                // Panggil saat ukuran window berubah
                window.addEventListener('resize', checkTableScroll);

                // Buat custom event untuk filter
                function applyFilters() {
                    // ... kode filter yang sudah ada ...

                    // Setelah filter diaplikasikan
                    setTimeout(checkTableScroll, 50);
                }

                // Tambahkan pesan "No Data" ke HTML
                const tableWrapper = document.querySelector('.table-wrapper');
                if (tableWrapper) {
                    const noDataMessage = document.createElement('div');
                    noDataMessage.className = 'no-data-message';
                    noDataMessage.textContent = 'No content found matching your filters';
                    tableWrapper.appendChild(noDataMessage);
                }
            });
        });
    </script>

</body>

</html>