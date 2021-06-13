@extends('layouts.admin')
@section('content')
@php
    $allProcate=App\ProductCategory::where('procate_status',1)->orderBy('procate_name','DESC')->get();
    $allProduct=App\Product::where('product_status',1)->orderBy('product_name','DESC')->get();
@endphp
<div class="wraper">
    <div class="row">
        <div class="col-sm-12">
            <div class="bg-picture text-center">
                <div class="bg-picture-overlay"></div>
                <div class="profile-info-name">
                @if($data->photo!= '')
                    <img src="{{asset('uploads/users/'.$data->photo)}}" class="thumb-lg rounded-circle img-thumbnail" alt="profile-image">
                @else
                <img src="{{asset('contents/admin')}}/assets/images/users/avatar-1.jpg" class="thumb-lg rounded-circle img-thumbnail" alt="profile-image">
                @endif
                    <h3 class="text-white">{{$data->name}}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row user-tabs">
        <div class="col-md-9 col-xl-9">
            <ul class="nav nav-tabs tabs" role="tablist">
                <li class="nav-item tab">
                    <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">
                        <span class="d-block d-sm-none"><i class="fa fa-home"></i></span>
                        <span class="d-none d-sm-block">Personal Information</span>
                    </a>
                </li>
                <li class="nav-item tab">
                    <a class="nav-link" id="activities-tab" data-toggle="tab" href="#activities" role="tab" aria-controls="activities" aria-selected="false">
                        <span class="d-block d-sm-none"><i class="fa fa-user"></i></span>
                        <span class="d-none d-sm-block">Recive Products</span>
                    </a>
                </li>
                <li class="nav-item tab">
                    <a class="nav-link" id="projects-tab" data-toggle="tab" href="#projects" role="tab" aria-controls="projects" aria-selected="false">
                        <span class="d-block d-sm-none"><i class="fa fa-envelope-o"></i></span>
                        <span class="d-none d-sm-block">Recognition</span>
                    </a>
                </li>
                <li class="nav-item tab">
                    <a class="nav-link" id="setting-tab" data-toggle="tab" href="#setting" role="tab" aria-controls="setting" aria-selected="false">
                        <span class="d-block d-sm-none"><i class="fa fa-cog"></i></span>
                        <span class="d-none d-sm-block">Update </span>
                    </a>
                </li>

                <div class="indicator"></div>
            </ul>
        </div>
        <div class="d-none d-sm-block col-md-3 col-xl-3">
            <div class="pull-right">
                <div class="dropdown">
                    <a href="#" class="btn btn-primary btn-sm waves-effect waves-light">Link</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="tab-content profile-tab-content">
                <div class="tab-pane show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card card-default card-fill">
                                <div class="card-header">
                                    <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Personal Information</h3>
                                </div>
                                <div class="card-body">
                                    <div class="about-info-p">
                                        <strong>NAME</strong>
                                        <br>
                                        <p class="text-muted">{{$data->name}}</p>
                                    </div>
                                    <div class="about-info-p">
                                        <strong>PHONE</strong>
                                        <br>
                                        <p class="text-muted">{{$data->phone}}</p>
                                    </div>
                                    <div class="about-info-p">
                                        <strong>EMAIL ADDRESS</strong>
                                        <br>
                                        <p class="text-muted">{{$data->email}}</p>
                                    </div>
                                    <div class="about-info-p">
                                        <strong>EMPLOYEE ID</strong>
                                        <br>
                                        <p class="text-muted">{{$data->employee_id}}</p>
                                    </div>
                                    <div class="about-info-p m-b-0">
                                        <strong>DESIGNATION</strong>
                                        <br>
                                        <p class="text-muted">{{$data->designation}}</p>
                                    </div>
                                    <div class="about-info-p m-b-0">
                                        <strong>REGISTRATION DATE</strong>
                                        <br>
                                        <p class="text-muted">{{$data->created_at->format('d M Y')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <form class="form-horizontal" method="post" action="{{url('dashboard/profile/requisition/submit')}}" enctype="multipart/form-data">
                              @csrf
                              <div class="card card-default card-fill">
                                  <div class="card-header">
                                      <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Requisition form</h3>
                                  </div>
                                  <div class="card-body card_form_top">
                                    <div class="form-group row custom_form_group{{ $errors->has('procate') ? ' has-error' : '' }}">
                                        <label class="col-sm-3 control-label">Product Category:<span class="req_star">*</span></label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="procate">
                                                <option value="">Select Product Category</option>
                                                @foreach($allProcate as $procate)
                                                <option value="{{$procate->procate_id}}">{{$procate->procate_name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('procate'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('procate') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row custom_form_group{{ $errors->has('product') ? ' has-error' : '' }}">
                                        <label class="col-sm-3 control-label">Product Name:<span class="req_star">*</span></label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="product">
                                                <option value="">Select Product</option>
                                                @foreach($allProduct as $product)
                                                <option value="{{$product->product_id}}">{{$product->product_name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('product'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('product') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                     <div class="form-group text-info clearfix row custom_form_group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                                        <label class="col-sm-3 control-label">Quantity:<span class="req_star">*</span></label>
                                        <div class="col-sm-7 clearfix">
                                          <input type="number" class="form-control" name="quantity" value="{{old('quantity')}}">
                                        </div>
                                        @if ($errors->has('quantity'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('quantity') }}</strong>
                                                </span>
                                            @endif
                                    </div>  
                                   
                                    <div class="form-group row custom_form_group">
                                        <label class="col-sm-3 control-label">Remarks:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control" name="remarks" value="{{old('remarks')}}">
                                        </div>
                                    </div>
                                  </div>
                                  <div class="card-footer card_footer_button text-center">
                                      <button type="submit" class="btn btn-primary waves-effect btn-md">SEND REQUISITION</a>
                                  </div>
                                </form>
                            </div>
                            <div class="card card-default card-fill">
                                <div class="card-header">
                                    <h3 class="card-title">Skills</h3>
                                </div>
                                <div class="card-body">
                                    ....
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="activities" aria-labelledby="activities-tab">
                    <div class="card card-default card-fill">
                        <div class="card-body">
                            <div class="timeline-2">
                                <div class="time-item">
                                    <div class="item-info">
                                        <div class="text-muted">5 minutes ago</div>
                                        <p><strong><a href="#" class="text-info">John Doe</a></strong> Uploaded a photo <strong>"DSC000586.jpg"</strong></p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <div class="text-muted">30 minutes ago</div>
                                        <p><a href="#" class="text-info">Lorem</a> commented your post.</p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <div class="text-muted">59 minutes ago</div>
                                        <p><a href="#" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <div class="text-muted">5 minutes ago</div>
                                        <p><strong><a href="#" class="text-info">John Doe</a></strong>Uploaded 2 new photos</p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <div class="text-muted">30 minutes ago</div>
                                        <p><a href="#" class="text-info">Lorem</a> commented your post.</p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <div class="text-muted">59 minutes ago</div>
                                        <p><a href="#" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="projects" aria-labelledby="projects-tab">
                    <div class="card card-default card-fill">
                        <div class="card-header">
                            <h3 class="card-title">My Projects</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered custom_table mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Product Name</th>
                                            <th>product Quantity</th>
                                            <th>Comment</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>1</td>
                                            <td>Mobile</td>
                                            <td>10</td>
                                            <td>No Comment</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="setting" aria-labelledby="setting-tab">
                    <div class="card card-default card-fill">
                        <div class="card-header">
                            <h3 class="card-title">Edit Profile</h3>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                            <div class="card-body">
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
                            <form method="post" action="{{url('dashboard/employee/update')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name">Name <span class="req_star">*</span></label>
                                    <input type="text" name="name" value="{{$data->name}}" id="name" class="form-control">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
                                    <label for="designation">Designation <span class="req_star">*</span></label>
                                    <input type="text" name="designation" value="{{$data->designation}}" id="designation" class="form-control">
                                    @if ($errors->has('designation'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('designation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="office_id">Office Id</label>
                                    <input type="text" name="employee_id" value="{{$data->employee_id}}" id="employee_id" class="form-control" disabled>

                                </div>
                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone">Phone <span class="req_star">*</span></label>
                                    <input type="text" value="{{$data->phone}}" id="phone" name="phone" class="form-control">
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" value="{{$data->email}}" id="email" name="email" class="form-control">
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-12 control-label">Photo:</label>
                                    <div class="col-sm-5">
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
                                        @if($data->photo!='')
                                            <img class="table_image_100" src="{{asset('uploads/employee/'.$data->photo)}}" alt="photo"/>
                                        @else
                                            <img class="table_image_100" src="{{asset('uploads')}}/avatar-black.png" alt="photo"/>
                                        @endif
                                    </div>
                                </div>
                                <button class="btn btn-primary waves-effect waves-light w-md" type="submit">Save</button>
                            </form>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
