@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Product Stock</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Stock</a></li>
            <li class="active">{{$data->product_name}}</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> View Product Stock Information</h3>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{url('dashboard/product/stock')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Product Stock</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3" >
                      <div class="view_left_part" style="">
                        <div class="text-center">
                          @if($data->product_image!='')
                            <img src="{{asset('uploads/product/'.$data->product_image)}}" alt="product image" class=" view_left_part_image_100">
                          @else
                            <img src="{{asset('uploads/noimg.png')}}" alt="no-image" class=" view_left_part_image_100">
                          @endif
                          <h4>Product Name : {{$data->product_name}}</h4>
                          <h5>Category : {{$data->productCate->procate_name}} </h5>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-9">
                    @php
                        $productID=$data->product_id;
                        $allPurchase=App\ProductPurchase::where('purchase_status',1)->where('product_id',$productID)->get();
                    @endphp
                    <div class="table-responsive">
                      <table class="table table-bordered custom_table mb-0 table-striped">
                        <thead>
                          <tr>
                              <th>Purchase Date</th>
                              <th>Chalan</th>
                              <th>Product Quantity</th>
                              <th>Distribution</th>
                              <th>Damage</th>
                              <th>Stock </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($allPurchase as $buy)
                          <tr>
                              <td>{{$buy->purchase_date}}</td>
                              <td>{{$buy->purchase_chalan}}</td>
                              <td>{{$buy->purchase_quantity}}</td>
                              <td>
                                @php
                                    $chalan=$buy->purchase_chalan;
                                    $chalanDistribution=App\ProductDistribution::where('pd_status',1)->where('pd_chalan',$chalan)->sum('pd_quantity');
                                    echo $chalanDistribution;
                                @endphp
                              </td>
                              <td>
                                @php
                                    $chalanDamage=App\ProductDamage::where('damage_status',1)->where('damage_chalan',$chalan)->sum('damage_quantity');
                                    echo $chalanDamage;
                                @endphp
                              </td>
                              <td>
                                  @php
                                      $chalanDisDam=($chalanDistribution + $chalanDamage);
                                      $chalanStock=$buy->purchase_quantity - $chalanDisDam;
                                      echo $chalanStock;
                                  @endphp
                              </td>
                          </tr>
                          @endforeach
                        </tbody>
                        <tfoot style="font-weight:bold;">
                          <tr>
                              <td class="text-right" colspan="2">Total =</td>
                              <td>
                                @php
                                    $productID=$data->product_id;
                                    $totalProduct=App\ProductPurchase::where('purchase_status',1)->where('product_id',$productID)->sum('purchase_quantity');
                                    echo $totalProduct;
                                @endphp
                              </td>
                              <td>
                                @php
                                    $totalDistribution=App\ProductDistribution::where('pd_status',1)->where('product_id',$productID)->sum('pd_quantity');
                                    echo $totalDistribution;
                                @endphp
                              </td>
                              <td>
                                @php
                                    $totalDamage=App\ProductDamage::where('damage_status',1)->where('product_id',$productID)->sum('damage_quantity');
                                    echo $totalDamage;
                                @endphp
                              </td>
                              <td>
                                @php
                                    $totalDisDam=($totalDistribution+$totalDamage);
                                    $totalStock=$totalProduct-$totalDisDam;
                                    echo $totalStock;
                                @endphp
                              </td>
                          </tr>
                       </tfoot>
                      </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer card_footer_expode">
          <a href="#" class="btn btn-secondary waves-effect">PRINT</a>
          <a href="#" class="btn btn-warning waves-effect">EXCEL</a>
          <a href="#" class="btn btn-success waves-effect">PDF</a></div>
        </div>
    </div>
</div>
@endsection
