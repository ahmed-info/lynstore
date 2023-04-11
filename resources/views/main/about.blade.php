@extends('layouts.user-layout')
@section('content')
<main>
    <header class="masthead" style="background-image: url({{ asset('storage/image/about/about2.jpg') }}); height:70vh;">
        <div class="container img-solution">
            <div class="masthead-heading text-uppercase">@lang('messages.Why choose us')</div>
            <div class="masthead-subheading"></div>

            {{-- {{route('about',app()->getLocale())}} --}}
            <a class="btn btn-primary btn-xl text-uppercase" href="#sec">@lang('messages.tellMeMore')</a>
        </div>
    </header>
    <div class="card w-100" id="sec">
        <div class="card-body">
          <h5 class="card-text fw-bold">@lang('messages.Why choose us')</h5>
          <p class="card-text">@lang('messages.aboutDetails')</p>
        </div>
      </div>
</main>
@endsection
