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
                    @php $count=1 @endphp
                    @foreach ($questions as $question)
                        <div class="card">
                            <div class="card-header" id="faqhead{{ $question->id }}">
                                <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq{{ $question->id }}" aria-expanded="@if ($count ==1){{'true'}} @else{{'false'}}  @endif" aria-controls="faq{{ $question->id }}">{{ $question->question }}</a>
                            </div>
                            <div id="faq{{ $question->id }}" class="collapse @if ($count ==1){{'show'}}  @endif" aria-labelledby="faqhead{{ $question->id }}" data-parent="#faq">
                                <div class="card-body">
                                {{$question->answer}}
                                </div>
                            </div>
                        </div>
                        @php $count++ @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
