@extends('layouts.user.layout')
@section('title')
    <title>{{ $seo_text->title }}</title>
@endsection
@section('meta')
    <meta name="description" content="{{ $seo_text->meta_description }}">
@endsection

@section('user-content')

     
        <div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image " data-bs-bg="img/bg/14.jpg" style="background-image: url(&quot;img/bg/14.jpg&quot;);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__breadcrumb-inner">
                            <h1 class="page-title">Frequently Asked Questions</h1>
                            <div class="ltn__breadcrumb-list">
                                <ul>
                                    <li><a href="index.html"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                                    <li>FAQs</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <!--end-->
            <div class="ltn__appointment-area pt-115--- pb-60">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">                    
                                <form action="#">
                                    <div class="ltn__tab-menu ltn__tab-menu-3 ltn__tab-menu-top-right-- text-uppercase--- text-center">
                                        <div class="nav">
                                            <a class="active show" data-bs-toggle="tab" href="#liton_tab_3_1">General</a>
                                            <a data-bs-toggle="tab" href="#liton_tab_3_2" class="">TAX Related</a>

                                        </div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show border-view-faq" id="liton_tab_3_1">
                                                <h6 class="title-2"> General</h6>

                                            <div class="ltn__apartments-tab-content-inner">
                                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                                            <div class="accordion-item">
                                                              <h2 class="accordion-header" id="flush-headingOne">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                                    1. What is RealOneInvest?
                                                                </button>
                                                              </h2>
                                                              <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                                <div class="accordion-body">
                                                                    <ul>
                                                                    <li> RealOneInvest is an online platform for all things real estate.</li>
                                                                   <li>  We want to help grow your wealth through investment opportunities in real estate across the United States.
                                                                      Be it investing in properties or syndication, we do it all for you.</li>
                                                                        </ul>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                              <h2 class="accordion-header" id="flush-headingTwo">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                                	2. What are the different opportunities available?
                                                                </button>
                                                              </h2>
                                                              <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                                <div class="accordion-body">
                                                                    RealOneInvest is currently offering three models of investment in real estate.
                                                                    <ol type="1">
                                                                   <li> Invest in properties and build your wealth over time with capital appreciation.</li>
                                                                   <li> Invest in pre-leased properties and get assured timely rental returns.</li>
                                                                   <li>	Make the most of our syndication technology and network. We facilitate you with two options. You can leverage:
                                                                    <ul type="circle">
                                                                       <li> <b>Our technology:</b> We help you with syndication software to enable your own platform.</li>
                                                                      <li> <b>Our platform & network:</b>	 We also support you with a premium investor circle for pooling your investments and tracking them.</li>
                                                                  </ul>
                                                                 </li>
                                                                </ol>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                              <h2 class="accordion-header" id="flush-headingThree">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                                    3. How does RealOneInvest shortlist properties?
                                                                </button>
                                                              </h2>
                                                              <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                                                <div class="accordion-body">
                                                                    <ul>
                                                                        <li>We have a rigorous shortlisting process in place which includes extensive market research, stringent criteria, and multi-level approvals.</li>
                                                                        <li>The ﬁnal listings that make the cut only include grade-A and bluechip properties.</li>
                                                                    </ul>
                                                                 </div>
                                                              </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="flush-headingFour">
                                                                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseThree">
                                                                        4.	How do I reach out in case I need help?
                                                                      </button>
                                                                    </h2>
                                                                    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                                                      <div class="accordion-body">
                                                                          <ul>
                                                                              <li>We are a people-centric organization and ﬁrmly believe in having strong customer support.</li>
                                                                              <li> You can always reach out to us through <i><b>email</b></i> or <i><b>call us</b></i>  regarding any queries, issues or information. Our turnaround time is usually 48 hours.</li>
                                                                          </ul></div>
                                                                    </div>
                                                                  </div>
                                                          </div>

                                               
                                            
                                            </div>
                                        </div>
                                        <div class="tab-pane fade border-view-faq" id="liton_tab_3_2">
                                            <div class="ltn__product-tab-content-inner">
                                                <h6 class="title-2">Tax Related</h6>
                                                <div class="accordion accordion-flush" id="accordionFlushExample1">
                                                      
                                                        <div class="accordion-item">
                                                          <h2 class="accordion-header" id="flush-headingTwo">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                                 1.	Are there any tax deductions on my investment returns?
                                                            </button>
                                                          </h2>
                                                          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                            <div class="accordion-body">
                                                                <ul>
                                                                    <li> We do not deduct any tax from your returns. For any further tax-related queries on your real estate investments, please reach out to your Certiﬁed Public Accountants (CPAs). </li>
                                                                 </ul>
                                                                   
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="accordion-item">
                                                          <h2 class="accordion-header" id="flush-headingThree">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                                    2. Do you provide any kind of tax documentation with respect to the investments? 
                                                            </button>
                                                          </h2>
                                                          <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                                            <div class="accordion-body">
                                                                <ul>
                                                                    <li>We issue a copy of Schedule K-1 (Form 1065). Since there are no tax deductions on your returns, RealOneInvest may not be required to issue any other tax documents.</li>
                                                                </ul>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="accordion-item">
                                                                <h2 class="accordion-header" id="flush-headingFour">
                                                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseThree">
                                                                        3. Am I required to report my capital gains on IRS forms?
                                                                  </button>
                                                                </h2>
                                                                <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                                                  <div class="accordion-body">
                                                                      <ul>
                                                                          <li>We recommend reaching out to your CPAs or tax advisors to guide you through your capital gains reporting and other tax related queries.</li>
                                                                      </ul>
                                                                      </div>
                                                                </div>
                                                              </div>
                                                      </div>
                                              
                                             
                                              
                                              
                                            </div>
                                        </div>
                                      
                                     
                                    </div>
                                
                                    <p class="mr20">For more queries or concerns, please feel free to reach out to our team at:   <a href="https://www.google.com/intl/en-GB/gmail/about/" target="_blank"><i class="icon-mail"></i> <b style="color:#f17f29 ">Contactus@realoneinvest.com</a></b></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            
<!---time line-->
@endsection
