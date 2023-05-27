@extends('layouts.user-layout')
@section('style')
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome bootstrap10 -->
  <link href="{{ asset('assets/fontawesome/all.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/adminlte.min.css') }}" rel="stylesheet" />

  <!-- Theme style -->
</head>
@endsection
@section('content')


<!-- Default box -->
<div class="card card-solid @if(app()->getLocale()=='en') text-start @else text-end  @endif ">
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-sm-4">
          <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
          <div class="col-12">
            <img src="{{ asset('images'.'/'.$productDetail->image1) }}" style="width: 489px" class="product-image" alt="Product Image">
          </div>
          <div class="col-12 product-image-thumbs">
            {{-- <div class="product-image-thumb active"><img src="{{ asset('images'.'/'.$productDetail->image1) }}" alt="Product Image"></div> --}}
            @for ($i=1; $i<=5; $i++)
            @if ($productDetail->{'image'.$i} != null)
            <div class="product-image-thumb" ><img src="{{ asset('images').'/'. $productDetail->{'image'.$i} }}" alt="Product Image"></div>

            @endif
            @endfor



          </div>
        </div>
        <div class="col-12 col-md-8">
          <h3 class="my-3">{{ $productDetail->{'title_'.app()->getLocale()} }}</h3>


          <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header">
                  <h4 class="card-title">@lang('words.Details Product')</h4>

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">


                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover table-bordered text-nowrap">

                    <tbody>
                      <tr>
                        <th width="35%">@lang('words.Category')</th>
                        <td>{{ $productDetail->category->{'title_'.app()->getLocale()} }}</td>
                      </tr>
                      <tr>
                        <th width="35%">@lang('words.Product status')</th>
                        <td>
                            @if ($productDetail->quantity > 0)
                                @lang('words.Available')
                            @else
                                @lang('words.Unavailable')
                            @endif
                        </td>
                      </tr>
                      <tr>
                        <th width="35%">@lang('words.Capacity')</th>
                        <td>{{ $productDetail->capacity.'  '.$productDetail->unit }}</td>
                      </tr>

                      <tr>
                        <th width="35%">@lang('words.Origin Country')</th>
                        <td>{{ $productDetail->originCountry}}</td>
                      </tr>
                      <tr>
                        <th width="35%">@lang('words.Brand')</th>
                        <td>{{ $productDetail->brand->{'title_'.app()->getLocale()} }}</td>
                      </tr>
                      <tr>
                        <th width="35%">@lang('words.Supplier')</th>
                        <td>{{ $productDetail->supplier->title}}</td>
                      </tr>

                      <tr>
                        <th width="35%">@lang('words.delivery Time')</th>
                        <td>{{ $productDetail->deliveryTime }}</td>
                      </tr>
                      <tr>
                        <th width="35%">@lang('words.Description')</th>
                        <td>{{ $productDetail->{'description_'.app()->getLocale()} }}</td>
                      </tr>
                      @if (count($productDetail->ProductOtherInfos) > 0)
                      @foreach ($productDetail->ProductOtherInfos as $otherInfo )
                      <tr>
                        <th width="35%">{{ $otherInfo->{'title_'.app()->getLocale()} }}</th>
                        <td>
                            {{ $otherInfo->{'description_'.app()->getLocale()} }}
                        </td>
                      </tr>
                      @endforeach
                      @endif






                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
        <hr>
        <h4>@lang('words.Available Colors')</h4>

          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-default text-center active">
              <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
              Green
              <br>
              <i class="fas fa-circle fa-2x text-green"></i>
            </label>
            <label class="btn btn-default text-center">
              <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
              Blue
              <br>
              <i class="fas fa-circle fa-2x text-blue"></i>
            </label>
            <label class="btn btn-default text-center">
              <input type="radio" name="color_option" id="color_option_a3" autocomplete="off">
              Purple
              <br>
              <i class="fas fa-circle fa-2x text-purple"></i>
            </label>
            <label class="btn btn-default text-center">
              <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">
              Red
              <br>
              <i class="fas fa-circle fa-2x text-red"></i>
            </label>
            <label class="btn btn-default text-center">
              <input type="radio" name="color_option" id="color_option_a5" autocomplete="off">
              Orange
              <br>
              <i class="fas fa-circle fa-2x text-orange"></i>
            </label>
          </div>

          <h4 class="mt-3"><small>@lang('words.Size Please select one')</small></h4>
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-default text-center">
              <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
              <span class="text-xl">S</span>
              <br>
              Small
            </label>
            <label class="btn btn-default text-center">
              <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
              <span class="text-xl">M</span>
              <br>
              Medium
            </label>
            <label class="btn btn-default text-center">
              <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
              <span class="text-xl">L</span>
              <br>
              Large
            </label>
            <label class="btn btn-default text-center">
              <input type="radio" name="color_option" id="color_option_b4" autocomplete="off">
              <span class="text-xl">XL</span>
              <br>
              Xtra-Large
            </label>
          </div>

          <div class="py-2 px-3 mt-4">
            @if ($productDetail->mainPriceDiscount != null || $productDetail->mainPriceDiscount != '')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-6">
                                        <h6 class="">
                                            <del class="text-left"> ${{ $productDetail->mainPrice }}</del> <span class="text-right">${{ $productDetail->mainPriceDiscount }}</span>
                                        </h6>
                                    </div>
                                    <div class="col-md-6">
                                        <span>
                                             <del class="">IQD:{{ $productDetail->mainPrice * $setting->exchange_rate }} </del>  IQD:{{ $productDetail->mainPriceDiscount * $setting->exchange_rate }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @else
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="col-md-6">
                                $ {{ $productDetail->mainPrice }}
                            </h6>
                            <div class="col-md-6">
                                <small>IQD: {{ $productDetail->mainPrice * $setting->exchange_rate }} </small>
                            </div>
                            </div>
                        </div>

                        @endif
          </div>

          <div class="mt-4">
            <form action="{{ route('addProductToCart',$productDetail->id) }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $productDetail->id }}" name="product_id">
                @if ($productDetail->mainPriceDiscount != null || $productDetail->mainPriceDiscount !='')

                <input type="hidden" value="{{ $productDetail->mainPriceDiscount }}" name="price">
                @else
                <input type="hidden" value="{{ $productDetail->mainPrice }}" name="price">

                @endif
                <div class="form-group">
                    <label for="quantity">How Many pics</label>
                    <input type="number" min="1" class="form-control" value="1" placeholder="1" name="quantity"><br>
                </div>

                <input type="submit" value="{{ __('words.Add to Cart') }}"  class="mb-2 btn btn-primary btn-lg" />
            </form>

            <div class="mt-1">
                <form action="{{ route('addProductToWishlist',$productDetail->id) }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $productDetail->id }}" name="product_id">
                    @if ($productDetail->mainPriceDiscount != null || $productDetail->mainPriceDiscount !='')

                    <input type="hidden" value="{{ $productDetail->mainPriceDiscount }}" name="price">
                    @else
                    <input type="hidden" value="{{ $productDetail->mainPrice }}" name="price">

                    @endif
                    <div class="form-group">
                        <input type="hidden" min="1" class="form-control" value="1" placeholder="1" name="quantity"><br>
                    </div>

                    <div class="btn btn-primary btn-lg">


                    <i class="fas fa-heart fa-lg mr-2"></i>
                    <input type="submit" value="{{ __('words.Add to Wishlist') }}"  class="mb-2 btn btn-primary" />
                </div>
                </form>
            </div>
          </div>

          <div class="mt-4 product-share">
            <a href="{{ $setting->facebook }}" class="text-gray">
              <i class="fab fa-facebook-square fa-2x"></i>
            </a>
            <a href="{{ $setting->instagram }}" class="text-gray">
              <i class="fab fa-instagram-square fa-2x"></i>
            </a>
            <a href="#" class="text-gray">
              <i class="fas fa-rss-square fa-2x"></i>
            </a>
          </div>

        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
</div>
  @include('slides.related-product')

  <!-- /.card -->

@include('layouts.footer')

@endsection
@section('script')
  {{-- test script --}}
  <!-- jQuery -->
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('assets/js/adminlte.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->

{{-- <script src="{{ asset('assets/js/demo.js') }}"></script> --}}

<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>
@endsection
