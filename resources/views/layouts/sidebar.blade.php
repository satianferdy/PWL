<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        @section('sidebar')
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('user.index') }}">User - List</a></li>
                    {{-- <li><a class="nav-link" href="{{ route('about-us') }}">about-us</a></li>
                    <li><a class="nav-link" href="{{ route('contact-us') }}">contact-us</a></li>
                    <li><a class="nav-link" href="{{ route('news') }}">news</a></li> --}}

                </ul>
            </li>
        @show
    </ul>
</aside>
