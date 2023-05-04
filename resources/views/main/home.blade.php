@extends('layouts.user-layout')
@section('content')
@include('banners.buy_unique')

{{-- shop by category --}}
@include('category.shop-category')

{{-- shop by care --}}
@include('category.shop-care')

@include('banners.care')

@include('slides.new-arrival')
@include('banners.shopping-now')
@include('slides.best-seller')
@include('banners.shopping2')

{{-- select for you --}}
@include('slides.recommended')
@include('banners.banner-last')
@include('slides.brand')

@include('slides.why-shopping')

@include('layouts.footer')
@endsection
