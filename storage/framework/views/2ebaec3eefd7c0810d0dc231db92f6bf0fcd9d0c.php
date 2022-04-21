<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/website')); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/toastr.min.css')); ?>">
    <link rel="icon" href="<?php echo e(asset('public/admin/assets/images/page')); ?>/<?php echo e($home_page_data['header_favicon']); ?>" type="image/png" sizes="16x16">
    <title>R.C Aircraft Online | Lucky Draw Competition</title>
</head>

<body>

       <!-- Header -->
            <?php echo $__env->make('layouts.website.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       <!-- Header End -->

        <?php echo $__env->yieldContent('content'); ?>

        <!-- Footer -->
            <?php echo $__env->make('layouts.website.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Footer End -->

<div id="back-top" style="display: block;">
    <a href="#top"> <span class="fa fa-arrow-circle-o-up"></span></a>
</div>
<script src="<?php echo e(asset('public/assets/website')); ?>/js/main.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

<script src="<?php echo e(asset('public/admin/assets/js/toastr.min.js')); ?>"></script>
<script>
    <?php if(Session::has('message')): ?>
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("<?php echo e(session('message')); ?>");
    <?php endif; ?>

    <?php if(Session::has('error')): ?>
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("<?php echo e(session('error')); ?>");
    <?php endif; ?>

    <?php if(Session::has('info')): ?>
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("<?php echo e(session('info')); ?>");
    <?php endif; ?>

    <?php if(Session::has('warning')): ?>
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("<?php echo e(session('warning')); ?>");
    <?php endif; ?>
</script>
<?php echo method_field('js'); ?>
</body>

</html>
<?php /**PATH /home/customer/www/demolinkweb2.com/public_html/rc-air-craft/resources/views/layouts/website/master.blade.php ENDPATH**/ ?>