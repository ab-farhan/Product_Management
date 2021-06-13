@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Product Purchase</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Home</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form-horizontal" method="post" action="{{url('dashboard/product/purchase/update')}}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Update Product Purchase Information</h3>
                      </div>
                      <div class="col-md-4 text-right">
                          <a href="{{url('dashboard/product/purchase')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Product Purchase</a>
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
                             <strong>Success!</strong> product information updated successfully.
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
                    <label class="col-sm-3 control-label">Product Name:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                        <select class="form-control" name="product">
                            <option value="">Select Product Category</option>
                            @foreach($proPurchase as $proPurchase)
                            <option value="{{$proPurchase->product_id}}" @if($proPurchase->product_id == $data->product_id) selected @endif>{{$proPurchase->product_name}}</option>
                            @endforeach
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
                      <input type="hidden" class="form-control" name="id" value="{{$data->purchase_id}}">
                      <input type="hidden" class="form-control" name="slug" value="{{$data->purchase_slug}}">
                      <input type="text" class="form-control" name="quantity" value="{{$data->purchase_quantity}}">
                      @if ($errors->has('quantity'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('quantity') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('unitprice') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Product Unit-Price:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="unitprice" value="{{$data->purchase_unit_price}}">
                      @if ($errors->has('unitprice'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('unitprice') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Product Sub-Price:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="subprice" value="{{$data->purchase_sub_price}}">
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Product Discount:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="discountprice" value="{{$data->purchase_discount}}">

                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Total-Price:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="totalprice" value="{{$data->purchase_total_price}}">

                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('date') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Product Purchase Date:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="date" id="purchase_date" value="{{$data->purchase_date}}">
                      @if ($errors->has('date'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('date') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('brand') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Brand Name:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="brand" value="{{$data->purchase_brand}}">
                      @if ($errors->has('brand'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('brand') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('supplier') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Suppllier:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="supplier" value="{{$data->purchase_supplier}}">
                      @if ($errors->has('supplier'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('supplier') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Chalan No:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="chalan" value="{{$data->purchase_chalan}}">

                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Voucher No:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="voucher" value="{{$data->purchase_voucher}}">

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
