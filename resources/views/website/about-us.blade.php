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
                        <h2>{{ $aboutsus->heading }}</h2>
                        <p>{!! $aboutsus->description !!}</p>

                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('public/admin/assets/images/about_us') }}/{{  $aboutsus->image  }}">
                    </div>
            </div>
            <div class="why-choose-us">
                <h2>WHY CHOOSE US</h2>
                <div class="row">
                    @foreach($abouts as $about)
                    <div class="col-sm-6">
                        <img src="{{ asset('public/admin/assets/images/about_us') }}/{{  $about->image  }}" class="avatar wp-post-image" alt="">
                        <div class="title">{{ $about->heading }}</div>
                        <div class="desc">{!! $about->description !!}</div>
                    </div>
                    @endforeach
                </div>
            </div>
    </section>
@endSection
