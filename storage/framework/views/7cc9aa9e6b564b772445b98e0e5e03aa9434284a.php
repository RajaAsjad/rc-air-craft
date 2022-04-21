<?php $__env->startSection('content'); ?>
    <div class="inner-banner" style="background:#000;">
        <div class="container text-center">
            <h1>CART</h1>
        </div>
    </div>

    <div class="cart-of-table">
        <div class="container">
            <table class="table text-nowrap table-responsive">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><span class="croos">x</span></th>
                        <td><img src="<?php echo e(asset('public/assets/website')); ?>/images/0c135afc-d363-4a73-99ba-554f9cf6c3fd-300x300.jpg" style="width: 50px;"></td>
                        <td>
                            <h6 class="prod-title"> Spring MEGA Draw</h6> <br>
                            <p class="anser"> <strong>Answer:</strong> B.M.F.A </p>
                        </td>
                        <td>£6.99</td>
                        <td>
                            <div class="input-group quantity_goods">
                                <input type="number" step="1" min="1" max="10" id="num_count" name="quantity" value="1" title="Qty">
                            </div>
                        </td>
                        <td>£6.99</td>
                    </tr>
                </tbody>
            </table>

            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code"><button type="submit" class="button" name="apply_coupon" value="Apply coupon">Apply coupon</button>
                </div>
                <div class="col-md-6 right-txt">
                    <button type="submit" class="button" name="update_cart" value="Update cart" aria-disabled="false">Update cart</button>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <h3 class="cart-totasl">Cart totals</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Subtotal</th>
                                <th scope="col">£6.99</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Total</td>
                                <td>£6.99</td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="proceesd" name="update_cart" value="Update cart" aria-disabled="false">Proceed to checkout</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/demolinkweb2.com/public_html/rc-air-craft/resources/views/website/cart.blade.php ENDPATH**/ ?>