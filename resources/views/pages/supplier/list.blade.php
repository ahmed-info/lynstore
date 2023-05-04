@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4 d-flex">
        @if (session()->has('status'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('status') }}
              </div>
        @endif
        <h1 class="mt-4 d-flex">List of Suppliers</h1>

        <ol class="breadcrumb mb-4 d-flex justify-content-between">

            <a href="{{ route('dashboard.supplier.create') }}">
                <div class="btn btn-primary p-2 bd-highlight">
                    add new supplier
                </div>
            </a>
        </ol>

        <table class="table">
            <thead>
              <tr>
                <th class="">#</th>

                <th class="">Supplier Name</th>
                <th class="">Action</th>
              </tr>
            </thead>
            <tbody>
                @if(count($suppliers) > 0)
                    @foreach ($suppliers as $index=> $supplier)
                        <tr>
                            <th scope="">{{$index +1}}</th>
                            <td>{{$supplier->title}}</td>

                            <td>

                                <div class="">
                                    <div class="col-sm-6">
                                        <a href="{{route('dashboard.supplier.edit',["id"=>$supplier->id])}}" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <form action="{{route('dashboard.supplier.destroy',["id"=>$supplier->id])}}" method="POST">
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
