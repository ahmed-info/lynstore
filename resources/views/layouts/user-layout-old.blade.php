<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@lang('messages.scanner market')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="#" />
    <!-- Font Awesome icons (free version)-->
    <!-- Google fonts-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <!-- Theme style -->
    <style>
        body{
            font-family: 'Almarai', sans-serif;
            text-align: {{ app()->getLocale() == 'en' ? 'left' : 'right' }};
            direction: {{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }};
        }
    </style>
    <style>

    </style>

</head>

<body dir="ltr">
    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">
            <img class="d-inline-block align-top" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" alt="">
            <div class="d-flex align-center text-center">

                Navbar
            </div>
        </span>
    </nav>
<div class="text-center">
    ahmed
</div>




      @yield('content')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    @yield('scripts')
</body>



</div>
</html>
