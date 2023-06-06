@extends('layouts.admin.layout')
@section('title')
<title>{{ $websiteLang->where('lang_key','agent')->first()->custom_text }}</title>

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
                        <h4 class="text-themecolor">All Leads</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Leads</li>
                            </ol>
                            <!--<a href="{{ route('admin.create-leads') }}" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle  padd5"></i>Add </a>-->
                        
                          </div>
                    </div>

                   
                </div>
                   <!-- Info box -->
                <!-- ============================================================== -->
                <div class="row m-t-20">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-4">
                        <div class="card">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white">{{ count($allleads)}}</h1>
                                <h6 class="text-white">Total Leads</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-4">
                        <div class="card">
                            <div class="box bg-primary text-center">
                                <h1 class="font-light text-white">{{ count($verifiedleads)}}</h1>
                                <h6 class="text-white">Active Leads</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-4">
                        <div class="card">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white">{{ count($pendingleads)}}</h1>
                                <h6 class="text-white">Inactive Leads</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!--<div class="col-md-6 col-lg-3 col-xlg-3">-->
                    <!--    <div class="card">-->
                    <!--        <div class="box bg-dark text-center">-->
                    <!--            <h1 class="font-light text-white">0</h1>-->
                    <!--            <h6 class="text-white">Converted</h6>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
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
                                            <h5 class="card-title text-uppercase">Leads </h5>
                                            <div class="d-flex m-b-20 ">
                                                    <div class="table-responsive m-t-20">
                                                            <table id="myTable" class="display nowrap table table-hover table-striped border myTable"
                                                                cellspacing="0" width="100%">
                                                                <thead>
                                                                    <tr>
                                                                            <th>Id</th>
                                                                            <th>Name</th>
                                                                            <th>Contact No</th>
                                                                           <!--<th> Interested In</th>-->
                                                                           <th>Email Id</th>
                                                                           <!--<th>Self Acc</th>-->
                                                                           <th>Status</th>
                                                                            <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                              
                                                                <tbody>
                                                                     @foreach ($allleads as $index => $item)
                                                                        <tr>
                                                                                <td>{{ ++$index }}</td>  
                                                                                <td>{{ $item->name }} </td>
                                                                                <td>{{ $item->phone }} </td>
                                                                                <!--<td>$0 </td>-->
                                                                                <td>{{ $item->email }} </td>
                                                                                <!--<td>$0 </td>-->
                                                                                <td> 
                                                                                                <label class="switch">
                                                                                               <input type="checkbox" name="verification" id="verification-{{$item->id}}" @if($item->status =='1') checked @endif onclick="userStatus({{$item->id}});">
                                                                                               <span class="slider round-1"></span>
                                                                                             </label>  </td>
                                                                                <td>
                                                                                     <a href="leadsview/{{$item->id}}"   class=""><i class=" fab fa-phabricator"></i> </a>
                                                            
                                                             <!--<a  data-bs-toggle="modal" data-bs-target="#deleteModal" data-whatever="@mdo" href="" class="" onclick="deleteData({{ $item->id }})" > </a>-->
                                                                                                <a href="{{ route('admin.agents.delete',$item->id) }}" onclick="return confirm('{{ $confirmNotify }}')" class=""><i class=" fas fa-trash-alt"></i></a>
                                 
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
<script>
        function deleteData(id){
            
            $("#deleteForm").attr("action",'{{ url("admin/agents/") }}'+"/"+id)
        }

      
    </script>
    <script>
    
    
      
        function userStatus(id){
            
            
         let checkbox=document.getElementById("verification-"+id);
  
            
            $.ajax({
                type:"get",
               url:"{{url('/admin/lead-status/')}}"+"/"+id,
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
