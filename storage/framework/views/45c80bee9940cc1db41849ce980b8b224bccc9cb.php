<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Faqs</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route('faq.index')); ?>" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo e(route('faq.update', $model->id)); ?>" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
				<?php echo e(method_field('PATCH')); ?>

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
                            <label for="" class="col-sm-2 control-label">Question<span style="color: red">*</span></label>
							<div class="col-sm-9">
								<textarea class="form-control" name="question" style="height:140px;"><?php echo $model->question; ?></textarea>
							</div>
						</div>
						<div class="form-group">
                            <label for="" class="col-sm-2 control-label">Answer<span style="color: red">*</span></label>
							<div class="col-sm-9">
								<textarea class="form-control" name="answer" style="height:140px;"><?php echo $model->answer; ?></textarea>
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
				question: "required"
                answer: "required"
			}
		});
	});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rc-air-craft\resources\views/admin/faq/edit.blade.php ENDPATH**/ ?>