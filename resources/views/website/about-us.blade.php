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
                        <h2>{{ $abouts->heading }}</h2>
                        <p>{!! $abouts->description !!}</p>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('public/admin/assets/images/about_us') }}/{{  $abouts->image   }}">
                    </div>
            </div>
            <div class="why-choose-us">
                <h2>WHY CHOOSE US</h2>
                <div class="row">
                    @foreach($chooses as $choose)
                  <div class="col-sm-6">
                        <img src="{{ asset('public/admin/assets/images/why_choose') }}/{{  $choose->image  }}" class="avatar wp-post-image" alt="">
                        <div class="title">{{ $choose->title }}</div>
                        <div class="desc">{!! $choose->description !!}</div>
                  </div>
                    @endforeach
                </div>
            </div>
    </section>
@endSection
