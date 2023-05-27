@extends('layouts.user-layout')
@section('style')
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome bootstrap10 -->
  <link href="{{ asset('assets/fontawesome/all.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/adminlte.min.css') }}" rel="stylesheet" />

  <!-- Theme style -->
</head>
@endsection

@section('content')
@yield('uuusss')
<div class="container">
    @if (session()->has('status'))
            <div class="text-center alert alert-success" role="alert">
                {{ session()->get('status') }}
              </div>
        @endif
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <ul>
                    <li>

                        <a href="{{ route('dashboardUser') }}">@lang('words.Dashboard')</a>
                    </li>
                    <li>
                        <a href="{{ route('pendingOrders') }}">
                            @lang('words.Pending Orders')
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('addToWishlist') }}">
                            @lang('words.Wishlist')
                        </a>
                    </li>

                    <a href="{{ route('logout') }}">

                        <li>@lang('words.Logout')</li>
                    </a>
                </ul>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                @yield('profile')
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')


@endsection
@section('script')
  {{-- test script --}}
  <!-- jQuery -->
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('assets/js/adminlte.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->

{{-- <script src="{{ asset('assets/js/demo.js') }}"></script> --}}

<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>
@endsection

