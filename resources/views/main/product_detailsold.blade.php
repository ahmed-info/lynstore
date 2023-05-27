@extends('layouts.user-layout')
@section('content')
<div style="height: 100px; width:100%;"></div>
<div class="container" style="display:block;">
    <h1 class="text-center fw-bold">title_en</h1>
    <h4 class="text-center py-3">
        created at
        {{-- {{ \Carbon\Carbon::parse($product->created_at)->format('Y-m-d')}} --}}
    </h4>


    {{-- <div class="col-md-3" style="display:block;">
        <div class="fw-bold text-center" style="display:block;">
            <div class="bg-featured-blog d-block" style="background-image: url(../{{$product->image}});display:inline-block;height:100%">
            </div>
        </div>
    </div> --}}



      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
              <div class="col-12">
                <img src="" class="product-image" alt="Product Image">
              </div>


              <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active">
                    <img src="" alt="Product Image">

                </div>


                {{-- @foreach ($images as $image) --}}
                <div class="product-image-thumb" >
                    <img src="" alt="Product Image">
                </div>
                {{-- @endforeach --}}


              </div>


            </div>
            <div class="col-12 col-sm-6">
                <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">@lang('messages.Details Product')</h4>

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
                            <th width="35%">@lang('messages.type')</th>
                            <td>product type</td>
                          </tr>
                          <tr>
                            <th width="35%"> @lang('messages.brand') </th>
                            <td>product brand</td>
                          </tr>
                          <tr>
                            <th width="35%">@lang('messages.model')</th>
                            <td>product model</td>
                          </tr>
                          <tr>
                            <th width="35%">@lang('messages.stock')</th>
                            <td>product stock</td>
                          </tr>
                          <tr>
                            <th width="35%">@lang('messages.added at')</th>
                            <td>
                                product created at
                                       {{-- {{ \Carbon\Carbon::parse($product->created_at)->format('Y-m-d')}} --}}
                            </td>
                          </tr>
                          <tr>
                            <th width="35%">@lang('messages.shipping weight')</th>
                            <td>product->shipping_weight</td>
                          </tr>
                          <tr>
                            <th width="35%">@lang('messages.shipping dimensions')</th>
                            <td>product->shipping_dimensions</td>
                          </tr>

                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
            </div>



          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">@lang('messages.description')</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                product description_en
            </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->



</div>
@endsection
