<?php $__env->startSection('content'); ?>
    <div class="inner-banner" style="background:#000;">
        <div class="container text-center">
            <h1>CART</h1>
        </div>
    </div>

    <div class="cart-of-table">
        <?php if($message = Session::get('success')): ?>
            <div class="p-4 mb-3 bg-green-400 rounded" style="background: green;width:82%;display: block;margin: 0 auto;">
                <p class="text-green-800" style="margin: 0; text-align: center;" ><?php echo e($message); ?></p>
            </div>
        <?php endif; ?>
        <div class="container">
            <form action="<?php echo e(route('cart.update')); ?>" method="POST">
                <?php echo csrf_field(); ?>
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
                        <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="pro-<?php echo e($item->id); ?>">
                                <td>
                                    <button type="button" value="<?php echo e($item->id); ?>" scope="row" class="remove-btn" ><span class="croos">x</span></button>
                                </td>
                                <td><img src="<?php echo e(asset('public/admin/assets/images/product')); ?>/<?php echo e($item->attributes->image); ?>" style="width: 50px;"></td>
                                <td>
                                    <h6 class="prod-title"> <?php echo e($item->name); ?></h6> <br>
                                    <p class="answer"> <strong>Answer:</strong><?php echo e($item->answer); ?></p>
                                </td>
                                <td><?php echo e($item->price); ?></td>
                                <td>
                                <input type="hidden" name="id[]" value="<?php echo e($item->id); ?>" >
                                    <div class="input-group quantity_goods">
                                        <input type="number" step="1" min="1" max="<?php echo e($item->max_competition); ?>" id="num_count" name="quantity[]" value="<?php echo e($item->quantity); ?>" title="Qty">
                                    </div>
                                </td>
                                <td>£<?php echo e(number_format($item->quantity * $item->price, 2)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code">
                        <button type="button" class="button coupon-btn" name="apply_coupon" value="Apply coupon">Apply coupon</button>
                        <div><span style="color: red" id="error-coupon"></span></div>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3 right-txt ">
                        <button type="submit" class="button" name="update_cart" value="Update cart" aria-disabled="false">Update cart</button>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <h3 class="cart-totals">Cart totals</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Subtotal</th>
                                <th scope="col" colspan="2">£<?php echo e(number_format(Cart::getTotal(), 2)); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(Session::has('discount')): ?>
                                <?php
                                    $discount = Session::get('discount');
                                ?>
                                <tr>
                                    <td>Coupon Discount</td>
                                    <td>£<?php echo e(number_format($discount['discount'], 2)); ?></td>
                                    <td>
                                        <button title="Remove coupon" type="button" data-session="discount" class="btn btn-danger btn-sm remove-coupon-btn"><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td colspan="2">£<?php echo e(number_format(Cart::getTotal()-$discount['discount'], 2)); ?></td>
                                </tr>
                            <?php else: ?>
                                <tr>
                                    <td>Total</td>
                                    <td>£<?php echo e(number_format(Cart::getTotal(), 2)); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <form action="<?php echo e(route('order.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <button type="submit" style="cursor: pointer" class="proceesd" value="Proceed to checkout" aria-disabled="false">Proceed to checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script>
        $(document).on('click', '.coupon-btn', function(){
            var coupon_code = $('#coupon_code').val();
            if(coupon_code.length==0){
                $('#error-coupon').html('Invalid coupon code.');
            }else if(coupon_code.length < 6 || coupon_code.length > 6){
                $('#error-coupon').html('Invalid coupon code.');
            }else{
                $.ajax({
                    type:"get",
                    url:"<?php echo e(url('apply_coupon')); ?>",
                    data:{'coupon_code':coupon_code},
                    success:function(data){
                        if(data.status=='sign'){
                            window.location.href = "<?php echo e(url('/login')); ?>'";
                        }else if(data.status=='expired'){
                            Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'This is expired.',
                            showConfirmButton: false,
                            timer: 1500
                            })
                        }else if(data.status=='in-active'){
                            Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'This is not active.',
                            showConfirmButton: false,
                            timer: 1500
                            })
                        }else if(data.status=='used'){
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'You have used this code can not use again.',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }else if(data.status=='true'){
                            $('#cart-details').html(data.cart);
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Congrates! Coupon applied successfully.',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            location.reload();
                        }else if(data.status=='not-found'){
                            Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Sorry this is not matched.',
                            showConfirmButton: false,
                            timer: 1500
                            })
                        }
                    },
                    error:function (er) {
                        console.log(er);
                    }
                });
            }
        });

        $("#coupon_code").keyup(function(){
            var coupon_code = $(this).val();
            if(coupon_code.length == 6){
                $('#error-coupon').html('');
            }else{
                $('#error-coupon').html('Invalid Coupon');
                return false;
            }
        });

        $(document).on('click', '.remove-coupon-btn', function(){
            var session_key = $(this).attr('data-session');
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to remove coupon?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type:"get",
                        url:"<?php echo e(url('remove-coupon')); ?>",
                        data:{'session_key':session_key},
                        success:function(data){
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'You have removed coupon successfully.',
                                showConfirmButton: false,
                                timer: 1500
                            })

                            location.reload();
                        },
                        error:function (er) {
                            console.log(er);
                        }
                    });
                }
            })
        });

        $(document).on('click', '.remove-btn', function(){
            var product_id = $(this).val();
            var row = $('#pro-'+product_id);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url : "<?php echo e(route('cart.remove')); ?>",
                        data : {'product_id' : product_id},
                        type : 'POST',
                        success : function(result){
                            if(result){
                                $(row).remove();
                                Swal.fire(
                                    'Deleted!',
                                    'Your item has been deleted.',
                                    'success'
                                )
                            }else{
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!',
                                })
                            }
                        }
                    });
                }
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rc-air-craft\resources\views/website/cart.blade.php ENDPATH**/ ?>