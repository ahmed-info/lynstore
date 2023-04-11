@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Main</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Main</li>
        </ol>
        <form action="{{route('admin.main.update', app()->getLocale())}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}
        <div class="row">
            <div class="form-group col-md-3 mt-3">
                <h3>Background Image</h3>
                <!-- asset('assets/img/header-bg.jpg') -->
                <img style="height: 30vh" src="{{asset($main->bc_img)}}" class="img-thumbnail" alt="">
                <input type="file" class="mt-3" name="bc_img" id="bc_img">
            </div>
            <div class="form-group col-md-4 mt-3">
                <div class="mb-3">
                    <label for="title"><h4>Title</h4></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$main->title}}">
                </div>
                <div class="mb-5">
                    <label for="sub_title"><h4>Sub Title</h4></label>
                    <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{$main->sub_title}}">
                </div>
            </div>
        </div>
        <input type="submit" name="submit" class="btn btn-primary mt-4">
    </form>
    </div>
</main>
@endsection