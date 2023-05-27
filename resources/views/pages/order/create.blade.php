@extends('dashboard.layouts.layout')
@section('body')
<main>

    <div class="container-fluid px-4">
        <h1 class="mt-4">Create of Brand</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <form action="{{route('dashboard.brand.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-5">
                    <label for="title_en"><h4>Brand EN</h4></label>
                    <input type="text" class="form-control" id="title_en" name="title_en" placeholder="Enter Brand en*">
                    @error('title_en')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-6 mt-3">

                <div class="form-group mb-5">
                    <label for="title_ar"><h4>Brand AR</h4></label>
                    <input type="text" class="form-control" id="title_ar" name="title_ar" placeholder="Enter Brand ar*">
                    @error('title_ar')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>


            </div>

            <div class="form-group col-md-6 mt-3">
                <h3>Logo Brand</h3>
                <!-- asset('assets/img/header-bg.jpg') -->
                <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">
                <input type="file" class="mt-3" name="imageLogo" id="imageLogo">
                @error('imageLogo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6 mt-3">
                <h3>Image Background</h3>
                <!-- asset('assets/img/header-bg.jpg') -->
                <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">
                <input type="file" class="mt-3" name="imageBackground" id="imageBackground">
                @error('imageBackground')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <input type="submit" name="submit" class="btn btn-primary mt-1">
    </form>
    </div>
</main>
@endsection
