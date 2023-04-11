@extends('layouts.user_layout')
@section('content')
    <main>
        <header class="masthead" style="background-image: url({{asset('assets/img/about.jpg')}})">
            <div class="container">
                <div class="masthead-subheading"></div>
                <div class="masthead-heading text-uppercase">About</div>
                

                <a class="btn btn-primary btn-xl text-uppercase" href="#ourAbout">@lang('TellMeMore')</a>
            </div>
        </header>
    </main>
    <!--Start About-->
    <h3 id="ourAbout" class="mt-2 mb-5 ms-3" style="font-weight: bold">Our About</h3>
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        services for restaurants and cafes
                    </button>
                </h5>
                </div>
            
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    Contribute to investing capital in the field of public services, including management services for restaurants and cafes.
                </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Navigation and ships
                    </button>
                </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    In the field of maritime navigation, the charter of ships, boats, and maritime transport for ships and ships that dock at Iraqi ports, as well as the ships and ships blaze with fuel, water, provisions, and everything they need through the General Company.
                </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Land, sea and air transportation
                    </button>
                </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    As for the field of public transport, it contributes to investing capital in the development of public transport movement in various means of land, sea and air transport inside Iraq.
                </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingFour">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                        Privacy policy
                    </button>
                </h5>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body">
                    In the exercise of its activities, the company is subject to the provisions of the Public Transport and Development Law, this aspect of the national economy.
                </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingFive">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                        Airports maintenance and equipment
                    </button>
                </h5>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                <div class="card-body">
                    In the field of airport services, it contributes to investing capital through the work required by airports, including maintenance, maintenance, airport equipment and all other works.                </div>
                </div>
            </div>
        </div>
    <!--End About-->
    {{-- <h1 class="myh1">my collapse</h1> --}}
        
@endsection


