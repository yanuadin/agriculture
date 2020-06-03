<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php
        $role = strtolower(Auth::user()->role);
        if($role == 'super admin')
            $role = 'super-admin';
    ?>
    <div class="sidebar">
        <div class="col-md text-center">
            <a href="{{ route($role.'.dashboard') }}" class="brand-link">
                <span class="fas fa-home mr-1"></span>
                <span class="brand-text font-weight-light">KONCO TANI</span>
            </a>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/_user.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @if(Auth::user()->role == 'Admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.item.index') }}" class="nav-link @if(Route::currentRouteName() == 'admin.item.index'){{'active'}}@endif">
                            <i class="nav-icon far fa-clipboard"></i>
                            <p>
                                Data Barang
                            </p>
                        </a>
                    </li>
                @endif
                    @if(Auth::user()->role == 'Super Admin')
                        <li class="nav-item">
                            <a href="{{ route('super-admin.user-admin') }}" class="nav-link @if(Route::currentRouteName() == 'super-admin.user-admin'){{'active'}}@endif">
                                <i class="nav-icon far fa-user"></i>
                                <p>
                                    User Admin
                                </p>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->role == 'Super Admin')
                        <li class="nav-item">
                            <a href="{{ route('super-admin.user-customer') }}" class="nav-link @if(Route::currentRouteName() == 'super-admin.user-customer'){{'active'}}@endif">
                                <i class="nav-icon far fa-user"></i>
                                <p>
                                    User Customer
                                </p>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->role == 'Super Admin')
                        <li class="nav-item">
                            <a href="{{ route('super-admin.order-monitoring') }}" class="nav-link @if(Route::currentRouteName() == 'super-admin.order-monitoring'){{'active'}}@endif">
                                <i class="nav-icon far fa-clipboard"></i>
                                <p>
                                    Order Monitoring
                                </p>
                            </a>
                        </li>
                    @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
