@extends('layouts.user.profile.layout')
@section('title')
    <title>{{ $websiteLang->where("lang_key","my_property")->first()->custom_text }}</title>
@endsection
@section('user-dashboard')

<div class="row">
    <form action="{{ route('user.property.update',$property->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="col-xl-9 ms-auto">
        <div class="wsus__dashboard_main_content">
          <div class="wsus__add_property">
            <h4 class="heading">{{ $websiteLang->where('lang_key','my_property')->first()->custom_text }} <a href="{{ route('user.my.properties') }}" class="common_btn"><i class="fal fa-plus-octagon"></i> {{ $websiteLang->where('lang_key','all_property')->first()->custom_text }}</a></h4>
            <div class="wsus__dash_info p_25 pb_0">
              <div class="row">
                <h5 class="sub_heading">{{ $websiteLang->where('lang_key','basic_info')->first()->custom_text }}</h5>
                <div class="col-12 col-md-6">
                  <div class="wsus__property_input">
                    <label for="#">{{ $websiteLang->where('lang_key','title')->first()->custom_text }} <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" value="{{ $property->title }}">
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="wsus__property_input">
                    <label for="#" for="slug">{{ $websiteLang->where('lang_key','slug')->first()->custom_text }} <span class="text-danger">*</span></label>
                    <input type="text" name="slug" id="slug" value="{{ $property->slug }}">
                  </div>
                </div>
                <div class="col-xl-6 col-md-6">
                  <div class="wsus__property_input">
                    <label for="#">{{ $websiteLang->where('lang_key','property_type')->first()->custom_text }} <span class="text-danger">*</span></label>
                    <select class="select_2" name="property_type" id="property_type">
                        <option value="">{{ $websiteLang->where('lang_key','select_property_type')->first()->custom_text }}</option>
                        @foreach ($propertyTypes as $item)
                        <option {{ $property->property_type_id==$item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->type }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-xl-6 col-md-6">
                  <div class="wsus__property_input">
                    <label for="#">{{ $websiteLang->where('lang_key','city')->first()->custom_text }} <span class="text-danger">*</span></label>
                    <select class="select_2" name="city">
                        <option value="">{{ $websiteLang->where('lang_key','select_city')->first()->custom_text }}</option>
                        @foreach ($cities as $item)
                        <option {{ $property->city_id==$item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name.', '.$item->countryState->name.', '.$item->countryState->country->name }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-xl-6 col-md-6">
                  <div class="wsus__property_input">
                    <label for="#">{{ $websiteLang->where('lang_key','address')->first()->custom_text }} <span class="text-danger">*</span></label>
                    <input type="text" name="address" value="{{ $property->address }}">
                  </div>
                </div>
                <div class="col-xl-6 col-md-6">
                  <div class="wsus__property_input">
                    <label for="#">{{ $websiteLang->where('lang_key','phone')->first()->custom_text }}</label>
                    <input type="text" name="phone" value="{{ $property->phone }}">
                  </div>
                </div>
                <div class="col-xl-6 col-md-6">
                  <div class="wsus__property_input">
                    <label for="#">{{ $websiteLang->where('lang_key','email')->first()->custom_text }} <span class="text-danger">*</span></label>
                    <input type="email" name="email" value="{{ $property->email }}">
                  </div>
                </div>
                <div class="col-xl-6 col-md-6">
                  <div class="wsus__property_input">
                    <label for="#">{{ $websiteLang->where('lang_key','website')->first()->custom_text }}</label>
                    <input type="url" name="website" value="{{ $property->website }}">
                  </div>
                </div>
                <div class="col-xl-6 col-md-6">
                  <div class="wsus__property_input">
                    <label for="#">{{ $websiteLang->where('lang_key','purpose')->first()->custom_text }} <span class="text-danger">*</span></label>
                    <select class="select_2" name="purpose" id="purpose">
                        @foreach ($purposes as $item)
                        <option {{ $property->property_purpose_id==$item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->custom_purpose }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-xl-6 col-md-6">
                    <div class="wsus__property_input">
                      <label for="#">{{ $websiteLang->where('lang_key','price')->first()->custom_text }} <span class="text-danger">*</span></label>
                      <input type="text" name="price" value="{{ $property->price }}">
                    </div>
                  </div>

                    @if ($property->property_purpose_id==2)
                        <div class="col-xl-6 col-md-6" id="period_box">
                            <div class="wsus__property_input">
                                <label for="#">{{ $websiteLang->where('lang_key','period')->first()->custom_text }} <span class="text-danger">*</span></label>
                                <select class="select_2" name="period" id="period">
                                    <option {{ $property->period=='Daily' ? 'selected' : '' }} value="Daily">{{ $websiteLang->where('lang_key','daily')->first()->custom_text }}</option>
                                    <option {{ $property->period=='Monthly' ? 'selected' : '' }} value="Monthly">{{ $websiteLang->where('lang_key','monthly')->first()->custom_text }}</option>
                                    <option {{ $property->period=='Yearly' ? 'selected' : '' }} value="Yearly">{{ $websiteLang->where('lang_key','yearly')->first()->custom_text }}</option>
                                </select>
                            </div>
                        </div>
                    @endif

                    @if ($property->property_purpose_id==1)
                        <div class="col-xl-6 col-md-6 d-none" id="period_box">
                            <div class="wsus__property_input">
                                <label for="#">{{ $websiteLang->where('lang_key','period')->first()->custom_text }} <span class="text-danger">*</span></label>
                                <select class="select_2" name="period" id="period">
                                    <option {{ $property->period=='Daily' ? 'selected' : '' }} value="Daily">{{ $websiteLang->where('lang_key','daily')->first()->custom_text }}</option>
                                    <option {{ $property->period=='Monthly' ? 'selected' : '' }} value="Monthly">{{ $websiteLang->where('lang_key','monthly')->first()->custom_text }}</option>
                                    <option {{ $property->period=='Yearly' ? 'selected' : '' }} value="Yearly">{{ $websiteLang->where('lang_key','yearly')->first()->custom_text }}</option>
                                </select>
                            </div>
                        </div>
                    @endif



              </div>
            </div>
            <div class="wsus__dash_info p_25 mt_25 pb_0">
              <div class="row">
                <h5 class="sub_heading">{{ $websiteLang->where('lang_key','others_info')->first()->custom_text }}</h5>
                <div class="col-xl-6 col-md-6">
                  <div class="wsus__property_input">
                    <label for="#">{{ $websiteLang->where('lang_key','total_area')->first()->custom_text }}({{ $websiteLang->where('lang_key','sqft')->first()->custom_text }}) <span class="text-danger">*</span></label>
                    <input type="text" name="area" value="{{  $property->area }}">
                  </div>
                </div>
                <div class="col-xl-6 col-md-6">
                  <div class="wsus__property_input">
                    <label for="#">{{ $websiteLang->where('lang_key','total_unit')->first()->custom_text }} <span class="text-danger">*</span></label>
                    <input type="text" name="unit" value="{{ $property->number_of_unit }}">
                  </div>
                </div>
                <div class="col-xl-6 col-md-6">
                  <div class="wsus__property_input">
                    <label for="#">{{ $websiteLang->where('lang_key','total_room')->first()->custom_text }} <span class="text-danger">*</span></label>
                    <input type="text" name="room" value="{{ $property->number_of_room }}">
                  </div>
                </div>
                <div class="col-xl-6 col-md-6">
                  <div class="wsus__property_input">
                    <label for="#">{{ $websiteLang->where('lang_key','total_bedroom')->first()->custom_text }} <span class="text-danger">*</span></label>
                    <input type="text" name="bedroom" value="{{ $property->number_of_bedroom }}">
                  </div>
                </div>
                <div class="col-xl-6 col-md-6">
                  <div class="wsus__property_input">
                    <label for="#">{{ $websiteLang->where('lang_key','total_bathroom')->first()->custom_text }} <span class="text-danger">*</span></label>
                    <input type="text" name="bathroom" value="{{ $property->number_of_bathroom }}">
                  </div>
                </div>
                <div class="col-xl-6 col-md-6">
                  <div class="wsus__property_input">
                    <label for="#">{{ $websiteLang->where('lang_key','total_floor')->first()->custom_text }} <span class="text-danger">*</span></label>
                    <input type="text" name="floor" value="{{ $property->number_of_floor }}">
                  </div>
                </div>
                <div class="col-xl-6 col-md-6">
                  <div class="wsus__property_input">
                    <label for="#">{{ $websiteLang->where('lang_key','total_kitchen')->first()->custom_text }}<span class="text-danger">*</span></label>
                    <input type="text" name="kitchen" value="{{ $property->number_of_kitchen }}">
                  </div>
                </div>
                <div class="col-xl-6 col-md-6">
                  <div class="wsus__property_input">
                    <label for="#">{{ $websiteLang->where('lang_key','parking_place')->first()->custom_text }} <span class="text-danger">*</span></label>
                    <input type="text" name="parking" value="{{ $property->number_of_parking }}">
                  </div>
                </div>
              </div>
            </div>
            <div class="wsus__dash_info edit_images p_25 mt_25 pb_0">
              <div class="row">
                <h5 class="sub_heading">{{ $websiteLang->where('lang_key','slider_img')->first()->custom_text }}</h5>
                @foreach ($property->propertyImages as $item)
                    <div class="col-xl-6 col-md-6 slider-tr-{{ $item->id }}">
                    <div class="wsus__edit_img">
                        <img src="{{ asset($item->image) }}"  alt="property" class="img-fluid w-100">
                        <i class="fal fa-trash-alt"  onclick="deleteSliderImg('{{ $item->id }}')"></i>
                    </div>
                    </div>
                @endforeach

                <div class="col-xl-8 col-md-8 mb_25">
                    <div id="dynamic-img-box">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="wsus__property_input">
                                    <label for="#">{{ $websiteLang->where('lang_key','img')->first()->custom_text }} <span class="text-danger">*</span></label>
                                    <input type="file" name="slider_images[]">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="medicine_row_input">
                                    <button class="mt_30" type="button" id="addDynamicImgBtn"><i class="fas fa-plus" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="dynamic_img_box" class="d-none">
                    <div class="row delete-dynamic-img-row mt-3">
                        <div class="col-md-9">
                            <div class="wsus__property_input">
                                <label for="#">{{ $websiteLang->where('lang_key','img')->first()->custom_text }} <span class="text-danger">*</span></label>
                                <input type="file" name="slider_images[]">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="medicine_row_input">
                                <button class="mt_30 danger_btn removeDynamicImgId" type="button"><i class="fas fa-trash" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

              </div>
            </div>
            <div class="wsus__dash_info existing_item p_25 mt_25 pb_0">
              <div class="row justify-content-between">
                <h5 class="sub_heading">{{ $websiteLang->where('lang_key','img_pdf_video')->first()->custom_text }}</h5>
                @if ($property->file)
                    <div class="col-xl-6 col-xxl-5 col-md-6 pdf-file-col-{{ $property->id }}">
                        <div class="wsus__property_input file">
                            <label>{{ $websiteLang->where('lang_key','exist_pdf')->first()->custom_text }}</label>
                            <p><a href="{{ route('download-listing-file',$property->file) }}">{{ $property->file }}</a></p>
                            <span class="del" onclick="deletePdfFile('{{ $property->id }}')"><i class="far fa-trash-alt"></i></span>
                        </div>
                    </div>
                @endif
                <div class="col-xl-12 col-md-6">
                  <div class="wsus__property_input">
                    <label for="#">{{ $websiteLang->where('lang_key','pdf_file')->first()->custom_text }}</label>
                    <input type="file" name="pdf_file">
                  </div>
                </div>
                <div class="col-xl-6 col-md-6">
                  <div class="wsus__property_input">
                    <label>{{ $websiteLang->where('lang_key','exist_banner_img')->first()->custom_text }}</label>
                    <img src="{{ asset($property->banner_image) }}" alt="property" class="img-fluid w-100">
                    <label for="#">{{ $websiteLang->where('lang_key','banner_img')->first()->custom_text }}</label>
                    <input type="file" name="banner_image">
                  </div>
                </div>
                <div class="col-xl-6 col-md-6">
                  <div class="wsus__property_input">
                    <label>{{ $websiteLang->where('lang_key','exist_thumb')->first()->custom_text }}</label>
                    <img src="{{ asset($property->thumbnail_image) }}" alt="property" class="img-fluid w-100">
                    <label for="#">{{ $websiteLang->where('lang_key','thumb_img')->first()->custom_text }}</label>
                    <input type="file" name="thumbnail_image">
                  </div>
                </div>
                <div class="col-xl-6 col-md-6">
                  <div class="wsus__property_input">
                    @if ($property->video_link)
                    <label>{{ $websiteLang->where('lang_key','exist_video')->first()->custom_text }}</label>
                    @php
                        $video_id=explode("=",$property->video_link);
                    @endphp
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video_id[1] }}" title="YouTube video player"  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @endif
                    <label class="mt-2" for="#">{{ $websiteLang->where('lang_key','video_link')->first()->custom_text }}</label>
                    <input type="text" name="video_link" value="{{ $property->video_link }}">
                  </div>
                </div>
              </div>
            </div>


            @if ($package->number_of_aminities==-1)
            <div class="wsus__dash_info dash_aminities p_25 mt_25 pb_0">
                <h5 class="sub_heading">{{ $websiteLang->where('lang_key','aminities')->first()->custom_text }}</h5>
                <div class="row">
                    @foreach ($aminities as $aminity)
                        @php
                            $isChecked=false;
                        @endphp
                        @foreach ($property->propertyAminities as $amnty)
                            @if ($aminity->id==$amnty->aminity_id)
                                @php
                                $isChecked=true;
                                @endphp
                            @endif
                        @endforeach

                        <div class="col-xl-4 col-sm-6 col-md-6 col-lg-4">
                            <div class="form-check">
                                <input class="form-check-input" {{ $isChecked ? 'checked' :'' }} type="checkbox" name="aminities[]" id="un-aminityId-{{ $aminity->id }}" value="{{ $aminity->id }}">
                                <label class="form-check-label" for="un-aminityId-{{ $aminity->id }}">
                                    {{ $aminity->aminity }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            @php
                $aminityList=[];
                foreach ($aminities as $index => $aminity) {
                    $aminityList[]=$aminity->id;
                }
            @endphp

          @else
            <div class="wsus__dash_info dash_aminities p_25 mt_25 pb_0">
                <h5 class="sub_heading">{{ $websiteLang->where('lang_key','aminities')->first()->custom_text }}</h5>
                <div class="row">
                    @foreach ($aminities as $aminity)
                        @php
                            $isChecked=false;
                        @endphp
                        @foreach ($property->propertyAminities as $amnty)
                            @if ($aminity->id==$amnty->aminity_id)
                                @php
                                $isChecked=true;
                                @endphp
                            @endif
                        @endforeach
                        <div class="col-xl-4 col-sm-6 col-md-6 col-lg-4">
                            <div class="form-check">
                                <input class="form-check-input is-check" {{ $isChecked ? 'checked' :'' }} type="checkbox" name="aminities[]" id="aminityId-{{ $aminity->id }}" value="{{ $aminity->id }}">
                                <label class="form-check-label" for="aminityId-{{ $aminity->id }}">
                                    {{ $aminity->aminity }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @php
                $aminityList=[];
                foreach ($aminities as $index => $aminity) {
                    $aminityList[]=$aminity->id;
                }
            @endphp
          @endif

          <div class="wsus__dash_info nearest_location p_25 mt_25">
            <h5 class="sub_heading">{{ $websiteLang->where('lang_key','nearest_loc')->first()->custom_text }}</h5>

            <div id="dyamic-nearest-place-box">
                @if ($property->propertyNearestLocations->count()>0)
                    @foreach ($property->propertyNearestLocations as $property_item)
                        <div class="row" id="exist-nearest-location-{{ $property_item->id }}">
                            <div class="col-xl-5 col-md-5">
                                <label for="#">{{ $websiteLang->where('lang_key','nearest_loc')->first()->custom_text }}</label>
                                <select class="custom-select-box" name="nearest_locations[]">
                                    <option value="">{{ $websiteLang->where('lang_key','select_nearest_loc')->first()->custom_text }}</option>
                                    @foreach ($nearest_locatoins as $item)
                                    <option {{ $property_item->nearest_location_id==$item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->location }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-5 col-md-5">
                                <label for="#">{{ $websiteLang->where('lang_key','distance')->first()->custom_text }}({{ $websiteLang->where('lang_key','km')->first()->custom_text }})</label>
                                <input type="text" name="distances[]" value="{{ $property_item->distance }}">
                            </div>
                            <div class="col-xl-2 col-md-2">
                                <button type="button" onclick="existNearestLocation('{{ $property_item->id }}')" class="common_btn mt_30">{{ $websiteLang->where('lang_key','remove')->first()->custom_text }}</button>
                            </div>
                        </div>
                    @endforeach
                @endif

                <div class="row">
                    <div class="col-xl-5 col-md-5">
                        <label>{{ $websiteLang->where('lang_key','nearest_loc')->first()->custom_text }}</label>
                        <select class="custom-select-box" name="nearest_locations[]">
                        <option value="">{{ $websiteLang->where('lang_key','select_nearest_loc')->first()->custom_text }}</option>
                            @foreach ($nearest_locatoins as $item)
                            <option value="{{ $item->id }}">{{ $item->location }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xl-5 col-md-5">
                        <label for="#">{{ $websiteLang->where('lang_key','distance')->first()->custom_text }}({{ $websiteLang->where('lang_key','km')->first()->custom_text }})</label>
                        <input type="text" name="distances[]">
                    </div>
                    <div class="col-xl-2 col-md-2">
                        <button class="common_btn mt_30" id="addDybanamicLocationBtn">{{ $websiteLang->where('lang_key','new')->first()->custom_text }}</button>
                    </div>
                </div>

            </div>

            <div id="hidden-location-box" class="d-none">
                <div class="delete-dynamic-location">
                    <div class="row mt-3">
                        <div class="col-xl-5 col-md-5">
                            <label>{{ $websiteLang->where('lang_key','nearest_loc')->first()->custom_text }}</label>
                            <select class="custom-select-box" name="nearest_locations[]">
                            <option value="">{{ $websiteLang->where('lang_key','select_nearest_loc')->first()->custom_text }}</option>
                                @foreach ($nearest_locatoins as $item)
                                <option value="{{ $item->id }}">{{ $item->location }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-5 col-md-5">
                            <label for="#">{{ $websiteLang->where('lang_key','distance')->first()->custom_text }}({{ $websiteLang->where('lang_key','km')->first()->custom_text }})</label>
                            <input type="text" name="distances[]">
                        </div>
                        <div class="col-xl-2 col-md-2">
                            <button class="common_btn mt_30 removeNearstPlaceBtnId" id="addDybanamicLocationBtn">{{ $websiteLang->where('lang_key','remove')->first()->custom_text }}</button>
                        </div>
                    </div>
                </div>
            </div>


          </div>
          <div class="wsus__dash_info pro_det_map p_25 mt_25 pb_0">
            <h5 class="sub_heading">{{ $websiteLang->where('lang_key','detail_google_map')->first()->custom_text }} </h5>
            <div class="wsus__property_input">
                <label for="#">{{ $websiteLang->where('lang_key','google_map')->first()->custom_text }}</label>
                <textarea cols="3" rows="3" name="google_map_embed_code" >{{ $property->google_map_embed_code }}</textarea>
            </div>
            <div class="wsus__property_inpuT">
                <label for="#">{{ $websiteLang->where('lang_key','des')->first()->custom_text }} <span class="text-danger">*</span></label>
              <textarea class="form-control summer_note" id="summernote" name="description">{{ $property->description }}</textarea>
            </div>
          </div>
          <div class="wsus__dash_info featured p_25 mt_25">
            <div class="row">
                @if ($package->is_featured)
                @if ($package->number_of_feature_property==-1)
                <div class="col-12">
                    <div class="wsus__property_input">
                        <label for="#">{{ $websiteLang->where('lang_key','featured')->first()->custom_text }} <span class="text-danger">*</span></label>
                        <select class="select_2" name="featured">
                            <option {{ $property->is_featured==1 ? 'selected': '' }} value="1">{{ $websiteLang->where('lang_key','yes')->first()->custom_text }}</option>
                            <option {{ $property->is_featured==0 ? 'selected': '' }} value="0">{{ $websiteLang->where('lang_key','no')->first()->custom_text }}</option>
                        </select>
                    </div>
                  </div>
                @elseif($package->number_of_feature_property > $existFeaturedProperty)
                    <div class="col-12">
                        <div class="wsus__property_input">
                            <label for="#">{{ $websiteLang->where('lang_key','featured')->first()->custom_text }} <span class="text-danger">*</span></label>
                            <select class="select_2" name="featured">
                                <option {{ $property->is_featured==1 ? 'selected': '' }} value="1">{{ $websiteLang->where('lang_key','yes')->first()->custom_text }}</option>
                                <option {{ $property->is_featured==0 ? 'selected': '' }} value="0">{{ $websiteLang->where('lang_key','no')->first()->custom_text }}</option>
                            </select>
                        </div>
                    </div>
                @endif
            @endif

            @if ($package->is_top)
                @if ($package->number_of_top_property==-1)
                <div class="col-12">
                    <div class="wsus__property_input">
                    <label for="#">{{ $websiteLang->where('lang_key','top_property')->first()->custom_text }} <span class="text-danger">*</span></label>
                    <select class="select_2" name="top_property">
                        <option {{ $property->top_property==1 ? 'selected' : '' }} value="1">{{ $websiteLang->where('lang_key','yes')->first()->custom_text }}</option>
                        <option {{ $property->top_property==0 ? 'selected' : '' }} value="0">{{ $websiteLang->where('lang_key','no')->first()->custom_text }}</option>
                    </select>
                    </div>
                </div>
                @elseif($package->number_of_top_property > $existTopProperty)
                <div class="col-12">
                    <div class="wsus__property_input">
                    <label for="#">{{ $websiteLang->where('lang_key','top_property')->first()->custom_text }} <span class="text-danger">*</span></label>
                    <select class="select_2" name="top_property">
                        <option {{ $property->top_property==1 ? 'selected' : '' }} value="1">{{ $websiteLang->where('lang_key','yes')->first()->custom_text }}</option>
                        <option {{ $property->top_property==0 ? 'selected' : '' }} value="0">{{ $websiteLang->where('lang_key','no')->first()->custom_text }}</option>
                    </select>
                    </div>
                </div>
                @endif
            @endif

            @if ($package->is_urgent)
                @if ($package->number_of_urgent_property==-1)
                    <div class="col-12">
                        <div class="wsus__property_input">
                            <label for="#">{{ $websiteLang->where('lang_key','urgent_property')->first()->custom_text }} <span class="text-danger">*</span></label>
                            <select class="select_2" name="urgent_property">
                                <option {{ $property->urgent_property==1 ? 'selected' : '' }} value="1">{{ $websiteLang->where('lang_key','yes')->first()->custom_text }}</option>
                                <option {{ $property->urgent_property==0 ? 'selected' : '' }} value="0">{{ $websiteLang->where('lang_key','no')->first()->custom_text }}</option>
                            </select>
                        </div>
                    </div>
                @elseif($package->number_of_urgent_property > $existUrgentProperty)
                    <div class="col-12">
                        <div class="wsus__property_input">
                            <label for="#">{{ $websiteLang->where('lang_key','urgent_property')->first()->custom_text }} <span class="text-danger">*</span></label>
                            <select class="select_2" name="urgent_property">
                                <option {{ $property->urgent_property==1 ? 'selected' : '' }} value="1">{{ $websiteLang->where('lang_key','yes')->first()->custom_text }}</option>
                                <option {{ $property->urgent_property==0 ? 'selected' : '' }} value="0">{{ $websiteLang->where('lang_key','no')->first()->custom_text }}</option>
                            </select>
                        </div>
                    </div>
                @endif
              @endif

              <div class="col-12">
                <div class="wsus__property_input">
                    <label for="#">{{ $websiteLang->where('lang_key','seo_title')->first()->custom_text }}</label>
                    <input type="text" name="seo_title" value="{{ $property->seo_title }}">
                </div>
              </div>
              <div class="col-xl-12">
                <div class="wsus__property_input">
                    <label for="#">{{ $websiteLang->where('lang_key','seo_des')->first()->custom_text }}</label>
                    <textarea cols="3" rows="3" name="seo_description">{{ $property->seo_description }}</textarea>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="common_btn">{{ $websiteLang->where('lang_key','update')->first()->custom_text }}</button>
              </div>
            </div>

          </div>
        </div>
    </div>
</div>

</form>
</div>





<script>
    (function($) {
    "use strict";
    $(document).ready(function () {

        var image=0;
        var newImage=1;
        var maxImage='{{ $package->number_of_photo }}';
        var location=0;
        var newLocation=1;
        var maxLocation='{{ $package->number_of_nearest_place }}';



        var ids = [];
        var aminityList=<?= json_encode($aminityList)?>;
        var maxAminity= <?= $package->number_of_aminities ?>;

        $('input[name="aminities[]"]:checked').each(function() {
            ids.push(this.value);
        });
        var idsLenth=ids.length;


        var checkedIds = ids.map((i) => Number(i));
        var unCheckedIds=aminityList.filter(d => !checkedIds.includes(d))


        if( maxAminity > idsLenth){
            for(var j=0; j< unCheckedIds.length ; j++){
                $("#aminityId-"+unCheckedIds[j]).prop("disabled", false);
            }
        }else{
            for(var j=0; j< unCheckedIds.length ; j++){
                $("#aminityId-"+unCheckedIds[j]).prop("disabled", true);
            }
        }


        $("#addDynamicImgBtn").on('click',function(e) {
            e.preventDefault();
            var newRow='';
            newRow += '<div class="row delete-dynamic-img-row">';
            newRow += '<div class="col-md-9">';
            newRow += '<label for="#">Image</label>';
            newRow += '<input type="file" name="slider_images[]">';
            newRow += ' </div>';
            newRow += '<div class="col-md-3 custom_add_row_btn">';
            newRow += '<input class="danger_btn_2 removeDynamicImgId" type="button" value="{{ $websiteLang->where("lang_key","remove")->first()->custom_text }}"/>';
            newRow += '</div>';
            newRow += '</div>';

            var dynaicImage = $("#dynamic_img_box").html();

            if(maxImage==-1){
                $("#dynamic-img-box").append(dynaicImage);
            }else{
                $.ajax({
                    type: 'GET',
                    url: "{{ url('user/exist-property-slider-img/') }}"+"/"+ '{{ $property->id }}',
                    success: function (response) {
                        var checkImage= response*1 +newImage*1
                        if(checkImage < maxImage){
                            newImage++;
                            $("#dynamic-img-box").append(dynaicImage);
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }

        })

        $(document).on('click', '.removeDynamicImgId', function () {
            newImage--;
            $(this).closest('.delete-dynamic-img-row').remove();
        });


        $("#addDybanamicLocationBtn").on('click',function(e) {
            e.preventDefault();
            if(maxLocation==-1){
                var newRow=$("#hidden-location-box").html()
                    $("#dyamic-nearest-place-box").append(newRow);
            }else{
                $.ajax({
                    type: 'GET',
                    url: "{{ url('user/find-exist-nearest-location/') }}"+"/"+ '{{ $property->id }}',
                    success: function (response) {
                        var checkImage= response*1 +newLocation*1
                        if(checkImage < maxLocation){
                            newLocation++;
                            var newRow=$("#hidden-location-box").html()
                            $("#dyamic-nearest-place-box").append(newRow);
                        }


                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }


        })

        $(document).on('click', '.removeNearstPlaceBtnId', function () {
                $(this).closest('.delete-dynamic-location').remove();
                newLocation--;
        });

        $("#title").on("focusout",function(e){
                $("#slug").val(convertToSlug($(this).val()));
            })

        $("#purpose").on("change",function(){
            var purposeId=$(this).val()
            if(purposeId==2){
                $("#period_box").removeClass('d-none');
            }else if(purposeId==1){
                $("#period_box").addClass('d-none');
            }
        })


        //start handle aminity
        $(".is-check").on("click",function(e){
            var ids = [];
            var aminityList=<?= json_encode($aminityList)?>;
            var maxAminity= <?= $package->number_of_aminities ?>;

            $('input[name="aminities[]"]:checked').each(function() {
                ids.push(this.value);
            });
            var idsLenth=ids.length;


            var checkedIds = ids.map((i) => Number(i));
            var unCheckedIds=aminityList.filter(d => !checkedIds.includes(d))


            if( maxAminity > idsLenth){
                for(var j=0; j< unCheckedIds.length ; j++){
                    $("#aminityId-"+unCheckedIds[j]).prop("disabled", false);
                }
            }else{
                for(var j=0; j< unCheckedIds.length ; j++){
                    $("#aminityId-"+unCheckedIds[j]).prop("disabled", true);
                }
            }

        })
        //end handle aminity



    });

    })(jQuery);


    function convertToSlug(Text)
    {
        return Text
            .toLowerCase()
            .replace(/[^\w ]+/g,'')
            .replace(/ +/g,'-');
    }


    function deleteSliderImg(id){
        // project demo mode check
        var isDemo="{{ env('PROJECT_MODE') }}"
        var demoNotify="{{ env('NOTIFY_TEXT') }}"
        if(isDemo==0){
            toastr.error(demoNotify);
            return;
        }
        // end

        $.ajax({
            type: 'GET',
            url: "{{ url('user/property-slider-img/') }}"+"/"+ id,
            success: function (response) {
                if(response.success){
                    toastr.success(response.success)
                    $(".slider-tr-"+id).remove()
                }
            },
            error: function(err) {
                console.log(err);
            }
        });
    }


    function deletePdfFile(id){

        // project demo mode check
        var isDemo="{{ env('PROJECT_MODE') }}"
        var demoNotify="{{ env('NOTIFY_TEXT') }}"
        if(isDemo==0){
            toastr.error(demoNotify);
            return;
        }
        // end

        $.ajax({
            type: 'GET',
            url: "{{ url('user/property-delete-pdf/') }}"+"/"+ id,
            success: function (response) {
                if(response.success){
                    toastr.success(response.success)
                    $(".pdf-file-col-"+id).remove()
                }
            },
            error: function(err) {
                console.log(err);
            }
        });
    }


    function existNearestLocation(id){
        // project demo mode check
        var isDemo="{{ env('PROJECT_MODE') }}"
        var demoNotify="{{ env('NOTIFY_TEXT') }}"
        if(isDemo==0){
            toastr.error(demoNotify);
            return;
        }
        // end

        $.ajax({
            type: 'GET',
            url: "{{ url('user/exist-nearest-location/') }}"+"/"+ id,
            success: function (response) {
                if(response.success){
                    toastr.success(response.success)
                    $("#exist-nearest-location-"+id).remove()
                }
            },
            error: function(err) {
                console.log(err);
            }
        });
    }

</script>
@endsection
