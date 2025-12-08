<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator Gallery</title>

    <!-- CSS Topbar -->
    <link rel="stylesheet" href="{{ asset('css/topbar.css') }}">

    <!-- CSS Sidebar -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <!-- CSS Main Content -->
    <link rel="stylesheet" href="{{ asset('css/operator_gallery.css') }}">

    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            background: #F4F9FA;
            font-family: 'Inter', sans-serif;
        }

        /* Tempat isi dan topbar berada */
        .main-wrapper {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        /* Supaya konten tidak tertutup topbar */
        .content-offset {
            padding: 0;
            height: calc(100vh - 60px);
            overflow-y: auto;
        }
    </style>
</head>

<body>

    <!-- ================= SIDEBAR (TIDAK DIUBAH) ================= -->
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="{{ asset ('images/logo_dt3.png') }}" alt="Logo" class="logo">
            <div class="header-text">
                <div class="title">Operator Page</div>
                <div class="subtitle">Lab Teknologi Data</div>
            </div>
        </div>

        <hr class="divider">
        <ul class="menu">
            <li>
                <a href="{{ route('operator.dashboard') }}" 
                   class="menu-item {{ Request::is('operator/dashboard') ? 'active' : '' }}">
                    <img src="{{ asset('images/Dashboard_Logo.png') }}" class="icon">
                    <span>Dashboard</span>
                </a>
            </li>
        
            <li>
                <a href="{{ url('/content-management') }}" 
                   class="menu-item {{ Request::is('content-management') ? 'active' : '' }}">
                    <img src="{{ asset('images/Management_Content_Logo.png') }}" class="icon2">
                    <span>Management Content</span>
                </a>
            </li>
        
            <li>
                <a href="{{ url('/user-management') }}" 
                   class="menu-item {{ Request::is('user-management') ? 'active' : '' }}">
                    <img src="{{ asset('images/User_Management_Logo.png') }}" class="icon3">
                    <span>User Management</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- ============================================================= -->



    <!-- WRAPPER UNTUK TOPBAR + CONTENT -->
    <div class="main-wrapper">

        <!-- ================= TOPBAR (TIDAK DIUBAH) ================= -->
        <div class="topbar">
            <div class="topbar-right">
                <span class="user-name">Haechan Lee</span>

                <div class="user-menu">
                    <img src="{{ asset('images/lee_haechan.jpg') }}" class="user-avatar" id="userAvatar">

                    <div class="dropdown" id="dropdownMenu">
                        <a href="#" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const avatar = document.getElementById('userAvatar');
            const dropdown = document.getElementById('dropdownMenu');

            avatar.addEventListener('click', (e) => {
                e.stopPropagation();
                dropdown.classList.toggle("show");
            });

            document.addEventListener('click', () => {
                dropdown.classList.remove("show");
            });
        </script>
        <!-- ========================================================== -->



        <!-- ===================== MAIN CONTENT ======================== -->
        <div class="content-offset">

            <div class="main-content">
                <div class="content-body">

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
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16 1H4C2.9 1 2 1.9 2 3V17H4V3H16V1ZM19 5H8C6.9 5 6 5.9 6 7V21C6 22.1 6.9 23 8 23H19C20.1 23 21 22.1 21 21V7C21 5.9 20.1 5 19 5ZM8 21V7H19V21H8Z"/>
                                            </svg>
                                        </button>

                                        <button class="btn-action btn-delete">
                                            <svg viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5 4H19V6H5V4ZM6 7V19C6 20.1 6.9 21 8 21H16C17.1 21 18 20.1 18 19V7H6ZM10 9V17H12V9H10ZM14 9V17H16V9H14ZM9 2H15V4H9V2Z"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Tambahkan baris lainnya -->
                                <?php for($i=0; $i<10; $i++): ?>
                                <tr class="empty-row">
                                    <td></td><td></td><td></td><td></td>
                                </tr>
                                <?php endfor; ?>

                            </tbody>
                        </table>
                    </div>

                    <div class="pagination">
                        <a href="#">&lt;</a>
                        <a class="page-active" href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">&gt;</a>
                    </div>

                </div>
            </div>

        </div>
        <!-- ============================================================ -->

    </div>

</body>
</html>
