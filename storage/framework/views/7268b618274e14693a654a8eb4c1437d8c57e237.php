<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(route("admin.home.index")); ?>" class="brand-link">
        <img src="<?php echo e(Helper::getAppLogo()?Helper::getAppLogo(): ''); ?>" alt="<?php echo e(__('admin.logo')); ?>" class="brand-image img-circle elevation-3" onerror="this.onerror=null;this.src='<?php echo e(asset(Storage::url('default.png'))); ?>'">
        <span class="brand-text font-weight-light"><?php echo e(Helper::getAppName()?Helper::getAppName():config('app.name',__('admin.admin'))); ?></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!--Super Admin-->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(config('custom_middleware.view_super_admin'))): ?>
                <li class="nav-header"><?php echo e(__('admin.menu_super_admin')); ?></li>
                <li class="nav-item has-treeview <?php echo e(request()->routeIs('super-admin.*') ?'menu-open':''); ?>">
                    <a href="#" class="nav-link <?php echo e(request()->routeIs('super-admin.*') ?'active':''); ?>">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p><?php echo e(__('admin.menu_authorization')); ?><i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(config('custom_middleware.view_super_admin_role'))): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('super-admin.role.index')); ?>" class="nav-link <?php echo e(request()->routeIs('super-admin.role.*') ?'active':''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('admin.menu_role')); ?></p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(config('custom_middleware.view_super_admin_permission'))): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('super-admin.permission.index')); ?>" class="nav-link <?php echo e(request()->routeIs('super-admin.permission*') ?'active':''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('admin.menu_permission')); ?></p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(config('custom_middleware.view_super_admin_role_permission'))): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('super-admin.role-permission.index')); ?>" class="nav-link <?php echo e(request()->routeIs('super-admin.role-permission*') ?'active':''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('admin.menu_role_permission')); ?></p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(config('custom_middleware.view_super_admin_user_role'))): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('super-admin.user-role.index')); ?>" class="nav-link <?php echo e(request()->routeIs('super-admin.user-role*') ?'active':''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('admin.menu_user_role')); ?></p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
                <!--/.Super Admin-->
                <!--Admin-->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(config('custom_middleware.view_admin'))): ?>
                <!--<li class="nav-header"><?php echo e(__('admin.admin')); ?></li>-->
                <!--Dashboard-->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(config('custom_middleware.view_dashboard'))): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.home.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.home.index') ?'active':''); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p><?php echo e(__('admin.menu_dashboard')); ?></p>
                    </a>
                </li>
                <?php endif; ?>
                <!--/.Dashboard-->

                <!--Master-->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(config('custom_middleware.view_master'))): ?>
                <li class="nav-item has-treeview <?php echo e(request()->routeIs('admin.master.*') ?'menu-open':''); ?>">
                    <a href="#" class="nav-link <?php echo e(request()->routeIs('admin.master.*') ?'active':''); ?>">
                        <i class="nav-icon fas fa-globe-asia"></i>
                        <p><?php echo e(__('admin.menu_master')); ?><i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(config('custom_middleware.view_master_country'))): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.master.country.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.master.country.*') ?'active':''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('admin.menu_country')); ?></p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(config('custom_middleware.view_master_city'))): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.master.city.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.master.city.*') ?'active':''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('admin.menu_city')); ?></p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
                <!--Video-->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(config('custom_middleware.view_video'))): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.video.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.video.index') ?'active':''); ?>">
                        <i class="nav-icon fas fa-camera"></i>
                        <p><?php echo e(__('admin.menu_video')); ?></p>
                    </a>

                </li>
                <?php endif; ?>
                <!--/.Video-->
                <!--/.Master-->
                <!--Setting-->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(config('custom_middleware.view_general_setting'))): ?>
                <li class="nav-item has-treeview <?php echo e(request()->routeIs('admin.general-setting.*') ?'menu-open':''); ?>">
                    <a href="#" class="nav-link <?php echo e(request()->routeIs('admin.general-setting.*') ?'active':''); ?>">
                        <i class="nav-icon fas fa-tools"></i>
                        <p><?php echo e(__('admin.menu_general_setting')); ?><i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(config('custom_middleware.view_general_setting_setting'))): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.general-setting.setting.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.general-setting.setting.*') ?'active':''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('admin.menu_setting')); ?></p>
                            </a>
                        </li>
                        <?php endif; ?>

                    </ul>
                </li>
                <?php endif; ?>
                <!--/.Setting-->

                <?php endif; ?>
                <!--/.Admin-->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php /**PATH C:\xampp\htdocs\first_laravel\resources\views/layout/sidebar.blade.php ENDPATH**/ ?>