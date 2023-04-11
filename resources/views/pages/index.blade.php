@extends('layouts.user_layout')
@section('content')
        <!-- Masthead-->
        <main>
        <header class="masthead" style="background-image: url({{$main->bc_img}})">
            <div class="container">
                <div class="masthead-subheading">{{$main->sub_title}}</div>
                <div class="masthead-heading text-uppercase">{{$main->title}}</div>
                

                <a class="btn btn-primary btn-xl text-uppercase" href="{{route('about',app()->getLocale())}}">@lang('TellMeMore')</a>
            </div>
        </header>
        </main>
        <ul class="list-group">
            <li class="list-group-item">Our Company</li>
            <li class="disabled">
                <p class="mb-4 ms-4">Sama Al-Yamamah Company (SYC) is a fully registered Trading
                Company based in international zone, Baghdad, Iraq.</p></li>
            <li class="disabled">
                <p>   SYC specialized in catering, logistic and construction and live support services across
                the country and take much pried in our efficient, high quality and
                value for money services.
                </p>
            </li>
            
            <li class="list-group-item">THE FOUNDER</li>
            <li class="disabled ms-4"><p> We have been involved in the running and set up of a variety of
                Projects for over 1 year and have vast experience with international
                companies and operation within Iraq. Below are some of the SYC's
                past and present clients in Iraq:</p></li>
            <li class="disabled ms-4"><p>- The Embassies and Diplomatic missions, Iraq (5) projects. </p></li>
            <li class="disabled ms-4"><p>- Basra International Airport, (3) projects. </p></li>
            <li class="disabled ms-4"><p>- Egyptian Maintenance Co (2) projects. </p></li>
            <li class="disabled ms-4"><p>- Al-Ufuk Al-Dhahabya Co (3) projects. </p></li>
            <li class="disabled ms-4"><p>- Al-Warda Co (1) project. </p></li>
            <li class="disabled ms-4"><p>- Burj Almadeena Co (2) project </p></li>
            <li class="disabled ms-4"><p>And many other governmental and non-governmental organizations. </p></li>
          </ul>
@endsection