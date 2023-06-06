@extends('layouts.user.layout')
@section('title')
    <title>{{ $seo_text->title }}</title>
@endsection
@section('meta')
    <meta name="description" content="{{ $seo_text->meta_description }}">
@endsection

@section('user-content')

 <div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image" data-bs-bg="img/bg/14.jpg" style="margin:0px;background-image: url(&quot;img/bg/14.jpg&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title">About Us</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{ route('home') }}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                                <li>About Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 
  <!-- CATEGORY AREA START -->
  <div class="ltn__category-area ltn__product-gutter section-bg-1--- padd20 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area1 ltn__section-title-2---">
                     <!--   <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color"></h6>-->
                        <h3 class="title-2">About Us</h3>
                       </div>
                </div>
            </div>
            <div class="row ltn__category-slider-active--- slick-arrow-1 justify-content-center">
                    <div class="col-lg-12">
                        <p style="text-align:justify">RealOneInvest is your go-to platform for syndicators and investors to connect, plan, invest,
                                and grow together. We’re a tech-first property investment platform built by syndicators and
                                investors who are looking for high-yield properties to invest in.</p>
                             </div>
                   </div>
        </div>
    </div>
    <!-- CATEGORY AREA END -->

        <!-- end-->

    
    <!-- FEATURE AREA START ( Feature - 6) -->
    <div class="ltn__feature-area section-bg-1 padd30 mb-120---">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area1 ltn__section-title-2---">
                         
                            <h3 class="title-2">What We Do</h3>
                        </div>
                    </div>
                </div>
                <div class="row ltn__custom-gutter--- justify-content-center">

                    <div class="col-lg-12">
                        <p style="text-align: justify;margin-bottom:4px;">In simple words, we help you invest in real estate properties online through our web-based  platform. We help you invest in high-yield properties which grow over time and add to your wealth.
                                If timely returns are more like your style of investing, we also help you invest in pre-leased properties.
                        </p>
                        <p style="text-align: justify">We also power your syndication needs with our premium syndication software and elite investor network.
                                Our singular focus is to change how people invest in real estate and become a one-stop
                                platform for reliable real estate investment opportunities across the U.S.And when it comes to property listing, we don't and can’t compromise. </p>
                          
                    </div>             
                   
            </div>
         

            </div>
        </div>


          <!-- CATEGORY AREA START -->
  <div class="ltn__category-area ltn__product-gutter section-bg-1--- padd20 ">
        <div class="container">
                <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title-area1 ltn__section-title-2---">
                             
                                <h3 class="title-2">Growth Map Reimagined</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row ltn__custom-gutter--- justify-content-center">
                              <div class="col-lg-12">
                                  <p style="text-align:justify;">As folks who have been a part of the industry, we understand that real estate is an
                                        industry with multifold returns. We are working towards the vision of becoming a confidant to all real estate investors out there, allowing them to monitor and
                                        diversify their investment portfolio.</p>
                                </div>             
                      </div>

                      <!-- -->
                      <main>
                            <div class="cards1" id="card1">
                           
                             
                            <p><strong style="color:#f07f2a;text-align:justify">A journey of trust:</strong> This involves taking consistent and reliable actions that demonstrate trustworthiness and
                                    reliability. It may also involve being open to feedback and working to resolve any issues that
                                    may arise.</p>
                                    <hr/>
                             <p><strong style="color:#f07f2a;text-align:justify">A journey of empowerment:</strong> This involves regularly reflecting on progress and making adjustments as needed to ensure
                                        that actions are aligned with values and goals.</p>
                               <p><strong style="color:#f07f2a;text-align:justify">A journey of support:</strong> This involves identifying the specific needs and challenges that our customers might be
                                facing and developing a plan to address the challenges, and determining the specific
                                actions and resources that will be required to provide support.</p>
                           
                          <!--  <img src="https://i.ibb.co/bLmXQCk/IMG-0899.jpg" alt="">-->
                            </div>
                             </main>
                  <!-- -->
    
        </div>
    </div>
        <!-- FEATURE AREA END -->

            <!--end-->
            <div class="ltn__category-area ltn__product-gutter section-bg-1--- pt-40 pb-40 ">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title-area ltn__section-title-2--- text-center">
                                    <h1 class="section-title">Our Mission</h1>
                                   
                                </div>
                                <p class="text-view">We are a team of passionate real estate specialists striving to build a one-stop real estate
                                        platform for every potential investor there is. We also hope to inspire more and more people
                                        to venture into the waters of real estate investing.</p>
                            </div>
                        </div>

                        <div class="row">
                             <!--   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
                                <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
                             -->

                            <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                    <div class="view-card">
                                            <div class="card_content">
                                              <div class="card_icon">
                                                    <img src="{{asset('user/frontend/img/icons/Integrity.png')}}"  class="icon-view" alt="icon">
                                                    <p class="card_title br-bottom">Integrity </p>
                                              </div>
                                              <div class="view-card_body">
                                                <p>Consistency of actions, values, methods, measures, principles, expectations, and outcomes - all
                                                        these factors drive the integrity of a company. And we enable all of this through our services and
                                                        customer experiences. </p>
                                              </div>
                                            </div>
                                            <div class="card_layout"></div>
                                          </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                        <div class="view-card">
                                                <div class="card_content">
                                                  <div class="card_icon">
                                                      <img src="{{asset('user/frontend/img/icons/Transparency.png')}}"  class="icon-view" alt="icon">
                                                     <p class="card_title br-bottom">Transparency </p>
                                                  </div>
                                                  <div class="view-card_body">
                                                    <p> Nothing is to be read within the lines and there’s nothing ambiguous for you to fill in the
                                                            blanks. We lay it all out clearly to help you make informed decisions carefully.
                                                    </p>
                                                  </div>
                                                </div>
                                                <div class="card_layout"></div>
                                              </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                            <div class="view-card">
                                                    <div class="card_content">
                                                      <div class="card_icon">
                                                            <img src="{{asset('user/frontend/img/icons/Discipline.png')}}"  class="icon-view" alt="icon">
                                                            <p class="card_title br-bottom">Discipline</p>
                                                      </div>
                                                      <div class="view-card_body">
                                                        <p> Discipline is a way of helping people to develop self-control, self-direction, and self-regulation,
                                                                and to learn to take responsibility for their own actions. And this is something we practice
                                                                every single day through every transaction. </p>
                                                      </div>
                                                    </div>
                                                    <div class="card_layout"></div>
                                                  </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                <div class="view-card">
                                                        <div class="card_content">
                                                          <div class="card_icon">
                                                                <img src="{{asset('user/frontend/img/icons/Returns.png')}}"  class="icon-view" alt="icon">
                                                                <p class="card_title br-bottom">Returns</p>
                                                          </div>
                                                          <div class="view-card_body">
                                                            <p> Excellence is the language of our service. Our operations run around investors as the focal
                                                                    point as we value your time. We strive to enable an impactful investing journey for every
                                                                    investor.  </p>
                                                          </div>
                                                        </div>
                                                        <div class="card_layout"></div>
                                                      </div>
                                            </div>
                            </div>
                            <div class="row">
                                    <div class="col-lg-12">
                                        <div class="section-title-area ltn__section-title-2--- text-center">
                                            <h1 class="section-title">Our promise?</h1>
                                           
                                        </div>
                                        <p class="text-view">Clear. Simple. Hassle-free. Never be apprehensive about investing in real estate
                                                again. That’s our investing process in a nutshell for you.</p>
                                    </div>
                                    <div class="col-md-5 offset-md-5 mr20" style="margin-bottom:30px;">
                                            <div class="btn_block">
                                                    <div class="btn-wrapper mar-view1 animated">
                                                            <a href="{{ route('login') }}" class="theme-btn-1 bg-color btn btn-effect-2">Get Started</a>
                                                        </div> 
                                                   
                                                </div>
                                        </div>
                                </div>
                    </div>
                </div>

      
<!---time line-->
 


 

<!--  CALL TO ACTION END -->

@endsection
