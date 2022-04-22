<?php $__env->startSection('content'); ?>
    <div class="inner-banner" style="background:#000;">
        <div class="container text-center">
            <h1>Single Product</h1>
        </div>
    </div>

    <div class="single-produc">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 img-hover-zoom">
                    <img src="<?php echo e(asset('public/admin/assets/images/product')); ?>/<?php echo e($product->image); ?>" style="width: 100%;">
                </div>
                <div class="col-lg-6 col-md-6">
                    <h6 class="pro-price">$<?php echo e(number_format($product->price, 2)); ?></h6>
                    <p class="descrip"><?php echo $product->description; ?></p>
                    <div class="time-slot-pro">
                        <h2>Time Left</h2>
                        <div id="countdown">
                            <ul>
                                <li><span id="days"></span>days</li>
                                <li><span id="hours"></span>Hours</li>
                                <li><span id="minutes"></span>Minutes</li>
                                <li><span id="seconds"></span>Seconds</li>
                            </ul>
                        </div>
                    </div>
                    <br>
                    <p class="descrip">Draw ends: <?php echo e(date('F d, Y H:i A', strtotime($product->draw_ends))); ?> Timezone: UTC+0 <br>
                        This draw has a minimum of <?php echo e($product->min_competition); ?> Competition<br>
                        This draw is limited to <?php echo e($product->max_competition); ?> Competition<br>
                        Tickets sold: 85<br>
                        This draw will have <?php echo e($product->number_of_winners); ?> winner
                    </p>
                    <div class="bar-for-us">
                        <div class="ending">
                            <p class="start-point"><?php echo e($product->min_competition); ?></p>
                            <p class="end-point"><?php echo e($product->max_competition); ?></p>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                                <span class="sr-only">25% Complete</span>
                            </div>
                        </div>
                    </div>
                    <div class="ques ">
                        <h2 class="answer ">Answer the question: </h2>
                        <p class="descrip"><?php echo e($product->hasQuestion->question); ?></p>
                            <div class="navigatee">
                                <ul>
                                    <li class="correct"><?php echo e($product->hasQuestion->answer); ?></li>
                                    <?php $__currentLoopData = $product->hasQuestion->hasOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="wrong"><?php echo e($option->choices); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <div class="input-group quantity_goods">
                            <form action="<?php echo e(route('order.store')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="product_id" name="<?php echo e($product->id); ?>">
                                <input type="number" step="1" min="1" max="10" id="num_count" name="quantity" value="1" title="Qty"><button type="submit" class="btn-to-you ">Participate now </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="description">
                <div class="des">
                    <p class="hed">Description</p>
                </div>
                <div class="main-des">
                    <p class="descrip"><?php echo $product->short_description; ?></p>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rc-air-craft\resources\views/website/products/single-product.blade.php ENDPATH**/ ?>