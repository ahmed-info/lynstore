@extends('userprofile.userProfileTemplate')
@section('profile')
<h3 class="text-center">

   @lang('words.Pending Orders')
</h3>
<table class="table">
    <tr>
        <th>@lang('words.Product Image')</th>
        <th>@lang('words.Product Name')</th>
        <th>@lang('words.Quantity')</th>
        <th>@lang('words.unit price')</th>
        <th>@lang('words.price sub total')</th>
    </tr>
    @php
        $total =0;
    @endphp
    @if (count($pendingOrders)> 0)

        @foreach ($pendingOrders as $order)
            <tr>
                @php
                    $productName = App\Models\Product::where('id', $order->product_id)->value('title_'.app()->getlocale());
                    $mainPrice = App\Models\Product::where('id', $order->product_id)->value('mainPrice');
                    $mainPriceDiscount = App\Models\Product::where('id', $order->product_id)->value('mainPriceDiscount');
                    $productImage = App\Models\Product::where('id', $order->product_id)->value('image1');
                @endphp
                <td><img style="height 70px; width:50px" src="{{ asset('images').'/'. $productImage}}" alt=""></td>
                <td>{{ $productName }}</td>
                <td>{{ $order->quantity }}</td>
                @php
                    $price =0;
                @endphp
                    <td>
                        @if ($mainPriceDiscount != null || $mainPriceDiscount != '')
                            {{ $price = $mainPriceDiscount }}
                        @else
                            {{ $price = $mainPrice }}
                        @endif
                    </td>
                    <td>{{ $order->quantity * $price }}</td>

            </tr>

                @php
                $total = $total + $order->quantity * $price;
                @endphp
        @endforeach

            <tr>
                <td><a href="{{ route('main.home') }}" class="btn btn-info">@lang('words.Finish')</a></td>
                <td></td>
                <td></td>
                <td class="fw-bold">@lang('words.total')</td>
                <td class="fw-bold">
                    @if ($total >0)
            {{ $total }}
            @else
            zcxvcbvnbm
            @endif
                </td>
            </tr>

    @endif
</table>
@endsection
