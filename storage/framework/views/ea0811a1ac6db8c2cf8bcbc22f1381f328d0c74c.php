<?php $__env->startSection('content'); ?>
    <div class="inner-banner" style="background:#000;">
        <div class="container text-center">
            <h1>MY ACCOUNT</h1>
        </div>
    </div>


    <div class="my-acc registration-page">
        <div class="container">
            <div id="post-38" class="post-39 page type-page status-publish hentry">
                <div class="row">
                    <div class="col-lg-3 col-md-12">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#dashboard" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#orders" role="tab" aria-controls="v-pills-profile" aria-selected="false">Orders</a>
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#address" role="tab" aria-controls="v-pills-settings" aria-selected="false">Addresses</a>
                            <a class="nav-link" id="v-pills-account-details" data-toggle="pill" href="#account-details" role="tab" aria-controls="v-pills-settings" aria-selected="false">Account</a>
                            <a class="nav-link" id="v-pills-logout" data-toggle="pill" href="#logout" role="tab" aria-controls="v-pills-settings" aria-selected="false">Logout</a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <p>Hello <strong>my-email</strong> (not <strong>my-email</strong> <a href="#">Log out</a> )</p>
                                <p>From your account dashboard you can view your <a href="">recent orders</a> , manage your <a href="">shipping and billing addresses</a> , and <a href="">edit your password and account details</a> .</p>
                            </div>
                            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <table class="table my-tables  table-bordered  table-responsive text-nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">Order</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">#12279</th>
                                            <td>March 11, 2022 </td>
                                            <td>Cancelled </td>
                                            <td>£5.00 for 5 items</td>
                                            <td><button class="btn-for">VIEW</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                <p class="address-para">The following addresses will be used on the checkout page by default.</p>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="billing">
                                            <h2 class="addres">Billing address</h2>
                                            <a href="<?php echo e(route ('billing-address')); ?>" class="edit">Edit</a>
                                            <a href="<?php echo e(route ('billing-address')); ?>" class="add">Add</a>
                                            <p class="details">admin admin <br> rcao <br> 12 ventnor street<br> hull<br> test <br>HU5 2LP<br> United Kingdom (UK)</p>
                                            <p class="details">You have not set up this type of address yet.</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="billing">
                                            <h2 class="addres">Shipping address</h2>
                                            <a href="<?php echo e(route ('shipping-address')); ?>" class="edit">Edit</a>
                                            <a href="<?php echo e(route ('shipping-address')); ?>" class="add">Add</a>
                                            <p class="details">United Kingdom (UK)</p>
                                            <p class="details">You have not set up this type of address yet.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-details" role="account-details" aria-labelledby="account-details">
                                <div class="form">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <label>First name <span style="color: red;">*</span></label> <br>
                                            <input type="text" class="form-for-us" id="text">
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <label>Last Name <span style="color: red;">*</span></label> <br>
                                            <input type="text" class="form-for-us" id="text">
                                        </div>
                                    </div>
                                    <label>Display name <span style="color: red;">*</span></label> <br>
                                    <input type="text" class="form-for-us" id="text">

                                    <label>Email address<span style="color: red;">*</span></label> <br>
                                    <input type="email" class="form-for-us" id="mail">


                                    <div class="password-group">
                                        <label>Current password (leave blank to leave unchanged)<span style="color: red;">*</span></label> <br>
                                        <input type="password" class="form-for-us password-box" aria-label="password" value="wdocechoiwceh98">
                                        <a href="#!" class="password-visibility"><i class="fa fa-eye"></i></a>
                                    </div>
                                    <div class="password-group">
                                        <label>New password (leave blank to leave unchanged)<span style="color: red;">*</span></label> <br>
                                        <input type="password" class="form-for-us password-box" aria-label="password" value="wdocechoiwceh98">
                                        <a href="#!" class="password-visibility"><i class="fa fa-eye"></i></a>
                                    </div>
                                    <div class="password-group">
                                        <label> Confirm new password<span style="color: red;">*</span></label> <br>
                                        <input type="password" class="form-for-us password-box" aria-label="password" value="wdocechoiwceh98">
                                        <a href="#!" class="password-visibility"><i class="fa fa-eye"></i></a>
                                    </div>
                                    <button type="submit" id="submit" class="submit">Log In</button>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="logout" role="logout" aria-labelledby="logout">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(function() {
            $('.password-group').find('.password-box').each(function(index, input) {
                var $input = $(input);
                $input.parent().find('.password-visibility').click(function() {
                    var change = "";
                    if ($(this).find('i').hasClass('fa-eye')) {
                        $(this).find('i').removeClass('fa-eye')
                        $(this).find('i').addClass('fa-eye-slash')
                        change = "text";
                    } else {
                        $(this).find('i').removeClass('fa-eye-slash')
                        $(this).find('i').addClass('fa-eye')
                        change = "password";
                    }
                    var rep = $("<input type='" + change + "' />")
                        .attr('id', $input.attr('id'))
                        .attr('name', $input.attr('name'))
                        .attr('class', $input.attr('class'))
                        .val($input.val())
                        .insertBefore($input);
                    $input.remove();
                    $input = rep;
                }).insertAfter($input);
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rc-air-craft\resources\views/website/registration.blade.php ENDPATH**/ ?>