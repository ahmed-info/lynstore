@extends('dashboard.layouts.layout')
@section('body')
<main>

    <div class="container-fluid px-4">
        @if (session()->has('status'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('status') }}
              </div>
        @endif
        <h1 class="mt-4">List of banners</h1>
        <ol class="breadcrumb mb-4">
            <a href="{{ route('dashboard.banner.create') }}">
                <div class="btn btn-primary p-2 bd-highlight">
                    add new banner
                </div>
            </a>
        </ol>

        <table class="table">
            <thead>
              <tr>
                <th class="">#</th>

                <th class="">image</th>
                <th class="">link</th>
                <th class="">title en</th>
                <th class="">title ar</th>
                <th class="">alt</th>
                <th class="">status</th>
                <th class="">Action</th>
              </tr>
            </thead>
            <tbody>
                @if(count($banners) > 0)
                    @foreach ($banners as $index=> $banner)
                        <tr>
                            <th scope="">{{$index +1}}</th>
                            <td><img src={{  asset('images' ).'/'.$banner->image}} style="width: 100px" class="img-thumbnail" alt=""></td>
                            <td>{{$banner->link}}</td>
                            <td>{{$banner->title_en}}</td>
                            <td>{{$banner->title_ar}}</td>
                            <td>{{$banner->alt}}</td>
                            <td>{{$banner->status== "1"? "Active":"Inactive"}}</td>
                            <td>

                                <div class="">
                                        <a href="{{route('dashboard.banner.edit',["id"=>$banner->id])}}" class="btn btn-primary">Edit</a>


                                    <div class="col-sm-6">
                                        <form  action="{{route('dashboard.banner.destroy',["id"=>$banner->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input name="_method" type="hidden" value="DELETE">
                                            {{-- <input type="submit" name="submit"  value="Delete" class="btn btn-danger deleteBtn"> --}}
                                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>

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
