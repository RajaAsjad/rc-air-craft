<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="<?php echo e(route('dashboard')); ?>" class="<?php echo e(request()->is('dashboard') || request()->is('profile/*') ? 'active' : ''); ?>">
                    <i class="fa fa-laptop"></i> <span>Dashboard</span>
                </a>
            </li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page-list')): ?>
            <li class="treeview">
                <a href="<?php echo e(route('page.index')); ?>" class="<?php echo e(request()->is('page') || request()->is('page/*') || request()->is('page_setting/*') ? 'active' : ''); ?>">
                    <i class="fa fa-cog"></i> <span>Settings</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-list')): ?>
            <li class="treeview">
                <a href="<?php echo e(route('role.index')); ?>" class="<?php echo e(request()->is('role') || request()->is('role/create') || request()->is('role/*/edit') ? 'active' : ''); ?>">
                    <i class="fa fa-tasks"></i> <span>Roles</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-list')): ?>
            <li class="treeview">
                <a href="<?php echo e(route('user.index')); ?>" class="<?php echo e(request()->is('user') || request()->is('user/create') || request()->is('user/*/edit') ? 'active' : ''); ?>">
                    <i class="fa fa-users"></i> <span>Users</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-list')): ?>
            <li class="treeview">
                <a href="<?php echo e(route('permission.index')); ?>" class="<?php echo e(request()->is('permission') || request()->is('permission/create') || request()->is('permission/*/edit') ? 'active' : ''); ?>">
                    <i class="fa fa-lock"></i> <span>Permissions</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-list')): ?>
            <li class="treeview">
                <a href="<?php echo e(route('product.index')); ?>" class="<?php echo e(request()->is('product') || request()->is('product/create') || request()->is('product/*/edit') ? 'active' : ''); ?>">
                    <i class="fa fa-product-hunt"></i> <span>Products</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-list')): ?>
            <li class="treeview">
                <a href="<?php echo e(route('category.index')); ?>" class="<?php echo e(request()->is('category') || request()->is('category/create') || request()->is('category/*/edit') ? 'active' : ''); ?>">
                    <i class="fa fa-list-alt"></i> <span>Categories</span>
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faq-list')): ?>
            <li class="treeview">
                <a href="<?php echo e(route('faq.index')); ?>" class="<?php echo e(request()->is('faq') || request()->is('faq/create') || request()->is('faq/*/edit') ? 'active' : ''); ?>">
                    <i class="fa fa-question-circle"></i> <span>Faqs</span>
                </a>
            </li>
            <?php endif; ?>
           <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupon-list')): ?>
            <li class="treeview">
                <a href="<?php echo e(route('coupon.index')); ?>" class="<?php echo e(request()->is('coupon') || request()->is('coupon/create') || request()->is('coupon/*/edit') ? 'active' : ''); ?>">
                    <i class="fa fa-graduation-cap"></i> <span>Coupons</span>
                </a>
            </li>
            <?php endif; ?>
                

           
        </ul>
    </section>
</aside>
<?php /**PATH C:\xampp\htdocs\rc-air-craft\resources\views/layouts/admin/sidebar.blade.php ENDPATH**/ ?>