@extends('layouts.user.layout')
@section('title')
    <title>{{ $property->seo_title }}</title>
@endsection
@section('meta')
    <meta name="description" content="{{ $property->seo_description }}">
@endsection
@section('user-content')
  
    <!-- SLIDER AREA START (slider-3) -->
    <div class="ltn__slider-area ltn__slider-2--- ltn__slider-6 section-bg-2">
            <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1 arrow-white slick-initialized slick-slider">
                <!-- ltn__slide-item -->
                <div aria-live="polite" class="slick-list draggable"><div class="slick-track"  role="listbox">
                    <div class="ltn__slide-item ltn__slide-item-2--- ltn__slide-item-6 text-color-white bg-image bg-overlay-theme-black-60 slick-slide slick-current slick-active" data-bs-bg="img/slider/14.jpg" data-slick-index="0" style="background-image: url(&quot;img/slider/14.jpg&quot;); background-position:100% 100%; width:100%; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;" class="img-responsive" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide00">
                    <div class="ltn__slide-item-inner text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 align-self-center">
                                    <div class="slide-item-info">
                                        <div class="slide-item-info-inner ltn__slide-animation">
                                            <h2 class=" animated ">Build Your Wealth With High-Yield Properties</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div></div></div>
                <!--  -->
            </div>
        </div>

        
        <div class="container">
            <div class="row">
                <div class="col-lg-12 padd0">
                        <header class="nav-header1">
                        <section>
                      <nav>
                        <ul class="tab-view">
                        <li class="border-right-view"><a href="#overview"><i class="fa-sharp fa-solid fa-eye"></i>Overview</a></li>
                        
                        <li class="border-right-view"><a href="#Business"><i class="fas fa-dollar-sign"></i>Business Plan</a></li>
                          <li class="border-right-view"><a href="#entity"><i class="fas fa-border-none"></i>Entity Structure</a></li>
                        <li class="border-right-view"><a href="#Financial"><i class="fas fa-map-marker-alt"></i>Financial Highlights</a></li>
                        <li class="border-right-view"><a href="#Timelines"><i class="far fa-building"></i>Timelines</a></li>
                        <li class=""><a href="#Gallery"><i class="far fa-calendar-check"></i>Photo Gallery</a></li>
                      <!---  <li><a href="#Status"><i class="far fa-bookmark"></i>Status Updates</a></li>-->
                        </ul>
                        </nav>
                        </header>
                        
                        </section>

                        <section   class="content">
                               
                           
                                <div class="row">
                                    <div class="col-lg-8" id="Gallery">
                                              <div class="ltn__form-box contact-form-box box-shadow white-bg padd0">
                                                    <div class="card">
                                <div class="card-body">
                                        <h5 class="card-title fw-500 mr-bottom" >Gallery</h5>
                                    <div id="carouselExampleIndicators2" class="carousel slide" data-bs-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="0" class="active"></li>
                                            <li data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="1"></li>
                                            <li data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item active">
                                                <img class="img-responsive" style="width:100% !important" src="{{ url($property->thumbnail_image) }}" alt="First slide">
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
                                
                                    <hr class="m-0">
                                      </div>
                            </div>
                                                </div>
                                                
                                                   
                                           

                                            </div>
                                        <div class="col-lg-4">
                                                <div class="ltn__form-box contact-form-box box-shadow white-bg item">
                                                        <!-- Property Grid -->
                                                        <div class="property-grid-1 property-block bg-white transation-this">
                                                            <div class="d-flex align-items-center post-meta mt-2">
                                                                <div class="agent" style="width:180px !important;">
                                                                    <h6>{{ $property->title}} </h6>
                                                                    <span class="listing-location "><i class="fas fa-map-marker-alt"></i>{{ $property->address}}</span>
                                                              </div>
                                                              @if(($property->status) =="Closed") <div class="post-date ms-auto booking4 "> @else <div class="post-date ms-auto booking5 " style="top:-20px !important;">@endif <a href=""style="font-size:10px;"> <span>{{ $property->status }}</span></a></div>
                                             
                                                            </div> 
                                                            @if($property->property_type_id ==1)
                                                            <div class="row border-top">
                                                                <div class="col-md-6">
                                                                    <div class="overview-part">
                                                                            <i class="fa fa-bar-chart chart-view"></i>
                                                                            <p class="mr0">Expected Returns</p>
                                                                            <p class="mr0">{{ $property->expected_return}}</p>
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                            <div class="overview-part">
                                                                                    <i class="fa fa-line-chart chart-view"></i>
                                                                                    <p class="mr0">Capital Raising</p>
                                                                                    <p class="mr0">{{ $property->capital_raising}}</p>
                                                                              </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                                <div class="overview-part">
                                                                                        <i class="fa fa-inr chart-view"></i>
                                                                                        <p class="mr0">No of Shares</p>
                                                                                        <p class="mr0"> {{ $property->no_of_shares }}</p>
                                                                                  </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                    <div class="overview-part">
                                                                                            <i class="far fa-bookmark chart-view"></i>
                                                                                            <p class="mr0">Project Duration</p>
                                                                                            <p class="mr0">{{ $property->holding_period}}</p>
                                                                                      </div>
                                                                                </div>
                                                                </div>
                                                                 @elseif($property->property_type_id ==2)
                                                            <div class="row border-top">
                                                                <div class="col-md-6">
                                                                    <div class="overview-part">
                                                                            <i class="fa fa-bar-chart chart-view"></i>
                                                                            <p class="mr0">Expected Returns</p>
                                                                            <p class="mr0">{{ $property->expected_return}}</p>
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                            <div class="overview-part">
                                                                                    <i class="fa fa-line-chart chart-view"></i>
                                                                                    <p class="mr0">Capital Raising</p>
                                                                                    <p class="mr0">{{ $property->capital_raising}}</p>
                                                                              </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                                <div class="overview-part">
                                                                                        <i class="fa fa-inr chart-view"></i>
                                                                                        <p class="mr0">No of Shares</p>
                                                                                        <p class="mr0"> {{ $property->no_of_shares }}</p>
                                                                                  </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                    <div class="overview-part">
                                                                                            <i class="far fa-bookmark chart-view"></i>
                                                                                            <p class="mr0">Project Duration</p>
                                                                                            <p class="mr0">{{ $property->holding_period}}</p>
                                                                                      </div>
                                                                                </div>
                                                                </div>
                                                                @elseif($property->property_type_id ==3)
                                                            <div class="row border-top">
                                                                <div class="col-md-6">
                                                                    <div class="overview-part">
                                                                            <i class="fa fa-bar-chart chart-view"></i>
                                                                            <p class="mr0">Expected Returns</p>
                                                                            <p class="mr0">{{ $property->expected_return}}</p>
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                            <div class="overview-part">
                                                                                    <i class="fa fa-line-chart chart-view"></i>
                                                                                    <p class="mr0">Capital Raising</p>
                                                                                    <p class="mr0">{{ $property->capital_raising}}</p>
                                                                              </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                                <div class="overview-part">
                                                                                        <i class="fa fa-inr chart-view"></i>
                                                                                        <p class="mr0">No of Shares</p>
                                                                                        <p class="mr0"> {{ $property->no_of_shares }}</p>
                                                                                  </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                    <div class="overview-part">
                                                                                            <i class="far fa-bookmark chart-view"></i>
                                                                                            <p class="mr0">Project Duration</p>
                                                                                            <p class="mr0">{{ $property->holding_period}}</p>
                                                                                      </div>
                                                                                </div>
                                                                </div>
                                                                @else
                                                                   <div class="row border-top">
                                                                <div class="col-md-6">
                                                                    <div class="overview-part">
                                                                            <i class="fa fa-bar-chart chart-view"></i>
                                                                            <p class="mr0">Expected Returns</p>
                                                                            <p class="mr0">{{ $property->expected_return}}</p>
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                            <div class="overview-part">
                                                                                    <i class="fa fa-line-chart chart-view"></i>
                                                                                    <p class="mr0">Occupancy</p>
                                                                                    <p class="mr0">{{ $property->occupancy}}</p>
                                                                              </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                                <div class="overview-part">
                                                                                        <i class="fa fa-inr chart-view"></i>
                                                                                        <p class="mr0">IRR</p>
                                                                                        <p class="mr0"> {{ $property->target_irr }}</p>
                                                                                  </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                    <div class="overview-part">
                                                                                            <i class="far fa-bookmark chart-view"></i>
                                                                                            <p class="mr0">No of Units</p>
                                                                                            <p class="mr0">{{ $property->no_of_units}}</p>
                                                                                      </div>
                                                                                </div>
                                                                </div>
                                                                @endif
                                                          
                                                           <div class="d-flex align-items-center post-meta mt-2 py-3 px-4 border-top">
                                                                 <div class="btn-wrapper mar-view animated">
                                                                              @if(($property->status) !="Closed")   <a href="{{route('login')}}" class="theme-btn-1 btn btn-effect-2">Invest Now</a> @endif
                                                                            </div>
                                                                    </div>
                                                        </div>
                                                    </div>

                                                 
                                            </div>
                                    </div>
                                 </section>
                        
                     
                     
                       
                          <!--<div class="container mr25"> -->
                          <!--  <div class="row ltn__form-box contact-form-box box-shadow white-bg ">-->
                          <!--                              <div class="col-lg-12">-->
                          <!--                                  <div class="row">-->
                          <!--                                   <h2 class="title-2">OverView</h2>  -->
                          <!--                                    <div class="view-list">-->
                          <!--                                 {!! clean($property->financial_hightlights) !!}  -->
                          <!--                                 </div>-->
                          <!--                                  </div>-->
                          <!--                               </div>-->
                          <!-- </div>-->
                          
                        
                       <div class="row">
                            <div class="col-lg-12">
                                    <section   class="content" >
                                            <div class="container ltn__form-box contact-form-box box-shadow white-bg" id="overview">
                                                    <h2 class="title-2">Over View</h2>

                                                         <div class="item mr50">
                                                          <div class="view-list">
                                                                   {!! clean($property->financial_hightlights) !!}
                                                                    </div>
                                                         </div>
                                                 </div>
                                      </section>

                                   </div>
                         
                                           <div class="col-lg-12">
                                <section id="Business" class="content">
                                        <div class="container ltn__form-box contact-form-box box-shadow white-bg">
                   
                                                <div class="row">
                                                        <div class="col-lg-12">
                                                                        <div class="item mr50 ">
                                                                                <h2 class="title-2">Business Plan</h2>
                                                                                <div class="view-list">
                                                                                            {!! clean($property->key_hightlights) !!}
                                                                                            </div>
                                                                                           
                                                                                           
                                                                               
                                                                        </div>
                                                                    </div>
                                                                   
                                                    </div>
                                            </div>
                                  
                                  </section>

                               </div>
                           <div class="col-lg-12">
                                <section id="entity" class="content">
                                        <div class="container ltn__form-box contact-form-box box-shadow white-bg">
                   
                                                <div class="row">
                                                        <div class="col-lg-12">
                                                                        <div class="item mr50 ">
                                                                              
                                                                                            <h2 class="title-2"> Entity Structure </h2>
                                                                                            <div class="view-list">
                                                                                                   {!! clean($property->description) !!}
                                                                                                    </div>  
                                                                                           
                                                                               
                                                                        </div>
                                                                    </div>
                                                                   
                                                    </div>
                                            </div>
                                  
                                  </section>

                               </div>
                        
                           </div>
                  

                        
                        <section id="Financial" class="content">
                        <h2 class="title-2">Financial Highlights</h2>
                        <div class="row mr25">
                                <div class="col-md-7">
                                        <div class="property-grid-1 property-block bg-white transation-this">
                                                <div class="d-flex align-items-center post-meta mt-2">
                                                     </div> 
                                                      @if($property->property_type_id ==1)
                                                <div class="row border-top">
                                                    <div class="col-md-4">
                                                        <div class="overview-part">
                                                                <i class="	fas fa-laptop-house chart-view"></i>
                                                                <p class="mr0">Capital Raising  </p>
                                                                <p class="mr0">{{ $property->capital_raising}} </p>
                                                          </div>
                                                        </div>
                                                       
                                                        <div class="col-md-4">
                                                                <div class="overview-part">
                                                                        <i class="far fa-eye chart-view"></i>
                                                                        <p class="mr0">Expected Returns </p>
                                                                        <p class="mr0">{{$property->expected_return}}</p>
                                                                  </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                    <div class="overview-part">
                                                                            <i class="fa fa-inr chart-view"></i>
                                                                            <p class="mr0">Cost Per Share   </p>
                                                                            <p class="mr0"> {{ $property->cost_pershare}}</p>
                                                                      </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                                <div class="overview-part">
                                                                                        <i class="fa fa-inr chart-view"></i>
                                                                                        <p class="mr0">Price</p>
                                                                                        <p class="mr0"> {{ $currency->currency_icon }}{{ $property->price }}</p>
                                                                                  </div>
                                                                            </div>
                                                                    <div class="col-md-4">
                                                                            <div class="overview-part">
                                                                                    <i class="far fa-file-alt chart-view"></i>
                                                                                    <p class="mr0">No of Shares  </p>
                                                                                    <p class="mr0"> {{ $property->no_of_shares}}  </p>
                                                                              </div>
                                                                        </div>
                                                  
                                                                                <div class="col-md-4">
                                                                                        <div class="overview-part">
                                                                                                <i class="fas fa-hand-holding-usd  chart-view"></i>
                                                                                                <p class="mr0">Project Duration        </p>
                                                                                                <p class="mr0"> {{ $property->holding_period}}</p>
                                                                                          </div>
                                                                                    </div>
                                                                                    

                                                    </div>
                                                    @elseif($property->property_type_id ==2)
                                                <div class="row border-top">
                                                    <div class="col-md-4">
                                                        <div class="overview-part">
                                                                <i class="	fas fa-laptop-house chart-view"></i>
                                                                <p class="mr0">Capital Raising  </p>
                                                                <p class="mr0">{{ $property->capital_raising}} </p>
                                                          </div>
                                                        </div>
                                                       
                                                        <div class="col-md-4">
                                                                <div class="overview-part">
                                                                        <i class="far fa-eye chart-view"></i>
                                                                        <p class="mr0">Expected Returns </p>
                                                                        <p class="mr0">{{$property->expected_return}}</p>
                                                                  </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                    <div class="overview-part">
                                                                            <i class="fa fa-inr chart-view"></i>
                                                                            <p class="mr0">Cost Per Share   </p>
                                                                            <p class="mr0"> {{ $property->cost_pershare}}</p>
                                                                      </div>
                                                                </div>
                                                                 <div class="col-md-4">
                                                                                <div class="overview-part">
                                                                                        <i class="fa fa-inr chart-view"></i>
                                                                                        <p class="mr0">Price</p>
                                                                                        <p class="mr0"> {{ $currency->currency_icon }}{{ $property->price }}</p>
                                                                                  </div>
                                                                            </div>
                                                                    <div class="col-md-4">
                                                                            <div class="overview-part">
                                                                                    <i class="far fa-file-alt chart-view"></i>
                                                                                    <p class="mr0">No of Shares  </p>
                                                                                    <p class="mr0"> {{ $property->no_of_shares}}  </p>
                                                                              </div>
                                                                        </div>
                                                  

                                                                            
                                                                                <div class="col-md-4">
                                                                                        <div class="overview-part">
                                                                                                <i class="fas fa-hand-holding-usd  chart-view"></i>
                                                                                                <p class="mr0">Project Duration        </p>
                                                                                                <p class="mr0"> {{ $property->holding_period}}</p>
                                                                                          </div>
                                                                                    </div>
                                                                                   
                                                    </div>
                                                    @elseif($property->property_type_id ==3)
                                                <div class="row border-top">
                                                    <div class="col-md-4">
                                                        <div class="overview-part">
                                                                <i class="	fas fa-laptop-house chart-view"></i>
                                                                <p class="mr0">Capital Raising  </p>
                                                                <p class="mr0">{{ $property->capital_raising}} </p>
                                                          </div>
                                                        </div>
                                                       
                                                        <div class="col-md-4">
                                                                <div class="overview-part">
                                                                        <i class="far fa-eye chart-view"></i>
                                                                        <p class="mr0">Expected Returns </p>
                                                                        <p class="mr0">{{$property->expected_return}}</p>
                                                                  </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                    <div class="overview-part">
                                                                            <i class="fa fa-inr chart-view"></i>
                                                                            <p class="mr0">Cost Per Share   </p>
                                                                            <p class="mr0"> {{ $property->cost_pershare}}</p>
                                                                      </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                        <div class="overview-part">
                                                                                <i class="fas fa-chalkboard-teacher chart-view"></i>
                                                                                <p class="mr0">Equity  </p>
                                                                                <p class="mr0">{{ $property->equity}} </p>
                                                                          </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                            <div class="overview-part">
                                                                                    <i class="far fa-file-alt chart-view"></i>
                                                                                    <p class="mr0">No of Shares  </p>
                                                                                    <p class="mr0"> {{ $property->no_of_shares}}  </p>
                                                                              </div>
                                                                        </div>
                                                  

                                                                        
                                                                            
                                                                                <div class="col-md-4">
                                                                                        <div class="overview-part">
                                                                                                <i class="fas fa-hand-holding-usd  chart-view"></i>
                                                                                                <p class="mr0">Project Duration        </p>
                                                                                                <p class="mr0"> {{ $property->holding_period}}</p>
                                                                                          </div>
                                                                                    </div>
                                                                                   
                                                    </div>
                                                    @else
                                                     <div class="row border-top">
                                                    <div class="col-md-4">
                                                        <div class="overview-part">
                                                                <i class="	fas fa-laptop-house chart-view"></i>
                                                                <p class="mr0">Total Returns</p>
                                                                <p class="mr0">{{$property->total_return}}</p>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                                <div class="overview-part">
                                                                        <i class="far fa-eye chart-view"></i>
                                                                        <p class="mr0">Expected Returns </p>
                                                                        <p class="mr0">{{$property->expected_return}}</p>
                                                                  </div>
                                                            </div>
                                                            
                                                                <div class="col-md-4">
                                                                        <div class="overview-part">
                                                                                <i class="fas fa-chalkboard-teacher chart-view"></i>
                                                                                <p class="mr0">IRR</p>
                                                                                <p class="mr0">{{$property->target_irr}}</p>
                                                                          </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                            <div class="overview-part">
                                                                                    <i class="far fa-file-alt chart-view"></i>
                                                                                    <p class="mr0">Occupancy </p>
                                                                                    <p class="mr0">{{$property->occupancy }}</p>
                                                                              </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                                <div class="overview-part">
                                                                                        <i class="far fa-building chart-view"></i>
                                                                                        <p class="mr0">Holding Period </p>
                                                                                        <p class="mr0">{{$property->holding_period}}</p>
                                                                                  </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="overview-part">
                                                                                        <i class="far fa-building chart-view"></i>
                                                                                        <p class="mr0">No of Units </p>
                                                                                        <p class="mr0">{{$property->no_of_units}}</p>
                                                                                  </div>
                                                                            </div>


                                                                            
                                                    </div>
                                              
                                                    @endif
                                              
                                                 </div>
                                    
                                    </div>
                                    <div class="col-md-5">
                                        <div class=" ltn__form-box contact-form-box box-shadow white-bg">
                                                <img src="{{ asset('user/frontend/img/banner/phase-1-Financial.png')}}" alt="fin" class="img-responsive">
                                            </div>
                               
                                      
                                </div> 
                             </section>
                          
                          
                          
                             <section id="Timelines" class="content ltn__form-box contact-form-box box-shadow white-bg" style="width:100%">
                     
                            <h2 class="title-2"> Projected Timeline</h2>
                           
                                  
                                    <div class="container padd0 project-view-timeline">
                                      <div class="row">
                                        <div class="steps-timeline text-center">
                                           @foreach ($important_dates as $item)
                                          <div class="steps-one">
                                            <h3>{{ date('m-d-Y',strtotime($item->date)) }}</h3>
                                            <div class="end-circle back-orange"></div>
                                            <div class="step-wrap">
                                              <div class="steps-stops">
                                                <div class="verticle-line back-orange"></div>
                                              </div>
                                            </div>
                                          
                                         <div class="inverted-pane-warp back-blue">
                                              <div class="inverted-steps-pane">
                                                    <p class="mr0">{{ $item->name}} </p>
                                                 </div>
                                            </div>
                                          </div>
                                  @endforeach
                                         
                                        <!-- /.steps-timeline -->
                                      </div>
                                    </div>
                            </div>
<!--mobile-->
<div class="container mt-5 mb-5 project-view-timeline-mobile">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <!--<h4>Projected Timeline</h4>-->
                <ul class="timeline-1">
                   @foreach ($important_dates as $item)
                    <li>
                        <a>{{ date('m-d-Y',strtotime($item->date)) }}</a>
                        <p>{{ $item->name}}</p>
                    </li>
                   @endforeach
                    
                </ul>
            </div>
        </div>
    </div>
<!--end-->
     </section>
           
                      
                       
                        
                    
                   <section id="map" class="content ltn__form-box contact-form-box box-shadow white-bg" style="width:100%">
                      <div class="container">
                            <h2 class="title-2"> Map</h2>
                           <div class="map-view" style="margin:10px;">{!! $property->google_map_embed_code !!} </div>
                      </div>
                      

                           </section>  
                        
                        
                
                    </div>
                </div>
            </div>
<style>
         ul.timeline-1 {
  list-style-type: none;
  position: relative;
}
ul.timeline-1:before {
  content: ' ';
  background: #379887;
  display: inline-block;
  position: absolute;
  left: 0px;
  width: 2px;
  height: 100%;
  z-index: 400;
}
ul.timeline-1 > li {
  margin: 20px 0;
  padding-left: 20px;
}
ul.timeline-1 > li:before {
  content: ' ';
  background: white;
  display: inline-block;
  position: absolute;
  border-radius: 50%;
  border: 3px solid #ee8230;
  left: -10px;
  width: 20px;
  height: 20px;
  z-index: 400;
}
.timeline-1 li
{
  border: 1px solid #efefef;
    border-radius: 10px;
    text-align: right;
    padding: 5px;
    color: #379887;
    margin:5px 0px;
    box-shadow: 1px 1px 1px 1px;
}
.timeline-1 li p
{
  font-weight: 800;
  color: #ee8230;
}  
                  
    

@media (max-width:991px)
{
  .project-view-timeline
  { 
    display: none ! important; 
   }
}


@media  (min-width:992px)
{
  .project-view-timeline-mobile
   {
     display: none ! important; 
   }
}
                  </style>
@endsection
