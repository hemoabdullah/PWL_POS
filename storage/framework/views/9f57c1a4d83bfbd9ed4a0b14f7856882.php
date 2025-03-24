<?php
    $sidebarMenus = [
        [
            'group' => null,
            'menus' => [
                [
                    'name' => 'Dashboard',
                    'route' => 'dashboard',
                    'icon' => 'fas fa-tachometer-alt',
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
                ],
                [
                    'name' => 'Users',
                    'route' => 'users.page',
                    'icon' => 'fas fa-users',
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
                ],
                [
                    'name' => 'Items',
                    'route' => 'items.page',
                    'icon' => 'fas fa-receipt',
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
                ],
                [
                    'name' => 'Transactions',
                    'route' => null,
                    'icon' => 'fas fa-money-bill',
                ],
            ],
        ],
    ];
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(route('dashboard')); ?>" class="brand-link">
        <span class="brand-text font-weight-light">PWL POS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar mt-2">
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
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
                    <?php if($sidebarMenu['group']): ?>
                        <li class="nav-header"><?php echo e($sidebarMenu['group']); ?></li>
                    <?php endif; ?>
                    <?php $__currentLoopData = $sidebarMenu['menus']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item">
                            <a
                                href="<?php echo e($menu['route'] !== null ? route($menu['route']) : '#'); ?>"
                                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'nav-link',
                                    'active' => request()->routeIs($menu['route']),
                                ]); ?>"
                            >
                                <i class="nav-icon <?php echo e($menu['icon']); ?>"></i>
                                <p><?php echo e($menu['name']); ?></p>
                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </nav>
        <!-- End of Sidebar Menu -->
    </div>
    <!-- End of Sidebar -->
</aside>
<?php /**PATH C:\laragon\www\pwl-pos\resources\views/components/sidebar.blade.php ENDPATH**/ ?>