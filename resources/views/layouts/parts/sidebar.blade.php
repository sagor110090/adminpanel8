<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ url('/dashboard') }}"> <img src="" class="header-logo" /> <span
                class="logo-name">{{ config('app.name') }}</span>
        </a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown {{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="{{ url('/dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>
      
<li class="dropdown {{ Request::is("admin/service*") ? "active":""}}"> <a href="{{ url("admin/service") }}"
        class="nav-link" ><i data-feather="copy"></i><span>Service </span></a>

</li>
<li class="dropdown {{ Request::is("user/contact-us*") ? "active":""}}"> <a href="{{ url("user/contact-us") }}"
        class="nav-link" ><i data-feather="copy"></i><span>Contact Us </span></a>

</li>