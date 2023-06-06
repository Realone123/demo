@extends('layouts.user.layout')
@section('title')
    <title>{{ $seo_text->title }}</title>
@endsection
@section('meta')
    <meta name="description" content="{{ $seo_text->meta_description }}">
@endsection
@section('user-content')




@php
    $search_url = request()->fullUrl();
    $get_url = substr($search_url, strpos($search_url, "?") + 1);

    $grid_url='';
    $list_url='';
    $isSortingId=0;

    $page_type=request()->get('page_type') ;
    if($page_type=='list_view'){
        $grid_url=str_replace('page_type=list_view','page_type=grid_view',$search_url);
        $list_url=str_replace('page_type=list_view','page_type=list_view',$search_url);
    }else if($page_type=='grid_view'){
        $grid_url=str_replace('page_type=grid_view','page_type=grid_view',$search_url);
        $list_url=str_replace('page_type=grid_view','page_type=list_view',$search_url);
    }
    if(request()->has('sorting_id')){
        $isSortingId=1;
    }
@endphp

 <!-- SLIDER AREA START (slider-3) -->
    <div class="ltn__slider-area ltn__slider-2--- ltn__slider-6 section-bg-2">
            <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1 arrow-white slick-initialized slick-slider">
                <!-- ltn__slide-item -->
                <div aria-live="polite" class="slick-list draggable">
                    <div class="slick-track" style="opacity: 1;" role="listbox">
                        <div class="ltn__slide-item ltn__slide-item-2--- ltn__slide-item-6 text-color-white bg-image bg-overlay-theme-black-60 slick-slide slick-current slick-active" data-bs-bg="{{ asset('user/frontend/img/slider/14.jpg')}}" data-slick-index="0" style="background-image: url(&quot;img/slider/14.jpg&quot;); background-position:100% 100%; width:100%;  position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide00">
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


      <!-- SLIDER AREA START (slider-3) -->
      <div class="ltn__car-dealer-form-area mt--65 pb-115---">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 padd0">
                        <div class="ltn__car-dealer-form-tab">
                            <div class="ltn__tab-menu  text-uppercase d-none">
                                <div class="nav">
                                    <a class="active show" data-bs-toggle="tab" href="#ltn__form_tab_1_1"><i class="fas fa-car"></i>Find A Car</a>
                                    <a data-bs-toggle="tab" href="#ltn__form_tab_1_2" class=""><i class="far fa-user"></i>Get a Dealer</a>
                                </div>
                            </div>
                            <div class="tab-content bg-white box-shadow-1 ltn__border pb-10">
                                <div class="tab-pane fade active show" id="ltn__form_tab_1_1">
                                    <div class="car-dealer-form-inner">
                                          <form method="GET" action="{{ route('properties') }}" class="ltn__car-dealer-form-box row">
                                       
                                            <div class="ltn__car-dealer-form-item ltn__custom-icon---- ltn__icon-car---- col-lg-2 col-md-3">
                                                <select class="nice-select" name="property_type" id="property_type">
                                                      <option value="" class="">Investment Type</option>
                                                             @foreach ($propertyTypes as $item)
                                            <option {{ request()->get('property_type')==$item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->type }}</option>
                                                             @endforeach
                                                         </select>  
                                                 </div> 
                                            <div class="ltn__car-dealer-form-item ltn__custom-icon---- ltn__icon-meter---- col-lg-2 col-md-3">
                                                <select class="nice-select" name="state_id" id="state_id">
                                                      <option value="" class="">State</option>
                                                             @foreach ($states as $item)
                                            <option {{ request()->get('state_id')==$item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                                             @endforeach
                                                         </select> 
                                                 </div> 
                                            <div class="ltn__car-dealer-form-item ltn__custom-icon---- ltn__icon-calendar---- col-lg-2 col-md-3">
                                                 <select class="nice-select" name="city_id" id="city_id">
                                                      <option value="" class="">City</option>
                                                             @foreach ($cities as $item)
                                            <option {{ request()->get('city_id')==$item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                                             @endforeach
                                                         </select> 
                                             </div>
                                             <div class="ltn__car-dealer-form-item ltn__custom-icon---- ltn__icon-calendar---- col-lg-2 col-md-3">
                                                    <select name="commercial" class="nice-select">
                                                            <option>Commercial</option>
                                                            <option>Residential</option>
                                                    </select>
                                                 </div>
                                               
                                                     <div class="ltn__car-dealer-form-item ltn__custom-icon---- ltn__icon-calendar---- col-lg-2 col-md-3">
                                                            <input type="hidden" name="page_type" value="list_view">
                                                       <input type="hidden" name="purpose_type" value="2">
                                                       <input type="text" placeholder="Property Name"class="nice-select" name="search">
                 
                                                         </div>
                                                <div class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-calendar col-lg-2 col-md-6">
                                                <div class="btn-wrapper text-center mt-0" style="position:relative;top:5px;left:25px;">
                                                    <!-- <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">Search Inventory</button> -->
                                                    <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">Search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!--<div class="tab-pane fade" id="ltn__form_tab_1_2">-->
                                <!--    <div class="car-dealer-form-inner">-->
                                <!--        <form action="#" class="ltn__car-dealer-form-box row">-->
                                <!--            <div class="ltn__car-dealer-form-item ltn__custom-icon---- ltn__icon-car---- col-lg-3 col-md-6">-->
                                <!--                <select class="nice-select" style="display: none;">-->
                                <!--                    <option>Choose Area</option>-->
                                <!--                    <option>chicago</option>-->
                                <!--                    <option>London</option>-->
                                <!--                    <option>Los Angeles</option>-->
                                <!--                    <option>New York</option>-->
                                <!--                    <option>New Jersey</option>-->
                                <!--                </select><div class="nice-select" tabindex="0"><span class="current">Choose Area</span><ul class="list"><li data-value="Choose Area" class="option selected">Choose Area</li><li data-value="chicago" class="option">chicago</li><li data-value="London" class="option">London</li><li data-value="Los Angeles" class="option">Los Angeles</li><li data-value="New York" class="option">New York</li><li data-value="New Jersey" class="option">New Jersey</li></ul></div>-->
                                <!--            </div> -->
                                <!--            <div class="ltn__car-dealer-form-item ltn__custom-icon---- ltn__icon-meter---- col-lg-3 col-md-6">-->
                                <!--                <select class="nice-select" style="display: none;">-->
                                <!--                    <option>Property Status</option>-->
                                <!--                    <option>Open house</option>-->
                                <!--                    <option>Rent</option>-->
                                <!--                    <option>Sale</option>-->
                                <!--                    <option>Sold</option>-->
                                <!--                </select><div class="nice-select" tabindex="0"><span class="current">Property Status</span><ul class="list"><li data-value="Property Status" class="option selected">Property Status</li><li data-value="Open house" class="option">Open house</li><li data-value="Rent" class="option">Rent</li><li data-value="Sale" class="option">Sale</li><li data-value="Sold" class="option">Sold</li></ul></div>-->
                                <!--            </div> -->
                                <!--            <div class="ltn__car-dealer-form-item ltn__custom-icon---- ltn__icon-calendar---- col-lg-3 col-md-6">-->
                                <!--                <select class="nice-select" style="display: none;">-->
                                <!--                    <option>Property Type</option>-->
                                <!--                    <option>Apartment</option>-->
                                <!--                    <option>Co-op</option>-->
                                <!--                    <option>Condo</option>-->
                                <!--                    <option>Single Family Home</option>-->
                                <!--                </select><div class="nice-select" tabindex="0"><span class="current">Property Type</span><ul class="list"><li data-value="Property Type" class="option selected">Property Type</li><li data-value="Apartment" class="option">Apartment</li><li data-value="Co-op" class="option">Co-op</li><li data-value="Condo" class="option">Condo</li><li data-value="Single Family Home" class="option">Single Family Home</li></ul></div>-->
                                <!--            </div>-->
                                <!--            <div class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-calendar col-lg-3 col-md-6">-->
                                <!--                <div class="btn-wrapper text-center mt-0">-->
                                                    <!-- <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">Search Inventory</button> -->
                                <!--                    <a href="" class="btn theme-btn-1 btn-effect-1 text-uppercase">Search Properties</a>-->
                                <!--                </div>-->
                                <!--            </div>-->
                                <!--        </form>-->
                                <!--    </div>-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>
        </div>



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
                                                        @if(($item->status) =="Closed") <div class="post-date ms-auto booking1 "> @else <div class="post-date ms-auto booking ">@endif <a href=""style="font-size:10px;"> <span>{{$item->status}}</span></a></div>
                                                  </div>
                                                 
                                                </div>
                                    </div>
                                <div class="product-img">
                                  <a href="{{ route('property.details',$item->slug) }}"><img  src="{{ asset($item->thumbnail_image) }}"  class-="image-view-part" style="width:335px; height:250px;" alt="#"></a>
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
                                           @if(isset($item->equity))
                                                <div class="d-flex align-items-center post-meta py-3 px-4">
                                                    <div class="agent">
                                                           <a href="#" class="d-flex text-general align-items-center"><span> Equity </span></a>
                                                       </div>
                                                       <div class="post-date ms-auto"><span>{{ $item->equity}}</span></div>
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
                                               
                                               @if(!empty($item->price) &&  (($item->property_type_id)!=4))
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
<!--=====PROPERTY PAGE END=====-->

<script>
    (function($) {
    "use strict";
    $(document).ready(function () {
        $("#sortingId").on("change",function(){
            var id=$(this).val();

            var isSortingId='<?php echo $isSortingId; ?>'
            var query_url='<?php echo $search_url; ?>';

            if(isSortingId==0){
                var sorting_id="&sorting_id="+id;
                query_url += sorting_id;
            }else{
                    var href = new URL(query_url);
                href.searchParams.set('sorting_id', id);
                query_url=href.toString()
            }

            window.location.href = query_url;
        })

    });

    })(jQuery);
</script>
@endsection
