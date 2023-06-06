@extends('layouts.admin.layout')
@section('title')
<title>{{ $websiteLang->where('lang_key','property')->first()->custom_text }}</title>
@endsection
@section('admin-content')
<?php
$date1 = $updates->created_at;
$date2 = $date1->diff(date('Y-m-d'));
if($date2->y >1){
    
    $time="years ago";
}elseif($date2->m >1){
    $time="months ago";
}elseif($date2->d >1){
    $time="days ago";
}elseif($date2->h >1){
    $time="hours ago";
}elseif($date2->i >05){
    $time="minutes ago";
}elseif($date2->s >01){
    $time="seconds ago";
}
//echo $time; exit;
?>

 
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
                        <h4 class="text-themecolor">View Updates </h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active">View Updates</li>
                            </ol>
                          </div>
                    </div>
                </div>
              

                      <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                        <div class="profiletimeline">
                                            
                                                <div class="sl-item">
                                                    <div class="sl-left"> <img src="{{ url($updates->property->thumbnail_image) }}" alt="user" class="img-circle" /> </div>
                                                    <div class="sl-right">
                                                        <div><a href="javascript:void(0)" class="link">{{ $updates->property->title}}  </a> <span class="sl-date">{{ $time}} </span>
                                                     
                                                                 <div>   <p>
                                                                           {{ $updates->description}}         
                                                                    </p>
                                                                    </div>

                                                            <!--<div class="like-comm"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>-->
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <hr>
                                                
                                              
                                              
                                            </div>
                                </div>
                            </div>
                        </div>
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
        <!-- ============================================================== -->
 
  @endsection 