<div class="heading mt-5 mb-2">
    <h1 class="">@lang('words.SHOP BY CARE')</h1>
</div>
<div class="container-flued">
    <div class="row row-cols-1  row-cols-md-6 g-3">
        @if(count($cares) > 0)
        @foreach ($cares as $care)
        <div class="col-md-2 col-sm-4 col-xs-6">
            <div class="card" style="width: 14rem;">
                <img src="{{ asset('images').'/'. $care->image }}" class="card-img-top custom-border" alt="...">
                <div class="card-body">
                <h5 class="card-title">{{ $care->{'title_'.app()->getLocale()} }}</h5>
                {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Shop Now</a> --}}
                <a href="#" class="btn text-dark fw-bold fs-5">@lang('words.Shop Now')<i class="fa-solid fa-arrow-right"></i></a>

                </div>
            </div>
        </div>

        @endforeach

        @endif
    </div>
    </div>

</div>
