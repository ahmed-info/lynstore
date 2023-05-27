@extends('userprofile.userprofiletemplate')
@section('profile')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form action="{{ route('addShippingAddress') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="phone">@lang('words.Phone')</label>
                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="{{ __('words.Enter Phone Number') }}">
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">@lang('words.Address')</label>
                    <input type="text" class="form-control" name="address" value="{{ old('address') }}"  placeholder="{{ __('words.Enter Your Address') }}">
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="hidden" class="form-control" value="1" name="user_id">
                </div>
                <input type="submit" class="btn btn-primary" value="{{ __('words.Next') }}">
            </form>
        </div>
    </div>
</div>
@endsection
