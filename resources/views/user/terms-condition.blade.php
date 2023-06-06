@extends('layouts.user.layout')
@section('title')
    <title>{{ $menus->where('id',15)->first()->navbar }}</title>
@endsection
@section('user-content')

  <div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image " data-bs-bg="img/bg/14.jpg" style="margin-bottom:5px;background-image: url(&quot;img/bg/14.jpg&quot;);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                            <div class="ltn__breadcrumb-inner">
                                    <h1 class="page-title">Terms of Use</h1>
                                    <div class="ltn__breadcrumb-list">
                                        <ul>
                                            <li><a href="index.html"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                                            <li>Terms of Use</li>
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
                        <div class="section-title-area">
                            <h4 class="title-2">Terms and Conditions</h4>
                                <p class="para-view"> An electronic web based platform acting in the capacity of a search engine or advertising agency only, for exchanging, exploring and enhancing business online for real estate, housing and property in India. It is owned and managed by Weblink .IN Pvt. Ltd. ("Company") with its registered office at 33 & 33A, Rama Road, Industrial Area, Near Kirti Nagar Metro Station, New Delhi, 110015 (India).</p>
                                <p class="para-view"> Any and all use of this website is subject to, and constitutes acknowledgment and acceptance of, the following Terms and Conditions ("Terms"). It is mandatory for all Users of the Site to have read carefully, fully understood and be in total agreement to the below mentioned Terms before they proceed to use any of the services of the Site ("Services"). The Services are available only to those individuals, firms or companies who can form legally binding contracts under the Indian laws. Weblink.In Pvt. Ltd. may amend these Terms of Use at any time by posting the amended version on this site. Such amended version shall automatically be effective upon its posting on this site.                                    </p>
                        </div>
                           <div class="section-title-area">
                            <h4 class="title-2"> DEFINITION CLAUSE</h4>
                           
                                        <p class="para-view">User: For purposes of this Agreement, a "User" is any person who accesses the Site for whatever purpose, regardless of whether said User has registered with RealEstateIndia.Com as a registered User or whether said User is a paying User for a specific service provided by RealEstateIndia.Com. A User includes the person using this Site and any legal entity which may be represented by such person under actual or apparent authority.

                                        </p>
                                        <p class="para-view">  Un-Authorized User: - Any person who does not have a legal or a contractual right to access the services, but does so, will fall within the definition of an 'unauthorized User' and will be subject to the terms and conditions, and expressly so with respect to respecting the intellectual property rights of the provider, and abiding by licensing terms and conditions.
                                        </p>


                                        <p class="para-view">   Free Services: Any person/entity that joins the portal www.RealEstateIndia.com just with the intention to enlist his listing and showcasing his business online without availing any specialized services thereto.
                                        </p>

                                        <p class="para-view">      Paid Services: Access to the Site and certain features are provided to all Users free of charge. However, the Site reserves the right, without prior notice, to restrict access to certain areas or features of the Site ("Paid Services") to paying Users or Users who undergo a specific registration process. Access to and use of these Paid Services is governed by additional terms and conditions under separate agreements in addition to this Agreement.
                                        </p>

                                        <p class="para-view"> The term RERDA shall mean and include the Real Estate (Regulation and Development) Act, 2016 as amended read with any rules or regulations that might be framed thereunder. By using the Site and its Services, the Users represent and warrant that (a) All registration information submitted is truthful and accurate; (b) The User will maintain the accuracy of such information; (c) The User is 18 years of age or older; and (d) The use of the Site does not violate any applicable law or regulation. (e) User's profile may be deleted and his Membership may be terminated without warning, if we believe that user is in breach of any of the above terms. (f) In no event the Site will be liable for any damages including, without limitation, indirect or consequential damages, or any damages whatsoever arising from use or loss of use, data, or profits, whether in action of contract, negligence or other tortuous action, arising out of or in connection with the use of the site.
                                        </p>

                                        <p class="para-view">  That the Users agree to use this site only for lawful purposes, and in a manner which does not infringe the rights of, or restrict or inhibit the use and enjoyment of this site by any third party. Such restriction or inhibition includes, without limitation, conduct which is unlawful, or which may harass or cause distress or inconvenience to any person and the transmission of obscene or offensive content or disruption of normal flow of dialogue within this site. If any User/individual; /entity become aware of any inappropriate content by any User of this site, or otherwise please contact us by clicking on the "Feedback" link at the footer of every page.
                                        </p>

                                        <p class="para-view">  The Site has no expertise in the domain of intellectual property rights of anyone. It is beyond our scope to verify that the User of the Site have posted ONLY products and services on which they have complete authorization / ownership / dealership / selling rights. As an INTERMEDIARY, our role is limited and in case you have any concern related to copyright infringement then we shall appreciate if the same is to be brought to our notice. The Site neither advocates / endorses such products that may be deemed to be infringing by the virtue of their being listed on the Site nor does it endorse the infringement by removing such listings.
                                        </p>

                                        <p class="para-view">That the Site shall not be liable for any such information or data which is not within its knowledge / acknowledgment / contraventions / copyright issues committed by its Users and which is beyond the control of verification.
                                        </p>

                                        <p class="para-view">    That the Site shall have a sole discretion regarding deletion of his User's classifieds/listing/if the same is found to be in contravention of the various copyright right/intellectual property right rights of third party. That the present clause is in compliance with the INFORMATION TECHNOLOGY ACT 2000 and hence no discussion/argument shall be entertained in any case and in any circumstance.
                                        </p>

                                        <p class="para-view"> This Agreement applies to each Paid Service (as defined below) in addition to any terms and conditions that may be applicable to such specific Paid Service provided, however, that in the event of any conflict or inconsistency between any provision of the terms and conditions that may be applicable to such Paid Service and any provision of this Agreement, such conflict or inconsistency shall (except as otherwise expressly provided or agreed) be resolved in a manner favorable to RealEstateIndia.Com and/or its affiliates; and only to the extent that such conflict or inconsistency cannot be so resolved, the provisions of the terms and conditions applicable to such specific Paid Service shall prevail.
                                        </p>

                                        <p class="para-view">Agreement at any time by posting the amended and restated Agreement on the Site. The amended and restated Agreement shall be effective immediately upon posting. Posting by RealEstateIndia.Com of the amended and restated Agreement and your continued use of the Site shall be deemed to be acceptance of the amended terms. This Agreement may not otherwise be modified, except in writing by an authorized officer of RealEstateIndia.Com.
                                        </p>

                                        <p class="para-view">   Membership is activated within 2 working days from the receipt of activation charges and is continued for the period for which the activation charges have been submitted, however the Web pages are created as per the information/approval provided by the User and may take some time however no relaxation will be provided/allowed for the said period..
                                        </p>

                                        <p class="para-view">   Users be aware that the servers belongs to third party and the continuation to access the services are subject to availability as the same is interrupted at times by technical problems /hackers etc. and RealEstateIndia.Com or the parent company is not responsible for the costs/damages/extension of activation period etc. for the same in any manner under any circumstances. The Users are advised to spool the messages etc. offline and save them elsewhere in order to avoid any hacking or technical problem.
                                        </p>

                                        <p class="para-view">      Membership charges are subject to revision and are at the discretion of the RealEstateIndia.com.
                                        </p>


                                        <p class="para-view">   The Weblink reserves their right to block or delete the webpage at any time without assigning any reason etc. and the User's will have no claim or right whatsoever against Weblink under any circumstances.
                                        </p>

                                        <p class="para-view">   Users agree to accept communications (through Calls/Chat/ Mails/SMS) on the numbers made available during registration or subsequently, via registration forms, posting requirements, feedbacks or any such form that has provision for phone number / mobile number irrespective of being on Do Not Call Registry; which include company / your number / an assigned point of contact; with respect to the subscribed services of RealEstateIndia.com, Weblink .IN Pvt. Ltd.
                                        </p>

                                </div>
                                <div class="section-title-area">
                                        <h4 class="title-2">USER'S OBLIGATIONS</h4>
                                        <ul>
                                            <li>The User agrees and expressly states that he/she is solely responsible for the accuracy and completeness of the Registration Data and other information given to the Company in the application for Membership in order to use the Service. The User will ensure that the data shared with RealEstateIndia.com doesn't contain any fraudulent, false, misleading or manipulated facts.</li>
                                            <li>The User agrees to have / have acquired all the necessary rights and authorizations before posting any information on the Site including but not limited to listing information, property descriptions, photographs, maps, layouts, contact information etc.</li>
                                            <li>In case a User is covered under the RERDA, it shall ensure all necessary compliance necessary, including but not limited to obtaining the necessary registrations etc.</li>
                                            <li>The Site may also require the User to support his/her claims with respect to the status of the property with such documents as may be specified by it from time to time.</li>
                                            <li>The User is responsible for the set-up or configuration of all the necessary equipment required to access the Service.</li>
                                            <li>The User will comply with all notices or instructions given by the Company from time to time in respect of the use of the Service.</li>
                                            <li>The User shall be solely responsible for all information retrieved, stored and transmitted through the Service by him.</li>
                                            <li>The User is solely responsible for the maintenance of confidentiality of the login information.</li>
                                            <li>This would include the User's password and Username and all activities and transmission performed by the User at RealEstateIndia.com.</li>
                                            <li>The User will immediately notify the Company of any unauthorized use of the User's account or any other breach of security known to the User.</li>
                                            <li>The User will pay promptly the Subscription Fees as required by the Company from time to time.</li>    
                                        </ul>
                                    </div>
                    </div>
                </div>
          
            </div>
        </div>
     <!---time line-->
 


 

@endsection
