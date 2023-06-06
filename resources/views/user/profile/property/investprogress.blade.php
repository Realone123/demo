@extends('layouts.user.profile.layout')
@section('title')
    <title>{{ $websiteLang->where('lang_key','dashboard')->first()->custom_text }}</title>
@endsection

@section('user-dashboard')

   <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">{{$properties->title}}</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{route('user.investnow')}}">Invest Now</a></li>
                                <li class="breadcrumb-item active">{{$properties->title}}</li>
                            </ol>
                          </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->

<!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
               
               @if(empty($myinvestments->id))
                <div class="row">
                        <div class="col-12">
                            <div class="card">
                                    <div class="container">
                                            <div class="mt-5 mb-5 text-center">
                                                 </div>
                                                <ul class="step d-flex flex-nowrap">
                                                <li class="step-item active4"> <a href="#!" class="">Diligence</a>  </li>
                                                <li class="step-item "> <a href="#!" class="">Invest</a> </li>
                                                <li class="step-item"> <a href="#!" class="">Fund Investment</a> </li>
                                                </ul> 

                                    </div>
                                    
                                     <div class="row">
                                            <section>
                                                    <div class="container m-t-20">
                                                                <h5 class="invest-doc">Investment Documents</h5>
                                                                 </div>
                                                                <div class="row m-t-10 ">
                                                                    <div class="offset-2 col-md-8">
                                                                        <div class="doc-view-1 m-t-20">
                                                                                <p class="invest-pera">It is your job as an investor and our future partner to do your due diligence. Please let our team know how we can help you.</p>
                                                                      @foreach($propertyDocuments as $item)
                                                                       <div class="row  border-top">
                                                                            <div class="col-md-9 mr15">
                                                                                    <p>{{ $item->document }}</p>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <p class="text-right">
                                                                             <a href="{{ url('/uploads/custom-documents',['id' =>$item->property_id, 'file' => $item->document]) }}" target="_blank" class=""><i class=" fas fa-eye"></i> </a>
                                                                            <a href="{{ route('download-listing-file',['id' =>$item->property_id, 'file' => $item->document]) }}" ><i class=" fas fa-download"></i> </a>
                                                                                </p>
                                                                                 </div>
    
                                                                        </div>
                                                                        <!--end -->
                                                                         @endforeach
                                                                           
                                                                                            <div class="row">
                                                                                                    <div class="offset-5 m-b-20 col-md-3">
                                                                                                             <a href="{{ route('alldownload-listing-file',$properties->id) }}" class="btn mb-1 btn-rounded btn-outline-primary" style="width:100%">Download All</a>
                                                                                                   </div>
                                                                                               </div>
                                                                                               
                                                                                              
                                                                                               
                                                                                                <div class="row m-t-20">
                                                                                                    <div class="col-lg-1" style="padding:0px;">
                                                                                                            <label for="vehicle1">  <input type="checkbox" id="vehicle1" name="vehicle1"  value="Bike" style="width:55px;" required="true"> </label>
                                                                                                   </div>
                                                                                                   <div class="col-lg-11" style="padding:0px;">
                                                                                                        <span>I confirm that I have reviewed all of the documents and have the necessary information to make this investment.</span>
                                                                                                       </div>
                                                                                               </div>
                                                                                               
                                                                                                  <div class="row">
                                                                                               <div class="offset-5 col-md-3  m-t-10 m-b-20" >
                                                                                                    <div class="d-flex no-block align-items-center">
                                                                                                            <button type="submit" href="invest-progress-step2.html" class="btn btn-rounded btn-outline-primary p=10 w-100 waves-effect waves-light" style="margin:auto !important" onclick="validate()">Next</button> </div>
                                                                                                   </div> 
                                                                                                   </div> 
    
    
                                                                            </div>
                                                                        
                                                                        </div>
                                                                  </div>
                                                               
                                                               
                                            </section>
                                            <!-- Step 1 -->
                                        </div>
                                       
                            </div>
                        </div>
                    </div>
                     @else
                                            <div class="row">
                        <div class="col-12">
                            <div class="card">
                                    <div class="row">
                                            <div class="offset-2 col-md-8">
                                                                <div class="doc-view1">
                                                                      <div class="row">
                                                                              <p style="text-align:center; padding:20px 0px 0px 0px;">You have already invested, if you want to invest more, please do reach-out on contactus@realoneinvest.com </p>
                                                                                </div>
                                                                       </div>
                                                                        <div class="offset-4 col-md-4 m-b-20">
                                                                            <div class="d-flex no-block align-items-center">
                                                                                  <a href="{{ URL::previous() }}" class="btn btn-rounded btn-outline-primary m-5 p-10 w-100 waves-effect waves-light ">Back</a>  
                                                                            </div>  
                                                                          </div>

                                                                </div>
                                                          </div>
                                           </div>
                        </div>
                    </div>
                                        @endif

          
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
       
 
  

   <script>
        function validate(){
            var property_id='<?php echo $properties->id ?>';
            // get the checkbox element from the DOM using the getElementId function
            let checkbox=document.getElementById("vehicle1");
            // get the text element to display the status of the checkbox
          //  let text=document.getElementById("confirm");
            // use the checked property to check if the checkbox is checked
            if (checkbox.checked){
               
              window.location.href = "{{ url('user/invest-progress2/'.$properties->id) }}";
            }
            else{
                alert("I confirm that I have reviewed all of the documents and have the necessary information to make this investment.");
                checkbox.focus();
            }
                

        }
           
    
    </script>

<style>

.step {
  list-style: none;
  margin: .2rem 0;
  width: 100%;
}

.step .step-item {
  -ms-flex: 1 1 0;
  flex: 1 1 0;
  margin-top: 0;
  min-height: 1rem;
  position: relative; 
  text-align: center;
}

.step .step-item:not(:first-child)::before {
  background: #379887;
  content: "";
  height: 2px;
  left: -50%;
  position: absolute;
  top: 17px;
  width: 100%;
}

.step .step-item a {
  color: #379887;
  display: inline-block;
  padding: 35px 10px 0;
  text-decoration: none;
}

.step .step-item a::before {
  background: #379887;
  border: .1rem solid #fff;
  border-radius: 50%;
  content: "";
  display: block;
  height: 1.9rem;
  left: 50%;
  position: absolute;
  top: .2rem;
  transform: translateX(-50%);
  width: 1.9rem;
  z-index: 1;
}

.step .step-item.active4 a::before {
  background: #fff;
  border: 0.5rem solid #f17f29;
}

.step .step-item.active4 ~ .step-item::before {
  background: #379887;
}

.step .step-item.active4 ~ .step-item a::before {
  background: #379887;
}

.doc-view {
    background: #fff;
    padding: 2px;
    text-align: justify;
    margin: 20px 0px;
}


    </style>
 
  @endsection 