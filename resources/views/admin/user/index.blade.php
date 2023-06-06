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
                        <h4 class="text-themecolor">All Investors</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Investors</li>
                            </ol>
                            <!--<a href="{{ route('admin.create-investor') }}" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle  padd5"></i>Add </a>-->
                        
                          </div>
                    </div>

                   
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                 
               <!-- ============================================================== -->
                <!-- Over Visitor, Our income , slaes different and  sales prediction -->
                <!-- ============================================================== -->

                <div class="row m-t-20">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white">{{ $allinvestors->count()}}</h1>
                                <h6 class="text-white">Total Investors</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card">
                            <div class="box bg-primary text-center">
                                <h1 class="font-light text-white">${{ $allinvestors->sum('investment_amount')}}</h1>
                                <h6 class="text-white">Total Invested</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white">0</h1>
                                <h6 class="text-white">Pending Investments</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card">
                            <div class="box bg-dark text-center">
                                <h1 class="font-light text-white">0</h1>
                                <h6 class="text-white">Inactive Investors</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>



          

                <!-- .row -->
                <div class="row">
                        <div class="col-md-12">
                                    <div class="card ">
                                        <div class="card-body">
                                               <h5 class="card-title text-uppercase">Investors</h5>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                  <form method="GET" action="{{ route('admin.searchinvetors') }}" >
                   
                      <div class="row">
                        <div class="col-lg-4">
                                <div class="form-floating mb-3">
                                         <select name="property_id" id="property_id" class="select2 form-control form-select" style="width:100% ! important;">
                                                <option value="">Select Property</option>    
                                             @foreach ($properties as $property)
                                        <option {{ request()->get('property_id')==$property->id ? 'selected' : '' }} value="{{ $property->id }}" id="{{ $property->id }}">{{ $property->title }}</option>
                                        @endforeach
                                         </select>
                                    </div>
                              </div>

                              <div class="col-lg-4">
                                <div class="form-floating mb-3">
                                        <select name="user_id" id="user_id" class="select2 form-control form-select" style="width:100% ! important;">
                                                <option value="">Select Investors</option>    
                                             @foreach ($users as $item)
                                        <option {{ request()->get('user_id')==$item->id ? 'selected' : '' }} value="{{ $item->id }}" id="pro{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                         </select>
                                    </div>
                              </div>
                              <div class="col-lg-1 col-md-1">
                                <button type="submit" class="btn btn-dark w-100 " style="padding:7px;"><i class="fa fa-search text-white"></i></button>
                              </div>
     
                        <div class="col-md-3 col-lg-3">
                                <a href="{{ route('admin.create-investor') }}" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle  padd5"></i>Add  Investors</a>
                         </div>
                    </div>
                     </form>
               
                <div class="row el-element-overlay">
                   
                   @foreach ($allinvestors as $index => $item)
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item" style="border:1px solid #efefef;">
                                <div class="el-card-avatar el-overlay-1">
                                  <a href="leadsview/{{$item->id}}"> <img  @if($item->image) src="{{ url($item->image)  }}"  @else src="{{asset('assets/images/users/user1.jpg')}}" @endif alt="user" style="width:245px; height:239px;"/></a> 
                            </div>
                            
                                <div class="el-card-content">
                                    <h4 class="box-title" style="padding:10px 10px; text-align:center">{{ $item->name }}</h4>
                                </div>
                                    <div class="row padd05">
                                        <div class="col-md-10">Total Properties :  </div>
                                            <div class="col-md-2">@php $name=\App\Investments::join('properties', 'properties.id', '=', 'investments.property_id')->where('investments.user_id',$item->id)->groupby('investments.property_id')->pluck('title'); @endphp {{ count($name)}}</div>
                                        </div>
                                        <div class="row padd05">
                                                <div class="col-md-8">Total Invested:  </div>
                                                    <div class="col-md-4">${{ \App\Investments::where('user_id',$item->id)->where('status','Approved')->sum('investment_amount') }}</div>
                                                </div>
                                                <div class="row padd05">
                                                        <div class="col-md-8">Pending Invested :  </div>
                                                            <div class="col-md-4">${{ \App\Investments::where('user_id',$item->id)->where('status','Pending')->sum('investment_amount') }}</div>
                                                        </div>
                                     </div>
                        </div>
                    </div>
                    @endforeach
                   @if (count($allinvestors) > 0)
          <div class="col-12">
            {{ $allinvestors->links('user.paginator') }}
          </div>
          @endif
               
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
        function userStatus(id){

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
                url:"{{url('/admin/agents-status/')}}"+"/"+id,
                success:function(response){
                   toastr.success(response)
                },
                error:function(err){
                    console.log(err);

                }
            })
        }
    </script>
    <script>
        function showHide(elem) {
    if(elem.selectedIndex !== 0) {
    //hide the divs
    for(var i=0; i < divsO.length; i++) {
    divsO[i].style.display = 'none';
    }
    //unhide the selected div
    document.getElementById(elem.value).style.display = 'block';
    }
    }
    
    window.onload=function() {
    //get the divs to show/hide
    divsO = document.getElementById("hockey").getElementsByClassName('show-hide');
    };
        </script>
    
       <!--Custom JavaScript -->
       <script src="{{asset('dist/js/custom.min.js')}}"></script>
      
    
        <!-- This page plugins -->
          <script>
            $(function () {
                // Switchery
                var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
                $('.js-switch').each(function () {
                    new Switchery($(this)[0], $(this).data());
                });
                // For select 2
                $(".select2").select2();
                $('.selectpicker').selectpicker();
                //Bootstrap-TouchSpin
                $(".vertical-spin").TouchSpin({
                    verticalbuttons: true
                });
                var vspinTrue = $(".vertical-spin").TouchSpin({
                    verticalbuttons: true
                });
                if (vspinTrue) {
                    $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
                }
                $("input[name='tch1']").TouchSpin({
                    min: 0,
                    max: 100,
                    step: 0.1,
                    decimals: 2,
                    boostat: 5,
                    maxboostedstep: 10,
                    postfix: '%'
                });
                $("input[name='tch2']").TouchSpin({
                    min: -1000000000,
                    max: 1000000000,
                    stepinterval: 50,
                    maxboostedstep: 10000000,
                    prefix: '$'
                });
                $("input[name='tch3']").TouchSpin();
                $("input[name='tch3_22']").TouchSpin({
                    initval: 40
                });
                $("input[name='tch5']").TouchSpin({
                    prefix: "pre",
                    postfix: "post"
                });
                // For multiselect
                $('#pre-selected-options').multiSelect();
                $('#optgroup').multiSelect({
                    selectableOptgroup: true
                });
                $('#public-methods').multiSelect();
                $('#select-all').click(function () {
                    $('#public-methods').multiSelect('select_all');
                    return false;
                });
                $('#deselect-all').click(function () {
                    $('#public-methods').multiSelect('deselect_all');
                    return false;
                });
                $('#refresh').on('click', function () {
                    $('#public-methods').multiSelect('refresh');
                    return false;
                });
                $('#add-option').on('click', function () {
                    $('#public-methods').multiSelect('addOption', {
                        value: 42,
                        text: 'test 42',
                        index: 0
                    });
                    return false;
                });
                $(".ajax").select2({
                    ajax: {
                        url: "https://api.github.com/search/repositories",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                q: params.term, // search term
                                page: params.page
                            };
                        },
                        processResults: function (data, params) {
                            // parse the results into the format expected by Select2
                            // since we are using custom formatting functions we do not need to
                            // alter the remote JSON data, except to indicate that infinite
                            // scrolling can be used
                            params.page = params.page || 1;
                            return {
                                results: data.items,
                                pagination: {
                                    more: (params.page * 30) < data.total_count
                                }
                            };
                        },
                        cache: true
                    },
                    escapeMarkup: function (markup) {
                        return markup;
                    }, // let our custom formatter work
                    minimumInputLength: 1,
                    //templateResult: formatRepo, // omitted for brevity, see the source of this page
                    //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
                });
            });
        </script>
    
@endsection
