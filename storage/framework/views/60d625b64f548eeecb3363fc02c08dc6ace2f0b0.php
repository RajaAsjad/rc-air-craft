<?php $__env->startSection('content'); ?>

    <div class="inner-banner" style="background:#000;">
        <div class="container text-center">
            <h1>ABOUT US</h1>
        </div>
    </div>

    <section class="abt-page">
        <div class="container">
            <div class="row abt-iner-content">
                <div class="col-md-6">
                        <h2><?php echo e($aboutsus->heading); ?></h2>
                        <p><?php echo $aboutsus->description; ?></p>

                    </div>
                    <div class="col-md-6">
                        <img src="<?php echo e(asset('public/admin/assets/images/about_us')); ?>/<?php echo e($aboutsus->image); ?>">
                    </div>
            </div>
            <div class="why-choose-us">
                <h2>WHY CHOOSE US</h2>
                <div class="row">
                    <?php $__currentLoopData = $abouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $about): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-6">
                        <img src="<?php echo e(asset('public/admin/assets/images/about_us')); ?>/<?php echo e($about->image); ?>" class="avatar wp-post-image" alt="">
                        <div class="title"><?php echo e($about->heading); ?></div>
                        <div class="desc"><?php echo $about->description; ?></div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rc-air-craft\resources\views/website/about-us.blade.php ENDPATH**/ ?>