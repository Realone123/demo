@extends('layouts.admin.layout')
@section('title')
<title>{{ $websiteLang->where('lang_key','property')->first()->custom_text }}</title>
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
                        <h4 class="text-themecolor"><a href="{{ route('admin.email.index') }}"><i class=" fas fa-arrow-left"></i> Back</a></h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active"><a href="">Email</a></li>
                            </ol>
                         <!--   <a href="add-email.html" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle  padd5"></i>Add Email</a>
                         -->
                          </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
           
         
                <!-- ============================================================== -->
                <!-- End Info box -->
                <!-- ============================================================== -->
   <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                        <div class="col-12">
                            <div class="card m-b-0">
                                <!-- .chat-row -->
                                <div class="chat-main-box">
                                    <!-- .chat-left-panel -->
                                    <div class="chat-left-aside">
                                        <div class="open-panel"><i class="ti-angle-right"></i></div>
                                        <div class="chat-left-inner">
                                            <!--<div class="form-material">
                                                <input class="form-control p-2" type="text" placeholder="Search Contact">
                                            </div>-->
                                            
                                            <ul class="chatonline style-none ">
                                                
                                                @foreach ($receipts as $index => $item)
                                                <li>
                                                    <a href="javascript:void(0)"><img @if($item->image) src="{{ url($item->image)  }}"  @else src="{{asset('assets/images/users/user1.jpg')}}" @endif alt="user-img" class="img-circle"> <span>{{ $item->user->name}} </span>
                                                  
                                                </a>
                                                </li>
                                                @endforeach
                                               
                                            </ul>
                                           
                                        </div>
                                     <!--   <div class="list-group b-0 mail-list">
                                                <a href="javascript:void(0)" class="list-group-item">
                                                <span class="fa fa-circle text-info m-r-10"></span>Work</a>
                                                <a href="javascript:void(0)" class="list-group-item"><span class="fa fa-circle text-warning m-r-10"></span>Family</a>
                                                <a href="javascript:void(0)" class="list-group-item"><span class="fa fa-circle text-purple m-r-10"></span>Private</a>
                                                <a href="javascript:void(0)" class="list-group-item"><span class="fa fa-circle text-danger m-r-10"></span>Friends</a> 
                                                <a href="javascript:void(0)" class="list-group-item"><span class="fa fa-circle text-success m-r-10"></span>Corporate</a>
                                                </div>-->
                                    </div>
                                    <!-- .chat-left-panel -->
                                    <!-- .chat-right-panel -->
                                    <div class="chat-right-aside">
                                       
                                        <div class="chat-rbox">
                                                <div class="card-body p-t-0">
                                                        <div class="card b-all shadow-none">
                                                            <div class="card-body">
                                                                <h3 class="card-title m-b-0">Subject :{{ $emails->subject}}</h3>
                                                            </div>
                                                            <div>
                                                                <hr class="m-t-0" style="margin:7px;">
                                                            </div>
                                                            <div class="card-body">
                                                                
                                                                 {!! clean($emails->message) !!}  
                                                                </div>
                                                            <div>
                                                                <hr class="m-t-0">
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                            
                                            </div>
                                       
                                    </div>
                                    <!-- .chat-right-panel -->
                                </div>
                                <!-- /.chat-row -->
                            </div>
                        </div>
                    </div>
                 <!-- ============================================================== -->
                <!-- .right-sidebar -->
                           <!-- .right-sidebar -->
                     
            
             
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
       

        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
       
  @endsection 