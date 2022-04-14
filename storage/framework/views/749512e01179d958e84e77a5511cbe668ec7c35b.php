<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr id="id-<?php echo e($model->id); ?>">
    <td><?php echo e($models->firstItem()+$key); ?>.</td>

    <td><?php echo e(\Illuminate\Support\Str::limit($model->question,40)); ?></td>
    <td><?php echo e(\Illuminate\Support\Str::limit($model->answer,60)); ?></td>
    <td>
        <?php if($model->status): ?>
            <span class="badge badge-success">Active</span>
        <?php else: ?>
            <span class="badge badge-danger">In-Active</span>
        <?php endif; ?>
    </td>
    <td><?php echo e(isset($model->hasCreatedBy)?$model->hasCreatedBy->id:'N/A'); ?></td>
    <td width="250px">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faq-edit')): ?>
            <a href="<?php echo e(route('faq.edit', $model->id)); ?>" data-toggle="tooltip" data-placement="top" title="Edit faq" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faq-delete')): ?>
            <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($model->id); ?>" data-del-url="<?php echo e(url('faq', $model->id)); ?>"><i class="fa fa-trash"></i> Delete</button>
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
<?php /**PATH C:\xampp\htdocs\rc-air-craft\resources\views/admin/faq/search.blade.php ENDPATH**/ ?>