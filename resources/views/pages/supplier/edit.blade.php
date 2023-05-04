@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit of Supplier</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Supplier</li>
        </ol>
        <form action="{{route('dashboard.supplier.update',["id"=>$supplier->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="row">
            <div class="form-group col-md-4 mt-3">
                <div class="form-group mb-3">
                    <label for="title"><h4>Supplier Name</h4></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$supplier->title}}">
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>
        </div>
        <input type="submit" name="submit" class="btn btn-primary mt-1">
    </form>
    </div>
</main>
@endsection
