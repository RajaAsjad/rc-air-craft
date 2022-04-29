<!-- footer -->
<footer class="footer">
    <div class="container footer-highlight">
        <div class="row">
            <div class="col-md-12">
                 <p><?php echo $home_page_data['footer_description']; ?></p>
            </div>
        </div>
    </div>
    <div class="container">
        <img class="foot-logo img-fluid" src="<?php echo e(asset('public/admin/assets/images/page')); ?>/<?php echo e($home_page_data['footer_image']); ?>">
        <div class="row foot-text">
            <div class="col-md-3">
                <h4>QUICK LINKS</h4>
                <ul>
                    <li><a href="#competitions">Competitions</a></li>
                    <li><a href="#mini-competitions">Medium Competitions</a></li>
                    <li><a href="<?php echo e(route ('cart.list')); ?>">Basket</a></li>
                    <li><a href="<?php echo e(route ('login')); ?>">My account</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4>LEGAL PAGES</h4>
                <ul>
                    <li><a href="<?php echo e(route ('terms-and-conditions')); ?>">Terms & Conditions</a></li>
                    <li><a href="<?php echo e(route ('faqs')); ?>">FAQs</a></li>
                    <li><a href="<?php echo e(route ('privacy-policy')); ?>">Privacy Policy</a></li>
                    <li><a href="<?php echo e(route ('about-us')); ?>">About Us</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4>CONTACT US</h4>
                <ul>
                    <li><a href=""><?php echo e($home_page_data['footer_email']); ?></a></li>
                </ul>
                <h4 class="mt-4">FOLLOW US</h4>
                <div class="icons">
                    <a href="<?php echo e($home_page_data['footer_facebook']); ?>"><i class="fa fa-facebook"></i></a>
                    <a href="<?php echo e($home_page_data['footer_instagram']); ?>"><i class="fa fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-md-3">
                <?php if(session('status')): ?>
				<div class="callout callout-success">
					<?php echo e(session('status')); ?>

				</div>
			<?php endif; ?>
                <h4>SIGNUP FOR NEWSLETTER</h4>
                <form action="<?php echo e(route('newsletter.store')); ?>" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <?php echo csrf_field(); ?>
                    <input type="email" name="email" placeholder="Email Address" id="email">
                    <button class="submit" type="submit" id="submit">Submit</button>
                    <img src="<?php echo e(asset('public/assets/website')); ?>/images/card.png" class="img-fluid mt-4">
                </form>
            </div>
        </div>
    </div>
</footer>
<section class="cop">
    <div class="container text-center copy">
        <div class="row">
            <div class="col-md-6">
                <p><?php echo $home_page_data['footer_copy_right_right_side']; ?></p>
            </div>
            <div class="col-md-6">
                <p> <?php echo $home_page_data['footer_copy_right_left_side']; ?></p>
            </div>
        </div>
    </div>
</section>
<!-- footer -->
<div id="back-top" style="display: block;">
    <a href="#top"> <span class="fa fa-arrow-circle-o-up"></span></a>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="<?php echo e(asset('public/assets/website')); ?>/js/main.js"></script>

<?php /**PATH C:\xampp\htdocs\rc-air-craft\resources\views/layouts/website/footer.blade.php ENDPATH**/ ?>