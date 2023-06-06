@extends('layouts.user.layout')
@section('title')
    <title>{{ $menus->where('id',13)->first()->navbar }}</title>
@endsection
@section('meta')
    <meta name="description" content="lorem ipsum">
@endsection

@section('user-content')
 
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image " data-bs-bg="{{ asset('user/admin/img/bg/14.jpg')}}" style="background-image: url(&quot;img/bg/14.jpg&quot;);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__breadcrumb-inner">
                           <div class="ltn__breadcrumb-list">
                                <ul>
                                    <li><a href="{{ route('home') }}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> {{ $menus->where('id',1)->first()->navbar }}</a></li>
                                    <li>{{ $menus->where('id',13)->first()->navbar }}  </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<!--=======LOGON PART START=========-->


 <div class="ltn__login-area pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area text-center">
                            <h1 class="section-title">Forget Password</h1>
                        
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="account-login-inner">
                            <form  id="forgetFormSubmit"  class="ltn__form-box contact-form-box" style="padding:5px 5px">
                                 @csrf
                                <input type="email" id="regEmail" name="email" placeholder="{{ $websiteLang->where('lang_key','email')->first()->custom_text }}">
                                 @if($setting->allow_captcha==1)
                            <div class="form-group mt-2">
                                <div class="input-group input-group-lg">
                                    <div class="g-recaptcha" data-sitekey="{{ $setting->captcha_key }}"></div>
                                </div>
                            </div>
                            @endif
                                <div class="btn-wrapper bt-view">
                                    <button id="forgBtn" class="theme-btn-1 btn reverse-color btn-block" type="submit">{{ $websiteLang->where('lang_key','send_mail')->first()->custom_text }}</button>
                                </div>
                            </form>
                            <div class="by-agree text-center">
                                  <div class="go-to-btn mt-5p">
                                    <a href="{{ route('login') }}">Login Here</a>
                                  
                                </div>  
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<!--======= LOGON PART END========-->



    @php
    $search_url = request()->fullUrl();
@endphp

<script>
    (function($) {
    "use strict";
    $(document).ready(function () {

        $("#forgetFormSubmit").on('submit',function(e){
            e.preventDefault();

                // project demo mode check
                var isDemo="{{ env('PROJECT_MODE') }}"
                var demoNotify="{{ env('NOTIFY_TEXT') }}"
                if(isDemo==0){
                    toastr.error(demoNotify);
                    return;
                }
                // end

            $("#forg-spinner").removeClass('d-none')
            $("#forgBtn").addClass('custom-opacity')
            $("#forgBtn").attr('disabled',true);
            $.ajax({
                url: "{{ route('send.forget.password') }}",
                type:"post",
                data:$('#forgetFormSubmit').serialize(),
                success:function(response){
                    if(response.success){
                        $("#forgetFormSubmit").trigger("reset");
                        $("#forg-spinner").addClass('d-none')
                        $("#forgBtn").removeClass('custom-opacity')
                        $("#forgBtn").attr('disabled',false);
                        toastr.success(response.success)
                    }
                    if(response.error){
                        $("#forg-spinner").addClass('d-none')
                        $("#forgBtn").removeClass('custom-opacity')
                        $("#forgBtn").attr('disabled',false);
                        toastr.error(response.error)

                        var query_url='<?php echo $search_url; ?>';
                        window.location.href = query_url;

                    }
                },
                error:function(response){
                    if(response.responseJSON.errors.email){
                        $("#forg-spinner").addClass('d-none')
                        $("#forgBtn").removeClass('custom-opacity')
                        $("#forgBtn").attr('disabled',false);
                        toastr.error(response.responseJSON.errors.email[0])
                    }else{
                        $("#forg-spinner").addClass('d-none')
                        $("#forgBtn").removeClass('custom-opacity')
                        $("#forgBtn").attr('disabled',false);
                        $("#forgBtn").addClass('site-btn-effect')
                        toastr.error('Please Complete the recaptcha to submit the form')
                    }



                }

            });

        })

        $("#forgBtn").on('click',function(e) {
            e.preventDefault();
                // project demo mode check
                var isDemo="{{ env('PROJECT_MODE') }}"
                var demoNotify="{{ env('NOTIFY_TEXT') }}"
                if(isDemo==0){
                    toastr.error(demoNotify);
                    return;
                }
                // end
            $("#forg-spinner").removeClass('d-none')
            $("#forgBtn").addClass('custom-opacity')
            $("#forgBtn").attr('disabled',true);
            $.ajax({
                url: "{{ route('send.forget.password') }}",
                type:"post",
                data:$('#forgetFormSubmit').serialize(),
                success:function(response){
                    if(response.success){
                        $("#forgetFormSubmit").trigger("reset");
                        $("#forg-spinner").addClass('d-none')
                        $("#forgBtn").removeClass('custom-opacity')
                        $("#forgBtn").attr('disabled',false);
                        toastr.success(response.success)
                    }
                    if(response.error){

                        $("#forg-spinner").addClass('d-none')
                        $("#forgBtn").removeClass('custom-opacity')
                        $("#forgBtn").attr('disabled',false);
                        toastr.error(response.error)

                        var query_url='<?php echo $search_url; ?>';
                        window.location.href = query_url;
                    }
                },
                error:function(response){
                    if(response.responseJSON.errors.email){
                        $("#forg-spinner").addClass('d-none')
                        $("#forgBtn").removeClass('custom-opacity')
                        $("#forgBtn").attr('disabled',false);
                        toastr.error(response.responseJSON.errors.email[0])
                    }else{
                        $("#forg-spinner").addClass('d-none')
                        $("#forgBtn").removeClass('custom-opacity')
                        $("#forgBtn").attr('disabled',false);
                        $("#forgBtn").addClass('site-btn-effect')
                        toastr.error('Please Complete the recaptcha to submit the form')
                    }


                }

            });


        })




    });

    })(jQuery);
</script>

@endsection

