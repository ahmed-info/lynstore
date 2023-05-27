<div class="container-flued">
    <div class="heading mt-5 mb-2">
        <h1 class="">@lang('words.RECOMMENDED FOR YOU')</h1>
    </div>

    <div class="row g-4 my-5 mx-auto owl-carousel owl-theme">
        @if (count($selectforyous) > 0)
        @foreach ($selectforyous as $selectyou)
        <div class="col product-item mx-auto">
            <div class="product-img">
                <img src="{{ asset('images').'/'. $selectyou->image1 }}" alt="" class="img-flued d-block mx-auto">
                <span class="heart-icon">
                    <i class="fas fa-heart"></i>
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
                    {{ $selectyou->category->{'title_'.app()->getLocale()} }}
                </span>
                <a href="#" class="d-block text-dark text-decoration-none py-2 product-name">
                    {{ $selectyou->{'title_'.app()->getLocale()} }}
                </a>
                <span class="product-price">$ {{ $selectyou->mainPrice }}</span>
            </div>
        </div>
        @endforeach

        @endif

    </div>
</div>
