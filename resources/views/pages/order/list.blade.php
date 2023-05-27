@extends('dashboard.layouts.layout')
@section('body')
<main>

    <div class="container-fluid px-4">
        @if (session()->has('status'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('status') }}
              </div>
        @endif
        @if(count($pendingOrders) > 0)
        <h1 class="mt-4">List of order pendings</h1>
        <table class="table">
            <thead>
              <tr>
                <th class="">#</th>

                <th class="">User Name</th>
                <th class="">Shipping Info</th>
                <th class="">Product Name</th>
                <th class="">Unit Price</th>
                <th class="">Quantity</th>
                <th class="">Total will Pay</th>
                <th class="">Product Image</th>
                <th class="">Action</th>
              </tr>
            </thead>
            <tbody>
                @if (count($pendingOrders)> 0)
                @foreach ($pendingOrders as $index=> $order)
                        <tr>
                            @php
                                $productName = App\Models\Product::where('id', $order->product_id)->value('title_'.app()->getlocale());
                                $mainPrice = App\Models\Product::where('id', $order->product_id)->value('mainPrice');
                                $mainPriceDiscount = App\Models\Product::where('id', $order->product_id)->value('mainPriceDiscount');
                                $productImage = App\Models\Product::where('id', $order->product_id)->value('image1');
                                $productId = App\Models\Product::where('id', $order->product_id)->value('id');
                            @endphp

                            <th scope="">{{$index +1}}</th>
                            <td>{{$order->user->name}}</td>
                            <td>
                                <ul>
                                    <li>Phone Number - {{ $order->phone }}</li>
                                    <li>Address - {{ $order->address }}</li>
                                </ul>
                            </td>

                                <td>{{ $productName }}</td>

                            <td>
                                @php
                                    $price;
                                @endphp
                                 @if($mainPriceDiscount != null || $mainPriceDiscount= '')
                                {{$price = $mainPriceDiscount }}
                                @else
                                {{ $price=  $mainPrice }}
                                @endif
                            </td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->quantity * $price}}</td>
                            <td><img style="height 70px; width:50px" src="{{ asset('images').'/'. $productImage}}" alt=""></td>
                            <td>
                                <a href="{{ route('dashboard.pendingOrders.update',['orderId'=>$order->id,'productId'=>$productId]) }}" class="btn btn-success btn-flat">
                                    Approve Now
                                </a>
                        </td>

                        </tr>
                    @endforeach
                @endif



            </tbody>
        </table>
        @else
        <h1 class="mt-4">Not Found Pending Orders</h1>

        @endif
    </div>
</main>
@endsection
