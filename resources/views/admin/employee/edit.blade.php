@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Employee</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Home</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form-horizontal" method="post" action="{{url('dashboard/employee/update')}}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Update Employee Information</h3>
                      </div>
                      <div class="col-md-4 text-right">
                          <a href="{{url('dashboard/employee')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Employee</a>
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
                             <strong>Success!</strong> user information updated successfully.
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
                <div class="form-group row custom_form_group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Name:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="hidden" class="form-control" name="id" value="{{$data->employee_id}}">
                      <input type="hidden" class="form-control" name="slug" value="{{$data->employee_slug}}">
                      <input type="text" class="form-control" name="name" value="{{$data->employee_name}}">
                      @if ($errors->has('name'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('designation') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Designation:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="designation" value="{{$data->employee_designation}}">
                      @if ($errors->has('designation'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('designation') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Phone:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="phone" value="{{$data->employee_phone}}">
                      @if ($errors->has('phone'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('phone') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Email:</label>
                    <div class="col-sm-7">
                      <input type="email" class="form-control" name="email" value="{{$data->employee_email}}">
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('office_id') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Office Id:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="office_id" value="{{$data->employee_office_id}}">
                      @if ($errors->has('office_id'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('office_id') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                
              
                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Photo:</label>
                    <div class="col-sm-4">
                      <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file btnu_browse">
                                  Browse… <input type="file" name="pic" id="imgInp">
                              </span>
                          </span>
                          <input type="text" class="form-control" readonly>
                      </div>
                      <img id='img-upload'/>
                    </div>
                    <div class="col-md-2">
                        @if($data->employee_image!='')
                            <img class="table_image_100" src="{{asset('uploads/employee/'.$data->employee_image)}}" alt="photo"/>
                        @else
                            <img class="table_image_100" src="{{asset('uploads')}}/avatar-black.png" alt="photo"/>
                        @endif
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
