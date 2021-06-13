@extends('layouts.admin')
@section('content')
@php
    $allProduct=App\Product::where('product_status',1)->orderBy('product_name','DESC')->get();
    $allProductPurchase=App\ProductPurchase::where('purchase_status',1)->orderBy('purchase_id','DESC')->get();
@endphp
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Damage</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="{{url('dashboard/product/damage')}}">Damage</a></li>
            <li class="active">edit</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form-horizontal" method="post" action="{{url('dashboard/product/damage/update')}}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Edit Product Damage Information</h3>
                      </div>
                      <div class="col-md-4 text-right">
                          <a href="{{url('dashboard/product/damage')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Product Damage</a>
                      </div>
                      <div class="clearfix"></div>
                  </div>
              </div>
              <div class="card-body card_form">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-7">
                        @if(Session::has('success'))
                          <div class="alert alert-success alertsuccess" role="alert">
                             <strong>Success!</strong> damge product add success.
                          </div>
                        @endif
                        @if(Session::has('error'))
                          <div class="alert alert-warning alerterror" role="alert">
                             <strong>Opps!</strong> please try again.
                          </div>
                        @endif
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('product') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Damage Product Name:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                    <input type="hidden" class="form-control" name="id" value="{{$data->damage_id}}">
                    <input type="hidden" class="form-control" name="slug" value="{{$data->damage_slug}}">
                      <select class="form-control" name="product">
                        <option value="">Select Product</option>
                        @foreach($allProduct as $product)
                        <option value="{{$product->product_id}}"@if($product->product_id == $data->product_id) selected @endif>{{$product->product_name}}</option>
                        @endforeach
                      </select>
                      @if ($errors->has('product'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('product') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('chalan') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Damage Product Chalan:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <select class="form-control" name="chalan">
                        <option value="">Select Chalan</option>
                        @foreach($allProductPurchase as $chalan)
                        <option value="{{$chalan->purchase_chalan}}"@if($chalan->purchase_chalan == $data->damage_chalan) selected @endif>{{$chalan->purchase_chalan}}</option>
                        @endforeach
                      </select>
                      @if ($errors->has('chalan'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('chalan') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Damage Quantity:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="number" class="form-control" name="quantity" value="{{$data->damage_quantity}}">
                      @if ($errors->has('quantity'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('quantity') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Damage Remarks:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="remarks" value="{{$data->damage_remarks}}">
                    </div>
                </div>
              </div>
              <div class="card-footer card_footer_button text-center">
                  <button type="submit" class="btn btn-primary waves-effect">UPDATE</a>
              </div>
          </div>
        </form>
    </div>
</div>
@endsection
