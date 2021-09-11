<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/dashboard') }}"> <img src="" class="header-logo" /> <span
                    class="logo-name">{{ config('app.name') }}</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown {{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="{{ url('/dashboard') }}" class="nav-link"><i
                        data-feather="monitor"></i><span>Dashboard</span></a>
            </li> 
        </ul>
    </aside>
</div>

<li class="dropdown {{ Request::is("admin/student*") ? "active":""}}"> <a href="{{ url("admin/student") }}"
        class="nav-link" ><i data-feather="copy"></i><span>Student </span></a>

</li>