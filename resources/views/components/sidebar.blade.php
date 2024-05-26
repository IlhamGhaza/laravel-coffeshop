<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('home') }}">My Cafe</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('home') }}">St</a>
        </div>
        <ul class="sidebar-menu">

            <li class="menu-header">Menu</li>
            <ul class="sidebar-menu">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>User Manajement</span></a>
                    <ul class="dropdown-menu">
                        <li class=''>
                            <a class="nav-link" href="{{ route('user.index') }}">Users</a>
                        </li>

                    </ul>
                    <ul class="dropdown-menu">
                        <li class=''>
                            <a class="nav-link" href="
                            {{ route('employee.index') }}
                            ">Employees</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="sidebar-menu">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Warehouse</span></a>
                    <ul class="dropdown-menu">
                        <li class=''>
                            <a class="nav-link" href="
                            {{ route('inventory.index') }}
                            ">Inventory</a>
                        </li>

                    </ul>
                    <ul class="dropdown-menu">
                        <li class=''>
                            <a class="nav-link" href="
                            {{ route('supplier.index') }}
                            ">Suplier</a>
                        </li>
                    </ul>
                </li>
            </ul>

            {{-- <li>
                <a href="{{ route('user.index') }}" class="nav-link"><i class="fas fa-users"></i><span>Users</span></a>
            </li> --}}

            <li>
                <a href="{{ route('category.index') }}" class="nav-link"><i class="fas fa-box"></i><span>Categories</span></a>
            </li>

            <li>
                <a href="{{ route('product.index') }}" class="nav-link"><i class="fas fa-shopping-cart"></i><span>Products</span></a>
            </li>
            <li>
                <a href="
                {{ route('discount.index') }}
                " class="nav-link"><i class="fas fa-tags"></i><span>Discount</span></a>
            </li>

            <li>
                <a href="{{ route('order.index') }}" class="nav-link"><i class="fas fa-list-alt"></i><span>Order</span></a>

            </li>

            <li>
                <a href="{{ route('customer.index') }}" class="nav-link"><i class="fas fa-user"></i><span>Customers</span></a>
            </li>

            <li>
                <a href="{{ route('reservation.index')}}" class="nav-link"><i class="fas fa-calendar-alt"></i><span>Reservations</span></a>
            </li>

    </aside>
</div>
