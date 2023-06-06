@extends('layouts.user.layout')
@section('title')
    <title>{{ $page->seo_title }}</title>
@endsection
@section('user-content')
    <!--===BREADCRUMB PART START====-->
  <section class="wsus__breadcrumb" style="background: url({{ url($banner_image->image) }});">
    <div class="wsus_bread_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h4>{{ $page->page_name }}</h4>
                    <nav style="--bs-breadcrumb-divider: '-';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ $menus->where('id',1)->first()->navbar }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $page->page_name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!--===BREADCRUMB PART END====-->


<!--=========PRIVACY PART START============-->
<section class="wsus__custome_page mt_40 mb_20">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wsus__privacy_text">
                    {!! clean($page->description) !!}
                </div>
            </div>
        </div>
    </div>
</section>
<!--=========PRIVACY PART END==========-->
@endsection
