<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> --}}

    <div class="navbar-header">
        <a class="navbar-brand" href="#">
            <img class="logo" src="{{ asset('images'.'/'.$setting->logo) }}"/>
        </a>
    </div>

      <div class="collapse navbar-collapse {{ app()->getLocale() == 'en' ? 'dropend' : 'dropstart' }}" id="navbarSupportedContent">

            <ul class="navbar-nav" >
                <a class="nav-link btn-lang text-white me-2" href="{{ route('languageConverter','en') }}">EN</a>
                <a class="nav-link btn-lang text-white me-2" href="{{ route('languageConverter','ar') }}">AR</a>
                @foreach ($maincategories as $maincategory)
                <li class="nav-item dropdown">
                    <a class="nav-link border-bottom" href="{{ route('category.show',['id'=>$maincategory->id]) }}" id="navbarLink" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                        {{ $maincategory->{'title_'.app()->getLocale()} }}
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarLink">

                            <ul>

                                <li style="text-align: {{ app()->getLocale() == 'en' ? 'left' : 'right' }}">
                                    <a class="dropdown-item border-bottom" href="#">@lang('words.SHOP BY CATEGORY')</a>
                                  </li>

                                  @foreach ($subcategories as $ind=> $subcategory)
                                @if ($subcategory->parent_id == $maincategory->id)

                                <li style="text-align: {{ app()->getLocale() == 'en' ? 'left' : 'right' }}">
                                    <a class="dropdown-item border-bottom" href="{{ route('category.show',['id'=>$subcategory->id]) }}">{{ $subcategory->{'title_'.app()->getLocale()} }}</a>
                                  </li>
                                @endif
                                @endforeach
                            </ul>

                            <ul>
                                <li style="text-align: {{ app()->getLocale() == 'en' ? 'left' : 'right' }}">
                                    <a class="dropdown-item border-bottom" href="#">@lang('words.SHOP BY BRAND')</a>
                                  </li>

                                <li style="text-align: {{ app()->getLocale() == 'en' ? 'left' : 'right' }}">
                                    @if(count($brands) > 0)
                                    @foreach ( $brands as $brand)
                                    <a class="dropdown-item border-bottom" href="{{ route('brand.show',['id'=>$brand->id]) }}">{{ $brand->{'title_'.app()->getLocale()} }}</a>

                                    @endforeach

                                    @endif

                                  </li>
                            </ul>

                            <ul>
                                <li style="text-align: {{ app()->getLocale() == 'en' ? 'left' : 'right' }}">
                                    <a class="dropdown-item border-bottom" href="#">photo</a>
                                  </li>
                                  <img src={{  asset('images' ).'/'.$maincategory->image}} style="width: 300px" class="img-thumbnail" alt="">
                            </ul>
                    </div>
                </li>
                @endforeach
                <li class="nav-item dropdown">
                    <a class="nav-link border-bottom" href="{{ route('main.home') }}">@lang('words.Home')</a>
                </li>
            </ul>
      </div>

    <form class="d-flex search-bar">
        <button class="btn-search" type="submit"><i class="fa fa-search"></i></button>
        <input class="input-search" type="search" placeholder="  @lang('words.Search')" aria-label="Search">

        <ul class="navbar-nav combo-search d-flex" >
            <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" href="#"  id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                women
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                <li>
                    @foreach ($maincategories as $maincategory)
                    <a class="dropdown-item fs-6" href="#">{{ $maincategory->{'title_'.app()->getLocale()} }}</a>
                    @endforeach


                </li>
            </ul>
            </li>
        </ul>
    </form>
{{-- start favorite --}}
<div class="d-flex">
<div class="d-flex ">
    <a href="{{ route('addToWishlist') }}" class="">
        <img src="{{ asset('assets/icons/user.svg') }}" alt="user" class="iconImg" height="25" width="25">
    </a>
</div>
{{-- livewire cart --}}
<livewire:carts>
</div>

{{-- end favorite --}}
    </div>
</nav>
