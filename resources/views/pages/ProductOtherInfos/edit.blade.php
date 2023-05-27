@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit of Product Other Info</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Product Other Info</li>
        </ol>
        <form action="{{route('dashboard.productOtherInfo.update',["id"=>$ProductOtherInfo->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="form-group col-md-12">
                <h6>Select Product</h6>
                <select  class="form-control select2" name="product_id" style="..." id="category_id">
                    <option value="0" selected ="selected">@lang('words.Main Category')</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" @if($product->id== $ProductOtherInfo->product_id) selected="selected" @endif>{{ $product->{'title_'.app()->getLocale()} }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-3">
                    <label for="title_en"><h4>Info Title EN</h4></label>
                    <input type="text" class="form-control" id="title_en" name="title_en" value="{{$ProductOtherInfo->title_en}}">
                    @error('title_en')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>


            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-3">
                    <label for="title_ar"><h4>Info Title AR</h4></label>
                    <input type="text" class="form-control" id="title_ar" name="title_ar" value="{{$ProductOtherInfo->title_ar}}">
                    @error('title_ar')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-3">
                    <label for="description_en"><h4>Info Description EN</h4></label>
                    <input type="text" class="form-control" id="description_en" name="description_en" value="{{$ProductOtherInfo->description_en}}">
                    @error('description_en')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-3">
                    <label for="description_ar"><h4>Other Description AR</h4></label>
                    <input type="text" class="form-control" id="description_ar" name="description_ar" value="{{$ProductOtherInfo->description_ar}}">
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
