@extends('layouts.user.profile.layout')
@section('title')
    <title>{{ $websiteLang->where('lang_key','dashboard')->first()->custom_text }}</title>
@endsection

@section('user-dashboard')



        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">


            <div class="container-fluid">
               
                   <div class="row">
                        <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                        <div class="col-md-8 col-sm-8">
                                   
                                                <h4 class="card-title"><a href="realinvest.html">Distributions</a>
                                              
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                    <div class="header-right">
                                                            <div class="dropdown custom-dropdown">
                                                                    <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="dropdown">ALL Offerings <i class="fa fa-angle-down m-l-5"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="#">Name</a>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                </div>
                                                <div class="col-md-2 col-sm-2">
                                                        <div class="header-right">
                                                                <div class="dropdown custom-dropdown">
                                                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="dropdown">ALL Profiles <i class="fa fa-angle-down m-l-5"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="#">No Options</a>
                                                                           
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                    </div>
                                            
                                            </div>
                                       </div>
                                </div>

                                <div class="col-md-12 padd0">
                                        <div class="card">
                                                <div class="card-body">
                                                   <p>No Distributions!</p>    
                                                 </div>
                                          </div>  
                                </div>


                        </div>
         </div>
                </div>
                    
                    
                </div>

   @endsection     
