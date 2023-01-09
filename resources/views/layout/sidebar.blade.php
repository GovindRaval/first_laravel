<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route("admin.home.index")}}" class="brand-link">
        <img src="{{Helper::getAppLogo()?Helper::getAppLogo(): ''}}" alt="{{__('admin.logo')}}" class="brand-image img-circle elevation-3" onerror="this.onerror=null;this.src='{{ asset(Storage::url('default.png')) }}'">
        <span class="brand-text font-weight-light">{{Helper::getAppName()?Helper::getAppName():config('app.name',__('admin.admin'))}}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!--Super Admin-->
                @can(config('custom_middleware.view_super_admin'))
                <li class="nav-header">{{__('admin.menu_super_admin')}}</li>
                <li class="nav-item has-treeview {{ request()->routeIs('super-admin.*') ?'menu-open':'' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('super-admin.*') ?'active':'' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>{{__('admin.menu_authorization')}}<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can(config('custom_middleware.view_super_admin_role'))
                        <li class="nav-item">
                            <a href="{{route('super-admin.role.index')}}" class="nav-link {{ request()->routeIs('super-admin.role.*') ?'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.menu_role')}}</p>
                            </a>
                        </li>
                        @endcan
                        @can(config('custom_middleware.view_super_admin_permission'))
                        <li class="nav-item">
                            <a href="{{route('super-admin.permission.index')}}" class="nav-link {{ request()->routeIs('super-admin.permission*') ?'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.menu_permission')}}</p>
                            </a>
                        </li>
                        @endcan
                        @can(config('custom_middleware.view_super_admin_role_permission'))
                        <li class="nav-item">
                            <a href="{{route('super-admin.role-permission.index')}}" class="nav-link {{ request()->routeIs('super-admin.role-permission*') ?'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.menu_role_permission')}}</p>
                            </a>
                        </li>
                        @endcan
                        @can(config('custom_middleware.view_super_admin_user_role'))
                        <li class="nav-item">
                            <a href="{{route('super-admin.user-role.index')}}" class="nav-link {{ request()->routeIs('super-admin.user-role*') ?'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.menu_user_role')}}</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                <!--/.Super Admin-->
                <!--Admin-->
                @can(config('custom_middleware.view_admin'))
                <!--<li class="nav-header">{{__('admin.admin')}}</li>-->
                <!--Dashboard-->
                @can(config('custom_middleware.view_dashboard'))
                <li class="nav-item">
                    <a href="{{route('admin.home.index')}}" class="nav-link {{ request()->routeIs('admin.home.index') ?'active':'' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>{{__('admin.menu_dashboard')}}</p>
                    </a>
                </li>
                @endcan
                <!--/.Dashboard-->

                <!--Master-->
                @can(config('custom_middleware.view_master'))
                <li class="nav-item has-treeview {{ request()->routeIs('admin.master.*') ?'menu-open':'' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.master.*') ?'active':'' }}">
                        <i class="nav-icon fas fa-globe-asia"></i>
                        <p>{{__('admin.menu_master')}}<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can(config('custom_middleware.view_master_country'))
                        <li class="nav-item">
                            <a href="{{route('admin.master.country.index')}}" class="nav-link {{ request()->routeIs('admin.master.country.*') ?'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.menu_country')}}</p>
                            </a>
                        </li>
                        @endcan
                        @can(config('custom_middleware.view_master_city'))
                        <li class="nav-item">
                            <a href="{{route('admin.master.city.index')}}" class="nav-link {{ request()->routeIs('admin.master.city.*') ?'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.menu_city')}}</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                <!--/.Master-->
                <!--Setting-->
                @can(config('custom_middleware.view_general_setting'))
                <li class="nav-item has-treeview {{ request()->routeIs('admin.general-setting.*') ?'menu-open':'' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.general-setting.*') ?'active':'' }}">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>{{__('admin.menu_general_setting')}}<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can(config('custom_middleware.view_general_setting_setting'))
                        <li class="nav-item">
                            <a href="{{route('admin.general-setting.setting.index')}}" class="nav-link {{ request()->routeIs('admin.general-setting.setting.*') ?'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.menu_setting')}}</p>
                            </a>
                        </li>
                        @endcan

                    </ul>
                </li>
                @endcan
                <!--/.Setting-->

                @endcan
                <!--/.Admin-->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>