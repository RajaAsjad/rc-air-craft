@extends('layouts.website.master')
@section('content')

    <div class="inner-banner" style="background:#000;">
        <div class="container text-center">
            <h1>ABOUT US</h1>
        </div>
    </div>

    <section class="abt-page">
        <div class="container">
            <div class="row abt-iner-content">
                <div class="col-md-6">
                    <h2>FROM THE GROUND UP</h2>
                    <p>R.C Aircraft Online is the most popular R.C Aircraft giveaway site in the U.K, the competition is open to anyone over 18 in the U.K and abroad although only U.K postage is covered. Anyone entering from outside the U.K MUST pay for
                        shipping to their respective country before prizes are sent.</p>
                    <p>Brought to you by Andy Pinder a passionate R.C Pilot from Yorkshire.</p>
                    <p>As an R.C Pilot for over 19 years of fixed wing and rotary aircraft, I wanted to give everyone the chance to win fantastic R.C Aircraft for very little money. Costs in all hobbies are rising at a rapid rate and I wanted to make this
                        fantastic hobby accessible to everyone from all backgrounds.</p>
                    <p>Apart from being a businessman I am a down to earth bloke like everyone else who wants to give back to the R.C Aircraft community and encourage our next generation of R.C Pilots.</p>
                    <p>Join our <a href="https://www.facebook.com/RCAircraftonline/" target="_blank" rel="noopener noreferrer">FACEBOOK</a> Page which is growing daily and join in the Fun.</p>
                    <p>I have plans to introduce all aspects of R.C in the future and will be donating to charities as funds allow including Mental Health charities and charities for under privileged Children.</p>
                    <p><strong>THANKS FOR READING YOU SUPERSTARS.</strong></p>
                    <p><strong>Win BIG pay SMALL</strong></p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('public/assets/website') }}/images/slider-bg.jpg" class="img-fluid">
                </div>
            </div>
            <div class="why-choose-us">
                <h2>WHY CHOOSE US</h2>
                <div class="row">
                    <div class="col-sm-6">
                        <img src="{{ asset('public/assets/website') }}/images/sec5-icon-1.png" class="avatar wp-post-image" alt="">
                        <div class="title">Guaranteed draws</div>
                        <div class="desc">Draw dates are guaranteed from the launch of the competition. No extending of the competition draw dates beyond those specified in the terms.</div>
                    </div>
                    <div class="col-sm-6">
                        <img src="{{ asset('public/assets/website') }}/images/sec5-icon-2.png" class="avatar wp-post-image" alt="" loading="lazy" />
                        <div class="title">Instant tickets!</div>
                        <div class="desc">Ticket Numbers are received as soon as you enter both in your email confirmation &amp; your account.</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <img src="{{ asset('public/assets/website') }}/images/sec5-icon-3.png" class="avatar wp-post-image" alt="" loading="lazy" />
                        <div class="title">Guaranteed winners!</div>
                        <div class="desc">We will redraw if a winning number wasn't claimed.</div>
                    </div>
                    <div class="col-sm-6">
                        <img src="{{ asset('public/assets/website') }}/images/sec5-icon-4.png" class="avatar wp-post-image" alt="" loading="lazy" />
                        <div class="title">100% Transparency</div>
                        <div class="desc">All draws are live for anyone to watch on our Social Media &amp; I will answer any questions on air.</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <img src="{{ asset('public/assets/website') }}/images/sec5-icon-5.png" class="avatar wp-post-image" alt="" loading="lazy" />
                        <div class="title">No cash clauses</div>
                        <div class="desc">No cash alternatives. The winner always receives the prize they entered for unless item is unavailable then an alternative will be offered.</div>
                    </div>
                    <div class="col-sm-6">
                        <img src="{{ asset('public/assets/website') }}/images/sec5-icon-6.png" class="avatar wp-post-image" alt="" loading="lazy" />
                        <div class="title">We&#8217;re 100% Safe!</div>
                        <div class="desc">With secure payments methods to ensure your details are always safe with an option to save your card for easier checkout.</div>
                    </div>
                </div>
            </div>
    </section>
@endSection