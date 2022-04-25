<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('permission.index')); ?>">
<section class="content-header">
    <div class="content-header-left">
        <h1>All Permissions</h1>
    </div>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-create')): ?>
    <div class="content-header-right">
        <a href="<?php echo e(route('permission.create')); ?>" class="btn btn-primary btn-sm">Add New</a>
    </div>
    <?php endif; ?>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php if(session('success')): ?>
                <div class="callout callout-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <div class="box box-info">
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-1">Search:</div>
                        <div class="d-flex col-sm-11">
                            <input type="text" id="search" class="form-control" placeholder="Search" style="margin-bottom:5px">
                        </div>
                    </div>
                    <table id="" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Guard Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id="id-<?php echo e($permission->id); ?>">
                                    <td><?php echo e($permissions->firstItem()+$key); ?>.</td>
                                    <td><?php echo e(Str::ucfirst($permission->name)); ?></td>
                                    <td><?php echo e($permission->guard_name); ?></td>
                                    <td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-edit')): ?>
                                            <a href="<?php echo e(route('permission.edit', $permission->id)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-delete')): ?>
                                            <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($permission->id); ?>" data-del-url="<?php echo e(url('permission', $permission->id)); ?>"><i class="fa fa-trash"></i> Delete</button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="4">
                                    Displying <?php echo e($permissions->firstItem()); ?> to <?php echo e($permissions->lastItem()); ?> of <?php echo e($permissions->total()); ?> records
                                    <div class="d-flex justify-content-center">
                                        <?php echo $permissions->links('pagination::bootstrap-4'); ?>

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rc-air-craft\resources\views/admin/permission/index.blade.php ENDPATH**/ ?>