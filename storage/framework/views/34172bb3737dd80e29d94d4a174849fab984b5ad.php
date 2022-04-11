<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Products</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route('product.index')); ?>" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" action="<?php echo e(route('product.update', $details->slug)); ?>" id="regform" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
				<?php echo e(method_field('PATCH')); ?>

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Name <span style="color:red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="title" value="<?php echo e($details->name); ?>">
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Product Price <span style="color: red">*</span></label>
							<div class="col-sm-9">
                                <input type="number" name="price" id="" value="<?php echo e($details->price); ?>" min="1" class="form-control placeholder="Enter price">
								<span style="color: red"><?php echo e($errors->first('price')); ?></span>
							</div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Product Type <span style="color: red">*</span></label>
                            <div class="col-md-9">
                                <select name="type" id="type" class="form-control">
                                    <option value="" selected>Select product type</option>
                                    <option value="fix" <?php echo e($details->type == 'fix' ? 'selected':''); ?>>Fix Discount</option>
									<option value="percent" <?php echo e($details->type=='percent'?'selected':''); ?>>Percent Discount</option>
                                </select>
                                <span style="color: red"><?php echo e($errors->first('type')); ?></span>
                            </div>
						</div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Expiry Date <span style="color: red">*</span></label>
                            <div class="col-sm-9">
                                <input type="date" name="expiry_date" value="<?php echo e($details->expiry_date); ?>" id="end-date" min="<?php echo e(date('Y-m-d')); ?>" class="form-control">
                                <span id="error-end-date" style="color:red"></span>
                                <span style="color: red"><?php echo e($errors->first('expiry_date')); ?></span>
                            </div>
                         </div>

                         <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Exist Image </label>
                            <div class="col-sm-6" style="padding-top:5px">
                                <input type="file" class="form-control" accept="image*" name="image">
                            </div>
                            <div class="col-sm-4" >
                                <img style="width: 80px " src="<?php echo e(asset('public/admin/assets/images/product')); ?>/<?php echo e($details->image); ?>" alt="">
                            </div>
                         </div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Short Description <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<textarea class="form-control texteditor" name="short_description" style="height:200px;" placeholder="Enter short_description"><?php echo $details->short_description; ?></textarea>
								<span style="color: red"><?php echo e($errors->first('short_description')); ?></span>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Description <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<textarea class="form-control texteditor" name="description" style="height:200px;" placeholder="Enter description"><?php echo $details->description; ?></textarea>
								<span style="color: red"><?php echo e($errors->first('description')); ?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Status</label>
							<div class="col-sm-9">
								<select name="status" class="form-control" id="">
									<option value="1" <?php echo e($details->status==1?'selected':''); ?>>Active</option>
									<option value="0" <?php echo e($details->status==0?'selected':''); ?>>In-Active</option>
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
				title: "required",
				description: "required",
			}
		});
	});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rc-air-craft\resources\views/admin/product/edit.blade.php ENDPATH**/ ?>