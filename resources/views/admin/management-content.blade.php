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

<div class="flex min-h-screen">

    @include('admin.sidebar_collapse')

    <!-- Main content -->
    <div class="flex-grow flex flex-col overflow-hidden">

        @include('admin.topbar')

        <main class="flex-grow p-6 sm:p-10 overflow-auto pl-20">

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
                                <!-- Eye -->
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
                                @include('components.icons.eye')
                            </td>
                        </tr>

                        <!-- Requested Row -->
                        <tr>
                            <td>Lorem Ipsum</td>
                            <td>Lorem Ipsum</td>
                            <td>06/11/2025</td>
                            <td><span class="tag operator">Bagas</span></td>
                            <td><span class="tag requested">Requested</span></td>
                            <td></td>
                            <td class="actions flex gap-2">
                                @include('components.icons.eye')
                                @include('components.icons.cross')
                                @include('components.icons.check')
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
