<?php $__env->startSection('content'); ?>
    <div class="inner-banner" style="background:#000;">
        <div class="container text-center">
            <h1>MY ACCOUNT</h1>
        </div>
    </div>

    <div class="my-acc">
        <div class="container ">
            <div id="post-39" style="width:100%" style="height:auto" class="post-39 page type-page status-publish hentry">
                <div class="entry-content">
                    <div class="my-account-forms">
                        <div class="woocommerce-notices-wrapper"></div>
                        <div class="row" id="customer_login">
                            <div  class="col-lg-6 col-md-12" style="height:auto">

                                <h2>Login</h2>
                                <form method="POST" action="<?php echo e(route('user-authenticate')); ?>" >
                                    <?php echo csrf_field(); ?>
                                    <div  class="box-body">
                                        <input type="hidden" name="user_type" value="User">
                                        <div class="form-group">
                                            <label for="">Email address&nbsp;<span class="required"></span></label>
                                            <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                <input type="email"  class="form-control" value="<?php echo e(old('email')); ?>" name="email" placeholder="Enter user email">
                                                <span style="color: red"><?php echo e($errors->first('email')); ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password&nbsp;<span class="required"></span></label> <br>
                                            <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                <input type="password" id="password" class="form-control" name="password" placeholder="Enter password">
                                                <span style="color: red"><?php echo e($errors->first('password')); ?></span>
                                            </div>
                                        </div>

                                        <button type="submit" class="woocommerce-button button woocommerce-form-login__submit">Log in</button>
                                        <p class="form-row">
                                            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                            <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"> <span>Remember me</span>
                                            </label>

                                        </p>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6 col-md-12" style="height:auto">
                                <h2>Register</h2>

                                <form method="POST" action="<?php echo e(route('register.store')); ?>"  class="woocommerce-form woocommerce-form-register register">
                                    <?php echo csrf_field(); ?>
                                   <div  class="box-body">
                                        <div class="form-group">
                                            <label for="">Name<span class="required"></span></label> <br>
                                            <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                <input type="text" id="name" class="form-control" value="<?php echo e(old('name')); ?>" name="name" placeholder="Enter user name">
                                                <span style="color: red"><?php echo e($errors->first('name')); ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email address&nbsp;<span class="required"></span></label>
                                            <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                <input type="email"  class="form-control" value="<?php echo e(old('email')); ?>" name="email" placeholder="Enter user email">
                                                <span style="color: red"><?php echo e($errors->first('email')); ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password&nbsp;<span class="required"></span></label> <br>
                                            <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                <input type="password" id="password" class="form-control" name="password" placeholder="Enter password">
                                                <span style="color: red"><?php echo e($errors->first('password')); ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Confirm Password&nbsp;<span class="required"></span></label> <br>
                                            <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                <input type="password" id="password-confirm" class="form-control" name="confirm-password" placeholder="Confirm password">
                                                <span style="color: red"><?php echo e($errors->first('confirm-password')); ?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="col-sm-2 control-label"></label>
                                            <div  class="woocommerce-form-row form-row">
                                              <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit"
                                                >Register</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rc-air-craft\resources\views/website/login.blade.php ENDPATH**/ ?>