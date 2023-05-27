
    <div class="container-flued">
        @if (count($relatedProducts) > 0)
        <div class="heading mt-5 mb-1">
            <h1 class="">@lang('words.related products')</h1>
        </div>
        @endif


        <div class="row g-4 my-5 mx-auto owl-carousel owl-theme">
            @forelse ($relatedProducts as $relatedProduct)
            <div class="col product-item mx-auto">
                <div class="product-img">
                    <a href="{{route('productDetails',["id"=>$relatedProduct->id])}}">

                        <img src="{{ asset('images').'/'. $relatedProduct->image1 }}" alt="{{ $relatedProduct->{'title_'.app()->getLocale()} }}" class="img-flued d-block mx-auto">
                    </a>
                    <span class="heart-icon">
                        <i class="far fa-heart"></i>
                    </span>
                    <div class="row btns w-100 mx-auto text-center">
                        <div class="d-flex col-md-6 py-0">
                            <form action="{{ route('addProductToCart',$relatedProduct->id) }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $relatedProduct->id }}" name="product_id">
                                @if ($relatedProduct->mainPriceDiscount != null || $relatedProduct->mainPriceDiscount !='')

                                <input type="hidden" value="{{ $relatedProduct->mainPriceDiscount }}" name="price">
                                @else
                                <input type="hidden" value="{{ $relatedProduct->mainPrice }}" name="price">

                                @endif
                                <div class="form-group">
                                    <input type="hidden" min="1" class="form-control" value="1" placeholder="1" name="quantity"><br>
                                </div>

                                <input type="submit" value="Add to Cart"  class="btn text-blue btn-light btn-flat" />
                            </form>
                        </div>

                        <button type="button"  class="col-6 py-2">
                            <a href="{{  route('productDetails',["id"=>$relatedProduct->id]) }}">
                            <i class="fa fa-binoculars"></i>
                            View
                        </a>
                        </button>
                    </div>
                </div>
                <div class="product-info p-3">
                    <span class="product-type">
                        <a href="{{ route('category',["id"=>$relatedProduct->category->id]) }}">

                            {{ $relatedProduct->category->{'title_'.app()->getLocale()} }}
                        </a>
                    </span>
                    <a href="#" class="d-block text-dark text-decoration-none py-2 product-name">
                        {{ $relatedProduct->{'title_'.app()->getLocale()} }}
                    </a>
                    <span class="product-price">$ {{ $relatedProduct->mainPrice }}</span>

                </div>
            </div>
            @empty

            @endforelse

        </div>
    </div>


