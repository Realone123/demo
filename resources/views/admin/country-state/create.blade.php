@extends('layouts.admin.layout')
@section('title')
<title>{{ $websiteLang->where('lang_key','state')->first()->custom_text }}</title>
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
                        <h4 class="text-themecolor">All States</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">States</li>
                            </ol>
                            <a href="{{ route('admin.country-state.create') }}" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle  padd5"></i>Add </a>
                        
                          </div>
                    </div>

                   
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                     <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
            <form action="{{ route('admin.country-state.store') }}" method="post">
                @csrf
            
             <div class="col-md-6">
                <div class="form-group">
                    <label>{{ $websiteLang->where('lang_key','country')->first()->custom_text }}</label>
                    <select name="country"  class="form-control" id="custom-select2">
                        <option value="">{{ $websiteLang->where('lang_key','select_country')->first()->custom_text }}</option>
                        @foreach ($countries as $item)
                            <option {{ old('country')==$item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                </div>
                 <div class="col-md-6">
                <div class="form-group">
                    <label for="name">{{ $websiteLang->where('lang_key','state_name')->first()->custom_text }}</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                </div>
                </div>
                 <div class="col-md-6">
                <div class="form-group">
                    <label for="status">{{ $websiteLang->where('lang_key','status')->first()->custom_text }}</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1">{{ $websiteLang->where('lang_key','active')->first()->custom_text }}</option>
                        <option value="0">{{ $websiteLang->where('lang_key','inactive')->first()->custom_text }}</option>
                    </select>
                </div>
                </div>

               <div class="col-md-2 m-t-20">
                                                                                            <div class="d-flex no-block align-items-center">
                                                                                                 <button type="submit" class="btn btn-rounded btn-outline-primary w-100 waves-effect waves-light" style="margin:auto !important">{{ $websiteLang->where('lang_key','save')->first()->custom_text }}</button>  
                                                                                                    </div>
                                                                                      </div>                                                                                  
                 </form>
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
@endsection
