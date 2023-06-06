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
                                <form class="user" id="adminLoginForm" method="post" class="ltn__form-box contact-form-box" style="padding:5px 5px"> 
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-lg"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="{{ $websiteLang->where('lang_key','email')->first()->custom_text }}" value="{{ env('PROJECT_MODE')==0 ? 'admin@gmail.com' : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-lg"
                                            id="exampleInputPassword" placeholder="{{ $websiteLang->where('lang_key','pass')->first()->custom_text }}" value="{{ env('PROJECT_MODE')==0 ? 1234 : '' }}">
                                    </div>
                                     <div class="btn-wrapper bt-view">
                                    <button type="button" id="adminLoginBtn" class="theme-btn-1 btn reverse-color btn-block">
                                        {{ $websiteLang->where('lang_key','login')->first()->custom_text }}
                                    </button>
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


<script>
    (function($) {
    "use strict";
    $(document).ready(function () {
        $("#adminLoginBtn").on('click',function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('admin.login') }}",
                type:"post",
                data:$('#adminLoginForm').serialize(),
                success:function(response){
                    if(response.success){
                        
                        window.location.href = "{{ route('admin.dashboard')}}";
                        toastr.success(response.success)
                    }
                    if(response.error){
                        toastr.error(response.error)

                    }
                },
                error:function(response){
                    if(response.responseJSON.errors.email)toastr.error(response.responseJSON.errors.email[0])
                    if(response.responseJSON.errors.password)toastr.error(response.responseJSON.errors.password[0])

                }

            });


        })

        $(document).on('keyup', '#exampleInputEmail, #exampleInputPassword', function (e) {
            if(e.keyCode == 13){
                e.preventDefault();

                $.ajax({
                    url: "{{ route('admin.login') }}",
                    type:"post",
                    data:$('#adminLoginForm').serialize(),
                    success:function(response){
                        if(response.success){
                            window.location.href = "{{ route('admin.dashboard')}}";
                            toastr.success(response.success)
                        }
                        if(response.error){
                            toastr.error(response.error)

                        }
                    },
                    error:function(response){
                        if(response.responseJSON.errors.email)toastr.error(response.responseJSON.errors.email[0])
                        if(response.responseJSON.errors.password)toastr.error(response.responseJSON.errors.password[0])

                    }

                });

            }

        })
    });

    })(jQuery);
</script>
@endsection

