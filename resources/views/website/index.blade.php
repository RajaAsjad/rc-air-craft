@extends('layouts.website.master')
@section('content')
    <!-- banner-start -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="aircraft">Welcome To R.C <br><span>Aircraft Online</span></h1>
                    <a class="all-site-btn"  href="#competitions">View Competition</a>

                </div>
            </div>
        </div>
    </div>
    <!-- banner-send -->

    <!-- min-header-start -->
    <div class="min-header">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p><img src="{{ asset('public/assets/website') }}/images/lock.png" alt="">SSL Secured Checkout</p>
                </div>
                <div class="col-md-4">
                    <p><img src="{{ asset('public/assets/website') }}/images/calend.png" alt="">New Competitions Every Week</p>
                </div>
                <div class="col-md-4">
                    <p><img src="{{ asset('public/assets/website') }}/images/fb.png" alt="">Live draws On Facebook </p>
                </div>
            </div>
        </div>
    </div>
    <!-- min-header-end -->

    <!-- products-part-1-start -->
    <section id="home-products">
        <div class="category-1" id="competitions">
            <div class="container">
                <div class="text-text">
                    <h2>RC aircraft online</h2>
                    <h4>Competitions</h4>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    @foreach ($data['competitions'] as $product)
                        <div class="col-lg-4 col-md-6">
                            <ul class="products">
                                <li class="product aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                                    <div class="pic">
                                        <img src="{{ asset('public/admin/assets/images/product') }}/{{ $product->image }}">
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
                                        <p>{{ $product->name }}</p>
                                        <p>{!! $product->short_description !!}</p>
                                    </div>
                                    <h5>0 <span>Entries Remaining</span></h5>
                                    <a href="{{route ('single-product', $product->slug) }}">Enter Now</a>
                                    <h3>
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi><span class="woocommerce-Price-currencySymbol">$</span>{{ number_format($product->price, 2) }}</bdi>
                                        </span> 
                                        <span>Per Entry</span>
                                    </h3>
                                </li>
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- home-prdcts -->
    <section id="home-products">
        <div class="category-2" {{ $product->category_slug }}>
            <div class="container">
                <div class="text-text">
                    <h2>RC aircraft online</h2>
                    <h4>Medium Competitions</h4>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    @foreach ($data['mini-competitions'] as $product)
                        <div class="col-lg-4 col-md-6">
                            <ul class="products">
                                <li class="product aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                                    <div class="pic">
                                        <img src="{{ asset('public/admin/assets/images/product') }}/{{ $product->image }}">
                                    </div>
                                    <div class="time-slot">
                                        <div class="main-lottery lottery-time-countdown is-wc_lotery_countdown" data-time="1647734400" data-lotteryid="7431" data-format="yowdHMS"><span class="wc_lotery_countdown-row wc_lotery_countdown-show4">
                                            <span class="wc_lotery_countdown-section"><span class="wc_lotery_countdown-amount">1</span> <br> <span class="wc_lotery_countdown-period">Day</span></span>
                                            <span class="wc_lotery_countdown-section"><span class="wc_lotery_countdown-amount">11</span> <br> <span class="wc_lotery_countdown-period">Hours</span></span><span class="wc_lotery_countdown-section"><span class="wc_lotery_countdown-amount">53</span>                                        <br>
                                            <span class="wc_lotery_countdown-period">Minutes</span>
                                            </span>
                                            <span class="wc_lotery_countdown-section"><span class="wc_lotery_countdown-amount">52</span> <br> <span class="wc_lotery_countdown-period">Seconds</span></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="box">
                                        <p>{{ $product->name }}</p>
                                        <p>{!! $product->short_description !!}</p>
                                    </div>
                                    <h5>0 <span>Entries Remaining</span></h5>
                                    <a href="{{route ('single-product', $product->slug) }}">Enter Now</a>
                                    <h3>
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi><span class="woocommerce-Price-currencySymbol">$</span>{{ number_format($product->price, 2) }}</bdi>
                                        </span> 
                                        <span>Per Entry</span>
                                    </h3>
                                </li>
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- products-part-1-end -->
    <!-- play-start -->
    <div class="play">
        <div class="container">
            <h2>HOW TO PLAY</h2>
            <h4>Playing Our Competitions is Easy</h4>
            <div class="row">
                <div class="col-lg-3 col-md-6 play-inner">
                    <img src="{{ asset('public/assets/website') }}/images/play-1.png">
                    <h4>CHOOSE COMPETITION</h4>
                    <p class="play-text">Choose from our list of current competitions which prize you want to enter for.</p>
                </div>
                <div class="col-lg-3 col-md-6 play-inner">
                    <img src="{{ asset('public/assets/website') }}/images/play-2.png">
                    <h4>answer the question</h4>
                    <p class="play-text">Answer the skill based question for your entry to be successful</p>
                </div>
                <div class="col-lg-3 col-md-6 play-inner">
                    <img src="{{ asset('public/assets/website') }}/images/play-4.png">
                    <h4>enter live draw</h4>
                    <p class="play-text">Assuming you entered the answer correctly you will be entered into the Facebook Live draw.</p>
                </div>
                <div class="col-lg-3 col-md-6 play-inner">
                    <img src="{{ asset('public/assets/website') }}/images/fb-1.png">
                    <h4>Facebook</h4>
                    <p class="play-text">Sit back and watch the live draw on our Facebook Page.</p>
                </div>
            </div>
            <div class="account">
                <a href="{{route ('login') }}">CREATE ACCOUNT</a>
            </div>
        </div>
    </div>
    <!-- play-end -->

    <!-- about-start -->
    <div class="about" id="about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <img src="{{ asset('public/assets/website') }}/images/20201206_231807.jpg" class="img-fluid">
                </div>
                <div class="col-lg-8 col-md-8 about-text">
                    <h4 data-aos="fade-down" data-aos-duration="3000" class="aos-init aos-animate">ABOUT US</h4>
                    <h2 data-aos="fade-down" data-aos-duration="3000" class="aos-init aos-animate">RC aircraft online</h2>
                    <p></p>
                    <p>At<strong> R.C Aircraft Online</strong>, our goal is to create lots of winners up and down the country winning fantastic prizes for less than the cost of a receiver battery. We are supporting UK model shops and UK manufacturers in
                        what we do, which is very important to us.&nbsp; All prizes display a Entry price per Entry and a LIVE draw is done on our Facebook page once all Entries are sold, <strong>Competitions are drawn same week of selling out where possible.</strong>                        Prizes are then sent to the Winners via courier FREE of charge*&nbsp; &nbsp; Tell your Friends, Family and Club members and come and join the Fun.</p>
                    <p></p>
                    <a href="{{ ('about-us') }}" class="all-site-btn">READ MORE</a>
                </div>
            </div>
        </div>
    </div>
    <!-- about-end -->

    <!-- gallery-start -->
    <div class="gallery">
        <div class="container-fluid">
            <h2>our valued winners</h2>
            <h4>Here are just a few of our past winners!</h4>

            <section class="winner-sec" id="gallery">
                <div class="winner-main" id="winner-main">
                    <div class="slider-win" id="">
                        <input type="radio" name="testimonialwin" class="t-1" data-attr="1" id="t-1">
                        <input type="radio" name="testimonialwin" class="t-1" data-attr="2" id="t-2">
                        <input type="radio" name="testimonialwin" class="t-1" data-attr="3" id="t-3" checked>
                        <input type="radio" name="testimonialwin" class="t-1" data-attr="4" id="t-4">
                        <input type="radio" name="testimonialwin" class="t-1" data-attr="5" id="t-5">
                        <div class="testimonials-win">
                            <label class="item" id="myitem1" for="t-1">
                                <img src="{{ asset('public/assets/website') }}/images/gal-1.jpg">
                             </label>
                            <label class="item" id="myitem2" for="t-2">
                                <img src="{{ asset('public/assets/website') }}/images/gal-2.jpg">
                             </label>
                            <label class="item" id="myitem3" for="t-3">
                                <img src="{{ asset('public/assets/website') }}/images/gal-3.jpg">
                             </label>
                            <label class="item" id="myitem4" for="t-4">
                                <img src="{{ asset('public/assets/website') }}/images/gal-4.jpg">
                             </label>
                            <label class="item" id="myitem5" for="t-5">
                                <img src="{{ asset('public/assets/website') }}/images/gal-5.jpg">
                             </label>
                        </div>
                    </div>
                    <div class="dots" id="myDIV">
                        <label class="dot1 mydots" for="t-1"></label>
                        <label class="dot2 mydots" for="t-2"></label>
                        <label class="dot3 mydots active" for="t-3"></label>
                        <label class="dot4 mydots" for="t-4"></label>
                        <label class="dot5 mydots" for="t-5"></label>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- gallery-end -->

@endSection
