@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Product purchase</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Home</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> All Product Purches Information</h3>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{url('dashboard/product/purchase/add')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-plus-circle"></i> Add Purchase</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
            <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-7">
                        @if(Session::has('success_soft'))
                          <div class="alert alert-success alertsuccess" role="alert">
                             <strong>Success!</strong> Product purchase delete  success.
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
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered custom_table mb-0">
                                <thead>
                                    <tr>

                                        <th>Product Name</th>
                                        <th>Brand</th>
                                        <th>Supplier</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Total Price</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all as $data)
                                    <tr>
                                        <td>{{$data->proPurchase->product_name}}</td>
                                        <td>{{$data->purchase_brand}}</td>
                                        <td>{{$data->purchase_supplier}}</td>
                                        <td>{{$data->purchase_quantity}}</td>
                                        <td>{{$data->purchase_unit_price}}</td>
                                        <td>{{$data->purchase_total_price}}</td>

                                        <td>
                                            <a href="{{url('dashboard/product/purchase/view/'.$data->purchase_slug)}}"><i class="fa fa-plus-square fa-lg view_icon"></i></a>
                                            <a href="{{url('dashboard/product/purchase/edit/'.$data->purchase_slug)}}"><i class="fa fa-pencil-square fa-lg edit_icon"></i></a>
                                            <a href="javaScript:void(0)" title="delete" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{$data->purchase_id}}"><i class="fa fa-trash fa-lg delete_icon"></i></a>
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
            <form method="post" action="{{url('dashboard/product/purchase/softdelete')}}">
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
