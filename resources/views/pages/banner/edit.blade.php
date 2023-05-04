@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit of banner</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Banner</li>
        </ol>
        <form action="{{route('dashboard.banner.update',["id"=>$banner->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="form-group col-md-4 mt-3">
                <h3>Image</h3>
                <!-- asset('assets/img/header-bg.jpg') -->
                <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">
                <input type="file" class="mt-3" name="image" id="image">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-4 mt-3">
                <div class="form-group mb-5">
                    <label for="title_en"><h4>Title EN</h4></label>
                    <input type="text" class="form-control" id="title_en" name="title_en" value="{{ $banner->title_en }}" placeholder="Enter Banner en*">
                    @error('title_en')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-4 mt-3">
                <div class="form-group mb-5">
                    <label for="title_ar"><h4>Title AR</h4></label>
                    <input type="text" class="form-control" id="title_ar" name="title_ar" value="{{ $banner->title_ar }}" placeholder="Enter Banner ar*">
                    @error('title_ar')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4 mt-3">
                <div class="form-group mb-5">
                    <label for="title_en"><h4>Link</h4></label>
                    <input type="text" class="form-control" id="link" name="link" value="{{ $banner->link }}" placeholder="Enter Link*">
                    @error('link')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-4 mt-3">
                <div class="form-group mb-5">
                    <label for="alt"><h4>Alt</h4></label>
                    <input type="text" class="form-control" id="alt" value="{{ $banner->alt }}" name="alt" placeholder="Enter Alt*">
                    @error('alt')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="status"><h4>Status</h4></label>
                    <select name="status" class="form-control" id="">
                        <option value="">---</option>
                        <option value="1" {{ old('status', $banner->status)=='1' ? 'selected':null }}>Active</option>
                        <option value="0" {{ old('status',$banner->status)=='0' ? 'selected':null }}>Inactive</option>
                    </select>
                    @error('status')
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
