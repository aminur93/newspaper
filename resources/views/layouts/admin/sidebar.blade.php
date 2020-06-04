<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('assets/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link {{ Request::routeIs('types','create') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tint"></i>
                        <p>
                            News Types
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('types') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Types</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link {{ Request::routeIs('country','country.create','division_city','division_city.create','zilla_state','zilla_state.create','upzilla_substate','upzilla_substate.create') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-flag"></i>
                        <p>
                            News Country
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('country') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Country</p>
                            </a>

                            <a href="{{ route('division_city') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Division/City</p>
                            </a>

                            <a href="{{ route('zilla_state') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Zilla/State</p>
                            </a>

                            <a href="{{ route('upzilla_substate') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>UpZilla/Sub-State</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link {{ Request::routeIs('types','create') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            News Category
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('types') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category</p>
                            </a>

                            <a href="{{ route('types') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub-Category</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>