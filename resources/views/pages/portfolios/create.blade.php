@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Create Portfolio</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <form action="{{route('admin.portfolios.store', app()->getLocale())}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="form-group col-md-4 mt-3">
                <div class="form-group col-md-4 mt-3">
                    <label for="service_id"><h4>Select Department</h4></label>
                    <select name="service_id" id="service_id" class="form-control">
                        <option value="">All services</option>
                        @foreach ($services as $service)
                            <option value="{{$service->id}}" {{ old('service_id') == $service->id ? 'selected' : '' }}>{{ $service->depart_en }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-5">
                    <label for="title_en"><h4>Title EN</h4></label>
                    <input type="text" class="form-control" id="title_en" name="title_en" placeholder="Enter title en*">
                </div>

                <div class="form-group mb-2">
                    <!-- textarea input-->
                    <label for="desc"><h4>Description EN</h4></label>
                    <textarea class="form-control" id="description_en" name="description_en" placeholder="@lang('Your Description en*')" style="height: 112px"></textarea>
                </div>
            </div>

            <div class="form-group col-md-4 mt-3">
                <div class="form-group col-md-4 mt-3">
                    <label for="service_id"><h4>Select Department</h4></label>
                    <select name="service_id" id="service_id" class="form-control">
                        <option value="">كل الاقسام</option>
                        @foreach ($services as $service)
                            <option value="{{$service->id}}" {{ old('service_id') == $service->id ? 'selected' : '' }}>{{ $service->depart_ar }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-5">
                    <label for="title_en"><h4>Title AR</h4></label>
                    <input type="text" class="form-control" id="title_ar" name="title_ar" placeholder="Enter title ar*">
                </div>

                <div class="form-group mb-2">
                    <!-- textarea input-->
                    <label for="desc"><h4>Description ar</h4></label>
                    <textarea class="form-control" id="description_ar" name="description_ar" placeholder="Your Description ar*" style="height: 112px"></textarea>
                </div>
            </div>

            <div class="form-group col-md-4 mt-3">
                <h3>Image Portfolio</h3>
                <!-- asset('assets/img/header-bg.jpg') -->
                <img style="height: 30vh" src="{{asset('storage/img/default.jpg')}}" class="img-thumbnail" alt="">
                <input type="file" class="mt-3" name="bc_img" id="bc_img">
            </div>
        </div>
        <input type="submit" name="submit" class="btn btn-primary mt-1">
    </form>
    </div>
</main>
@endsection