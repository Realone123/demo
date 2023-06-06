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
                        <h4 class="text-themecolor">All Investments</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Investors Investments</li>
                            </ol>
                            <a href="{{ route('admin.userinvestments.create') }}" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle  padd5"></i>Add </a>
                        
                          </div>
                    </div>

                   
                </div>
                
  <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                               
                                <div class="table-responsive m-t-10 m-b-10">
                 <table id="myTable" class="table table-striped border myTable" style="padding:0px ! important;">
                    <thead>
                        <tr>
                            <th width="5%">S No</th>
                            <th width="20%">Investors Name </th>
                            <th width="30%">Offering Name</th>
                            <th width="20%">Investment Amount</th>
                            
                           
                            <th width="20%">Invested Date</th>
                            <th width="20%">Approved Date</th>
                            <th width="5%">Mode of Payment</th>
                            <th width="5%">Status</th>
                            <!--<th width="20%">Description</th>-->
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                        @foreach ($totalinvestments as $index => $item)
                       
                        <tr>
                            <td>{{ ++$index }}</td>
                            <td><b>{{ $item->name }}</b><br>{{ $item->email }}</td>
                             <td><b>{{ $item->title }}</td>
                            <!--<td> {{ $item->where('user_id',$item->user_id)->count() }}</td>-->
                            <td>{{ $settings->currency_icon }}{{ $item->investment_amount }}</td>
                           
                          
                            <td>@if($item->invested_date){{ date('M d , Y',strtotime($item->invested_date)) }}  @endif</td>
                             <td>@if($item->date) {{ date('M d , Y',strtotime($item->date)) }} @endif</td>
                            <th>{{ $item->mode_of_payment }}</th>
                              <td>{{ $item->status }}</td>
                              <!--<td>{{ $item->description }}</td>-->
                                                                            <td><a href="{{ route('admin.userinvestments.edit',$item->id) }}"><i class=" far fa-edit"></i></a></td>
                            <!--<td>-->
                            <!--   {{ $item->Investor_id }}-->
                            <!--</td>-->
                            <!--<td>-->
                            <!--    <a target="_blank" href="" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>-->
                            <!--    <a href="{{ route('admin.property.edit',$item->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>-->
                            <!--    <a data-toggle="modal" data-target="#deleteModal" href="javascript:;" onclick="deleteData({{ $item->id }})" class="btn btn-danger btn-sm"><i class="fas fa-trash    "></i></a>-->



                            <!--</td>-->
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
    <script>
        function deleteData(id){
            $("#deleteForm").attr("action",'{{ url("admin/property/") }}'+"/"+id)
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
