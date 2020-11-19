<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('images/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        {{-- <span class="brand-text font-weight-light">{{ Auth::user()->name }}</span> --}}
    </a>

    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <router-link tag="a" to="/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link tag="a" to="/users" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Users</p>
                    </router-link>
                </li>
                <!-- New Sidebar Item -->
                <li class="nav-item">
                    <router-link tag="a" to="/laws" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Law</p>
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link tag="a" to="/articles" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Articles</p>
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link tag="a" to="/judgements" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Judgements</p>
                    </router-link>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</aside>
