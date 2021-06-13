@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Product Distribution</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="{{url('dashboard/product/distribution')}}"> Distribution</a>  </li>
            <li class="active">view</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> View Product Distribution Information</h3>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{url('dashboard/product/requisition')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-plus-circle"></i> All Product Category</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <table class="table table-bordered table-striped table-hover custom_view_table">
                            <tr>
                                <td> ID</td>
                                <td>:</td>
                                <td>{{$data->pd_code}}</td>
                            </tr>
                            <tr>
                                <td>Delivary Date</td>
                                <td>:</td>
                                <td>{{$data->created_at->format('d-m-Y')}}</td>
                            </tr>
                            <tr>
                                <td>Product Name</td>
                                <td>:</td>
                                <td>{{$data->productInfo->product_name}}</td>
                            </tr>
                            
                            <tr>
                                <td>Employee Name</td>
                                <td>:</td>
                                <td>{{$data->employeeInfo->name}}</td>
                            </tr>
                            <tr>
                                <td>Product Quantity</td>
                                <td>:</td>
                                <td>{{$data->pd_quantity}}</td>
                            </tr>
                            <tr>
                                <td>Product Chalan</td>
                                <td>:</td>
                                <td>{{$data->pd_chalan}}</td>
                            </tr>
                            <tr>
                                <td>Product Status</td>
                                <td>:</td>
                                <td>
                                    @if($data->pd_status==1)
                                        <span class="text-success"><strong>Delivery Done</strong></span>
                                    @endif
                                </td>
                            </tr>
                            
                        </table>
                    </div>
                    <div class="col-md-2"></div>
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
@endsection
