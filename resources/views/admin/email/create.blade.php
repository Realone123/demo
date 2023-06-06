@extends('layouts.admin.layout')
@section('title')
<title>investment</title>
@endsection
@section('admin-content')

     
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
                        <h4 class="text-themecolor"><a href="{{ route('admin.email.index') }}"><i class=" fas fa-arrow-left"></i> Back</a></h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                               <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active"><a href="">Compose Mail</a></li>
                            </ol>
                         <!--   <a href="add-email.html" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle  padd5"></i>Add Email</a>
                         -->
                          </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
           
         
                <!-- ============================================================== -->
                <!-- End Info box -->
                <!-- ============================================================== -->
   <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                        <div class="col-12">
                            <div class="card m-b-0">
                                <!-- .chat-row -->
                                
                                <div class="chat-main-box">
                                    <!-- .chat-left-panel -->
                                    <div class="chat-left-aside">
                                        <div class="open-panel"><i class="ti-angle-right"></i></div>
                                        <div class="chat-left-inner">
                                             <form method="GET" action="{{ route('searchreceipts') }}" >
                                            <div class="row">
                                                <div class="col-md-9 col-lg-9">
                                                        <div class="form-material">
                                                                <input class="form-control p-2" name="user_id" id="user_id" type="text" placeholder="Search Contact">
                                                            </div>
                                                        </div>          
                                            <div class="col-lg-3 col-md-3">
                                                    <button type="submit" class="btn btn-dark w-100 " style="padding:7px;margin:15px 0px 15px -5px;"><i class="fa fa-search text-white"></i></button>
                                                  </div>
                                             
                                                </div>
                                            </form>
                                            
                                              <ul>
                                                <li style="list-style-type:none; padding:10px 0px;">
                                                     <div class="row">
                                                                    <div class="col-lg-8">
                                                                    </div>
                                                                        <div class="col-lg-4">
                                                                                <div class="all">
                                                                                        <span> <div class="form-check mr-sm-2">
                                                                                                <input type="checkbox" class="form-check-input" name="allusers" id="checkbox0" value="allusers" onclick= 'checkUncheck(this)'>
                                                                                                <label class="form-check-label" for="checkbox0">All </label>
                                                                                            </div>
                                                                                        </span>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                   </li>
                                                </ul>
                                            
                                            <form action="{{ route('admin.email.store') }}" method="POST" enctype="multipart/form-data" id="hockey">
                                        @csrf
                                           
                                            <ul class="chatonline style-none "  style="overflow-y:scroll;height:300px;">
                                                 
                                            @foreach ($users as $item)
                                                <li>
                                                  <a href="">
                                                    <div class="row">
                                                        <div class="col-lg-9">
                                                             <img  @if($item->image) src="{{ url($item->image)  }}"  @else src="{{asset('assets/images/users/user1.jpg')}}" @endif  alt="user-img" class="img-circle"> <span>{{ $item->name }} </span>
                                                  
                                                            </div>
                                                            <div class="col-lg-3">
                                                                    <span> <div class="form-check mr-sm-2">
                                                                            <input type="checkbox" class="form-check-input" name="user_id[]" id="checkbox{{ $item->id }}" value="{{ $item->id }}">
                                                                            <label class="form-check-label" for="checkbox0"></label>
                                                                        </div>
                                                                    </span>
                                                                </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                @endforeach
                                               
                                             
                                             
                                                <li class="p-20"></li>
                                            </ul>
                                        </div>
                                   
                                    </div>
                                    
                                    <!-- .chat-left-panel -->
                                    <!-- .chat-right-panel -->
                                     
                                    <div class="chat-right-aside">
                                        <div class="chat-main-header">
                                            <div class="p-3 b-b">
                                                <h4 class="box-title"> Compose Mail</h4>
                                            </div>
                                        </div>
                                      
                                        <div class="chat-rbox" style="padding:10px! important">
                                              
                                                        <div class="col-lg-12 col-md-12">
                                                              <div class="form-group">
                                                                      <input type="text" name="subject" class="form-control" id="" placeholder="Subject">
                                                                      <!-- <label for="tb-fname"></label> -->
                                                              </div>
                                                                
                                                              </div>
                                                              <div class="col-lg-12 col-md-12">
                                                                      <div class="form-group ">
                                                                              <label class="m-b-10">Description </label>
                                                                              <textarea id="textarea_editor" name="message" class=" form-control" rows="15" placeholder="Enter text ..."></textarea>
                                                                       </div>
                                                                  
                                                              </div>
                                                </div>
                                                
                                    <div class="card-body border-top">
                                            <div class="row">
                                                <div class="col-8"></div>
                                                <div class="col-4 text-end">
                                                    <button type="submit" class="btn btn-info btn-circle btn-lg text-white"><i class="fas fa-paper-plane"></i> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    </form>
                                    <!-- .chat-right-panel -->
                                </div>
                                <!-- /.chat-row -->
                            </div>
                        </div>
                    </div>
                 <!-- ============================================================== -->
                <!-- .right-sidebar -->
                           <!-- .right-sidebar -->
                     
            
             
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
       

<script>
    function checkUncheck(checkBox) {

get = document.getElementsByName('user_id[]');

for(var i=0; i<get.length; i++) {

get[i].checked = checkBox.checked;}

}
</script>



@endsection
