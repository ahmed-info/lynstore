<div class="d-flex">({{ $wishlistCount }})
    <div class="d-flex ms-4 me-4">
        <a class="wishlistlink" href="{{ route('addToWishlist') }}">
            <div class="">
                <img src="{{ asset('assets/icons/wishlist.svg') }}" alt="wishList" height="25" width="25">
            </div>
        </a>
    </div>
    <div class="d-flex">({{ $cartCount }})
        <a href="/bag">
            <div class="">
                <img src="{{ asset('assets/icons/bag.svg') }}" alt="bag" height="25" width="25">
            </div>
        </a>
    </div>
</div>
