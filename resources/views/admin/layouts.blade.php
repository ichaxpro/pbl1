<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/topbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_management.css') }}">
</head>

<body>

    <!-- SIDEBAR -->
    @include('sidebar')

    <!-- MAIN CONTENT WRAPPER -->
    <div class="main-container">

        <!-- TOPBAR -->
        @include('topbar')

        <!-- PAGE CONTENT -->
        <div class="content-area">
            @yield('content')
        </div>

    </div>

</body>
</html>
