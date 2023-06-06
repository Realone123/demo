@extends('layouts.user.layout')
@section('title')
    <title>{{ $seo_text->title }}</title>
@endsection
@section('meta')
    <meta name="description" content="{{ $seo_text->meta_description }}">
@endsection
@section('user-content')

  <!--===BREADCRUMB PART START====-->
  <section class="wsus__breadcrumb" style="background: url({{ url($banner_image->image) }});">
    <div class="wsus_bread_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h4>{{ $menus->where('id',2)->first()->navbar }}</h4>
                    <nav style="--bs-breadcrumb-divider: '-';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ $menus->where('id',1)->first()->navbar }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $menus->where('id',2)->first()->navbar }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!--===BREADCRUMB PART END====-->


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

<!--=====PROPERTY PAGE START=====-->
<section class="wsus__property_page mt_45 mb_45">
  <div class="container">
    <div class="row">
      <div class="col-xl-8">
        <div class="row">
          <div class="col-12">
            <div class="wsus__property_topbar d-flex justify-content-between mb-4">
              <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                    <i class="fas fa-th-large"></i>
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                    <i class="far fa-stream"></i>
                  </button>
                </li>
              </ul>
              <div class="wsus__property_top_select">
                @if ($isSortingId==1)
                <select class="select_2"  id="sortingId">
                    <option {{ request()->get('sorting_id')==1 ? 'selected' : '' }} value="1">{{ $websiteLang->where('lang_key','default_order')->first()->custom_text }}</option>
                    <option {{ request()->get('sorting_id')==2 ? 'selected' : '' }} value="2">{{ $websiteLang->where('lang_key','most_views')->first()->custom_text }}</option>
                    <option {{ request()->get('sorting_id')==3 ? 'selected' : '' }} value="3">{{ $websiteLang->where('lang_key','featured')->first()->custom_text }}</option>
                    <option {{ request()->get('sorting_id')==4 ? 'selected' : '' }} value="4">{{ $websiteLang->where('lang_key','top')->first()->custom_text }}</option>
                    <option {{ request()->get('sorting_id')==5 ? 'selected' : '' }} value="5">{{ $websiteLang->where('lang_key','new')->first()->custom_text }}</option>
                    <option {{ request()->get('sorting_id')==6 ? 'selected' : '' }} value="6">{{ $websiteLang->where('lang_key','urgent')->first()->custom_text }}</option>
                    <option {{ request()->get('sorting_id')==7 ? 'selected' : '' }} value="7">{{ $websiteLang->where('lang_key','oldest')->first()->custom_text }}</option>
                </select>
                @else
                <select class="select_2" id="sortingId">
                    <option value="1">{{ $websiteLang->where('lang_key','default_order')->first()->custom_text }}</option>
                    <option value="2">{{ $websiteLang->where('lang_key','most_views')->first()->custom_text }}</option>
                    <option value="3">{{ $websiteLang->where('lang_key','featured')->first()->custom_text }}</option>
                    <option value="4">{{ $websiteLang->where('lang_key','top')->first()->custom_text }}</option>
                    <option value="5">{{ $websiteLang->where('lang_key','new')->first()->custom_text }}</option>
                    <option value="6">{{ $websiteLang->where('lang_key','urgent')->first()->custom_text }}</option>
                    <option value="7">{{ $websiteLang->where('lang_key','oldest')->first()->custom_text }}</option>
                </select>
                @endif
              </div>
            </div>
          </div>

            @php
                $isActivePropertyQty=0;
                foreach ($propertyAminities as $value) {
                    if($value->property->expired_date==null){
                        $isActivePropertyQty +=1;
                    }else if($value->property->expired_date >= date('Y-m-d')){
                        $isActivePropertyQty +=1;
                    }
                }
            @endphp

          <div class="col-12">
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">

                    @if ($isActivePropertyQty > 0)
                        @foreach ($propertyAminities as $item)
                            @if ($item->property->expired_date==null)
                                <div class="col-xl-6 col-md-6">
                                    <div class="wsus__single_property">
                                    <div class="wsus__single_property_img">
                                        <img src="{{ asset($item->property->thumbnail_image) }}" alt="properties" class="img-fluid w-100">

                                        @if ($item->property->property_purpose_id==1)
                                        <span class="sale">{{ $item->property->propertyPurpose->custom_purpose }}</span>

                                        @elseif($item->property->property_purpose_id==2)
                                        <span class="sale">{{ $item->property->propertyPurpose->custom_purpose }}</span>
                                        @endif

                                        @if ($item->property->urgent_property==1)
                                            <span class="rent">{{ $websiteLang->where('lang_key','urgent')->first()->custom_text }}</span>
                                        @endif

                                    </div>
                                    <div class="wsus__single_property_text">
                                        @if ($item->property->property_purpose_id==1)
                                            <span class="tk">{{ $currency->currency_icon }}{{ $item->property->price }}</span>
                                        @elseif ($item->property->property_purpose_id==2)
                                        <span class="tk">{{ $currency->currency_icon }}{{ $item->property->price }} /
                                            @if ($item->property->period=='Daily')
                                            <span>{{ $websiteLang->where('lang_key','daily')->first()->custom_text }}</span>
                                            @elseif ($item->property->period=='Monthly')
                                            <span>{{ $websiteLang->where('lang_key','monthly')->first()->custom_text }}</span>
                                            @elseif ($item->property->period=='Yearly')
                                            <span>{{ $websiteLang->where('lang_key','yearly')->first()->custom_text }}</span>
                                            @endif
                                        </span>
                                        @endif

                                        <a href="{{ route('property.details',$item->property->slug) }}" class="title w-100">{{ $item->property->title }}</a>
                                        <ul class="d-flex flex-wrap justify-content-between">
                                            <li><i class="fal fa-bed"></i> {{ $item->property->number_of_bedroom }} {{ $websiteLang->where('lang_key','bed')->first()->custom_text }}</li>
                                            <li><i class="fal fa-shower"></i> {{ $item->property->number_of_bathroom }} {{ $websiteLang->where('lang_key','bath')->first()->custom_text }}</li>
                                            <li><i class="fal fa-draw-square"></i> {{ $item->property->area }} {{ $websiteLang->where('lang_key','sqft_s')->first()->custom_text }}</li>
                                        </ul>
                                        <div class="wsus__single_property_footer d-flex justify-content-between align-items-center">
                                            <a href="{{ route('search-property',['page_type' => 'list_view','property_type' => $item->property->propertyType->id]) }}" class="category">{{ $item->property->propertyType->type }}</a>

                                        @php
                                            $total_review=$item->property->reviews->where('status',1)->count();
                                            if($total_review > 0){
                                                $avg_sum=$item->property->reviews->where('status',1)->sum('avarage_rating');

                                                $avg=$avg_sum/$total_review;
                                                $intAvg=intval($avg);
                                                $nextVal=$intAvg+1;
                                                $reviewPoint=$intAvg;
                                                $halfReview=false;
                                                if($intAvg < $avg && $avg < $nextVal){
                                                    $reviewPoint= $intAvg + 0.5;
                                                    $halfReview=true;
                                                }
                                            }
                                        @endphp

                                        @if ($total_review > 0)
                                            <span class="rating">{{ sprintf("%.1f", $reviewPoint) }}

                                            @for ($i = 1; $i <=5; $i++)
                                                @if ($i <= $reviewPoint)
                                                    <i class="fas fa-star"></i>
                                                @elseif ($i> $reviewPoint )
                                                    @if ($halfReview==true)
                                                    <i class="fas fa-star-half-alt"></i>
                                                        @php
                                                            $halfReview=false
                                                        @endphp
                                                    @else
                                                    <i class="fal fa-star"></i>
                                                    @endif
                                                @endif
                                            @endfor
                                            </span>
                                        @else
                                            <span class="rating">0.0
                                                @for ($i = 1; $i <=5; $i++)
                                                <i class="fal fa-star"></i>
                                                @endfor
                                            </span>
                                        @endif
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            @elseif($item->property->expired_date >= date('Y-m-d'))
                                <div class="col-xl-6 col-md-6">
                                    <div class="wsus__single_property">
                                    <div class="wsus__single_property_img">
                                        <img src="{{ asset($item->property->thumbnail_image) }}" alt="properties" class="img-fluid w-100">

                                        @if ($item->property->property_purpose_id==1)
                                        <span class="sale">{{ $item->property->propertyPurpose->custom_purpose }}</span>

                                        @elseif($item->property->property_purpose_id==2)
                                        <span class="sale">{{ $item->property->propertyPurpose->custom_purpose }}</span>
                                        @endif

                                        @if ($item->property->urgent_property==1)
                                            <span class="rent">{{ $websiteLang->where('lang_key','urgent')->first()->custom_text }}</span>
                                        @endif

                                    </div>
                                    <div class="wsus__single_property_text">
                                        @if ($item->property->property_purpose_id==1)
                                            <span class="tk">{{ $currency->currency_icon }}{{ $item->property->price }}</span>
                                        @elseif ($item->property->property_purpose_id==2)
                                        <span class="tk">{{ $currency->currency_icon }}{{ $item->property->price }} /
                                            @if ($item->property->period=='Daily')
                                            <span>{{ $websiteLang->where('lang_key','daily')->first()->custom_text }}</span>
                                            @elseif ($item->property->period=='Monthly')
                                            <span>{{ $websiteLang->where('lang_key','monthly')->first()->custom_text }}</span>
                                            @elseif ($item->property->period=='Yearly')
                                            <span>{{ $websiteLang->where('lang_key','yearly')->first()->custom_text }}</span>
                                            @endif
                                        </span>
                                        @endif

                                        <a href="{{ route('property.details',$item->property->slug) }}" class="title w-100">{{ $item->property->title }}</a>
                                        <ul class="d-flex flex-wrap justify-content-between">
                                            <li><i class="fal fa-bed"></i> {{ $item->property->number_of_bedroom }} {{ $websiteLang->where('lang_key','bed')->first()->custom_text }}</li>
                                            <li><i class="fal fa-shower"></i> {{ $item->property->number_of_bathroom }} {{ $websiteLang->where('lang_key','bath')->first()->custom_text }}</li>
                                            <li><i class="fal fa-draw-square"></i> {{ $item->property->area }} {{ $websiteLang->where('lang_key','sqft_s')->first()->custom_text }}</li>
                                        </ul>
                                        <div class="wsus__single_property_footer d-flex justify-content-between align-items-center">
                                            <a href="{{ route('search-property',['page_type' => 'list_view','property_type' => $item->property->propertyType->id]) }}" class="category">{{ $item->property->propertyType->type }}</a>

                                        @php
                                            $total_review=$item->property->reviews->where('status',1)->count();
                                            if($total_review > 0){
                                                $avg_sum=$item->property->reviews->where('status',1)->sum('avarage_rating');

                                                $avg=$avg_sum/$total_review;
                                                $intAvg=intval($avg);
                                                $nextVal=$intAvg+1;
                                                $reviewPoint=$intAvg;
                                                $halfReview=false;
                                                if($intAvg < $avg && $avg < $nextVal){
                                                    $reviewPoint= $intAvg + 0.5;
                                                    $halfReview=true;
                                                }
                                            }
                                        @endphp

                                        @if ($total_review > 0)
                                            <span class="rating">{{ sprintf("%.1f", $reviewPoint) }}

                                            @for ($i = 1; $i <=5; $i++)
                                                @if ($i <= $reviewPoint)
                                                    <i class="fas fa-star"></i>
                                                @elseif ($i> $reviewPoint )
                                                    @if ($halfReview==true)
                                                    <i class="fas fa-star-half-alt"></i>
                                                        @php
                                                            $halfReview=false
                                                        @endphp
                                                    @else
                                                    <i class="fal fa-star"></i>
                                                    @endif
                                                @endif
                                            @endfor
                                            </span>
                                        @else
                                            <span class="rating">0.0
                                                @for ($i = 1; $i <=5; $i++)
                                                <i class="fal fa-star"></i>
                                                @endfor
                                            </span>
                                        @endif
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                    <div class="col-12 text-center">
                        <h3 class="text-danger">{{ $websiteLang->where('lang_key','property_not_found')->first()->custom_text }}</h3>
                    </div>
                    @endif

                </div>
              </div>
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row list_view">
                    @if ($isActivePropertyQty > 0)
                        @foreach ($propertyAminities as $item)
                            @if ($item->property->expired_date==null)
                                <div class="col-12">
                                    <div class="wsus__single_property">
                                    <div class="wsus__single_property_img">
                                        <img src="{{ asset($item->property->thumbnail_image) }}" alt="properties" class="img-fluid w-100">
                                    </div>
                                    <div class="wsus__single_property_text">

                                        @if ($item->property->property_purpose_id==1)
                                        <span class="sale">{{ $item->property->propertyPurpose->custom_purpose }}</span>

                                        @elseif($item->property->property_purpose_id==2)
                                        <span class="sale">{{ $item->property->propertyPurpose->custom_purpose }}</span>
                                        @endif

                                        @if ($item->property->urgent_property==1)
                                            <span class="rent">{{ $websiteLang->where('lang_key','urgent')->first()->custom_text }}</span>
                                        @endif

                                        @if ($item->property->property_purpose_id==1)
                                            <span class="tk">{{ $currency->currency_icon }}{{ $item->property->price }}</span>
                                        @elseif ($item->property->property_purpose_id==2)
                                        <span class="tk">{{ $currency->currency_icon }}{{ $item->property->price }} /
                                            @if ($item->property->period=='Daily')
                                            <span>{{ $websiteLang->where('lang_key','daily')->first()->custom_text }}</span>
                                            @elseif ($item->property->period=='Monthly')
                                            <span>{{ $websiteLang->where('lang_key','monthly')->first()->custom_text }}</span>
                                            @elseif ($item->property->period=='Yearly')
                                            <span>{{ $websiteLang->where('lang_key','yearly')->first()->custom_text }}</span>
                                            @endif
                                        </span>
                                        @endif

                                        <a href="{{ route('property.details',$item->property->slug) }}" class="title w-100">{{ $item->property->title }}</a>
                                        <ul class="d-flex flex-wrap justify-content-between">
                                            <li><i class="fal fa-bed"></i> {{ $item->property->number_of_bedroom }} {{ $websiteLang->where('lang_key','bed')->first()->custom_text }}</li>
                                            <li><i class="fal fa-shower"></i> {{ $item->property->number_of_bathroom }} {{ $websiteLang->where('lang_key','bath')->first()->custom_text }}</li>
                                            <li><i class="fal fa-draw-square"></i> {{ $item->property->area }} {{ $websiteLang->where('lang_key','sqft_s')->first()->custom_text }}</li>
                                        </ul>
                                        <div class="wsus__single_property_footer d-flex justify-content-between align-items-center">
                                            <a href="{{ route('search-property',['page_type' => 'list_view','property_type' => $item->property->propertyType->id]) }}" class="category">{{ $item->property->propertyType->type }}</a>

                                            @php
                                                $total_review=$item->property->reviews->where('status',1)->count();
                                                if($total_review > 0){
                                                    $avg_sum=$item->property->reviews->where('status',1)->sum('avarage_rating');

                                                    $avg=$avg_sum/$total_review;
                                                    $intAvg=intval($avg);
                                                    $nextVal=$intAvg+1;
                                                    $reviewPoint=$intAvg;
                                                    $halfReview=false;
                                                    if($intAvg < $avg && $avg < $nextVal){
                                                        $reviewPoint= $intAvg + 0.5;
                                                        $halfReview=true;
                                                    }
                                                }
                                            @endphp

                                            @if ($total_review > 0)
                                            <span class="rating">{{ sprintf("%.1f", $reviewPoint) }}

                                            @for ($i = 1; $i <=5; $i++)
                                                @if ($i <= $reviewPoint)
                                                    <i class="fas fa-star"></i>
                                                @elseif ($i> $reviewPoint )
                                                    @if ($halfReview==true)
                                                    <i class="fas fa-star-half-alt"></i>
                                                        @php
                                                            $halfReview=false
                                                        @endphp
                                                    @else
                                                    <i class="fal fa-star"></i>
                                                    @endif
                                                @endif
                                            @endfor
                                            </span>
                                            @else
                                            <span class="rating">0.0
                                                @for ($i = 1; $i <=5; $i++)
                                                <i class="fal fa-star"></i>
                                                @endfor
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            @elseif($item->property->expired_date >= date('Y-m-d'))
                                <div class="col-12">
                                    <div class="wsus__single_property">
                                    <div class="wsus__single_property_img">
                                        <img src="{{ asset($item->property->thumbnail_image) }}" alt="properties" class="img-fluid w-100">
                                    </div>
                                    <div class="wsus__single_property_text">

                                        @if ($item->property->property_purpose_id==1)
                                        <span class="sale">{{ $item->property->propertyPurpose->custom_purpose }}</span>

                                        @elseif($item->property->property_purpose_id==2)
                                        <span class="sale">{{ $item->property->propertyPurpose->custom_purpose }}</span>
                                        @endif

                                        @if ($item->property->urgent_property==1)
                                            <span class="rent">{{ $websiteLang->where('lang_key','urgent')->first()->custom_text }}</span>
                                        @endif

                                        @if ($item->property->property_purpose_id==1)
                                            <span class="tk">{{ $currency->currency_icon }}{{ $item->property->price }}</span>
                                        @elseif ($item->property->property_purpose_id==2)
                                        <span class="tk">{{ $currency->currency_icon }}{{ $item->property->price }} /
                                            @if ($item->property->period=='Daily')
                                            <span>{{ $websiteLang->where('lang_key','daily')->first()->custom_text }}</span>
                                            @elseif ($item->property->period=='Monthly')
                                            <span>{{ $websiteLang->where('lang_key','monthly')->first()->custom_text }}</span>
                                            @elseif ($item->property->period=='Yearly')
                                            <span>{{ $websiteLang->where('lang_key','yearly')->first()->custom_text }}</span>
                                            @endif
                                        </span>
                                        @endif

                                        <a href="{{ route('property.details',$item->property->slug) }}" class="title w-100">{{ $item->property->title }}</a>
                                        <ul class="d-flex flex-wrap justify-content-between">
                                            <li><i class="fal fa-bed"></i> {{ $item->property->number_of_bedroom }} {{ $websiteLang->where('lang_key','bed')->first()->custom_text }}</li>
                                            <li><i class="fal fa-shower"></i> {{ $item->property->number_of_bathroom }} {{ $websiteLang->where('lang_key','bath')->first()->custom_text }}</li>
                                            <li><i class="fal fa-draw-square"></i> {{ $item->property->area }} {{ $websiteLang->where('lang_key','sqft_s')->first()->custom_text }}</li>
                                        </ul>
                                        <div class="wsus__single_property_footer d-flex justify-content-between align-items-center">
                                            <a href="{{ route('search-property',['page_type' => 'list_view','property_type' => $item->property->propertyType->id]) }}" class="category">{{ $item->property->propertyType->type }}</a>

                                            @php
                                                $total_review=$item->property->reviews->where('status',1)->count();
                                                if($total_review > 0){
                                                    $avg_sum=$item->property->reviews->where('status',1)->sum('avarage_rating');

                                                    $avg=$avg_sum/$total_review;
                                                    $intAvg=intval($avg);
                                                    $nextVal=$intAvg+1;
                                                    $reviewPoint=$intAvg;
                                                    $halfReview=false;
                                                    if($intAvg < $avg && $avg < $nextVal){
                                                        $reviewPoint= $intAvg + 0.5;
                                                        $halfReview=true;
                                                    }
                                                }
                                            @endphp

                                            @if ($total_review > 0)
                                            <span class="rating">{{ sprintf("%.1f", $reviewPoint) }}

                                            @for ($i = 1; $i <=5; $i++)
                                                @if ($i <= $reviewPoint)
                                                    <i class="fas fa-star"></i>
                                                @elseif ($i> $reviewPoint )
                                                    @if ($halfReview==true)
                                                    <i class="fas fa-star-half-alt"></i>
                                                        @php
                                                            $halfReview=false
                                                        @endphp
                                                    @else
                                                    <i class="fal fa-star"></i>
                                                    @endif
                                                @endif
                                            @endfor
                                            </span>
                                            @else
                                            <span class="rating">0.0
                                                @for ($i = 1; $i <=5; $i++)
                                                <i class="fal fa-star"></i>
                                                @endfor
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="col-12 text-center">
                            <h3 class="text-danger">{{ $websiteLang->where('lang_key','property_not_found')->first()->custom_text }}</h3>
                        </div>
                    @endif


                </div>
              </div>
            </div>
          </div>
          @if ($isActivePropertyQty > 0)
          <div class="col-12">
            {{ $propertyAminities->links('user.paginator') }}
          </div>
          @endif
        </div>
      </div>
      <div class="col-xl-4">
        <div class="wsus__search_property" id="sticky_sidebar">
          <h3>{{ $websiteLang->where('lang_key','find_property')->first()->custom_text }} </h3>
          <form method="GET" action="{{ route('search-property') }}">
            <div class="wsus__single_property_search">
              <label>{{ $websiteLang->where('lang_key','keyword')->first()->custom_text }}</label>
              <input type="text" placeholder="{{ $websiteLang->where('lang_key','search_type')->first()->custom_text }}" name="search" value="{{ request()->has('search') ? request()->get('search') : '' }}">
            </div>

            <input type="hidden" name="page_type" value="{{ $page_type }}">

            <div class="wsus__single_property_search">
              <label>{{ $websiteLang->where('lang_key','location')->first()->custom_text }}</label>
              <select class="select_2" name="city_id">
                <option value="">{{ $websiteLang->where('lang_key','location')->first()->custom_text }}</option>
                @foreach ($cities as $city_item)
                    @if (request()->has('city_id'))
                        <option {{ request()->get('city_id') == $city_item->id ? 'selected' : ''  }} value="{{ $city_item->id }}">{{ $city_item->name }}</option>
                    @else
                        <option value="{{ $city_item->id }}">{{ $city_item->name }}</option>
                    @endif
                @endforeach
            </select>
            </div>

            <div class="wsus__single_property_search">
              <label>{{ $websiteLang->where('lang_key','property_type_s')->first()->custom_text }}</label>
              <select class="select_2" name="property_type">
                <option value="">{{ $websiteLang->where('lang_key','property_type_s')->first()->custom_text }}</option>
                @foreach ($propertyTypes as $property_type_item)
                    @if (request()->has('property_type'))
                        <option {{ request()->get('property_type') == $property_type_item->id ? 'selected' : ''  }} value="{{ $property_type_item->id }}">{{ $property_type_item->type }}</option>
                    @else
                        <option value="{{ $property_type_item->id }}">{{ $property_type_item->type }}</option>
                    @endif
                @endforeach
            </select>
            </div>

            <div class="wsus__single_property_search">
              <label>{{ $websiteLang->where('lang_key','property_purpose')->first()->custom_text }}</label>
                <select class="select_2" name="purpose_type">
                    @if (request()->has('purpose_type'))
                        <option value="">{{ $websiteLang->where('lang_key','any')->first()->custom_text }}</option>
                        <option {{ request()->get('purpose_type') == 1 ? 'selected' : ''  }} value="1">{{ $websiteLang->where('lang_key','sell')->first()->custom_text }}</option>
                        <option {{ request()->get('purpose_type') == 2 ? 'selected' : ''  }} value="2">{{ $websiteLang->where('lang_key','rent')->first()->custom_text }}</option>
                    @else
                        <option value="">{{ $websiteLang->where('lang_key','any')->first()->custom_text }}</option>
                        <option value="1">{{ $websiteLang->where('lang_key','sell')->first()->custom_text }}</option>
                        <option value="2">{{ $websiteLang->where('lang_key','rent')->first()->custom_text }}</option>
                    @endif
                </select>
            </div>

            @php
                $searhAminities=request()->get('aminity') ;
                $isCollapse=false;
                if(request()->has('aminity')){
                    $isCollapse=true;
                }
            @endphp
            <div class="wsus__single_property_search_check">
              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        {{ $websiteLang->where('lang_key','aminities')->first()->custom_text }}
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse {{ $isCollapse ? 'show' : '' }}" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @if (request()->has('aminity'))
                            @foreach ($aminities as $aminity)
                                @php
                                    $isChecked=false;
                                @endphp
                                @foreach ($searhAminities as $searhAminity)
                                    @if ($searhAminity==$aminity->id)
                                        @php
                                            $isChecked=true;
                                        @endphp
                                    @endif
                                @endforeach

                                <div class="form-check">
                                    <input {{ $isChecked ? 'checked' : '' }} name="aminity[]" class="form-check-input" type="checkbox" value="{{ $aminity->id }}" id="flexCheckDefault-{{ $aminity->id }}">
                                    <label class="form-check-label" for="flexCheckDefault-{{ $aminity->id }}">
                                        {{ $aminity->aminity }}
                                    </label>
                                </div>
                            @endforeach
                        @else
                            @foreach ($aminities as $aminity)
                                <div class="form-check">
                                    <input name="aminity[]" class="form-check-input" type="checkbox" value="{{ $aminity->id }}" id="flexCheckDefault-{{ $aminity->id }}">
                                    <label class="form-check-label" for="flexCheckDefault-{{ $aminity->id }}">
                                        {{ $aminity->aminity }}
                                    </label>
                                </div>
                            @endforeach
                        @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <button type="submit" class="common_btn2">{{ $websiteLang->where('lang_key','search')->first()->custom_text }}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
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
