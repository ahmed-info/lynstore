@extends('dashboard.layouts.layout')
@section('body')
<main>

    <div class="container-fluid px-4">
        @if (session()->has('status'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('status') }}
              </div>
        @endif
        <h1 class="mt-4">List of colors</h1>
        <ol class="breadcrumb mb-4">
            <a href="{{ route('dashboard.productColors.create') }}">
                <div class="btn btn-primary p-2 bd-highlight">
                    add new colors
                </div>
            </a>
        </ol>

        <table class="table">
            <thead>
              <tr>
                <th class="">#</th>

                <th class="">Color Name En</th>
                <th class="">Color Name Ar</th>
                <th class="">Color Code</th>
                <th class="">Image</th>
                <th class="">Action</th>
              </tr>
            </thead>
            <tbody>
                @if(count($productColors) > 0)
                    @foreach ($productColors as $index=> $productColor)
                        <tr>
                            <th scope="">{{$index +1}}</th>
                            <td>{{$productColor->colorName_en}}</td>
                            <td>{{$productColor->colorName_ar}}</td>
                            <td>

                                <div style="width:50px;height:50px;background-color: #{{$productColor->colorCode}}">

                                </div>
                            </td>
                            <td><img src={{  asset('images' ).'/'.$productColor->image}} style="width: 100px" class="img-thumbnail" alt=""></td>
                            <td>

                                <div class="">
                                    <div class="col-sm-6">
                                        <a href="{{route('dashboard.productColors.edit',["id"=>$productColor->id])}}" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <form action="{{route('dashboard.productColors.destroy',["id"=>$productColor->id])}}" method="POST">
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
