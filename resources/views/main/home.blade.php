@extends('layouts.user-layout')
@section('content')
@include('banners.buy_unique')

{{-- shop by category --}}
@include('category.shop-category')

{{-- shop by care --}}
@include('category.shop-care')

@include('banners.care')

@include('slides.new-arrival')
@include('banners.shopping-now')
@include('slides.best-seller')
@include('slides.trending')
@include('banners.shopping2')

{{-- select for you --}}
@include('slides.recommended')
@include('banners.banner-last')
@include('slides.brand')

@include('slides.why-shopping')

@include('layouts.footer')
@endsection
@push('javascript')
<script>
    var user_id = "{{ Auth::id() }}";
    $(document).ready(function(){
        $('.updateWishlist').click(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
             });
             var product_id = $(this).data('idproduct');
             //alert(product_Id);
             //alert(user_Id);
             $.ajax({
                type:'POST',
                url: '/updateWishlist',
                data: {
                    product_id: product_id,
                    user_id: user_id,
                },
                success: function(response){
                    if(response.action == 'add'){
                        $('a[data-idproduct='+product_id+']').html(`<i class="fas fa-heart"></i>`);
                    }else if(response.action == 'remove'){

                        $('a[data-idproduct='+product_id+']').html(`<i class="far fa-heart"></i>`);
                    }
                }
             });
        });
    });
</script>
@endpush
