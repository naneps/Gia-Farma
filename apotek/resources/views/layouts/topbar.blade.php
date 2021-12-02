@section('css')


@endsection
<!-- navbar background color -->
<div class="navbar-bg"></div>
<!-- navbar -->
<nav class="navbar navbar-expand-lg main-navbar">
    <!-- navbar nav left -->
    <form class="form-inline mr-auto">
        <!-- navbar toggler -->
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a>
            </li>
        </ul>
        <!-- navbar search -->

    </form>
    <!-- navbar right -->
    <ul class="navbar-nav navbar-right">
        <!-- navbar notification toggle -->
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <!-- navbar notification dropdown -->
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Notifications
                    <div class="float-right">
                        <a href="#">View All</a>
                    </div>
                </div>
                <!-- navbar notification dropdown content -->
                <div class="dropdown-list-content">
                    <!-- navbar notification dropdown item -->
                    <a href="#" class="dropdown-item">
                        <img src="../dist/img/avatar/avatar-5.png" class="rounded-circle dropdown-item-img">
                        <div class="dropdown-item-desc">
                            <b>Alfa Zulkarnain</b> has moved task <b>Add logo</b> to <b>Done</b>
                            <div class="time">Yesterday</div>
                        </div>
                    </a>

                </div>
            </div>
        </li>
        <!-- navbar right item -->
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('/img/avatar/avatar-1.png') }}" width="30" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi,</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <a href="features-profile.html" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="features-activities.html" class="dropdown-item has-icon">
                    <i class="fas fa-bolt"></i> Activities
                </a>
                <a href="features-settings.html" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ url('/logout') }}" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
