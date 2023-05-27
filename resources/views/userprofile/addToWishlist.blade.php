@extends('userprofile.userprofiletemplate')
@section('profile')
<h2>
    @lang('words.Wishlist')
</h2>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>@lang('words.Product Image')</th>
                        <th>@lang('words.Product Name')</th>
                        <th>@lang('words.Quantity')</th>
                        <th>@lang('words.unti price')</th>
                        <th>@lang('words.price sub total')</th>
                        <th>@lang('words.Action')</th>
                    </tr>
                    @php
                    $total = 0;
                    @endphp
                    @if (count($wishlists)> 0)

                        @foreach ($wishlists as $wishlist)
                        <tr>
                            @php
                                $productName = App\Models\Product::where('id', $wishlist->product_id)->value('title_'.app()->getlocale());
                                $mainPrice = App\Models\Product::where('id', $wishlist->product_id)->value('mainPrice');
                                $mainPriceDiscount = App\Models\Product::where('id', $wishlist->product_id)->value('mainPriceDiscount');
                                $productImage = App\Models\Product::where('id', $wishlist->product_id)->value('image1');
                            @endphp
                            <td><img style="height 70px; width:50px" src="{{ asset('images').'/'. $productImage}}" alt=""></td>
                            <td>{{ $productName }}</td>
                            <td>{{ $wishlist->quantity }}</td>
                            <td>
                                @if ($mainPriceDiscount != null || $mainPriceDiscount != '')
                                    {{ $mainPriceDiscount }}
                                @else
                                    {{ $mainPrice }}
                                @endif
                            </td>
                            <td>{{ $wishlist->price }}</td>
                            <td>

                                    <div class="">
                                        {{-- <a href="{{route('cart.edit',["id"=>$cart->id])}}" class="btn btn-primary">Edit</a> --}}
                                        <form action="{{route('wishlist.destroy',["id"=>$wishlist->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-s show_confirm" data-toggle="tooltip" title='Delete'>@lang('words.Delete')</button>

                                        </form>
                                    </div>


                            </td>
                        </tr>
                        @php
                            $total = $total + $wishlist->price;
                        @endphp

                        @endforeach
                        @if ($total > 0)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="fw-bold">@lang('words.total')</td>
                            <td>{{ $total }}</td>
                            <td><a href="{{ route('shippingWishlist') }}" class="btn btn-info">@lang('words.Next')</a></td>

                        </tr>
                        @endif
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
