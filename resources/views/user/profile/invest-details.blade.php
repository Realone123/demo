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
                        <h4 class="text-themecolor">{{$properties->title}}</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{route('user.investnow')}}">My Investments</a></li>
                                <li class="breadcrumb-item active">{{$properties->title}}</li>
                            </ol>
                          </div>
                    </div>
                </div>
               
         
                     <!--.row -->
                     
                <div class="row">
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase ">Invested Value</h5>
                        <div class="d-flex align-items-center no-block">
                            <h3 class="mar0"><i class="ti-home text-primary"></i></h3>
                            <div class="ms-auto">
                                <h3 class="text-primary mar0">${{$investment_details->investment_amount}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase "> @if($investment_details->status =="Rejected") Rejected Date @else Invested Date @endif</h5>
                        <div class="d-flex align-items-center no-block">
                            <h3 class="mar0"><i class="fas fa-calendar-alt text-success"></i></h3>
                            <div class="ms-auto">
                                <h3 class="text-success mar0">@if($investment_details->date)  {{ date('M d , Y',strtotime($investment_details->date)) }} @else {{ date('M d , Y',strtotime($investment_details->created_at)) }} @endif</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Investment Status</h5>
                        <div class="d-flex align-items-center no-block ">
                            <h3 class="mar0"><i class="far fa-chart-bar text-danger"></i></h3>
                            <div class="ms-auto">
                                <h3 class="text-danger mar0"> {{$investment_details->status}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase ">Total Returns</h5>
                        <div class="d-flex align-items-center no-block ">
                            <h3 class="mar0"><i class="far fa-file-alt text-purple"></i></h3>
                            <div class="ms-auto">
                                <h3 class="mar0 text-purple">$0</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                     <!-- /.row -->
                    @if($investment_details->status == "Rejected")
                       <div class="row">
    <div class="container">
         <!-- end Video -->
                            <div class="card">
                                    <div class="card-body">
                                            <h4 class="card-title fw-500 mr-bottom">Rejected Reason </h4>
                                        <div class="col-md-6">
                                         
                                              <div>  {{$investment_details->description}}  </div>
                                                 </div>
                                       </div>
                                </div>
    </div>
    </div>
                    <!-- .row -->
                    @endif
           
                
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                     <!-- .row -->
                     <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="card-body">
                                        <h4 class="card-title fw-500 mr-bottom">Gallery</h4>
                                    <div id="carouselExampleIndicators2" class="carousel slide" data-bs-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="0" class="active"></li>
                                            <li data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="1"></li>
                                            <li data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item active">
                                                <img class="img-responsive" style="width:100% !important" src="{{ url($properties->thumbnail_image) }}" alt="First slide">
                                            </div>
                                            
                                              @foreach ($slider_image as $image1)          
                                                <div class="carousel-item">
                                                <img class="img-responsive" style="width:100% !important" src="{{ asset($image1->image) }}" alt="Third slide">
                                            </div>
                                                      @endforeach           
                                                        
                                            
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-bs-slide="prev" data-bs-target="#carouselExampleIndicators2">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-bs-slide="next" data-bs-target="#carouselExampleIndicators2">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                    </div>
                                 <!--   <div class="p-t-20 p-b-20">
                                        <h4 class="card-title">Florida 5, Pinecrest, FL</h4>
                                        <h5 class="m-b-0"><span class="text-muted"><i class="fa fa-map-marker text-danger m-r-10" aria-hidden="true"></i>New York City / Brooklyn</span></h5>
                                    </div>-->
                                    <hr class="m-0">
                                      </div>
                            </div>
                     </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="card-body">
                                        <h4 class="card-title fw-500 mr-bottom"> Video </h4>
                                    <div class="col-md-12">
                                         <video style="width:100%"; controls="">
                                                <source src="./media/SanJacinto_Video_one.mp4" type="video/mp4">
                                                </video>
                                                </div>
                                   </div>
                            </div>

                       
                                <!-- end location -->
                            

                               
                        </div>
                    </div>




                    <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="card">
                                            <div class="card-body">
                                                    <h4 class="card-title fw-500 mr-bottom">Specifications </h4>
                                                    <div class="col-md-12">
                                                    <div class="border-top">
                                                       @if(isset($properties->offering_size))
                                                            <div class="row ">
                                                                    <div class="col-lg-8  col-sm-8 col-md-8"><span class="key-highlights">Offering Size</span></div>
                                                                    <div class="col-lg-4 col-sm-4 col-md-4 text-right"><span class="key-highlights ">{{ $properties->offering_size }}</span></div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                         @if(isset($properties->price))
                                                         <div class="border-top">
                                                                <div class="row">
                                                                        <div class="col-lg-8  col-sm-8 col-md-8"><span class="key-highlights">Price per Sq Ft </span></div>
                                                                        <div class="col-lg-4 col-sm-4 col-md-4 text-right"><span class="key-highlights ">{{ $properties->price }} </span></div>
                                                                </div>
                                                            </div>
                                                             @endif
                                                         @if(isset($properties->area))
                                                        <div class="border-top">
                                                                <div class="row">
                                                                        <div class="col-lg-8  col-sm-8 col-md-8"><span class="key-highlights">Area</span></div>
                                                                        <div class="col-lg-4 col-sm-4 col-md-4 text-right"><span class="key-highlights ">{{ $properties->area }} </span></div>
                                                                </div>
                                                            </div>
                                                             @endif
                                                         @if(isset($properties->no_of_shares))
                                                             <div class="border-top">
                                                                <div class="row">
                                                                        <div class="col-lg-8  col-sm-8 col-md-8"><span class="key-highlights">No Of Shares</span></div>
                                                                        <div class="col-lg-4 col-sm-4 col-md-4 text-right"><span class="key-highlights ">{{ $properties->no_of_shares }}</span></div>
                                                                </div>
                                                            </div>
                                                             @endif
                                                         @if(isset($properties->cash_on_cash_return))

                                                            <div class="border-top">
                                                                    <div class="row">
                                                                            <div class="col-lg-8  col-sm-8 col-md-8"><span class="key-highlights">Cash on Cash Return</span></div>
                                                                            <div class="col-lg-4 col-sm-4 col-md-4 text-right "><span class="key-highlights ">{{ $properties->cash_on_cash_return }}</span></div>
                                                                    </div>
                                                                </div>
                                                                 @endif
                                                         @if(isset($properties->total_return))
                                                                <div class="border-top">
                                                                    <div class="row">
                                                                            <div class="col-lg-8  col-sm-8 col-md-8"><span class="key-highlights">Total Return</span></div>
                                                                            <div class="col-lg-4 col-sm-4 col-md-4 text-right "><span class="key-highlights ">{{ $properties->total_return }}</span></div>
                                                                    </div>
                                                                </div>
                                                                 @endif
                                                         @if(isset($properties->holding_period))
                                                                  <div class="border-top">
                                                                    <div class="row">
                                                                            <div class="col-lg-8  col-sm-8 col-md-8"><span class="key-highlights">Project Duration</span></div>
                                                                            <div class="col-lg-4 col-sm-4 col-md-4 text-right "><span class="key-highlights ">{{ $properties->holding_period }}</span></div>
                                                                    </div>
                                                                </div>
                                                                 @endif
                                                         @if(isset($properties->target_irr))
                                                                <div class="border-top">
                                                                        <div class="row">
                                                                                <div class="col-lg-8  col-sm-8 col-md-8"><span class="key-highlights">Target IRR</span></div>
                                                                                <div class="col-lg-4 col-sm-4 col-md-4 text-right "><span class="key-highlights ">{{ $properties->target_irr }}</span></div>
                                                                        </div>
                                                                </div>
                                                         @endif
                                                         @if(isset($properties->target_arr))
                                                                <div class="border-top">
                                                                        <div class="row">
                                                                                <div class="col-lg-8  col-sm-8 col-md-8"><span class="key-highlights">Target ARR</span></div>
                                                                                <div class="col-lg-4 col-sm-4 col-md-4  text-right "><span class="key-highlights ">{{ $properties->target_arr }}</span></div>
                                                                         </div>
                                                                </div>
                                                                 @endif
                                                         @if(isset($properties->term))
                                                                <div class="border-top">
                                                                        <div class="row">
                                                                                <div class="col-lg-8  col-sm-8 col-md-8"><span class="key-highlights">Term</span></div>
                                                                                <div class="col-lg-4 col-sm-4 col-md-4  text-right "><span class="key-highlights ">{{ $properties->term }}</span></div>
                                                                         </div>
                                                                </div>
                                                                 @endif
                                                         @if(isset($properties->min_investment))
                                                                <div class="border-top">
                                                                        <div class="row">
                                                                                <div class="col-lg-8  col-sm-8 col-md-8"><span class="key-highlights">Minimum Investment</span></div>
                                                                                <div class="col-lg-4 col-sm-4 col-md-4  text-right "><span class="key-highlights ">{{ $properties->min_investment }} USD</span></div>
                                                                          </div>
                                                                </div>
                                                                @endif
                                                  </div>
                                             </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="card">
                                                <div class="card-body">
                                                        <h4 class="card-title fw-500 mr-bottom">Documents </h4>
                                                        <div class="col-md-12">
                                                        <div class="border-top">
                                                                <div class="row ">
                                                                        <div class="col-lg-8  col-sm-8 col-md-8"><span class="key-highlights"><strong>Document Name</strong></span></div>
                                                                        <div class="col-lg-4 col-sm-4 col-md-4 text-right"><span class="key-highlights "><strong>Action</strong></span></div>
                                                                </div>
                                                            </div>
                                                             @foreach($propertyDocuments as $item)
                                                            <div class="border-top">
                                                                    <div class="row">
                                                                            <div class="col-lg-8  col-sm-8 col-md-8"><span class="key-highlights">{{ $item->document }}</span></div>
                                                                            <div class="col-lg-4 col-sm-4 col-md-4 text-right"><span class="key-highlights ">
                                                                            <a href="{{ url('/uploads/custom-documents',['id' =>$item->property_id, 'file' => $item->document]) }}" target="_blank" class=""><i class=" fas fa-eye"></i> </a>
                                                                            <a href="{{ route('download-listing-file',['id' =>$item->property_id, 'file' => $item->document]) }}" ><i class=" fas fa-download"></i> </a>
                                                                           
                                                                            </span></div>
                                                                    </div>
                                                                </div>
                                                             @endforeach
                                                               
                                                                  
                                                      </div>
                                                 </div>
                                        </div>
                                    </div>
                      </div>
                    <!-- .row -->

                   <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card height-view-1">
                                            <div class="card-body">
                                                    <h4 class="card-title fw-500 mr-bottom">Over View</h4>
                                                    <div class="col-md-12">
                                                        
                                                         {!! clean($properties->financial_hightlights) !!}  
                                                 
                                                  </div>
                                             </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="card">
                                                <div class="card-body">
                                                        <h4 class="card-title fw-500 mr-bottom">Business Plan</h4>
                                                        <div class="col-md-12">
                                                            
                                                                 {!! clean($properties->key_hightlights) !!} 
                                                                  
                                                      </div>
                                                 </div>
                                        </div>
                                    </div>
                      </div>
                    <!-- .row -->

                    <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card ">
                                            <div class="card-body">
                                                    <h4 class="card-title fw-500 mr-bottom">Entity Structure</h4>
                                                    <div class="col-md-12">
                                                    
                                                              {!! clean($properties->description) !!}  
                                                 
                                                  </div>
                                             </div>
                                    </div>
                                </div>
                              
                      </div>
                      
                      <div class="row">
    <div class="container">
         <!-- end Video -->
                            <div class="card">
                                    <div class="card-body">
                                            <h4 class="card-title fw-500 mr-bottom">Location Map</h4>
                                        <div class="col-md-6">
                                         
                                              <div>   {!! $properties->google_map_embed_code !!}  </div>
                                                 </div>
                                       </div>
                                </div>
    </div>
    </div>
                    <!-- .row -->

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
  @endsection 