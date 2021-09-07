@if ($configData['mainLayoutType'] == 'horizontal')
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu {{ $configData['navbarColor'] }} navbar-fixed">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item"><a class="navbar-brand" href="dashboard-analytics">
                        <div class="brand-logo"></div>
                    </a></li>
            </ul>
        </div>
    @else
        <nav
            class="header-navbar navbar-expand-lg navbar navbar-with-menu {{ $configData['navbarClass'] }} navbar-light navbar-shadow {{ $configData['navbarColor'] }}">
@endif
<div class="navbar-wrapper">
    <div class="navbar-container content">
        <div class="navbar-collapse" id="navbar-mobile">
            <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav">
                    <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                            class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                class="ficon feather icon-menu"></i></a></li>
                </ul>

                <ul class="nav navbar-nav">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link nav-link-expand">
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="dropdown nav-item">
                        <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span>Products</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                            <a class="dropdown-item" href="#">
                                Cloths</a>
                            <a class="dropdown-item" href="#">
                                Foods</a>
                            <a class="dropdown-item" href="#">
                                Medicine</a>
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link nav-link-expand">
                            <span>Services</span>
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link nav-link-expand">
                            <span>About Author</span>
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link nav-link-expand">
                            <span>Contact Us</span>
                        </a>
                    </li>
                </ul>
            </div>
            <ul class="nav navbar-nav float-right">
                @if (auth()->check())
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                            href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">John
                                    Doe</span><span class="user-status">Available</span></div><span><img
                                    class="round" src="{{ asset('images/portrait/small/avatar-s-11.jpg') }}"
                                    alt="avatar" height="40" width="40" /></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="/profile"><i class="feather icon-user"></i> Profile</a>
                            <a class="dropdown-item" href="/orders"><i class="feather icon-mail"></i> My Orders</a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="auth-login"><i class="feather icon-power"></i> Logout</a>
                            <form id="logout-form" action="login" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-success btn-md mr-2" href="#">
                            Log In
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="btn btn-primary btn-md" href="#">
                            Sign Up
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
</nav>
