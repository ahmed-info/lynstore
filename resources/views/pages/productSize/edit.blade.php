@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit of product Size</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit product Size</li>
        </ol>
        <form action="{{route('dashboard.productSizes.update',["id"=>$productSize->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-3">
                    <label for="size"><h4>Size</h4></label>
                    <input type="text" class="form-control" id="size" name="size" value="{{$productSize->size}}">
                    @error('size')
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
