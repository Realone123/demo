@extends('layouts.user.layout')
@section('title')
    <title>{{ $seo_text->title }}</title>
@endsection
@section('meta')
    <meta name="description" content="{{ $seo_text->meta_description }}">
@endsection

@section('user-content')
     <!-- SLIDER AREA START (slider-3) -->
      <!-- SLIDER AREA START (slider-3) -->
      <div class="ltn__slider-area ltn__slider-3  section-bg-2">
            <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1">
                <!-- ltn__slide-item -->
                <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3-normal--- ltn__slide-item-3 bg-image bg-overlay-theme-black-60" data-bs-bg="{{ asset('user/frontend/img/slider/one.jpg')}}">
                    <div class="ltn__slide-item-inner text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 align-self-center">
                                    <div class="slide-item-info">
                                        <div class="slide-item-info-inner ltn__slide-animation">
                                           
                                            <h6 class="slide-sub-title white-color--- animated"></h6>
                                            <h2 class="slide-title animated ">Build Your Wealth With High-Yield Properties</h2>
                                            <div class="slide-brief animated">
                                                <p>Choicest properties which reap high yields for you</p>
                                            </div>
                                            <div class="btn-wrapper animated">
                                                <a href="{{ route('properties',['page_type' => 'list_view']) }}" class="theme-btn-1 btn btn-effect-1">Start Investing</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__slide-item -->

                <!---->
                <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3-normal--- ltn__slide-item-3 bg-image bg-overlay-theme-black-60" data-bs-bg="{{ asset('user/frontend/img/slider/14.jpg')}}">
                    <div class="ltn__slide-item-inner text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 align-self-center">
                                    <div class="slide-item-info">
                                        <div class="slide-item-info-inner ltn__slide-animation">
                                          
                                            <h6 class="slide-sub-title white-color--- animated"></h6>
                                            <h2 class="slide-title animated ">Pre-Leased Properties That Assure Timely Returns</h2>
                                            <div class="slide-brief animated">
                                                <p>Pre-Leased Properties That Assure Timely Returns</p>
                                            </div>
                                            <div class="btn-wrapper animated">
                                                <a href="{{ route('properties',['page_type' => 'list_view']) }}" class="theme-btn-1 btn btn-effect-1">Explore Growth Opportunities</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---->

                  <!---->
                  <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3-normal--- ltn__slide-item-3 bg-image bg-overlay-theme-black-60" data-bs-bg="{{ asset('user/frontend/img/slider/two.jpg')}}">
                    <div class="ltn__slide-item-inner text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 align-self-center">
                                    <div class="slide-item-info">
                                        <div class="slide-item-info-inner ltn__slide-animation">
                                          
                                            <h6 class="slide-sub-title white-color--- animated"></h6>
                                            <h2 class="slide-title animated ">Leverage Our Premium Network &
                                                Technology For Your Syndication Needs</h2>
                                            <div class="slide-brief animated">
                                               <p>Fuel your investments with our powerful network and interface</p>
                                            </div>
                                            <div class="btn-wrapper animated">
                                                <a href="{{ route('properties',['page_type' => 'list_view']) }}" class="theme-btn-1 btn btn-effect-1">Get Started </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---->
          
                <!--  -->
            </div>
        </div>
        <!-- SLIDER AREA END -->
    <!-- SLIDER AREA END -->
<!---time line-->
  
    <!-- CATEGORY AREA START -->
    <div class="ltn__category-area ltn__product-gutter section-bg-1--- padd20 mr25">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="section-title-area1 ltn__section-title-2---">
                         <!--   <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color"></h6>-->
                            <h3 class="section-title title-2 animated">What Is RealOneInvest?</h3>
                           </div>
                           <div class="ltn__category-slider-active--- slick-arrow-1">
                              <p style="text-align:justify">A tech-first platform, RealOneInvest enables you to invest in elite properties. We are on a mission to enrich your investment journey in the world of real estate and make a
                                    difference to your wealth-building efforts - one property at a time.</p>
                             
                                   <div class="btn-wrapper animated mr25">
                                        <a href="{{ route('login') }}" class="theme-btn-1 btn btn-effect-1">Learn More </a>
                                    </div>
                          </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="realoneinvest-image">
                                <img src="{{ asset('user/frontend/img/slider/two.jpg')}}" alt="images" class="img-responsive image-shape">  </div>
                         </div>
                </div>
               
            </div>
        </div>
        <!-- CATEGORY AREA END -->

   <!-- FEATURE AREA START ( Feature - 6) -->
    <div class="ltn__feature-area section-bg-1 padd30 mb-120---">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                        <h3 class="section-title animated text-view">What Do We Do?</h3>
                  <!--  <h3 class="title-2">What We Do ?</h3>-->
                    <h5 class="title-2 ">We help you build wealth through premium properties </h5>

                    <p style="text-align:justify;margin-bottom:1px ! important;">RealOneInvest enables you with opportunities to invest and manage institutional-grade real
                            estate, cashflow properties, and liquidity.Our services and digital interface are curated to help investors like you find promising
                            opportunities in cashflow and high-yield properties, nestled in prime locations across the
                            U.S.</p>
                    <p>The best part? We take care of the compliance part, so you can focus on your investment
                            decisions, growing your wealth, and helping you build a better future for yourself.
                            Leverage capital appreciation, timely returns, and liquidity through resale by monitoring your
                            investments from anywhere, at any time, through our web-based platform.</p>
                   
                              <div class="btn-wrapper animated started-view">
                                        <a href="{{ route('login') }}" class="theme-btn-1 btn btn-effect-1">Get Started  </a>
                                    </div>
                </div>
            </div>
         
        </div>
    </div>
    <!-- FEATURE AREA END -->
    <div class="ltn__feature-area section-bg-1 padd30 mb-120---">
            <div class="container">
                    <div class="row ltn__custom-gutter--- justify-content-center">
        
           
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="ltn__feature-item ltn__feature-item-6 text-center bg-white  box-shadow-1 active">
                                    <div class="ltn__feature-icon">
                                        <!-- <span><i class="flaticon-house-3"></i></span> -->
                                        <img src="{{ asset('user/frontend/img/icons/icon-img/22.png')}}" alt="#">
                                    </div>
                                    <div class="ltn__feature-info">
                                        <h3><a href="{{ route('login') }}">Invest</a></h3>
                                        <p class="para-height">Explore a broad range of top-notch properties, which promise apex yields and returns, and
                                                invest in properties that meet your financial goals.
                                                </p>
                                        <a class="ltn__service-btn" href="{{ route('login') }}"> Start Investing <i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="ltn__feature-item ltn__feature-item-6 text-center bg-white  box-shadow-1">
                                    <div class="ltn__feature-icon">
                                        <!-- <span><i class="flaticon-house"></i></span> -->
                                        <img src="{{ asset('user/frontend/img/icons/icon-img/21.png')}}" alt="#">
                                    </div>
                                    <div class="ltn__feature-info">
                                        <h3><a href="{{ route('login') }}">Network</a></h3>
                                        <p class="para-height">More investors like you are joining our online community to explore growth properties and
                                                exchange market intelligence to stay on top of their goals. Join them now!</p>
                                        <a class="ltn__service-btn" href="{{ route('login') }}">Start Networking<i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="ltn__feature-item ltn__feature-item-6 text-center bg-white  box-shadow-1">
                                    <div class="ltn__feature-icon">
                                        <!-- <span><i class="flaticon-deal-1"></i></span> -->
                                        <img src="{{ asset('user/frontend/img/icons/icon-img/23.png')}}" alt="#">
                                    </div>
                                    <div class="ltn__feature-info">
                                        <h3><a href="{{ route('login') }}"> Grow</a></h3>
                                        <p class="para-height">You’ve done your part. Now, sit back and relax, and watch how your property investments
                                                grow with time (literally). You can manage your properties and monitor your wealth-building
                                                activities online (24x7) through our web-based platform</p>
                                        <a class="ltn__service-btn" href="{{ route('login') }}">Monitor Growth <i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </div>

   <!-- CATEGORY AREA START -->
       <!-- CATEGORY AREA START -->
       <div class="ltn__category-area ltn__product-gutter section-bg-1--- padd20 mr25">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area1 ltn__section-title-2--- text-center">
                         <!--   <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color"></h6>-->
                            <h3 class="section-title  animated">All Things Growth With RealOneInvest</h3>
                           </div>
                           <div class="ltn__category-slider-active--- slick-arrow-1">
                               <div class="started-view animated">
                                   <p>Get the most out of your real estate investments with us.</p>
                                   <p>We offer Grade-A analysis and data-driven insights to help you make well-informed
                                        investment decisions.</p>
                                   </div>
                                   <div class="btn-wrapper animated started-view  mr25">
                                        <a href="{{ route('register') }}" class="theme-btn-1  btn btn-effect-1">Sign Up Now </a>
                                    </div>
                          </div>
                    </div>
                 
                </div>
               
            </div>
        </div>
   <div class="ltn__category-area ltn__product-gutter section-bg-1---">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area1 ltn__section-title-2--- text-center">
                     <!--   <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color"></h6>-->
                        <h3 class="section-title">Why RealoneInvest</h3>
                       </div>
                </div>
            </div>

              <div class="row ltn__category-slider-active--- slick-arrow-1 justify-content-center">
               
                    <p class="text-view">We strive to simplify and make real estate investing accessible for you </p>
                    <div class="container">
                  
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-timeline">
                                        <a href="#" class="timeline">
                                            <div class="timeline-icon"><i class="fas fa-comment-dollar"></i></div>
                                            <div class="timeline-content">
                                                <h3 class="title">Growth-First Approach</h3>
                                                <p class="description">We scour through real estate investment opportunities across the US to fetch you blue chip
                                                        properties that yield at least 8-10% growth. </p>
                                            </div>
                                        </a>
                                        <a href="#" class="timeline">
                                            <div class="timeline-icon"><i class="fas fa-university"></i></div>
                                            <div class="timeline-content">
                                                <h3 class="title">Compliance-First Diligence</h3>
                                                <p class="description">   All the listings on our site are vetted against authorized data lists to ensure compliance, fair
                                                        market value, and adherence to legalities </p>
                                            </div>
                                        </a>
                                        <a href="#" class="timeline">
                                            <div class="timeline-icon"><i class="far fa-building"></i></div>
                                            <div class="timeline-content">
                                                <h3 class="title">Hassle-Free, Streamlined Experiences</h3>
                                                <p class="description">Our Advanced Digital Infrastructure and Vigorous Institutional Analysis Procedure streamline
                                                        your investment process, and enable you to monitor and manage your assets with ease.</p>
                                            </div>
                                        </a>
                                        <a href="#" class="timeline">
                                            <div class="timeline-icon"><i class="	far fa-chart-bar"></i></div>
                                            <div class="timeline-content">
                                                <h3 class="title">Risk-Free, Compliant Investment Opportunities</h3>
                                                <p class="description">We follow a stringent validation criteria for all the properties on our site. The fact that we list
                                                        just 2% of the properties we analyze, is a testament to it.</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="container">
  
                          <div class="btn-wrapper animated bt-view">
                                <a href="{{ route('properties',['page_type' => 'list_view']) }}" class="theme-btn-1 btn btn-effect-1">Start Investing  </a>
                            </div>
                          </div>    
        </div>
        </div>
    </div>
    <!-- CATEGORY AREA END -->

    <div class="ltn__product-slider-area ltn__product-gutter section-bg-1 padd30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2--- text-center">
                            <h3 class="section-title">Latest Properties</h3>
                        </div>
                    </div>
                </div>
                <div class="row ltn__product-slider-item-three-active--- slick-arrow-1 border-view">
                   
                    
                    <!-- ltn__product-item -->
                      @if (count($properties) > 0)
                        @foreach ($properties as $item)
                        
                         <!-- ltn__product-item -->
                    <div class="col-xl-4 col-sm-6 col-xs-12 col-12">
                            <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                                <div class="row">
                                        <div class="col-xl-8 col-sm-8 col-8">
                                            <div class="pro-head">
                                                    <h5 class="mr0">{{ $item->title }}</h5>
                                                    <p class="mr0"><i class="icon-placeholder"></i>{{ $item->address }}</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-sm-4 col-4">  
                                                <div class="band-tag">
                                                       @if(($item->status) =="Closed") <div class="post-date ms-auto booking1 "> @else <div class="post-date ms-auto booking ">@endif<a href=""style="font-size:10px;"> <span>{{ $item->status }}</span></a></div>
                                                  </div>
                                                 
                                                </div>
                                                
                                                
                                    </div>
                                <div class="product-img">
                                  <a href="{{ route('property.details',$item->slug) }}"><img  src="{{ asset($item->thumbnail_image) }}" style="width:335px; height:250px;" class-="image-view-part" alt="#"></a>
                                    <div class="real-estate-agent">
                                      <!--  <div class="agent-img">
                                           <a href=""><span class="status-color">live</span></a>
                                        </div>-->
                                    </div>
                                </div>
                                <div class="product-info">
                                        <div class="property-grid-1 property-block bg-white transation-this">
                                               <!--<div class="d-flex align-items-center post-meta  py-3 px-4">-->
                                               <!--         <div class="agent">-->
                                               <!--             <a href="#" class="d-flex text-general align-items-center"><span>Number of Units</span></a>-->
                                               <!--         </div>-->
                                               <!--         <div class="post-date ms-auto"><span>{{ $item->no_of_units }}</span></div>-->
                                               <!-- </div>-->
                                               @if(isset($item->offering_size))
                                                <div class="d-flex align-items-center post-meta py-3 px-4">
                                                    <div class="agent">
                                                           <a href="#" class="d-flex text-general align-items-center"><span> Offering Size </span></a>
                                                       </div>
                                                       <div class="post-date ms-auto"><span>{{ $item->offering_size}}</span></div>
                                               </div>
                                               @endif
                                                @if(isset($item->no_of_units))
                                                <div class="d-flex align-items-center post-meta py-3 px-4">
                                                    <div class="agent">
                                                           <a href="#" class="d-flex text-general align-items-center"><span> No of Units </span></a>
                                                       </div>
                                                       <div class="post-date ms-auto"><span>{{ $item->no_of_units}}</span></div>
                                               </div>
                                               @endif
                                               
                                             
                                               @if(isset($item->equity))
                                                <div class="d-flex align-items-center post-meta py-3 px-4">
                                                    <div class="agent">
                                                           <a href="#" class="d-flex text-general align-items-center"><span> Equity </span></a>
                                                       </div>
                                                       <div class="post-date ms-auto"><span>{{ $item->equity}}</span></div>
                                               </div>
                                               @endif
                                          
                                               @if(isset($item->price) &&  (($item->property_type_id)!=4))
                                                    <div class="d-flex align-items-center post-meta py-3 px-4">
                                                             <div class="agent">
                                                                    <a href="#" class="d-flex text-general align-items-center"><span>Price Per Sq.Ft</span></a>
                                                                </div>
                                                                <div class="post-date ms-auto"><span>{{ $currency->currency_icon }}{{ $item->price }} </span></div>
                                                        </div>
                                                        @endif
                                                         @if(isset($item->expected_return))
                                                        <div class="d-flex align-items-center post-meta  py-3 px-4">
                                                                <div class="agent">
                                                                       <a href="#" class="d-flex text-general align-items-center"><span>Expected Returns</span></a>
                                                                   </div>
                                                                   <div class="post-date ms-auto"><span>{{ $item->expected_return}} </span></div>
                                                           </div>
                                                           @endif
                                                         
            
            
                                                        
                                                <div class="d-flex align-items-center post-meta  py-3 px-4 border-top">
    
                                                        <div class="btn-wrapper mar-view animated">
                                                               @if(($item->status) =="Closed") <a href="{{ route('property.details',$item->slug) }}" class="theme-btn-1 btn btn-effect-2">View Details</a> @else <a href="{{route('login')}}" class="theme-btn-1 btn btn-effect-2">Invest Now</a> @endif
                                                            </div>
                                                        
                                                </div>
                                            </div>
                                    </div>
                              
                            </div>
                        </div>
                    <!-- ltn__product-item -->
                         @endforeach
                        @else
                    <div class="col-12 text-center">
                        <h3 class="text-danger">{{ $websiteLang->where('lang_key','property_not_found')->first()->custom_text }}</h3>
                    </div>
                    @endif
                    <!--  -->   
                    
                
            </div>
            </div>
        </div>
 @endsection
