<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
	<div class="content-header-left">
		<h1>Add Products</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route('product.index')); ?>" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo e(route('product.store')); ?>" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
				<div class="box box-info">
					<div class="box-body">
                            <div class="form-group">
                                 <label for="" class="col-sm-2 control-label">Category <span style="color: red">*</span></label>
                                <div class="col-md-9">
                                    <select name="category_slug" id="category_slug" class="form-control">
                                        <option value="" selected>Select Category</option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->slug); ?>"><?php echo e($category->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <span style="color: red"><?php echo e($errors->first('category_slug')); ?></span>
                                </div>
						    </div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Name<span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="name" value="<?php echo e(old('name')); ?>" placeholder="Enter product name">
								<span style="color: red"><?php echo e($errors->first('name')); ?></span>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Product Price<span style="color: red">*</span></label>
							<div class="col-sm-9">
                                <input type="number" name="price" id="" value="<?php echo e(old('price')); ?>" min="1" class="form-control placeholder="Enter price">
								<span style="color: red"><?php echo e($errors->first('price')); ?></span>
							</div>
                        </div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Min Competition<span style="color: red">*</span></label>
							<div class="col-sm-9">
                                <input type="number" name="min_competition" id="" value="<?php echo e(old('min_competition')); ?>" min="1" max="1" class="form-control placeholder="Enter min competition">
								<span style="color: red"><?php echo e($errors->first('min_competition')); ?></span>
							</div>
                        </div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Max Competition<span style="color: red">*</span></label>
							<div class="col-sm-9">
                                <input type="number" name="max_competition" id="" value="<?php echo e(old('max_competition')); ?>" min="1" max="190" class="form-control placeholder="Enter max competition">
								<span style="color: red"><?php echo e($errors->first('max_competition')); ?></span>
							</div>
                        </div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Number of winners<span style="color: red">*</span></label>
							<div class="col-sm-9">
                                <input type="number" name="number_of_winners" id="" value="<?php echo e(old('number_of_winners')); ?>" min="1" max="10" class="form-control placeholder="Enter number of winners">
								<span style="color: red"><?php echo e($errors->first('number_of_winners')); ?></span>
							</div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Expiry Date <span style="color: red">*</span></label>
                            <div class="col-sm-9">
                                <input type="date" name="draw_ends" value="<?php echo e(old('draw_ends')); ?>" id="end-date" class="form-control">
                                <span id="error-end-date" style="color:red"></span>
                                <span style="color: red"><?php echo e($errors->first('draw_ends')); ?></span>
                            </div>
                         </div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Image <span style="color: red">*</span></label>
                            <div class="col-sm-6" style="padding-top:5px">
                                <input type="file" class="form-control" accept="image*"  name="image" id="image">
                                <span style="color: red"><?php echo e($errors->first('image')); ?></span>
                            </div>
                                <div class="col-sm-4" >
                                <img style="width: 80px" id="banner_preview"  src="<?php echo e(asset('public/admin/assets/images/default.jpg')); ?>"  alt="Image Not Found ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Short Description <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<textarea class="form-control texteditor" name="short_description" style="height:200px;" placeholder="Enter short description"></textarea>
								<span style="color: red"><?php echo e($errors->first('short_description')); ?></span>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Description<span style="color: red">*</span></label>
							<div class="col-sm-9">
								<textarea class="form-control texteditor" name="description" style="height:200px;" placeholder="Enter description"></textarea>
								<span style="color: red"><?php echo e($errors->first('description')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Question<span style="color: red">*</span></label>
							<div class="col-sm-9">
								<textarea class="form-control" name="question" style="height:100px;" placeholder="Enter question"></textarea>
								<span style="color: red"><?php echo e($errors->first('question')); ?></span>
                                <span style="color: red"><?php echo e($errors->first('answers')); ?></span>
							</div>
						</div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Option#1<span style="color: red">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" name="choices[1]" id="" value="<?php echo e(old('choices')); ?>" class="form-control" placeholder="Enter option">
                                <span style="color: red"><?php echo e($errors->first('choices')); ?></span>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" name="answers[1]" type="checkbox" value="1" id="answer-1"/>
                                    <label class="form-check-label" for="answer-1">Answer</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Option#2<span style="color: red">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" name="choices[2]" id="" value="<?php echo e(old('choices')); ?>" class="form-control" placeholder="Enter option">
                                <span style="color: red"><?php echo e($errors->first('choices')); ?></span>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" name="answers[2]" type="checkbox" value="1" id="answer-2"/>
                                    <label class="form-check-label" for="answer-2">Answer</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Option#3<span style="color: red">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" name="choices[3]" id="" value="<?php echo e(old('choices')); ?>" class="form-control" placeholder="Enter option">
                                <span style="color: red"><?php echo e($errors->first('choices')); ?></span>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" name="answers[3]" type="checkbox" value="1" id="answer-3"/>
                                    <label class="form-check-label" for="answer-3">Answer</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Option#4<span style="color: red">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" name="choices[4]" id="" value="<?php echo e(old('choices')); ?>" class="form-control" placeholder="Enter option">
                                <span style="color: red"><?php echo e($errors->first('choices')); ?></span>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" name="answers[4]" type="checkbox" value="1" id="answer-4"/>
                                    <label class="form-check-label" for="answer-4">Answer</label>
                                </div>
                            </div>
                        </div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-9">
								<button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
							</div>
						</div>
                        <br>
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

		/* $("#regform").validate({
			rules: {
				image: "required",
				name: "required",
				description: "required",
			}
		}); */
	});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rc-air-craft\resources\views/admin/product/create.blade.php ENDPATH**/ ?>