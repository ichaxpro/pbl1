<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator Gallery</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> -->

    <!-- <link rel="stylesheet" href="{{ asset('css/topbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/operator_gallery.css') }}">

    <style>
        body {
            margin: 0;
            padding: 0;
            background: #F4F9FA;
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">

    <!-- Responsive Layout -->
    <div class="fle w-full min-h-screen">

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

        
        <!-- Main content -->
        <main class="flex-1 overflow-y-auto px-8 py-6">
            <!-- Page Content -->
            <div class="max-w-full pl-12">
                    <h1>Gallery</h1>
                    <div class="actions-toolbar">
                        <div class="search-input">
                            <span class="icon-placeholder-small"></span>
                            <input type="text" placeholder="Search...">
                        </div>
                        <button class="btn-add">+ Add</button>
                    </div>

                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th style="width: 50px;">No</th>
                                    <th>URL Image</th>
                                    <th>Upload Date</th>
                                    <th style="width: 100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>1</td>
                                    <td>Lorem Ipsum</td>
                                    <td>11 November 2025</td>
                                    <td class="action-cell">
                                        <button class="btn-action btn-copy">
                                            <svg viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M16 1H4C2.9 1 2 1.9 2 3V17H4V3H16V1ZM19 5H8C6.9 5 6 5.9 6 7V21C6 22.1 6.9 23 8 23H19C20.1 23 21 22.1 21 21V7C21 5.9 20.1 5 19 5ZM8 21V7H19V21H8Z" />
                                            </svg>
                                        </button>

                                        <button class="btn-action btn-delete">
                                            <svg viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5 4H19V6H5V4ZM6 7V19C6 20.1 6.9 21 8 21H16C17.1 21 18 20.1 18 19V7H6ZM10 9V17H12V9H10ZM14 9V17H16V9H14ZM9 2H15V4H9V2Z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>

                                <?php for ($i = 0; $i < 10; $i++): ?>
                                <tr class="empty-row">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <?php endfor; ?>

                            </tbody>
                        </table>
                    </div>

                    <div class="pagination mt-4">
                        <a href="#">&lt;</a>
                        <a class="page-active" href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">&gt;</a>
                    </div>
            </div>
        </main>
    </div>
</body>

</html>