@extends('layouts.user.profile.layout')
@section('title')
    <title></title>
@endsection

@section('user-dashboard')



        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <!--<div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Updates </a></li>
                    </ol>
                </div>
            </div>-->
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                        <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                        <div class="col-md-9 col-sm-9">
                                                <h4 class="card-title"><a href="realinvest.html">
                                                    <i class='far fa-arrow-alt-circle-left' style="font-style:normal">Add Properties</i></a></h4>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                 
                                                            </div>
                                                </div>
                                            
                                            </div>
                                       </div>
                                </div>

                                <div class="col-md-12">
                                        <div class="card">
                                                <div class="card-body">
                                                        <form action="#" method="post" id="hockey">
                                                            <div class="row">
                                                                <div class="col-lg-6 padd0">
                                                                        <div class="dropdown-form">
                                                                                <select name="hockeyList" class="form-control" onchange="showHide(this)">
                                                                                  <option hidden Required>Select Investment Type</option>
                                                                                  <option value="Contstruction">Contstruction</option>
                                                                                  <option value="CashFlow">Cash Flow</option>
                                                                                  <option value="Land">Land</option>
                                                                                  <option value="MulitiFamily">Muliti Family</option>
                                                                                </select>
                                                                              </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                        <div class="dropdown-options">
                                                                                <div class="show-hide" id="Contstruction">
                                                                                <div class="row">
                                                                                        <div class="form-group col-md-4 paddleft">
                                                                                                <label> Number of Units</label>
                                                                                                <input type="text" class="form-control" placeholder="Enter  Number of Units">
                                                                                            </div>   
                                                                                     </div>       
                                                                                </div>
                                                                                <div class="show-hide" id="CashFlow">
                                                                                    <div class="row"> 
                                                                                    <div class="form-group col-md-4 paddleft">
                                                                                                <label> Number of Units2</label>
                                                                                                <input type="text" class="form-control" placeholder="Enter  Number of Units">
                                                                                            </div>
                                                                                            </div>
                                                                                </div>
                                                                                <div class="show-hide" id="Land">
                                                                                    <div class="row">
                                                                                        <div class="form-group col-md-4 paddleft">
                                                                                                <label> Number of Unit3 s</label>
                                                                                                <input type="text" class="form-control" placeholder="Enter  Number of Units">
                                                                                            </div>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="show-hide" id="MulitiFamily">
                                                                                        <div class="row">
                                                                                                <div class="form-group col-md-4 paddleft">
                                                                                                        <label> Number of Units</label>
                                                                                                        <input type="text" class="form-control" placeholder="Enter  Number of Units">
                                                                                                    </div>
                                                                                                    <div class="form-group col-md-4 paddleft">
                                                                                                            <label>  Year(s) Built (reno)</label>
                                                                                                            <input type="text" class="form-control" placeholder="Enter  Year(s) Built (reno)">
                                                                                                        </div>
                                                                                                        <div class="form-group col-md-4 paddleft">
                                                                                                                <label> Occupancy </label>
                                                                                                                <input type="text" class="form-control" placeholder="Enter  Occupancy ">
                                                                                                            </div>
                                                                                                            <div class="form-group col-md-4 paddleft">
                                                                                                                    <label> Utilities </label>
                                                                                                                    <input type="text" class="form-control" placeholder="Enter  Utilities ">
                                                                                                                </div>
                                                                                                                <div class="form-group col-md-4 paddleft">
                                                                                                                        <label>  Roofs </label>
                                                                                                                        <input type="text" class="form-control" placeholder="Enter Roofs ">
                                                                                                                    </div>
                                                                                                                    <div class="form-group col-md-4 paddleft">
                                                                                                                            <label> Total Rentable Sq Ft </label>
                                                                                                                            <input type="text" class="form-control" placeholder="Enter  Total Rentable Sq Ft">
                                                                                                                        </div>
                                                                                                                          <div class="form-group col-md-4 paddleft">
                                                                                                                            <label>  Buildings </label>
                                                                                                                            <input type="text" class="form-control" placeholder="Enter  Total Buildings ">
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-4 paddleft">
                                                                                                                                <label> Exterior</label>
                                                                                                                                <input type="text" class="form-control" placeholder="Enter Exterior ">
                                                                                                                            </div>
    
                                                                                                                            <div class="form-group col-12  mr25">
                                                                                                                                    <label> Amenities </label>
                                                                                                                                           <div class="summernote">
                                                                                                                                             </div>
                                                                                                                                </div>
                                                                                                                                <div class="form-group col-12  mr25">
                                                                                                                                        <label> Interier Upgrades </label>
                                                                                                                                               <div class="summernote">
                                                                                                                                                 </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="form-group col-12  mr25">
                                                                                                                                            <label>Tenent Rentention </label>
                                                                                                                                                   <div class="summernote">
                                                                                                                                                     </div>
                                                                                                                                        </div>
                                                                                                                                        <div class="form-group col-12  mr25">
                                                                                                                                                <label> New Revenue Streams</label>
                                                                                                                                                       <div class="summernote">
                                                                                                                                                         </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="form-group col-12  mr25">
                                                                                                                                                    <label> Reduce cost</label>
                                                                                                                                                           <div class="summernote">
                                                                                                                                                             </div>
                                                                                                                                                </div>
                                                                                                      </div>
                                                                                </div>
                                                                              </div>
                                                                    </div>
                                                                </div>
                                                              
                                                                <div class="row">
                                                                        <div class="form-group col-md-4 paddleft">
                                                                                <label> Type /Total Units </label>
                                                                                <input type="text" class="form-control" placeholder="Enter Type/ Total Units">
                                                                            </div>
                                                                            <div class="form-group col-md-4 paddleft">
                                                                                    <label>Total Return </label>
                                                                                    <input type="text" class="form-control" placeholder="Enter Total Return">
                                                                                </div>
                                                                                <div class="form-group col-md-4 paddleft">
                                                                                        <label>Anuual Return </label>
                                                                                        <input type="text" class="form-control" placeholder="Enter Anuual Return">
                                                                                    </div>
                                                                                    <div class="form-group col-md-4 paddleft">
                                                                                            <label>IRR </label>
                                                                                            <input type="text" class="form-control" placeholder="Enter IRR">
                                                                                        </div>
                                                                                        <div class="form-group col-md-4 paddleft">
                                                                                                <label>YoY Cash Return </label>
                                                                                                <input type="text" class="form-control" placeholder="Enter YoY Cash Return">
                                                                                            </div>
                                                                                            <div class="form-group col-md-4 paddleft">
                                                                                                    <label>Holding Period </label>
                                                                                                    <input type="text" class="form-control" placeholder="Enter Holding Period">
                                                                                                </div>
                                                                                                <div class="form-group col-md-4 paddleft">
                                                                                                        <label>Interest Rate</label>
                                                                                                        <input type="text" class="form-control" placeholder="Enter Interest Rate">
                                                                                                    </div>
                                                                                                    <div class="form-group col-md-4 paddleft">
                                                                                                            <label>Loan Amount</label>
                                                                                                            <input type="text" class="form-control" placeholder="Enter Loan Amount">
                                                                                                        </div>
                                                                                                        <div class="form-group col-md-4 paddleft">
                                                                                                                <label>Loan To Value </label>
                                                                                                                <input type="text" class="form-control" placeholder="Enter Loan To Value ">
                                                                                                            </div>
                                                                                                            <div class="form-group col-md-4 paddleft">
                                                                                                                    <label>YIELD </label>
                                                                                                                    <input type="text" class="form-control" placeholder="Enter YIELD ">
                                                                                                                </div>
                                                                                                                <div class="form-group col-12 mr25 paddleft">
                                                                                                                        <label>Highlights </label>
                                                                                                                               <div class="summernote">
                                                                                                                                 </div>
                                                                                                                    </div>

                                                                                                                    <div class="form-group col-12 paddleft mr25">
                                                                                                                            <label>Location</label>
                                                                                                                                   <div class="summernote">
                                                                                                                                     </div>
                                                                                                                        </div>

                                                                                                                        <div class="form-group col-12 paddleft mr25">
                                                                                                                                <label>Discription</label>
                                                                                                                                       <div class="summernote">
                                                                                                                                         </div>
                                                                                                                            </div>


                                                                                                                    <div class="form-group col-md-4 ">
                                                                                                                            <label>Select Multiple Documents: </label> 
                                                                                                                            <label for="files"></label>
                                                                                                                            <input type="file" id="files"form-control-file  name="files" multiple >
                                                                                                                            <div id="filenames"></div>
                                                                                                                        </div>
                
                                                                                                                        <div class="form-group col-md-4">
                                                                                                                                <label>Select Multiple Images: </label> 
                                                                                                                                <label for="files"></label>
                                                                                                                                <input type="file" id="files2" form-control-file name="files" multiple>
                                                                                                                                <div id="filenames2"></div>
                                                                                                                            </div>
                                                                                                                        <div class="form-group col-md-4">
                                                                                                                                <label>Select video </label>
                                                                                                                                <label for="files"></label>
                                                                                                                                <input type="file" id="files3" form-control-file name="files" multiple>
                                                                                                                                <div id="filenames3"></div>
                                                                                                                            </div>

                                                                    </div>
                                                              
                                                                    <button type="submit" class="btn mb-1 btn-rounded btn-outline-primary">ADD PROPERTY</button>
                                                     
                                                              </form>


                                                 </div>
                                          </div>  
                                </div>


                        </div>

                </div>
            
 

<script>
        $(function() {
$('#files').change(function(){
for(var i = 0 ; i < this.files.length ; i++){
var fileName = this.files[i].name;
$('#filenames').append('<div class="name">' + fileName + '</div>');
}
});
});
$(function() {
$('#files2').change(function(){
for(var i = 0 ; i < this.files.length ; i++){
var fileName = this.files[i].name;
$('#filenames2').append('<div class="name">' + fileName + '</div>');
}
});
});
$(function() {
$('#files3').change(function(){
for(var i = 0 ; i < this.files.length ; i++){
var fileName = this.files[i].name;
$('#filenames3').append('<div class="name">' + fileName + '</div>');
}
});
});
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
