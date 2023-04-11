@extends('layouts.user-layout')
@section('content')
    <!-- Masthead-->
    <main>
        <header class="masthead" style="background-image: url('storage/image/sol.jpg')">
            <div class="container img-solution">
                <div class="masthead-heading text-uppercase my-color">@lang('messages.ArchivingSolutions')</div>
                {{-- <div class="masthead-subheading">Get subTitle</div> --}}

                {{-- {{route('about',app()->getLocale())}} --}}
                <a class="btn btn-primary btn-xl text-uppercase" href="#sec">@lang('messages.tellMeMore')</a>
            </div>
        </header>
    </main>
    <section class="py-5" id="sec">
        <div class="container px-5" style="text-align: {{ app()->getLocale() == 'en' ? 'left' : 'right' }}">
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
                            <div class="bg-featured-blog" style="background-image: url('storage/image/sol.jpg')"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow rounded-3 overflow-hidden">
                <div class="card-body p-0">
                    <div class="row gx-0">
                        <div class="col-lg-6 col-xl-6">
                            <div class="p-md-5">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2" style="text-align: center">News
                                </div>
                                <div class="h4 fw-bolder">Alaris Capture Pro Software</div>
                                <ul id="check">
                                    <h5 id="check-li">Protect against indexing errors and ensure data integrity with New Double Data Entry indexing</h5>
                                    <h5 id="check-li">
                                        Optimize image quality with enhancements to the Intelligent QC function, including auto-crop and deskew
                                    </h5>
                                    <h5 id="check-li">
                                        Achieve more flexibility and security in outputting to PDF with password encrypted PDF, ability to output documents larger than 200 inches long to PDF, and faster viewing with Fast Web View
                                    </h5>
                                    <h5 id="check-li">
                                        Populate index fields faster and more accurately with expanded database look up, now enabling lookup on one or two key index fields
                                    </h5>
                                </ul>
                                {{-- {{route('portfolio', app()->getLocale())}}#{{ucfirst($service->{'depart_'.app()->getLocale() }) }} --}}
                                {{-- <a class="stretched-link btn-link" href="##">
                                        @lang('Read more...')
                                        <i class="bi bi-arrow-right"></i>
                                    </a> --}}
                            </div>
                        </div>
                        {{-- {{asset($service->bc_img)}} --}}
                        <div class="col-lg-6 col-xl-6 mt-2">
                            <div class="bg-featured-blog" style="background-image: url('storage/image/kodak-capture-pro-software.jpg'); height:345px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
@endsection
