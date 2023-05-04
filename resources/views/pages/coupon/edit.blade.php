@extends('dashboard.layouts.layout')
@section('body')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit of Coupon</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Coupon</li>
        </ol>
        <form action="{{route('dashboard.coupons.update',["id"=>$coupon->id])}}" method="POST">
        @csrf
        @method('put')
        <div class="row">
            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="code"><h4>Code</h4></label>
                    <input type="text" class="form-control" id="code" name="code" value="{{ $coupon->code }}" placeholder="Enter Code*">
                    @error('code')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="title_ar"><h4>Type</h4></label>
                    <select name="type" class="form-control" id="">
                        <option value="">---</option>
                        <option value="fixed" {{ old('type',$coupon->type)=='fixed' ? 'selected':null }}>Fixed</option>
                        <option value="percentage" {{ old('type', $coupon->type)=='percentage' ? 'selected':null }}>Percentage</option>
                    </select>
                    @error('type')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="code"><h4>Value</h4></label>
                    <input type="text" class="form-control" id="value" name="value" value="{{ $coupon->value }}" placeholder="Enter Value*">
                    @error('value')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="use_times"><h4>Uses Times</h4></label>
                    <input type="number" class="form-control" id="use_times" name="use_times" value="{{ $coupon->use_times }}" placeholder="Enter Use Times">
                    @error('use_times')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="start_date"><h4>Start Date</h4></label>
                    <input type="text" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $coupon->start_date->format('Y-m-d') )}}" placeholder="Enter start date*">
                    @error('start_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>



            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="code"><h4>Expire Date</h4></label>
                    <input type="text" class="form-control" id="expire_date" name="expire_date" value="{{ old('expire_date',$coupon->expire_date->format('Y-m-d')) }}" placeholder="Enter Expire Date">
                    @error('expire_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="greater_than"><h4>Greater than</h4></label>
                    <input type="number" class="form-control" id="graeter_than" value="{{ $coupon->graeter_than }}" name="graeter_than" placeholder="Enter greater than">
                    @error('greater_than')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="status"><h4>Status</h4></label>
                    <select name="status" class="form-control" id="">
                        <option value="">---</option>
                        <option value="1" {{ old('status', $coupon->status)=='1' ? 'selected':null }}>Active</option>
                        <option value="0" {{ old('status',$coupon->status)=='0' ? 'selected':null }}>Inactive</option>
                    </select>
                    @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-5">
                    <label for="start_date"><h4>Description En</h4></label>
                    <input type="textarea" class="form-control" id="description_en" value="{{ $coupon->description_en }}" name="description_en" placeholder="Enter description en">
                    @error('description_en')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>
            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-5">
                    <label for="start_date"><h4>Description Ar</h4></label>
                    <input type="text" class="form-control" id="description_ar" name="description_ar" value="{{ $coupon->description_ar }}" placeholder="Enter description ar">
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
