<div class="container-flued">
    <div class="heading mt-5 mb-2">
        <h1 class="">@lang('words.NEW ON LYN')</h1>
    </div>

    <div class="row g-4 my-5 mx-auto owl-carousel owl-theme">
        @if(count($products) > 0)
        @foreach ($products as $product)
        <div class="col product-item mx-auto">
            <div class="product-img">
                <img src="{{ asset('images').'/'. $product->image1}}" alt="" class="img-flued d-block mx-auto">
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
                    {{ $product->category->{'title_'.app()->getLocale()} }}
                </span>
                <a href="#" class="d-block text-dark text-decoration-none py-2 product-name">
                    {{ $product->{'title_'.app()->getLocale()} }}
                </a>
                <span class="product-price">$ {{ $product->mainPrice }}</span>
            </div>
        </div>
        @endforeach

        @endif
    </div>
</div>
