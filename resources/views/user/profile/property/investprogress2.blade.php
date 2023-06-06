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
                                                <li class="step-item active4"> <a href="#!" class="">Invest</a> </li>
                                                <li class="step-item"> <a href="#!" class="">Fund Investment</a> </li>
                                                </ul> 

                                    </div>
                               

                                    <div class="row">
                                            <section>
                                                    <div class="container m-t-20">
                                                      <!--  <h5 class="invest-doc">Invest</h5>-->
                                                         </div>
                                                            <form id="loginFormSubmit" method="post" action="{{route('user.investprogress3')}}">
                        @csrf
                                                        <div class="row">
                                                            <div class="offset-2 col-md-8">
                                                                <div class="doc-view-1 m-t-20">
                                                                       <!--Start -->
                                                                       <!--<div class="row">-->
                                                                       <!--    <div class="col-md-4">-->
                                                                       <!--         <label for="behName1" class="form-label">Investor Name </label>-->
                                                                       <!--    </div>-->
                                                                       <!--     <div class="col-md-8">-->
                                                                       <!--                 <div class="form-floating mb-3">-->
                                                                       <!--                             <select name="hockeyList" class="select2 form-control form-select" style="width:100% ! important;" onchange="showHide(this)">-->
                                                                       <!--                                     <option hidden Required class="">Investor Name</option>-->
                                                                       <!--                                 <optgroup>-->
                                                                       <!--                                          <option value="Contstruction">Venkat</option>-->
                                                                       <!--                                         <option value="CashFlow">Kumar</option>-->
                                                                       <!--                                         <option value="Land">Arjun</option>-->
                                                                       <!--                                         <option value="MulitiFamily">Raghu</option>-->
                                                                       <!--                                 </optgroup>-->
                                                                       <!--                              </select>-->
                                                                       <!--                         </div>-->
                                                                                          
                                                                       <!--         </div>-->
                                                                       <!--     </div>-->
                                                                            <div class="row">
                                                                                <div class="col-md-4"  style="margin-top:20px">
                                                                                        <label for="behName1" class="form-label">Investment Amount</label>
                                                                                </div>
                                                                                   
                                                                                               
                                                                                    <div class="col-md-8">
                                                                                           <div class="form-floating mb-3">
                                                                                                            <input type="number" class="form-control" min="25000" @if(!empty($investment)) value="{{$investment->investment_amount}}"  @endif  required name="min_amount" id="min_amount" placeholder="Enter Name here">
                                                                                                            <label for="tb-fname" style="font-weight: 400 !important; color:grey;"> Minimum Investment $25,000</label>
                                                                                                          <!--  <p style="color:red;margin-top:10px">  * Minimum Investment $100,000 </p>-->
                                                                                                    </div>
                                                                                               </div>
                                                                                               
                                                                                               
                                                                              <input type="hidden"  name="property_id" id="property_id" value="{{$properties->id}}" >
                                                                               <input type="hidden"  name="investment_id" id="investment_id" @if(!empty($investment)) value="{{$investment->id}}"  @endif >
                                                                                </div>
                                                                       <!--end -->
                                                                    </div>
                                                                </div>
                                                          </div>
                                                     
                                                          <div class="offset-4 col-md-4 m-b-20">
                                                                <div class="d-flex no-block align-items-center">
                                                                        <a href="{{ url('user/invest-progress/'.$properties->id) }}" class="btn btn-rounded btn-outline-primary m-5 p-10 w-100 waves-effect waves-light ">Previous </a>
                                                                         <button type="submit"  class="btn btn-rounded btn-outline-primary p=10 w-100 waves-effect waves-light" style="margin:auto !important" onclick="validate()">Next</button>
                                                                </div>  
                                                              </div>
                                                              </form>
                                                </section>
                                            <!-- Step 2 -->
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
   
   
    <script type="text/javascript">
    function validate(){
        //alert("hi");
        let txt=document.getElementById("min_amount").value;
        //alert(txt);
        if (txt>=25000) {
             return true
           
        }else{
            alert("Please enter minimum investment $25000");
            txt.focus();
           
        }
}
</script>    
       
  @endsection 
  
 

  