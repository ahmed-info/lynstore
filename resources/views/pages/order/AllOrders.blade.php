@extends('dashboard.layouts.layout')
@section('body')
<main>

    <div class="container-fluid px-4">
        @if (session()->has('status'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('status') }}
              </div>
        @endif
        <h1 class="mt-4">List of all Orders</h1>

        <table class="table">
            <thead>
              <tr>
                <th class="">#</th>

                <th class="">User Name</th>
                <th class="">Shipping Info</th>
                <th class="">Product Name</th>
                <th class="">Status</th>
                <th class="">Unit Price</th>
                <th class="">Quantity</th>
                <th class="">Total will Pay</th>
                <th class="">Action</th>
              </tr>
            </thead>
            <tbody>
                @if(count($orders) > 0)
                    @foreach ($orders as $index=> $order)
                        @foreach ($order->products as $product)
                        <tr>
                            <th scope="">{{$index +1}}</th>
                            <td>{{$order->user->name}}</td>
                            <td>
                                <ul>
                                    <li>Phone Number - {{ $order->phone }}</li>
                                    <li>Address - {{ $order->address }}</li>
                                </ul>
                            </td>
                            <td>
                                {{ $product->title_en }}
                            </td>
                            <td>
                                @if ($order->status == "pending")
                                <h5><span class="bg-danger">{{ $order->status }} </span></h5>

                                @elseif ($order->status == "complete")
                                <h5><span class="bg-info">{{ $order->status }} </span></h5>

                                @endif
                            </td>
                            <td>
                                 @if($product->mainPriceDiscount != null ||$product->mainPriceDiscount= '' )

                                {{ $product->mainPriceDiscount }}
                                @else
                                {{ $product->mainPrice }}
                                @endif
                            </td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->totalPrice}}</td>

                            @if ($order->status == "pending")
                            <td>
                                <a class="btn btn-success btn-flat" href="{{route('dashboard.pendingOrders.update',["orderId"=>$order->id,"productId"=>$product->id])}}">
                                    Approve Now
                                </a>
                            </td>

                            @endif



                        </tr>
                        @endforeach
                    @endforeach
                @endif

            </tbody>
        </table>

    </div>
</main>
@endsection
