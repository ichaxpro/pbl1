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
                        <button class="filter-btn">Type</button>
                        <button class="filter-btn">Status</button>
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

</script>
</body>
</html>
