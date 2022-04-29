@extends('layouts.website.master')
@section('content')
    <div class="inner-banner" style="background:#000;">
        <div class="container text-center">
            <h1>CART</h1>
        </div>
    </div>

    <div class="cart-of-table">
        @if ($message = Session::get('success'))
            <div class="p-4 mb-3 bg-green-400 rounded" style="background: green;width: 25%;display: block;margin: 0 auto;">
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
                                <td>£{{ $item->quantity * $item->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code">
                        <button type="button" class="button coupon-btn" name="apply_coupon" value="Apply coupon">Apply coupon</button>
                    </div>

                    <div class="col-md-3 ">
                        <button type="submit" class="button" name="update_cart" value="Update cart" aria-disabled="false">Update cart</button>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <h3 class="cart-totasl">Cart totals</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Subtotal</th>
                                <th scope="col">£{{ Cart::getTotal() }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Total</td>
                                <td>£{{ Cart::getTotal() }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="proceesd" name="update_cart" value="Update cart" aria-disabled="false">Proceed to checkout</button>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).on('click', '.coupon-btn', function(){
            var coupon_code = $('#coupon_code').val();
            alert(coupon_code);
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
