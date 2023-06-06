@extends('layouts.admin.layout')
@section('title')
<title>{{ $websiteLang->where('lang_key','property')->first()->custom_text }}</title>
@endsection
@section('admin-content')
 
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
                        <h4 class="text-themecolor">Add Documents </h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.admindocuments.index') }}">Documents</a></li>
                                <li class="breadcrumb-item active">Add Documents</li>
                            </ol>
                          </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
         

         
                <!-- ============================================================== -->
                <!-- Comment - table -->
                <!-- ============================================================== -->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                     <form action="{{ route('admin.admindocuments.store') }}" method="POST" enctype="multipart/form-data" id="hockey">
                                          @csrf
                                                        <div class="row m-t-10 p-10">
                                                            
                                                                 
                                                           
                                                                
                                                                
                                                            <div class="col-lg-6">
                                                                    <div class="form-floating mb-3">
                                                                               <select name="property_id" id="property_id" class="form-control select2" onchange="showHide(this)">
                                        <option value="">Select Property</option>
                                        @foreach ($properties as $item)
                                        <option {{ old('property_id')==$item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                     
                                                                        </div>
                                                                  
                                                                </div>  
                                                                
                                     <div class="col-lg-6">
                                                                    <div class="form-floating mb-3">
                                                                               <select name="investors_id" id="investors_id" class="form-control select2" onchange="showHide(this)">
                                        <option value="">Select Investors</option>
                                        @foreach ($users as $item)
                                        <option {{ old('property_id')==$item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                     
                                                                        </div>
                                                                  
                                                                </div>                            
                                                             </div>
                                                             
                                       <div class="col-md-12 m-t-10">
                                             <label class="m-b-10">Tax Documents: </label> 
                                                                                                    <div  class="dropzone"> 
                                                                                                        <div class="fallback">
                                                                                                                <input name="tax_documents[]" type="file" multiple />
                                                                                                            </div>
                                                                                                        </div>
                                                                                       </div>  
                                      <div class="col-md-12 m-t-10">
                                             <label class="m-b-10">Subscriptions Documents: </label> 
                                                                                                    <div  class="dropzone"> 
                                                                                                        <div class="fallback">
                                                                                                                <input name="subscription_documents[]" type="file" multiple />
                                                                                                            </div>
                                                                                                        </div>
                                                                                       </div>                                                     
                                                            <div class="row p-10">
                                            
                                                                          
                                                                                       <div class="col-md-2 m-t-20">
                                                                                            <div class="d-flex no-block align-items-center">
                                                                                                    <button class="btn btn-rounded btn-outline-primary w-100 waves-effect waves-light" style="margin:auto !important">SAVE</button>
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
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- End Comment - chats -->
                <!-- ============================================================== -->
    
       
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



        <!-- ============================================================== -->
 

 
 @endsection
