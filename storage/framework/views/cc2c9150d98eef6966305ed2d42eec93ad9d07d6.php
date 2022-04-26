<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr id="id-<?php echo e($model->slug); ?>">
    <td><?php echo e($models->firstItem()+$key); ?>.</td>
    <td><?php echo \Illuminate\Support\Str::limit($model->title,40); ?></td>
    <td><?php echo \Illuminate\Support\Str::limit($model->max_purchase,40); ?></td>
    <td><?php echo \Illuminate\Support\Str::limit($model->discount,60); ?></td>
    <td><?php echo \Illuminate\Support\Str::limit($model->coupon_code,60); ?></td>
    <td><?php echo \Illuminate\Support\Str::limit($model->start_date,40); ?></td>
    <td><?php echo \Illuminate\Support\Str::limit($model->expire_date,60); ?></td>
    <td>
        <?php if($model->status): ?>
            <span class="badge badge-success">Active</span>
        <?php else: ?>
            <span class="badge badge-danger">In-Active</span>
        <?php endif; ?>
    </td>
    <td>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupon-edit')): ?>
            <a href="<?php echo e(route('coupon.edit', $model->slug)); ?>" data-toggle="tooltip" data-placement="top" title="Edit model" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupon-delete')): ?>
            <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($model->slug); ?>" data-del-url="<?php echo e(url('coupon', $model->slug)); ?>"><i class="fa fa-trash"></i> Delete</button>
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
<td colspan="6">
    <div class="d-flex justify-content-center">
        <?php echo $models->links('pagination::bootstrap-4'); ?>

    </div>
</td>
</tr>
<?php /**PATH C:\xampp\htdocs\rc-air-craft\resources\views/admin/coupon/search.blade.php ENDPATH**/ ?>