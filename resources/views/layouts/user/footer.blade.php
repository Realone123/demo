@php
    $footer_contact=App\ContactUs::first();
    $setting=App\Setting::first();
    $contactInfo=App\ContactInformation::first();
    $footer_banner=App\BannerImage::find(22);
    $navigations=App\Navigation::all();
    $websiteLang=App\ManageText::all();
@endphp





 <!-- CALL TO ACTION START (call-to-action-6) -->
    <div class="ltn__call-to-action-area call-to-action-6 before-bg-bottom build-bg-color" data-bs-bg="img/1.jpg--">
        <div class="container width-build" >
            <div class="row">
                <div class="col-lg-12 padd0">
                    <div class="">
                            <div class=" call-to-action-inner call-to-action-inner-6 ltn__secondary-bg position-relative  build-bg-color text-center---">
                                    <div class="coll-to-info text-color-white">
                                        <h3>Ready To Build Your Wealth? </h3>
                                      
                                    </div>
                                    <div class=" btn-wrapper">
                                        <a class="btn btn-effect-2 btn-white" href="{{ route('login') }}"> Invest Now <i class="icon-next"></i></a>
                                    </div>
                                </div>
                        </div>
                  
                </div>
            </div>
        </div>
    </div>
    <!-- CALL TO ACTION END -->

    <!-- FOOTER AREA START -->
    <footer class="ltn__footer-area">
        <div class="footer-top-area  section-bg-2 plr--5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-about-widget">
                            <!--<div class="footer-logo">
                                <div class="site-logo">
                                    <img src="img/logo-white.jpg" style="max-width:100px; margin:auto;" alt="Logo">
                                </div>
                            </div>-->
                            <p>Texas Largest Tech-enabled commercial property platform built by Local Syndicators for Syndicators to simplify real estate investing.
                                </p>
                          
                            <div class="ltn__social-media mt-20">
                                    <ul>
                                            <li><a href="https://www.facebook.com/profile.php?id=100088014724896" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                             <li><a href="https://www.instagram.com/realoneinvest_ventures/" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>

                                        </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-menu-widget clearfix">
                            <h4 class="footer-title">Contact Us </h4>
                            <div class="footer-address">
                                    <ul>
                                        <li>
                                            <div class="footer-address-icon">
                                                <i class="icon-placeholder"></i>
                                            </div>
                                            <div class="footer-address-info">
                                                <p>2601 Little Elm Pkwy Suite 402, Little Elm, TX 75068</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="footer-address-icon">
                                                <i class="icon-call"></i>
                                            </div>
                                            <div class="footer-address-info">
                                                <p><a href="tel:+0123-456789">(469)-928-4274</a></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="footer-address-icon">
                                                <i class="icon-mail"></i>
                                            </div>
                                            <div class="footer-address-info">
                                                <p><a href="{{ route('contact-us') }}">Contactus@realoneinvest.com</a></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                         
                        </div>
                    </div>
                  
                    <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-menu-widget clearfix">
                            <h4 class="footer-title">Quick Links</h4>
                            <div class="footer-menu">
                                <ul>
                                
                                    <li><a href="{{ route('legal') }}">Legal</a></li>
                                    <li><a href="{{ route('terms-and-conditions') }}">Terms of Use</a></li>
                                    <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                                    <li><a href="{{ route('faq') }}">FAQs</a></li>
                                    <li><a href="{{ route('contact-us') }}">Contact us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                  <div class="col-xl-3 col-md-6 col-sm-12 col-12">
                        <div class="footer-widget footer-newsletter-widget">
                            <h4 class="footer-title">Newsletter</h4>
                            <p>Subscribe to our weekly Newsletter and receive updates via email.</p>
                            <div class="footer-newsletter">
             
                                <form id="subscribeForm">
                                    <input type="email" name="email" placeholder="Email*">
                                    <div class="btn-wrapper">
                                        <button id="subscribeBtn" class="theme-btn-1 btn" type="submit"><i class="fas fa-location-arrow"></i></button>
                                    </div>
                                </form>
                            </div>
                     
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ltn__copyright-area ltn__copyright-2 section-bg-7  plr--5">
            <div class="container ltn__border-top-2">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="ltn__copyright-design clearfix">
                            <p>All Rights Reserved @ Appsron Technologies <span class="current-year"></span></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 align-self-center">
                        <div class="ltn__copyright-menu text-end">
                            <ul>
                                <li><a href="{{ route('terms-and-conditions') }}">Terms of Use</a></li>
                              
                                <li><a href="{{ route('privacy-policy') }}">Privacy & Policy</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- Contact Us Chat-->
<!--<div class="formbold-main-wrapper contact-hangout">-->
        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->
<!--        <div class="w-full">-->
<!--          <div class="formbold-form-wrapper">-->
<!--            <div class="formbold-form-header">-->
<!--              <h3>Contact Us chat</h3>-->
<!--              <button onclick="chatboxToogleHandler()">-->
<!--                <svg width="17" height="17" viewBox="0 0 17 17" fill="white">-->
<!--                  <path fill-rule="evenodd" clip-rule="evenodd"  d="M0.474874 0.474874C1.10804 -0.158291 2.1346 -0.158291 2.76777 0.474874L16.5251 14.2322C17.1583 14.8654 17.1583 15.892 16.5251 16.5251C15.892 17.1583 14.8654 17.1583 14.2322 16.5251L0.474874 2.76777C-0.158291 2.1346 -0.158291 1.10804 0.474874 0.474874Z"-->
<!--                  />-->
<!--                  <path fill-rule="evenodd" clip-rule="evenodd"  d="M0.474874 16.5251C-0.158291 15.892 -0.158291 14.8654 0.474874 14.2322L14.2322 0.474874C14.8654 -0.158292 15.892 -0.158291 16.5251 0.474874C17.1583 1.10804 17.1583 2.1346 16.5251 2.76777L2.76777 16.5251C2.1346 17.1583 1.10804 17.1583 0.474874 16.5251Z"-->
<!--                  />-->
<!--                </svg>-->
<!--              </button>-->
<!--            </div>-->
<!--            <form  action="" method="POST" class="formbold-chatbox-form" >-->
<!--              <div class="formbold-mb-5">-->
<!--                <label for="name" class="formbold-form-label"> Your Name </label>-->
<!--                <input  type="text" name="name" id="name" placeholder="Your Name" class="formbold-form-input" />-->
<!--              </div>-->
      
<!--              <div class="formbold-mb-5">-->
<!--                <label for="email" class="formbold-form-label"> Email Address </label>-->
<!--                <input   type="email"  name="email" id="email" placeholder="example@domain.com" class="formbold-form-input" />-->
<!--              </div>-->
      
<!--              <div class="formbold-mb-5">-->
<!--                <label for="message" class="formbold-form-label"> Message </label>-->
<!--                <textarea   rows="6"  name="message"  id="message"  placeholder="Explain you queries"  class="formbold-form-input"-->
<!--                ></textarea>-->
<!--              </div>-->
      
<!--              <div>-->
<!--                <button class="formbold-btn w-full">Submit</button>-->
<!--              </div>-->
<!--            </form>-->
<!--          </div>-->
<!--          <div class="formbold-action-buttons">-->
<!--            <button class="formbold-action-btn" onclick="chatboxToogleHandler()">-->
<!--              <span class="formbold-cross-icon">-->
<!--                <svg-->
<!--                  width="17"-->
<!--                  height="17"-->
<!--                  viewBox="0 0 17 17"-->
<!--                  fill="none"-->
<!--                  xmlns="http://www.w3.org/2000/svg"-->
<!--                >-->
<!--                  <path-->
<!--                    fill-rule="evenodd"-->
<!--                    clip-rule="evenodd"-->
<!--                    d="M0.474874 0.474874C1.10804 -0.158291 2.1346 -0.158291 2.76777 0.474874L16.5251 14.2322C17.1583 14.8654 17.1583 15.892 16.5251 16.5251C15.892 17.1583 14.8654 17.1583 14.2322 16.5251L0.474874 2.76777C-0.158291 2.1346 -0.158291 1.10804 0.474874 0.474874Z"-->
<!--                    fill="white"-->
<!--                  />-->
<!--                  <path-->
<!--                    fill-rule="evenodd"-->
<!--                    clip-rule="evenodd"-->
<!--                    d="M0.474874 16.5251C-0.158291 15.892 -0.158291 14.8654 0.474874 14.2322L14.2322 0.474874C14.8654 -0.158292 15.892 -0.158291 16.5251 0.474874C17.1583 1.10804 17.1583 2.1346 16.5251 2.76777L2.76777 16.5251C2.1346 17.1583 1.10804 17.1583 0.474874 16.5251Z"-->
<!--                    fill="white"-->
<!--                  />-->
<!--                </svg>-->
<!--              </span>-->
<!--              <span class="formbold-chat-icon">-->
<!--                <svg-->
<!--                  width="28"-->
<!--                  height="28"-->
<!--                  viewBox="0 0 28 28"-->
<!--                  fill="none"-->
<!--                  xmlns="http://www.w3.org/2000/svg"-->
<!--                >-->
<!--                  <path-->
<!--                    d="M19.8333 14.0002V3.50016C19.8333 3.19074 19.7103 2.894 19.4915 2.6752C19.2728 2.45641 18.976 2.3335 18.6666 2.3335H3.49992C3.1905 2.3335 2.89375 2.45641 2.67496 2.6752C2.45617 2.894 2.33325 3.19074 2.33325 3.50016V19.8335L6.99992 15.1668H18.6666C18.976 15.1668 19.2728 15.0439 19.4915 14.8251C19.7103 14.6063 19.8333 14.3096 19.8333 14.0002ZM24.4999 7.00016H22.1666V17.5002H6.99992V19.8335C6.99992 20.1429 7.12284 20.4397 7.34163 20.6585C7.56042 20.8772 7.85717 21.0002 8.16659 21.0002H20.9999L25.6666 25.6668V8.16683C25.6666 7.85741 25.5437 7.56066 25.3249 7.34187C25.1061 7.12308 24.8093 7.00016 24.4999 7.00016Z"-->
<!--                    fill="white"-->
<!--                  />-->
<!--                </svg>-->
<!--              </span>-->
<!--            </button>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--end-->
        
    </footer>
    <!-- FOOTER AREA END -->

  

</div>
<!-- Body main wrapper end -->

    <!-- preloader area start -->
    <div class="preloader d-none" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->

    <!-- All JS Plugins -->
    <script src="{{ asset('user/frontend/js/plugins.js')}}"></script>
    <!-- Main JS -->
    <script src="{{ asset('user/frontend/js/main.js')}}"></script>
  


    <script>
            const formWrapper = document.querySelector(".formbold-form-wrapper");
    const formActionButton = document.querySelector(".formbold-action-btn");
    function chatboxToogleHandler() {
      formWrapper.classList.toggle("active");
      formActionButton.classList.toggle("active");
    }
  
            </script>




  <script src="{{ asset('toastr/toastr.min.js') }}"></script>

    <script>
        @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
          }
        @endif
    </script>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error('{{ $error }}');
            </script>
        @endforeach
    @endif

<script>
        (function($) {
        "use strict";
        $(document).ready(function () {


            $("#subscribeBtn").on('click',function(e) {
                e.preventDefault();
                // project demo mode check
                var isDemo="{{ env('PROJECT_MODE') }}"
                var demoNotify="{{ env('NOTIFY_TEXT') }}"
                if(isDemo==0){
                    toastr.error(demoNotify);
                    return;
                }
                // end

                $("#subscribe-spinner").removeClass('d-none')
                $("#subscribeBtn").addClass('custom-opacity')
                $("#subscribeBtn").removeClass('common_btn_2')
                $("#subscribeBtn").attr('disabled',true);
                $("#angleRight").addClass('d-none');

                $.ajax({
                    url: "{{ route('subscribe-us') }}",
                    type:"get",
                    data:$('#subscribeForm').serialize(),
                    success:function(response){
                        if(response.success){
                            $("#subscribeForm").trigger("reset");
                            toastr.success(response.success)

                            $("#subscribe-spinner").addClass('d-none')
                            $("#subscribeBtn").removeClass('custom-opacity')
                            $("#subscribeBtn").addClass('common_btn_2')
                            $("#subscribeBtn").attr('disabled',false);
                            $("#angleRight").removeClass('d-none');

                        }
                        if(response.error){
                            toastr.error(response.error)
                            $("#subscribeForm").trigger("reset");
                            $("#subscribe-spinner").addClass('d-none')
                            $("#subscribeBtn").removeClass('custom-opacity')
                            $("#subscribeBtn").addClass('common_btn_2')
                            $("#subscribeBtn").attr('disabled',false);
                            $("#angleRight").removeClass('d-none');
                        }
                    },
                    error:function(response){
                        if(response.responseJSON.errors.email){

                            toastr.error(response.responseJSON.errors.email[0])

                            $("#subscribe-spinner").addClass('d-none')
                            $("#subscribeBtn").removeClass('custom-opacity')
                            $("#subscribeBtn").addClass('common_btn_2')
                            $("#subscribeBtn").attr('disabled',false);
                            $("#angleRight").removeClass('d-none');

                        }
                    }

                });

            })

        });

        })(jQuery);
    </script>

</body>

</html>


