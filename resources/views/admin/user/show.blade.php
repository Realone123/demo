@extends('layouts.admin.layout')
@section('title')
<title>{{ $user->name }}</title>
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
                                <li class="breadcrumb-item active"><a href="{{ route('admin.agents') }}">Investors</a></li>
                            </ol>
                            <a href="{{ route('admin.create-investor') }}" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle  padd5"></i>Add </a>
                        
                          </div>
                    </div>

                   
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                 
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('admin.agents') }}" class="btn btn-success"> <i class="fas fa-backward" aria-hidden="true"></i> {{ $websiteLang->where('lang_key','go_back')->first()->custom_text }} </a></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Investors Information</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <td>{{ $websiteLang->where('lang_key','photo')->first()->custom_text }}</td>
                    <td> <img src="{{ $user->image ? asset($user->image) : asset($default_profile_image->image) }}" alt="user image" width="100px"> </td>
                </tr>
                <tr>
                    <td>{{ $websiteLang->where('lang_key','name')->first()->custom_text }}</td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td>{{ $websiteLang->where('lang_key','email')->first()->custom_text }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td>{{ $websiteLang->where('lang_key','about')->first()->custom_text }}</td>
                    <td>{{ $user->about }}</td>
                </tr>
                <tr>
                    <td>{{ $websiteLang->where('lang_key','phone')->first()->custom_text }}</td>
                    <td>{{ $user->phone }}</td>
                </tr>
                <tr>
                    <td>{{ $websiteLang->where('lang_key','status')->first()->custom_text }}</td>
                    <td>
                        @if ($user->status==1)
                                <a href="" onclick="userStatus({{ $user->id }})"><input type="checkbox" checked data-toggle="toggle" data-on="{{ $websiteLang->where('lang_key','active')->first()->custom_text }}" data-off="{{ $websiteLang->where('lang_key','inactive')->first()->custom_text }}" data-onstyle="success" data-offstyle="danger"></a>
                                @else
                                    <a href="" onclick="userStatus({{ $user->id }})"><input type="checkbox" data-toggle="toggle" data-on="{{ $websiteLang->where('lang_key','active')->first()->custom_text }}" data-off="{{ $websiteLang->where('lang_key','inactive')->first()->custom_text }}" data-onstyle="success" data-offstyle="danger"></a>

                                @endif
                    </td>
                </tr>

                @if ($user->facebook)
                <tr>
                    <td>{{ $websiteLang->where('lang_key','facebook')->first()->custom_text }}</td>
                    <td><a href="{{ $user->facebook }}">{{ $user->facebook }} </a></td>
                </tr>
                @endif
                @if ($user->twitter)
                <tr>
                    <td>{{ $websiteLang->where('lang_key','twitter')->first()->custom_text }}</td>
                    <td><a href="{{ $user->twitter }}">{{ $user->twitter }} </a></td>
                </tr>
                @endif
                @if ($user->linkedin)
                <tr>
                    <td>{{ $websiteLang->where('lang_key','linkedin')->first()->custom_text }}</td>
                    <td><a href="{{ $user->linkedin }}">{{ $user->linkedin }} </a></td>
                </tr>
                @endif
                @if ($user->whatsapp)
                <tr>
                    <td>{{ $websiteLang->where('lang_key','whatsapp')->first()->custom_text }}</td>
                    <td><a href="{{ $user->whatsapp }}">{{ $user->whatsapp }} </a></td>
                </tr>
                @endif

                @if ($user->website)
                <tr>
                    <td>{{ $websiteLang->where('lang_key','website')->first()->custom_text }}</td>
                    <td><a href="{{ $user->website }}">{{ $user->website }} </a></td>
                </tr>
                @endif


            </table>
        </div>
    </div>
    </div>
    </div>

    <script>

        function userStatus(id){
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
@endsection
