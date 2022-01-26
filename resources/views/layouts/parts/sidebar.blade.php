<nav class="navbar-vertical navbar">
    <div class="nav-scroller">
        <!-- Brand logo -->
        <a class="navbar-brand" href="/">
            <img src=" " alt="" />
        </a>
        <!-- Navbar nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item">
                <a class="nav-link has-arrow  {{ request()->is('/dashboard') ? 'active' : '' }} "
                    href="{{ url('/dashboard') }}">
                    <i class="nav-icon icon-xs me-2 fa fa-home"></i> Dashboard
                </a>

            </li>


            <!-- Nav item -->
            <li class="nav-item">
                <div class="navbar-heading text-white">Main</div>
            </li>





<li class="nav-item"> <a href="{{ url("admin/student") }}"
        class="nav-link has-arrow {{ Request::is("admin/student*") ? "active":""}}" ><i class="nav-icon icon-xs me-2 fa fa-list"></i> Student</a>

        </li>