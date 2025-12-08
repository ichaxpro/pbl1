<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Content Management</title>

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

        <main class="flex-grow p-8 overflow-auto pl-20">

            <h1 class="page-title">Content Management</h1>

            <!-- TOP BAR -->
            <div class="top-bar">

                <!-- Search -->
                <div class="search-box">
                    <img src="{{ asset('images/search_icon.png') }}" class="search-icon">
                    <input type="text" placeholder="Search..." class="search-text">
                </div>

                <!-- Filters -->
                <div class="filters">
                    <span class="filter-label">Filters:</span>
                    <button class="filter-btn">Type</button>
                    <button class="filter-btn">Status</button>
                </div>
            </div>

            <!-- TABLE -->
            <div class="table-wrapper overflow-x-auto">
                <table class="content-table min-w-[800px]">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Operator</th>
                            <th>Status</th>
                            <th>Note</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <!-- Accepted Row -->
                        <tr>
                            <td>Lorem Ipsum</td>
                            <td>Lorem Ipsum</td>
                            <td>11/11/2025</td>
                            <td><span class="tag operator">Gunawan</span></td>
                            <td><span class="tag accepted">Accepted</span></td>
                            <td></td>
                            <td class="actions">
                                <button>
                                    @include('components.icons.eye')
                                </button>
                            </td>
                        </tr>

                        <!-- Rejected Row -->
                        <tr>
                            <td>Lorem Ipsum</td>
                            <td>Lorem Ipsum</td>
                            <td>01/11/2025</td>
                            <td><span class="tag operator">Adi</span></td>
                            <td><span class="tag rejected">Rejected</span></td>
                            <td></td>
                            <td class="actions">
                                <button>
                                    @include('components.icons.eye')
                                </button>
                            </td>
                        </tr>

                        <!-- Requested Row (Diperbaiki: Semua ikon dibungkus dalam button dengan class untuk hover) -->
                        <tr>
                            <td>Lorem Ipsum</td>
                            <td>Lorem Ipsum</td>
                            <td>06/11/2025</td>
                            <td><span class="tag operator">Bagas</span></td>
                            <td><span class="tag requested">Requested</span></td>
                            <td></td>
                            <td class="actions flex gap-2">
                                <button>@include('components.icons.eye')</button>
                                <button class="danger">@include('components.icons.cross')</button>
                                <button class="success">@include('components.icons.check')</button>
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

</body>
</html>