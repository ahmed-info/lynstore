<div class="container-flued">
    <div class="heading mt-5 mb-2">
        <h1 class="">@lang('words.BROWES BY BRAND')</h1>
    </div>

    <div class="row g-4 my-5 mx-auto owl-carousel owl-theme">

        @if(count($brands) > 0)
            @foreach ($brands as $brand)
            <a href="{{ route('brand.show',['id'=>$brand->id]) }}">
                <div class="col product-item mx-auto">
                    <div class="product-img">
                        <img src={{ asset('images') .'/'. $brand->imageBackground }} alt="">
                        <img src={{ asset('images' ).'/'.$brand->imageLogo }} alt="" class="img-flued d-block mx-auto">
                    </div>
                </div>
            </a>

            @endforeach
        @endif

    </div>
</div>
