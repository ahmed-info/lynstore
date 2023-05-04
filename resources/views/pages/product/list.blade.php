@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        @if (session()->has('status'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('status') }}
              </div>
        @endif
        <h1 class="mt-4">List of Products</h1>
        <ol class="breadcrumb mb-4">
            <a href="{{ route('dashboard.product.create') }}">
                <div class="btn btn-primary p-2 bd-highlight">
                    add new product
                </div>
            </a>
        </ol>

        <table class="table">
            <thead>
              <tr>
                <th class="">#</th>

                <th class="">Product En</th>
                <th class="">Product Ar</th>
                <th class="">Quantity</th>
                <th class="">Price</th>
                <th class="">Discount</th>
                <th class="">Image</th>
                <th class="">Action</th>
              </tr>
            </thead>
            <tbody>
                @if(count($products) > 0)
                    @foreach ($products as $index=> $product)
                        <tr>
                            <th scope="">{{$index +1}}</th>

                            <td>{{$product->title_en  }}</td>
                            <td>{{ $product->title_ar }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->mainPrice }}</td>
                            <td>{{ $product->mainPriceDiscount }}</td>
                            <td><img src={{  asset('images' ).'/'.$product->image1}} style="width: 100px" class="img-thumbnail" alt=""></td>
                            <td>

                                <div class="">
                                    <div class="col-sm-6">
                                        <a href="{{route('dashboard.product.edit',["id"=>$product->id])}}" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <form action="{{route('dashboard.product.destroy',["id"=>$product->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>

    </div>
</main>
@endsection
