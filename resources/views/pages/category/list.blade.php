@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        @if (session()->has('status'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('status') }}
              </div>
        @endif
        <h1 class="mt-4">List of Categories</h1>
        <ol class="breadcrumb mb-4">
            <a href="{{ route('dashboard.category.create') }}">
                <div class="btn btn-primary p-2 bd-highlight">
                    add new category
                </div>
            </a>
        </ol>

        <table class="table">
            <thead>
              <tr>
                <th class="">#</th>
                <th class="">@lang('words.Parent')</th>

                <th class="">Category En</th>
                <th class="">Category Ar</th>
                <th class="">Image</th>
                <th class="">Action</th>
              </tr>
            </thead>
            <tbody>
               @if(count($categories) > 0)
                    @foreach ($categories as $index=> $category)
                          <tr>
                            <th scope="">{{$index +1}}</th>
                            <th >@if($category->parent_id== 0)
                                    @lang('words.Main Category')
                                @else
{{
                                     \App\Http\Controllers\CategoryController::getParentsTree($category, $category->{'title_'.app()->getLocale()} )
}}
                             @endif </th>
                            <td>{{$category->title_en}}</td>
                            <td>{{$category->title_ar}}</td>
                            <td><img src={{  asset('images' ).'/'.$category->image}} style="width: 100px" class="img-thumbnail" alt=""></td>
                            <td>

                                <div class="">
                                    <div class="col-sm-6">
                                        <a href="{{route('dashboard.category.edit',["id"=>$category->id])}}" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <form action="{{route('dashboard.category.destroy',["id"=>$category->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
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
