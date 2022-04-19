<?php $__env->startSection('content'); ?>
<section class="content-header">
	<div class="content-header-left">
		<h1><?php if(!empty($model)): ?> Edit <?php else: ?> Add <?php endif; ?> Page Setting of <strong><?php echo e($model->title); ?></strong></h1>
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
							<label for="" class="col-sm-2 control-label">Description </label>
							<div class="col-sm-9">
								<textarea name="footer_description" id="" class="form-control texteditor" placeholder="Enter description"><?php echo e(isset($page_data['footer_description'])?$page_data['footer_description']:''); ?></textarea>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Footer Image </label>
							<div class="col-sm-6">
								<input type="file" name="footer_image" class="form-control">
							</div>
                            <?php if(isset($page_data['footer_image'])): ?>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <img src="<?php echo e(asset('/public/admin/assets/images/page/'.$page_data['footer_image'])); ?>" class="existing-photo" style="height:50px;">
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Email </label>
							<div class="col-sm-9">
								<input type="email" name="footer_email" class="form-control" value="<?php echo e(isset($page_data['footer_email'])?$page_data['footer_email']:''); ?>" placeholder="Enter email address">
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Facebook Link </label>
							<div class="col-sm-9">
								<input type="text" name="footer_facebook" class="form-control" value="<?php echo e(isset($page_data['footer_facebook'])?$page_data['footer_facebook']:''); ?>" placeholder="Enter social link">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Instagram Link </label>
							<div class="col-sm-9">
								<input type="text" name="footer_instagram" class="form-control" value="<?php echo e(isset($page_data['footer_instagram'])?$page_data['footer_instagram']:''); ?>" placeholder="Enter social link">
							</div>
						</div>
                        	<div class="form-group">
							<label for="" class="col-sm-2 control-label">Copy Rights: right side </label>
							<div class="col-sm-9">
								<input type="text" name="footer_copy_right_right_side" class="form-control" value="<?php echo e(isset($page_data['footer_copy_right_right_side'])?$page_data['footer_copy_right_right_side']:''); ?>" placeholder="Enter copy rights right side">
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Copy Rights: left side</label>
							<div class="col-sm-9">
								<input type="text" name="footer_copy_right_left_side" class="form-control" value="<?php echo e(isset($page_data['footer_copy_right_left_side'])?$page_data['footer_copy_right_left_side']:''); ?>" placeholder="Enter copy rights left side">
							</div>
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
<script>
	$(document).ready(function() {
		if ($(".texteditor").length > 0) {
			tinymce.init({
				selector: "textarea.texteditor",
				theme: "modern",
				height: 100,
				plugins: [
					"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
					"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					"save table contextmenu directionality emoticons template paste textcolor"
				],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

			});
		}
	});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rc-air-craft\resources\views/admin/page_setting/footer.blade.php ENDPATH**/ ?>