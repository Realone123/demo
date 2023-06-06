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
                        <h4 class="text-themecolor">Report Details </h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active"><a href="investors.html">Reports</a></li>
                               </ol>
                          </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
         
                <!-- ============================================================== -->
                <!-- Comment - table -->
                <!-- ============================================================== -->
             

                   <!-- Row -->
                   <div class="row">
                      
                        <!-- Column -->
                        <div class="col-lg-12 col-xlg-12 col-md-12">
                            <div class="card-1">
                                <!-- Nav tabs -->

                                <div class="card">
                                <ul class="nav nav-tabs profile-tab" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab"> Users</a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab"> Investments</a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#Notes" role="tab"> Investors Profile Updates</a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#Distributions" role="tab"> Distributions</a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#Tax" role="tab"> Tax</a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#Form D" role="tab"> Form D</a> </li>
                                    </ul>
                                    </div>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home" role="tabpanel">
                                        <div class="card-body">
                                        
                                                <div class="row m-t-20">
                                                        <!-- Column -->
                                                        <div class="col-md-6 col-lg-4 col-xlg-4">
                                                            <div class="card">
                                                                <div class="box bg-info text-center">
                                                                    <h1 class="font-light text-white">{{ count($allleads)}}</h1>
                                                                    <h6 class="text-white"> Total Leads</h6>
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
                                                                <div class="box bg-dark text-center" >
                                                                    <h1 class="font-light text-white">{{ count($pendingleads)}}</h1>
                                                                    <h6 class="text-white"> Inactive Leads</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                      
                                                    </div>

                                                    <!-- two-->
                                                    <div class="row m-t-20">
                                                            <!-- Column -->
                                                            <div class="col-md-6 col-lg-4 col-xlg-4">
                                                                <div class="card">
                                                                    <div class="box bg-info text-center" style="background-color: #c50f86 !important">
                                                                        <h1 class="font-light text-white">{{ $allinvestors->count()}}</h1>
                                                                        <h6 class="text-white"> Total Investors</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <!-- Column -->
                                                            <div class="col-md-6 col-lg-4 col-xlg-4">
                                                                <div class="card">
                                                                    <div class="box bg-info text-center"  style="background-color:#80d524 !important">
                                                                        <h1 class="font-light text-white">${{ $allinvestors->sum('investment_amount')}}</h1>
                                                                        <h6 class="text-white">Total Investments</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Column -->     
                                                            <div class="col-md-6 col-lg-4 col-xlg-4">
                                                                <div class="card">
                                                                    <div class="box bg-success text-center" style="background-color:#6a5cbb !important">
                                                                        <h1 class="font-light text-white">0</h1>
                                                                        <h6 class="text-white">Pending Investments </h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                          
                                                        </div>
                                                    <!-- end-->


                                               <div class="row">
                                                   <div class="col-lg-12">
                                                       <div class="card">
                                                    <h5 class="card-title text-uppercase">Users </h5>
                                                    <div class="d-flex m-b-20 ">
                                                            <div class="table-responsive m-t-20">
                                                                    <table id="" class="myTable display nowrap table table-hover table-striped border"
                                                                        cellspacing="0" width="100%">
                                                                        <thead>
                                                                             <tr>
                                                                            <th>Sno</th>
                                                                            <th>Name</th>
                                                                            <th>Email</th>
                                                                            <th>Contact No</th>
                                                                           <th>SignUp Date</th>
                                                                           <th>Investment Capacity</th>
                                                                           <!--<th>Lead Source</th>-->
                                                                           <th> Status</th>
                                                                            <th>Action</th>
                                                                    </tr>
                                                                        </thead>
                                                                      
                                                                        <tbody>
                                                                     @foreach ($allleads as $index => $item)
                                                                        <tr>
                                                                                <td>{{ ++$index }}</td>  
                                                                                <td>{{ $item->name }} </td>
                                                                                <td>{{ $item->email }} </td>
                                                                                <td>{{ $item->phone }} </td>
                                                                                <td>{{ date('M d , Y',strtotime($item->created_at)) }} </td>
                                                                                <td>{{ $item->investment_capacity }} </td>
                                                                                <!--<td>{{ $item->about_hear }} </td>-->
                                                                                <td>   @if($item->status ==1) <span style="color:green;" >Active</span> @else <span style="color:orange;" >Inactive</span> @endif </td>
                                                                                <td><a href="leadsview/{{$item->id}}"><i class="fas fa-eye"></i> </a></td>
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
                                    <!--second tab-->
                                    <div class="tab-pane" id="profile" role="tabpanel">
                                        <div class="card-body">
                                       
                                                <div class="row m-t-20">
                                                        <!-- Column -->
                                                        <div class="col-md-6 col-lg-3 col-xlg-3">
                                                            <div class="card">
                                                                <div class="box bg-info text-center">
                                                                    <h1 class="font-light text-white">{{ $totalinvestments->count()}}</h1>
                                                                    <h6 class="text-white">Total Investments</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Column -->
                                                        <div class="col-md-6 col-lg-3 col-xlg-3">
                                                            <div class="card">
                                                                <div class="box bg-primary text-center">
                                                                    <h1 class="font-light text-white">{{ $activeInvestments->count()}}</h1>
                                                                    <h6 class="text-white">Active Investments</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Column -->
                                                        <div class="col-md-6 col-lg-3 col-xlg-3">
                                                            <div class="card">
                                                                <div class="box bg-success text-center"  style="background-color:#dd1f5d !important">
                                                                    <h1 class="font-light text-white">{{ $pendingInvestments->count()}}</h1>
                                                                    <h6 class="text-white"> Pending Investments</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Column -->
                                                        <div class="col-md-6 col-lg-3 col-xlg-3">
                                                            <div class="card">
                                                                <div class="box bg-dark text-center">
                                                                    <h1 class="font-light text-white">0</h1>
                                                                    <h6 class="text-white"> Total Distributions</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Column -->
                                                    </div>

                                                    <!-- two-->
                                                    <div class="row m-t-20">
                                                            <!-- Column -->
                                                            <div class="col-md-6 col-lg-3 col-xlg-3">
                                                                <div class="card">
                                                                    <div class="box bg-info text-center" style="background-color: #ff00a7 !important">
                                                                        <h1 class="font-light text-white">{{ $allinvestors->count()}}</h1>
                                                                        <h6 class="text-white">Total Investors</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Column -->
                                                            <div class="col-md-6 col-lg-3 col-xlg-3">
                                                                <div class="card">
                                                                    <div class="box bg-primary text-center"  style="background-color:#0085ff !important">
                                                                        <h1 class="font-light text-white">${{ $allinvestors->sum('investment_amount')}}</h1>
                                                                        <h6 class="text-white">Total Invested</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Column -->
                                                            <div class="col-md-6 col-lg-3 col-xlg-3">
                                                                <div class="card">
                                                                    <div class="box bg-success text-center" style="background-color:#ffd400 !important">
                                                                        <h1 class="font-light text-white">${{ $pendingInvestments->sum('investment_amount')}}</h1>
                                                                        <h6 class="text-white">  Pending Invested</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Column -->
                                                            <div class="col-md-6 col-lg-3 col-xlg-3">
                                                                <div class="card">
                                                                    <div class="box bg-dark text-center" style="background-color:#acbccd ! important">
                                                                        <h1 class="font-light text-white">0</h1>
                                                                        <h6 class="text-white"> Inactive Investors</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Column -->
                                                        </div>
                                                    <!-- end-->


                                               <div class="row">
                                                   <div class="col-lg-12">
                                                       <div class="card">
                                                    <h5 class="card-title text-uppercase">Investments</h5>
                                                    <div class="d-flex m-b-20 ">
                                                            <div class="table-responsive m-t-20">
                                                                    <table id="" class="myTable display nowrap table table-hover table-striped border"
                                                                        cellspacing="0" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                    <th>Sno </th>
                                                                                    <th>Investors Name </th>
                                                                                    <th>Offerings</th>
                                                                                    <th>Investment Amount</th>
                                                                                    
                                                                                    <!--<th>Email</th>-->
                                                                                   <th>Phone</th>
                                                                                    <th>Address</th>
                                                                                    <!--<th>City</th>-->
                                                                                    <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                      
                                                                        <tbody>
                                                                            @foreach ($totalinvestments as $index => $item)
                                                                                <tr>
                                                                                         <td>{{ ++$index }}</td> 
                                                                                        <td>{{ $item->name }}</td>  
                                                                                        <td>@php $name=\App\Investments::join('properties', 'properties.id', '=', 'investments.property_id')->where('investments.user_id',$item->id)->groupby('investments.property_id')->pluck('title'); @endphp {{ $name}}</div>
                                        </td>
                                                                                        <td>${{ $item->investment_amount }}</td>
                                                                                         <!--<td>{{ $item->email }} </td>-->
                                                                                          <td>{{ $item->phone }} </td>
                                                                                         <td>{{ $item->address }} </td>
                                                                                          <!--<td>{{ $item->city }} </td>-->
                                                                                        <td><a href="leadsview/{{$item->id}}"><i class="fas fa-eye"></i> </a></td>
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
                                    <!--#3 rd -->
                                    <div class="tab-pane" id="Notes" role="tabpanel">
                                            <div class="card-body">
                                                

                                                <div class="row">
                                                   <div class="col-lg-12">
                                                       <div class="card">
                                                    <h5 class="card-title text-uppercase">Investors Profile Updates</h5>
                                                    <div class="d-flex m-b-20 ">
                                                            <div class="table-responsive m-t-20">
                                                                    <table id="" class="myTable display nowrap table table-hover table-striped border"
                                                                        cellspacing="0" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                    <th>Sno </th>
                                                                                    <th>Investors Name </th>
                                                                                    <th>Profile Name</th>
                                                                                    <th>Profile Type</th>
                                                                                    <!--<th>Investments</th>-->
                                                                                    <!--<th>Old Details</th>-->
                                                                                    <!--<th>New Details</th>-->
                                                                                    <th>Updated On</th>
                                                                                    
                                                                                    
                                                                                    <!--<th>Action</th>-->
                                                                            </tr>
                                                                        </thead>
                                                                      
                                                                        <tbody>
                                                                            @foreach ($allinvestments as $index => $item)
                                                                                <tr>
                                                                                         <td>{{ ++$index }}</td> 
                                                                                        <td>{{ $item->user->name }}</td>  
                                                                                        <td>{{ $item->user->name }}</td>
                                                                                        <td>Individual  </td>
                                         <!--                                                <td>@php $name=\App\Investments::join('properties', 'properties.id', '=', 'investments.property_id')->where('investments.user_id',$item->id)->groupby('investments.property_id')->pluck('title'); @endphp {{ $name}}</div>-->
                                         <!--</td>-->
                                                                                         
                                                                                         <!--<td>  </td>-->
                                                                                         <!--<td></td>-->
                                                                                        
                                                                                        <td>{{ date('M d , Y',strtotime($item->created_at)) }}</td>
                                                                                          
                                                                                        <!--<td><a href="leads-view.html"><i class="fas fa-eye"></i> </a></td>-->
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

                                         <!--second tab-->
                                    <div class="tab-pane" id="Distributions" role="tabpanel">
                                        <div class="card">
                                                <div class="card-body">
                                                        <p style="text-align:center;padding:30px;">No Distributions Available</p>
                                                      </div>
                                        </div>
                                          
                                        </div>

                                        <div class="tab-pane" id="Tax" role="tabpanel">
                                            <div class="card">
                                                    <div class="card-body">
                                                            <p style="text-align:center;padding:30px;">No Tax Available</p>
                                                          </div>
                                            </div>
                                              
                                            </div>
                                            <div class="tab-pane" id="Form D" role="tabpanel">
                                                <div class="card">
                                                        <div class="card-body">
                                                                <p style="text-align:center;padding:30px;">No Form -D Available</p>
                                                              </div>
                                                </div>
                                                   
                                                </div>
                             
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                    </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- End Comment - chats -->
                <!-- ============================================================== -->
    
       
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
@endsection
