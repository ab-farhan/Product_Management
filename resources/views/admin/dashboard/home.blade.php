@extends('layouts.admin')
@section('content')
    @php
        $allUser=App\User::where('status',1)->count();
        $employee=App\Employee::where('employee_status',1)->count();
        $allProduct=App\Product::where('product_status',1)->count();
        $allCategory=App\ProductCategory::where('procate_status',1)->count();
        $allRequisition=App\ProductRequisition::where('pr_status',1)->count();
        $allDistribution=App\ProductDistribution::where('pd_status',1)->count();
        $allDamage=App\ProductDamage::where('damage_status',1)->count();
    @endphp
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Dashboard</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Home</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="mini-stat clearfix bx-shadow bg-white">
            <span class="mini-stat-icon bg-primary"><i class="md md-person"></i></span>
            <div class="mini-stat-info text-right text-dark mini_stat_info">
                <span class="counter text-dark">{{$allUser}}</span>
                Users
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="mini-stat clearfix bx-shadow bg-white">
            <span class="mini-stat-icon bg-primary"><i class="md md-account-child"></i></span>
            <div class="mini-stat-info text-right text-dark mini_stat_info">
                <span class="counter text-dark"> {{$employee}}
                </span>
                Employee
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="mini-stat clearfix bx-shadow bg-white">
            <span class="mini-stat-icon bg-primary"><i class="md md-stars"></i></span>
            <div class="mini-stat-info text-right text-dark mini_stat_info">
                <span class="counter text-dark">{{$allProduct}}</span>
                All Product
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="mini-stat clearfix bx-shadow bg-white">
            <span class="mini-stat-icon bg-primary"><i class="md md-explore"></i></span>
            <div class="mini-stat-info text-right text-dark mini_stat_info">
                <span class="counter text-dark">{{$allCategory}}</span>
                Product Category
            </div>
        </div>
    </div>
</div> <!-- End row-->
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="mini-stat clearfix bx-shadow bg-white">
            <span class="mini-stat-icon bg-primary"><i class="md md-explore"></i></span>
            <div class="mini-stat-info text-right text-dark mini_stat_info">
                <span class="counter text-dark">{{$allRequisition}}</span>
                Product Requisition
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="mini-stat clearfix bx-shadow bg-white">
            <span class="mini-stat-icon bg-primary"><i class="md md-explore"></i></span>
            <div class="mini-stat-info text-right text-dark mini_stat_info">
                <span class="counter text-dark">{{$allDistribution}}</span>
                Product Distribution
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="mini-stat clearfix bx-shadow bg-white">
            <span class="mini-stat-icon bg-primary"><i class="md md-explore"></i></span>
            <div class="mini-stat-info text-right text-dark mini_stat_info">
                <span class="counter text-dark">{{$allDamage}}</span>
                Product Distribution
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="mini-stat clearfix bx-shadow bg-white">
            <span class="mini-stat-icon bg-primary"><i class="md md-explore"></i></span>
            <div class="mini-stat-info text-right text-dark mini_stat_info">
                <span class="counter text-dark"></span>
                Product Stock
            </div>
        </div>
    </div>
</div>
@endsection
