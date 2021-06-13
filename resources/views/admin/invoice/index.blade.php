@extends('layouts.admin')
@section('content')
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
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-right"><img src="{{asset('contents/admin')}}/assets/images/logo_dark.png" alt="moltran"></h4>
                    </div>
                    <div class="pull-right">
                        <h4>Invoice # <strong>2015-04-23654789</strong></h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-left m-t-30">
                            <address>
                              <strong>Twitter, Inc.</strong><br>
                              795 Folsom Ave, Suite 600<br>
                              San Francisco, CA 94107<br>
                              <abbr title="Phone">P:</abbr> (123) 456-7890
                              </address>
                        </div>
                        <div class="pull-right m-t-30">
                            <p><strong>Order Date: </strong> Jun 15, 2015</p>
                            <p class="m-t-10"><strong>Order Status: </strong> <span class="badge badge-pink">Pending</span></p>
                            <p class="m-t-10"><strong>Order ID: </strong> #123456</p>
                        </div>
                    </div>
                </div>
                <div class="m-h-50"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table m-t-30">
                                <thead>
                                    <tr><th>#</th>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Unit Cost</th>
                                    <th>Total</th>
                                </tr></thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>LCD</td>
                                        <td>Lorem ipsum dolor sit amet.</td>
                                        <td>1</td>
                                        <td>$380</td>
                                        <td>$380</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Mobile</td>
                                        <td>Lorem ipsum dolor sit amet.</td>
                                        <td>5</td>
                                        <td>$50</td>
                                        <td>$250</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>LED</td>
                                        <td>Lorem ipsum dolor sit amet.</td>
                                        <td>2</td>
                                        <td>$500</td>
                                        <td>$1000</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>LCD</td>
                                        <td>Lorem ipsum dolor sit amet.</td>
                                        <td>3</td>
                                        <td>$300</td>
                                        <td>$900</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Mobile</td>
                                        <td>Lorem ipsum dolor sit amet.</td>
                                        <td>5</td>
                                        <td>$80</td>
                                        <td>$400</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row" style="border-radius: 0px">
                    <div class="col-md-3 offset-md-9">
                        <p class="text-right"><b>Sub-total:</b> 2930.00</p>
                        <p class="text-right">Discout: 12.9%</p>
                        <p class="text-right">VAT: 12.9%</p>
                        <hr>
                        <h3 class="text-right">USD 2930.00</h3>
                    </div>
                </div>
                <hr>
                <div class="d-print-none">
                    <div class="pull-right">
                        <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                        <a href="#" class="btn btn-primary waves-effect waves-light">Submit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
