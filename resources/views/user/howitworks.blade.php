@extends('layouts.user.layout')
@section('title')
    <title>{{ $seo_text->title }}</title>
@endsection
@section('meta')
    <meta name="description" content="{{ $seo_text->meta_description }}">
@endsection

@section('user-content')


        <!-- end-->

        <div class="ltn__breadcrumb-area text-left bg-overlay-white-30 martop bg-image " data-bs-bg="img/bg/14.jpg" style="margin-top:0px!important;background-image: url(&quot;img/bg/14.jpg&quot;);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__breadcrumb-inner">
                            <h2 class="page-title">Powering Your Property Investments With A
                                    Streamlined Ecosystem </h2>
                            <div class="ltn__breadcrumb-list">
                                <ul>
                                    <li><a href="{{ route('home') }}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                                    <li>How IT Works </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

   <!--============== Contact form Start ==============-->
   <div class="full-row pt-0">
        <div class="container">
            <div class="col-md-12">
                <p  class="title-2">Our simple 6-step process enables you to plan, invest, manage, and build your wealth as you go</p>
                </div>
           <div class="row justify-content-start">
                  <ul class="time-line-view">
                        <li style="--accent-color:#41516C">
                            <div class="date">Registration</div>
                            <div class="title "><p class="reg-view">Sign Up For Free</p></div>
                            <div class="descr">We scour through thousands of Grade-A properties to bring the best, cashflow properties
                                    that offer high yields. Become a part of RealOneInvest by registering yourself through our
                                    portal.</div>
                        </li>
                        <li style="--accent-color:#FBCA3E">
                            <div class="date"> Review</div>
                            <div class="title"><p class="reg-view">Documents Review</p></div>
                            <div class="descr">Once you register with RealOneInvest, you can shortlist the properties of your preference and the concerned documents. Download and review whenever you need to. Here, you can have a thorough understanding of all the property information and insights.</div>
                        </li>
                        <li style="--accent-color:#E24A68">
                            <div class="date">Signature</div>
                            <div class="title"><p class="reg-view">Sign Documents Via Docusign</p></div>
                            <div class="descr">Once the review process on your end is completed, click on “Invest Now” and ﬁll in your details. This leads you to an Investment Agreement document. At this point, you’re just a signature away from starting your investment journey with RealOneInvest. We use Docusign to retrieve your signature.</div>
                        </li>
                        <li style="--accent-color:#1B5F8C">
                            <div class="date">Final Review</div>
                            <div class="title"><p class="reg-view">Counter Review Process</p></div>
                            <div class="descr">After retrieving your e-signature, we initiate a review from our end to commence the investment process. At this level of review, we ensure due diligence.</div>
                        </li>
                        <li style="--accent-color:#4CADAD">
                            <div class="date">Funding</div>
                            <div class="title"><p class="reg-view">Direct Wire Transfer</p></div>
                            <div class="descr">At this point, you will receive all the required payment details to initiate the investment transaction from your end. Once the transaction is successful from your end, you will receive an acknowledgement within 3 working days.
                                    And that's it! You're good to go..
                            </div>
                        </li>
                        <li style="--accent-color:#41516C">
                            <div class="date">Access</div>
                            <div class="title"><p class="reg-view">Monitor all your investments from anywhere at any time!</p></div>
                            <div class="descr">Congratulations! You are now an investor. You can now track all your active and ongoing investments on your dashboard with ease. Review your investments, explore properties, and more networking opportunities on your user dashboard.</div>
                        </li>
                    </ul>
                  


         <!--       <div class="col-md-8 offset-md-2">-->
<!--Start -->

<!--end -->
  <!--</div>-->
                    <div class="col-md-5 offset-md-5 mr40" style="margin-bottom:30px;">
                            <div class="btn_block">
                                    <div class="btn-wrapper mar-view1 animated">
                                            <a href="{{ route('login') }}" class="theme-btn-1 bg-color btn btn-effect-2">Invest Now</a>
                                        </div> 
                                   
                                </div>
                        </div>
                 
                </div>
             
            </div>
            <!-- ==================== -->
        
</div>
<!---time line-->
 


@endsection
