@extends('dashboard.layouts.layout')
@section('body')
<main>

    <div class="container-fluid px-4">
        <h1 class="mt-4">Create of Banner</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <form action="{{route('dashboard.banner.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="form-group col-md-3 mt-3">
                    <div class="form-group mb-5">
                        <label for="title_en"><h4>Title EN</h4></label>
                        <input type="text" class="form-control" id="title_en" name="title_en" placeholder="Enter Banner en*">
                        @error('title_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>

                <div class="form-group col-md-3 mt-3">
                    <div class="form-group mb-5">
                        <label for="title_ar"><h4>Title AR</h4></label>
                        <input type="text" class="form-control" id="title_ar" name="title_ar" placeholder="Enter Banner ar*">
                        @error('title_ar')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>

                <div class="form-group col-md-3 mt-3">
                    <div class="form-group mb-5">
                        <label for="link"><h4>Link</h4></label>
                        <input type="text" class="form-control" id="link" name="link" placeholder="Enter Link*">
                        @error('link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>

                <div class="form-group col-md-3 mt-3">
                    <div class="form-group mb-5">
                        <label for="code"><h4>Expire Banner</h4></label>
                        <input type="date" class="form-control" id="expireBanner" name="expireBanner" placeholder="Enter Expire Banner">
                        @error('expireBanner')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>

                <div class="form-group col-md-3 mt-3">
                    <div class="form-group mb-5">
                        <label for="discountPercentage"><h4>Discount Percentage</h4></label>
                        <input type="number" class="form-control" min="0" max="100" id="discountPercentage" name="discountPercentage" placeholder="Enter Discount Percentage">
                        @error('discountPercentage')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>

                <div class="form-group col-md-3 mt-3">
                    <div class="form-group mb-5">
                        <label for="discountPercentage"><h4>Discount Amount</h4></label>
                        <input type="number" class="form-control" id="discountAmount" name="discountAmount" placeholder="Enter Discount Amount">
                        @error('discountAmount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>

                <div class="form-group col-md-3 mt-3">
                    <label for="product_id">
                        <h4>Select product</h4>
                    </label>

                    <select name="product_id" id="product_id" class="form-control" >
                        <option value="">Products</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}"
                                {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                {{ $product->title_en }}
                            </option>
                        @endforeach
                    </select>

                    @error('product_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>

                <div class="form-group col-md-3 mt-3">
                    <label for="brand_id">
                        <h4>Select brand</h4>
                    </label>

                    <select name="brand_id" id="brand_id" class="form-control" >
                        <option value="">Brands</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}"
                                {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                {{ $brand->title_en }}
                            </option>
                        @endforeach
                    </select>

                    @error('brand_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>

                <div class="form-group col-md-3 mt-3">
                    <label for="category_id">
                        <h4>Select category</h4>
                    </label>

                    <select name="category_id" id="category_id" class="form-control" >
                        <option value="">Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->title_en }}
                            </option>
                        @endforeach
                    </select>

                    @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>

                <div class="form-group col-md-3 mt-3">
                    <div class="form-group mb-5">
                        <label for="status"><h4>Status</h4></label>
                        <select name="status" class="form-control" id="">
                            <option value="">---</option>
                            <option value="1" {{ old('type')=='1' ? 'selected':null }}>Active</option>
                            <option value="0" {{ old('type')=='0' ? 'selected':null }}>Inactive</option>
                        </select>
                        @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>

                <div class="form-group col-md-3 mt-3">
                    <h4>Image</h4>
                    <!-- asset('assets/img/header-bg.jpg') -->
                    <img style="height: 20vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">
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
