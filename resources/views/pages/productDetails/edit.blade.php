@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit of Product Details</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Product Detail</li>
        </ol>
        <form action="{{route('dashboard.productDetails.update',["id"=>$productDetail->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-3">
                    <label for="title_en"><h4>Detail Title EN</h4></label>
                    <input type="text" class="form-control" id="title_en" name="title_en" value="{{$productDetail->title_en}}">
                    @error('title_en')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-3">
                    <label for="title_ar"><h4>Detail Title AR</h4></label>
                    <input type="text" class="form-control" id="title_ar" name="title_ar" value="{{$productDetail->title_ar}}">
                    @error('title_ar')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-3">
                    <label for="description_en"><h4>Detail Description EN</h4></label>
                    <input type="text" class="form-control" id="description_en" name="description_en" value="{{$productDetail->description_en}}">
                    @error('description_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-3">
                    <label for="description_ar"><h4>Detail Description AR</h4></label>
                    <input type="text" class="form-control" id="description_ar" name="description_ar" value="{{$productDetail->description_ar}}">
                    @error('description_ar')
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
