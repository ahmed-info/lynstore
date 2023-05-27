@extends('dashboard.layouts.layout')
@section('body')
<main>

    <div class="container-fluid px-4">
        @if (session()->has('status'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('status') }}
              </div>
        @endif
        <h1 class="mt-4">List of Product Other Info</h1>
        <ol class="breadcrumb mb-4">
            <a href="{{ route('dashboard.productOtherInfo.create') }}">
                <div class="btn btn-primary p-2 bd-highlight">
                    add Product Other Info
                </div>
            </a>
        </ol>

        <table class="table">
            <thead>
              <tr>
                <th class="">#</th>
                <th class="">Product Name</th>
                <th class="">Info title En</th>
                <th class="">Info title Ar</th>
                <th class="">Info Description En</th>
                <th class="">Info Description Ar</th>
                <th class="">Action</th>
              </tr>
            </thead>
            <tbody>
                @if(count($ProductOtherInfos) > 0)
                    @foreach ($ProductOtherInfos as $index=> $ProductOtherInfo)
                        <tr>
                            <th scope="">{{$index +1}}</th>
                            <td class="">
                            <select class="form-control form-select" aria-label="Disabled select example" disabled>
                                @foreach ($products as $product)

                                    <option name="product_id"  id="product_id" value="{{$product->id}}" {{ $ProductOtherInfo->product_id == $product->id ? 'selected' : ''}} readonly>{{ $product->title_en }}</option>
                                @endforeach
                            </select>
                            </td>
                            <td>{{$ProductOtherInfo->title_en}}</td>
                            <td>{{$ProductOtherInfo->title_ar}}</td>
                            <td>{{$ProductOtherInfo->description_en}}</td>
                            <td>{{$ProductOtherInfo->description_ar}}</td>
                            <td>

                                <div class="">
                                    <div class="col-sm-6">
                                        <a href="{{route('dashboard.productOtherInfo.edit',["id"=>$ProductOtherInfo->id])}}" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <form action="{{route('dashboard.productOtherInfo.destroy',["id"=>$ProductOtherInfo->id])}}" method="POST">
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
