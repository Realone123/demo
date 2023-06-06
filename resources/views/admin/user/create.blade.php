@extends('layouts.admin.layout')
@section('title')
<title>Add Investor</title>
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
                        <h4 class="text-themecolor"><a href="{{ route('admin.agents') }}"><i class=" fas fa-arrow-left"></i> Back</a> </h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Add Investors</li>
                            </ol>
                           
                          </div>
                    </div>

                   
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                 
 <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">

                                                <form action="{{ route('admin.store-investor') }}" method="POST">
                                                     @csrf
                                                  
                                                   @foreach ($errors->all() as $error)
                                             <p class="text-danger"><small>{{ $error }}</small></p>
                                               @endforeach
                                                  
                                                  
                                                  
                                                          <div class="row m-t-10 p-10">
                                                            <div class="col-md-6">
                                                                    <div class="form-group">
                                                                            <input type="text" class="form-control" id="name" name="name" placeholder=" First Name">
                                                                            <!-- <label for="tb-fname"></label> -->
                                                                    </div>
                                                                   </div>

                                                                   <div class="col-md-6">
                                                                    <div class="form-group">
                                                                            <input type="text" name="lastname" class="form-control" id="lastname"placeholder="Last Name">
                                                                            <!-- <label for="tb-fname"></label> -->
                                                                    </div>
                                                                   </div>

                                                                   <div class="col-md-6">
                                                                    <div class="form-group">
                                                                            <input type="email" name="email" class="form-control" id="email" placeholder=" Email ID">
                                                                            <!-- <label for="tb-fname"></label> -->
                                                                    </div>
                                                                   </div>

                                                                   <div class="col-md-6">
                                                                    <div class="form-group">
                                                                            <input type="text" name="phone" class="form-control" id="phone" placeholder=" Phone No">
                                                                            <!-- <label for="tb-fname">Ph No</label> -->
                                                                    </div>
                                                                   </div>
                                                                   
                                                                   
                                                                      <div class="col-md-12">
                                                                    <div class="form-group">
                                                                            <label class="form-label">Address</label>
                                                                            <textarea class="form-control" rows="5"></textarea>
                                                                        </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                        <div class="d-md-flex align-items-center mt-3">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                                    <label class="form-check-label" for="flexCheckDefault">
                                                                                            Generate Password
                                                                                    </label>
                                                                                </div>
                                                                               
                                                                             
                                                                            </div>
                                                                      </div>
                                                                      
                                                                       <div class="col-lg-3 col-md-3">
                                                                            <div class="d-flex no-block align-items-center">
                                                                                    <button type="submit" class="btn btn-rounded btn-outline-primary  w-100  waves-effect waves-light ">CREATE ACCOUNT</button>
                                                                                          </div>
                                                                          </div>
                                                                          </div>
                                                                 
                                                           
                                                         </div>
                                                 </div>
                                                </form>
                                           </div>
                                  </div>
                        </div>
                    </div>
                </div>
                        
                        
</div>
</div>
@endsection
