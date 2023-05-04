@extends('dashboard.layouts.layout')
@section('body')
    <main>

        <div class="container-fluid px-4">
            <h1 class="mt-4">Create of product Details</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
            <form action="{{ route('dashboard.productDetails.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="product_id">
                            <h6>Select Product</h6>
                        </label>
                        <select name="product_id" id="product_id" class="form-control">
                            <option value="">Products</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}"
                                    {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                    {{ $product->{'title_'.app()->getLocale()} }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 mt-3">
                        <div class="form-group mb-5">
                            <label for="title_en">
                                <h4>Title EN</h4>
                            </label>
                            <input type="text" class="form-control" id="title_en" name="title_en" value="{{ old('title_en') }}"
                                placeholder="Enter Title en*">
                            @error('title_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col-md-6 mt-3">
                        <div class="form-group mb-5">
                            <label for="title_ar">
                                <h4>Title AR</h4>
                            </label>
                            <input type="text" class="form-control" id="title_ar" name="title_ar" value="{{ old('title_ar') }}"
                                placeholder="Enter Title ar*">
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
                </div>
                <input type="submit" name="submit" class="btn btn-primary mt-1">
            </form>
        </div>
    </main>
@endsection
