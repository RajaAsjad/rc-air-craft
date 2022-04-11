@extends('layouts.website.master')
@section('content')
    <div class="inner-banner" style="background:#000;">
        <div class="container text-center">
            <h1>FAQs</h1>
        </div>
    </div>
    <section class="sec-faq">
        <div class="container">
            <h2>Frequently Asked Questions</h2>
            <div id="main">
                <div class="container">
                    <div class="accordion" id="faq">
                        <div class="card">
                            <div class="card-header" id="faqhead1">
                                <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq1" aria-expanded="true" aria-controls="faq1">HOW MANY TIMES CAN I ENTER?</a>
                            </div>

                            <div id="faq1" class="collapse show" aria-labelledby="faqhead1" data-parent="#faq">
                                <div class="card-body">
                                    A user (One Person) with an active account may enter up to 20-40 times per competition, however if we run bigger competitions with a higher price the amount of entries will reduce to what is stated on the competitions page.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="faqhead2">
                                <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq2" aria-expanded="true" aria-controls="faq2">HOW SAFE ARE MY CARD DETAILS AND PRIVACY?</a>
                            </div>

                            <div id="faq2" class="collapse" aria-labelledby="faqhead2" data-parent="#faq">
                                <div class="card-body">
                                    We maintain the highest standards when protecting your personal data and card information, we have passed all PCI Compliance with our Payment Gateways and banks to ensure all data is encrypted and safe from cyber attacks, R.C Aircraft Online also has
                                    the highest security on the admin account and all login areas are hidden including enabled 2FA (2 Factor Authentication), so any attack globally our sites infrastructure will remotely block the attackers IP address,
                                    the same applies if your own account was being attacked.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="faqhead3">
                                <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq3" aria-expanded="true" aria-controls="faq3">HOW IS THE WINNER CHOSEN?</a>
                            </div>

                            <div id="faq3" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
                                <div class="card-body">
                                    Once all entries are in and the draw is closed, all entries will then be posted on our facebook page and website within 24 hours. This will include your draw number to the right of your name which is what we will use in the LIVE draw to decide the winner.
                                    This means you can watch the live draw with your corresponding number(s) in hand. ​Googles random number generator will then be used to chose a winner, the name linking to the winning number chosen, will be the winner,
                                    draw usually take place on wednesday and sunday evening at 7:30 pm
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="faqhead3">
                                <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq4" aria-expanded="true" aria-controls="faq4">HOW DO I COLLECT MY PRIZE?</a>
                            </div>

                            <div id="faq4" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
                                <div class="card-body">
                                    R.C Aircraft Online prizes will be shipped out to the winner for free, or you can come and collect from our office, we ask that all winners to have a photo taken and the photo to be sent to us for use on our channels and R.C Aircraft Online winners page.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection