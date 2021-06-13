@extends('layouts.admin')
@section('content')
    @php
        $totalUser=App\User::where('status',0)->count();
        $totalEmployee=App\Employee::where('employee_status',0)->count();
        $totalProduct=App\Product::where('product_status',0)->count();
        $totalProCate=App\ProductCategory::where('procate_status',0)->count();
        $totalPurchase=App\ProductPurchase::where('purchase_status',0)->count();
        $totalRequisition=App\ProductRequisition::where('pr_status',0)->count();
        $totalDistribution=App\ProductDistribution::where('pd_status',0)->count();
        $totalDamage=App\ProductDamage::where('damage_status',0)->count();
    @endphp
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Recycle</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Recycle</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-xl-3">
        <a href="{{url('dashboard/recycle/user')}}">
          <div class="mini-stat clearfix bx-shadow bg-white">
              <span class="mini-stat-icon bg-primary"><i class="md md-person"></i></span>
              <div class="mini-stat-info text-right text-dark mini_stat_info">
                  
                  <span class="counter text-dark">{{$totalUser}}</span>
                  Users
              </div>
          </div>
        </a>
    </div>
    <div class="col-md-6 col-xl-3">
        <a href="{{url('dashboard/recycle/employee')}}">
          <div class="mini-stat clearfix bx-shadow bg-white">
              <span class="mini-stat-icon bg-primary"><i class="md md-panorama"></i></span>
              <div class="mini-stat-info text-right text-dark mini_stat_info">
                <span class="counter text-dark">
                    {{$totalEmployee}}
                  </span>
                  Employee
              </div>
          </div>
        </a>
    </div>
    <div class="col-md-6 col-xl-3">
        <a href="{{url('dashboard/recycle/product')}}">
          <div class="mini-stat clearfix bx-shadow bg-white">
              <span class="mini-stat-icon bg-primary"><i class="md md-contacts"></i></span>
              <div class="mini-stat-info text-right text-dark mini_stat_info">
                  <span class="counter text-dark">{{$totalProduct}}</span>
                  Product
              </div>
          </div>
        </a>
    </div>
    <div class="col-md-6 col-xl-3">
        <a href="{{url('dashboard/recycle/product/category')}}">
          <div class="mini-stat clearfix bx-shadow bg-white">
              <span class="mini-stat-icon bg-primary"><i class="md md-view-carousel"></i></span>
              <div class="mini-stat-info text-right text-dark mini_stat_info">
                  <span class="counter text-dark">{{$totalProCate}}</span>
                  Product Category
              </div>
          </div>
        </a>
    </div>
</div> <!-- End row-->
<div class="row">
    <div class="col-md-6 col-xl-3">
        <a href="{{url('dashboard/recycle/product/purchase')}}">
          <div class="mini-stat clearfix bx-shadow bg-white">
              <span class="mini-stat-icon bg-primary"><i class="md md-view-carousel"></i></span>
              <div class="mini-stat-info text-right text-dark mini_stat_info">
                  <span class="counter text-dark">{{$totalPurchase}}</span>
                  Product Purchase
              </div>
          </div>
        </a>
    </div>
    <div class="col-md-6 col-xl-3">
        <a href="{{url('dashboard/recycle/product/requisition')}}">
          <div class="mini-stat clearfix bx-shadow bg-white">
              <span class="mini-stat-icon bg-primary"><i class="md md-view-carousel"></i></span>
              <div class="mini-stat-info text-right text-dark mini_stat_info">
                  <span class="counter text-dark">{{$totalRequisition}}</span>
                  Product Requisition
              </div>
          </div>
        </a>
    </div>
    <div class="col-md-6 col-xl-3">
        <a href="{{url('dashboard/recycle/product/distribution')}}">
          <div class="mini-stat clearfix bx-shadow bg-white">
              <span class="mini-stat-icon bg-primary"><i class="md md-view-carousel"></i></span>
              <div class="mini-stat-info text-right text-dark mini_stat_info">
                  <span class="counter text-dark">{{$totalDistribution}}</span>
                  Product Distribution
              </div>
          </div>
        </a>
    </div>
    <div class="col-md-6 col-xl-3">
        <a href="{{url('dashboard/recycle/product/distribution')}}">
          <div class="mini-stat clearfix bx-shadow bg-white">
              <span class="mini-stat-icon bg-primary"><i class="md md-view-carousel"></i></span>
              <div class="mini-stat-info text-right text-dark mini_stat_info">
                  <span class="counter text-dark">{{$totalDamage}}</span>
                  Product Damage
              </div>
          </div>
        </a>
    </div>
</div>
@endsection
