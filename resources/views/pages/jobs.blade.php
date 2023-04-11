@extends('layouts.user_layout')
@section('content')
        <!--Start Jobs-->
        <section class="page-section" id="jobs">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">@lang('SubmityourCVhere')</h2>
                </div>
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <form id="jobsForm" action={{route('jobs.store', app()->getLocale())}} method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row align-items-stretch mb-1">
                        <div class="col-md-6" style="text-align: {{app()->getLocale()=='en'?"left":'right'}}">
                            <h3 class="colorLogo">@lang('EmploymentInformation')</h3>
                            <div class="form-group">
                                <!-- Name input-->
                                <input class="form-control" id="name" name="name" type="text" placeholder="@lang('yourName')" required />
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <div class="form-group">
                                <!-- userName input-->
                                <input class="form-control" id="username" name="username" type="text" placeholder="@lang('your userName')" required />
                                <div class="invalid-feedback" data-sb-feedback="name:required">A username is required.</div>
                            </div>
                            <div class="form-group">
                                <!-- Email address input-->
                                <input class="form-control" id="email" name="email" type="email" placeholder="@lang('yourEmail')" required />
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>

                            <div class="input-group mb-3">
                                <!-- Phone number input-->
                                
                                <!-- country codes (ISO 3166) and Dial codes. -->

                                <input type="tel" class="form-control" id="phone" name="phone" required>
                                <span class="input-group-addon">Tel</span>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                            
                            <div class="form-group mt-0 mb-3">
                                <input class="form-control" type="file" name="resume" id="resume" required>
                                <div class="invalid-feedback" data-sb-feedback="resume:required">A resume is required.</div>
                            </div>

                            <div class="col-md-12" >
                                <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger">Error sending message!</div></div>
                                <div class="" style="text-align: {{app()->getLocale()=='en'?"left":'right'}};position: inline-block"><button class="btn btn-primary btn-xl text-uppercase mt-0" type="submit">@lang('SendInformation')</button></div>
                            </div>
                        </div>
                        <!-- ourLocation -->
                        <div class="col-md-6" style="text-align: {{app()->getLocale()=='en'?"left":'right'}}">
                            <h3 class="colorLogo">@lang('ourLocation')</h3>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6667.9692057919865!2d44.416356!3d33.319218!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1364c767ce8958d2!2zZmx5ZHViYWkg2YHZhNin2Yog2K_YqNmK!5e0!3m2!1sar!2siq!4v1624527994130!5m2!1sar!2siq" width="100%" height="525" style="border:white solid 2px; padding:8px; background-color:white" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                    
                        
                    </div>

                    <!-- has successfully submitted-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center text-white mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>                    
                </form>
            </div>
        </section>
    <!--End Jobs-->
@endsection