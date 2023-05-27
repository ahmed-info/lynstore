<div class="container-flued">
    <div class="heading mt-5 mb-1">
        <h1 class="">@lang('words.BEST SELLER')</h1>
    </div>

    <div class="row g-4 my-5 mx-auto owl-carousel owl-theme">
        @if(count($bestSalers) > 0)
        @foreach ($bestSalers as $bestSaler)
        <div class="col product-item mx-auto">
            <div class="product-img">
                <img src="{{ asset('images').'/'. $bestSaler->image1}}" alt="" class="img-flued d-block mx-auto">
                <span class="heart-icon">
                    <i class="far fa-heart"></i>
                </span>
                <div class="row btns w-100 mx-auto text-center">
                    <button type="button" class="col-6 py-2">
                        <i class="fa fa-cart-plus"></i>Add to Cart
                    </button>
                    <button class="col-6 py-2">
                        <i class="fa fa-binoculars"></i>
                        View
                    </button>
                </div>
            </div>
            <div class="product-info p-3">
                <span class="product-type">
                    {{ $bestSaler->category->{'title_'.app()->getLocale()} }}
                </span>
                <a href="#" class="d-block text-dark text-decoration-none py-2 product-name">
                    {{ $bestSaler->{'title_'.app()->getLocale()} }}
                </a>
                <span class="product-price">$ {{ $bestSaler->mainPrice }}</span>
            </div>
        </div>
        @endforeach

        @endif
    </div>
</div>
