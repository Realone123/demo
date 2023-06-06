@extends('layouts.admin.layout')
@section('title')
<title>{{ $websiteLang->where('lang_key','property')->first()->custom_text }}</title>
@endsection
@section('admin-content')

        <!-- ============================================================== -->
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
                        <h4 class="text-themecolor">DOCUMENTS</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Documents</li>
                            </ol>
                            <a href="{{ route('admin.admindocuments.create') }}" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle  padd5"></i>New Document </a>
                        
                          </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
               

  <!-- row -->
  <div class="row">
      <div class="col-md-12">
            <div class="card">
                <div class="card-body p-b-0">
                    <!--<h4 class="card-title"> MY INVESTMENTS</h4>-->
                    <ul class="nav nav-tabs customtab" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#home7" role="tab">
                            <span class="hidden-sm-up"></span> <span class="hidden-xs-down">
                                    Tax Documents</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#profile7" role="tab">
                            <span class="hidden-sm-up"></span> <span class="hidden-xs-down">Subscriptions</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#messages7" role="tab"><span class="hidden-sm-up"></span>
                             <span class="hidden-xs-down">Accreditation</span></a> </li>
                             <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#messages8" role="tab"><span class="hidden-sm-up"></span>
                                <span class="hidden-xs-down">Offering Documents</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#messages9" role="tab"><span class="hidden-sm-up"></span>
                                    <span class="hidden-xs-down">Miscellaneous</span></a> </li>
                                   

                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home7" role="tabpanel">
                        <div class="row mrtb30">
                        <div class="table-responsive" style="margin-bottom:25px;">
                                    <table  class="table table-striped border myTable" style="padding:0px ! important;">
                                        <thead>
                                            <tr>
                                                <!--<th> Offering Name </th>-->
                                                
                                                <th>Date</th>
                                                <th>Document Name</th>
                                                <!--<th>Executed On</th>-->
                                                <th >Action</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($taxDocuments)>0)
                                             @foreach($taxDocuments as $item) 
                                            <tr>
                                               
                                                   
                                                    <td>	  {{ date('M d , Y',strtotime($item->created_at)) }}</td>
                                                   <td>{{ $item->document }} </td>
                                                   <td>  
                                                     <a href="{{ url('/uploads/custom-documents',['id' =>$item->user_id, 'file' => $item->document]) }}" target="_blank" class=""><i class=" fas fa-eye"></i> </a>
                                                                            <a href="{{ route('download-listing-file',['id' =>$item->user_id, 'file' => $item->document]) }}" ><i class=" fas fa-download"></i> </a>
                                                                            
                                                     </td>  
                                            </tr>
                                            @endforeach
                                            @endif
                                            </tbody>
                                    </table>
                                </div>
                        </div>
                        </div>
                        
                        <div class="tab-pane" id="profile7" role="tabpanel">
                                  <div class="row mrtb30">
                                <div class="table-responsive" style="margin-bottom:25px;">
                                    <table  class="table table-striped border myTable" style="padding:0px ! important;">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th> Offering Name </th>
                                                <th>Document Name</th>
                                               
                                                <th>Executed On</th>
                                                <th >Action</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             @if(count($subscriptionDocuments)>0)
                                             @foreach($subscriptionDocuments as $item) 
                                            <tr class="unread">
                                                <td>{{ date('M d , Y',strtotime($item->created_at)) }}</td>
                                                <td>{{ $item->property->title }}</td>
                                                    <td class="">{{ $item->document }} </td>
                                                    
                                                    <td class="hidden-xs-down">{{ $item->type}}</td>
                                                   <td>  
                                                         <a href="{{ url('/uploads/custom-documents',['id' =>$item->property_id, 'file' => $item->document]) }}" target="_blank" class=""><i class=" fas fa-eye"></i> </a>
                                                                            <a href="{{ route('download-listing-file',['id' =>$item->property_id, 'file' => $item->document]) }}" ><i class=" fas fa-download"></i> </a>
                                                                            
                                                     </td>  
                                            </tr>
                                            @endforeach
                                             @endif
                                         
                                            </tbody>
                                    </table>
                                </div>
                                  </div>
          
                        </div>
                                    <div class="tab-pane" id="messages7" role="tabpanel">
                                <div class="row mrtb30">
                                        <!-- item -->
                                       <div class="table-responsive" style="margin-bottom:25px;">
                                    <table  class="table table-striped border myTable" style="padding:0px ! important;">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th> Offering Name </th>
                                                <th style="width:30%;">Document Name</th>
                                                <th>Status</th>
                                                <th>Executed On</th>
                                                <th >Action</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             @if(count($accredationDocuments)>0)
                                             @foreach($accredationDocuments as $item) 
                                            <tr class="unread">
                                                <td>{{ date('M d , Y',strtotime($item->created_at)) }}</td>
                                                <td>{{ $item->title }}</td>
                                                    <td class="">{{ $item->document }} </td>
                                                    <td class="hidden-xs-down">	   {{ $item->status}}</td>
                                                    <td class="hidden-xs-down">{{ $item->type}}</td>
                                                   <td>  
                                                        <a href="{{ url('/uploads/custom-documents',['id' =>$item->property_id, 'file' => $item->document]) }}" target="_blank" class=""><i class=" fas fa-eye"></i> </a>
                                                                            <a href="{{ route('download-listing-file',['id' =>$item->property_id, 'file' => $item->document]) }}" ><i class=" fas fa-download"></i> </a>
                                                                            

                                                     </td>  
                                            </tr>
                                            @endforeach
                                            @endif
                                            </tbody>
                                    </table>
                                </div>
                                   
                                    </div>
                            <!-- .row -->
                        <div class="row ">
                                                <div class="card-body border-top">
                                                        <div class="d-flex no-block align-items-center">
                                                                <a href="" class="btn btn-rounded btn-outline-primary  waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModal" data-whatever="@mdo">Upload Documents</a>
                                                          </div>
                                                    </div>
                                            </div>
                         
                                    <!-- /.row -->
                        </div>

                        <div class="tab-pane" id="messages8" role="tabpanel">
                               <div class="row mrtb30">
                                <div class="table-responsive" style="margin-bottom:25px;">
                                    <table id="config-table" class="table table-striped border" style="width:100% ! important;  padding:0px ! important;">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th style="width:30%">Offering Name</th>
                                                <th style="width:30%;">Document Name </th>
                                                 <th style="width:30%" >Action</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($offeringDocuments)>0)
                                             @foreach($offeringDocuments as $item) 
                                            <tr class="unread">
                                                <td>{{ date('M d , Y',strtotime($item->created_at)) }}</td>
                                                <td>{{ $item->property->title }}</td>
                                                    <td class="">{{ $item->document }} </td>
                                                   
                                                   <td>  
                                                         <a href="{{ url('/uploads/custom-documents',['id' =>$item->property_id, 'file' => $item->document]) }}" target="_blank" class=""><i class=" fas fa-eye"></i> </a>
                                                                            <a href="{{ route('download-listing-file',['id' =>$item->property_id, 'file' => $item->document]) }}" ><i class=" fas fa-download"></i> </a>
                                                                            

                                                     </td>  
                                            </tr>
                                            @endforeach
                                            @endif
                                            </tbody>
                                    </table>
                                </div>
                                </div>
                                               
                         </div>
                            <div class="tab-pane" id="messages9" role="tabpanel">
                                    <div class="row mrtb30">
                                <div class="table-responsive" style="margin-bottom:25px;">
                                    <table  class="table table-striped border myTable" style="width:100% ! important;  padding:0px ! important;">
                                        <thead>
                                            <tr><th>Date</th>
                                            
                                                <th style="width:30%">Offering Name</th>
                                                <th style="width:30%;">Document Name </th>
                                                 <th style="width:30%" >Action</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             @if(count($investmentDocuments)>0)
                                             @foreach($investmentDocuments as $item) 
                                            <tr class="unread">
                                                <td>{{ date('M d , Y',strtotime($item->created_at)) }}</td>
                                                <td>{{ $item->title }}</td>
                                                    <td class="">{{ $item->document }} </td>
                                                   
                                                   <td>  
                                                   <a href="{{ url('/uploads/custom-documents',['id' =>$item->property_id, 'file' => $item->document]) }}" target="_blank" class=""><i class=" fas fa-eye"></i> </a>
                                                                            <a href="{{ route('download-listing-file',['id' =>$item->property_id, 'file' => $item->document]) }}" ><i class=" fas fa-download"></i> </a>
                                                                            

                                                     </td>  
                                            </tr>
                                            @endforeach
                                            @endif
                                         
                                            </tbody>
                                    </table>
                                </div>   
                                </div>
                            </div>

                            <div class="tab-pane" id="messages10" role="tabpanel">
                              
                               
                            </div> 
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->

           
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        
<!-- Updates Model Pop Ups  -->
<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <form action="{{ route('user.accreditationstore') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Accreditation Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
            </div>
            <div class="modal-body">
                  <div class="row">
                        <div class="col-md-12 m-t-10">
                                <label class="m-b-10">Accreditation Documents: </label> 
                                      <div class="dropzone"> 
                                          <div class="fallback">
                                                  <input name="accreditation_file" type="file" multiple>
                                              </div>
                                          </div>
                         </div>
                      </div>
                    </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-rounded btn-outline-primary  waves-effect waves-light" data-bs-dismiss="modal">Save & Upload</button>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- /.modal -->
  @endsection      
 