@extends('layouts.user-layout')
@section('content')
    <!-- Masthead-->
    <div id="particles-js">
        <div class="mytit my-color">

            <div class="masthead-heading text-uppercase">@lang('messages.scanner market')</div>
            <div class="masthead-subheading">@lang('messages.For archiving and software solutions')</div>

            {{-- {{route('about',app()->getLocale())}} --}}
            <a class="btn btn-primary btn-xl text-uppercase" href="#sec">@lang('messages.tellMeMore')</a>


        </div>
    </div>
<section class="bg-color w-100" id="sec">
        <div class="row">
            @foreach ($categories as $category)
            <div class="img-box col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dropdown-item" href="{{ route('category.id', ['id' => $category->id]) }}">
                    <img src="{{asset($category->image)}}">
                </a>
            </div>
            @endforeach
        </div>
</section>
    <!-- Masthead-->
    <!----------------------jumbotron----------------------->

    <div class="jumbotron">
        <div class="container">
            <!-- Example row of columns -->
            <div class="row row align-items-center heading">
                <h1 class="text-center fw-bold pb-4">@lang('messages.OUR OFFERINGS AT A GLANCE')

                </h1>
                <div class="col-lg-5">
                    <div class="fw-bold text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-arrow-down-circle" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z" />
                        </svg>

                    </div>

                    <h4 class=" fw-bold text-center text-warning">@lang('messages.27')</h4>
                    <p>@lang('messages.28')</p>
                </div>

                <div class="col-lg-7" style="text-align: {{ app()->getLocale() == 'en' ? 'left' : 'right' }}">
                    <div class="row">
                        <div class="col-lg-6"  style="{{ app()->getLocale() == 'en' ? 'left' : 'right' }}">
                            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                                <div class="card-header" style="text-align: {{ app()->getLocale() == 'en' ? 'left' : 'right' }}">@lang('messages.22')</div>
                                <div class="card-body">
                                  <h5 class="card-title text-start" style="direction: {{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }} text-align: {{ app()->getLocale() == 'en' ? 'left' : 'right' }}">@lang('messages.25')</h5>
                                  <p class="card-text text-white">@lang('messages.26')</p>
                                </div>
                              </div>


                        </div>
                        <div class="col-md-6">
                            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                <div class="card-header">@lang('messages.21')</div>
                                <div class="card-body">
                                  <h5 class="card-title" >@lang('messages.23')</h5>
                                  <p class="card-text text-white">@lang('messages.24')</p>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
                <!-- solution -->


            </div>
        </div> <!-- /container -->

    </div>
    <!--------------------Slider 1------------->
    <div class="row">
        <div class="col-md-6">
            <div class="card">

            </div>
            <img class="w-75 mx-4" src="{{ asset('storage/image/1234.png') }}">
            <!-- /.card -->
          </div>
      <!-- /.col (left) -->
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title text-right">@lang('messages.We use technology in an easy and diffrent way')</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            
                <p class="text-primary fw-bold">@lang('messages.22')</p>
            

            <div class="progress">
              <div class="progress-bar bg-primary progress-bar-striped" role="progressbar"
                   aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                <span class="sr-only">90% Complete (success)</span>
              </div>
            </div>
            <p class="text-warning fw-bold">@lang('messages.29')
            </p>

            <div class="progress progress-sm active">
              <div class="progress-bar bg-warning progress-bar-striped" role="progressbar"
                   aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
                <span class="sr-only">85% Complete</span>
              </div>
            </div>
            <p class="text-success fw-bold">@lang('messages.30')
            </p>

            <div class="progress progress-xs">
              <div class="progress-bar bg-success progress-bar-striped" role="progressbar"
                   aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
                <span class="sr-only">85% Complete (warning)</span>
              </div>
            </div>
            <p class="text-danger fw-bold">@lang('messages.31')
            </p>

            <div class="progress progress-xxs">
              <div class="progress-bar bg-danger progress-bar-striped" role="progressbar"
                   aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                <span class="sr-only">70% Complete (warning)</span>
              </div>
            </div>

            <p class="text-info fw-bold">@lang('messages.32')
            </p>

            <div class="progress progress-xxs">
              <div class="progress-bar bg-info progress-bar-striped" role="progressbar"
                   aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
                <span class="sr-only">95% Complete (warning)</span>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col (right) -->
    </div>
    <div class="jumbotron">
        <section class="content">

            <!-- Default box -->
            <div class="card">
              <div class="card-body row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center d-flex align-items-center justify-content-center">
                    {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6667.9692057919865!2d44.416356!3d33.319218!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1364c767ce8958d2!2zZmx5ZHViYWkg2YHZhNin2Yog2K_YqNmK!5e0!3m2!1sar!2siq!4v1624527994130!5m2!1sar!2siq" width="100%" height="525" style="border:white solid 2px; padding:8px; background-color:white" allowfullscreen="" loading="lazy"></iframe> --}}
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3334.306814970638!2d44.4410913171543!3d33.31079342843234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1557818d4a795455%3A0x691cb99259d60cc6!2z2LTYsdmD2Kkg2KfZhNiq2YrZhtipINmE2YTYrdmE2YjZhCDYp9mE2YXZg9iq2KjZitip!5e0!3m2!1sen!2siq!4v1668838204631!5m2!1sen!2siq" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="inputName">@lang('messages.name')</label>
                    <input type="text" id="inputName" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label for="inputEmail">@lang('messages.email')</label>
                    <input type="email" id="inputEmail" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label for="inputSubject">@lang('messages.subject')</label>
                    <input type="text" id="inputSubject" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label for="inputMessage">@lang('messages.message')</label>
                    <textarea id="inputMessage" class="form-control" rows="4"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="{{  __('messages.send message') }}">
                  </div>
                </div>
              </div>
            </div>

          </section>
    </div>
@endsection
