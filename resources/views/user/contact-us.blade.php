
@extends('layouts.user.layout')
@section('title')
<title>{{ $seo_text->title }}</title>
@endsection
@section('meta')
    <meta name="description" content="{{ $seo_text->meta_description }}">
@endsection
@section('user-content')
  <div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image " data-bs-bg="img/bg/14.jpg" style="padding:10px 0px ! important; background-image: url(&quot;img/bg/14.jpg&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h2 class="page-title">Contact Us</h2>
                      <!--  <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="index.html"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                                <li>Contact Us</li>
                            </ul>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--end -->
  

    <div class="ltn__team-details-area mb-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ltn__team-details-member-info text-center mb-40 " >
                                <div class="row">
                                        <div class="col-lg-12">
                                            <div class="ltn__contact-address-item ltn__contact-address-item-3 padd211 box-shadow">
                                               
                                               <div class="row">
                                                <div class="col-lg-3 col-sm-3">
                                                        <div class="ltn__contact-address-icon">
                                                                <img src="{{ asset('user/frontend/img/icons/10.png')}}" alt="Icon Image">
                                                            </div>

                                                    </div>
                                                    <!--<div class="col-lg-9 col-sm-9 text-left">-->
                                                    <!--        <h6 class="animated fadeIn">Email Address</h6>-->
                                                    <!--        <p> <a href="javascript:;">{!! clean(nl2br($contact->emails)) !!}</a></p>-->
                                                    <!--    </div>-->
                                                    <div class="col-lg-9 col-sm-9 text-left">
                                                            <h6 class="animated fadeIn">Email Address</h6>
                                                            <p>contactus@realoneinvest.com</p>
                                                        </div>
                                               </div> 
                                             
                                             
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="ltn__contact-address-item ltn__contact-address-item-3 padd211 box-shadow">
                                                    <div class="row">
                                                            <div class="col-lg-3 col-sm-3">
                                                                    <div class="ltn__contact-address-icon">
                                                                            <img src="{{ asset('user/frontend/img/icons/11.png')}}" alt="Icon Image">
                                                                        </div>
                                                                </div>
                                                                <!--<div class="col-lg-9 col-sm-9 text-left">-->
                                                                <!--        <h6 class="animated fadeIn">Phone Number</h6>-->
                                                                <!--        <p> <a href="javascript:;">{!! clean(nl2br($contact->phones)) !!}</a></p>-->
                                                                <!--    </div>-->
                                                                <div class="col-lg-9 col-sm-9 text-left">
                                                                        <h6 class="animated fadeIn">Phone Number</h6>
                                                                        <p>(469)-928-4274</p>
                                                                    </div>
                                                           </div> 
                                               
                                              
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="ltn__contact-address-item ltn__contact-address-item-3 padd211  box-shadow">
                                                    <div class="row">
                                                            <div class="col-lg-3 col-sm-3">
                                                                    <div class="ltn__contact-address-icon">
                                                                            <img src="{{ asset('user/frontend/img/icons/12.png')}}" alt="Icon Image">
                                                                        </div>
                                                                </div>
                                                                 <div class="col-lg-9 col-sm-9 text-left">
                                                                        <h6 class="animated fadeIn">Office Address</h6>
                                                                           <p>2601 Little Elm Pkwy Suite 402, Little Elm, TX 75068</p>
                                                                    </div>
                                                           </div> 
                                             </div>
                                        </div>
                                    </div>  

                        </div>
                    </div>


                   
                    <div class="col-lg-8 ">
                        <div class="ltn__team-details-member-info-details">
                             
                            <div class="ltn__form-box contact-form-box box-shadow white-bg ">
                                <h4 class="title-2">{{ $websiteLang->where('lang_key','contact_us')->first()->custom_text }}</h4>
                                
                              
                                <form  id="contact-form" method="POST" action="{{ route('contact.message') }}">
                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-item input-item-name ltn__custom-icon">
                                                <input type="text" name="name" placeholder="Enter first name">
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-6">
                                            <div class="input-item input-item-email ltn__custom-icon">
                                                <input type="email" name="email" placeholder="Enter email address">
                                            </div>
                                        </div>
                                     
                                        <div class="col-md-6">
                                            <div class="input-item input-item-phone ltn__custom-icon">
                                                <input type="text" name="phone" placeholder="Enter phone number">
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="input-item input-item-phone ltn__custom-icon">
                                                        <input  type="text" name="subject" placeholder="Enter subject" >
                                                    </div>
                                            </div>
                                        <div class="col-md-12">
                                                <div class="input-item input-item-textarea ltn__custom-icon">
                                                        <textarea name="message" placeholder="Enter message" rows="2"></textarea>
                                                    </div>
                                            </div>
                                            <div class="col-md-12">
                                                    <p><label class="input-info-save mb-0"><input type="checkbox" name="agree"> Save my name, email, and website in this browser for the next time I comment.</label></p>
                                                    
                                               @if($contactSetting->allow_captcha==1)
                                    <p class="g-recaptcha mb-3 mt-3" data-sitekey="{{ $contactSetting->captcha_key }}"></p>
                                @endif       
                                                    
                                                    
                                                    <div class="btn-wrapper mt-0">
                                                       <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">{{ $websiteLang->where('lang_key','send_msg')->first()->custom_text }}</button>  
                                                        
                                                        
                                                    </div>
                                                </div>
                                    </div>
                                  
                                  
                                
                                </form>

                                     <!--end-->
                                     <div class="row">
                                         <div class="col-md-12">
                                                <div class="google-map">
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1985.7952753847705!2d-96.89839000117067!3d33.16960018925699!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x864c39921d128a09%3A0xbe96b552fd153401!2s2601%20Little%20Elm%20Pkwy%2C%20Little%20Elm%2C%20TX%2075068%2C%20USA!5e0!3m2!1sen!2sin!4v1679999818369!5m2!1sen!2sin" width="100%" height="120px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                    </div>
                                             </div>
                                         </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--=========CONTACT PAGE END==========-->

@endsection
