@extends('dashboard.layouts.layout')

@section('body')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">{{__('words.dashboard')}}</li>
        <li class="breadcrumb-item"><a href="#">{{__('words.dashboard')}}</a>
        </li>
        <li class="breadcrumb-item active">داشبرد</li>


    </ol>


    {{-- {{dd($setting)}} --}}

    <div class="container-fluid">

        <div class="animated fadeIn">
            {{-- <form action="{{Route('dashboard.settings.update' , $setting)}}" method="post" enctype="multipart/form-data"> --}}
            <form action="{{Route('dashboard.settings.update', $setting->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('words.settings') }}</strong>
                        </div>
                        <div class="card-block">
                            <div class="form-group col-md-6">
                                <label>{{ __('words.logo') }}</label>
                                <input type="file" name="logo" class="form-control"
                                    placeholder="{{ __('words.logo') }}" >
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('words.facebook') }}</label>
                                <input  type="text" name="facebook" class="form-control"
                                value="{{ $setting->facebook }}"
                                    placeholder="{{ __('words.facebook') }}" >
                            </div>
                        </div>
                            <div class="card-block">
                                <div class="form-group col-md-6">
                                    <label>{{ __('words.phone') }}</label>
                                    <input type="text" name="phone" class="form-control"
                                        placeholder="{{ __('words.phone') }}" value="{{ $setting->phone }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{ __('words.instagram') }}</label>
                                    <input  type="text" name="instagram" class="form-control"
                                        placeholder="{{ __('words.instagram') }}" value="{{ $setting->instagram }}">
                                </div>
                            </div>



                        <div class="card">



                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>
                                    Submit</button>
                                <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i>
                                    Reset</button>
                            </div>

                        </div>

                    </div>
            </form>
        </div>
    </div>
    @endsection
