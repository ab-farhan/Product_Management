@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Distribution</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li class="active">distribution</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> All Product Distribution Information</h3>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{url('#')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-plus-circle"></i> Link</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                    @if(Session::has('success_soft'))
                        <div class="alert alert-success alertsuccess" role="alert">
                            <strong>Success!</strong> Product distribution delete  success.
                        </div>
                    @endif
                    @if(Session::has('error'))
                        <div class="alert alert-warning alerterror" role="alert">
                            <strong>Opps!</strong> please try again.
                        </div>
                    @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered custom_table mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Delivery Date</th>
                                        <th>Employee</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all as $data)
                                    <tr>
                                        <td>{{$data->pd_code}}</td>
                                        <td>{{$data->created_at->format('d-m-Y')}}</td>
                                        <td>{{$data->employeeInfo->name}}</td>
                                        <td>{{$data->productInfo->product_name}}</td>
                                        <td>{{$data->pd_quantity}}</td>
                                        <td>
                                            @if($data->pd_status==1)
                                              <span class="text-success"><strong>Delivery Done</strong></span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('dashboard/product/distribution/view/'.$data->pd_slug)}}"><i class="fa fa-plus-square fa-lg view_icon"></i></a>
                                            <a href="#" title="delete" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{$data->pd_id}}"><i class="fa fa-trash fa-lg delete_icon"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer card_footer_expode">
                <a href="#" class="btn btn-secondary waves-effect">PRINT</a>
                <a href="#" class="btn btn-warning waves-effect">EXCEL</a>
                <a href="#" class="btn btn-success waves-effect">PDF</a>
            </div>
        </div>
    </div>
</div>
<!--Delete Modal Information-->
<div id="softDelModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog">
        <div class="modal-content p-0 b-0">
            <form method="post" action="{{url('dashboard/product/distribution/softdelete')}}">
              @csrf
              <div class="card mb-0">
                <div class="card-header">
                    <h3 class="card-title float-left"><i class="fa fa-gg-circle"></i> Confirm Message</h3>
                </div>
                <div class="card-body modal_card">
                  Are you sure you want to delete?
                  <input type="hidden" id="modal_id" name="modal_id">
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-sm btn-dark waves-effect">Confirm</button>
                    <button type="button" class="btn btn-sm btn-danger waves-effect" data-dismiss="modal">Close</button>
                </div>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection
