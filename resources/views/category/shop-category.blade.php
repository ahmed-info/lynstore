<div class="heading mt-5 mb-2">
    <h1 class="">@lang('words.SHOP BY CATEGORY')</h1>
</div>
<div class="container-flued">
    <div class="row row-cols-2 row-cols-md-6 g-3">
        @if(count($subcategories) > 0)
            @foreach ($subcategories as $subcategory)
            <div class="col-md-2 col-sm-4 col-xs-6">
                <div class="card" style="width: 14rem;">
                    <img src="{{ asset('images').'/' . $subcategory->image }}" class="card-img-top custom-border" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{ $subcategory->{'title_'.app()->getLocale()} }}</h5>
                      <a href="#" class="btn text-dark fw-bold fs-5">@lang('words.Shop Now')<i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach

        @endif


    </div>
    </div>

</div>
