<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">RESTO Ilham</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">RB</a>
        </div>

        <ul class="sidebar-menu">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ url('dashboard-general-dashboard') }}">General Dashboard</a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class=''>
                        <a class="nav-link" href="oerders.index">orders</a>
                    </li>
                </ul>
            </li>
        </ul>



        <ul class="sidebar-menu">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Product Manajement</span></a>

                <ul class="dropdown-menu">
                    <li class=''>
                        <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                    </li>
                </ul>

                <ul class="dropdown-menu">
                    <li class=''>
                        <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                    </li>
                </ul>
                {{-- <ul class="dropdown-menu">
                    <li class=''>
                        <a class="nav-link" href=" ">discount</a>
                    </li>
                </ul> --}}

        <ul class="sidebar-menu">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>User Manajement</span></a>
                <ul class="dropdown-menu">
                    <li class=''>
                        <a class="nav-link" href="{{ route('users.index') }}">Users</a>
                    </li>

                </ul>
                {{-- <ul class="dropdown-menu">
                    <li class=''>
                        <a class="nav-link" href="  ">Empoyes</a>
                    </li>
                </ul> --}}
            </li>
        </ul>

        <ul class="sidebar-menu">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Storage</span></a>
                <ul class="dropdown-menu">
                    <li class=''>
                        <a class="nav-link" href="">Stock</a>
                    </li>

                </ul>
                {{-- <ul class="dropdown-menu">
                    <li class=''>
                        <a class="nav-link" href="  ">Empoyes</a>
                    </li>
                </ul> --}}
            </li>
        </ul>

    </aside>
</div>
