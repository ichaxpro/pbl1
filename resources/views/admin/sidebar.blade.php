<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

<div class="sidebar">
    <div class="sidebar-header">
        <img src="{{ asset('images/logo_dt3.png') }}" alt="Logo" class="logo">
        <div class="header-text">
            <div class="title">Admin Page</div>
            <div class="subtitle">Lab Teknologi Data</div>
        </div>
    </div>

    <hr class="divider">
    <ul class="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}"
                class="menu-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <img src="{{ asset('images/Dashboard_Logo.png') }}" class="sidebar-icon">
                <span>Dashboard</span>
            </a>
        </li>

        <li>
            <a href="{{ route('content.management') }}"
                class="menu-item {{ Request::routeIs('content.management') ? 'active' : '' }}">
                <img src="{{ asset('images/Management_Content_Logo.png') }}" class="sidebar-icon">
                <span>Management Content</span>
            </a>
            <!-- <a href="{{ url('/content-management-admin') }}" 
                       class="menu-item {{ Request::is('management-content') ? 'active' : '' }}">
                        <img src="{{ asset('images/Management_Content_Logo.png') }}" class="icon2">
                        <span>Management Content</span>
                    </a> -->
        </li>

        <li>
            <a href="{{ url('/user-management') }}"
                class="menu-item {{ Request::is('user-management') ? 'active' : '' }}">
                <img src="{{ asset('images/approval_icon.png') }}" class="sidebar-icon">
                <span>User Management</span>
            </a>
        </li>
    </ul>
</div>