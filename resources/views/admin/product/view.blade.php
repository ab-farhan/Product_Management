@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Product</h4>
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
                        <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> View Product Information</h3>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{url('dashboard/product')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-plus-circle"></i> All Product</a>
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
                                <td>Product Name</td>
                                <td>:</td>
                                <td>{{$data->product_name}}</td>
                            </tr>
                            <tr>
                                <td>Product Catergory</td>
                                <td>:</td>
                                <td>{{$data->productCate->procate_name}}</td>
                            </tr>
                            <tr>
                                <td>Product Details</td>
                                <td>:</td>
                                <td>{{$data->product_details}}</td>
                            </tr>
                            <tr>
                                <td>Product Remarks</td>
                                <td>:</td>
                                <td>{{$data->product_remarks}}</td>
                            </tr>
                            <tr>
                                <td>Product Image</td>
                                <td>:</td>
                                <td>
                                    @if($data->product_image!='')
                                        <img class="table_image_200" src="{{asset('uploads/product/'.$data->product_image)}}" alt="photo"/>
                                    @else
                                        <img class="table_image_200" src="{{asset('uploads')}}/avatar-black.png" alt="photo"/>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Creating Time</td>
                                <td>:</td>
                                <td>{{$data->created_at->format('d-m-Y | h:i:s a')}}</td>
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
