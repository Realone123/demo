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
                   <div class="row">
                        <div class="col-12">
                            <div class="card">

                                    <div class="container">
                                            <div class="mt-5 mb-5 text-center">
                                                 </div>
                                                <ul class="step d-flex flex-nowrap">
                                                <li class="step-item "> <a href="#!" class="">Diligence</a>  </li>
                                                <li class="step-item "> <a href="#!" class="">Invest</a> </li>
                                                <li class="step-item active4"> <a href="#!" class="">Fund Investment</a> </li>
                                                </ul> 

                                    </div>


                                    <div class="row">

                                            <section>
                                          <form id="loginFormSubmit" method="post" action="{{route('user.addinvestment')}}">
                        @csrf
                                                    <div class="container m-t-20">
                                                           <!--<h5 class="invest-doc">Fund Investment</h5>-->
                                                             </div>
                                                             
                                                            <div class="row">
                                                                <div class="offset-2 col-md-9">
                                                                    <div class="doc-view-1 m-t-20"> 
                                                                        
                                                                           <!--Start -->
                                                                  <!-- end cheq-->
                                                                          <div class="Funding-Details">
                                                                                <!--   <h5 class="invest-doc fund-view">Funding Details</h5> -->
                                                                              <div class="row">
                                                                             <div class="col-md-12">
                                                                                <p>We kindly request you to follow the payment instructions provided below. Once the payment is completed, please let us know so that we can verify the payment and confirm that everything is in order.
                                                                                     Thank you for choosing to invest with us.</p>
                                                                              </div>
                                                                             
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
                                                                             
                                                                             
                                                                             </div>
                                                                           <div class="row">
                                                                                <!--<div class="col-md-4">-->
                                                                                <!--     <label for="behName1" class="form-label">Date</label>-->
                                                                                <!--  </div>-->
                                                                            <div class="col-md-8">
                                                                                    <div class="form-floating mb-3">
                                                                                            <!--<input type="date" class="form-control" name="date" id="date" placeholder="Enter Name here" required >-->
                                                                                            <label for="tb-fname"></label>
                                                                                             <input type="hidden"  name="property_id" id="property_id" value="{{$property_id}}" >
                                                                                            <input type="hidden"  name="min_amount" id="min_amount" value="{{$min_amount}}" >
                                                                                            <input type="hidden"  name="investment_id" id="investment_id" value="{{$investment_id}}" >
                                                                                             <input type="hidden"  name="status" id="status" value="Pending" >
                                                                                     </div>
                                                                                 </div>  
                                                                              </div>
                                                                               </div>
                                                                               </div>
    
                                                                           <!--end -->
                                                                        </div>
                                                                    </div>
                                                             
                                                                    <div class="offset-4 col-md-4 m-b-20">
                                                                            <div class="d-flex no-block align-items-center">
                                                                                    <a href="{{ URL::previous() }}" class="btn btn-rounded btn-outline-primary m-5 p-10 w-100 waves-effect waves-light ">Previous </a>
                                                                                    <button  type="submit" class="btn btn-rounded btn-outline-primary m-5 p-10 w-100 waves-effect waves-light ">Submit</button>  
                                                                            </div>  
                                                                          </div>
                                                                          </form>
                                            
                                            </section>
                                     
                                            <!-- Step 3 -->
                                        </div>

                            </div>
                        </div>
                    </div>



          
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        
<script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
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
  


  