<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> --}}

    <div class="navbar-header">
        <a class="navbar-brand" href="#">
            <img class="logo" src="images/logolyn.png"/>
        </a>
    </div>

      <div class="collapse navbar-collapse {{ app()->getLocale() == 'en' ? 'dropend' : 'dropstart' }}" id="navbarSupportedContent">

            <ul class="navbar-nav" >
                <a class="nav-link btn-lang text-white me-2" href="{{ route('languageConverter','en') }}">EN</a>
                <a class="nav-link btn-lang text-white me-2" href="{{ route('languageConverter','ar') }}">AR</a>
                @foreach ($maincategories as $maincategory)
                <li class="nav-item dropdown">
                    <a class="nav-link border-bottom" href="#" id="navbarLink" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                        {{ $maincategory->{'title_'.app()->getLocale()} }}
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarLink">

                            <ul>

                                <li style="text-align: {{ app()->getLocale() == 'en' ? 'left' : 'right' }}">
                                    <a class="dropdown-item border-bottom" href="#">@lang('words.SHOP BY CATEGORY')</a>
                                  </li>

                                  @foreach ($subcategories as $subcategory)
                                @if ($subcategory->parent_id == $maincategory->id)
                                <li style="text-align: {{ app()->getLocale() == 'en' ? 'left' : 'right' }}">
                                    <a class="dropdown-item border-bottom" href="#">{{ $subcategory->{'title_'.app()->getLocale()} }}</a>
                                  </li>
                                @endif
                                @endforeach
                            </ul>

                            <ul>
                                <li style="text-align: {{ app()->getLocale() == 'en' ? 'left' : 'right' }}">
                                    <a class="dropdown-item border-bottom" href="#">@lang('words.SHOP BY BRAND')</a>
                                  </li>

                                <li style="text-align: {{ app()->getLocale() == 'en' ? 'left' : 'right' }}">
                                    <a class="dropdown-item border-bottom" href="#">Benefit</a>
                                    <a class="dropdown-item border-bottom" href="#">Maybelline</a>
                                    <a class="dropdown-item border-bottom" href="#">Ordinary</a>
                                    <a class="dropdown-item border-bottom" href="#">Sheglam</a>
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
        <input class="input-search" type="search" placeholder="Search" aria-label="Search">

        <ul class="navbar-nav combo-search d-flex" >
            <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" href="#"  id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                women
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                <li>
                    <a class="dropdown-item fs-6" href="#">Action</a>
                    <a class="dropdown-item fs-6" href="#">Another action</a>
                    <a class="dropdown-item fs-6" href="#">Something else here</a>
                </li>
            </ul>
            </li>
        </ul>
    </form>
{{-- start favorite --}}
<div class="d-flex">
<div class="d-flex ">
    <div class="">
        <img src="{{ asset('assets/icons/user.svg') }}" alt="user" class="iconImg" height="25" width="25">
    </div>
</div>
<div class="d-flex ms-4 me-4">
    <a class="wishlistlink" href="/wishlist">
        <div class="">
            <img src="{{ asset('assets/icons/wishlist.svg') }}" alt="wishList" height="25" width="25">
        </div>
    </a>
</div>
<div class="d-flex">
    <a href="/bag">
        <div class="">
            <img src="{{ asset('assets/icons/bag.svg') }}" alt="bag" height="25" width="25">
        </div>
    </a>
</div>
</div>

{{-- end favorite --}}
    </div>
</nav>
