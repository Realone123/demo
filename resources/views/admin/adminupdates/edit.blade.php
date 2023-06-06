@extends('layouts.admin.layout')
@section('title')
<title>{{ $websiteLang->where('lang_key','property')->first()->custom_text }}</title>
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
                        <h4 class="text-themecolor">Add Updates </h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.adminupdates.index') }}">Updates</a></li>
                                <li class="breadcrumb-item active">Add Updates</li>
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
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                     <form action="{{ route('admin.adminupdates.update',$updates->id) }}" method="POST" enctype="multipart/form-data" id="hockey">
                                        @csrf
                                        @method('patch') 
                                                        <div class="row m-t-10 p-10">
                                                            
                                                                 
                                                            <div class="col-lg-6">
                                                                    <div class="form-floating mb-3">
                                                                               <select name="property_id" id="property_id" class="form-control select2" onchange="showHide(this)">
                                        <option value="">Select Property</option>
                                        @foreach ($properties as $item)
                                        <option {{ $updates->property_id==$item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                    
                                                                        </div>
                                                                  
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-floating mb-3">
                                                                            <input type="text" name="subject" value="{{ $updates->subject}}" class="form-control" id="subject" placeholder="Enter Name here">
                                                                            <label for="tb-fname">Subject</label>
                                                                    </div>
                                                                   </div>


                                                        </div>
                                                    
                                                            <div class="row p-10">
                                                             
                                                  

                                                                           <div class="col-md-12">
                                                                                <div class="form-group ">
                                                                                        <label class="m-b-10">Description</label>
                                                                                        <textarea id="textarea_editor" name="description" id="description" class=" form-control" rows="15" placeholder="Enter text ...">{{ $updates->description}} </textarea>
                                                                                                </div>
                                                                             </div>
                                                                          
                                                                                       <div class="col-md-2 m-t-20">
                                                                                            <div class="d-flex no-block align-items-center">
                                                                                                    <button class="btn btn-rounded btn-outline-primary w-100 waves-effect waves-light" style="margin:auto !important">SAVE</button>
                                                                                                   </div>
                                                                                      </div>
                                                                                    
                                                                     </div>
                                                              </div>
                                                         </form>
                                                  </div>
                                            </div>
                        </div>
                    </div>
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



        <!-- ============================================================== -->
 
<style>
    
#1, #3, #4, #5 {
  display: none !important;
}
</style>
 <script>
   function showHide(elem) {
          //alert("hi");
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
   <script src="{{asset('assets/node_modules/summernote/dist/summernote-bs4.min.js')}}"></script>
   <script>
   $(function() {

       $('.summernote').summernote({
           height: 350, // set editor height
           minHeight: null, // set minimum height of editor
           maxHeight: null, // set maximum height of editor
           focus: false // set focus to editable area after initializing summernote
       });

       $('.inline-editor').summernote({
           airMode: true
       });

   });

   window.edit = function() {
           $(".click2edit").summernote()
       },
       window.save = function() {
           $(".click2edit").summernote('destroy');
       }
   </script>

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
 <!-- wysuhtml5 Plugin JavaScript -->
 <script src="{{asset('assets/node_modules/tinymce/tinymce.min.js')}}"></script>
 <script>
 $(document).ready(function() {

     if ($("#mymce").length > 0) {
         tinymce.init({
             selector: "textarea#mymce",
             theme: "modern",
             height: 300,
             plugins: [
                 "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                 "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                 "save table contextmenu directionality emoticons template paste textcolor"
             ],
             toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

         });
     }

      if ($("#mymce1").length > 0) {
         tinymce.init({
             selector: "textarea#mymce1",
             theme: "modern",
             height: 300,
             plugins: [
                 "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                 "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                 "save table contextmenu directionality emoticons template paste textcolor"
             ],
             toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

         });
     }
     if ($("#mymce2").length > 0) {
         tinymce.init({
             selector: "textarea#mymce2",
             theme: "modern",
             height: 300,
             plugins: [
                 "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                 "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                 "save table contextmenu directionality emoticons template paste textcolor"
             ],
             toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

         });
     }
     
 });
 </script>
 
 
 @endsection
