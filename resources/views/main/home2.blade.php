@extends('layouts.user-layout')
@section('content')
    <!-- Masthead-->
    <main>
        <header class="masthead" style="background-image: url('storage/image/scan3.jpg')">
            <div class="container">
                <div class="masthead-subheading">Get subTitle</div>
                <div class="masthead-heading text-uppercase">Archiving Solutions</div>

                {{-- {{route('about',app()->getLocale())}} --}}
                <a class="btn btn-primary btn-xl text-uppercase" href="#sec">@lang('Tell Me More')</a>
            </div>
        </header>
    </main>
    <section class="py-5" id="sec">
        <div class="container px-5" style="text-align: left">
            {{-- <h1 class="fw-bolder fs-5 mb-4">depart</h1> --}}
            <div class="card border-0 shadow rounded-3 overflow-hidden">
                <div class="card-body p-0">
                    <div class="row gx-0">
                        <div class="col-lg-6 col-xl-6">
                            <div class="p-md-5">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2" style="text-align: center">News
                                </div>
                                <div class="h4 fw-bolder">We know document control can be frustrating</div>
                                <ul id="check">
                                    <h5 id="check-li">Trouble shooting scanner errors.</h5>

                                    <h5 id="check-li">Documents not scanning correctly.</h5>

                                    <h5 id="check-li">Expensive maintenance and repairs.</h5>

                                    <h5 id="check-li">Complicated contracts and rental agreements.</h5>
                                </ul>
                                {{-- {{route('portfolio', app()->getLocale())}}#{{ucfirst($service->{'depart_'.app()->getLocale() }) }} --}}
                                {{-- <a class="stretched-link btn-link" href="##">
                                        @lang('Read more...')
                                        <i class="bi bi-arrow-right"></i>
                                    </a> --}}
                            </div>
                        </div>
                        {{-- {{asset($service->bc_img)}} --}}
                        <div class="col-lg-6 col-xl-6">
                            <div class="bg-featured-blog" style="background-image: url('storage/image/scan1.jpg')"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!----------------------jumbotron----------------------->

    <div class="jumbotron">
        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <h4 class="text-center fw-bold pb-4">Reduce the cost and frustration of scanners and document control
                </h4>
                <div class="col-md-4">
                    <div class="fw-bold text-center">

                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-arrow-down-circle" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z" />
                        </svg>

                    </div>

                    <h4 class=" fw-bold text-center text-warning">Reduce your carbon footprint</h4>
                    <p>AllScan document solutions include implementing strategies to reduce your company’s carbon footprint
                        by reducing the amount of paper your office uses.</p>

                </div>
                <div class="col-md-4">
                    <div class="fw-bold text-center">

                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-gear" viewBox="0 0 16 16">
                            <path
                                d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                            <path
                                d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                        </svg>

                    </div>

                    <h4 class="fw-bold text-center text-warning">Free up IT resources</h4>
                    <p>IT is often a company’s most expensive resource. So, instead of receiving endless calls from
                        frustrated employees with scanner issues, your IT team can focus on bigger company issues like
                        security.</p>
                </div>
                <div class="col-md-4">
                    <div class="fw-bold text-center">

                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-receipt-cutoff" viewBox="0 0 16 16">
                            <path
                                d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zM11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                            <path
                                d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293 2.354.646zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118l.137-.274z" />
                        </svg>

                    </div>
                    <h4 class="fw-bold text-center text-warning">Better office productivity</h4>

                    <p>An effective document solution can boost productivity in many ways. For example, employees will have
                        less down time from scanners that are broken.</p>
                </div>
            </div>
        </div> <!-- /container -->

    </div>

    <!--------------------Sliders--------------------------->
@endsection
