@extends('dashboard.layouts.layout')
@section('body')
<main>

    <div class="container-fluid px-4">
        <h1 class="mt-4">Create of Color</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <form action="{{route('dashboard.productColors.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="colorName_en"><h4>Color Name EN</h4></label>
                    <input type="text" class="form-control" id="colorName_en" name="colorName_en" placeholder="Enter Color en*">
                    @error('colorName_en')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="colorName_ar"><h4>Color Name AR</h4></label>
                    <input type="text" class="form-control" id="colorName_ar" name="colorName_ar" placeholder="Enter Color ar*">
                    @error('colorName_ar')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="colorCode"><h4>Color Code</h4></label>
                    <input type="text" class="form-control" id="colorCode" name="colorCode" placeholder="Enter Color code*">
                    @error('colorCode')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-3 mt-3">
                <h3>Image Color</h3>
                <!-- asset('assets/img/header-bg.jpg') -->
                <img style="height: 15vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">
                <input type="file" class="mt-3" name="image" id="image">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <input type="submit" name="submit" class="btn btn-primary mt-1">
    </form>
    </div>
</main>
@endsection
