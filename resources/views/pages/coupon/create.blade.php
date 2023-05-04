@extends('dashboard.layouts.layout')
@section('style')
        <link rel="stylesheet" href="{{ asset('assets/pickdate/themes/classic.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/pickdate/themes/classic.date.css') }}">
        <style>
            .picker__select--month, .picker__select--year{
                padding: 0 !important;
            }
        </style>
@endsection
@section('body')
<main>

    <div class="container-fluid px-4">
        <h1 class="mt-4">Create of Coupon</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <form action="{{route('dashboard.coupons.store')}}" method="POST">
            @csrf
        <div class="row">
            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="code"><h4>Code</h4></label>
                    <input type="text" class="form-control" id="code" name="code" placeholder="Enter Code*">
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
                        <option value="fixed" {{ old('type')=='fixed' ? 'selected':null }}>Fixed</option>
                        <option value="percentage" {{ old('type')=='percentage' ? 'selected':null }}>Percentage</option>
                    </select>
                    @error('type')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="code"><h4>Value</h4></label>
                    <input type="text" class="form-control" id="value" name="value" placeholder="Enter Value*">
                    @error('value')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="use_times"><h4>Uses Times</h4></label>
                    <input type="number" class="form-control" id="use_times" name="use_times" placeholder="Enter Use Times">
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
                    <input type="text" class="form-control" id="start_date" name="start_date" placeholder="Enter start date*">
                    @error('start_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>



            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="code"><h4>Expire Date</h4></label>
                    <input type="text" class="form-control" id="expire_date" name="expire_date" placeholder="Enter Expire Date">
                    @error('expire_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-group col-md-3 mt-3">
                <div class="form-group mb-5">
                    <label for="greater_than"><h4>Greater than</h4></label>
                    <input type="number" class="form-control" id="graeter_than" name="graeter_than" placeholder="Enter greater than">
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
                        <option value="1" {{ old('type')=='1' ? 'selected':null }}>Active</option>
                        <option value="0" {{ old('type')=='0' ? 'selected':null }}>Inactive</option>
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
                    <input type="textarea" class="form-control" id="description_en" name="description_en" placeholder="Enter description en">
                    @error('description_en')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>
            <div class="form-group col-md-6 mt-3">
                <div class="form-group mb-5">
                    <label for="start_date"><h4>Description Ar</h4></label>
                    <input type="text" class="form-control" id="description_ar" name="description_ar" placeholder="Enter description ar">
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
@section('scripts')
<script src="{{ asset('assets/pickdate/picker.js') }}"></script>
<script src="{{ asset('assets/pickdate/picker.date.js') }}"></script>
<script>
    $(function(){
        $('#code').keyup(function(){
            this.value = this.value.toUpperCase();
        });
        $('#start_date').pickadate({
            format:'yyyy-mm-dd',
            selectMonths:true,
            selectYears:true,
            clear:'clear',
            close:'OK',
            closeOnSelect:true
        });
        var startdate = $('#start_date').pickadate('picker');
        var enddate = $('#expire_date').pickadate('picker');

        $('#start_date').change(function(){
            select_ci_date = "";
            select_ci_date = $('#start_date').val();
            if(select_ci_date != null){
                var cidate = new Date(select_ci_date);
                min_codate = "";
                min_codate = new Date();
                min_codate.setDate(cidate.getDate()+1);
                enddate.set('min', min_codate);
            }
        });

        $('#expire_date').pickadate({
            format:'yyyy-mm-dd',
            min: new Date(),
            selectMonths:true,
            selectYears:true,
            clear:'clear',
            close:'OK',
            closeOnSelect:true
        });
    });
</script>
@endsection
