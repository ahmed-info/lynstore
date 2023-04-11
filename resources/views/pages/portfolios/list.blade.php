@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">List of Portfolios</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">List of Portfolios</li>
        </ol>

        <table class="table">
            <thead>
              <tr>
                <th class="col-sm-1">#</th>
                <th class="col-sm-1">Department</th>
                <th class="col-sm-1">title</th>
                <th class="col-sm-6">Description</th>
                <th class="col-sm-1">Image</th>
                <th class="col-sm-2">Action</th>
              </tr>
            </thead>
            <tbody>
                
                @if(count($portfolios) > 0)
                @foreach ($portfolios as $index=> $portfolio)
                    <tr>
                        <th scope="row">{{$index +1}}</th>
                        {{--<td>{{$services[$index+1]->depart}}</td> --}}
                        <td class="col-md-1 mt-3 read-only">
                        
                                <select name="service_id" id="service_id" class="form-control" aria-label="Disabled" disabled>
                                    @foreach ($services as $service)
                                        <option value="{{$service->id}}" {{ $portfolio->service_id == $service->id ? 'selected' : ''}} readonly>{{ $service->depart_en }}</option>
                                    @endforeach
                                </select>
                            
                        </td>
                        <td>{{$portfolio->title_en}}</td>
                        <td>{{Str::limit($portfolio->description_en, 65, '...')}}</td>
                        <td><img src="../../../{{ $portfolio->bc_img }}" style="width: 100px" class="img-thumbnail" alt=""></td>
                        <td>

                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="{{route('admin.portfolios.edit',["id"=>$portfolio->id, "language"=>app()->getLocale()])}}" class="btn btn-primary">Edit</a>
                                </div>
                                <div class="col-sm-6">
                                    <form action="{{route('admin.portfolios.destroy',["id"=>$portfolio->id, "language"=>app()->getLocale()])}}" method="POST">
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