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

            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="title_en"><h4>Title EN</h4></label>
                    <input type="text" class="form-control" id="title_en" name="title_en" value="{{ $banner->title_en }}" placeholder="Enter Banner en*">
                    @error('title_en')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="title_ar"><h4>Title AR</h4></label>
                    <input type="text" class="form-control" id="title_ar" name="title_ar" value="{{ $banner->title_ar }}" placeholder="Enter Banner ar*">
                    @error('title_ar')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>
            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="title_en"><h4>Link</h4></label>
                    <input type="text" class="form-control" id="link" name="link" value="{{ $banner->link }}" placeholder="Enter Link*">
                    @error('link')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="expireBanner"><h4>Expire Banner</h4></label>
                    <input type="date" class="form-control" id="expireBanner" name="expireBanner" value={{ $banner->expireBanner }} placeholder="Enter Expire Banner">
                    @error('expireBanner')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="discountPercentage"><h4>Discount Percentage</h4></label>
                    <input type="number" class="form-control" value={{ $banner->discountPercentage }} min="0" max="100" id="discountPercentage" name="discountPercentage" placeholder="Enter Discount Percentage">
                    @error('discountPercentage')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="discountAmount"><h4>Discount Amount</h4></label>
                    <input type="number" class="form-control" value={{ $banner->discountAmount }} id="discountAmount" name="discountAmount" placeholder="Enter Discount Amount">
                    @error('discountAmount')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-3 mt-3">
                <h4>Select Product</h4>
                <select  class="form-control select2" name="product_id" style="..." id="product_id">
                    <option value="0" selected ="selected">select product</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" @if($product->id == $banner->product_id) selected="selected" @endif>{{ $product->title_en }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-3 mt-3">
                <h4>Select Brand</h4>
                <select  class="form-control select2" name="brand_id" style="..." id="product_id">
                    <option value="0" selected ="selected">Select brand</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" @if($brand->id == $banner->brand_id) selected="selected" @endif>{{ $brand->title_en }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-3 mt-3">
                <h4>Select Category</h4>
                <select  class="form-control select2" name="category_id" style="..." id="category_id">
                    <option value="0" selected ="selected">Select category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id == $banner->category_id) selected="selected" @endif>{{ $category->title_en }}</option>
                    @endforeach
                </select>
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

            <div class="form-group col-md-3 mt-3">
                <h3>Image</h3>
                @if ($banner->image >0)
                <img style="height: 25vh" src="{{asset('images/'.$banner->image)}}" class="img-thumbnail" alt="">
                @else
                <img style="height: 25vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">

                @endif
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
