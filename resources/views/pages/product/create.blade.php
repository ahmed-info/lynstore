@extends('dashboard.layouts.layout')
@section('body')
    <main>

        <div class="container-fluid px-4">
            <h1 class="mt-4">Create of product</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
            <form action="{{ route('dashboard.product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="supplier_id">
                            <h6>Select Supplier</h6>
                        </label>

                        <select name="supplier_id" id="supplier_id" class="form-control">
                            <option value="">Suppliers</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}"
                                    {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                    {{ $supplier->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="color_id">
                            <h6>Select colors</h6>
                        </label>
                            <div class="row">
                                @foreach ($colors as $color)

                                <div class="col-md-2">
                                    <div class="p-2 border mb-2">
                                        <input type="checkbox" name="colors[{{ $color->id }}]" value="{{ $color->id }}"> {{ $color->colorName_en }}
                                        <br>
                                        QTY: <input type="number" name="colorQuantity[{{ $color->id }}]" style="width:70px;border:1px solid">
                                    </div>

                                </div>
                                @endforeach
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="category_id">
                            <h6>Select Category</h6>
                        </label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->{'title_' . app()->getLocale()} }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="brand_id">
                            <h6>Select Brand</h6>
                        </label>
                        <select name="brand_id" id="brand_id" class="form-control">
                            <option value="">Brands</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->{'title_' . app()->getLocale()} }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 mt-3">


                        <div class="form-group mb-5">
                            <label for="title_en">
                                <h4>Product EN</h4>
                            </label>
                            <input type="text" class="form-control" id="title_en" name="title_en" value="{{ old('title_en') }}"
                                placeholder="Enter Product en*">
                            @error('title_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col-md-6 mt-3">

                        <div class="form-group mb-5">
                            <label for="title_ar">
                                <h4>Product AR</h4>
                            </label>
                            <input type="text" class="form-control" id="title_ar" name="title_ar" value="{{ old('title_ar') }}"
                                placeholder="Enter Product ar*">
                            @error('title_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col-md-6 mt-3">
                        <div class="form-group mb-5">
                            <label for="description_en">
                                <h4>Description EN</h4>
                            </label>
                            <input type="text" class="form-control" id="description_en" name="description_en" value="{{ old('description_en') }}"
                                placeholder="Enter Description en*">
                            @error('description_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col-md-6 mt-3">
                        <div class="form-group mb-5">
                            <label for="description_ar">
                                <h4>Description AR</h4>
                            </label>
                            <input type="text" class="form-control" id="description_ar" name="description_ar" value="{{ old('description_ar') }}"
                                placeholder="Enter Description ar*">
                            @error('description_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-3 mt-3">
                        <div class="form-group mb-5">
                            <label for="description_ar">
                                <h4>Capacity</h4>
                            </label>
                            <input type="text" class="form-control" id="capacity" name="capacity" value="{{ old('capacity') }}"
                                placeholder="Enter Capacity">
                            @error('capacity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col-md-3 mt-3">
                        <div class="form-group mb-5">
                            <label for="unit">
                                <h4>Unit</h4>
                            </label>
                            <input type="text" class="form-control" id="unit" name="unit" value="{{ old('unit') }}"
                                placeholder="Enter Unit">
                            @error('unit')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col-md-3 mt-3">
                        <div class="form-group mb-5">
                            <label for="quantity">
                                <h4>Quantity</h4>
                            </label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}"
                                placeholder="Enter Quantity">
                            @error('quantity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col-md-3 mt-3">
                        <div class="form-group mb-5">
                            <label>
                                <h4></h4>
                            </label>
                            <div class="form-check">
                                <br>
                                <input class="form-check-input" type="checkbox" {{ old('showIsHome')==1 ? 'checked' : '' }} name="showIsHome" id="selectForYou" value="1">
                                <label class="form-check-label" for="showIsHome">
                                    show Is Home
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mt-3">
                        <div class="form-group mb-5">
                            <label for="deliveryTime">
                                <h4>Delivery Time</h4>
                            </label>
                            <input type="text" class="form-control" id="deliveryTime" name="deliveryTime" value="{{ old('deliveryTime') }}"
                                placeholder="Enter delivery Time">
                            @error('deliveryTime')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col-md-3 mt-3">
                        <div class="form-group mb-5">
                            <label for="description_ar">
                                <h4>SKU</h4>
                            </label>
                            <input type="text" class="form-control" id="sku" name="sku" value="{{ old('sku') }}"
                                placeholder="Enter SKU">
                            @error('sku')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col-md-3 mt-3">
                        <div class="form-group mb-5">
                            <label for="description_ar">
                                <h4>Barcode</h4>
                            </label>
                            <input type="text" class="form-control" id="barcode" name="barcode" value="{{ old('barcode') }}"
                                placeholder="Enter barcode">
                            @error('barcode')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col-md-2 mt-3">
                        <div class="form-group mb-5">
                            <label for="dgf">
                                <h4></h4>
                                <h4></h4>
                            </label>
                            <div class="form-check">
                                <br>
                                <input class="form-check-input" type="checkbox" {{ old('selectForYou')==1 ? 'checked' : '' }} name="selectForYou" id="selectForYou" value="1">
                                <label class="form-check-label" for="selectForYou">
                                  Select for you
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mt-3">
                        <div class="form-group mb-5">
                            <label for="mainPrice">
                                <h4>Main Price</h4>
                            </label>
                            <input type="number" step="0.01" class="form-control" id="mainPrice" name="mainPrice" value="{{ old('mainPrice') }}"
                                placeholder="Enter main Price">
                            @error('mainPrice')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col-md-3 mt-3">
                        <div class="form-group mb-5">
                            <label for="mainPriceDiscount">
                                <h4>Price Discount</h4>
                            </label>
                            <input type="number" step="0.01" class="form-control" id="mainPriceDiscount" name="mainPriceDiscount" value="{{ old('mainPriceDiscount') }}"
                                placeholder="Enter Price Discount">
                            @error('mainPriceDiscount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col-md-12 mt-3">
                        <h4>Image 1</h4>
                        {{-- <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt=""> --}}
                        <input type="file" class="mt-3" name="image1" id="image1">
                        @error('image1')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 mt-3">
                        <h4>Image 2</h4>
                        {{-- <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt=""> --}}
                        <input type="file" class="mt-3" name="image2" id="image2">
                        @error('image2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 mt-3">
                        <h4>Image 3</h4>
                        {{-- <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt=""> --}}
                        <input type="file" class="mt-3" name="image3" id="image3">
                        @error('image3')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 mt-3">
                        <h4>Image 4</h4>
                        {{-- <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt=""> --}}
                        <input type="file" class="mt-3" name="image4" id="image4">
                        @error('image4')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 mt-3">
                        <h4>Image 5</h4>
                        {{-- <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt=""> --}}
                        <input type="file" class="mt-3" name="image5" id="image5">
                        @error('image5')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <input type="submit" name="submit" class="btn btn-primary mt-1">
            </form>
        </div>
    </main>
@endsection
