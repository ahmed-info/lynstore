@extends('userprofile.userprofiletemplate')
@section('profile')
<h4>@lang('words.Final Step To Place Your Order')</h4>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <h4>@lang('words.Order will send at-')</h4>
            <p>@lang('words.Address') - {{ $shippingAddress->address }}</p>
            <p>@lang('words.phone') - {{ $shippingAddress->phone }}</p>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>@lang('words.Product Name')</th>
                        <th>@lang('words.Quantity')</th>
                        <th>@lang('words.unit price')</th>
                        <th>@lang('words.price sub total')</th>
                    </tr>
                    @php
                    $total = 0;
                    @endphp
                    @if (count($carts)> 0)

                        @foreach ($carts as $cart)
                        <tr>
                            @php
                                $productName = App\Models\Product::where('id', $cart->product_id)->value('title_'.app()->getlocale());
                                $mainPrice = App\Models\Product::where('id', $cart->product_id)->value('mainPrice');
                                $mainPriceDiscount = App\Models\Product::where('id', $cart->product_id)->value('mainPriceDiscount');
                            @endphp
                            <td>{{ $productName }}</td>
                            <td>{{ $cart->quantity }}</td>
                            <td>
                                @if($mainPriceDiscount != null || $mainPriceDiscount !='')
                                {{ $mainPriceDiscount }}
                                @else
                                {{ $mainPrice }}
                                @endif
                            </td>
                            <td>{{ $cart->price }}</td>

                    </tr>
                        @php
                            $total = $total + $cart->price;
                        @endphp

                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="fw-bold">@lang('words.total')</td>
                            <td>{{ $total }}</td>

                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex">
        <form action="#" method="GET">
            @csrf
            <input type="submit" value="{{ __('words.Cancel Order') }}" class="btn btn-danger me-2">
        </form>
        <form action="{{ route('placeOrder') }}" method="POST">
            @csrf
            <input type="submit" value="{{ __('words.Place Order') }}" class="btn btn-primary me-2">
        </form>


    </div>
</div>

@endsection
