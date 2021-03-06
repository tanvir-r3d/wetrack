<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>
        <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" id="search" aria-label="Search"
                data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
                <div class="search-header">
                    Result
                </div>
                <div id="search-items"></div>

            </div>
        </div>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" height="30"
                    src="{{Session::get("locale") == "bn" ? "/images/bd.png" : "/images/us.png"}}" class="mr-1">
                <div class="d-sm-none d-lg-inline-block">{{Session::get("locale") == "bn" ? "Bangla" : "English"}}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="/localization/en" class="dropdown-item has-icon">
                    <img src="/images/us.png" alt="en" width=30> English
                </a>
                <a href="/localization/bn" class="dropdown-item has-icon">
                    <img src="/images/bd.png" alt="en" width=30> Bangla
                </a>
            </div>
        </li>
    </ul>

    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" height="30"
                    src="{{Auth::user()->user_img ? '/images/user/'.Auth::user()->user_img : 'avatar.png'}}"
                    class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{Auth::user()->username}}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="/profile" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="/contact" class="dropdown-item has-icon">
                    <i class="fas fa-paper-plane"></i> Mail
                </a>
                @can('settings')
                <a href="/settings" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>
                @endcan
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
