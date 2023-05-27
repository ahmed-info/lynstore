@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit of Brand</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Brand</li>
        </ol>
        <form action="{{route('dashboard.brand.update',["id"=>$brand->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-3">
                    <label for="title_en"><h4>Brand EN</h4></label>
                    <input type="text" class="form-control" id="title_en" name="title_en" value="{{$brand->title_en}}">
                    @error('title_en')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-3">
                    <label for="title_ar"><h4>Brand AR</h4></label>
                    <input type="text" class="form-control" id="title_ar" name="title_ar" value="{{$brand->title_ar}}">
                    @error('title_ar')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>



            </div>

            <div class="form-group col-md-6 mt-3">
                <h3>Logo Brand</h3>
                <!-- asset('assets/img/header-bg.jpg') -->
                @if ($brand->imageLogo >0)
                <img style="height: 30vh" src="{{asset('images/'.$brand->imageLogo)}}" class="img-thumbnail" alt="">
                @else
                <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">

                @endif
                <input type="file" class="mt-3" name="imageLogo" id="imageLogo">
            </div>

            <div class="form-group col-md-6 mt-3">
                <h3>Image Background</h3>
                <!-- asset('assets/img/header-bg.jpg') -->
                @if ($brand->imageBackground >0)
                <img style="height: 30vh" src="{{asset('images/'.$brand->imageBackground)}}" class="img-thumbnail" alt="">
                @else
                <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">

                @endif
                <input type="file" class="mt-3" name="imageBackground" id="imageBackground">
            </div>
        </div>
        <input type="submit" name="submit" class="btn btn-primary mt-1">
    </form>
    </div>
</main>
@endsection
