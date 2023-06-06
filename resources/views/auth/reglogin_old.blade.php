@extends('layouts.user.layout')
@section('title')
    <title>{{ $menus->where('id',12)->first()->navbar }}</title>
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
                                    <li>{{ $menus->where('id',12)->first()->navbar }}  </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

     <!-- end-->
      <!-- end-->
     <div class="ltn__login-area pb-110">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area text-center">
                            <h1 class="section-title">Sign Up</h1>
                        
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        
                        <div class="account-login-inner">
                             <form id="registerFormSubmit" class="ltn__form-box contact-form-box" style="padding:5px 5px">
                                     
                        @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>First name</label>
                                    <div class="input-item input-item-name ltn__custom-icon">
                                                    <input type="text" id="regName" name="name" placeholder="Enter your name">
                                                </div>
                                   
                                    </div>
                                 <div class="col-lg-6">
                                     <label>Last Name</label>
                                      <div class="input-item input-item-name ltn__custom-icon">
                                                    <input type="text"name="lastname" id="lastname" placeholder="Lastname">
                                                </div>
                                     
                                  </div>
                                   <div class="col-lg-6">
                                     <label>Email</label>
                                     <div class="input-item input-item-email ltn__custom-icon">
                                                    <input type="email" id="regEmail" name="email" placeholder="{{ $websiteLang->where('lang_key','email')->first()->custom_text }}">
                                                </div>
                                 
                                  </div>
                                  
                                   <div class="col-lg-6">
                                     <label>Phone No</label>
                                       <div class="input-item input-item-phone ltn__custom-icon">
                                                    <input type="text"  name="phone" id="phone" placeholder="phone">
                                                </div>
                                     </div>
                                  
                        
                                     <div class="col-lg-12">
                                         <label>Address</label>
                                  <div class="input-item input-item-textarea ltn__custom-icon">
                                            <textarea name="message" name="address" id="address" placeholder="Residency"></textarea>
                                        </div>
                                   
                                  </div>
                                  
                                    <div class="col-lg-6">
                                     <label>I am Looking to Invest</label>
                                       
                                  <select name="investment_capacity" id="investment_capacity" class=" " style="color: #a8b2b2; width:100% ! important"  placeholder="Am Looking to Invest">
                                                                                  <option hidden Required>Select Am Looking to Invest </option>
                                                                                    <option value="$50000 - $100000">$50000 - $100000 </option>
                                                                                                                             <option value="$100000 - $500000">$100000 - $500000</option>
                                                                                                                             <option value="More than $2500000">More than $2500000</option>

                                     </select>
                                  </div>
                                  
                                   <div class="col-lg-6">
                                       <label>I am Looking to Invest</label>
                                        <select name="about_hear" id="invabout_hear"  class=""  style="color: #a8b2b2;" placeholder="How did you hear about us">
                                                                                  <option hidden Required>Select How did you hear about us </option>
                                            <option value="friends">Friends </option>
                                            <option value="relatives">Relatives</option>
                                     </select>
                                   </div>
                                   
                                                                               
                                   
                                   <div class="col-lg-6">
                                       <label>Create Password</label>
                                          <div class="input-item input-item-eye ltn__custom-icon">
                                                    <input type="password" id="regPassword" name="password" placeholder="{{ $websiteLang->where('lang_key','pass')->first()->custom_text }}">
                                                </div>
                                       </div>  
                                    <!--<div class="col-lg-6">-->
                                    <!--     <label>Conform Password</label>-->
                                    <!--      <div class="input-item input-item-eye ltn__custom-icon">-->
                                    <!--                <input type="password"  name="conform Password" id="conformpassword" placeholder="Conform Password">-->
                                    <!--            </div>-->
                                    <!--   </div>  -->
                                  
                                
                                 <label class="checkbox-inline">
                                        <input type="checkbox" value="">
                                        I consent to Herboil processing my personal data in order to send personalized marketing material in accordance with the consent form and the privacy policy.
                                    </label>
                                    <label class="checkbox-inline">
                                            <input type="checkbox" value="">
                                            By clicking "create account", I consent to the privacy policy.
                                        </label>
                                         @if($setting->allow_captcha==1)
                        <div class="form-group mt-2">
                            <div class="input-group input-group-lg">
                                <div class="g-recaptcha" data-sitekey="{{ $setting->captcha_key }}"></div>
                            </div>
                        </div>
                        @endif
                                <div class="btn-wrapper bt-view">
                                     <button id="registerBtn" class="theme-btn-1 btn reverse-color btn-block" type="submit"><i id="reg-spinner" class="loading-icon fa fa-spin fa-spinner d-none"></i> {{ $websiteLang->where('lang_key','create_account')->first()->custom_text }}</button>
                    
                                    
                                </div> 
                                  
                                  
                                </div>
                        
                                      
                            </form>
                            <div class="by-agree text-center">
                                   <div class="go-to-btn mt-5p">
                                     
                                        <a href="{{ route('login') }}">ALREADY HAVE AN ACCOUNT ? <span>LOGIN</span></a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     <!---time line-->


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
                    }


                }

            });

            }

        })

    });

    })(jQuery);
</script>

@endsection


