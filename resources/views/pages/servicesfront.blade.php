@extends('layouts.user_layout')
@section('content')
    <div class="py-5">
        <div class="container">
        </div>
    </div>

        <!--Start Slide-->

        <!--End Slide-->

        <!--Start Services-->
        
        {{-- url({{$service->bc_img}}) --}}
        @if(count($services) > 0)
            @foreach ($services as $service)
                <section class="py-5" id="{{$service->id}}">
                    <div class="container px-2" style="text-align: {{app()->getLocale()=='en' ? "left": 'right'}}">
                        <h1 class="fw-bolder fs-5 mb-4">{{$service->{'depart_'.app()->getLocale()} }}</h1>
                        <div class="card border-0 shadow rounded-3 overflow-hidden">
                            <div class="card-body p-0">
                                <div class="row gx-0">
                                    <div class="col-lg-6 col-xl-5 py-lg-5">
                                        <div class="p-4 p-md-5">
                                            <div class="badge bg-primary bg-gradient rounded-pill mb-2" style="text-align: center">News</div>
                                            <div class="h2 fw-bolder"> {{$service->{'title_'.app()->getLocale()} }}</div>
                                            <p>{{$service->{'description_'.app()->getLocale()} }}</p>
                                            <a class="stretched-link btn-link" href="{{route('portfolio', app()->getLocale())}}#{{ucfirst($service->{'depart_'.app()->getLocale() }) }}">
                                                @lang('Read more...')
                                                <i class="bi bi-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-7"><div class="bg-featured-blog" style="background-image: url({{asset($service->bc_img)}})"></div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


            @endforeach
        @endif
        <!--End Services-->
@endsection