@extends('layouts.user.layout')
@section('title')
    <title>{{ $user->name }}</title>
@endsection
@section('user-content')

  <!--===BREADCRUMB PART START====-->
  <section class="wsus__breadcrumb" style="background: url({{  $user->banner_image  ? url($user->banner_image):   url($banner_image->image) }});">
    <div class="wsus_bread_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h4>{{ $user->name }}</h4>
                    <nav style="--bs-breadcrumb-divider: '-';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ $menus->where('id',1)->first()->navbar }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!--===BREADCRUMB PART END====-->


<!--=========AGENT PROFILE START===========-->
<section class="wsus__agent_profile mt_45 mb_45">
  <div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="wsus__main_agent">
                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="wsus__main_agent_img">
                            <img src="{{ $user->image ? url($user->image) : url($default_profile_image->image) }}" alt="agent img" class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="col-xl-8 col-md-6">
                        <div class="wsus__main_agent_text">
                            <h2>{{ $user->name }}</h2>
                            <p class="agent_description">{!! clean($user->about) !!}</p>
                            <div class="wsus__main_agent_address">
                                @if ($user->phone)
                                <a href="callto:{{ $user->phone }}"><i class="fal fa-phone-alt"></i> {{ $user->phone }}</a>
                                @endif
                                @if ($user->email)
                                    <a href="mailto:{{ $user->email }}"><i class="fal fa-envelope"></i> {{ $user->email }}</a>
                                @endif

                                @if ($user->website)
                                <a href="{{ $user->website }}"><i class="fas fa-globe" aria-hidden="true"></i> {{ $user->website }}</a>
                                @endif

                                @if ($user->address)
                                <p><i class="fal fa-map-marker-alt"></i> {{ $user->address }}</p>
                                @endif

                            </div>

                            @if ($user_type==1)
                            <ul class="agent_profile_link">
                                @if ($user->facebook)
                                <li><a href="{{ $user->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                @endif
                                @if ($user->twitter)
                                <li><a href="{{ $user->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                @endif

                                @if ($user->linkedin)
                                <li><a href="{{ $user->linkedin }}"><i class="fab fa-linkedin-in"></i></a></li>
                                @endif
                                @if ($user->whatsapp)
                                <li><a href="{{ $user->whatsapp }}"><i class="fab fa-whatsapp"></i></a></li>
                                @endif
                            </ul>
                            @else
                            <ul class="agent_profile_link">
                                @if ($user->icon_one && $user->link_one)
                                <li><a href="{{ $user->link_one }}"><i class="{{ $user->icon_one }}"></i></a></li>
                                @endif

                                @if ($user->icon_two && $user->link_two)
                                <li><a href="{{ $user->link_two }}"><i class="{{ $user->icon_two }}"></i></a></li>
                                @endif

                                @if ($user->icon_three && $user->link_three)
                                <li><a href="{{ $user->link_three }}"><i class="{{ $user->icon_three }}"></i></a></li>
                                @endif

                                @if ($user->icon_four && $user->link_four)
                                <li><a href="{{ $user->link_four }}"><i class="{{ $user->icon_four }}"></i></a></li>
                                @endif
                            </ul>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
        $isActivePropertyQty=0;
        foreach ($properties as $value) {
            if($value->expired_date==null){
                $isActivePropertyQty +=1;
            }else if($value->expired_date >= date('Y-m-d')){
                $isActivePropertyQty +=1;
            }
        }
    @endphp

    <div class="row mt_45">
      <div class="col-12">
        <div class="wsus__property_topbar agent_det_topbar d-flex justify-content-between mb-4">
          <h4>{{ $websiteLang->where('lang_key','properties')->first()->custom_text }}</h4>
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
        </div>
      </div>
      <div class="col-xl-8 col-12">
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row">
                @if ($isActivePropertyQty > 0)
                    @foreach ($properties as $item)
                        @if ($item->expired_date==null)
                            <div class="col-xl-6 col-md-6">
                                <div class="wsus__single_property">
                                <div class="wsus__single_property_img">
                                    <img src="{{ asset($item->thumbnail_image) }}" alt="properties" class="img-fluid w-100">

                                    @if ($item->property_purpose_id==1)
                                    <span class="sale">{{ $item->propertyPurpose->custom_purpose }}</span>

                                    @elseif($item->property_purpose_id==2)
                                    <span class="sale">{{ $item->propertyPurpose->custom_purpose }}</span>
                                    @endif

                                    @if ($item->urgent_property==1)
                                        <span class="rent">{{ $websiteLang->where('lang_key','urgent')->first()->custom_text }}</span>
                                    @endif

                                </div>
                                <div class="wsus__single_property_text">
                                    @if ($item->property_purpose_id==1)
                                        <span class="tk">{{ $currency->currency_icon }}{{ $item->price }}</span>
                                    @elseif ($item->property_purpose_id==2)
                                    <span class="tk">{{ $currency->currency_icon }}{{ $item->price }} /
                                        @if ($item->period=='Daily')
                                        <span>{{ $websiteLang->where('lang_key','daily')->first()->custom_text }}</span>
                                        @elseif ($item->period=='Monthly')
                                        <span>{{ $websiteLang->where('lang_key','monthly')->first()->custom_text }}</span>
                                        @elseif ($item->period=='Yearly')
                                        <span>{{ $websiteLang->where('lang_key','yearly')->first()->custom_text }}</span>
                                        @endif
                                    </span>
                                    @endif

                                    <a href="{{ route('property.details',$item->slug) }}" class="title w-100">{{ $item->title }}</a>
                                    <ul class="d-flex flex-wrap justify-content-between">
                                        <li><i class="fal fa-bed"></i> {{ $item->number_of_bedroom }} {{ $websiteLang->where('lang_key','bed')->first()->custom_text }}</li>
                                        <li><i class="fal fa-shower"></i> {{ $item->number_of_bathroom }} {{ $websiteLang->where('lang_key','bath')->first()->custom_text }}</li>
                                        <li><i class="fal fa-draw-square"></i> {{ $item->area }} {{ $websiteLang->where('lang_key','sqft_s')->first()->custom_text }}</li>
                                    </ul>
                                    <div class="wsus__single_property_footer d-flex justify-content-between align-items-center">
                                        <a href="{{ route('search-property',['page_type' => 'list_view','property_type' => $item->propertyType->id]) }}" class="category">{{ $item->propertyType->type }}</a>

                                    @php
                                        $total_review=$item->reviews->where('status',1)->count();
                                        if($total_review > 0){
                                            $avg_sum=$item->reviews->where('status',1)->sum('avarage_rating');

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
                        @elseif($item->expired_date >= date('Y-m-d'))
                            <div class="col-xl-6 col-md-6">
                                <div class="wsus__single_property">
                                <div class="wsus__single_property_img">
                                    <img src="{{ asset($item->thumbnail_image) }}" alt="properties" class="img-fluid w-100">

                                    @if ($item->property_purpose_id==1)
                                    <span class="sale">{{ $item->propertyPurpose->custom_purpose }}</span>

                                    @elseif($item->property_purpose_id==2)
                                    <span class="sale">{{ $item->propertyPurpose->custom_purpose }}</span>
                                    @endif

                                    @if ($item->urgent_property==1)
                                        <span class="rent">{{ $websiteLang->where('lang_key','urgent')->first()->custom_text }}</span>
                                    @endif

                                </div>
                                <div class="wsus__single_property_text">
                                    @if ($item->property_purpose_id==1)
                                        <span class="tk">{{ $currency->currency_icon }}{{ $item->price }}</span>
                                    @elseif ($item->property_purpose_id==2)
                                    <span class="tk">{{ $currency->currency_icon }}{{ $item->price }} /
                                        @if ($item->period=='Daily')
                                        <span>{{ $websiteLang->where('lang_key','daily')->first()->custom_text }}</span>
                                        @elseif ($item->period=='Monthly')
                                        <span>{{ $websiteLang->where('lang_key','monthly')->first()->custom_text }}</span>
                                        @elseif ($item->period=='Yearly')
                                        <span>{{ $websiteLang->where('lang_key','yearly')->first()->custom_text }}</span>
                                        @endif
                                    </span>
                                    @endif

                                    <a href="{{ route('property.details',$item->slug) }}" class="title w-100">{{ $item->title }}</a>
                                    <ul class="d-flex flex-wrap justify-content-between">
                                        <li><i class="fal fa-bed"></i> {{ $item->number_of_bedroom }} {{ $websiteLang->where('lang_key','bed')->first()->custom_text }}</li>
                                        <li><i class="fal fa-shower"></i> {{ $item->number_of_bathroom }} {{ $websiteLang->where('lang_key','bath')->first()->custom_text }}</li>
                                        <li><i class="fal fa-draw-square"></i> {{ $item->area }} {{ $websiteLang->where('lang_key','sqft_s')->first()->custom_text }}</li>
                                    </ul>
                                    <div class="wsus__single_property_footer d-flex justify-content-between align-items-center">
                                        <a href="{{ route('search-property',['page_type' => 'list_view','property_type' => $item->propertyType->id]) }}" class="category">{{ $item->propertyType->type }}</a>

                                    @php
                                        $total_review=$item->reviews->where('status',1)->count();
                                        if($total_review > 0){
                                            $avg_sum=$item->reviews->where('status',1)->sum('avarage_rating');

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

                @if ($isActivePropertyQty > 0)
                <div class="col-12">
                    {{ $properties->links('user.paginator') }}
                </div>
                @endif

            </div>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="row list_view">
                @if ($isActivePropertyQty > 0)
                    @foreach ($properties as $item)
                        @if ($item->expired_date==null)
                            <div class="col-12">
                                <div class="wsus__single_property">
                                <div class="wsus__single_property_img">
                                    <img src="{{ asset($item->thumbnail_image) }}" alt="properties" class="img-fluid w-100">
                                </div>
                                <div class="wsus__single_property_text">

                                    @if ($item->property_purpose_id==1)
                                    <span class="sale">{{ $item->propertyPurpose->custom_purpose }}</span>

                                    @elseif($item->property_purpose_id==2)
                                    <span class="sale">{{ $item->propertyPurpose->custom_purpose }}</span>
                                    @endif

                                    @if ($item->urgent_property==1)
                                        <span class="rent">{{ $websiteLang->where('lang_key','urgent')->first()->custom_text }}</span>
                                    @endif

                                    @if ($item->property_purpose_id==1)
                                        <span class="tk">{{ $currency->currency_icon }}{{ $item->price }}</span>
                                    @elseif ($item->property_purpose_id==2)
                                    <span class="tk">{{ $currency->currency_icon }}{{ $item->price }} /
                                        @if ($item->period=='Daily')
                                        <span>{{ $websiteLang->where('lang_key','daily')->first()->custom_text }}</span>
                                        @elseif ($item->period=='Monthly')
                                        <span>{{ $websiteLang->where('lang_key','monthly')->first()->custom_text }}</span>
                                        @elseif ($item->period=='Yearly')
                                        <span>{{ $websiteLang->where('lang_key','yearly')->first()->custom_text }}</span>
                                        @endif
                                    </span>
                                    @endif

                                    <a href="{{ route('property.details',$item->slug) }}" class="title w-100">{{ $item->title }}</a>
                                    <ul class="d-flex flex-wrap justify-content-between">
                                        <li><i class="fal fa-bed"></i> {{ $item->number_of_bedroom }} {{ $websiteLang->where('lang_key','bed')->first()->custom_text }}</li>
                                        <li><i class="fal fa-shower"></i> {{ $item->number_of_bathroom }} {{ $websiteLang->where('lang_key','bath')->first()->custom_text }}</li>
                                        <li><i class="fal fa-draw-square"></i> {{ $item->area }} {{ $websiteLang->where('lang_key','sqft_s')->first()->custom_text }}</li>
                                    </ul>
                                    <div class="wsus__single_property_footer d-flex justify-content-between align-items-center">
                                        <a href="{{ route('search-property',['page_type' => 'list_view','property_type' => $item->propertyType->id]) }}" class="category">{{ $item->propertyType->type }}</a>

                                        @php
                                            $total_review=$item->reviews->where('status',1)->count();
                                            if($total_review > 0){
                                                $avg_sum=$item->reviews->where('status',1)->sum('avarage_rating');

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
                        @elseif($item->expired_date >= date('Y-m-d'))
                            <div class="col-12">
                                <div class="wsus__single_property">
                                <div class="wsus__single_property_img">
                                    <img src="{{ asset($item->thumbnail_image) }}" alt="properties" class="img-fluid w-100">
                                </div>
                                <div class="wsus__single_property_text">

                                    @if ($item->property_purpose_id==1)
                                    <span class="sale">{{ $item->propertyPurpose->custom_purpose }}</span>

                                    @elseif($item->property_purpose_id==2)
                                    <span class="sale">{{ $item->propertyPurpose->custom_purpose }}</span>
                                    @endif

                                    @if ($item->urgent_property==1)
                                        <span class="rent">{{ $websiteLang->where('lang_key','urgent')->first()->custom_text }}</span>
                                    @endif

                                    @if ($item->property_purpose_id==1)
                                        <span class="tk">{{ $currency->currency_icon }}{{ $item->price }}</span>
                                    @elseif ($item->property_purpose_id==2)
                                    <span class="tk">{{ $currency->currency_icon }}{{ $item->price }} /
                                        @if ($item->period=='Daily')
                                        <span>{{ $websiteLang->where('lang_key','daily')->first()->custom_text }}</span>
                                        @elseif ($item->period=='Monthly')
                                        <span>{{ $websiteLang->where('lang_key','monthly')->first()->custom_text }}</span>
                                        @elseif ($item->period=='Yearly')
                                        <span>{{ $websiteLang->where('lang_key','yearly')->first()->custom_text }}</span>
                                        @endif
                                    </span>
                                    @endif

                                    <a href="{{ route('property.details',$item->slug) }}" class="title w-100">{{ $item->title }}</a>
                                    <ul class="d-flex flex-wrap justify-content-between">
                                        <li><i class="fal fa-bed"></i> {{ $item->number_of_bedroom }} {{ $websiteLang->where('lang_key','bed')->first()->custom_text }}</li>
                                        <li><i class="fal fa-shower"></i> {{ $item->number_of_bathroom }} {{ $websiteLang->where('lang_key','bath')->first()->custom_text }}</li>
                                        <li><i class="fal fa-draw-square"></i> {{ $item->area }} {{ $websiteLang->where('lang_key','sqft_s')->first()->custom_text }}</li>
                                    </ul>
                                    <div class="wsus__single_property_footer d-flex justify-content-between align-items-center">
                                        <a href="{{ route('search-property',['page_type' => 'list_view','property_type' => $item->propertyType->id]) }}" class="category">{{ $item->propertyType->type }}</a>

                                        @php
                                            $total_review=$item->reviews->where('status',1)->count();
                                            if($total_review > 0){
                                                $avg_sum=$item->reviews->where('status',1)->sum('avarage_rating');

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

                @if ($isActivePropertyQty > 0)
                <div class="col-12">
                    {{ $properties->links('user.paginator') }}
                </div>
                @endif

            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4" id="sticky_sidebar">
        <form class="wsus__quick_contact" id="listingAuthContactForm">
            @csrf @csrf
          <div class="row">
            <div class="col-12 text-center">
              <h4>{{ $websiteLang->where('lang_key','quick_contact')->first()->custom_text }}</h4>
            </div>
            <div class="col-xl-12">
              <div class="wsus__quick_con_single">
                <label>{{ $websiteLang->where('lang_key','name')->first()->custom_text }}</label>
                <input type="text" name="name">
              </div>
            </div>
            <div class="col-xl-12">
              <div class="wsus__quick_con_single">
                <label>{{ $websiteLang->where('lang_key','email')->first()->custom_text }}</label>
                <input type="email" name="email">
              </div>
            </div>

            <div class="col-xl-12">
              <div class="wsus__quick_con_single">
                <label>{{ $websiteLang->where('lang_key','phone')->first()->custom_text }}</label>
                <input type="text" name="phone">
              </div>
            </div>
            <div class="col-xl-12">
              <div class="wsus__quick_con_single">
                <label>{{ $websiteLang->where('lang_key','subject')->first()->custom_text }}</label>
                <input type="text" name="subject">
              </div>
            </div>

            <div class="col-xl-12">
              <div class="wsus__quick_con_single">
                <label>{{ $websiteLang->where('lang_key','des')->first()->custom_text }}</label>
                <textarea cols="3" rows="5" name="message"></textarea>
                <input type="hidden" name="user_type" value="{{ $user_type }}">
                @if ($user_type==1)
                <input type="hidden" name="admin_id" value="{{ $user->id }}">
                @else
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                @endif

                @if($setting->allow_captcha==1)
                <p class="g-recaptcha mb-3" data-sitekey="{{ $setting->captcha_key }}"></p>
                @endif

                <button type="submit" class="common_btn" id="listingAuthorContctBtn"><i id="listcontact-spinner" class="loading-icon fa fa-spin fa-spinner d-none mr-5"></i> {{ $websiteLang->where('lang_key','send_msg')->first()->custom_text }}</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!--=========AGENT PROFILE END==========-->


    <script>
        (function($) {
        "use strict";
        $(document).ready(function () {
            $("#listingAuthorContctBtn").on('click',function(e) {
                e.preventDefault();
                // project demo mode check
                var isDemo="{{ env('PROJECT_MODE') }}"
                var demoNotify="{{ env('NOTIFY_TEXT') }}"
                if(isDemo==0){
                    toastr.error(demoNotify);
                    return;
                }
                // end
                $("#listcontact-spinner").removeClass('d-none')
                $("#listingAuthorContctBtn").addClass('custom-opacity')
                $("#listingAuthorContctBtn").attr('disabled',true);
                $("#listingAuthorContctBtn").removeClass('site-btn-effect')

                $.ajax({
                    url: "{{ route('user.contact.message') }}",
                    type:"post",
                    data:$('#listingAuthContactForm').serialize(),
                    success:function(response){
                        if(response.success){
                            $("#listingAuthContactForm").trigger("reset");
                            toastr.success(response.success)
                            $("#listcontact-spinner").addClass('d-none')
                            $("#listingAuthorContctBtn").removeClass('custom-opacity')
                            $("#listingAuthorContctBtn").attr('disabled',false);
                            $("#listingAuthorContctBtn").addClass('site-btn-effect')
                        }
                        if(response.error){
                            toastr.error(response.error)
                            $("#listcontact-spinner").addClass('d-none')
                            $("#listingAuthorContctBtn").removeClass('custom-opacity')
                            $("#listingAuthorContctBtn").attr('disabled',false);
                            $("#listingAuthorContctBtn").addClass('site-btn-effect')

                        }
                    },
                    error:function(response){
                        if(response.responseJSON.errors.name){
                            $("#listcontact-spinner").addClass('d-none')
                            $("#listingAuthorContctBtn").removeClass('custom-opacity')
                            $("#listingAuthorContctBtn").attr('disabled',false);
                            $("#listingAuthorContctBtn").addClass('site-btn-effect')

                            toastr.error(response.responseJSON.errors.name[0])

                        }

                        if(response.responseJSON.errors.email){
                            toastr.error(response.responseJSON.errors.email[0])
                            $("#listcontact-spinner").addClass('d-none')
                            $("#listingAuthorContctBtn").removeClass('custom-opacity')
                            $("#listingAuthorContctBtn").attr('disabled',false);
                            $("#listingAuthorContctBtn").addClass('site-btn-effect')

                        }

                        if(response.responseJSON.errors.phone){
                            toastr.error(response.responseJSON.errors.phone[0])
                            $("#listcontact-spinner").addClass('d-none')
                            $("#listingAuthorContctBtn").removeClass('custom-opacity')
                            $("#listingAuthorContctBtn").attr('disabled',false);
                            $("#listingAuthorContctBtn").addClass('site-btn-effect')
                        }

                        if(response.responseJSON.errors.subject){
                            toastr.error(response.responseJSON.errors.subject[0])
                            $("#listcontact-spinner").addClass('d-none')
                            $("#listingAuthorContctBtn").removeClass('custom-opacity')
                            $("#listingAuthorContctBtn").attr('disabled',false);
                            $("#listingAuthorContctBtn").addClass('site-btn-effect')
                        }

                        if(response.responseJSON.errors.message){
                            toastr.error(response.responseJSON.errors.message[0])
                            $("#listcontact-spinner").addClass('d-none')
                            $("#listingAuthorContctBtn").removeClass('custom-opacity')
                            $("#listingAuthorContctBtn").attr('disabled',false);
                            $("#listingAuthorContctBtn").addClass('site-btn-effect')
                        }else{
                            toastr.error('Please Complete the recaptcha to submit the form')
                            $("#listcontact-spinner").addClass('d-none')
                            $("#listingAuthorContctBtn").removeClass('custom-opacity')
                            $("#listingAuthorContctBtn").attr('disabled',false);
                            $("#listingAuthorContctBtn").addClass('site-btn-effect')
                        }

                        if(response.responseJSON.errors.g-recaptcha-response){
                            toastr.error('Please Complete the recaptcha to submit the form')
                            $("#listcontact-spinner").addClass('d-none')
                            $("#listingAuthorContctBtn").removeClass('custom-opacity')
                            $("#listingAuthorContctBtn").attr('disabled',false);
                            $("#listingAuthorContctBtn").addClass('site-btn-effect')
                        }


                    }

                });


            })

        });

        })(jQuery);
    </script>

@endsection
