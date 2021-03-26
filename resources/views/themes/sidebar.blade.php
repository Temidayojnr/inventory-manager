<div class="vertical-menu">

    <div data-simplebar class="h-100" style="background: #301934;">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="/" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="t-layouts">Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/products" key="t-horizontal">View all Products</a></li>
                        @if (Auth::user()->is_admin == 1)
                            <li><a href="/add" key="t-vertical">Add Product</a></li>
                        @endif
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ol"></i>
                        <span key="t-layouts">Orders</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/orders" key="t-horizontal">All Orders</a></li>
                        <li><a href="/create-order" key="t-vertical">Create Order</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-cart-alt"></i>
                        <span key="t-layouts">Purchase</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/purchase" key="t-horizontal">All Purchases</a></li>
                        <li><a href="/purchase/create" key="t-vertical">Create Purchase</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-file"></i>
                        <span key="t-layouts">Reports</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/reports/inventory" key="t-horizontal">Inventory Report</a></li>
                        <li><a href="/reports/purchase" key="t-vertical">Purchase Report</a></li>
                        <li><a href="" key="t-vertical">Order Report</a></li>
                    </ul>
                </li>

                @if (Auth::user()->is_admin)
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-user"></i>
                            <span key="t-layouts">Users</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="/users" key="t-horizontal">All Users</a></li>
                        </ul>
                    </li>
                @endif

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
