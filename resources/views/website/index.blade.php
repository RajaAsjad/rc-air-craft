@extends('layouts.website.master')
@section('content')
    <!-- banner-start -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="aircraft"> {!! $home_page_data['banner_heading'] !!} </h1>
                    <a class="all-site-btn"  href="#competitions">View Competition</a>
                    @if (session('message'))
                        <div class="callout callout-success">
                            {{ session('status') }}
                        </div>
                    @endif
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
                    @if(!empty($data['competitions']))
                        @foreach ($data['competitions'] as $product)
                            <div class="col-lg-4 col-md-6" id="auction-timer_{{ $product->id }}">
                                <ul class="products">
                                    <li class="product aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                                        <div class="pic">
                                            <img src="{{ asset('public/admin/assets/images/product') }}/{{ $product->image }}">
                                        </div>
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
                                        <div class="box">
                                            <p>{{ $product->name }}</p>
                                            <p>{!! $product->short_description !!}</p>
                                        </div>
                                        <h5>0 <span>Entries Remaining</span></h5>
                                        <a href="{{route ('single-product', $product->slug) }}">Enter Now</a>
                                        <a class="font" href="{{route ('terms-and-conditions') }}#4.8" style="font-size: 13px;background:none;">Click Here For Free Entry Terms</a>
                                        <h3>
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi><span class="woocommerce-Price-currencySymbol">??</span>{{ number_format($product->price, 2) }}</bdi>
                                            </span>
                                            <span>Per Entry</span>
                                        </h3>

                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- home-prdcts -->
    <section id="home-products">
        <div class="category-2" id="mini-competitions">
            <div class="container">
                <div class="text-text">
                    <h2>RC aircraft online</h2>
                    <h4>Medium Competitions</h4>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    @foreach ($data['mini-competitions'] as $product)
                        <div class="col-lg-4 col-md-6" id="auction-timer_{{ $product->id }}">
                            <ul class="products">
                                <li class="product aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                                    <div class="pic">
                                        <img src="{{ asset('public/admin/assets/images/product') }}/{{ $product->image }}">
                                    </div>
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
                                    <div class="box">
                                        <p>{{ $product->name }}</p>
                                        <p>{!! $product->short_description !!}</p>
                                    </div>
                                    <h5>0 <span>Entries Remaining</span></h5>
                                    <a href="{{route ('single-product', $product->slug) }}">Enter Now</a>
                                    <a class="font" href="{{route ('terms-and-conditions') }}#4.8" style="font-size: 13px;background:none;">Click Here For Free Entry Terms</a>
                                    <h3>
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi><span class="woocommerce-Price-currencySymbol">??</span>{{ number_format($product->price, 2) }}</bdi>
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
                    @foreach ($howtoplays as $howtoplay)
                    <div class="col-lg-3 col-md-6 play-inner">
                        <img src="{{ asset('public/admin/assets/images/howToPlay') }}/{{ $howtoplay->image }}">
                        <h4>{{ $howtoplay->title }}</h4>
                        <p class="play-text">{!! $howtoplay->description !!}</p>
                    </div>
                    @endforeach
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
                    <img src="{{ asset('public/admin/assets/images/page') }}/{{$home_page_data['image']}}" alt="imgs" class="img-fluid">
                </div>
                <div class="col-lg-8 col-md-8 about-text">
                    <h4 data-aos="fade-down" data-aos-duration="3000" class="aos-init aos-animate">{!! $home_page_data['mt_about'] !!}</h4>
                    <h2 data-aos="fade-down" data-aos-duration="3000" class="aos-init aos-animate">{!! $home_page_data['about_heading'] !!}</h2>
                    <p></p>
                    <p>{!! $home_page_data['about_content'] !!}</p>
                    <a href="{{ ('about-us') }}" class="all-site-btn">READ MORE</a>
                </div>
            </div>
        </div>
    </div>
    <!-- about-end -->

    <!-- gallery-start -->
    <div class="gallery">
        <div class="container-fluid">
            @foreach ($sliders as $slider)
            <h2>{{$slider->title}}</h2>
            <h4>{{$slider->description}}</h4>
            @endforeach
            <section class="winner-sec" id="gallery">
                <div class="winner-main" id="winner-main">
                    <div class="slider-win" id="">
                        <input type="radio" name="testimonialwin" class="t-1" data-attr="1" id="t-1">
                        <input type="radio" name="testimonialwin" class="t-1" data-attr="2" id="t-2">
                        <input type="radio" name="testimonialwin" class="t-1" data-attr="3" id="t-3" checked>
                        <input type="radio" name="testimonialwin" class="t-1" data-attr="4" id="t-4">
                        <input type="radio" name="testimonialwin" class="t-1" data-attr="5" id="t-5">
                        <div class="testimonials-win">
                            @foreach ($sliders as $slider)
                            <label class="item" id="myitem{{$slider->id}}" for="t-{{$slider->id}}">
                                <img src="{{ asset('public/admin/assets/images/slider') }}/{{$slider->image}}" alt="imgs" >
                             </label>
                             @endforeach
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
@endSection

@push('js')
    <script>
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

        function timer(id, draw_end_date){
            // Set the date we're counting down to
            var countDownDate = new Date(draw_end_date).getTime();
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
@endpush
