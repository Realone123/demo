@extends('layouts.user.profile.layout')
@section('title')
    <title>{{ $websiteLang->where('lang_key','client_review')->first()->custom_text }}</title>
@endsection
@section('user-dashboard')
<div class="row">
    <div class="col-xl-9 ms-auto">
        <div class="wsus__dashboard_main_content">
          <div class="wsus__dash_riview">
            <h4 class="heading">{{ $websiteLang->where('lang_key','client_review')->first()->custom_text }}</h4>
            <div class="row">
              <div class="col-xl-12">
                <div class="wsus__dash_info client_message p_25 pb_0 pt_0 xs_pl_15 xs_pr_15">
                    @foreach ($clientReviews as $item)
                        <div class="wsus__message_single">
                            <div class="wsus__message_img">
                                <img src="{{ $item->user_image ? url($item->user_image) : url($agent_default_profile->image) }}" alt="img" class="img-fluid">
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
                                <a href="{{ route('agent.show',['user_type' => '2','user_name'=>$item->user_slug]) }}" class="ttile">{{ $item->name }}</a>
                                <span>{{ $item->created_at->format('d M Y') }}</span>
                                <a href="{{ route('property.details',$item->slug) }}" class="sub_title">{{ $item->title }}</a>
                                <p>{{ $item->comment }}</p>
                            </div>
                            <div class="wsus__message_icon">
                                <a class="edit" href="{{ route('property.details',$item->slug) }}"><i class="far fa-eye"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{ $clientReviews->links('user.paginator') }}

              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
