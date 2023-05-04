@extends('dashboard.layouts.layout')
@section('body')
<main>

    <div class="container-fluid px-4">
        @if (session()->has('status'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('status') }}
              </div>
        @endif
        <h1 class="mt-4">List of product Details</h1>
        <ol class="breadcrumb mb-4">
            <a href="{{ route('dashboard.productDetails.create') }}">
                <div class="btn btn-primary p-2 bd-highlight">
                    add product Details
                </div>
            </a>
        </ol>

        <table class="table">
            <thead>
              <tr>
                <th class="">#</th>
                <th class="">Product Name</th>
                <th class="">Detail title En</th>
                <th class="">Detail title Ar</th>
                <th class="">Detail Description En</th>
                <th class="">Detail Description Ar</th>
                <th class="">Action</th>
              </tr>
            </thead>
            <tbody>
                @if(count($productDetails) > 0)
                    @foreach ($productDetails as $index=> $productDetail)
                        <tr>
                            <th scope="">{{$index +1}}</th>
                            <td class="">
                                @foreach ($products as $product)
                                    <div name="product_id" id="product_id" value="{{$product->id}}" {{ $productDetail->product_id == $product->id ? 'selected' : ''}} readonly>{{ $product->title_en }}</div>
                                @endforeach
                            </td>
                            <td>{{$productDetail->title_en}}</td>
                            <td>{{$productDetail->title_ar}}</td>
                            <td>{{$productDetail->description_en}}</td>
                            <td>{{$productDetail->description_ar}}</td>
                            <td>

                                <div class="">
                                    <div class="col-sm-6">
                                        <a href="{{route('dashboard.productDetails.edit',["id"=>$productDetail->id])}}" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <form action="{{route('dashboard.productDetails.destroy',["id"=>$productDetail->id])}}" method="POST">
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
