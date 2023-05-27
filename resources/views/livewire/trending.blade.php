<div>
    <div class="container-flued">
        <div class="heading mt-5 mb-1">
            <h1 class="">@lang('words.TRENDING')</h1>
        </div>

        <div class="row g-4 my-5 mx-auto owl-carousel owl-theme">
            @foreach ($trendings as $trending)
            <div class="col product-item mx-auto">
                <div class="product-img">
                    <a href="{{route('productDetails',["id"=>$trending->id])}}">

                        <img src="{{ asset('images').'/'. $trending->image1 }}" alt="{{ $trending->{'title_'.app()->getLocale()} }}" class="img-flued d-block mx-auto">
                    </a>
                    @php
                        $countWishlist = 0;
                    @endphp
                    @if (Auth::check())
                        @php
                            $countWishlist = App\Models\Wishlist::countWishlist($trending->id)
                        @endphp
                    @endif
                    <span class="heart-icon">
                        <a href="#" data-idproduct="{{ $trending->id}}" class="updateWishlist">
                            @if ($countWishlist > 0)
                            <i class="fas fa-heart"></i>
                            @else
                            <i class="far fa-heart"></i>

                            @endif
                        </a>
                    </span>
                    <div class="row btns w-100 mx-auto text-center">
                        <button type="button" class="col-6 py-2">
                            <i class="fa fa-cart-plus"></i>Add to Cart
                        </button>
                        <button type="button"  class="col-6 py-2">
                            <a href="{{  route('productDetails',["id"=>$trending->id]) }}">
                            <i class="fa fa-binoculars"></i>
                            View
                        </a>
                        </button>
                    </div>
                </div>
                <div class="product-info p-3">
                    <span class="product-type">
                        <a href="{{ route('category',["id"=>$trending->category->id]) }}">

                            {{ $trending->category->{'title_'.app()->getLocale()} }}
                        </a>
                    </span>
                    <a href="#" class="d-block text-dark text-decoration-none py-2 product-name">
                        {{ $trending->{'title_'.app()->getLocale()} }}
                    </a>
                    <div class="bg-gray py-2 mt-1">
                        @if ($trending->mainPriceDiscount != null || $trending->mainPriceDiscount != '')
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="">
                                        <del class=""> ${{ $trending->mainPrice }}</del> ${{ $trending->mainPriceDiscount }}
                                    </h6>
                                </div>
                                <div class="col-md-6">
                                    <small> <del class="">IQD:{{ $trending->mainPrice * $setting->exchange_rate }} </del>  IQD:{{ $trending->mainPriceDiscount * $setting->exchange_rate }}</small>
                                </div>
                            </div>
                        @else
                        <div class="row">
                            <h6 class="col-md-6">
                                $ {{ $trending->mainPrice }}
                            </h6>
                            <div class="col-md-6">
                                <small>IQD: {{ $trending->mainPrice * $setting->exchange_rate }} </small>
                            </div>
                        </div>

                        @endif
                      </div>


                </div>
            </div>

            @endforeach

        </div>
    </div>

</div>
