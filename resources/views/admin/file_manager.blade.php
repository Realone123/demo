@extends('layouts.admin.layout')
@section('title')
<title>{{ $websiteLang->where('lang_key','file_manager')->first()->custom_text }}</title>
@endsection
<style>
    .file-manager img {
        width: 200px;
        height: 120px;
        object-fit: cover;
    }

    .copy-url {
        width: 250px !important;
        display: inline !important;
    }
    .copy-btn {
        display: inline !important;
    }
</style>
@section('admin-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><a href="javascript:;" data-toggle="modal" data-target="#newCategory" class="btn btn-primary"><i class="fas fa-plus" aria-hidden="true"></i> {{ $websiteLang->where('lang_key','add_new')->first()->custom_text }} </a></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $websiteLang->where('lang_key','file_manager')->first()->custom_text }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">{{ $websiteLang->where('lang_key','serial')->first()->custom_text }}</th>
                            <th width="15%">{{ $websiteLang->where('lang_key','title')->first()->custom_text }}</th>
                            <th width="20%">{{ $websiteLang->where('lang_key','image')->first()->custom_text }}</th>
                            <th width="35%">{{ $websiteLang->where('lang_key','image_path')->first()->custom_text }}</th>
                            <th width="10%">{{ $websiteLang->where('lang_key','action')->first()->custom_text }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($images as $index => $item)
                        <tr>
                            <td>{{ ++$index }}</td>
                            <td>{{ $item->title }}</td>
                            <td>
                                <div class="file-manager">
                                    <img  src="{{ $item->image }}" alt="">
                                </div>
                            </td>
                            <td>
                                <input type="text" value="{{ $item->image }}" class="form-control copy-url">
                                <button class="btn btn-primary copy-btn" onclick="myFunction('{{ $item->image }}')">{{ $websiteLang->where('lang_key','copy')->first()->custom_text }}</button>
                            </td>

                            <td>
                                <a data-toggle="modal" data-target="#deleteModal" href="javascript:;" onclick="deleteData({{ $item->id }})" class="btn btn-danger btn-sm"><i class="fas fa-trash    "></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Create Blog Category Modal -->
    <div class="modal fade" id="newCategory" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">{{ $websiteLang->where('lang_key','new_image')->first()->custom_text }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">

                        <form action="{{ route('admin.file-manager.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">{{ $websiteLang->where('lang_key','title')->first()->custom_text }}</label>
                                <input required type="text" class="form-control" name="title" id="title">
                            </div>
                            <div class="form-group">
                                <label for="name">{{ $websiteLang->where('lang_key','image')->first()->custom_text }}</label>
                                <input required type="file" class="form-control" name="image" id="image">
                            </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ $websiteLang->where('lang_key','close')->first()->custom_text }}</button>
                    <button type="submit" class="btn btn-primary">{{ $websiteLang->where('lang_key','save')->first()->custom_text }}</button>
                </div>
            </form>
            </div>
        </div>
    </div>


    <script>
        function deleteData(id){
            $("#deleteForm").attr("action",'{{ url("admin/file-manager/") }}'+"/"+id)
        }

        function blogCategoryStatus(id){

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
                url:"{{url('/admin/blog-category-status/')}}"+"/"+id,
                success:function(response){
                   toastr.success(response)
                },
                error:function(err){
                    console.log(err);

                }
            })
        }

        function copyToClipboard(text) {
            var sampleTextarea = document.createElement("textarea");
            document.body.appendChild(sampleTextarea);
            sampleTextarea.value = text; //save main text in it
            sampleTextarea.select(); //select textarea contenrs
            document.execCommand("copy");
            document.body.removeChild(sampleTextarea);
        }
        function myFunction(image){
            copyToClipboard(image);
        }
    </script>
@endsection
