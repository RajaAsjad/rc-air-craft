@extends('layouts.admin.app')

@section('content')
    <section class="content-header">
        <div class="content-header-left">
            <h1>Settings Section</h1>
        </div>
    </section>

    <section class="content" style="min-height:auto;margin-bottom: -30px;">
        <div class="row">
            <div class="col-md-12">
                @if (session('message'))
                    <div class="callout callout-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_logo" data-toggle="tab">Logo</a></li>
                        <li><a href="#tab_favicon" data-toggle="tab">Favicon</a></li>
                        <li><a href="#tab_top_bar" data-toggle="tab">Top Bar</a></li>
                        <li><a href="#tab_footer" data-toggle="tab">Footer</a></li>
                        <li><a href="#tab_email" data-toggle="tab">Email</a></li>
                        <li><a href="#tab_banner" data-toggle="tab">Banner</a></li>
                        <li><a href="#tab_sidebar" data-toggle="tab">Sidebar</a></li>
                        <li><a href="#tab_color" data-toggle="tab">Color</a></li>
                    </ul>

                    <div class="tab-content">
                        @foreach($Settingsview as $view)
                            <div class="tab-pane active" id="tab_logo">
                                <form action="{{url('setting', $view->id)}}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                    @csrf
                                    {{ method_field('PATCH') }}
                                    <input type="hidden" name="csrf_test_name" value="">
                                    <div class="box box-info">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="" class="col-sm-2 control-label">Existing Photo</label>
                                                <div class="col-sm-6" style="padding-top:6px;">
                                                    @if($view->photo_logo)
                                                        <img src="{{ asset('public/admin/assets/img/'.$view->photo_logo) }}" class="existing-photo" style="height:80px;">
                                                    @else 
                                                        <img src="{{ asset('public/admin/assets/img/no-photo.jpg') }}" class="existing-photo" style="height:80px;">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-sm-2 control-label">New Photo</label>
                                                <div class="col-sm-6" style="padding-top:6px;">
                                                    <input type="file" name="photo_logo">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-sm-2 control-label"></label>
                                                <div class="col-sm-6">
                                                    <button type="submit" class="btn btn-success pull-left" name="form_logo">Update Logo</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane" id="tab_favicon">
                                <form action="{{url('/setting', $view->id)}}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                    @csrf
                                    {{ method_field('PATCH') }}
                                    <input type="hidden" name="csrf_test_name" value="">
                                    <div class="box box-info">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="" class="col-sm-2 control-label">Existing Photo</label>
                                                <div class="col-sm-6" style="padding-top:6px;">
                                                    <img src="{{ asset('/public/admin/assets/img/'.$view->photo_favicon) }}" class="existing-photo" style="height:40px;">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-sm-2 control-label">New Photo</label>
                                                <div class="col-sm-6" style="padding-top:6px;">
                                                    <input type="file" name="photo_favicon">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-sm-2 control-label"></label>
                                                <div class="col-sm-6">
                                                    <button type="submit" class="btn btn-success pull-left" name="form_favicon">Update Favicon</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane" id="tab_top_bar">
                                <form action="{{url('/setting', $view->id)}}" class="form-horizontal" method="post" accept-charset="utf-8">
                                    @csrf
                                    {{ method_field('PATCH') }}
                                    <input type="hidden" name="top_bar" value="">
                                    <div class="box box-info">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="" class="col-sm-3 control-label">Top Bar Email </label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="top_bar_email" value="{{$view->top_bar_email}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-sm-3 control-label">Top Bar Phone Number </label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="top_bar_phone" value="{{$view->top_bar_phone}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-sm-3 control-label"></label>
                                                <div class="col-sm-6">
                                                    <button type="submit" class="btn btn-success pull-left" name="">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane" id="tab_footer">
                                <form action="{{url('/setting', $view->id )}}" class="form-horizontal" method="post" accept-charset="utf-8">
                                    @csrf
                                    {{ method_field('PATCH') }}
                                    <input type="hidden" name="csrf_test_name" value="">
                                    <h3 class="sec_title" style="margin-top:0px;">General Section</h3>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Column 1 Title </label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" name="footer_col1_title" value="{{$view->footer_col1_title}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Column 2 Title </label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" name="footer_col2_title" value="{{$view->footer_col2_title}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Column 3 Title </label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" name="footer_col3_title" value="{{$view->footer_col3_title}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Column 4 Title </label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" name="footer_col4_title" value="{{$view->footer_col4_title}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Footer - Copyright </label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" name="footer_copyright" value="{{$view->footer_copyright}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Footer Address </label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" name="footer_address" style="height:70px;">{{$view->footer_address}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Footer Email </label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" name="footer_email" style="height:70px;">{{$view->footer_email}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Footer Phone </label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" name="footer_phone" style="height:70px;">{{$view->footer_phone}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Number of Recent News </label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" name="footer_recent_news_item" value="{{$view->footer_recent_news_item}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Number of Recent Portfolios </label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" name="footer_recent_portfolio_item" value="{{$view->footer_recent_portfolio_item}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success pull-left" name="form_footer_general">Update</button>
                                        </div>
                                    </div>
                                </form>

                                <form action="{{url('/setting', $view->id)}}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                    @csrf
                                    {{ method_field('PATCH') }}
                                    <input type="hidden" name="csrf_test_name" value="">
                                    <h3 class="sec_title">Newsletter Section</h3>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Newsletter Text </label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" name="newsletter_text" style="height:70px;">{{$view->newsletter_text}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success pull-left" name="form_footer_newsletter">Update</button>
                                        </div>
                                    </div>
                                </form>

                                <form action="{{url('/setting', $view->id)}}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                    @csrf
                                    {{ method_field('PATCH') }}
                                    <input type="hidden" name="csrf_test_name" value="">
                                    <h3 class="sec_title">Call To Action Section</h3>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">CTA Text </label>
                                        <div class="col-sm-6">
                                            <textarea name="cta_text" class="form-control" cols="30" rows="10" style="height:80px;">{{$view->cta_text}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">CTA Button Text </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="cta_button_text" class="form-control" value="{{$view->cta_button_text}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">CTA Button URL </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="cta_button_url" class="form-control" value="{{$view->cta_button_url}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success pull-left" name="form_footer_cta">Update</button>
                                        </div>
                                    </div>
                                </form>

                                <form action="{{url('/setting', $view->id)}}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                    @csrf
                                    {{ method_field('PATCH') }}
                                    <input type="hidden" name="csrf_test_name" value="">
                                    <h3 class="sec_title" style="margin-top:0px;">Call To Action Background Photo</h3>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Existing Photo </label>
                                        <div class="col-sm-6">
                                            <img src="{{ asset('/uploads/'.$view->cta_background_photo) }}" alt="" style="width:300px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">New Photo </label>
                                        <div class="col-sm-6">
                                            <input type="file" name="cta_background_photo" style="padding-top:5px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success pull-left" name="form_footer_cta_background">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane" id="tab_email">
                                <form action="{{url('/setting', $view->id)}}" class="form-horizontal" method="post" accept-charset="utf-8">
                                    @csrf
                                    {{ method_field('PATCH') }}
                                    <input type="hidden" name="csrf_test_name" value="">
                                    <div class="box box-info">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="" class="col-sm-3 control-label">Send Email From <span>*</span></label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="send_email_from" maxlength="255" autocomplete="off" value="{{$view->send_email_from}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-sm-3 control-label">Receive Email To <span>*</span></label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="receive_email_to" maxlength="255" autocomplete="off" value="{{$view->receive_email_to}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-sm-3 control-label"></label>
                                                <div class="col-sm-6">
                                                    <button type="submit" class="btn btn-success pull-left" name="form_email">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane" id="tab_banner">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <form action="{{url('/setting', $view->id)}}" class="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                                        @csrf
                                                        {{ method_field('PATCH') }}
                                                        <td style="width:50%">
                                                            <h4>About Page</h4>
                                                            <p>
                                                                <img src="{{ asset('/uploads/'.$view->photo1) }}" alt="" style="width: 100%;height:auto;">
                                                            </p>
                                                        </td>
                                                        <td style="width:50%">
                                                            <h4>Change Banner</h4>
                                                            Select Photo<input type="file" name="photo1">
                                                            <button type="submit" class="btn btn-primary pull-left" name="form_email">Update</button>
                                                        </td>
                                                    </form>
                                                </tr>

                                                <tr>
                                                    <form action="{{url('/setting', $view->id)}}" class="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                                        @csrf
                                                        {{ method_field('PATCH') }}
                                                        <input type="hidden" name="csrf_test_name" value="">
                                                        <td style="width:50%">
                                                            <h4>Testimonial Page</h4>
                                                            <p>
                                                                <img src="{{ asset('/uploads/'.$view->photo2) }}" alt="" style="width: 100%;height:auto;">
                                                            </p>
                                                        </td>
                                                        <td style="width:50%">
                                                            <h4>Change Banner</h4>
                                                            Select Photo<input type="file" name="photo2">
                                                            <button type="submit" class="btn btn-primary pull-left" name="form_email">Update</button>
                                                        </td>
                                                    </form>
                                                </tr>
                                                <tr>
                                                    <form action="{{url('/setting', $view->id)}}" class="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                                        @csrf
                                                        {{ method_field('PATCH') }}
                                                        <input type="hidden" name="csrf_test_name" value="">
                                                        <td style="width:50%">
                                                            <h4>News Page</h4>
                                                            <p>
                                                                <img src="{{ asset('/uploads/'.$view->photo3) }}" alt="" style="width: 100%;height:auto;">
                                                            </p>
                                                        </td>
                                                        <td style="width:50%">
                                                            <h4>Change Banner</h4>
                                                            Select Photo<input type="file" name="photo3">
                                                            <button type="submit" class="btn btn-primary pull-left" name="form_email">Update</button>
                                                        </td>
                                                    </form>
                                                </tr>
                                                <tr>
                                                    <form action="{{url('/setting', $view->id)}}" class="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                                        @csrf
                                                        {{ method_field('PATCH') }}
                                                        <input type="hidden" name="csrf_test_name" value="">
                                                        <td style="width:50%">
                                                            <h4>Event Page</h4>
                                                            <p>
                                                                <img src="{{ asset('/uploads/'.$view->photo4) }}" alt="" style="width: 100%;height:auto;">
                                                            </p>
                                                        </td>
                                                        <td style="width:50%">
                                                            <h4>Change Banner</h4>
                                                            Select Photo<input type="file" name="photo4">
                                                            <button type="submit" class="btn btn-primary pull-left" name="form_email">Update</button>
                                                        </td>
                                                    </form>
                                                </tr>
                                                <tr>
                                                    <form action="{{url('/setting', $view->id)}}" class="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                                        @csrf
                                                        {{ method_field('PATCH') }}
                                                        <input type="hidden" name="csrf_test_name" value="">
                                                        <td style="width:50%">
                                                            <h4>Contact Page</h4>
                                                            <p>
                                                                <img src="{{ asset('/uploads/'.$view->photo5) }}" alt="" style="width: 100%;height:auto;">
                                                            </p>
                                                        </td>
                                                        <td style="width:50%">
                                                            <h4>Change Banner</h4>
                                                            Select Photo<input type="file" name="photo5">
                                                            <button type="submit" class="btn btn-primary pull-left" name="form_email">Update</button>
                                                        </td>
                                                    </form>
                                                </tr>
                                                <tr>
                                                    <form action="{{url('/setting', $view->id)}}" class="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                                        @csrf
                                                        {{ method_field('PATCH') }}
                                                        <input type="hidden" name="csrf_test_name" value="">
                                                        <td style="width:50%">
                                                            <h4>Search Page</h4>
                                                            <p>
                                                                <img src="{{ asset('/uploads/'.$view->photo6) }}" alt="" style="width: 100%;height:auto;">
                                                            </p>
                                                        </td>
                                                        <td style="width:50%">
                                                            <h4>Change Banner</h4>
                                                            Select Photo<input type="file" name="photo6">
                                                            <button type="submit" class="btn btn-primary pull-left" name="form_email">Update</button>
                                                        </td>
                                                    </form>
                                                </tr>

                                                <tr>
                                                    <form action="{{url('/setting', $view->id)}}" class="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                                        @csrf
                                                        {{ method_field('PATCH') }}
                                                        <input type="hidden" name="csrf_test_name" value="">
                                                        <td style="width:50%">
                                                            <h4>Privacy Page</h4>
                                                            <p>
                                                                <img src="{{ asset('/uploads/'.$view->photo7) }}" alt="" style="width: 100%;height:auto;">
                                                            </p>
                                                        </td>
                                                        <td style="width:50%">
                                                            <h4>Change Banner</h4>
                                                            Select Photo<input type="file" name="photo7">
                                                            <button type="submit" class="btn btn-primary pull-left" name="form_email">Update</button>
                                                        </td>
                                                    </form>
                                                </tr>
                                                <tr>
                                                    <form action="{{url('/setting', $view->id)}}" class="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                                        @csrf
                                                        {{ method_field('PATCH') }}
                                                        <input type="hidden" name="csrf_test_name" value="">
                                                        <td style="width:50%">
                                                            <h4>Verify Subscriber Page</h4>
                                                            <p>
                                                                <img src="{{ asset('/uploads/'.$view->photo8) }}" alt="" style="width: 100%;height:auto;">
                                                            </p>
                                                        </td>
                                                        <td style="width:50%">
                                                            <h4>Change Banner</h4>
                                                            Select Photo<input type="file" name="photo8">
                                                            <button type="submit" class="btn btn-primary pull-left" name="form_email">Update</button>
                                                        </td>
                                                    </form>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <form action="{{url('/setting', $view->id)}}" class="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                                        @csrf
                                                        {{ method_field('PATCH') }}
                                                        <input type="hidden" name="csrf_test_name" value="">
                                                        <td style="width:50%">
                                                            <h4>FAQ Page</h4>
                                                            <p>
                                                                <img src="{{ asset('/uploads/'.$view->photo9) }}" alt="" style="width: 100%;height:auto;">
                                                            </p>
                                                        </td>
                                                        <td style="width:50%">
                                                            <h4>Change Banner</h4>
                                                            Select Photo<input type="file" name="photo9">
                                                            <button type="submit" class="btn btn-primary pull-left" name="form_email">Update</button>
                                                        </td>
                                                    </form>
                                                </tr>

                                                <tr>
                                                    <form action="{{url('/setting', $view->id)}}" class="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                                        @csrf
                                                        {{ method_field('PATCH') }}
                                                        <input type="hidden" name="csrf_test_name" value="">
                                                        <td style="width:50%">
                                                            <h4>Service Page</h4>
                                                            <p>
                                                                <img src="{{ asset('/uploads/'.$view->photo10) }}" alt="" style="width: 100%;height:auto;">
                                                            </p>
                                                        </td>
                                                        <td style="width:50%">
                                                            <h4>Change Banner</h4>
                                                            Select Photo<input type="file" name="photo10">
                                                            <button type="submit" class="btn btn-primary pull-left" name="form_email">Update</button>
                                                        </td>
                                                    </form>
                                                </tr>

                                                <tr>
                                                    <form action="{{url('/setting', $view->id)}}" class="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                                        @csrf
                                                        {{ method_field('PATCH') }}
                                                        <input type="hidden" name="csrf_test_name" value="">
                                                        <td style="width:50%">
                                                            <h4>Portfolio Page</h4>
                                                            <p>
                                                                <img src="{{ asset('/uploads/'.$view->photo11) }}" alt="" style="width: 100%;height:auto;">
                                                            </p>
                                                        </td>
                                                        <td style="width:50%">
                                                            <h4>Change Banner</h4>
                                                            Select Photo<input type="file" name="photo11">
                                                            <button type="submit" class="btn btn-primary pull-left" name="form_email">Update</button>
                                                        </td>
                                                    </form>
                                                </tr>
                                                <tr>
                                                    <form action="{{url('/setting', $view->id)}}" class="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                                        @csrf
                                                        {{ method_field('PATCH') }}
                                                        <input type="hidden" name="csrf_test_name" value="">
                                                        <td style="width:50%">
                                                            <h4>Team Page</h4>
                                                            <p>
                                                                <img src="{{ asset('/uploads/'.$view->photo12) }}" alt="" style="width: 100%;height:auto;">
                                                            </p>
                                                        </td>
                                                        <td style="width:50%">
                                                            <h4>Change Banner</h4>
                                                            Select Photo<input type="file" name="photo12">
                                                            <button type="submit" class="btn btn-primary pull-left" name="form_email">Update</button>
                                                        </td>
                                                    </form>
                                                </tr>
                                                <tr>
                                                    <form action="{{url('/setting', $view->id)}}" class="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                                        @csrf
                                                        {{ method_field('PATCH') }}
                                                        <input type="hidden" name="csrf_test_name" value="">
                                                        <td style="width:50%">
                                                            <h4>Pricing Page</h4>
                                                            <p>
                                                                <img src="{{ asset('/uploads/'.$view->photo13) }}" alt="" style="width: 100%;height:auto;">
                                                            </p>
                                                        </td>
                                                        <td style="width:50%">
                                                            <h4>Change Banner</h4>
                                                            Select Photo<input type="file" name="photo13">
                                                            <button type="submit" class="btn btn-primary pull-left" name="form_email">Update</button>
                                                        </td>
                                                    </form>
                                                </tr>
                                                <tr>
                                                    <form action="{{url('/setting', $view->id)}}" class="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                                        @csrf
                                                        {{ method_field('PATCH') }}
                                                        <input type="hidden" name="csrf_test_name" value="">
                                                        <td style="width:50%">
                                                            <h4>Photo Gallery Page</h4>
                                                            <p>
                                                                <img src="{{ asset('/uploads/'.$view->photo14) }}" alt="" style="width: 100%;height:auto;">
                                                            </p>
                                                        </td>
                                                        <td style="width:50%">
                                                            <h4>Change Banner</h4>
                                                            Select Photo<input type="file" name="photo14">
                                                            <button type="submit" class="btn btn-primary pull-left" name="form_email">Update</button>
                                                        </td>
                                                    </form>
                                                </tr>
                                                <tr>
                                                    <form action="{{url('/setting', $view->id)}}" class="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                                        @csrf
                                                        {{ method_field('PATCH') }}
                                                        <input type="hidden" name="csrf_test_name" value="">
                                                        <td style="width:50%">
                                                            <h4>Terms Page</h4>
                                                            <p>
                                                                <img src="{{ asset('/uploads/'.$view->photo15) }}" alt="" style="width: 100%;height:auto;">
                                                            </p>
                                                        </td>
                                                        <td style="width:50%">
                                                            <h4>Change Banner</h4>
                                                            Select Photo<input type="file" name="photo15">
                                                            <button type="submit" class="btn btn-primary pull-left" name="form_email">Update</button>
                                                        </td>
                                                    </form>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab_sidebar">
                                <form action="{{url('/setting', $view->id)}}" class="form-horizontal" method="post" accept-charset="utf-8">
                                    @csrf
                                    {{ method_field('PATCH') }}
                                    <input type="hidden" name="csrf_test_name" value="">
                                    <div class="box box-info">
                                        <div class="box-body">
                                            <h3 class="sec_title" style="margin-top:0;">News Page - Sidebar Section</h3>
                                            <div class="form-group">
                                                <label for="" class="col-sm-3 control-label">Total Recent Posts <span>*</span></label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="sidebar_total_recent_post" maxlength="255" autocomplete="off" value="{{$view->sidebar_total_recent_post}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-sm-3 control-label">Heading - Category <span>*</span></label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="sidebar_news_heading_category" maxlength="255" autocomplete="off" value="{{$view->sidebar_news_heading_category}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-sm-3 control-label">Heading - Recent Post <span>*</span></label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="sidebar_news_heading_recent_post" maxlength="255" autocomplete="off" value="{{$view->sidebar_news_heading_recent_post}}">
                                                </div>
                                            </div>

                                            <h3 class="sec_title">Event Page - Sidebar Section</h3>
                                            <div class="form-group">
                                                <label for="" class="col-sm-3 control-label">Total Upcoming Events <span>*</span></label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="sidebar_total_upcoming_event" maxlength="255" autocomplete="off" value="{{$view->sidebar_total_upcoming_event}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-sm-3 control-label">Total Past Events <span>*</span></label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="sidebar_total_past_event" maxlength="255" autocomplete="off" value="{{$view->sidebar_total_past_event}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-sm-3 control-label">Heading - Upcoming Event <span>*</span></label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="sidebar_event_heading_upcoming" maxlength="255" autocomplete="off" value="{{$view->sidebar_event_heading_upcoming}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-sm-3 control-label">Heading - Past Event <span>*</span></label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="sidebar_event_heading_past" maxlength="255" autocomplete="off" value="{{$view->sidebar_event_heading_past}}">
                                                </div>
                                            </div>
                                            <h3 class="sec_title">Service Single Page - Sidebar Section</h3>
                                            <div class="form-group">
                                                <label for="" class="col-sm-3 control-label">Heading - Our Services <span>*</span></label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="sidebar_service_heading_service" maxlength="255" autocomplete="off" value="{{$view->sidebar_service_heading_service}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-sm-3 control-label">Heading - Quick Contact <span>*</span></label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="sidebar_service_heading_quick_contact" maxlength="255" autocomplete="off" value="{{$view->sidebar_service_heading_quick_contact}}">
                                                </div>
                                            </div>
                                            <h3 class="sec_title">Portfolio Single Page - Sidebar Section</h3>
                                            <div class="form-group">
                                                <label for="" class="col-sm-3 control-label">Heading - Project Detail <span>*</span></label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="sidebar_portfolio_heading_project_detail" maxlength="255" autocomplete="off" value="{{$view->sidebar_portfolio_heading_project_detail}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-sm-3 control-label">Heading - Quick Contact <span>*</span></label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="sidebar_portfolio_heading_quick_contact" maxlength="255" autocomplete="off" value="{{$view->sidebar_portfolio_heading_quick_contact}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-sm-3 control-label"></label>
                                                <div class="col-sm-6">
                                                    <button type="submit" class="btn btn-success pull-left" name="form_sidebar">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane" id="tab_color">
                                <form action="{{url('/setting', $view->id)}}" class="form-horizontal" method="post" accept-charset="utf-8">
                                    @csrf
                                    {{ method_field('PATCH') }}
                                    <input type="hidden" name="color" value="">
                                    <div class="box box-info">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="" class="col-sm-2 control-label">Color </label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="front_end_color" class="form-control jscolor" value="{{$view->front_end_color}}" autocomplete="off" style="background-image: none; background-color: rgb(51, 103, 193); color: rgb(255, 255, 255);">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-sm-2 control-label"></label>
                                                <div class="col-sm-6">
                                                    <button type="submit" class="btn btn-success pull-left" name="form_color">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection