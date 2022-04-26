<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($user->hasRole('Admin')): ?>
        <?php continue; ?>;
    <?php endif; ?>
    <tr id="id-<?php echo e($user->id); ?>">
        <td><?php echo e($users->firstItem()+$key); ?>.</td>
        <td><?php echo e($user->name); ?></td>
        <td><?php echo e($user->last_name??'N/A'); ?></td>
        <td><?php echo e($user->phone??'N/A'); ?></td>
        <td><?php echo e($user->email); ?></td>
        <td>
            <?php if($user->status): ?>
                <span class="badge badge-success">Active</span>
            <?php else: ?>
                <span class="badge badge-danger">In-Active</span>
            <?php endif; ?>
        </td>
        <td>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-edit')): ?>
                <a href="<?php echo e(route('user.edit', $user->id)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-delete')): ?>
                <a class="btn btn-danger btn-xs delete-btn" data-user-id="<?php echo e($user->id); ?>"><i class="fa fa-trash"></i> Delete</a>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="7">
        Displying <?php echo e($users->firstItem()); ?> to <?php echo e($users->lastItem()); ?> of <?php echo e($users->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $users->links('pagination::bootstrap-4'); ?>

        </div>
    </td>
</tr>
<?php /**PATH C:\xampp\htdocs\rc-air-craft\resources\views/admin/user/search.blade.php ENDPATH**/ ?>