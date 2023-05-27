@extends('layouts.user-layout')
@section('content')
    <!--------------------Slider 1------------->
    <div class="heading">
        <h1>@lang('words.products') {{ $brand->{'title_'.app()->getLocale()} }} </h1>
    </div>

    <div class="container">
        <div class="row">
            @foreach($brand->products as $product)
            <div class="col-md-3 g-4">
                <a href="{{route('productDetails',["id"=>$product->id])}}">
                    <div class="col">
                        <div class="card h-100 slider-hover">
                        <img src="{{ asset('images'.'/'.$product->image1) }}" class="card-img-top img-max-size" alt="Hollywood Sign on The Hill">
                        <div class="card-body">
                            <h5 class="card-title">
                            <span style="color: #6c757d;font-size:22px">
                                @if ($product->mainPriceDiscount != null || $product->mainPriceDiscount != '')
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="">
                                            <del class="d-block"> ${{ $product->mainPrice }}</del> ${{ $product->mainPriceDiscount }}
                                        </h6>
                                    </div>
                                    <div class="col-md-6">
                                        <small> <del class="">IQD:{{ $product->mainPrice * $setting->exchange_rate }} </del>  IQD:{{ $product->mainPriceDiscount * $setting->exchange_rate }}</small>
                                    </div>
                                </div>


                                @else
                                <div class="row">
                                    <h6 class="col-md-6">
                                        $ {{ $product->mainPrice }}
                                    </h6>
                                    <div class="col-md-6">
                                        <small>IQD: {{ $product->mainPrice * $setting->exchange_rate }} </small>
                                    </div>
                                </div>
                                @endif
                            </span>
                            </h5>
                            <div class="card-text d-flex">
                            {{ $product->{'title_'.app()->getLocale()} }}
                            </div>
                        </div>
                        <form action="{{ route('addProductToCart',$product->id) }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                            @if ($product->mainPriceDiscount != null || $product->mainPriceDiscount !='')

                            <input type="hidden" value="{{ $product->mainPriceDiscount }}" name="price">
                            @else
                            <input type="hidden" value="{{ $product->mainPrice }}" name="price">

                            @endif
                            <div class="form-group">
                                <input type="hidden" min="1" class="form-control" value="1" placeholder="1" name="quantity"><br>
                            </div>
                        <input type="submit" class="m-2 btn-xs btn-info"  value="{{ __('words.Add to Cart') }}"/>
                    </form>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>


    </div>
@include('layouts.footer')
@endsection
