<?php $__env->startPush('css'); ?>
    <style>
        .alert.alert-secondary p {margin-bottom: 0;}
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="inner-banner" style="background:#000;">
        <div class="container text-center">
            <h1>Single Product</h1>
        </div>
    </div>

    <div class="single-produc">
        <div class="container">
            <?php if(session()->has('error')): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-secondary" style="display: flex;justify-content: space-between; border-top:2px solid red; align-item:center" role="alert">
                        <p><i class="fa fa-info-circle" style="color: rgb(187, 50, 50)"></i> <?php echo e(session()->get('error')); ?></p> <a href="<?php echo e(route('login')); ?>" class="btn btn-primary btn-sm">Login <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            <?php elseif(session()->has('max-error')): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-secondary" style="display: flex;justify-content: space-between; border-top:2px solid red; align-item:center" role="alert">
                        <p><i class="fa fa-info-circle" style="color: rgb(187, 50, 50)"></i> <?php echo e(session()->get('max-error')); ?></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row" >
                <div class="col-lg-6 col-md-6 img-hover-zoom" >
                    <img src="<?php echo e(asset('public/admin/assets/images/product')); ?>/<?php echo e($product->image); ?>" style="width: 100%;">
                </div>
                <div class="col-lg-6 col-md-6" id="auction-timer_<?php echo e($product->id); ?>">
                    <h6 class="pro-price">£<?php echo e(number_format($product->price, 2)); ?></h6>
                    <p class="descrip"><?php echo $product->description; ?></p>
                    <div class="time-slot">
                        <div id="countdown">
                            <ul>
                                <li><span id="days-<?php echo e($product->id); ?>"></span>days</li>
                                <li><span id="hours-<?php echo e($product->id); ?>"></span>Hours</li>
                                <li><span id="minutes-<?php echo e($product->id); ?>"></span>Minutes</li>
                                <li><span id="seconds-<?php echo e($product->id); ?>"></span>Seconds</li>
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
                            <p class="start-point">0</p>
                            <p class="end-point"><?php echo e($product->max_competition); ?></p>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
                                <span class="sr-only">25% Complete</span>
                            </div>
                        </div>
                    </div>

                    <div class="ques ">
                        <?php if(!empty($product->hasQuestion)): ?>
                            <h2 class="answer ">Answer the question: </h2>
                            <p class="descrip"><?php echo e($product->hasQuestion->question); ?></p>
                            <form action="<?php echo e(route('cart.store')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="navigatee">
                                    <ul>
                                        <?php $__currentLoopData = $product->hasQuestion->hasOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($option->answer): ?>
                                                <input type="hidden" value="<?php echo e($option->choices); ?>" id="input-answer" name="answer">
                                                <li class="correct" style="cursor: pointer" data-answer="<?php echo e($option->choices); ?>"><?php echo e($option->choices); ?></li>
                                            <?php else: ?>
                                                <li class="wrong" style="cursor: pointer" data-answer="<?php echo e($option->choices); ?>"><?php echo e($option->choices); ?></li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                                <div class="input-group quantity_goods">
                                    <input type="hidden" value="<?php echo e($product->id); ?>" name="id">
                                    <input type="hidden" value="<?php echo e($product->name); ?>" name="name">
                                    <input type="hidden" value="<?php echo e($product->price); ?>" name="price">
                                    <input type="hidden" value="<?php echo e($product->image); ?>"  name="image">
                                    <input type="hidden" value="<?php echo e($product->max_competition); ?>" name="max_competition">
                                    <input type="number" step="1" min="1" max="<?php echo e($product->max_competition); ?>" id="num_count" name="quantity" value="1" title="Qty">
                                    <button type="submit" class="btn-to-you" style="cursor: pointer">Participate now</button>
                                </div>
                            </form>
                        <?php else: ?>
                            <div class="input-group quantity_goods">
                                <input type="hidden" value="<?php echo e($product->id); ?>" name="id">
                                <input type="hidden" value="<?php echo e($product->name); ?>" name="name">
                                <input type="hidden" value="<?php echo e($product->price); ?>" name="price">
                                <input type="hidden" value="<?php echo e($product->image); ?>"  name="image">
                                <input type="number" step="1" min="1" max="<?php echo e($product->max_competition); ?>" id="num_count" name="quantity" value="1" title="Qty">
                                <button type="submit" class="btn-to-you" style="cursor: pointer">Participate now</button>
                            </div>
                        <?php endif; ?>
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
<?php $__env->startPush('js'); ?>
    <script>
        $( "form" ).submit(function( event ) {
            if ( $('.selected').attr('data-answer')===$("#input-answer").val()) {
                return;
            }else{
                Swal.fire(
                    'Wrong Answer',
                    'You must pick correct answer.',
                    'question'
                )
            }
            event.preventDefault();
        });

        $(document).ready(function(){
            $.ajax({
                url : "<?php echo e(route('get_product_ids')); ?>",
                type : 'GET',
                success : function(response){
                    jQuery.each(response, function(index, item) {
                        timer(item.id, item.draw_ends);
                    });
                }
            });
        });

        function timer(id, date_time){
            // Set the date we're counting down to
            var countDownDate = new Date(date_time).getTime();
            // Update the count down every 1 second
            var x = setInterval(function() {
                // Get today's date and time
                var now = new Date().getTime();
                // Find the distance between now and the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Output the result in an element with id="demo"
                var d = document.getElementById('days-'+id);
                var h =document.getElementById('hours-'+id);
                var m = document.getElementById('minutes-'+id);
                var s = document.getElementById('seconds-'+id);

                if(d!=null){
                    document.getElementById('days-'+id).innerHTML=days;
                }
                if(h!=null){
                    document.getElementById('hours-'+id).innerHTML=hours;
                }
                if(m!=null){
                    document.getElementById('minutes-'+id).innerHTML=minutes;
                }
                if(s!=null){
                    document.getElementById('seconds-'+id).innerHTML=seconds;;
                }
            }, 1000);
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rc-air-craft\resources\views/website/products/single-product.blade.php ENDPATH**/ ?>