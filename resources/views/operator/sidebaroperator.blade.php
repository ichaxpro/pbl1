
        <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">


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
                        <img src="{{ asset('images/approval_icon.png') }}" class="icon4">
                        <span>Approval Status</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/gallery') }}" 
                       class="menu-item {{ Request::is('gallery') ? 'active' : '' }}">
                        <img src="{{ asset('images/gallery_icon.png') }}" class="icon4">
                        <span>Gallery</span>
                    </a>
                </li>
            </ul>

        </div>
