{{-- @extends('layouts.website.master') --}}
@extends('auth.layouts.app')
@section('content')
    <div class="inner-banner" style="background:#000;">
        <div class="container text-center">
            <h1>MY ACCOUNT</h1>
        </div>
    </div>

    <div class="my-acc">
        <div class="container">
            <div id="post-39" class="post-39 page type-page status-publish hentry">
                <div class="entry-content">
                    <div class="my-account-forms">
                        <div class="woocommerce-notices-wrapper"></div>
                        <div class="row" id="customer_login">
                            <div class="col-lg-6 col-md-12">
                                <h2>Login</h2>
                               {{--  <form class="woocommerce-form woocommerce-form-login login" method="post"> --}}
                                <form method="POST" action="{{ route('user-authenticate') }}">
                                    @csrf
                                    <input type="hidden" name="user_type" value="Admin">
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="username">Username or email address&nbsp;<span class="required">*</span></label> <br>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" placeholder="Email" autocomplete="username" value=""> </p>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="password">Password&nbsp;<span class="required">*</span></label> <br>
                                        <span class="password-input"><input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password"><span class="show-password-input"></span></span>
                                    </p>

                                    <button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="Log in">Log in</button>
                                    <p class="form-row">
                                        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                        <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"> <span>Remember me</span>
                    </label>
                                        <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="a2ef0f4216"><input type="hidden" name="_wp_http_referer" value="/my-account/">
                                    </p>
                                    <p class="woocommerce-LostPassword lost_password">
                                        <a href="https://rcaircraftonline.co.uk/my-account/lost-password/">Lost your password?</a>
                                    </p>

                                    <input type="hidden" name="redirect" value="https://rcaircraftonline.co.uk/my-account/">
                                </form>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <h2>Register</h2>

                                <form method="post" action="" class="woocommerce-form woocommerce-form-register register">

                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="reg_email">Email address&nbsp;<span class="required">*</span></label>
                                        <input type="email" placeholder="Email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value=""> </p>

                                    <p class="link-set">A link to set a new password will be sent to your email address.</p>

                                    <div class="woocommerce-privacy-policy-text">
                                        <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="https://rcaircraftonline.co.uk/privacy-policy/"
                                                class="woocommerce-privacy-policy-link" target="_blank">privacy policy</a>.</p>
                                    </div>
                                    <p class="woocommerce-form-row form-row">
                                        <input type="hidden" id="woocommerce-register-nonce" name="woocommerce-register-nonce" value="250f870243"><input type="hidden" name="_wp_http_referer" value="/my-account/"> <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit"
                                            name="register" value="Register">Register</button>
                                    </p>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
