<?php $__env->startSection('content'); ?>
<section class="content-header">
	<div class="content-header-left">
		<h1>Add Page Setting of <strong><?php echo e($model->title); ?></strong></h1>
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

			<div class="box box-info">
				<div class="box-body">
					<h3 class="sec_title">Banner Section</h3>
					<form action="<?php echo e(route('page_setting.store')); ?>" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						<?php echo csrf_field(); ?>
						<input type="hidden" name="parent_slug" id="" value="<?php echo e($model->slug); ?>">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Banner Heading </label>
							<div class="col-sm-6">
								<input type="text" name="banner_heading" class="form-control" value="<?php echo e(isset($page_data['banner_heading'])?$page_data['banner_heading']:''); ?>" placeholder="Enter banner heading">
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Background Image </label>
							<div class="col-sm-6">
								<input type="file" name="banner_bg_image" class="form-control">
							</div>

                            <?php if(isset($page_data['banner_bg_image'])): ?>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <img src="<?php echo e(asset('/public/admin/assets/images/page/'.$page_data['banner_bg_image'])); ?>" class="existing-photo" style="height:50px;">
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_home_blog">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
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
				height: 150,
				plugins: [
					"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
					"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					"save table contextmenu directionality emoticons template paste textcolor"
				],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

			});
		}

		$("#regform").validate({
			rules: {
				title: "required"
			}
		});
	});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rc-air-craft\resources\views/admin/page_setting/home.blade.php ENDPATH**/ ?>