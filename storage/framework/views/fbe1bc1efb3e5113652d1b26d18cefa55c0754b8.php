<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit About Us</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route('about_us.index')); ?>" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo e(route('about_us.update', $model->id)); ?>" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
				<?php echo e(method_field('PATCH')); ?>

				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Heading <span style="color:red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="heading" value="<?php echo e($model->heading); ?>">
							</div>
						</div>
						<div class="form-group">
                            <label for="" class="col-sm-2 control-label">Description<span style="color: red">*</span></label>
							<div class="col-sm-9">
								<textarea class="form-control" name="description" style="height:140px;"><?php echo $model->description; ?></textarea>
							</div>
						</div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-6" style="padding-top:5px">
                                <input type="file" class="form-control" accept="image*" name="image">
                            </div>
                            <div class="col-sm-4" >
                                <img style="width: 80px " src="<?php echo e(asset('public/admin/assets/images/about_us')); ?>/<?php echo e($model->image); ?>" alt="">
                            </div>
                        </div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Status</label>
							<div class="col-sm-9">
								<select name="status" class="form-control" id="">
									<option value="1" <?php echo e($model->status==1?'selected':''); ?>>Active</option>
									<option value="0" <?php echo e($model->status==0?'selected':''); ?>>In-Active</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left">Submit</button>
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
<script>
	$(document).ready(function() {
		$("#regform").validate({
			rules: {
				heading: "required"
                description: "required"
			}
		});
	});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rc-air-craft\resources\views/admin/about_us/edit.blade.php ENDPATH**/ ?>