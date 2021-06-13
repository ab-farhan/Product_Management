<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta content="" name="description" />
      <meta content="Uzzal" name="author" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Dashboard:: BNFE</title>
      <link rel="shortcut icon" href="{{asset('contents/admin')}}/assets/images/favicon_1.ico">
      <link href="{{asset('contents/admin')}}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="{{asset('contents/admin')}}/assets/css/icons.css" rel="stylesheet" type="text/css" />
      <link href="{{asset('contents/admin')}}/assets/css/moltran.css" rel="stylesheet" type="text/css" />
      <link href="{{asset('contents/admin')}}/assets/css/style.css" rel="stylesheet" type="text/css" />
      <script src="{{asset('contents/admin')}}/assets/js/modernizr.min.js"></script>
  </head>
  <body class="fixed-left">
      <div id="wrapper">
          <div class="topbar">
              <div class="topbar-left">
                  <div class="text-center">
                      <a href="{{url('dashboard')}}" class="logo"><img class="top_logo" src="{{asset('contents/admin')}}/assets/images/logo.png"/> <span>BNFE</span></a>
                  </div>
              </div>
              <nav class="navbar navbar-default">
                  <div class="container-fluid">
                      <ul class="list-inline menu-left mb-0">
                          <li class="float-left">
                              <a href="#" class="button-menu-mobile open-left">
                                  <i class="fa fa-bars"></i>
                              </a>
                          </li>
                          <li class="hide-phone float-left">
                              <form role="search" class="navbar-form">
                                  <input type="text" placeholder="Type here for search..." class="form-control search-bar">
                                  <a href="#" class="btn btn-search"><i class="fa fa-search"></i></a>
                              </form>
                          </li>
                      </ul>

                      <ul class="nav navbar-right float-right list-inline">
                          <li class="d-none d-sm-block">
                              <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                          </li>
                          <li class="dropdown d-none d-sm-block">
                              <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                  <i class="md md-notifications"></i> <span class="badge badge-pill badge-xs badge-danger">1</span>
                              </a>
                              <ul class="dropdown-menu dropdown-menu-lg">
                                  <li class="text-center notifi-title">Notification</li>
                                  <li class="list-group">
                                     <!-- list item-->
                                     <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                           <div class="media-left pr-2">
                                              <em class="fa fa-user-plus fa-2x text-info"></em>
                                           </div>
                                           <div class="media-body clearfix">
                                              <div class="media-heading">New user registered</div>
                                              <p class="m-0">
                                                 <small>You have 10 unread messages</small>
                                              </p>
                                           </div>
                                        </div>
                                     </a>
                                    <a href="javascript:void(0);" class="list-group-item">
                                      <small>See all notifications</small>
                                    </a>
                                  </li>
                              </ul>
                          </li>
                          <li class="dropdown open">
                              <a href="#" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{asset('contents/admin')}}/assets/images/users/avatar-1.jpg" alt="user-img" class="rounded-circle"> </a>
                              <ul class="dropdown-menu">
                                  <li><a href="{{url('dashboard/profile')}}" class="dropdown-item"><i class="md md-face-unlock mr-2"></i> Profile</a></li>
                                  <li><a href="javascript:void(0)" class="dropdown-item"><i class="md md-settings mr-2"></i> Settings</a></li>
                                  <li><a href="javascript:void(0)" class="dropdown-item"><i class="md md-lock mr-2"></i> Lock screen</a></li>
                                  <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item"><i class="md md-settings-power mr-2"></i> Logout</a></li>
                              </ul>
                          </li>
                      </ul>
                  </div>
              </nav>
          </div>
          <div class="left side-menu">
              <div class="sidebar-inner slimscrollleft">
                  <div class="user-details">
                      <div class="pull-left">
                          <img src="{{asset('contents/admin')}}/assets/images/users/avatar-1.jpg" alt="" class="thumb-md rounded-circle">
                      </div>
                      <div class="user-info">
                          <div class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  {{Auth::user()->name}}
                              </a>
                              <ul class="dropdown-menu">
                                  <li><a href="{{url('dashboard/profile')}}" class="dropdown-item"><i class="md md-face-unlock mr-2"></i> Profile<div class="ripple-wrapper"></div></a></li>
                                  <li><a href="javascript:void(0)" class="dropdown-item"><i class="md md-settings mr-2"></i> Settings</a></li>
                                  <li><a href="javascript:void(0)" class="dropdown-item"><i class="md md-lock mr-2"></i> Lock screen</a></li>
                                  <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item"><i class="md md-settings-power mr-2"></i> Logout</a></li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <div id="sidebar-menu">
                      <ul>
                          <li><a href="{{url('dashboard')}}" class="waves-effect"><i class="md md-home"></i><span> Dashboard </span></a></li>
                          <li><a href="{{url('dashboard/account/profile')}}" class="waves-effect"><i class="md md-account-box"></i><span> My Account </span></a></li>
                          @if(Auth::user()->role_id==1)
                          <li><a href="{{url('dashboard/user')}}" class="waves-effect"><i class="md md-person"></i><span> Users </span></a></li>
                          @endif
                          @if(Auth::user()->role_id<=4)
                          <li class="has_sub">
                              <a href="#" class="waves-effect"><i class="md md-settings"></i><span> Manage </span><span class="pull-right"><i class="md md-add"></i></span></a>
                              <ul class="list-unstyled">
                                  <li><a href="#">Basic Information</a></li>
                                  <li><a href="#">Social Media</a></li>
                                  <li><a href="#">Contact Information</a></li>
                              </ul>
                          </li>
                          @endif
                          @if(Auth::user()->role_id==1)
                          <li><a href="{{url('dashboard/employee')}}" class="waves-effect"><i class="md md-account-box"></i><span> Employee </span></a></li>
                          @endif
                          @if(Auth::user()->role_id==1)
                          <li><a href="{{url('dashboard/product/requisition')}}" class="waves-effect"><i class="md md-cloud-download"></i><span> Product Requisition</span></a></li>
                          @endif
                          @if(Auth::user()->role_id==1)
                          <li><a href="{{url('dashboard/product/distribution')}}" class="waves-effect"><i class="md md-now-widgets"></i><span> Product Distribution</span></a></li>
                          @endif
                          @if(Auth::user()->role_id==1)
                          <li><a href="{{url('dashboard/product')}}" class="waves-effect"><i class="md md-local-play"></i><span> Product </span></a></li>
                          @endif
                          @if(Auth::user()->role_id==1)
                          <li><a href="{{url('dashboard/product/category')}}" class="waves-effect"><i class="md md-layers"></i><span> Product Category </span></a></li>
                          @endif
                          @if(Auth::user()->role_id==1)
                          <li><a href="{{url('dashboard/product/purchase')}}" class="waves-effect"><i class="md md-camera"></i><span> Product Purchase</span></a></li>
                          @endif
                          @if(Auth::user()->role_id==1)
                          <li><a href="{{url('dashboard/product/damage')}}" class="waves-effect"><i class="fa fa-gratipay"></i><span> Product Damage</span></a></li>
                          @endif
                          @if(Auth::user()->role_id==1)
                          <li><a href="{{url('dashboard/product/stock')}}" class="waves-effect"><i class="fa fa-database"></i><span> Product Stock</span></a></li>
                          @endif
                          <li><a href="{{url('dashboard/recycle')}}" class="waves-effect"><i class="md md-delete"></i><span>Recycle Bin </span></a></li>
                          <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="waves-effect"><i class="md md-settings-power"></i><span> Logout</span></a></li>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </ul>
                      <div class="clearfix"></div>
                  </div>
                  <div class="clearfix"></div>
              </div>
          </div>
          <div class="content-page">
              <div class="content">
                  <div class="container-fluid">
                      @yield('content')
                  </div>
              </div>
              <footer class="footer">
                  Copyright © 2021 Dashboard Development by Creative System Limited.
              </footer>
          </div>
      </div>
      <script>
          var resizefunc = [];
      </script>
      <script src="{{asset('contents/admin')}}/assets/js/jquery.min.js"></script>
      <script src="{{asset('contents/admin')}}/assets/js/bootstrap.bundle.min.js"></script>
      <script src="{{asset('contents/admin')}}/assets/js/detect.js"></script>
      <script src="{{asset('contents/admin')}}/assets/js/fastclick.js"></script>
      <script src="{{asset('contents/admin')}}/assets/js/jquery.slimscroll.js"></script>
      <script src="{{asset('contents/admin')}}/assets/js/jquery.blockUI.js"></script>
      <script src="{{asset('contents/admin')}}/assets/js/waves.js"></script>
      <script src="{{asset('contents/admin')}}/assets/js/wow.min.js"></script>
      <script src="{{asset('contents/admin')}}/assets/js/jquery.nicescroll.js"></script>
      <script src="{{asset('contents/admin')}}/assets/js/jquery.scrollTo.min.js"></script>
      <script src="{{asset('contents/admin')}}/assets/js/bootstrap-datepicker.js"></script>
      <script src="{{asset('contents/admin')}}/plugins/moment/moment.min.js"></script>
      <script src="{{asset('contents/admin')}}/plugins/waypoints/lib/jquery.waypoints.js"></script>
      <script src="{{asset('contents/admin')}}/plugins/counterup/jquery.counterup.min.js"></script>
      <script src="{{asset('contents/admin')}}/plugins/flot-chart/jquery.flot.min.js"></script>
      <script src="{{asset('contents/admin')}}/plugins/flot-chart/jquery.flot.time.js"></script>
      <script src="{{asset('contents/admin')}}/plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
      <script src="{{asset('contents/admin')}}/plugins/flot-chart/jquery.flot.resize.js"></script>
      <script src="{{asset('contents/admin')}}/plugins/flot-chart/jquery.flot.pie.js"></script>
      <script src="{{asset('contents/admin')}}/plugins/flot-chart/jquery.flot.selection.js"></script>
      <script src="{{asset('contents/admin')}}/plugins/flot-chart/jquery.flot.stack.js"></script>
      <script src="{{asset('contents/admin')}}/plugins/flot-chart/jquery.flot.crosshair.js"></script>
      <script src="{{asset('contents/admin')}}/assets/pages/jquery.todo.js"></script>
      <script src="{{asset('contents/admin')}}/assets/pages/jquery.dashboard.js"></script>
      <script src="{{asset('contents/admin')}}/assets/js/jquery.app.js"></script>
      <script src="{{asset('contents/admin')}}/assets/js/custom.js"></script>
  </body>
</html>
