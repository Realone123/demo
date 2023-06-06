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
                        <h4 class="text-themecolor">All Countries</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Countries</li>
                            </ol>
                            <a href="{{ route('admin.country.create') }}" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle  padd5"></i>Add </a>
                        
                          </div>
                    </div>

                   
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
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
                                            <h5 class="card-title text-uppercase">Countries Details</h5>
                                            <div class="d-flex m-b-20 ">
                                                    <div class="table-responsive m-t-20">
                                                            <table id="myTable" class="display nowrap table table-hover table-striped border myTable"
                                                                cellspacing="0" width="100%">
                                                                <thead>
                                                                    <tr> 
                                                                            <th>Sno</th>
                                                                            <th>Country Name</th>
                                                                            
                                                                            <th>Status</th>
                                                                            
                                                                           <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                              
                                                                <tbody>
                                                                     @foreach ($countries as $index => $item)
                                                                        <tr>
                                                                                <td>{{ ++$index }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                @if ($item->status==1)
                                <a href="" onclick="locationStatus({{ $item->id }})"><input type="checkbox" checked data-toggle="toggle" data-on="{{ $websiteLang->where('lang_key','active')->first()->custom_text }}" data-off="{{ $websiteLang->where('lang_key','inactive')->first()->custom_text }}" data-onstyle="success" data-offstyle="danger"></a>
                            @else
                                <a href="" onclick="locationStatus({{ $item->id }})"><input type="checkbox" data-toggle="toggle" data-on="{{ $websiteLang->where('lang_key','active')->first()->custom_text }}" data-off="{{ $websiteLang->where('lang_key','inactive')->first()->custom_text }}" data-onstyle="success" data-offstyle="danger"></a>

                            @endif
                            
                            </td>
                                                                                <td>
                                                                                    <a href="{{ route('admin.country.edit',$item->id) }}"> <i class=" fas fa-edit"></i> </a>
                                                                                   <a  data-bs-toggle="modal" data-bs-target="#deleteModal" data-whatever="@mdo" href="" class="" onclick="deleteData({{ $item->id }})" ><i class=" fas fa-trash-alt"></i> </a>
                                                                  
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
            $("#deleteForm").attr("action",'{{ url("admin/country/") }}'+"/"+id)
        }

        function locationStatus(id){

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
                url:"{{url('/admin/country-status/')}}"+"/"+id,
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
 