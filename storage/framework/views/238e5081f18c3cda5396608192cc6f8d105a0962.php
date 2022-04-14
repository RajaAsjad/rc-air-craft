
<?php $__env->startSection('content'); ?>
    <div class="inner-banner" style="background:#000;">
        <div class="container text-center">
            <h1>WINNERS</h1>
        </div>
    </div>
    <!-- winner-list-start -->
    <div class="winner-list">
        <div class="container">
            <div class="row winner-work">
                <div class="col-lg-6 animate__animated animate__flipInY animate__delay-1s animate__repeat-2">
                    <img src="<?php echo e(asset('public/assets/website')); ?>/images/Screenshot_20220125-095858_Facebook.jpg" class="img-fluid">
                    <h4>NEIL SAMPLE</h4>
                </div>
                <div class="col-lg-6 animate__animated animate__flipInY  animate__delay-2s animate__repeat-2">
                    <img src="<?php echo e(asset('public/assets/website')); ?>/images/Screenshot_20220125-095914_Facebook.jpg" class="img-fluid">
                    <h4>DONALD GILLIES PILOT RC WIN</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- winner-list-end -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rc-air-craft\resources\views/website/winner.blade.php ENDPATH**/ ?>