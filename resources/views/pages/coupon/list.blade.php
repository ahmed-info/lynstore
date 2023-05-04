@extends('dashboard.layouts.layout')
@section('body')
<main>

    <div class="container-fluid px-4">
        @if (session()->has('status'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('status') }}
              </div>
        @endif
        <h1 class="mt-4">List of coupons</h1>
        <ol class="breadcrumb mb-4">
            <a href="{{ route('dashboard.coupons.create') }}">
                <div class="btn btn-primary p-2 bd-highlight">
                    add new coupon
                </div>
            </a>
        </ol>

        <table class="table">
            <thead>
              <tr>
                <th class="">#</th>

                <th class="">Code</th>
                <th class="">Value</th>
                <th class="">Use Times</th>
                <th class="">Validity date</th>
                <th class="">Greater than</th>
                <th class="">status</th>
                <th class="">Created at</th>
              </tr>
            </thead>
            <tbody>
                @if(count($coupons) > 0)
                    @foreach ($coupons as $index=> $coupon)
                        <tr>
                            <th scope="">{{$index +1}}</th>
                            <td>{{$coupon->code}}</td>
                            <td>{{$coupon->value}} {{ $coupon->type == 'fixed'? '$':'%' }}</td>
                            <td>{{$coupon->used_times .' / '. $coupon->use_times}}</td>
                            <td>{{$coupon->start_date != ''? $coupon->start_date->format('Y-m-d').' - '. $coupon->expire_date->format('Y-m-d'): '-'}}</td>
                            <td>{{$coupon->graeter_than ?? '-'}}</td>
                            <td>{{$coupon->status()}}</td>
                            <td>{{$coupon->created_at->format('Y-m-d h:i a')}}</td>
                            <td>

                                <div class="">
                                    <div class="col-sm-6">
                                        <a href="{{route('dashboard.coupons.edit',["id"=>$coupon->id])}}" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <form action="{{route('dashboard.coupons.destroy',["id"=>$coupon->id])}}" method="POST">
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
