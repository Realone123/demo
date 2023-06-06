@extends('layouts.admin.layout')
@section('title')
<title>{{ $websiteLang->where('lang_key','slider')->first()->custom_text }}</title>
@endsection
@section('admin-content')

     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800"><a href="#" data-toggle="modal" data-target="#addTestimonial" class="btn btn-success"><i class="fas fa-plus" aria-hidden="true"></i> {{ $websiteLang->where('lang_key','create')->first()->custom_text }} </a></h1>

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $websiteLang->where('lang_key','slider_table')->first()->custom_text }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%" >{{ $websiteLang->where('lang_key','serial')->first()->custom_text }}</th>
                            <th width="20%" >{{ $websiteLang->where('lang_key','title')->first()->custom_text }}</th>
                            <th width="10%" >{{ $websiteLang->where('lang_key','img')->first()->custom_text }}</th>
                            <th width="10%" >{{ $websiteLang->where('lang_key','status')->first()->custom_text }}</th>
                            <th width="10%" >{{ $websiteLang->where('lang_key','action')->first()->custom_text }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $index => $item)
                        <tr>
                            <td>{{ $item->serial }}</td>
                            <td>{{ $item->title }}</td>
                            <td>
                                <img src="{{ asset($item->image) }}" width="120px" alt="">
                            </td>

                            <td>
                                @if ($item->status==1)
                                    <a href="" onclick="testimonialStatus({{ $item->id }})"><input type="checkbox" checked data-toggle="toggle" data-on="{{ $websiteLang->where('lang_key','active')->first()->custom_text }}" data-off="{{ $websiteLang->where('lang_key','inactive')->first()->custom_text }}" data-onstyle="success" data-offstyle="danger"></a>
                                @else
                                    <a href="" onclick="testimonialStatus({{ $item->id }})"><input type="checkbox" data-toggle="toggle" data-on="{{ $websiteLang->where('lang_key','active')->first()->custom_text }}" data-off="{{ $websiteLang->where('lang_key','inactive')->first()->custom_text }}" data-onstyle="success" data-offstyle="danger"></a>

                                @endif
                            </td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#updateFaq-{{ $item->id }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                <a data-toggle="modal" data-target="#deleteModal" href="javascript:;" onclick="deleteData({{ $item->id }})" class="btn btn-danger btn-sm"><i class="fas fa-trash    "></i></a>


                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


        <!-- create new testimonial Modal -->
        <div class="modal fade" id="addTestimonial" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title">{{ $websiteLang->where('lang_key','slider_form')->first()->custom_text }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">{{ $websiteLang->where('lang_key','new_img')->first()->custom_text }}</label>
                                    <input type="file" name="image" class="form-control-file">
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">{{ $websiteLang->where('lang_key','title')->first()->custom_text }}</label>
                                            <input type="text" name="title" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">{{ $websiteLang->where('lang_key','serial')->first()->custom_text }}</label>
                                            <input type="text" name="serial" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="status">{{ $websiteLang->where('lang_key','status')->first()->custom_text }}</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="1">{{ $websiteLang->where('lang_key','active')->first()->custom_text }}</option>
                                                <option value="0">{{ $websiteLang->where('lang_key','inactive')->first()->custom_text }}</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>


                                <button class="btn btn-success" type="submit">{{ $websiteLang->where('lang_key','save')->first()->custom_text }}</button>

                                </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- update testimonial Modal -->
     @foreach ($sliders as $item)
     <div class="modal fade" id="updateFaq-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
         <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">{{ $websiteLang->where('lang_key','slider_form')->first()->custom_text }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="{{ route('admin.slider.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">{{ $websiteLang->where('lang_key','exist_img')->first()->custom_text }}</label>
                            <div>
                                <img src="{{ asset($item->image) }}" width="120px" alt="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">{{ $websiteLang->where('lang_key','new_img')->first()->custom_text }}</label>
                            <input type="file" name="image" class="form-control-file">
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">{{ $websiteLang->where('lang_key','title')->first()->custom_text }}</label>
                                    <input type="text" name="title" class="form-control" value="{{ $item->title }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">{{ $websiteLang->where('lang_key','serial')->first()->custom_text }}</label>
                                    <input type="text" name="serial" class="form-control" value="{{ $item->serial }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="status">{{ $websiteLang->where('lang_key','status')->first()->custom_text }}</label>
                                    <select name="status" id="status" class="form-control">
                                        <option {{ $item->status==1 ? 'selected' : '' }} value="1">{{ $websiteLang->where('lang_key','active')->first()->custom_text }}</option>
                                        <option {{ $item->status==0 ? 'selected' : '' }} value="0">{{ $websiteLang->where('lang_key','inactive')->first()->custom_text }}</option>
                                    </select>
                                </div>
                            </div>


                        </div>


                        <button class="btn btn-success" type="submit">{{ $websiteLang->where('lang_key','update')->first()->custom_text }}</button>

                        </form>
                </div>
            </div>

        </div>
         </div>
     </div>

     @endforeach


        <script>
            function deleteData(id){
                $("#deleteForm").attr("action",'{{ url("/admin/slider/") }}'+"/"+id)
            }

            function testimonialStatus(id){
                // project demo mode check
                var isDemo="{{ env('PROJECT_MODE') }}"
                var demoNotify="{{ env('NOTIFY_TEXT') }}"
                if(isDemo==0){
                    toastr.error(demoNotify);
                    return;
                }
                $.ajax({
                    type:"get",
                    url:"{{url('/admin/slider-status/')}}"+"/"+id,
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
