<?php
    $sidebarMenus = [
        [
            'group' => null,
            'menus' => [
                [
                    'name' => 'Dashboard',
                    'route' => 'dashboard',
                    'icon' => 'fas fa-tachometer-alt',
                    'levels' => ['ADM', 'MNG', 'STF'],
                ],
            ],
        ],
        [
            'group' => 'Users Data',
            'menus' => [
                [
                    'name' => 'User Levels',
                    'route' => 'levels.page',
                    'icon' => 'fas fa-database',
                    'levels' => ['ADM'],
                ],
                [
                    'name' => 'Users',
                    'route' => 'users.page',
                    'icon' => 'fas fa-users',
                    'levels' => ['ADM'],
                ],
            ],
        ],
        [
            'group' => 'Items Data',
            'menus' => [
                [
                    'name' => 'Categories',
                    'route' => 'categories.page',
                    'icon' => 'fas fa-bookmark',
                    'levels' => ['ADM', 'MNG'],
                ],
                [
                    'name' => 'Items',
                    'route' => 'items.page',
                    'icon' => 'fas fa-receipt',
                    'levels' => ['ADM', 'MNG'],
                ],
            ],
        ],
        [
            'group' => 'Transactions Data',
            'menus' => [
                [
                    'name' => 'Stocks',
                    'route' => 'stocks.page',
                    'icon' => 'fas fa-receipt',
                    'levels' => ['ADM', 'MNG'],
                ],
                [
                    'name' => 'Transactions',
                    'route' => null,
                    'icon' => 'fas fa-money-bill',
                    'levels' => ['STF'],
                ],
            ],
        ],
    ];
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(route('dashboard')); ?>" class="brand-link">
        <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">PWL-POS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar mt-2">
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <?php $__currentLoopData = $sidebarMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sidebarMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $visibleMenus = array_filter($sidebarMenu['menus'], function ($menu) {
                            return isset($menu['levels']) && in_array(Auth::user()->level->level_code, $menu['levels']);
                        });
                    ?>

                    <?php if(count($visibleMenus) > 0): ?>
                        <?php if($sidebarMenu['group']): ?>
                            <li class="nav-header"><?php echo e($sidebarMenu['group']); ?></li>
                        <?php endif; ?>

                        <?php $__currentLoopData = $visibleMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-item">
                                <a href="<?php echo e($menu['route'] !== null ? route($menu['route']) : '#'); ?>"
                                    class="<?php echo \Illuminate\Support\Arr::toCssClasses(['nav-link', 'active' => request()->routeIs($menu['route'])]); ?>">
                                    <i class="nav-icon <?php echo e($menu['icon']); ?>"></i>
                                    <p><?php echo e($menu['name']); ?></p>
                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </nav>
        <!-- End of Sidebar Menu -->
    </div>
    <!-- End of Sidebar -->
</aside>
<?php /**PATH C:\laragon\www\week-3\pwl-pos\resources\views/components/sidebar.blade.php ENDPATH**/ ?>