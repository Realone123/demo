@php
    $setting=App\Setting::first();
    $websiteLang=App\ManageText::all();
@endphp
@php
    $user=Auth::guard('web')->user();
    $default_image=App\BannerImage::find(15);
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
 <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/realoneinvest.png')}}" style="width:40px;height:40px;">
    <title>Realoneinvest</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <!--<link href="{{asset('assets/node_modules/morrisjs/morris.css')}}" rel="stylesheet">-->
    
    <link rel="stylesheet" href="{{asset('assets/node_modules/select2/dist/css/select2.min.css')}}" />
     <link rel="stylesheet" href="{{asset('assets/node_modules/html5-editor/bootstrap-wysihtml5.css')}}" />
    <!--Toaster Popup message CSS -->
    <link href="{{asset('assets/node_modules/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
   <script src="{{ asset('user/js/jquery-3.6.0.min.js') }}"></script> 
    <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/pages/tab-page.css')}}" rel="stylesheet">
    <link href="{{asset('assets/node_modules/wizard/steps.css')}}" rel="stylesheet">
     <link href="{{asset('assets/node_modules/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <!--<link href="{{asset('dist/css/pages/dashboard1.css')}}" rel="stylesheet">-->
    <!--<link href="{{asset('dist/css/pages/float-chart.css')}}" rel="stylesheet">-->
   <!-- Dropzone css -->
        <link href="{{asset('assets/node_modules/dropzone-master/dist/dropzone.css')}}" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" type="text/css"
    href="{{asset('assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{asset('assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<style>
    .sidebar-nav ul li ul li a {
    padding: 7px 11px 7px 15px ! important;
}
</style>
</head>

<body class="skin-blue fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Realoneinvest</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{route('user.dashboard')}}">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{asset('assets/images/logo-white.png')}}" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="{{asset('assets/images/realoneinvest.png')}}" alt="homepage" class="light-logo" style="width:45px ! important"/>
                        </b>
                        <!--End Logo icon -->
                        <span class="hidden-xs"><span class="font-bold"><img src="{{asset('assets/images/logo-white-1.png')}}" alt="logo" style="width:150px ! important"><!--Real--></span><!--oneinvest--></span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav me-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                  
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                   
                      
                        <!-- ============================================================== -->
                        <!-- End mega menu -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ $user->image ? url($user->image) : url($default_image->image) }}" alt="user" class=""> <span class="hidden-md-down">{{ $user->name }} &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                            <div class="dropdown-menu dropdown-menu-end animated flipInY">
                                <!-- text-->
                                <!--<a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>-->
                                  <!-- text-->
                                <!--<div class="dropdown-divider"></div>-->
                                <!-- text-->
                                <a href="{{ route('user.myaccount') }}" class="dropdown-item"><i class="ti-settings"></i> MyAccount</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="{{ route('logout') }}" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                                <!-- text-->
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End User Profile -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                       <li> <a class="{{ Route::is('user.dashboard') ? 'active' : '' }}" href="{{ route('user.dashboard') }}"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                    </li>
                  
                       <li> <a class="{{ Route::is('user.investnow') || Route::is('user.investprogress') || Route::is('user.investprogress2') || Route::is('user.investprogress3') || Route::is('user.investupdate2') || Route::is('user.investprogress3') || Route::is('user.search-property')   ? 'active' : '' }}" href="{{ route('user.investnow') }}"><i class="fas fa-chart-pie"></i><span class="hide-menu">Invest Now</span></a>
                        </li>
                        <li> <a class="{{ Route::is('user.past-offering') ? 'active' : '' }}" href="{{ route('user.past-offering') }}"><i class=" fas fa-chart-line"></i><span class="hide-menu">Past Offering</span></a>
                        </li>
                        <!--<li> <a class="{{ Route::is('user.MyInvestments') ? 'active' : '' }}" href="{{ route('user.MyInvestments') }}"><i class="ti-bar-chart-alt"></i><span class="hide-menu">My Investments</span></a>-->
                        <!--</li>-->
                        
                        
                        
                        
                       
                         <li> <a class="{{  Route::is('user.investdetails') ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false"><i class="ti-bar-chart-alt"></i><span class="hide-menu">My Investments</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a   href="{{ route('user.activeinvestments') }}">Active Investments</a></li>
                                <li><a href="{{ route('user.pendinginvestments') }}">Pending Investments</a></li>
                                 <li><a href="{{ route('user.rejectinvestments') }}">Reject Investments</a></li>
                                <li><a href="{{ route('user.pastinvestments') }}">Past Investments</a></li>
                                 
                           </ul>
                        </li>
                        
                        <li> <a class="{{ Route::is('user.updates') ? 'active' : '' }}" href="{{ route('user.updates') }}"><i class=" fas fa-bullhorn"></i><span class="hide-menu">Updates</span></a>
                        </li>
                        <!--<li> <a class=" waves-effect waves-dark" href="distributions.html"><i class="ti-layout"></i><span class="hide-menu">Distributions</span></a>-->
                        </li>
                        <li> <a class="{{ Route::is('user.documents') ? 'active' : '' }}" href="{{ route('user.documents') }}"><i class="ti-briefcase"></i><span class="hide-menu">Documents</span></a>
                        </li>
                        <li> <a class="{{ Route::is('user.profiles') ? 'active' : '' }}" href="{{ route('user.profiles') }}"><i class="ti-user"></i><span class="hide-menu">Profile</span></a>
                        </li>
                        <!--<li> <a class="waves-effect waves-dark" href="settings.html"><i class="ti-settings"></i><span class="hide-menu">Settings</span></a>-->
                        <!--</li>-->
                        <li> <a class="{{ Route::is('user.logout') ? 'active' : '' }}" href="{{ route('logout') }}"><i class=" ti-power-off"></i><span class="hide-menu"> Logout </span></a>
                        </li>
                        
                
                </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
