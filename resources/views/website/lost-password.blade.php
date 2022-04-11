@extends('website.layouts.master')
@section('content')
    <div class="inner-banner" style="background:#000;">
        <div class="container text-center">
            <h1>Lost Password</h1>
        </div>
    </div>

    <div class="my-acc">
        <div class="container">
            <div class="wrap">

                <div id="post-39">
                    <div class="reset">
                        <form method="post" class="woocommerce-ResetPassword lost_reset_password">
                            <p class="lost-pass">Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.</p>
                            <p>
                                <label class="label-for-me">Username or email</label>
                                <input type="text" name="user_login">
                            </p>
                            <p class="woocommerce-form-row form-row">
                                <button type="submit" class="all-site-btn" value="Reset password">Reset password</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection