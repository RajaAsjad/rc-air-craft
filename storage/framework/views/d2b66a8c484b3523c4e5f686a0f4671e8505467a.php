<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id-<?php echo e($model->id); ?>">
        <td><?php echo e($models->firstItem()+$key); ?>.</td>
        <td>
            <?php if($model->image): ?>
                <img src="<?php echo e(asset('public/admin/assets/images/howToPlay/'.$model->image)); ?>" alt="" style="width:60px;">
            <?php else: ?>
                <img src="<?php echo e(asset('public/admin/assets/images/default.jpg')); ?>" style="width:60px;">
            <?php endif; ?>
        </td>
        <td><?php echo e(\Illuminate\Support\Str::limit($model->title,60)); ?></td>
        <td><?php echo e(\Illuminate\Support\Str::limit($model->description,60)); ?></td>
        <td>
            <?php if($model->status): ?>
                <span class="badge badge-success">Active</span>
            <?php else: ?>
                <span class="badge badge-danger">In-Active</span>
            <?php endif; ?>
        </td>
        <td><?php echo e(isset($model->hasCreatedBy)?$model->hasCreatedBy->name:'N/A'); ?></td>
        <td width="250px">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('how_to_play-edit')): ?>
                <a href="<?php echo e(route('how_to_play.edit', $model->id)); ?>" data-toggle="tooltip" data-placement="top" title="Edit how_to_play" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('how_to_play-delete')): ?>
                <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($model->id); ?>" data-del-url="<?php echo e(url('how_to_play', $model->id)); ?>"><i class="fa fa-trash"></i> Delete</button>
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
<?php /**PATH C:\xampp\htdocs\rc-air-craft\resources\views/admin/how_to_play/search.blade.php ENDPATH**/ ?>