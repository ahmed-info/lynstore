<div class="container-flued">
    <div class="heading mt-5 mb-2">
        <h1 class="">BROWES BY BRAND</h1>
    </div>

    <div class="row g-4 my-5 mx-auto owl-carousel owl-theme">

        @if(count($brands) > 0)
            @foreach ($brands as $brand)
            <div class="col product-item mx-auto">
                <div class="product-img">
                    <img src={{ asset('images') .'/'. $brand->imageBackground }} alt="">
                    <img src={{ asset('images' ).'/'.$brand->imageLogo }} alt="" class="img-flued d-block mx-auto">
                </div>
            </div>
            @endforeach
        @endif

    </div>
</div>
