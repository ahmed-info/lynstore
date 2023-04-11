@extends('layouts.user-layout')
@section('content')
    <!-- Masthead-->
    <div class="heading">
        <h1>P R O D U C T &emsp; S L I D E R</h1>
    </div>
    <!--------------------Slider 1------------->
    @foreach ($products as $product)
    <div class="heading">
        <h1>{{$product->category->name_en }} Scanner</h1>
    </div>

    <div class="swiper-container">
        <div class="swiper-wrapper">

            @if ($product->category->id == $product->category_id)
            <div class="swiper-slide">
                <div class="slider-box">
                    <p class="time">New</p>
                    <div class="img-box">
                        <img src="{{asset($product->image)}}">
                    </div>
                    <p class="detail bg-dark w-100 h-40 text-white">
                        {{$product->description_en}}
                        <a href="#" class="price">Price {{$product->price}} $</a>
                    </p>
                    <div class="cart">
                        <a href="#">Add to Cart</a>
                    </div>
                </div>
            </div>
            @endif




        </div>
    </div>
    @endforeach