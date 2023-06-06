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
                    <h4>{{ $menus->where('id',6)->first()->navbar }}</h4>
                    <nav style="--bs-breadcrumb-divider: '-';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ $menus->where('id',1)->first()->navbar }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $menus->where('id',6)->first()->navbar }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!--===BREADCRUMB PART END====-->


<!--=========AGENT START============-->
<section class="wsus__agents mt_20 mb_45">
  <div class="container">
    <div class="row">
        @foreach ($agents as $agent)
            @php
                $isOrder=$orders->where('user_id',$agent->id)->count();
            @endphp
            @if ($isOrder >0)
            <div class="col-xl-3 col-sm-6 col-lg-4">
                <div class="wsus__single_team">
                <a href="{{ route('agent.show',['user_type' => '2','user_name'=>$agent->slug]) }}" class="wsus__single_team_img">
                    <img src="{{ $agent->image ? url($agent->image) : url($default_profile_image->image) }}" alt="team images" class="imf-fluid w-100">
                </a>
                <a href="{{ route('agent.show',['user_type' => '2','user_name'=>$agent->slug]) }}" class="title">{{ $agent->name }}</a>
                <p><i class="fal fa-location-circle"></i> {{ $agent->address }}</p>
                <ul class="agent_link">
                    @if ($agent->icon_one && $agent->link_one)
                    <li><a href="{{ $agent->link_one }}"><i class="{{ $agent->icon_one }}"></i></a></li>
                    @endif

                    @if ($agent->icon_two && $agent->link_two)
                    <li><a href="{{ $agent->link_two }}"><i class="{{ $agent->icon_two }}"></i></a></li>
                    @endif

                    @if ($agent->icon_three && $agent->link_three)
                    <li><a href="{{ $agent->link_three }}"><i class="{{ $agent->icon_three }}"></i></a></li>
                    @endif

                    @if ($agent->icon_four && $agent->link_four)
                    <li><a href="{{ $agent->link_four }}"><i class="{{ $agent->icon_four }}"></i></a></li>
                    @endif
                </ul>
                </div>
            </div>
            @endif
        @endforeach

      <div class="col-12 mt_25">
        {{ $agents->links('user.paginator') }}
      </div>
    </div>
  </div>
</section>
<!--=========AGENT END==========-->
@endsection
