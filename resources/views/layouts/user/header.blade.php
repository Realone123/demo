@php
    $topbar_contact=App\ContactUs::first();
    $setting=App\Setting::first();
    $customPages=App\CustomPage::all();
    $navigations=App\Navigation::all();
    $websiteLang=App\ManageText::all();
@endphp


<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from tunatheme.com/tf/html/quarter-preview/quarter/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 30 Nov 2022 04:15:23 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Real One Invest</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon" href="{{ asset('user/frontend/img/realoneinvest.png')}}"  class="favicon-view" type="image/x-icon" />
    <!-- Font Icons css -->
    <link rel="stylesheet" href="{{ asset('user/frontend/css/font-icons.css')}}">
    <!-- plugins css -->
    <link rel="stylesheet" href="{{ asset('user/frontend/css/plugins.css')}}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('user/frontend/css/style.css')}}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('user/frontend/css/responsive.css')}}">

    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">
	<script src="{{ asset('user/js/jquery-3.6.0.min.js') }}"></script>


   
</head>

<body>
    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- Add your site or application content here -->

<!-- Body main wrapper start -->
<div class="body-wrapper">

    <!-- HEADER AREA START (header-5) -->
    <header class="ltn__header-area ltn__header-5 ltn__header-transparent--- gradient-color-4---">
        <!-- ltn__header-top-area start -->
        <div class="ltn__header-top-area section-bg-6 top-area-color-white---">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <div class="ltn__top-bar-menu">
                            <ul>
                                <li><i class="icon-mail"></i>Contactus@realoneinvest.com</li>
                                <li><i class="icon-placeholder"></i>2601 Little Elm Pkwy Suite 402, Little Elm, TX 75068</li>
                                <li><i class="icon-call"></i>(469)-928-4274</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="top-bar-right text-end">
                            <div class="ltn__top-bar-menu">
                                <ul>
                                
                                    <li>
                                        <!-- ltn__social-media -->
                                        <div class="ltn__social-media">
                                            <ul>
                                                <li><a href="https://www.facebook.com/profile.php?id=100088014724896" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                 <li><a href="https://www.instagram.com/realoneinvest_ventures/" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>

                                            </ul>
                                        </div>
                                    </li>
                                  
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ltn__header-top-area end -->
        
       <!-- ltn__header-middle-area start -->
        <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-white">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="site-logo-wrap">
                            <div class="site-logo">
                                <a href="{{ route('home') }}"><img src="{{ asset('user/frontend/img/logo-white.png')}}"  style="max-width:75%;"alt="Logo"></a>
                            </div>
                            <div class="get-support clearfix d-none">
                                <div class="get-support-icon">
                                    <i class="icon-call"></i>
                                </div>
                                <!--<div class="get-support-info">
                                    <h6>Get Support</h6>
                                    <h4><a href="tel:+123456789">123-456-789-10</a></h4>
                                </div>-->
                            </div>
                        </div>
                    </div>
                    <div class="col header-menu-column">
                        <div class="header-menu d-none d-xl-block">
                            <nav>
                                <div class="ltn__main-menu">
                                <ul>

                                            <li><a  class="nav-link {{ Route::is('home')? 'active' : '' }}" href="{{ route('home') }}">HOME</a></li>
                                            <li> <a class="nav-link {{ Route::is('properties',['page_type' => 'list_view'])? 'active' : '' }}" href="{{ route('properties',['page_type' => 'list_view']) }}">PROPERTIES</a></li>
                                            <li class="menu-icon"><a class="nav-link {{ Route::is('about-us') || Route::is('howitworks') || Route::is('faq') || Route::is('knowledge')? 'active' : '' }}" href="#">RESOURCES </a>
                                                <ul class="sub-menu menu-pages-img-show">
                                                   
                                                    <li> <a href="{{ route('about-us') }}">ABOUT US</a></li>
                                                    <li>  <a href="{{ route('howitworks') }}"> HOW IT WORKS</a>  </li>
                                                    <li><a href="{{ route('faq') }}"> FAQS</a>  </li>
                                                    <li>  <a href="{{ route('knowledge') }}"> KNOWLEDGE CENTER</a> </li>
                                                 </ul>
                                            </li>
                                            <li><a  class="nav-link {{ Route::is('contact-us')? 'active' : '' }}" href="{{ route('contact-us') }}">CONTACT US</a></li>
                                     
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="col ltn__header-options ltn__header-options-2 mb-sm-20">
                  
                        <!-- user-menu -->
                        <div class="ltn__drop-menu user-menu">
                            <ul>
                                <li>
                                    <a href="#"><i class="icon-user"></i></a>
                            @php
                            $my_account =$navigations->where('id',22)->first();
                            @endphp
                                    
                                    <ul>
                                        @if ($my_account ->status==1)
                                        <li><a href="{{ route('user.dashboard') }}">Sign up/Login</a></li>
                                        @else
                                        <li><a href="{{ route('login') }}">LOGIN</a></li>
                                        <li><a href="{{ route('register') }}">SIGN UP</a></li>
                                        @endif
                                    </ul>
                                      
                                </li>
                            </ul>
                            
                        </div>
                        <!-- mini-cart -->
                       
                        <!-- mini-cart -->
                        <!-- Mobile Menu Button -->
                        <div class="mobile-menu-toggle d-xl-none">
                            <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                                <svg viewBox="0 0 800 600">
                                    <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ltn__header-middle-area end -->
    </header>
    <!-- HEADER AREA END -->
    <!-- HEADER AREA END -->



    <!-- Utilize Cart Menu End -->

    <!-- Utilize Mobile Menu Start -->
    <div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
        <div class="ltn__utilize-menu-inner ltn__scrollbar">
            <div class="ltn__utilize-menu-head">
                <div class="site-logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('img/logo-white.png')}}" alt="Logo"></a>
                </div>
                <button class="ltn__utilize-close">×</button>
            </div>
            <div class="ltn__utilize-menu">
         <ul>

                                            <li><a  class="nav-link {{ Route::is('home')? 'active' : '' }}" href="{{ route('home') }}">HOME</a></li>
                                            <li> <a class="nav-link {{ Route::is('properties',['page_type' => 'list_view'])? 'active' : '' }}" href="{{ route('properties',['page_type' => 'list_view']) }}">PROPERTIES</a></li>
                                            <li class="menu-icon"><a class="nav-link {{ Route::is('about-us') || Route::is('howitworks') || Route::is('faq') || Route::is('knowledge')? 'active' : '' }}" href="#">RESOURCES </a>
                                                <ul class="sub-menu menu-pages-img-show">
                                                   
                                                    <li> <a href="{{ route('about-us') }}">ABOUT US</a></li>
                                                    <li>  <a href="{{ route('howitworks') }}"> HOW IT WORKS</a>  </li>
                                                    <li><a href="{{ route('faq') }}"> FAQS</a>  </li>
                                                    <li>  <a href="{{ route('knowledge') }}"> KNOWLEDGE CENTER</a> </li>
                                                 </ul>
                                            </li>
                                            <li><a  class="nav-link {{ Route::is('contact-us')? 'active' : '' }}" href="{{ route('contact-us') }}">CONTACT US</a></li>
                                     
                                    </ul>
            </div>
          
        </div>
    </div>
    <!-- Utilize Mobile Menu End -->

    <div class="ltn__utilize-overlay"></div>