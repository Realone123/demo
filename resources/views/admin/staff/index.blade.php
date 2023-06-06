@extends('layouts.admin.layout')
@section('title')
<title>{{ $websiteLang->where('lang_key','manage_staff')->first()->custom_text }}</title>
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
                        <h4 class="text-themecolor">All GP List</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">GP</li>
                            </ol>
                            <a href="{{ route('admin.create-staff') }}" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle  padd5"></i>Add </a>
                        
                          </div>
                    </div>

                   
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
     <!-- DataTales Example -->
          
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card ">
                                        <div class="card-body">
                                            <h5 class="card-title text-uppercase">GP Details</h5>
                                            <div class="d-flex m-b-20 ">
                                                    <div class="table-responsive m-t-20">
                                                            <table id="myTable" class="display nowrap table table-hover table-striped border myTable"
                                                                cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="5%">{{ $websiteLang->where('lang_key','serial')->first()->custom_text }}</th>
                            <th width="20%">{{ $websiteLang->where('lang_key','name')->first()->custom_text }}</th>
                            <th width="20%">{{ $websiteLang->where('lang_key','email')->first()->custom_text }}</th>
                            <th width="10%">{{ $websiteLang->where('lang_key','img')->first()->custom_text }}</th>
                            <th width="20%">{{ $websiteLang->where('lang_key','author')->first()->custom_text }}</th>
                            <th width="5%">{{ $websiteLang->where('lang_key','status')->first()->custom_text }}</th>
                            <th width="15%">{{ $websiteLang->where('lang_key','action')->first()->custom_text }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($staffs as $index => $staff)
                        <tr>
                            <td>{{ ++$index }}</td>
                            <td>{{ $staff->name }}</td>
                            <td>{{ $staff->email }}</td>
                            <td> <img src="{{  $staff->image ? asset( $staff->image) : ''}}" alt="" width="80px"> </td>
                            <td>
                                @php
                                    $author=$admins->where('id',$staff->author_id)->first();
                                @endphp
                                {{ $author->name }}
                            </td>


                            <td>
                                @if ($staff->status==1)
                                <a href="" onclick="featureStatus({{ $staff->id }})"><input type="checkbox" checked data-toggle="toggle" data-on="{{ $websiteLang->where('lang_key','active')->first()->custom_text }}" data-off="{{ $websiteLang->where('lang_key','inactive')->first()->custom_text }}" data-onstyle="success" data-offstyle="danger"></a>
                                @else
                                    <a href="" onclick="featureStatus({{ $staff->id }})"><input type="checkbox" data-toggle="toggle" data-on="{{ $websiteLang->where('lang_key','active')->first()->custom_text }}" data-off="{{ $websiteLang->where('lang_key','inactive')->first()->custom_text }}" data-onstyle="success" data-offstyle="danger"></a>

                                @endif
                            </td>
                            <td>


                                <a data-toggle="modal" data-target="#staffDelete-{{ $staff->id }}" href="javascript:;" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>


                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    @foreach ($staffs as $staff)
    <!-- Modal -->
    <div class="modal fade" id="staffDelete-{{ $staff->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $websiteLang->where('lang_key','item_delete_confirm')->first()->custom_text }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <h4>{{ $websiteLang->where('lang_key','are_you_sure')->first()->custom_text }}</h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ $websiteLang->where('lang_key','close')->first()->custom_text }}</button>
                    <a href="{{ route('admin.delete-staff',$staff->id) }}" class="btn btn-primary">{{ $websiteLang->where('lang_key','yes')->first()->custom_text }}</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>
</div>
 </div>
                                               </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        
                    <!-- /.row -->


    <script>

        function featureStatus(id){
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
                url:"{{url('/admin/staff-status/')}}"+"/"+id,
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
