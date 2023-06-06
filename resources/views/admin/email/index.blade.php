@extends('layouts.admin.layout')
@section('title')
<title>{{ $websiteLang->where('lang_key','my_property')->first()->custom_text }}</title>
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
                        <h4 class="text-themecolor">All Emails</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Email</li>
                            </ol>
                            <a href="{{ route('admin.email.create') }}" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle  padd5"></i>Compose Mail</a>
                        
                          </div>
                    </div>

                   
                </div>
                
  <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="row">
                                  
                                    <div class="col-lg-12 col-md-12  border-start">
                                       
                                        <div class="card-body p-t-0">
                                            <div class="card b-all shadow-none">
                                                <div class="inbox-center table-responsive">
                                                    <table id="" class="myTable display nowrap table table-hover table-striped border" cellspacing="0" width="100%">
                                                                        <thead>
                                                                             <tr>
                                                                            <th>Sno</th>
                                                                             <th>Date</th>
                                                                            <th>Email</th>
                                                                          
                                                                            <th>Action</th>
                                                                    </tr>
                                                                        </thead>
                                                                      
                                                                        <tbody>
                                                                     @foreach ($emails as $index => $item)
                                                                        <tr>
                                                                                <td>{{ ++$index }}</td>  
                                                                                <td>{{ date('M d , Y',strtotime($item->created_at)) }} </td>
                                                                                <td>{{ $item->subject }} </td>
                                                                               
                                                                               
                                                                                <td ><a href="emailview/{{$item->id}}" class=""><i class=" fab fa-phabricator"></i> </a>
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

              
</div>
</div>

    <script>
        function deleteData(id){
            $("#deleteForm").attr("action",'{{ url("admin/email/") }}'+"/"+id)
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
