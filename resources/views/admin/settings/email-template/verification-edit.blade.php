@extends('layouts.admin.layout')
@section('title')
<title>{{ $websiteLang->where('lang_key','email_template')->first()->custom_text }}</title>
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
                        <h4 class="text-themecolor">Add Email Template</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{route('admin.email.template')}}">Email Template</a></li>
                                <li class="breadcrumb-item active">Edit Email Template</li>
                            </ol>
                          </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
      <div class="row">
                        
                                <div class="col-md-12">
                                        <div class="card">
                                                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>{{ $websiteLang->where('lang_key','variable')->first()->custom_text }}</th>
                            <th>{{ $websiteLang->where('lang_key','subject')->first()->custom_text }}</th>
                        </thead>
                        <tbody>
                            <tr>
                                @php
                                    $name="{{user_name}}";
                                @endphp
                                <td>{{ $name }}</td>
                                <td>{{ $websiteLang->where('lang_key','user_name')->first()->custom_text }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-body">

                    <form action="{{ route('admin.email-template.update',$email->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">{{ $websiteLang->where('lang_key','subject')->first()->custom_text }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="{{ $email->subject }}" name="subject">
                        </div>
                        <div class="form-group">
                            <label for="">{{ $websiteLang->where('lang_key','des')->first()->custom_text }} <span class="text-danger">*</span></label>
                            <textarea id="textarea_editor" name="description" cols="30" rows="10" class="form-control">{{ $email->description }}</textarea>

                        </div>

                         <div class="col-md-12 m-t-20">
                                                        <div class="col-md-2">
                                                                <div class="d-flex no-block align-items-center">
                                                                        <button class="btn btn-rounded btn-outline-primary w-100 waves-effect waves-light" type="submit">{{ $websiteLang->where('lang_key','update')->first()->custom_text }}</button>
                                                                 </div>
                                                          </div>
                                                 </div>
                                                 </form>
                </div>
            </div>
        </div>
    </div>
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

 
<script src="{{asset('assets/node_modules/html5-editor/wysihtml5-0.3.0.js')}}"></script>
<script src="{{asset('assets/node_modules/html5-editor/bootstrap-wysihtml5.js')}}"></script>
<script>
        $(document).ready(function() {
    
            $('#textarea_editor').wysihtml5();
        
        });
        </script>





