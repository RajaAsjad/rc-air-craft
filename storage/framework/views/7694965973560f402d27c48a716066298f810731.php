<?php $__env->startSection('content'); ?>

<div class="inner-banner" style="background:#000;">
    <div class="container text-center">
        <h1>FAQs</h1>
    </div>
</div>
<section class="sec-faq">
    <div class="container">
        <h2>Frequently Asked Questions</h2>
        <div id="main">
            <div class="container">
                <div class="accordion" id="faq">
                    <?php $count=1 ?>
                    <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card">
                            <div class="card-header" id="faqhead<?php echo e($question->id); ?>">
                                <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq<?php echo e($question->id); ?>" aria-expanded="<?php if($count ==1): ?><?php echo e('true'); ?> <?php else: ?><?php echo e('false'); ?>  <?php endif; ?>" aria-controls="faq<?php echo e($question->id); ?>"><?php echo e($question->question); ?></a>
                            </div>
                            <div id="faq<?php echo e($question->id); ?>" class="collapse <?php if($count ==1): ?><?php echo e('show'); ?>  <?php endif; ?>" aria-labelledby="faqhead<?php echo e($question->id); ?>" data-parent="#faq">
                                <div class="card-body">
                                <?php echo e($question->answer); ?>

                                </div>
                            </div>
                        </div>
                        <?php $count++ ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/demolinkweb2.com/public_html/rc-air-craft/resources/views/website/faqs.blade.php ENDPATH**/ ?>