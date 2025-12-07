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
        .card,
        .bg-white.card {
            background-color: #CDE3E7 !important;
            box-shadow: 0 6px 14px rgba(2, 6, 23, 0.06);
            border: 1px solid rgba(2, 6, 23, 0.06);
        }
    </style>
</head>

<body class="bg-gray-50">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-[#1E5A63] text-white flex-shrink-0">
        @include('admin.sidebar')
    </aside>

    <!-- Main area -->
    <div class="flex-grow flex flex-col">

        <!-- Topbar -->
        <div>
            @include('admin.topbar')
        </div>

        <!-- Content -->
        <main class="p-8 main-content-spacing">

            <!-- Content Management PART -->
            <div class="page">

                <h1 class="page-title">Content Management</h1>

                                <div class="top-bar">
 
                    <!-- Search -->
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
                                    <button>✏️</button>
                                    <button>🗑️</button>
                                </td>
                            </tr>

                            <tr>
                                <td>Lorem Ipsum</td>
                                <td>Lorem Ipsum</td>
                                <td>01 November 2025</td>
                                <td><span class="badge rejected">Rejected</span></td>
                                <td class="actions">
                                    <button>✏️</button>
                                    <button>🗑️</button>
                                </td>
                            </tr>

                            <tr>
                                <td>Lorem Ipsum</td>
                                <td>Lorem Ipsum</td>
                                <td>06 November 2025</td>
                                <td><span class="badge requested">Requested</span></td>
                                <td class="actions">
                                    <button>✏️</button>
                                    <button>🗑️</button>
                                </td>
                            </tr>

                            <tr>
                                <td>Lorem Ipsum</td>
                                <td>Lorem Ipsum</td>
                                <td>06 November 2025</td>
                                <td><span class="badge requested">Requested</span></td>
                                <td class="actions">
                                    <button>✏️</button>
                                    <button>🗑️</button>
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
</body>
</html>
