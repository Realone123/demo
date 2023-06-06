@extends('layouts.user.profile.layout')
@section('title')
    <title>{{ $websiteLang->where('lang_key','my_review')->first()->custom_text }}</title>
@endsection
@section('user-dashboard')

<div class="row">
    <div class="col-xl-9 ms-auto">
        <div class="wsus__dashboard_main_content">
          <div class="wsus__dash_riview">
            <h4 class="heading">{{ $websiteLang->where('lang_key','my_review')->first()->custom_text }}</h4>
            <div class="row">
              <div class="col-xl-12">
                    <div class="wsus__dash_info p_25 pb_0 pt_0 xs_pl_15 xs_pr_15">
                        @foreach ($myReviews as $item)
                            <div class="wsus__message_single">
                                <div class="wsus__message_img">
                                    <img src="{{ url($item->property->thumbnail_image) }}" alt="img" class="img-fluid">
                                </div>
                                <div class="wsus__message_text">
                                    @php
                                        $avg=$item->avarage_rating;
                                        $intAvg=intval($avg);
                                        $nextVal=$intAvg+1;
                                        $reviewPoint=$intAvg;
                                        $halfReview=false;
                                        if($intAvg < $avg && $avg < $nextVal){
                                            $reviewPoint= $intAvg + 0.5;
                                            $halfReview=true;
                                        }
                                    @endphp

                                    <p>
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
                                    </p>
                                    <a href="{{ route('property.details',$item->property->slug) }}" class="ttile">{{ $item->property->title }}</a>
                                    <span>{{ $item->created_at->format('d M Y') }}</span>
                                    <p>{{ $item->comment }}</p>

                                </div>
                                <div class="wsus__message_icon">
                                    <a class="del" href="{{ route('user.delete-review',$item->id) }}"><i class="fas fa-trash"></i></a>
                                    <a class="edit" href="{{ route('user.edit-review',$item->id) }}"><i class="fal fa-edit"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{ $myReviews->links('user.paginator') }}
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
