@extends('layouts.user.profile.layout')
@section('title')
    <title>{{ $websiteLang->where('lang_key','dashboard')->first()->custom_text }}</title>
@endsection

@section('user-dashboard')

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
                        <h4 class="text-themecolor">Invest Now</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Invest Now</li>
                            </ol>
                          </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->

                       <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- .row -->
                <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Search</h5>
                                    <form method="GET" action="{{ route('user.search-property') }}" role="form" class="row">
                                        <div class="col-sm-6 col-md-3">
                                                <div class="form-floating mb-3">
                                                        <select name="property_type" id="property_type" class="select2 form-control form-select" style="width:100% ! important; ">
                                                                <option class="" value="">Select Investment Type</option>
                                                             @foreach ($propertyTypes as $item)
                                            <option {{ request()->get('property_type')==$item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->type }}</option>
                                                             @endforeach
                                                         </select>
                                                    </div>
                                        </div>
                                        <div class="col-sm-6 col-md-2">
                                                <div class="form-floating mb-3">
                                                        <select name="state_id" id="state_id" class="select2 form-control form-select" style="width:100% ! important; ">
                                                               <!--<option hidden Required  disabled selected hidden='hidden' class="">State</option>-->
                                                                <option value="" class="">State</option>
                                                           
                                                                    @foreach ($states as $item)
                                            <option {{ request()->get('state_id')==$item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                                             @endforeach
                                                                 
                                                           
                                                         </select>
                                                    </div>
                                         
                                        </div>
                                        <div class="col-sm-6 col-md-2">
                                                <div class="form-floating mb-3">
                                                        <select name="city_id" id="city_id" class="select2 form-control form-select" style="width:100% ! important; ">
                                                                <option value="" class="">City</option>
                                                          
                                                                     @foreach ($cities as $item)
                                            <option {{ request()->get('city_id')==$item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                                             @endforeach 
                                                          
                                                         </select>
                                                    </div>
                                         
                                        </div>
                                        <div class="col-sm-6 col-md-2">
                                                <div class="form-floating mb-3">
                                                        <select name="commercial" class="select2 form-control form-select" style="width:100% ! important; ">
                                                                <!--<option hidden Required  disabled selected hidden='hidden' class="">Property Type</option>-->
                                                            <optgroup>
                                                                    <option value="1">Commercial</option>
                                                                    <!--<option value="2">residential</option>-->
                                                            </optgroup>
                                                         </select>
                                                    </div>
                                              
                                            </div>
                                            
                                         <div class="col-sm-6 col-md-2">
                                                <div class="form-group">
                                                       <input type="hidden" name="page_type" value="list_view">
                                                       <input type="hidden" name="purpose_type" value="2">
                                                       <input type="text" placeholder="Property Name"class="form-control" name="search" value="{{ request()->get('search')}}">
                 
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-1">
                                            <button type="submit" class="btn btn-dark w-100 form-control" style="padding:9px;"><i class="fa fa-search text-white"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if(count($properties)>0)
                        @foreach ($properties as $item) 
                      <!-- item -->
                      <div class="col-lg-4 col-md-6">
                            <div class="card">
                                 <div class="card-body">
                                <img class="card-img-top" src="{{ url($item->thumbnail_image) }}" width="335" height="225" alt="Card image cap">
                                <div class="card-img-overlay">
                                   <span class="badge bg-danger rounded-pill">{{ $item->status }}</span>
                                </div>
                                <div class="card-body bg-light">
                                    <h4 class="card-title invest-align">{{ $item->title }}</h4>
                                </div>
                                <div class="card-body border-top">
                                     @if(isset($item->offering_size))
                                    <div class="d-flex no-block align-items-center">
                                       <span class="p-10 text-muted">Offering Size</span>
                                        <span class="ms-auto  pull-right"> {{ $item->offering_size }}</span>
                                    </div>
                                    @endif
                                    @if(isset($item->min_investment))
                                    <div class="d-flex no-block align-items-center">
                                      <span class="p-10 text-muted">Min Investment</span>
                                        <span class="ms-auto  pull-right">${{ $item->min_investment }}</span>
                                    </div>
                                    @endif
                                     @if(isset($item->holding_period))
                                    <div class="d-flex no-block align-items-center">
                                         <span class="p-10 text-muted"> Term</span>
                                        <span class="ms-auto  pull-right">{{ $item->holding_period }}</span>
                                    </div>
                                    @endif
                                     @if(isset($item->total_return))
                                    <div class="d-flex no-block align-items-center">
                                            <span class="p-10 text-muted"> Expected Returns </span>
                                           <span class="ms-auto pull-right">{{ $item->total_return }}</span>
                                       </div>
                                      @endif 
                                       @if(isset($item->target_arr))
                                       <div class="d-flex no-block align-items-center">
                                            <span class="p-10 text-muted"> Target IRR</span>
                                           <span class="ms-auto  pull-right">  {{ $item->target_arr }}</span>
                                       </div>
                                       @endif
                                    
                                </div>
                                <div class="card-body border-top">
                                        <a href="" target="_blank">
                                             <div class="d-flex no-block align-items-center">
                                          <h6 class="text-muted"><i class="ti-location-pin"></i> {{ $item->address.', '.$item->city->name }} </h6>
                                    </div>
                                </a>
                                </div>
                                <div class="card-body border-top">
                                        <div class="d-flex no-block align-items-center">
                                                <a href="property-details/{{$item->id}}" class="btn btn-rounded btn-outline-primary m-5 p-10 w-100 waves-effect waves-light ">View Details </a>
                                                <a href="invest-progress/{{$item->id}}" class="btn btn-rounded btn-outline-primary m-5 p-10 w-100 waves-effect waves-light ">Invest Now</a>  
                                        </div>
                                    </div>
                            </div>
                            </div>
                        </div>
                        <!-- /item -->
                       @endforeach
                       @else
                           <div class="col-md-lg col-md-12">
                                <p style="text-align:center">No Record found</p>
                                </div>
                       @endif
                        <!-- /item -->
                   
                    </div>
                    <!-- /.row -->
                    <!-- .row -->







          
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
  
  <style>
    .select2-container--default .select2-selection--single {
    border-color: #888888 ! important;
    height: 42px ! important;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 42px;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 26px;
    position: absolute;
    top: 10px;
    right: 1px;
    width: 20px;
}
    </style>
    
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
  
  
 