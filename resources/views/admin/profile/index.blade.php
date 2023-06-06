@extends('layouts.admin.layout')
@section('title')
<title>{{ $websiteLang->where('lang_key','my_profile')->first()->custom_text }}</title>
@endsection

@section('admin-content')


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
                        <h4 class="text-themecolor">Account  Details </h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Account Details</li>
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
                                    <center class="m-t-30"> <img src="{{ $admin->image ? url($admin->image) :  url($default_image->image) }}" class="img-circle" width="150" height="150" />
                                        <h4 class="card-title m-t-10">{{ $admin->name }}</h4>
                                        <!--<h6 class="card-subtitle"> Muppa</h6>-->
                                        <!--<h6 class="card-subtitle">Since, {{ date('M d , Y',strtotime($admin->created_at)) }} </h6>-->
                                     </center>
                                </div>
                                <hr>
                                <form action="{{ route('admin.update.password') }}" method="POST" enctype="multipart/form-data"> 
                                         @csrf
                                <div class="row m-t-10 ">
                                        <div class="col-md-12">
                                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">Change Password</a> </li>
                                    </ul>
                                                <!--<h6 style="margin:10px;"><a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">Change Password Information</a></h6>-->
                                            </div>
                                           
                                     </div>
                                   <div class="col-md-12"> <p style="padding: 10px; font-size: 12px; margin: 0px;" ><b style="font-weight:600">Note : </b>If you change your password, your account will be automatically logged out.</p></div>
                                      <div class="row border-pass">
                                          
                                          
                                              @foreach ($errors->all() as $error)
                                             <p class="text-danger"><small>{{ $error }}</small></p>
                                               @endforeach 
                                            <div class="col-md-12 col-lg-12">
                                                    <div class="form-group ">
                                                            <!--<label>Current Password</label>-->
                                                            <input type="password" name="current_password" class="form-control" placeholder="Enter Current Password ">
                                                        </div>
                                                </div>
                                                <div  class="col-md-12 col-lg-12">
                                                        <div class="form-group">
                                                                <!--<label>New Password</label>-->
                                                                <input type="password" name="password" class="form-control" placeholder="Enter New Password ">
                                                            </div>
                                                </div>
                                                <div  class="col-md-12 col-lg-12">
                                                        <div class="form-group ">
                                                                <!--<label>Conform  password</label>-->
                                                                <input type="password" name="confirm_password" class="form-control" placeholder="Enter Confirm Password">
                                                       </div>
                                                </div>
                                                
                                                  
                                            <div class="col-md-12">
                                                    <div class="rounded-button">
                                                              <button type="submit" class="btn btn-rounded btn-outline-primary  waves-effect waves-light">Change Password</button> 
                                              </div>
                                             </div>
                                      </div>
                                      </form>
                            </div>
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-8 col-xlg-9 col-md-7">
                            <div class="card">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs profile-tab" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">My Account</a> </li>
                                    </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home" role="tabpanel">
                                         <form action="{{ route('admin.myaccountUpdate') }}" method="POST" enctype="multipart/form-data"> 
                                         @csrf
                                        <div class="card-body">
                                                <div class="col-md-12">
                                                        <h6><strong>Account Information</strong></h6>
                                               
                                                 
                                                        <div class="row m-t-20">
                                                               <div class="form-group col-md-6 col-lg-6">
                                                                       <label style="font-weight:500">First Name </label>
                                                                       <input type="text"  class="form-control" placeholder="{{ $websiteLang->where('lang_key','name')->first()->custom_text }}" name="name" value="{{ $admin->name }}">
                                                                   </div>
                                                                  
                                                                           <div class="form-group col-md-6 col-lg-6">
                                                                                    <label style="font-weight:500">Phone No</label>
                                                                                     <input type="text" class="form-control" placeholder="{{ $websiteLang->where('lang_key','phone')->first()->custom_text }}" name="phone" value="{{ $admin->phone }}">
                                                                               </div>
                                                                         
                                                                             <div class="form-group col-md-6 col-lg-6">
                                                                                   <label style="font-weight:500">Address</label>
                                                                                     <input type="text" class="form-control" placeholder="Address" name="address" value="{{ $admin->address }}">
                                                                               </div>     
                                                                               <div class="form-group col-md-6 col-lg-6">
                                                                                       <label style="font-weight:500">Email </label>
                                                                                       
                                                                   <input type="email" class="form-control"  placeholder="{{ $websiteLang->where('lang_key','email')->first()->custom_text }}" name="email" value="{{ $admin->email }}" readonly>

                                                                                               <!--<div class="input-group-append"><span class="input-group-text">@gmail.com</span>-->
                                                                                               
                                                                                           
                                                                               </div>
                                                                              
                                                                                  
                                                                                       
                
                                                                   </div>
                                                                   <div class="row">
                                                                         <div class="col-md-12 m-t-10">
                                                                                              <label style="font-weight:500" class="m-b-10">Upload Image: </label> 
                                                                                                    <div  class="dropzone"> 
                                                                                                        <div class="fallback">
                                                                                                                <input name="profile_image" type="file" />
                                                                                                            </div>
                                                                                                        </div>
                                                                                       </div>
                                                                       </div>

                                                                             
                                                                           <div class="row">
                                                                               <div class="col-lg-12">
                                                                                  <button type="submit" class="btn btn-rounded btn-outline-primary  waves-effect waves-light">Save Changes</button>  
                                                                                </div>
                                                                            </div>

                                                                               
                                                     </div>
                                        </div>
                                     </form>
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
        <!-- ============================================================== -->
      <!-- Updates Model Pop Ups  -->
<div class="modal" id="exampleModal-34" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">Conformation Alert Password</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                        <p>Last Password was changed on Nov 14, 2022</p>
                  </div>
                <div class="modal-footer">
                        <div class="d-flex no-block align-items-center">
                                <a href="" class="btn btn-rounded btn-outline-primary  waves-effect waves-light"  data-bs-dismiss="modal">Cancel </a>
                      
                        </div>
               </div>
            </div>
        </div>
    </div>
    <!-- /.modal -->  
  
@endsection
<style>
    .border-pass
{
  border:1px solid #efefef;
  padding:10px;
  margin:10px;
}
</style>

