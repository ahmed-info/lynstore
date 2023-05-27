@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit of Product</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Product</li>
        </ol>
        <form action="{{route('dashboard.product.update',["id"=>$product->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-body">
            <div class="form-group">
                <h6>Select Supplier</h6>
                <select  class="form-control select2" name="supplier_id" style="..." id="parent_id">
                    <option value="0" selected ="selected">@lang('words.Main Category')</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" @if($supplier->id== $product->supplier_id) selected="selected" @endif>{{ $supplier->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                        <label for="color_id">
                            <h6>Select colors</h6>
                        </label>
                            <div class="row">
                                @foreach ($colors as $coloritem)
                                <div class="col-md-2">
                                    <div class="p-2 border mb-2">
                                        @foreach ($productcolors as $productcolor)

                                        @if ($coloritem->id == $productcolor->color_id)

                                        <input type="checkbox" name="colors[{{ $coloritem->id }}]" value="{{ $coloritem->id }}"> {{ $coloritem->colorName_en }}
                                        <br>
                                        QTY: <input  type="number" value="{{ $productcolor->quantity }}" name="colorQuantity[{{ $coloritem->id }}]" style="width:70px;border:1px solid">

                                        @endif
                                        @endforeach

                                    </div>
                                </div>
                                @endforeach
                            </div>
                    </div>

            <div class="form-group">
                <h6>Select Category</h6>
                <select  class="form-control select2" name="category_id" style="..." id="category_id">
                    <option value="0" selected ="selected">@lang('words.Main Category')</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id== $product->category_id) selected="selected" @endif>{{ $category->{'title_'.app()->getLocale()} }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <h6>Select Brand</h6>
                <select  class="form-control select2" name="brand_id" style="..." id="brand_id">
                    <option value="0" selected ="selected">@lang('words.Main Category')</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" @if($brand->id== $product->brand_id) selected="selected" @endif>{{ $brand->{'title_'.app()->getLocale()} }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-3">
                    <label for="title_en"><h4>Product EN</h4></label>
                    <input type="text" class="form-control" id="title_en" name="title_en" value="{{$product->title_en}}">
                    @error('title_en')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-3">
                    <label for="title_ar"><h4>Product AR</h4></label>
                    <input type="text" class="form-control" id="title_ar" name="title_ar" value="{{$product->title_ar}}">
                    @error('title_ar')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>



            </div>

            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-3">
                    <label for="description_en"><h4>Description EN</h4></label>
                    <input type="text" class="form-control" id="description_en" name="description_en" value="{{$product->description_en}}">
                    @error('description_en')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-3">
                    <label for="description_ar"><h4>Description AR</h4></label>
                    <input type="text" class="form-control" id="description_ar" name="description_ar" value="{{$product->description_ar}}">
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
                    <input type="text" class="form-control" id="capacity" name="capacity" value="{{ $product->capacity }}"
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
                    <input type="text" class="form-control" id="unit" name="unit" value="{{ $product->unit }}"
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
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}"
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
                        <input class="form-check-input" type="checkbox" {{ $product->showIsHome==1 ? 'checked': '' }} name="showIsHome" id="selectForYou" value="1">
                        <label class="form-check-label" for="showIsHome">
                            show Is Home
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-4 mt-3">
                <div class="form-group mb-3">
                    <label for="deliveryTime"><h4>Delivery Time</h4></label>
                    <input type="text" class="form-control" id="deliveryTime" name="deliveryTime" value="{{$product->deliveryTime}}">
                    @error('deliveryTime')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-3">
                    <label for="sku"><h4>SKU</h4></label>
                    <input type="text" class="form-control" id="sku" name="sku" value="{{$product->sku}}">
                    @error('sku')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-3">
                    <label for="barcode"><h4>Barcode</h4></label>
                    <input type="text" class="form-control" id="barcode" name="barcode" value="{{$product->barcode}}">
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
                        <input class="form-check-input" type="checkbox" {{ $product->selectForYou==1 ? 'checked': '' }} name="selectForYou" id="selectForYou" value="1">
                        <label class="form-check-label" for="selectForYou">
                          Select for you
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-5">
                    <label for="mainPrice">
                        <h4>Main Price</h4>
                    </label>
                    <input type="number" step="0.01" class="form-control" id="mainPrice" name="mainPrice" value="{{$product->mainPrice}}"
                        placeholder="Enter main Price">
                    @error('mainPrice')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-5">
                    <label for="mainPriceDiscount">
                        <h4>Price Discount</h4>
                    </label>
                    <input type="number" step="0.01" class="form-control" id="mainPriceDiscount" name="mainPriceDiscount" value="{{ $product->mainPriceDiscount }}"
                        placeholder="Enter Price Discount">
                    @error('mainPriceDiscount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="mainPriceDiscount">
                        <h4>Origin Country</h4>
                    </label>
                    <input type="text"  class="form-control" id="originCountry" name="originCountry" value="{{ $product->originCountry}}"
                        placeholder="Enter Origin Country">
                    @error('originCountry')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group col-md-2 mt-3">
                <h3>Image 1</h3>
                <!-- asset('assets/img/header-bg.jpg') -->
                @if ($product->image1 >0)
                <img style="height: 25vh" src="{{asset('images/'.$product->image1)}}" class="img-thumbnail" alt="">
                @else
                <img style="height: 25vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">

                @endif
                <input type="file" class="mt-3" name="image1" id="image1">
            </div>

            <div class="form-group col-md-2 mt-3">
                <h3>Image 2</h3>
                <!-- asset('assets/img/header-bg.jpg') -->
                @if ($product->image2 >0)
                <img style="height: 25vh" src="{{asset('images/'.$product->image2)}}" class="img-thumbnail" alt="">
                @else
                <img style="height: 25vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">

                @endif
                <input type="file" class="mt-3" name="image2" id="image2">
            </div>

            <div class="form-group col-md-2 mt-3">
                <h3>Image 3</h3>
                <!-- asset('assets/img/header-bg.jpg') -->
                @if ($product->image3 >0)
                <img style="height: 25vh" src="{{asset('images/'.$product->image3)}}" class="img-thumbnail" alt="">
                @else
                <img style="height: 25vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">

                @endif
                <input type="file" class="mt-3" name="image3" id="image3">
            </div>

            <div class="form-group col-md-2 mt-3">
                <h3>Image 4</h3>
                <!-- asset('assets/img/header-bg.jpg') -->
                @if ($product->image4 >0)
                <img style="height: 25vh" src="{{asset('images/'.$product->image4)}}" class="img-thumbnail" alt="">
                @else
                <img style="height: 25vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">

                @endif
                <input type="file" class="mt-3" name="image4" id="image4">
            </div>

            <div class="form-group col-md-2 mt-3">
                <h3>Image 5</h3>
                <!-- asset('assets/img/header-bg.jpg') -->
                @if ($product->image5 >0)
                <img style="height: 25vh" src="{{asset('images/'.$product->image5)}}" class="img-thumbnail" alt="">
                @else
                <img style="height: 25vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">

                @endif
                <input type="file" class="mt-3" name="image5" id="image5">
            </div>
        </div>
        <input type="submit" name="submit" class="btn btn-primary mt-1">
    </form>
    </div>
</main>
@endsection
