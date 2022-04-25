<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('user.index')); ?>">
<section class="content-header">
    <div class="content-header-left">
        <h1>All Users</h1>
    </div>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-create')): ?>
    <div class="content-header-right">
        <a href="<?php echo e(route('user.create')); ?>" class="btn btn-primary btn-sm">Add New</a>
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
                        <div class="d-flex col-sm-6">
                            <input type="text" id="search" class="form-control" placeholder="Search">
                        </div>
                        <div class="d-flex col-sm-5">
                            <select name="" id="status" class="form-control status" style="margin-bottom:5px">
                                <option value="All" selected>Search by status</option>
                                <option value="1">Active</option>
                                <option value="2">In-Active</option>
                            </select>
                        </div>
                    </div>
                    <table id="" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>E-mail</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="body">
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rc-air-craft\resources\views/admin/user/index.blade.php ENDPATH**/ ?>