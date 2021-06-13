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
                                <td>{{$data->proPurchase->product_name}}</td>
                            </tr>
                            <tr>
                                <td>Product Quantity</td>
                                <td>:</td>
                                <td>{{$data->purchase_quantity}}</td>
                            </tr>
                            <tr>
                                <td>Porducts Unit Price</td>
                                <td>:</td>
                                <td>{{$data->purchase_unit_price}}</td>
                            </tr>
                            <tr>
                                <td>Porducts Sub Price</td>
                                <td>:</td>
                                <td>{{$data->purchase_sub_price}}</td>
                            </tr>
                            <tr>
                                <td>Porducts Discount </td>
                                <td>:</td>
                                <td>{{$data->purchase_discount}}</td>
                            </tr>
                            <tr>
                                <td> Total Price </td>
                                <td>:</td>
                                <td>{{$data->purchase_total_price}}</td>
                            </tr>
                            <tr>
                                <td> Purchase Date </td>
                                <td>:</td>
                                <td>{{$data->purchase_date}}</td>
                            </tr>
                            <tr>
                                <td> Brand Name  </td>
                                <td>:</td>
                                <td>{{$data->purchase_brand}}</td>
                            </tr>
                            <tr>
                                <td> Supplier </td>
                                <td>:</td>
                                <td>{{$data->purchase_supplier}}</td>
                            </tr>
                            <tr>
                                <td> Chalan No </td>
                                <td>:</td>
                                <td>{{$data->purchase_chalan}}</td>
                            </tr>
                            <tr>
                                <td> Voucher No </td>
                                <td>:</td>
                                <td>{{$data->purchase_voucher}}</td>
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
