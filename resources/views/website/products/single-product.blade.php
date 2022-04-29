@extends('layouts.website.master')
@push('css')
    <style>
        .alert.alert-secondary p {margin-bottom: 0;}
    </style>
@endpush
@section('content')
    <div class="inner-banner" style="background:#000;">
        <div class="container text-center">
            <h1>Single Product</h1>
        </div>
    </div>

    <div class="single-produc">
        <div class="container">
            @if(session()->has('error'))
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-secondary" style="display: flex;justify-content: space-between; border-top:2px solid red; align-item:center" role="alert">
                       <p><i class="fa fa-info-circle" style="color: rgb(187, 50, 50)"></i> {{ session()->get('error') }}</p> <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @endif
            <div class="row" >
                <div class="col-lg-6 col-md-6 img-hover-zoom" >
                    <img src="{{ asset('public/admin/assets/images/product') }}/{{ $product->image }}" style="width: 100%;">
                </div>
                <div class="col-lg-6 col-md-6" id="auction-timer_{{ $product->id }}">
                    <h6 class="pro-price">£{{ number_format($product->price, 2) }}</h6>
                    <p class="descrip">{!! $product->description !!}</p>
                    <div class="time-slot">
                        <div id="countdown">
                            <ul>
                                <li><span id="days-{{ $product->id }}"></span>days</li>
                                <li><span id="hours-{{ $product->id }}"></span>Hours</li>
                                <li><span id="minutes-{{ $product->id }}"></span>Minutes</li>
                                <li><span id="seconds-{{ $product->id }}"></span>Seconds</li>
                            </ul>
                        </div>
                    </div>
                    <br>
                    <p class="descrip">Draw ends: {{ date('F d, Y H:i A', strtotime($product->draw_ends)) }} Timezone: UTC+0 <br>
                        This draw has a minimum of {{ $product->min_competition }} Competition<br>
                        This draw is limited to {{ $product->max_competition }} Competition<br>
                        Tickets sold: 85<br>
                        This draw will have {{ $product->number_of_winners }} winner
                    </p>
                    <div class="bar-for-us">
                        <div class="ending">
                            <p class="start-point">{{ $product->min_competition }}</p>
                            <p class="end-point">{{ $product->max_competition }}</p>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                                <span class="sr-only">25% Complete</span>
                            </div>
                        </div>
                    </div>

                    <div class="ques ">
                        @if(!empty($product->hasQuestion))
                            <h2 class="answer ">Answer the question: </h2>
                            <p class="descrip">{{ $product->hasQuestion->question }}</p>
                            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="navigatee">
                                    <ul>
                                        @foreach($product->hasQuestion->hasOptions as $option)
                                            @if($option->answer)
                                                <input type="hidden" value="{{ $option->choices }}" id="input-answer" name="answer">
                                                <li class="correct" style="cursor: pointer" data-answer="{{ $option->choices }}">{{ $option->choices }}</li>
                                            @else
                                                <li class="wrong" style="cursor: pointer" data-answer="{{ $option->choices }}">{{ $option->choices }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="input-group quantity_goods">
                                    <input type="hidden" value="{{ $product->id }}" name="id">
                                    <input type="hidden" value="{{ $product->name }}" name="name">
                                    <input type="hidden" value="{{ $product->price }}" name="price">
                                    <input type="hidden" value="{{ $product->image }}"  name="image">
                                    <input type="hidden" value="{{ $product->max_competition }}" name="max_competition">
                                    <input type="number" step="1" min="1" max="{{ $product->max_competition }}" id="num_count" name="quantity" value="1" title="Qty">
                                    <button type="submit" class="btn-to-you" style="cursor: pointer">Participate now</button>
                                </div>
                            </form>
                        @else
                            <div class="input-group quantity_goods">
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <input type="hidden" value="{{ $product->name }}" name="name">
                                <input type="hidden" value="{{ $product->price }}" name="price">
                                <input type="hidden" value="{{ $product->image }}"  name="image">
                                <input type="number" step="1" min="1" max="{{ $product->max_competition }}" id="num_count" name="quantity" value="1" title="Qty">
                                <button type="submit" class="btn-to-you" style="cursor: pointer">Participate now</button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="description">
                <div class="des">
                    <p class="hed">Description</p>
                </div>
                <div class="main-des">
                    <p class="descrip">{!! $product->short_description !!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
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
                url : "{{ route('get_product_ids') }}",
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
                document.getElementById('days-'+id).innerHTML=days;
                document.getElementById('hours-'+id).innerHTML=hours;
                document.getElementById('minutes-'+id).innerHTML=minutes;
                document.getElementById('seconds-'+id).innerHTML=seconds;

                // If the count down is over, write some text
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById('auction-timer_'+id).innerHTML = "EXPIRED";
                }
            }, 1000);
        }
    </script>
@endpush
