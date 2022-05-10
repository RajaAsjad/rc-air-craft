@extends('layouts.website.master')
@section('content')
    <div class="inner-banner" style="background:#000;">
        <div class="container text-center">
            <h1>CART</h1>
        </div>
    </div>

    <div class="cart-of-table">
        @if ($message = Session::get('success'))
            <div class="p-4 mb-3 bg-green-400 rounded" style="background: green;width:82%;display: block;margin: 0 auto;">
                <p class="text-green-800" style="margin: 0; text-align: center;" >{{ $message }}</p>
            </div>
        @endif
        <div class="container">
            <form action="{{ route('cart.update') }}" method="POST">
                @csrf
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
                        @foreach ($cartItems as $item)
                            <tr id="pro-{{ $item->id }}">
                                <td>
                                    <button type="button" value="{{ $item->id }}" scope="row" class="remove-btn" ><span class="croos">x</span></button>
                                </td>
                                <td><img src="{{ asset('public/admin/assets/images/product') }}/{{ $item->attributes->image}}" style="width: 50px;"></td>
                                <td>
                                    <h6 class="prod-title"> {{ $item->name }}</h6> <br>
                                    <p class="answer"> <strong>Answer:</strong>{{ $item->answer}}</p>
                                </td>
                                <td>{{ $item->price}}</td>
                                <td>
                                <input type="hidden" name="id[]" value="{{ $item->id}}" >
                                    <div class="input-group quantity_goods">
                                        <input type="number" step="1" min="1" max="{{ $item->max_competition }}" id="num_count" name="quantity[]" value="{{ $item->quantity }}" title="Qty">
                                    </div>
                                </td>
                                <td>£{{ number_format($item->quantity * $item->price, 2) }}</td>
                            </tr>
                        @endforeach
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
                                <th scope="col" colspan="2">£{{ number_format(Cart::getTotal(), 2) }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(Session::has('discount'))
                                <?php
                                    $discount = Session::get('discount');
                                ?>
                                <tr>
                                    <td>Coupon Discount</td>
                                    <td>£{{ number_format($discount['discount'], 2) }}</td>
                                    <td>
                                        <button title="Remove coupon" type="button" data-session="discount" class="btn btn-danger btn-sm remove-coupon-btn"><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td colspan="2">£{{ number_format(Cart::getTotal()-$discount['discount'], 2) }}</td>
                                </tr>
                            @else
                                <tr>
                                    <td>Total</td>
                                    <td>£{{ number_format(Cart::getTotal(), 2) }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <form action="{{ route('order.store') }}" method="post">
                        @csrf
                        <button type="submit" style="cursor: pointer" class="proceesd" value="Proceed to checkout" aria-disabled="false">Proceed to checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
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
                    url:"{{ url('apply_coupon') }}",
                    data:{'coupon_code':coupon_code},
                    success:function(data){
                        if(data.status=='sign'){
                            window.location.href = "{{ url('/login') }}'";
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
                        url:"{{ url('remove-coupon') }}",
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
                        url : "{{ route('cart.remove') }}",
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
@endpush
