@extends('dashboard.layouts.layout')
@section('body')
<main>

    <div class="container-fluid px-4">
        <h1 class="mt-4">Create of Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <form action="{{route('dashboard.category.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <h4>Parent Category</h4>
                    <select  class="form-control select2" name="parent_id" style="..." id="parent_id">
                        <option value="0" selected = "selected">@lang('words.Main Category')</option>
                        @foreach ($data as $rs)
                            <option value="{{ $rs->id }}">{{ \App\Http\Controllers\CategoryController::getParentsTree($rs, $rs->{'title_'.app()->getLocale()} ) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
            <div class="form-group col-md-4 mt-3">


                <div class="form-group mb-5">
                    <label for="title_en"><h4>Category EN</h4></label>
                    <input type="text" class="form-control" id="title_en" name="title_en" placeholder="Enter Category en*">
                    @error('title_en')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-4 mt-3">

                <div class="form-group mb-5">
                    <label for="title_ar"><h4>Category AR</h4></label>
                    <input type="text" class="form-control" id="title_ar" name="title_ar" placeholder="Enter Category ar*">
                    @error('title_ar')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>


            </div>

            <div class="form-group col-md-3 mt-3">
                <h3>@lang('words.Image Category')</h3>
                <!-- asset('assets/img/header-bg.jpg') -->
                <img style="height: 30vh" src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="">
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
