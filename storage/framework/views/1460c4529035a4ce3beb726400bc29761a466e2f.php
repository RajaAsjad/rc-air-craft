<?php $__env->startSection('content'); ?>
<section class="content-header">
	<div class="content-header-left">
		<h1><strong><?php echo e($model->title); ?></strong></h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route('page.index')); ?>" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<?php if(session('message')): ?>
				<div class="callout callout-success">
					<?php echo e(session('message')); ?>

				</div>
			<?php endif; ?>
			<form action="<?php echo e(route('page_setting.store')); ?>" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>

				<input type="hidden" name="parent_slug" id="" value="<?php echo e($model->slug); ?>">
				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Favicon </label>
                            <div class="col-sm-6">
                                <input type="file" name="header_favicon" class="form-control">
                            </div>
                            <?php if(isset($page_data['header_favicon'])): ?>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <img src="<?php echo e(asset('/public/admin/assets/images/page/'.$page_data['header_favicon'])); ?>" class="existing-photo" style="height:50px;">
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Logo </label>
                            <div class="col-sm-6">
                                <input type="file" name="header_logo" class="form-control">
                            </div>

                            <?php if(isset($page_data['header_logo'])): ?>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <img src="<?php echo e(asset('/public/admin/assets/images/page/'.$page_data['header_logo'])); ?>" class="existing-photo" style="height:50px;">
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

						
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_blog">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rc-air-craft\resources\views/admin/page_setting/header.blade.php ENDPATH**/ ?>