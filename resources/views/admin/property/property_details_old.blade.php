@extends('layouts.admin.layout')
@section('title')
<title>{{ $websiteLang->where('lang_key','property')->first()->custom_text }}</title>
@endsection
@section('admin-content')

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

         <!---   <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Invest-view-Details </a></li>
                    </ol>
                </div>
            </div>-->
            <!-- row -->
         
            <div class="container-fluid">
                <div class="row">
                        <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-9 col-sm-9">
                                                <h4 class="card-title"><a href="realinvest.html"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> {{ $properties->title }}</i></a></h4>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                    <div class="header-right">
                                                            <div class="rounded-button">
                                                                    <a href="invest-now.html"class="btn mb-1 btn-rounded btn-outline-primary">INVEST</a> 
                                    
                                                                </div>
                                                            </div>
                                                </div>
                                            
                                            </div>
                                    </div>
                                </div>
                        </div>
                    </div>
              
                <div class="row">
                        <div class="col-md-7">
                                <div class="card">
                                    <div class="card-body">
                                            <div class="container mt-5">
                                                    <div class="carousel-container position-relative row mar2">
                                                      
                                                    <!-- Sorry! Lightbox doesn't work - yet. -->
                                                      
                                                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                                      <div class="carousel-inner">
                                                         <div class="carousel-item active" data-slide-number="0">
                                                          <img src="{{ url($properties->thumbnail_image) }}" class="d-block w-100" alt="..." data-remote="" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                                        </div>
                                                   @foreach ($slider_image as $image1)          
                                                        <div class="carousel-item" data-slide-number="{{ $image1->id}}">
                                                          <img src="{{ asset($image1->image) }}" class="d-block w-100" alt="..." data-remote="" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                                        </div>
                                                      @endforeach           
                                                        
                                                       
                                                       
                                                      </div>
                                                    </div>
                                                    
                                                    <!-- Carousel Navigation -->
                                                    <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
                                                      <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                          <div class="row mx-0">
                                                            
                                                            <div id="carousel-selector-0" class="thumb col-4 col-sm-2 px-1 py-2 selected" data-target="#myCarousel" data-slide-to="0">
                                                              <img src="{{ url($properties->thumbnail_image) }}" class="img-fluid" alt="...">
                                                            </div>
                                                   @foreach ($slider_image as $image1)             
                                                            <div id="carousel-selector-{{ $image1->id}}" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="{{ $image1->id}}">
                                                              <img src="{{ asset($image1->image) }}" class="img-fluid" alt="...">
                                                            </div>
                                                @endforeach                   
                                                       </div>
                                                            <div class="col-2 px-1 py-2"></div>
                                                            <div class="col-2 px-1 py-2"></div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                      </a>
                                                      <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                      </a>
                                                    </div>
                                                    
                                                    </div> <!-- /row -->
                                                    </div> <!-- /container --> 

                                                <div class="part-2">
                                                        <h6>Summary</h6>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h4 class="view-part-details">Location Video </h4>
                                                                <video width="400" controls controls>
                                                                        <source src="./media/SanJacinto_Video_one.mp4" type="video/mp4">
                                                                        </video>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                        <h4 class="view-part-details">Financial Highlights</h4>
                                        {{ $properties->financial_highlights }}
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                        <h4 class="view-part-details">Key Highlights</h4>
                                                  {{ $properties->key_highlights }}                      
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                        <h4 class="view-part-details">Property Details</h4>
                                                  {{ $properties->description }}                     
            
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                        <h4 class="view-part-details">Location</h4>
                                                                       
                                                     {{ $properties->location }}                 </div>
                                                                </div>
                                                            </div>
                                                    </div>

                                      
                                    </div>
                               
                           
                            <div class="col-md-5">
                                    <div class="card">
                                        <div class="card-body">
                                                <div class="col-md-12">
                                                        <h5>Key Highlights</h5>
                                                        <div class="row border-top">
                                                            <div class="col-sm-8 col-md-8">
                                                                <p>Offering Size</p>
                                                            </div>
                                                            <div class="col-sm-4 col-md-4">
                                                                <p  class="text-right">{{ $properties->offering_size }}</p>
                                                             </div>
                                                        </div>
                                                        <div class="row border-top">
                                                                <h6 class="head-padd">Minimum Investment</h6>
                                                                <div class="col-sm-8 col-md-8">
                                                                   <p>{{ $properties->min_investemnt }}</p>
                                                                </div>
                                                                <div class="col-sm-4 col-md-4">
                                                                    <p class="text-right">{{ $properties->min_investemnt }}</p>
                                                                 </div>
                                                            </div>
            
                                                            <div class="row border-top">
                                                                    <div class="col-sm-8 col-md-8">
                                                                        <p>Cash on Cash Return</p>
                                                                    </div>
                                                                    <div class="col-sm-4 col-md-4">
                                                                        <p class="text-right">{{ $properties->cash_on_cash_return }}</p>
                                                                     </div>
                                                                </div>
            
                                                                <div class="row border-top">
                                                                        <div class="col-sm-8 col-md-8">
                                                                            <p>Target IRR</p>
                                                                        </div>
                                                                        <div class="col-sm-4 col-md-4">
                                                                            <p class="text-right">{{ $properties->target_irr }}</p>
                                                                         </div>
                                                                    </div>
                                                                    <div class="row border-top">
                                                                            <div class="col-sm-8 col-md-8">
                                                                                <p >Target ARR</p>
                                                                            </div>
                                                                            <div class="col-sm-4 col-md-4">
                                                                                <p class="text-right">{{ $properties->target_arr }}</p>
                                                                             </div>
                                                                     </div>
                                                                     <div class="row border-top">
                                                                            <div class="col-sm-8 col-md-8">
                                                                                <p>Term</p>
                                                                            </div>
                                                                            <div class="col-sm-4 col-md-4">
                                                                                <p class="text-right">{{ $properties->term }}</p>
                                                                             </div>
                                                                     </div>
                                                                     <div class="row border-top">
                                                                            <div class="col-sm-8 col-md-8">
                                                                                <p>Minimum Investment</p>
                                                                            </div>
                                                                            <div class="col-sm-4 col-md-4">
                                                                                <p class="text-right">{{ $properties->min_investemnt }}</p>
                                                                             </div>
                                                                     </div>
                                                                     
                                                           </div>
                                               </div>
                                    </div>
                                   
                                    
                                    <!--end -->
                                    <div class="card">
                                            <div class="card-body">
                                                    <div class="col-md-12">
                                                            <h5>Documents</h5>
                                                            <div class="col-md-12">
                                                                    <div class="row border-top">
                                                                            <div class="col-md-8">
                                                                                <p>Document Name</p>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <p class="text-right">Action</p>
                                                                             </div>
                                                                     </div>
                                                                     <div class="row border-top">
                                                                            <div class="col-md-8">
                                                                                <p>SJCJ_Holding_LLC_OperatingAgreement.pdf</p>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <p class="text-right">
                                                                                        <a href=""data-toggle="modal" data-target="#basicModal-download"><i class="fa fa-download" aria-hidden="true"></i> 
                                                                                        <a href=""data-toggle="modal" data-target="#basicModal"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                                                           <!-- Button trigger modal -->
                                                                                          
                                                                                    </p>
                                                                     </div>
                                                                     </div>
                                                                     <div class="row border-top">
                                                                            <div class="col-md-8">
                                                                                <p>SJCJ_Holding_LLC_PPM.pdf	</p>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <p class="text-right">
                                                                                        <a href=""><i class="fa fa-download" aria-hidden="true"></i> </a>
                                                                                        <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                                                </p>
                                                                             </div>
                                                                     </div>
                                                                     <div class="row border-top">
                                                                            <div class="col-md-8">
                                                                                <p>Subscription_Agreement_Form_SJCJ_Holding_L...	</p>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <p class="text-right">
                                                                                        <a href=""><i class="fa fa-download" aria-hidden="true"></i> </a>
                                                                                        <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                                                </p>
                                                                             </div>
                                                                     </div>
                                                                     <div class="row border-top">
                                                                            <div class="col-md-8">
                                                                                <p>SJ_Offering_Summary.pdf</p>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <p class="text-right">
                                                                                        <a href=""><i class="fa fa-download" aria-hidden="true"></i> </a>
                                                                                        <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                                                </p>
                                                                             </div>
                                                                     </div>
                                                                     <div class="row border-top">
                                                                            <div class="col-md-8">
                                                                                <p>SJ_FundingInstructions.pdf</p>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <p class="text-right">
                                                                                    <a href=""><i class="fa fa-download" aria-hidden="true"></i> </a>
                                                                                    <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                                                </p>
                                                                             </div>
                                                                     </div>
                                                                
                                                                  </div>
                                                          
                                                                         
                                                               </div>
                                                   </div>
                                        </div>
                                        <!--end-->
                                        <div class="card">
                                                <div class="card-body">
                                                     <div class="col-md-12">
                                                                    <h5>Location</h5>
                                                                    <div class="row">
                                                                            <div class="col-md-12">
                                                                                    <div class="row border-top">
                                                                                          {{ $properties->google_map_embed_code }} 
                                                                                     </div>
                                                                                   </div>
                                                                      
                                                                    </div>
                                                                 </div>
                                                 </div>
                                         </div>
                                </div>
                    </div>

            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
   
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
   



    <!---view pop up --->
    
             <!-- Modal -->
                  <div class="modal fade" id="basicModal" style="display: none;" aria-hidden="true">
                       <div class="modal-dialog" role="document">
                               <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title">Confidentiality Agreement</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>×</span>
                                            </button>
                                     </div>
                                      <div class="modal-body">
                                          <p>I agree to keep any and all information strictly confidential and shall not disclose any such information to any third party, excluding professional counsel and spouses who are on a need to know basis.

                                          </p></div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn mb-1 btn-rounded btn-outline-primary" data-dismiss="modal">Cancel</button>
                                       <button type="button" class="btn mb-1 btn-rounded btn-outline-primary">I Agree</button>
                                   </div>
                                      </div>
                                </div>
                                </div>
                           <!---end -->
                           
             <!-- Modal -->
                  <div class="modal fade" id="basicModal-download" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title">Confidentiality Agreement</h5>
                                             <button type="button" class="close" data-dismiss="modal"><span>×</span>
                                             </button>
                                      </div>
                                       <div class="modal-body">
                                           <p>I agree to keep any and all information strictly confidential and shall not disclose any such information to any third party, excluding professional counsel and spouses who are on a need to know basis.
 
                                           </p></div>
                                           <div class="modal-footer">
                                             <button type="button" class="btn mb-1 btn-rounded btn-outline-primary" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn mb-1 btn-rounded btn-outline-primary">I Agree</button>
                                    </div>
                                       </div>
                                 </div>
                                 </div>
                            <!---end -->
  @endsection 