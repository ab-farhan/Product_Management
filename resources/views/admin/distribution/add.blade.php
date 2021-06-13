@extends('layouts.admin')
@section('content')
@php
    $productID=$data->product_id;
    $allProductChalan=App\ProductPurchase::where('purchase_status',1)->where('product_id',$productID)->get();
@endphp
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Product Distribution</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Home</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form-horizontal" method="post" action="{{url('dashboard/product/distribution/request/submit')}}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Product Distribution Request </h3>
                      </div>
                      <div class="col-md-4 text-right">
                          <a href="{{url('dashboard/product/requisition')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Requisition</a>
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
                             <strong>Success!</strong> purchase add success.
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
                <div class="form-group row custom_form_group{{ $errors->has('employee') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Employee Name:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                        <input type="hidden" name="id" value="{{$data->pr_id}}"/>
                        <input type="hidden" name="prslug" value="{{$data->pr_slug}}"/>
                        <select class="form-control" name="employee">
                            <option value="{{$data->user_id}}">{{$data->employeeInfo->name}}</option>
                        </select>
                        @if ($errors->has('employee'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('employee') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('product') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Product Name:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                        <select class="form-control" name="product" >
                            <option value="{{$data->product_id}}">{{$data->productInfo->product_name}}</option>
                        </select>
                        @if ($errors->has('product'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('product') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Product Qunatity:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <select class="form-control" name="quantity">
                          <option value="{{$data->pr_quantity}}">{{$data->pr_quantity}}</option>
                      </select>
                      @if ($errors->has('quantity'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('quantity') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('chalan') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Product Chalan:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <select class="form-control" name="chalan" >
                          <option value="">Select Chalan</option>
                          @foreach($allProductChalan as $chalan)
                          <option value="{{$chalan->purchase_chalan}}">{{$chalan->purchase_chalan}}</option>
                          @endforeach
                      </select>
                     
                      @if ($errors->has('chalan'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('chalan') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Remarks:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="remarks" value="{{old('remarks')}}">
                    </div>
                </div>
              </div>
              <div class="card-footer card_footer_button text-center">
                  <button type="submit" class="btn btn-primary waves-effect">SUBMIT</a>
              </div>
          </div>
        </form>
    </div>
</div>
@endsection
