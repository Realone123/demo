@extends('layouts.admin.layout')
@section('title')
<title>{{ $websiteLang->where('lang_key','property')->first()->custom_text }}</title>
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
                        <h4 class="text-themecolor">All Properties</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Properties</li>
                            </ol>
                            <a href="{{ route('admin.property.create') }}" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle  padd5"></i>Add </a>
                        
                          </div>
                    </div>

                   
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->

                    <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
                <div class="row m-t-20">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white">{{ $openproperties->count()}}</h1>
                                <h6 class="text-white">Open properties  </h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card">
                            <div class="box bg-primary text-center">
                                <h1 class="font-light text-white">{{ $fullyfundedproperties->count()}}</h1>
                                <h6 class="text-white">Fully Funded Properties</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white">{{ $closedproperties->count()}}</h1>
                                <h6 class="text-white">Closed Properties</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card">
                            <div class="box bg-dark text-center">
                                <h1 class="font-light text-white">0</h1>
                                <h6 class="text-white">Upcoming Properties</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>

         
                <!-- ============================================================== -->
                <!-- End Info box -->
                <!-- ============================================================== -->

      <!-- ============================================================== -->
                <!-- Over Visitor, Our income , slaes different and  sales prediction -->
                <!-- ============================================================== -->
                <!-- .row -->
                <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card ">
                                        <div class="card-body">
                                            <h5 class="card-title text-uppercase">Properties Details</h5>
                                            <div class="d-flex m-b-20 ">
                                                    <div class="table-responsive m-t-20">
                                                            <table id="myTable" class="display nowrap table table-hover table-striped border myTable"
                                                                cellspacing="0" width="100%">
                                                                <thead>
                                                                    <tr> 
                                                                            <th>Sno</th>
                                                                            <th>Offering Name</th>
                                                                            
                                                                            <th>Price</th>
                                                                            <!--<th>Investments</th>-->
                                                                           <th>Property Status</th>
                                                                           <th>Status</th>
                                                                           <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                              
                                                                <tbody>
                                                                     @foreach ($properties as $index => $item)
                                                                        <tr>
                                                                                <td>{{ ++$index }}</td> 
                                                                              
                                                                                 <td>{{ $item->title }}</td>
                                                                                <td>@if($item->price) {{ $settings->currency_icon }}{{ $item->price }}@else -- @endif </td>
                                                                                <!--<td>0 </td>-->
                                                                                <td>{{ $item->status }}  </td>
                                                                                
                                                                                    <td class=""> 
                                                                                                <label class="switch">
                                                                                               <input type="checkbox" name="property_status" id="property_status-{{$item->id}}" @if($item->property_status =='1') checked @endif onclick="propertyStatus({{ $item->id }})">
                                                                                               <span class="slider round-1"></span>
                                                                                             </label>  </td>
                                                                                <td>
                                                                                    
                                                                                    <a href="property-view-details/{{$item->id}}"> <i class="fas fa-eye"></i> </a>
                                                                                    <a href="{{ route('admin.property.edit',$item->id) }}"> <i class=" fas fa-edit"></i> </a>
                                                                                   <a  data-bs-toggle="modal" data-bs-target="#deleteModal" data-whatever="@mdo" href="" class="" onclick="deleteData({{ $item->id }})" ><i class=" fas fa-trash-alt"></i> </a>
                                                                                
                                                                                   <a  data-bs-toggle="modal" data-bs-target="#SendmailModal" data-whatever="@mdo" href=""  onclick="SendmailData({{ $item->id }})" style="margin-left:2px;"><i class=" far fa-envelope"></i> </a>
                                                                        
                                                                                  <a  data-bs-toggle="modal" data-bs-target="#UpdateModal" data-whatever="@mdo" href=""  onclick="UpdateData({{ $item->id }})" style="margin-left:2px;"><i class=" fas fa-rss"></i> </a>
                                                                                
                                                                                  
                                                                                </td>
                                                                            </tr>
                                                                            
                                                                              @endforeach
                                                                         
                                                                                       
                                                                </tbody>
                                                            </table>
                                                        </div>
                                               </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

              
                  
             
              
             
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->

         <!--update  Modal -->
  <div id="UpdateModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Property update to live Server</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                 <h5>{{ $websiteLang->where('lang_key','are_you_sure')->first()->custom_text }}</h5>
                 </div>
            <div class="modal-footer">
                 <form id="UpdateForm" action="" method="get">
                   
                          <button type="button" class="btn btn-info waves-effect text-white" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">{{ $websiteLang->where('lang_key','yes')->first()->custom_text }}</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div id="SendmailModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Send Email For All Leads and Investors</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                 <h5>{{ $websiteLang->where('lang_key','are_you_sure')->first()->custom_text }}</h5>
                 </div>
            <div class="modal-footer">
                 <form id="SendmailForm" action="" method="get">
                   
                          <button type="button" class="btn btn-info waves-effect text-white" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">{{ $websiteLang->where('lang_key','yes')->first()->custom_text }}</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
         <script>
        function deleteData(id){
         
            $("#deleteForm").attr("action",'{{ url("admin/property/") }}'+"/"+id)
        }

          function UpdateData(id){
         
            $("#UpdateForm").attr("action",'{{ url("admin/property_liveupdate/") }}'+"/"+id)
        }
           
         function SendmailData(id){
         
            $("#SendmailForm").attr("action",'{{ url("admin/addproperty_sendmail/") }}'+"/"+id)
        }   
   
        function propertyStatus(id){
            // project demo mode check
            var isDemo="{{ env('PROJECT_MODE') }}"
            var demoNotify="{{ env('NOTIFY_TEXT') }}"
            if(isDemo==0){
                toastr.error(demoNotify);
                return;
            }
            // end
            $.ajax({
                type:"get",
                url:"{{url('/admin/property-status/')}}"+"/"+id,
                success:function(response){
                   toastr.success(response)
                },
                error:function(err){
                    console.log(err);

                }
            })
        }
    </script>
  @endsection      
 