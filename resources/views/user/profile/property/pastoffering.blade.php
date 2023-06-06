@extends('layouts.user.profile.layout')
@section('title')
    <title>{{ $websiteLang->where('lang_key','dashboard')->first()->custom_text }}</title>
@endsection

@section('user-dashboard')

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
                        <h4 class="text-themecolor">Past Offerings</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Past Offerings</li>
                            </ol>
                          </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->


                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- .row -->
               <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Search</h5>
                                   
                                    <form method="GET" action="{{ route('user.search-postoffering') }}" role="form" class="row">
                                        <div class="col-sm-6 col-md-3">
                                                <div class="form-floating mb-3">
                                                        <select name="property_type" id="property_type" class="select2 form-control form-select" style="width:100% ! important; ">
                                                                <option value=""  class="">Select Investment Type</option>
                                                             @foreach ($propertyTypes as $item)
                                            <option {{ request()->get('property_type')==$item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->type }}</option>
                                                             @endforeach
                                                         </select>
                                                    </div>
                                        </div>
                                        <div class="col-sm-6 col-md-2">
                                                <div class="form-floating mb-3">
                                                        <select name="state_id" id="state_id" class="select2 form-control form-select" style="width:100% ! important; ">
                                                               <option value="" class="">State</option>
                                                           
                                                                    @foreach ($states as $item)
                                            <option {{ request()->get('state_id')==$item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                                             @endforeach
                                                                 
                                                           
                                                         </select>
                                                    </div>
                                         
                                        </div>
                                        <div class="col-sm-6 col-md-2">
                                                <div class="form-floating mb-3">
                                                        <select name="city_id" id="city_id" class="select2 form-control form-select" style="width:100% ! important; ">
                                                                <option value=""  class="">City</option>
                                                          
                                                                     @foreach ($cities as $item)
                                            <option {{ request()->get('city_id')==$item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                                             @endforeach 
                                                          
                                                         </select>
                                                    </div>
                                         
                                        </div>
                                        <div class="col-sm-6 col-md-2">
                                                <div class="form-floating mb-3">
                                                        <select name="commercial" class="select2 form-control form-select" style="width:100% ! important; ">
                                                                <!--<option hidden Required  disabled selected hidden='hidden' class="">Property Type</option>-->
                                                            <optgroup>
                                                                    <option value="1">Commercial</option>
                                                                    <!--<option value="2">residential</option>-->
                                                            </optgroup>
                                                         </select>
                                                    </div>
                                              
                                            </div>
                                            
                                         <div class="col-sm-6 col-md-2">
                                                <div class="form-group">
                                                       <input type="hidden" name="page_type" value="list_view">
                                                       <input type="hidden" name="purpose_type" value="2">
                                                       <input type="text" placeholder="Property Name"class="form-control" name="search" value="{{ request()->get('search')}}">
                 
                                                    </div>
                                              
                                            </div>    

                                      
                
                                        <div class="col-sm-6 col-md-1">
                                            <button type="submit" class="btn btn-dark w-100 form-control" style="padding:9px;"><i class="fa fa-search text-white"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <!-- .row -->
                    <div class="row">
                        @if(count($closedproperties)>0)
                        @foreach ($closedproperties as $item) 
                      <!-- item -->
                       <div class="col-lg-4 col-md-6">
                            <div class="card">
                                 <div class="card-body">
                                <img class="card-img-top" src="{{ url($item->thumbnail_image) }}" width="335" height="225" alt="Card image cap">
                                <div class="card-img-overlay">
                                   <span class="badge bg-danger rounded-pill">{{ $item->status }}</span>
                                </div>
                                <div class="card-body bg-light">
                                    <h4 class="card-title invest-align">{{ $item->title }}</h4>
                                </div>
                                <div class="card-body border-top">
                                     @if(isset($item->offering_size))
                                    <div class="d-flex no-block align-items-center">
                                       <span class="p-10 text-muted">Offering Size</span>
                                        <span class="ms-auto  pull-right"> {{ $item->offering_size }}</span>
                                    </div>
                                    @endif
                                    @if(isset($item->min_investment))
                                    <div class="d-flex no-block align-items-center">
                                      <span class="p-10 text-muted">Min Investment</span>
                                        <span class="ms-auto  pull-right">${{ $item->min_investment }}</span>
                                    </div>
                                    @endif
                                     @if(isset($item->holding_period))
                                    <div class="d-flex no-block align-items-center">
                                         <span class="p-10 text-muted"> Term</span>
                                        <span class="ms-auto  pull-right">{{ $item->holding_period }}</span>
                                    </div>
                                    @endif
                                     @if(isset($item->total_return))
                                    <div class="d-flex no-block align-items-center">
                                            <span class="p-10 text-muted"> Cash On Cash Return</span>
                                           <span class="ms-auto pull-right">{{ $item->total_return }}</span>
                                       </div>
                                      @endif 
                                       @if(isset($item->target_arr))
                                       <div class="d-flex no-block align-items-center">
                                            <span class="p-10 text-muted"> Target IRR</span>
                                           <span class="ms-auto  pull-right">  {{ $item->target_arr }}</span>
                                       </div>
                                       @endif
                                    
                                </div>
                                <div class="card-body border-top">
                                        <a href="" target="_blank">
                                             <div class="d-flex no-block align-items-center">
                                          <h6 class="text-muted"><i class="ti-location-pin"></i> {{ $item->address.', '.$item->city->name }} </h6>
                                    </div>
                                </a>
                                </div>
                                <div class="card-body border-top">
                                        <div class="d-flex no-block align-items-center">
                                                <a href="property-details/{{$item->id}}" class="btn btn-rounded btn-outline-primary m-5 p-10 w-100 waves-effect waves-light ">View Details </a>
                                                  </div>
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
                        <!-- /item -->
                
                    </div>
                    <!-- /.row -->
                    <!-- .row -->







          
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
      
  @endsection 
  
 