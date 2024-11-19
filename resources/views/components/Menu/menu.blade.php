<style>
    #sidebar-menu .logo-box {
        text-align: center;
        padding: 20px 0;
    }

    #sidebar-menu .admin-title {
        font-size: 20px;
        font-weight: bold;
        margin: 10px 0;
        color: #333;
        font-family: 'Arial', sans-serif;
    }

    #sidebar-menu .logo-lg img {
        margin-top: -5px;
    }

    .logo-circle {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
    }

    .admin-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
    }

    #sidebar-menu .admin-title {
        font-size: 22px;
        font-weight: bold;
        color: #4a90e2;
        margin-bottom: 15px;
        font-family: 'Arial', sans-serif;
    }

    .logo-circle {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background-color: #ffffff;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto 20px auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    #side-menu {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    #side-menu .menu-title {
        font-size: 16px;
        font-weight: bold;
        color: #4a4a4a;
        margin-bottom: 70px;
        text-transform: uppercase;
    }

    #side-menu li {
        margin-bottom: 10px;
    }

    #side-menu li a {
        padding: 10px 15px;
    }

    #side-menu li a, #side-menu li button {
        display: flex;
        align-items: center;
        padding: 10px 15px;
        color: #333;
        text-decoration: none;
        border-radius: 4px;
        font-size: 16px;
        font-weight: normal;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    #side-menu li svg {
        margin-right: 50px;
        fill: currentColor;
    }

    #side-menu li form button.tp-link {
        color: #333;
    }

    #side-menu li form button.tp-link:hover {
        background-color: #f0f0f0;
        color: #4a90e2;
    }

</style>
<!-- Left Sidebar Start -->
<div class="app-sidebar-menu">
    <div class="h-100 menuitem-active" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div><div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: scroll hidden;">
                        <div class="simplebar-content" style="padding: 0px;">
                            <!--- Sidemenu -->
                            <div id="sidebar-menu">
                                <div class="logo-box">
                                    <h3>ADMIN</h3>
                                    <div class="logo-circle">
                                        <img src="{{ asset('assets/images/admin-icon.png') }}" alt="Admin" class="admin-icon">
                                    </div>
                                </div>

                                <ul id="side-menu">
                                    <li class="menu-title"></li>
                                    <!-- Dashboard -->
                                    <li class="menuitem-active">
                                        <a class="tp-link active" href="{{ route('admin.dashboard') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                            </svg>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <!-- Danh Mục Sản Phẩm -->
                                    <li class="menuitem-active">
                                        <a class="tp-link active" href="{{ route('admin.categories.index') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive"><polyline points="21 8 21 21 3 21 3 8"></polyline><rect x="1" y="3" width="22" height="5"></rect><line x1="10" y1="12" x2="14" y2="12"></line></svg>
                                            <span>Quản Lý Danh Mục</span>
                                        </a>
                                    </li>
                                    <!-- Quản Lý Sản Phẩm -->
                                    <li class="menuitem-active">
                                        <a class="tp-link active" href="#">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg>
                                            <span>Quản Lý Sản Phẩm</span>
                                        </a>
                                    </li>
                                    <!-- Quản Lý Đơn Hàng -->
                                    <li class="menuitem-active">
                                        <a class="tp-link active" href="#">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="9" y1="15" x2="15" y2="15"></line></svg>
                                            <span>Quản Lý Đơn Hàng</span>
                                        </a>
                                    </li>
                                    <!-- Quản Lý Thống Kê -->
                                    <li class="menuitem-active">
                                        <a class="tp-link active" href="#">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                            <span>Quản Lý Thống Kê</span>
                                        </a>
                                    </li>
                                    <!-- Quản Lý Bình Luận -->
                                    <li class="menuitem-active">
                                        <a class="tp-link active" href="#">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                            <span>Quản Lý Bình Luận</span>
                                        </a>
                                    </li>
                                    <!-- Quản Lý Liên Hệ -->
                                    <li class="menuitem-active">
                                        <a class="tp-link active" href="#">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                            <span>Quản Lý Liên Hệ</span>
                                        </a>
                                    </li>
                                    <!-- Đăng Xuất -->
                                    <li class="menuitem-active">
                                        <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="tp-link" style="background: none; border: none; padding: 0; color: inherit; font: inherit; cursor: pointer;">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path><line x1="12" y1="2" x2="12" y2="12"></line></svg>
                                                <span>Đăng Xuất</span>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
