@extends('layouts.user.profile.layout')
@section('title')
    <title>{{ $websiteLang->where('lang_key','dashboard')->first()->custom_text }}</title>
@endsection

@section('user-dashboard')
            <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">MY INVESTMENTS</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{route('user.activeinvestments')}}">My Investments</a></li>
                                <li class="breadcrumb-item active">Rejected Investments</li>
                            </ol>
                          </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
                <!--.row -->
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Active Offerings</h5>
                                <div class="d-flex align-items-center no-block">
                                    <h3 class="mar0"><i class="ti-home text-info"></i></h3>
                                    <div class="ms-auto">
                                        <h3 class="text-info mar0">{{ $MyActiveInvestments->groupby('property_id')->count() }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Total Active Investment</h5>
                                <div class="d-flex align-items-center no-block">
                                    <h3 class="mar0"><i class="fas fa-hand-holding-usd text-danger"></i></h3>
                                    <div class="ms-auto">
                                        <h3 class="text-danger mar0">$ {{ $MyActiveInvestments->sum('investment_amount') }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Pending Offerings</h5>
                                <div class="d-flex align-items-center no-block">
                                    <h3 class="mar0"><i class="far fa-chart-bar text-success"></i></h3>
                                    <div class="ms-auto">
                                        <h3 class="text-success mar0">{{ $MyPendingInvestments->count() }} </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase"> Pending Investment</h5>
                                <div class="d-flex align-items-center no-block">
                                    <h3 class="mar0"><i class="fas fa-chart-pie text-warning"></i></h3>
                                    <div class="ms-auto">
                                        <h3 class="text-warning mar0">$ {{ $MyPendingInvestments->sum('investment_amount') }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-uppercase">Past Offerings</h5>
                                    <div class="d-flex align-items-center no-block">
                                        <h3 class="mar0"><i class="fas fa-chart-line text-success"></i></h3>
                                        <div class="ms-auto">
                                            <h3 class="text-success mar0">{{ $MyPastInvestments->count() }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
               

                        <div class="col-lg-3 col-sm-6 col-xs-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-uppercase">Total Invested</h5>
                                        <div class="d-flex align-items-center no-block ">
                                            <h3 class="mar0"><i class=" fas fa-donate text-warning"></i></h3>
                                            <div class="ms-auto">
                                                <h3 class=" text-warning mar0">${{ $totalinvestments->sum('investment_amount') }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-xs-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title text-uppercase ">Total Earnings</h5>
                                            <div class="d-flex align-items-center no-block">
                                                <h3 class="mar0"><i class=" fas fa-chart-area text-info"></i></h3>
                                                <div class="ms-auto">
                                                    <h3 class="text-info mar0">$0</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-xs-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title text-uppercase">Total Returns</h5>
                                                <div class="d-flex align-items-center no-block ">
                                                    <h3 class="mar0"><i class="far fa-file-alt text-danger"></i></h3>
                                                    <div class="ms-auto">
                                                        <h3 class="text-danger mar0">$0</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                </div>
                <!-- /.row -->

     <!-- row -->
  <div class="row">
      <div class="col-md-12">
            <div class="card">
                <div class="card-body p-b-0">
                    <!--<h4 class="card-title"> MY INVESTMENTS</h4>-->
                    <ul class="nav nav-tabs customtab">
                        <li class="nav-item"> <a class="nav-link active">
                            <span class="hidden-sm-up"></span> <span class="hidden-xs-down">
                                Rejected Investments</span></a> </li>
                        </ul>

                </div>
            </div>
        </div>
    </div>
                    <!-- Tab panes -->
                    <div class="tab-content">
                                   <!-- .row -->
                    <div class="row ">
                        @if(count($rejectInvestments)>0)
                            @foreach($rejectInvestments as $item) 
                                 <!-- item -->
                            <div class="col-lg-4 col-md-6">
                                    <div class="card border-view-1">
                                        <img class="card-img-top" src="@if($item->property->thumbnail_image) {{  url($item->property->thumbnail_image)   }}@endif" alt="Card image cap">
                                        <div class="card-img-overlay">
                                           <span class="badge bg-danger rounded-pill">Fully Funded</span>
                                        </div>
                                        <div class="card-body bg-light">
                                            <h4 class="card-title invest-align">{{ $item->property->title }}</h4>
                                        </div>
                                        <div class="card-body border-top">
                                            <div class="d-flex no-block align-items-center">
                                               <span class="p-10 text-muted">Invested Amount </span>
                                                <span class="ms-auto  pull-right">${{ $item->investment_amount }}</span>
                                            </div>
                                            <div class="d-flex no-block align-items-center">
                                              <span class="p-10 text-muted"> Rejected Date</span>
                                                <span class="ms-auto  pull-right"> @if($item->date)  {{ date('M d , Y',strtotime($item->date)) }} @else {{ date('M d , Y',strtotime($item->created_at)) }} @endif</span>
                                            </div>
                                            <div class="d-flex no-block align-items-center">
                                                 <span class="p-10 text-muted">Status</span>
                                                <span class="ms-auto color-view pull-right">{{ $item->status }}</span>
                                            </div>
                                            <div class="d-flex no-block align-items-center">
                                                    <span class="p-10 text-muted">Expected Returns</span>
                                                   <span class="ms-auto pull-right">{{ $item->property->expected_return }}</span>
                                               </div>
                                               <div class="d-flex no-block align-items-center">
                                                    <span class="p-10 text-muted"> Total Earnings</span>
                                                   <span class="ms-auto  pull-right">  0</span>
                                               </div>
                                            
                                        </div>
                                        <div class="card-body border-top">
                                                <a href="" target="_blank">
                                                     <div class="d-flex no-block align-items-center">
                                                  <h6 class="text-muted"><i class="ti-location-pin"></i> {{ $item->property->address.', '.$item->property->city->name }} </h6>
                                            </div>
                                        </a>
                                        </div>
                                        <div class="card-body border-top">
                                                <div class="d-flex no-block align-items-center">
                                                        <a href="invest-details/{{$item->id}}" class="btn btn-rounded btn-outline-primary  waves-effect waves-light ">View Details </a>
                                                        <a href="view-updates/{{$item->id}}" class="btn btn-rounded btn-outline-primary  waves-effect waves-light ">View Updates</a>  
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <!-- /item -->
                            @endforeach
                       @else
                           <div class="col-md-lg col-md-12">
                                <p style="text-align:center">No Record found</p>
                                </div>
                       @endif
                       
                  
                        </div>
                        <!-- /.row -->
                        
                         </div>
               
    <!-- row -->

           
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->

     


@endsection
