@extends('layouts.website.master')
@section('content')

    <div class="inner-banner" style="background:#000;">
        <div class="container text-center">
            <h1>SOLD OUT</h1>
        </div>
    </div>

    <section id="home-products">
        <div class="category-1" id="competitions1">
            <div class="container">
                <div class="text-text">
                    <h2>Sold Out Products </h2>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <ul class="products">
                            <li class="product aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                                <div class="pic">
                                    <img src="{{ asset('public/assets/website') }}/images/sold-out.jpg">
                                </div>
                                <div class="time-slot">
                                    <div id="countdown">
                                        <ul>
                                            <li><span id="days"></span>days</li>
                                            <li><span id="hours"></span>Hours</li>
                                            <li><span id="minutes"></span>Minutes</li>
                                            <li><span id="seconds"></span>Seconds</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="box">
                                    <p></p>
                                    <p>HRB Lipo’s</p>
                                    <p>2 x 6s 4000mah or</p>
                                    <p>2 x 4s 5000mah or&nbsp;<strong><span style="color: #ff0000;">NOW SOLD OUT</span></strong></p>
                                    <p>3 x 3s 5000 mah Lipos</p>
                                    <p></p>
                                </div>
                                <h5>0 <span>Entries Remaining</span></h5>
                                <a href="#">Enter Now</a>
                                <h3><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">£</span>1.90</bdi>
                                    </span> <span>Per Entry</span></h3>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6"></div>
                    <div class="col-lg-4 col-md-6"></div>
                </div>
            </div>
        </div>
    </section>

@endsection
