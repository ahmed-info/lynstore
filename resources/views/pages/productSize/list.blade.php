@extends('dashboard.layouts.layout')
@section('body')
<main>

    <div class="container-fluid px-4">
        @if (session()->has('status'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('status') }}
              </div>
        @endif
        <h1 class="mt-4">List of sizes</h1>
        <ol class="breadcrumb mb-4">
            <a href="{{ route('dashboard.productSizes.create') }}">
                <div class="btn btn-primary p-2 bd-highlight">
                    add new sizes
                </div>
            </a>
        </ol>

        <table class="table">
            <thead>
              <tr>
                <th class="">#</th>

                <th class="">Size</th>
                <th class="">Action</th>
              </tr>
            </thead>
            <tbody>
                @if(count($productSizes) > 0)
                    @foreach ($productSizes as $index=> $productSize)
                        <tr>
                            <th scope="">{{$index +1}}</th>
                            <td>{{$productSize->size}}</td>
                            <td>

                                <div class="">
                                    <div class="col-sm-6">
                                        <a href="{{route('dashboard.productSizes.edit',["id"=>$productSize->id])}}" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <form action="{{route('dashboard.productSizes.destroy',["id"=>$productSize->id])}}" method="POST">
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
