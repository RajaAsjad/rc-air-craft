<!-- footer -->
<footer class="footer">
    <div class="container footer-highlight">
        <div class="row">
            <div class="col-md-12">
                 <p>{!! $home_page_data['footer_description'] !!}</p>
            </div>
        </div>
    </div>
    <div class="container">
        <img class="foot-logo img-fluid" src="{{ asset('public/admin/assets/images/page') }}/{{ $home_page_data['footer_image'] }}">
        <div class="row foot-text">
            <div class="col-md-3">
                <h4>QUICK LINKS</h4>
                <ul>
                    <li><a href="#competitions">Competitions</a></li>
                    <li><a href="#mini-competitions">Medium Competitions</a></li>
                    <li><a href="{{route ('cart') }}">Basket</a></li>
                    <li><a href="{{route ('login') }}">My account</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4>LEGAL PAGES</h4>
                <ul>
                    <li><a href="{{route ('terms-and-conditions') }}">Terms & Conditions</a></li>
                    <li><a href="{{route ('faqs') }}">FAQs</a></li>
                    <li><a href="{{route ('privacy-policy') }}">Privacy Policy</a></li>
                    <li><a href="{{route ('about-us') }}">About Us</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4>CONTACT US</h4>
                <ul>
                    <li><a href="">{{ $home_page_data['footer_email'] }}</a></li>
                </ul>
                <h4 class="mt-4">FOLLOW US</h4>
                <div class="icons">
                    <a href="{{ $home_page_data['footer_facebook'] }}"><i class="fa fa-facebook"></i></a>
                    <a href="{{ $home_page_data['footer_instagram'] }}"><i class="fa fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-md-3">
                @if (session('status'))
				<div class="callout callout-success">
					{{ session('status') }}
				</div>
			@endif
                <h4>SIGNUP FOR NEWSLETTER</h4>
                <form action="{{ route('newsletter.store') }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    @csrf
                    <input type="email" name="email" placeholder="Email Address" id="email">
                    <button class="submit" type="submit" id="submit">Submit</button>
                    <img src="{{ asset('public/assets/website') }}/images/card.png" class="img-fluid mt-4">
                </form>
            </div>
        </div>
    </div>
</footer>
<section class="cop">
    <div class="container text-center copy">
        <div class="row">
            <div class="col-md-6">
                <p>{!! $home_page_data['footer_copy_right_right_side'] !!}</p>
            </div>
            <div class="col-md-6">
                <p> {!! $home_page_data['footer_copy_right_left_side'] !!}</p>
            </div>
        </div>
    </div>
</section>
<!-- footer -->
<div id="back-top" style="display: block;">
    <a href="#top"> <span class="fa fa-arrow-circle-o-up"></span></a>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('public/assets/website') }}/js/main.js"></script>

