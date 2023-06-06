@extends('layouts.admin.layout')
@section('title')
<title>investment</title>
@endsection
@section('admin-content')

     
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
                        <h4 class="text-themecolor">Approvals</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('admin.userinvestments.index') }}">Approvals</a></li>
                            </ol>
                           
                          </div>
                    </div>

                   
                </div>
     
   
          <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->

                <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                        <form action="{{ route('admin.userinvestments.store') }}" method="POST" enctype="multipart/form-data" id="hockey">
                                        @csrf
                                                  
                                        <div class="row m-t-10 p-10">
                                                <div class="col-md-6">
                                                        <div class="form-floating mb-3">
                                                               <select name="user_id" id="user_id"  class="select2 form-control form-select" onchange="showHide(this)">
                                                                                  <option hidden Required>Select Investors</option>                              
                                        @foreach ($users as $item)
                                        <option {{ old('user_id')==$item->id ? 'selected' : '' }} value="{{ $item->id }}" id="pro{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                     </select>

                                                        </div>
                                                       </div>
                                                       <div class="col-md-6">
                                                            <div class="form-floating mb-3">
                                                                    <select name="property_id" id="property_id"  class="select2 form-control form-select" onchange="showHide(this)">
                                                                                  <option hidden Required>Select Offering</option>                              
                                        @foreach ($properties as $item)
                                        <option {{ old('property_id')==$item->id ? 'selected' : '' }} value="{{ $item->id }}" id="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                     </select>
                                                                    <!--<label for="tb-fname">Offering Name</label>-->
                                                            </div>
                                                           </div>
                                                           <div class="col-md-6">
                                                                <div class="form-floating mb-3">
                                                                        <input type="text" name="investment_amount"  id="investment_amount" class="form-control" id="" placeholder="Enter Name here">
                                                                        <label for="tb-fname">Investment Amount</label>
                                                                </div>
                                                               </div>
                                                               <div class="col-md-6">
                                                                    <div class="form-floating mb-3">
                                                                            <input type="Date" name="date"  id="date" class="form-control" id="" placeholder="Enter Name here">
                                                                            <label for="tb-fname">Investment Date</label>
                                                                    </div>
                                                                   </div>
                                                     
                                                <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                                <select  name="mode_of_payment"  id="mode_of_payment" class="select2 form-control form-select" style="width:100% ! important;" >
                                                                        <option hidden Required class="">Mode Of Payment</option>
                                                                    <optgroup>
                                                                             <option value="Wire">Wire </option>
                                                                            <option value="Check">Check</option>
                                                                            <option value="ACH">ACH</option>
                                                                             </optgroup>
                                                                 </select>
                                                            </div>
                                                      
                                                    </div>
                                                    <div class="col-lg-6">
                                                            <div class="form-floating mb-3">
                                                                    <select name="status" id="status" class="select2 form-control form-select" style="width:100% ! important;" >
                                                                            <option hidden Required class="">Status</option>
                                                                        <optgroup>
                                                                            <option value="Pending">Pending</option>
                                                                            <option value="Approved">Approved</option>
                                                                             <option value="Rejected">Rejected</option>
                                                                         </optgroup>
                                                                     </select>
                                                                </div>
                                                          
                                                        </div>
                                                    <div class="col-md-12">
                                                         <div class="form-group">
                                                               <label class="form-label">Description</label>
                                                           <textarea class="form-control" rows="5" name="description"></textarea>
                                                                    </div>
                                                                 </div>
                                                                 
                                                        <div class="col-lg-12">
                                                                <label class="m-b-10">Upload Documents </label> 
                                                                <div class="">
                                                                        <div class="fallback">
                                                                            <input name="multi_documents[]" type="file" multiple />
                                                                        </div>
                                                                    </div>
                                                                     
                                                            </div>
                                                            
                                                            <div class="col-md-2 m-t-20">
                                                                    <div class="d-flex no-block align-items-center">
                                                                           <button  onclick="validate();" class="btn btn-rounded btn-outline-primary w-100 waves-effect waves-light" style="margin:auto !important">SAVE</button>
                                                                           </div>
                                                              </div>
                                                    </div>
                                                        </form>
                                            </div>
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
    function validate(){
        //alert("hi");
        let txt=document.getElementById("investment_amount").value;
       // alert(txt);
        if (txt>=50000) {
             return true
           
        }else{
            alert("Please enter minimum investment $50000");
            txt.focus();
            return false
        }
}
</script>


@endsection
