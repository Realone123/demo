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
                                            <form action="{{ route('admin.userinvestments.update',$investment->id) }}" method="POST" enctype="multipart/form-data" id="hockey">
                                            @csrf
                                            @method('patch')  
                                                  
                                        <div class="row m-t-10 p-10">
                                                <div class="col-md-6">
                                                        <div class="form-floating mb-3">
                                                         <select name="user_id" id="user_id"  class="form-control select2" >
                                                                                
                                           <option  selected value="{{ $investment->user_id }}">{{ $investment->user->name }}</option>                                    
                                      
                                     </select>
                                                                
                                                        </div>
                                                       </div>
                                                       <div class="col-md-6">
                                                            <div class="form-floating mb-3">
                                                                   <select name="property_id" id="property_id"  class="form-control select2" >
                                                                      <option  selected value="{{ $investment->property_id }}">{{ $investment->property->title }}</option>                                    
                                      
                                     </select>
                                                            </div>
                                                           </div>
                                                           <div class="col-md-6">
                                                                <div class=" mb-3">
                                                                        <input type="text" name="investment_amount"  id="investment_amount" class="form-control" value="{{ $investment->investment_amount }}" placeholder="Enter Name here">
                                                                        
                                                                </div>
                                                               </div>
                                                              
                                                                  
                                                     
                                                <div class="col-lg-6">
                                                        <div class="form-floating mb-3">
                                                                <select  name="mode_of_payment"  id="mode_of_payment"  class="select2 form-control form-select" style="width:100% ! important;" >
                                                                        <option hidden Required class="" value="">Mode Of Payment</option>
                                                                    <optgroup>
                                                                             <option {{ $investment->mode_of_payment=="Wire" ? 'selected' : '' }} value="Wire">Wire</option>
                                                                            <option {{ $investment->mode_of_payment=="Check" ? 'selected' : '' }}value="Check">Check</option>
                                                                            <option {{ $investment->mode_of_payment=="ACH" ? 'selected' : '' }}value="ACH">ACH</option>
                                                                             </optgroup>
                                                                 </select>
                                                            </div>
                                                      
                                                    </div>
                                                    
                                                    
                                                    <div class="col-lg-6">
                                                            <div class="form-floating mb-3">
                                                                    <select name="status" id="status" class="select2 form-control form-select" style="width:100% ! important;" >
                                                                            <option hidden Required class="">Status</option>
                                                                        <optgroup>
                                                                             <option {{ $investment->status=="Pending" ? 'selected' : '' }} value="Pending">Pending</option>
                                                                             <option {{ $investment->status=="Approved" ? 'selected' : '' }} value="Approved">Approved</option>
                                                                              <option {{ $investment->status=="Rejected" ? 'selected' : '' }} value="Rejected">Rejected</option>
                                                                         </optgroup>
                                                                     </select>
                                                                </div>
                                                          
                                                        </div>
                                                    
                                                     <div class="col-md-12">
                                                         <div class="form-group">
                                                               <label class="form-label">Description</label>
                                                           <textarea class="form-control" rows="5" name="description">{{ $investment->description }}</textarea>
                                                                    </div>
                                                                 </div>  
                                                                 
                                                     <div class="col-md-6">
                                                                  <label  class="m-b-10">Investment Date</label> 
                                                                    <div class="input-group">
                                                <input type="date" class="form-control" name="invested_date"  id="invested_date" value="{{ $investment->invested_date }}" placeholder="Investment Date">
                                                
                                                    
                                            </div>
                                                                   </div> 
                                                                   
                                                    <div class="col-md-6">
                                                                 <label  class="m-b-10">Approved Date</label>   
                                                                    <div class="input-group">
                                                <input type="date" class="form-control" name="date"  id="date" value="{{ $investment->date }}" placeholder="Approved Date">
                                                
                                                    
                                            </div>
                                                                   </div>               

                                                        <div class="col-lg-12">
                                                                <label class="m-b-10">Select  Documents </label> 
                                                                <div class="">
                                                                        <div class="fallback">
                                                                            <input name="multi_documents[]" type="file" multiple />
                                                                        </div>
                                                                    </div>
                                                                     
                                                            </div>
                                                            <div class="col-md-2 m-t-20">
                                                                    <div class="d-flex no-block align-items-center">
                                                                           <button onclick="validate()" class="btn btn-rounded btn-outline-primary w-100 waves-effect waves-light" style="margin:auto !important">SAVE</button>
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
        if (txt>=25000) {
             return true
           
        }else{
            alert("Please enter minimum investment $25000");
            txt.focus();
            return false
        }
}
</script>


@endsection
