@extends('layouts.website.master')
@section('content')
    <div class="inner-banner" style="background:#000;">
        <div class="container text-center">
            <h1>Single Product</h1>
        </div>
    </div>

    <div class="single-produc">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 img-hover-zoom">
                    <img src="{{ asset('public/admin/assets/images/product') }}/{{ $product->image }}" style="width: 100%;">
                </div>
                <div class="col-lg-6 col-md-6">
                    <h6 class="pro-price">${{ number_format($product->price, 2) }}</h6>
                    <p class="descrip">{!! $product->description !!}</p>
                    <div class="time-slot-pro">
                        <h2>Time Left</h2>
                        <div id="countdown">
                            <ul>
                                <li><span id="days"></span>days</li>
                                <li><span id="hours"></span>Hours</li>
                                <li><span id="minutes"></span>Minutes</li>
                                <li><span id="seconds"></span>Seconds</li>
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
                        <h2 class="answer ">Answer the question: </h2>
                        <p class="descrip ">{{ $product->hasQuestion->question }}?</p>
                        <ul>
                            @foreach($product->hasQuestion->hasOptions as $option)
                                <li>{{ $option->choices }}</li>
                            @endforeach
                        </ul>
                        <div class="input-group quantity_goods">
                            <input type="number" step="1" min="1" max="10" id="num_count" name="quantity" value="1" title="Qty"><button class="btn-to-you ">Participate now for $66.11</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="description">
                <div class="des">
                    <p class="hed">Description</p>
                </div>
                <div class="main-des">
                    <h2>Description</h2>
                    <p class="descrip">{!! $product->short_description !!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection