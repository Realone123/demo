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
                        <h4 class="text-themecolor">Updates Details</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                               <li class="breadcrumb-item active">Updates</li>
                            </ol>
                            <a href="{{ route('admin.adminupdates.create') }}" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle  padd5"></i>New Updates </a>
                          </div>
                    </div>
                </div>


               

                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                     <!-- .row -->
                     <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        
                            <div class="card">
                                <div class="card-body">
                                    <!--<div class="row">-->
                                    <!--    <div class="col-lg-3" style="margin: 10px 20px 0px 20px;">-->
                                    <!--        <div class="form-floating mb-3">-->
                                    <!--                <select name="hockeyList" class="select2 form-control form-select" style="width:100% ! important;" onchange="showHide(this)">-->
                                    <!--                        <option hidden Required class="">Select Investment Type</option>-->
                                    <!--                    <optgroup>-->
                                    <!--                             <option value="Contstruction">Contstruction</option>-->
                                    <!--                            <option value="CashFlow">Cash Flow</option>-->
                                    <!--                            <option value="Land">Land</option>-->
                                    <!--                            <option value="MulitiFamily">Muliti Family</option>-->
                                    <!--                    </optgroup>-->
                                    <!--                 </select>-->
                                    <!--            </div>-->
                                          
                                    <!--    </div>-->
                                    <!--   </div>-->
                                   <!-- <h5 class="card-title">MY INVESTMENTS OVERVIEW</h5>-->
                                  
                                    <div class="table-responsive">
                                       
                                        <table  class="table table-striped border myTable" style="padding:0px ! important;">
                                            <thead>
                                                <tr>
                                                    <th>
                                                            <!--<div class="form-check mr-sm-2">-->
                                                            <!--        <input type="checkbox" class="form-check-input" id="checkbox0" value="check">-->
                                                            <!--        <label class="form-check-label" for="checkbox0">All</label>-->
                                                            <!--    </div>-->
                                                            Sno
                                                    </th>
                                                    <th>Date</th>
                                                    <th>Property Name</th>
                                                   
                                                    <th style="width:40%;">Title</th>
                                                    <th >Action</th>
                                                    
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                               
                                                 @foreach($updates as $index => $item)
                                                <tr class="unread">
                                                    <!--<td> <div class="form-check mr-sm-2">-->
                                                    <!--        <input type="checkbox" class="form-check-input" id="checkbox1" value="check">-->
                                                    <!--        <label class="form-check-label" for="checkbox1"></label>-->
                                                    <!--    </div></td>-->
                                                    <td class="">{{ $index+1 }} </td>
                                                        <td class="">{{ date('M d , Y',strtotime($item->created_at)) }} </td>
                                                        <td class="hidden-xs-down">{{ $item->title}}</td>
                                                        
                                                        <td style="width:40%"class="max-texts">{{ $item->subject}}</td>
                                                        <td> <a href="adminview-updates/{{$item->id}}"   class=""><i class=" fab fa-phabricator"></i> </a>
                                                            <a href="{{ route('admin.adminupdates.edit',$item->id) }}"> <i class=" fas fa-edit"></i> </a>
                                                             <a  data-bs-toggle="modal" data-bs-target="#deleteModal" data-whatever="@mdo" href="" class="" onclick="deleteData({{ $item->id }})" ><i class=" fas fa-trash-alt"></i> </a>
                                                                  </td>  
                                                </tr>
                                                 @endforeach
                                               
                                                
                                                </tbody>
                                        </table>
                                       
                                    </div>
                                       
                      
                        <!-- /item -->
                                </div>
                            </div>
                      
                    <!-- /.row -->

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
           <script>
        function deleteData(id){
          
            $("#deleteForm").attr("action",'{{ url("admin/adminupdates/") }}'+"/"+id)
        }

       
    </script>
  @endsection      
 