@extends('layouts.user.layout')
@section('title')
    <title>{{ $menus->where('id',12)->first()->navbar }}</title>
@endsection
@section('user-content')

<!--===BREADCRUMB PART START====-->
<!--  <section class="wsus__breadcrumb" style="background: url({{ url($banner_image->image) }});">-->
<!--    <div class="wsus_bread_overlay">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class="col-12 text-center">-->
<!--                    <h4>{{ $menus->where('id',12)->first()->navbar }}</h4>-->
<!--                    <nav style="--bs-breadcrumb-divider: '-';" aria-label="breadcrumb">-->
<!--                        <ol class="breadcrumb">-->
<!--                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ $menus->where('id',1)->first()->navbar }}</a></li>-->
<!--                            <li class="breadcrumb-item active" aria-current="page">{{ $menus->where('id',12)->first()->navbar }}</li>-->
<!--                        </ol>-->
<!--                    </nav>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!--===BREADCRUMB PART END====-->


<!--=======LOGON PART START=========-->
<!--<section class="wsus__logon mt_45 mb_45">-->
<!--    <div class="container">-->
<!--        <div class="row justify-content-center">-->
<!--            <div class="col-xl-5 col-md-6">-->
<!--                <div class="wsus__login_form">-->
<!--                    <h3>{{ $websiteLang->where('lang_key','if_account_exist')->first()->custom_text }} {{ $websiteLang->where('lang_key','login_here')->first()->custom_text }}</h3>-->
<!--                    <form id="loginFormSubmit" method="post">-->
<!--                        @csrf-->
<!--                        <div class="form-group">-->
<!--                            <div class="input-group input-group-lg">-->
<!--                                <div class="input-group-prepend">-->
<!--                                    <span class="input-group-text">-->
<!--                                        <i class="fad fa-user-circle"></i>-->
<!--                                    </span>-->
<!--                                </div>-->
<!--                                <input id="loginEmail" class="form-control form-control-lg" type="email" name="email" placeholder="{{ $websiteLang->where('lang_key','email')->first()->custom_text }}" value="{{ env('PROJECT_MODE')==0 ? 'agent@gmail.com' : '' }}">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <div class="input-group input-group-lg">-->
<!--                                <div class="input-group-prepend">-->
<!--                                    <span class="input-group-text">-->
<!--                                        <i class="fas fa-key"></i>-->
<!--                                    </span>-->
<!--                                </div>-->
<!--                                <input id="loginPassword" class="form-control form-control-lg" type="password" name="password" placeholder="{{ $websiteLang->where('lang_key','pass')->first()->custom_text }}" value="{{ env('PROJECT_MODE')==0 ? 1234 : '' }}">-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        @if($setting->allow_captcha==1)-->
<!--                            <div class="form-group mt-2">-->
<!--                                <div class="input-group input-group-lg">-->
<!--                                    <div class="g-recaptcha" data-sitekey="{{ $setting->captcha_key }}"></div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            @endif-->

<!--                        <div class="wsus__check_area">-->
<!--                            <div class="form-check">-->
<!--                                <input name="remember" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">-->
<!--                                <label class="form-check-label" for="flexCheckDefault">-->
<!--                                    {{ $websiteLang->where('lang_key','remember')->first()->custom_text }}-->
<!--                                </label>-->
<!--                            </div>-->
<!--                            <a href="{{ route('forget.password') }}">{{ $websiteLang->where('lang_key','forget_your_pass')->first()->custom_text }}</a>-->
<!--                        </div>-->
<!--                        <div class="wsus__reg_forget">-->
<!--                            <button class="common_btn" type="submit" id="userLoginBtn">{{ $websiteLang->where('lang_key','login')->first()->custom_text }}</button>-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-xl-5 col-md-6 offset-xl-1 ml_to_mr">-->
<!--                <div class="wsus__login_form ">-->
<!--                    <h3>{{ $websiteLang->where('lang_key','dont_have_account')->first()->custom_text }} {{ $websiteLang->where('lang_key','please_register')->first()->custom_text }}</h3>-->
<!--                    <form id="registerFormSubmit">-->
<!--                        @csrf-->
<!--                        <div class="form-group">-->
<!--                            <div class="input-group input-group-lg">-->
<!--                                <div class="input-group-prepend">-->
<!--                                    <span class="input-group-text">-->
<!--                                        <i class="fad fa-user-circle"></i>-->
<!--                                    </span>-->
<!--                                </div>-->
<!--                                <input class="form-control form-control-lg" type="text" name="name" id="regName" placeholder="{{ $websiteLang->where('lang_key','name')->first()->custom_text }}">-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="form-group">-->
<!--                            <div class="input-group input-group-lg">-->
<!--                                <div class="input-group-prepend">-->
<!--                                    <span class="input-group-text">-->
<!--                                        <i class="fas fa-envelope"></i>-->
<!--                                    </span>-->
<!--                                </div>-->
<!--                                <input class="form-control form-control-lg" type="email" id="regEmail" name="email" placeholder="{{ $websiteLang->where('lang_key','email')->first()->custom_text }}">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <div class="input-group input-group-lg">-->
<!--                                <div class="input-group-prepend">-->
<!--                                    <span class="input-group-text">-->
<!--                                        <i class="fas fa-key"></i>-->
<!--                                    </span>-->
<!--                                </div>-->
<!--                                <input class="form-control form-control-lg" type="password" id="regPassword" name="password" placeholder="{{ $websiteLang->where('lang_key','pass')->first()->custom_text }}">-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        @if($setting->allow_captcha==1)-->
<!--                        <div class="form-group mt-2">-->
<!--                            <div class="input-group input-group-lg">-->
<!--                                <div class="g-recaptcha" data-sitekey="{{ $setting->captcha_key }}"></div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        @endif-->

<!--                        <button id="registerBtn" class="common_btn" type="submit"><i id="reg-spinner" class="loading-icon fa fa-spin fa-spinner d-none"></i> {{ $websiteLang->where('lang_key','create_account')->first()->custom_text }}</button>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!--======= LOGON PART END========-->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image " data-bs-bg="{{ asset('user/admin/img/bg/14.jpg')}}" style="background-image: url(&quot;img/bg/14.jpg&quot;);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__breadcrumb-inner">
                           <div class="ltn__breadcrumb-list">
                                <ul>
                                    <li><a href="{{ route('home') }}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> {{ $menus->where('id',1)->first()->navbar }}</a></li>
                                    <li>{{ $menus->where('id',12)->first()->navbar }}  </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

     <!-- end-->
      <div class="ltn__login-area pb-110">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area text-center">
                            <h1 class="section-title">LOGIN</h1>
                        
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="account-login-inner">
                            <form id="loginFormSubmit" method="post" class="ltn__form-box contact-form-box" style="padding:5px 5px">
                        @csrf
                            
                               
                                 <input id="loginEmail" class="form-control form-control-lg" type="text" name="email" placeholder="{{ $websiteLang->where('lang_key','email')->first()->custom_text }}" value="">
                                 
                               
                                  <input id="loginPassword" type="password" name="password" placeholder="{{ $websiteLang->where('lang_key','pass')->first()->custom_text }}" value="">
                                
                                
                                
                                
                                <div class="btn-wrapper bt-view">
                                    <button class="theme-btn-1 btn reverse-color btn-block" type="submit" id="userLoginBtn">LOGIN</button>
                                </div>
                           
                            <div class="by-agree text-center">
                                  <div class="go-to-btn mt-5p">
                                    <a href="{{ route('forget.password') }}">FORGOT YOUR PASSWORD? </a>
                                  
                                </div>  
                                <div class="go-to-btn mt-5p">
                                     
                                        <a href="{{ route('register') }}"> DON'T HAVE AN ACCOUNT ? <span>SIGN UP</span></a>
                                    </div>
                            </div>
                             </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@php
    $search_url = request()->fullUrl();
@endphp


<script>
    (function($) {
    "use strict";
    $(document).ready(function () {
        $("#userLoginBtn").on('click',function(e) {
           
            e.preventDefault();
            $.ajax({
                url: "{{ route('login') }}",
                type:"post",
                data:$('#loginFormSubmit').serialize(),
                success:function(response){
                    if(response.success){
                      
                        window.location.href = "{{ route('user.dashboard')}}";
                      

                    }
                    if(response.error){
                        toastr.error(response.error)

                        var query_url='<?php echo $search_url; ?>';
                        window.location.href = query_url;

                    }
                },
                error:function(response){
                    if(response.responseJSON.errors.email)toastr.error(response.responseJSON.errors.email[0])
                    if(response.responseJSON.errors.password){
                        toastr.error(response.responseJSON.errors.password[0])
                    }else{
                        toastr.error('Please Complete the recaptcha to submit the form')
                    }


                }

            });


        })


        $(document).on('keyup', '#loginEmail, #loginPassword', function (e) {
            if(e.keyCode == 13){
                e.preventDefault();

                $.ajax({
                url: "{{ route('login') }}",
                type:"post",
                data:$('#loginFormSubmit').serialize(),
                success:function(response){
                    if(response.success){
                        window.location.href = "{{ route('user.dashboard')}}";
                        toastr.success(response.success)

                    }
                    if(response.error){
                        toastr.error(response.error)

                        var query_url='<?php echo $search_url; ?>';
                        window.location.href = query_url;

                    }
                },
                error:function(response){


                    if(response.responseJSON.errors.email)toastr.error(response.responseJSON.errors.email[0])
                    if(response.responseJSON.errors.password){
                        toastr.error(response.responseJSON.errors.password[0])
                    }else{
                        toastr.error('Please Complete the recaptcha to submit the form')
                    }

                }

            });
            }

        })



        $("#registerBtn").on('click',function(e) {
            e.preventDefault();
                // project demo mode check
                var isDemo="{{ env('PROJECT_MODE') }}"
                var demoNotify="{{ env('NOTIFY_TEXT') }}"
                if(isDemo==0){
                    toastr.error(demoNotify);
                    return;
                }
                // end
            $("#reg-spinner").removeClass('d-none')
            $("#registerBtn").addClass('custom-opacity')
            $("#registerBtn").attr('disabled',true);
            $.ajax({
                url: "{{ route('register') }}",
                type:"post",
                data:$('#registerFormSubmit').serialize(),
                success:function(response){
                    if(response.success){
                        $("#registerFormSubmit").trigger("reset");
                        $("#reg-spinner").addClass('d-none')
                        $("#registerBtn").removeClass('custom-opacity')
                        $("#registerBtn").attr('disabled',false);
                        toastr.success(response.success)
                    }
                    if(response.error){
                        toastr.error(response.error)

                        var query_url='<?php echo $search_url; ?>';
                        window.location.href = query_url;
                    }
                },
                error:function(response){
                    if(response.responseJSON.errors.name){
                        $("#reg-spinner").addClass('d-none')
                        $("#registerBtn").removeClass('custom-opacity')
                        $("#registerBtn").attr('disabled',false);
                        $("#registerBtn").addClass('site-btn-effect')
                        toastr.error(response.responseJSON.errors.name[0])
                    }

                    if(response.responseJSON.errors.email){
                        $("#reg-spinner").addClass('d-none')
                        $("#registerBtn").removeClass('custom-opacity')
                        $("#registerBtn").attr('disabled',false);
                        $("#registerBtn").addClass('site-btn-effect')
                        toastr.error(response.responseJSON.errors.email[0])
                    }

                    if(response.responseJSON.errors.password){
                        $("#reg-spinner").addClass('d-none')
                        $("#registerBtn").removeClass('custom-opacity')
                        $("#registerBtn").attr('disabled',false);
                        $("#registerBtn").addClass('site-btn-effect')
                        toastr.error(response.responseJSON.errors.password[0])
                    }else{
                        $("#reg-spinner").addClass('d-none')
                        $("#registerBtn").removeClass('custom-opacity')
                        $("#registerBtn").attr('disabled',false);
                        $("#registerBtn").addClass('site-btn-effect')
                        toastr.error('Please Complete the recaptcha to submit the form')
                    }



                }

            });


        })

        $(document).on('keyup', '#regEmail, #regPassword, #regName', function (e) {
            if(e.keyCode == 13){
                e.preventDefault();
                // project demo mode check
                var isDemo="{{ env('PROJECT_MODE') }}"
                var demoNotify="{{ env('NOTIFY_TEXT') }}"
                if(isDemo==0){
                    toastr.error(demoNotify);
                    return;
                }
                // end
            $("#reg-spinner").removeClass('d-none')
            $("#registerBtn").addClass('custom-opacity')
            $("#registerBtn").attr('disabled',true);
            $.ajax({
                url: "{{ route('register') }}",
                type:"post",
                data:$('#registerFormSubmit').serialize(),
                success:function(response){
                    if(response.success){
                        $("#registerFormSubmit").trigger("reset");
                        $("#reg-spinner").addClass('d-none')
                        $("#registerBtn").removeClass('custom-opacity')
                        $("#registerBtn").attr('disabled',false);
                        toastr.success(response.success)
                    }
                    if(response.error){
                        toastr.error(response.error)
                        var query_url='<?php echo $search_url; ?>';
                        window.location.href = query_url;
                    }
                },
                error:function(response){
                    if(response.responseJSON.errors.name){
                        $("#reg-spinner").addClass('d-none')
                        $("#registerBtn").removeClass('custom-opacity')
                        $("#registerBtn").attr('disabled',false);
                        $("#registerBtn").addClass('site-btn-effect')
                        toastr.error(response.responseJSON.errors.name[0])
                    }

                    if(response.responseJSON.errors.email){
                        $("#reg-spinner").addClass('d-none')
                        $("#registerBtn").removeClass('custom-opacity')
                        $("#registerBtn").attr('disabled',false);
                        $("#registerBtn").addClass('site-btn-effect')
                        toastr.error(response.responseJSON.errors.email[0])
                    }

                    if(response.responseJSON.errors.password){
                        $("#reg-spinner").addClass('d-none')
                        $("#registerBtn").removeClass('custom-opacity')
                        $("#registerBtn").attr('disabled',false);
                        $("#registerBtn").addClass('site-btn-effect')
                        toastr.error(response.responseJSON.errors.password[0])
                    }else{
                        $("#reg-spinner").addClass('d-none')
                        $("#registerBtn").removeClass('custom-opacity')
                        $("#registerBtn").attr('disabled',false);
                        $("#registerBtn").addClass('site-btn-effect')
                        toastr.error('Please Complete the recaptcha to submit the form')
                    }


                }

            });

            }

        })

    });

    })(jQuery);
</script>

@endsection


