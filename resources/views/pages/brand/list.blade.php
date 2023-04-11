@extends('dashboard.layouts.layout')
@section('body')
<main>

    <div class="container-fluid px-4">
        @if (session()->has('status'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('status') }}
              </div>
        @endif
        <h1 class="mt-4">List of brands</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">List of Brands</li>
        </ol>

        <table class="table">
            <thead>
              <tr>
                <th class="">#</th>

                <th class="">Category En</th>
                <th class="">Category Ar</th>
                <th class="">Image Logo</th>
                <th class="">Image Background</th>
                <th class="">Action</th>
              </tr>
            </thead>
            <tbody>
                @if(count($brands) > 0)
                    @foreach ($brands as $index=> $brand)
                        <tr>
                            <th scope="">{{$index +1}}</th>
                            <td>{{$brand->title_en}}</td>
                            <td>{{$brand->title_ar}}</td>
                            <td><img src={{  asset('images' ).'/'.$brand->imageLogo}} style="width: 100px" class="img-thumbnail" alt=""></td>
                            <td><img src={{  asset('images' ).'/'.$brand->imageBackground}} style="width: 100px" class="img-thumbnail" alt=""></td>
                            <td>

                                <div class="">
                                    <div class="col-sm-6">
                                        <a href="{{route('dashboard.brand.edit',["id"=>$brand->id])}}" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <form action="{{route('dashboard.brand.destroy',["id"=>$brand->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                                        </form>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>

    </div>
</main>
@endsection
