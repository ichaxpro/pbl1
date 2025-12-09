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

<body class="bg-gray-50">

 <div class="flex w-full min-h-screen">

        <!-- Sidebar (hidden on small screens) -->
        <aside class="w-64 h-screen border-r flex flex-col sticky top-0">
            @include('operator.sidebaroperator')
        </aside>

        <div class="flex-1 flex flex flex-col min-h screen">
            <!-- Topbar -->
            <div class="w-full">
                @include('operator.topbar')
            </div>

        </div>

        <!-- Content -->
        <main class="flex-grow p-8 overflow-auto pl-20">

            <!-- Content Management PART -->
            <div class="page">

                <h1 class="page-title">Content Management</h1>

                <div class="top-bar">
 
                    <!-- Search -->
                    <div class="search-box">
                        <img src="{{ asset('images/search_icon.png') }}" class="search-icon">
                        <input type="text" placeholder="Search..." class="search-text">
                    </div>

                    <!-- Add Button -->
                    <button class="btn-add text-[#1E4A52]">
                        <span class="plus-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </span>
                        Add
                    </button>
                    <div class="overlay" id="overlay">
                    <div class="overlay-box">
                        <h2 class="overlay-header">Add Content</h2>
                    
                        <a href="{{ asset('addActivities') }}" class="overlay-btn">Add Activities</a>
                        <a href="{{ asset('addPublications') }}" class="overlay-btn">Add Publication</a>
                        <a href="{{ asset('addNews') }}" class="overlay-btn">Add News</a>
                        <a href="{{ asset('addFacilities') }}" class="overlay-btn">Add Facilities</a>
                    
                        <button class="close-overlay">Close</button>
                    </div>
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

                </div>

                <!-- Table -->
                <div class="table-wrapper">
                    <table>
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
                            <tr>
                                <td>Lorem Ipsum</td>
                                <td>Lorem Ipsum</td>
                                <td>11 November 2025</td>
                                <td><span class="badge accepted">Accepted</span></td>
                                <td class="actions">
                                    <img src="{{ asset('images/delete-icon.png') }}" class="icon-btn">
                                </td>
                            </tr>

                            <tr>
                                <td>Lorem Ipsum</td>
                                <td>Lorem Ipsum</td>
                                <td>01 November 2025</td>
                                <td><span class="badge rejected">Rejected</span></td>
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
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="pagination">
                    <span class="prev">❮</span>
                    <span class="page-number active">1</span>
                    <span class="page-number">2</span>
                    <span class="page-number">3</span>
                    <span class="next">❯</span>
                </div>

            </div>

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

    document.addEventListener('DOMContentLoaded', function() {
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
            toggle.addEventListener('click', function(e) {
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
                checkbox.addEventListener('change', function() {
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
                radio.addEventListener('change', function() {
                    updateOptionSelection(this);
                });
            });
        
            // Clear button
            clearBtn.addEventListener('click', function(e) {
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
            applyBtn.addEventListener('click', function(e) {
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
        document.addEventListener('click', function() {
            filterDropdowns.forEach(dropdown => {
                dropdown.classList.remove('active');
            });
        });
    
        // Prevent dropdown close when clicking inside
        document.querySelectorAll('.filter-menu').forEach(menu => {
            menu.addEventListener('click', function(e) {
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
            removeBtn.addEventListener('click', function() {
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
    });

</script>
</body>
</html>
