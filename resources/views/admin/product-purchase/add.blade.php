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
        <form class="form-horizontal" method="post" action="{{url('dashboard/product/purchase/submit')}}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Add Purchase </h3>
                      </div>
                      <div class="col-md-4 text-right">
                          <a href="{{url('dashboard/product/purchase')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Purchase</a>
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

                <div class="form-group row custom_form_group{{ $errors->has('product') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Product Name:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                        <select class="form-control" name="product">
                            <option value="">Select Product Category</option>
                            @foreach($proPurchase as $proPurchase)
                            <option value="{{$proPurchase->product_id}}">{{$proPurchase->product_name}}</option>
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
                      <input type="text" class="form-control" name="quantity" value="{{old('quantity')}}">
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
                      <input type="text" class="form-control" name="unitprice" value="{{old('unitprice')}}">
                      @if ($errors->has('unitprice'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('unitprice') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Total-Price:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="totalprice" value="{{old('totalprice')}}">

                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('date') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Product Purchase Date:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="date" id="purchase_date" value="{{old('date')}}">
                      @if ($errors->has('date'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('date') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Brand Name:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="brand" value="{{old('brand')}}">
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('supplier') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Suppllier:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="supplier" value="{{old('supplier')}}">
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
                      <input type="text" class="form-control" name="chalan" value="{{old('chalan')}}">

                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Voucher No:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="voucher" value="{{old('voucher')}}">

                    </div>
                </div>

              </div>
              <div class="card-footer card_footer_button text-center">
                  <button type="submit" class="btn btn-primary waves-effect">Save</a>
              </div>
          </div>
        </form>
    </div>
</div>
@endsection
