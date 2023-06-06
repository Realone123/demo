@extends('layouts.admin.layout')
@section('title')
<title>{{ $websiteLang->where('lang_key','agent')->first()->custom_text }}</title>

@endsection
@section('admin-content')

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
                        <h4 class="text-themecolor"><a href="{{route('admin.leads')}}"><i class=" fas fa-arrow-left"></i> Back</a> </h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        
                          </div>
                    </div>
                </div>
              

                      <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                  <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                        <!-- Column -->
                        <div class="col-lg-4 col-xlg-3 col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <center class="m-t-30"> <img src="{{ $user->image ? url($user->image) : url($default_image->image) }}" class="img-circle" width="150" />
                                        <h4 class="card-title m-t-10">{{ $user->name }}</h4>
                                        <h6 class="card-subtitle"></h6>
                                      
                                    </center>
                                      <div class="row" style="padding:12px">
                                            <div class="col-12"><a href="javascript:void(0)" class="link">Total Properties: <font class="font-medium">{{ $totalinvestments->count() }}</font></a></div>
                                            <div class="col-12"><a href="javascript:void(0)" class="link">Total Invested:  <font class="font-medium">${{ $totalinvestments->sum('investment_amount') }}</font></a></div>
                                        </div>
                                </div>
                                <div>
                                    <hr>
                                </div>
                                <div class="card-body" style="padding:1.3rem ! important">
                                     <small class="text-muted">Email address </small>
                                    <h6>{{ $user->email }}</h6>
                                     <small class="text-muted p-t-30 db">Phone</small>
                                    <h6>{{ $user->phone }}</h6>
                                     
                                    <small class="text-muted p-t-30 db">Address</small>
                                    <h6>{{ $user->address }}</h6>
                                 
                                </div>

                                <!--<div class="col-lg-12">-->
                                <!--        <div class="card">-->
                                <!--                <div class="card-body">-->
                                <!--                        <h4 class="card-title"style="margin:10px;">Chart</h4>-->
                                <!--                        <div class="flot-chart" style="margin:10px;">-->
                                <!--                            <div class="flot-chart-content" id="flot-bar-chart"></div>-->
                                <!--                        </div>-->
                                <!--                    </div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                

                            </div>
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-8 col-xlg-9 col-md-7">
                            <div class="card">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs profile-tab" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">Bank Accounts</a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">Accreditations</a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#Updates" role="tab">Updates</a> </li>
                                    </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home" role="tabpanel">
                                        <div class="card-body">
                                         <p class="" style="text-align:center;padding:30px;">No Bank Account Created! </p>
                                        </div>
                                        
                                    </div>
                                    <!--second tab-->
                                    <div class="tab-pane" id="profile" role="tabpanel">
                                        <div class="card-body">
                                          <p style="text-align:center;padding:30px;">No Accreditation Available</p>
                                        </div>
                                    </div>
                                    <!--#3 rd -->
                                    <div class="tab-pane" id="Updates" role="tabpanel">
                                            <div class="card-body">
                                                    <div class="profiletimeline">
                                                         @foreach($updates as $item)
                                                            <div class="sl-item">
                                                                <div class="sl-left"> <img src="{{ url($item->thumbnail_image) }}" alt="user" class="img-circle" /> </div>
                                                                <div class="sl-right">

                                                                    <div><a href="javascript:void(0)" class="link">{{ $item->title }}</a> <span class="sl-date">{{ date('M d',strtotime($item->created_at)) }}</span>
                                                                  
                                                                                <p>
                                                                                       {{ $item->description }}   
                                                                                </p>
            
                                                                       
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                          @endforeach 
                                                          
                                                        </div>
                                            </div>
                                        </div>
                             
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                    </div>
                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->

               







          
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        

    
@endsection
