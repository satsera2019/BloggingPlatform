<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard Link -->
                <li class="nav-item">
                    {{-- <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a> --}}
                </li>
                <!-- Blog Posts Link -->
                <li class="nav-item">
                    <a href="{{ route('admin-panel.blogs.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>Blog Posts</p>
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a href="{{ route('admin-panel.users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>Users</p>
                    </a>
                </li> --}}
                <!-- Add more sidebar links as needed -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
