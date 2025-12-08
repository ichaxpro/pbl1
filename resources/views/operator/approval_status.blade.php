<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Status</title>

    <link rel="stylesheet" href="{{ asset('css/approval_status.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .card,
        .bg-white.card {
            background-color: #CDE3E7 !important;
            box-shadow: 0 6px 14px rgba(2, 6, 23, 0.06);
            border: 1px solid rgba(2, 6, 23, 0.06);
        }

        .card .section-title {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .approval-columns>div {
            padding: 1rem 0;
        }

        .approval-columns>div:not(:last-child) {
            border-right: 1px solid rgba(2, 6, 23, 0.06);
        }

        .h3 {
            font-family: poppins;
        }
    </style>

</head>

<body class="bg-gray-50 min-h-screen">

    <!-- Responsive Layout -->
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
        <main class="flex-1 overflow-y-auto px-8 py-6 ml-10">
            <!-- Approval Card -->
            <div class="status-card shadow-md">
                <h2 class="font-semibold mb-2 flex items-center gap-2 ">
                    <img src="{{ asset('images/approval_status.png') }}"  class="logo" style="width: 40px"> Approval Status
                </h2>

                <div class="grid grid-cols-3 text-center mt-4">
                    <div>
                        <p class="label">Requested</p>
                        <h1 class="value">3</h1>
                        <span class="diff">+1 vs yesterday</span>
                    </div>
                    <div>
                        <p class="label">Approved</p>
                        <h1 class="value">1</h1>
                        <span class="diff">+1 vs yesterday</span>
                    </div>
                    <div>
                        <p class="label">Declined</p>
                        <h1 class="value">0</h1>
                        <span class="diff">0 vs yesterday</span>
                    </div>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="search-box mt-4">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search...">
            </div>

            <!-- Table -->
            <div class="table-wrapper shadow-sm">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Upload Date</th>
                            <th>Notes from Admin</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Lorem Ipsum</td>
                            <td>Lorem Ipsum</td>
                            <td>11 November 2025</td>
                            <td>Lorem Ipsum</td>
                            <td><span class="badge accepted">Accepted</span></td>
                        </tr>

                        <tr>
                            <td>Lorem Ipsum</td>
                            <td>Lorem Ipsum</td>
                            <td>01 November 2025</td>
                            <td>Lorem Ipsum</td>
                            <td><span class="badge declined">Declined</span></td>
                        </tr>

                        <tr>
                            <td>Lorem Ipsum</td>
                            <td>Lorem Ipsum</td>
                            <td>06 November 2025</td>
                            <td>Lorem Ipsum</td>
                            <td><span class="badge requested">Requested</span></td>
                        </tr>

                        <tr>
                            <td>Lorem Ipsum</td>
                            <td>Lorem Ipsum</td>
                            <td>06 November 2025</td>
                            <td>Lorem Ipsum</td>
                            <td><span class="badge requested">Requested</span></td>
                        </tr>

                        <!-- Empty rows -->
                        @for($i = 0; $i < 7; $i++)
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="pagination flex justify-end items-center gap-4 mt-3">
                <i class="fa-solid fa-chevron-left text-gray-500"></i>
                <span class="page-number active">1</span>
                <span class="page-number">2</span>
                <span class="page-number">3</span>
                <span>…</span>
                <i class="fa-solid fa-chevron-right text-gray-700"></i>
            </div>
    </div>
    </main>

    </div>
</body>

</html>