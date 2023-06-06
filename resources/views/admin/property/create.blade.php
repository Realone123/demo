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
                        <h4 class="text-themecolor">Add Properties </h4>
                    </div>
                    <div class="col-md-7 align-self-ctext-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.property.index') }}">Properties</a></li>
                                <li class="breadcrumb-item active">Add Properties</li>
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
                                    
                                        
                                    <form action="{{ route('admin.property.store') }}" method="POST" enctype="multipart/form-data" id="hockey">
                                        @csrf
                                        
                                        @foreach ($errors->all() as $error)
                                             <p class="text-danger"><small>{{ $error }}</small></p>
                                               @endforeach
                                                        <div class="row m-t-10 p-10">
                                                            <div class="col-md-6">
                                                                       <div class="form-group mb0">
                                               
                                                                           <input type="text" name="title" id="title" value=""  class="form-control"  placeholder="Title">
                                                                                                            
                                                                    </div>
                                                                   </div>
                                                                 
                                                              <div class="col-lg-6">
                                                                    <div class="form-group mb0">
                                     <select name="property_type" id="property_type" class="select2 form-control" onchange="showHide(this)" >
                                        <option value="">{{ $websiteLang->where('lang_key','select_property_type')->first()->custom_text }}</option>
                                       
                                        @foreach ($propertyTypes as $item)
                                        <option {{ old('property_type')==$item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->type }}</option>
                                        @endforeach
                                       
                                    </select>
                                   
                                                                        </div>
                                                                  
                                                                </div>
                                                                
                                                                
                                                                  


                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                  <!--  <div class="dropdown-options padd0">-->
                                                                            <div class="show-hide" id="1" style="display :none;">
                                                                                    <div class="row p-10">
                                                                                            <div class="col-md-6">
                                                                                                    <div class="form-group">
                                                                                                            <input type="text" name="occupancy" id="occupancy" value="{{ old('occupancy') }}" class="form-control"  placeholder="Occupancy">
                                                                                                                   
                                                                                                            <!-- <label for="tb-fname"></label> Occupancy</label>-->
                                                                                                    </div>
                                                                                                 </div>
      
                                                                                                
                                                                                                    <div class="col-md-6">
                                                                                                            <div class="form-group mb0">
                                                                                                                    <input type="text" name="equity" value="{{ old('equity') }}" class="form-control"  placeholder="Equity">
                                                                                                                   <!-- <label for="tb-fname"></label> --></label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        
                                                                                                </div>  
                                                                               
                                                                            </div>
                                                                            <div class="show-hide" id="2" style="display :none;">
                                                                                    <div class="row p-10">
                                                                                           
                                                                                                        <div class="col-md-6">
                                                                                                                <div class="form-group mb0">
                                                                                                                        <input type="text" name="investment_period" class="form-control" id="" placeholder="Investment Period">
                                                                                                                       <!-- <label for="tb-fname"></label> --></label>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                </div> 
                                                                            </div>
                                                                            <div class="show-hide" id="3" style="display :none;">
                                                                                    <div class="row p-10">
                                                                                           
                                                                                           
                                                                                                </div>  
                                                                            </div>
                                                                            <div class="show-hide" id="4" style="display :none;">
                                                                                        <div class="row p-10">
                                                                                                <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                                <input type="text" class="form-control" name="no_of_units" value="{{ old('no_of_units') }}" placeholder="Number of Units">
                                                                                                               <!-- <label for="tb-fname"></label> --> </label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-6">
                                                                                                            <div class="form-group">
                                                                                                                   <input type="text" name="years_built" value="{{ old('years_built') }}" class="form-control"  placeholder="Year(s) Built (reno)">
                                                                                                                  <!-- <label for="tb-fname"></label> --> </label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-6">
                                                                                                                <div class="form-group">
                                                                                                                       <input type="text" name="occupancy" value="{{ old('occupancy') }}" class="form-control"  placeholder="Occupancy">
                                                                                                               <!-- <label for="tb-fname"></label> -->  </label>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-6">
                                                                                                                <div class="form-group">
                                                                                                                       <input type="text" name="utilities" value="{{ old('utilities') }}" class="form-control"  placeholder="Utilities">
                                     
                                                                                                                       <!-- <label for="tb-fname"></label> -->  </label>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-6">
                                                                                                                <div class="form-group">
                                                                                                                       <input type="text" name="roofs" value="{{ old('roofs') }}" class="form-control"  placeholder="Roofs">
                                                                                                                       <!-- <label for="tb-fname"></label> -->   </label>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-6">
                                                                                                                <div class="form-group">
                                                                                                                        <input type="text" name="total_rentable" value="{{ old('total_rentable') }}" class="form-control"  placeholder="Total Rentable Sq Ft">
                                                                                                                       <!-- <label for="tb-fname"></label> -->   </label>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-6">
                                                                                                                <div class="form-group">
                                                                                                                         <input type="text" name="buildings" value="{{ old('buildings') }}" class="form-control"  placeholder="Buildings">
                                                                                                                       <!-- <label for="tb-fname"></label> -->   </label>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-6">
                                                                                                                <div class="form-group">
                                                                                                                        <input type="text" name="exterior" value="{{ old('exterior') }}" class="form-control"  placeholder="Exterior">
                                                                                                                       <!-- <label for="tb-fname"></label> -->   </label>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-6">
                                                                                                                <div class="form-group">
                                                                                                                       <input type="text" name="interier_upgrades" value="{{ old('interier_upgrades') }}" class="form-control"  placeholder="Interier Upgrades">
                                      
                                                                                                                       <!-- <label for="tb-fname"></label> -->  </label>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-6">
                                                                                                                <div class="form-group">
                                                                                                                      <input type="text" name="tenent_rentention" value="{{ old('tenent_rentention') }}" class="form-control"  placeholder="Tenent Rentention">
                                     
                                                                                                                       <!-- <label for="tb-fname"></label> --> </label>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-6">
                                                                                                                <div class="form-group mb0">
                                                                                                                       <input type="text" name="new_revenue_streams" value="{{ old('new_revenue_streams') }}" class="form-control"  placeholder="New Revenue Streams">
                                      
                                                                                                                      <!-- <label for="tb-fname"></label> --> </label>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-6">
                                                                                                                <div class="form-group mb0">
                                                                                                                      <input type="text" name="reduce_cost" value="{{ old('reduce_cost') }}" class="form-control"  placeholder="Reduce cost">
                                                                                                                       <!-- <label for="tb-fname"></label> --> </label>
                                                                                                                </div>
                                                                                                        </div>
                                                 
                                                                                                  </div>
                                                                            </div>
                                                                      <!--    </div>-->
                                                                </div>
                                                            </div>
                                                          
                                                            <div class="row p-10">
                                                                   <div class="col-md-6">
                                                                 <div class="form-group">
                                                                                  
                                    <select name="city" id="city" class="form-control select2">
                                        <option value="">{{ $websiteLang->where('lang_key','select_city')->first()->custom_text }}</option>
                                        @foreach ($cities as $item)
                                        <option {{ old('city')==$item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name.', '.$item->countryState->name}}</option>
                                        @endforeach
                                    </select>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                  <div class="col-md-6">
                                                                        <div class="form-group">
                                                                                <input type="text" name="address" value="{{ old('address') }}" class="form-control" placeholder="Address">
                                                                               <!-- <label for="tb-fname"></label>  </label>-->
                                                                        </div>
                                                                     </div>            
                                                                   <div class="col-md-6">
                                                                        <div class="form-group">
                                                                                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" id="" placeholder="Phone">
                                                                               <!-- <label for="tb-fname"></label>  </label>-->
                                                                        </div>
                                                                     </div>
                                                                  <div class="col-md-6">
                                                                        <div class="form-group">
                                                                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="" placeholder="Email">
                                                                               <!-- <label for="tb-fname"></label> Email *</label>-->
                                                                        </div>
                                                                      </div>

                                                                    <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                    <input type="text" name="price" class="form-control" value="{{ old('price') }}" placeholder="Price">
                                                                                   <!-- <label for="tb-fname"></label>  *</label>-->
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                                    <input type="text" name="no_of_shares" value="{{ old('no_of_shares') }}" class="form-control"  placeholder="Number of Shares">
                                                                                                                   <!-- <label for="tb-fname"></label> </label>-->
                                                                                                        </div>
                                                                                                     </div>
                                                                                                     
                                                                        <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                        <input type="text" name="area" value="{{ old('area') }}" class="form-control" id="" placeholder=" Total Area(Square Feet)">
                                                                                       <!-- <label for="tb-fname"></label></label>-->
                                                                                </div>
                                                                          </div>
                                                                         <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                        <input type="text"  name="total_return" value="{{ old('total_return') }}" class="form-control" id="" placeholder="Total Return">
                                                                                       <!-- <label for="tb-fname"></label> </label>-->
                                                                                </div>
                                                                         </div>
                                                                         <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                        <input type="text" name="holding_period" value="{{ old('holding_period') }}" class="form-control" id="" placeholder="Project Duration">
                                                                                       <!-- <label for="tb-fname"></label> </label>-->
                                                                                </div>
                                                                           </div>
                                                                         <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                        <input type="text"  name="unit" value="{{ old('unit') }}"  class="form-control" id="" placeholder="Total Unit">
                                                                                       <!-- <label for="tb-fname"></label> </label>-->
                                                                                </div>
                                                                         </div>

                                                                         <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                        <input type="text" name="offering_size" value="{{ old('offering_size') }}"  class="form-control" id="" placeholder="Offering Size">
                                                                                       <!-- <label for="tb-fname"></label> </label>-->
                                                                                </div>
                                                                         </div>
                                                                         <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                        <input type="text" name="min_investment" value="{{ old('min_investment') }}" class="form-control" id="" placeholder="Minimum Investment">
                                                                                       <!-- <label for="tb-fname"></label>  </label>-->
                                                                                    </div>
                                                                          </div>
                                                                         <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                        <input type="capital_raising" name="capital_raising" value="{{ old('term') }}" class="form-control" id="" placeholder="Capital Raising">
                                                                                       <!-- <label for="tb-fname"></label>  </label>-->
                                                                                    </div>
                                                                              
                                                                         </div>
                                                                          <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                        <input type="cost_pershare" name="cost_pershare" value="{{ old('cost_pershare') }}" class="form-control" id="" placeholder="Cost Per share">
                                                                                       <!-- <label for="tb-fname"></label>  </label>-->
                                                                                    </div>
                                                                              
                                                                         </div>
                                                                           <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                        <input type="text" name="expected_return" value="{{ old('expected_return') }}" class="form-control" id="" placeholder="Expected Returns">
                                                                                       <!-- <label for="tb-fname"></label>  </label>-->
                                                                                    </div>
                                                                              
                                                                         </div>
                                                                           <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                        <input type="text" name="target_irr" value="{{ old('target_irr') }}" class="form-control" id="" placeholder="Target  IRR">
                                                                                       <!-- <label for="tb-fname"></label>  </label>-->
                                                                                    </div>
                                                                                  
                                                                           </div>
                                                                           <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                        <input type="text" name="target_arr" value="{{ old('target_arr') }}"  class="form-control" id="" placeholder="Target ARR">
                                                                                       <!-- <label for="tb-fname"></label>  </label>-->
                                                                                    </div>
                                                                             
                                                                           </div>
                                                                           <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                        <input type="text" name="yield" value="{{ old('yield') }}" class="form-control" id="" placeholder="Yield">
                                                                                       <!-- <label for="tb-fname"></label> </label>-->
                                                                                    </div>
                                                                            </div>
                                                                          

                                                                           <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                        <select name="status" id="status" class="form-control select2">
                                                                                                <option  value="" >Select Status *</option>
                                                                                           
                                                                                                     <option value="Open">Open</option>
                                                                                                     <option value="Fully Funded">Fully Funded</option>
                                                                                                    <option value="Closed">Closed</option>
                                                                                              
                                                                                         </select>
                                                                                    </div>
                                                                               </div>

                                                                              

                                                                                           <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                    <input type="text" name="receiving_bank" id="receiving_bank" class="form-control" id="" placeholder="Receiving Bank">
                                                                                                   <!-- <label for="tb-fname"></label>  </label>-->
                                                                                                </div>
                                                                                             </div>
                                                                                            <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                    <input type="text" name="bank_address" id="bank_address" class="form-control" id="" placeholder="Bank Address">
                                                                                                   <!-- <label for="tb-fname"></label> </label>-->
                                                                                                </div>
                                                                                             </div>
                                                                                            
                                                                                                 <div class="col-md-6">
                                                                                                    <div class="form-group">
                                                                                                            <input type="text" name="wire_transfer" id="wire_transfer" class="form-control" id="" placeholder="Wire Transfer Routing Number">
                                                                                                           <!-- <label for="tb-fname"></label>   </label>-->
                                                                                                        </div>
                                                                                                     </div>

                                                                                                     <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                                <input type="text"  name="ach_bank_number" id="ach_bank_number" class="form-control" id="" placeholder="ACH Routing Number">
                                                                                                               <!-- <label for="tb-fname"></label> </label>-->
                                                                                                            </div>
                                                                                                         </div>
                                                                                                
                                                                                                         <div class="col-md-6">
                                                                                                            <div class="form-group">
                                                                                                                    <input type="text" name="account_number" id="account_number"  class="form-control" id="" placeholder="Account Number">
                                                                                                                   <!-- <label for="tb-fname"></label>   </label>-->
                                                                                                                </div>
                                                                                                             </div>

                                                                                                             <div class="col-md-6">
                                                                                                                <div class="form-group">
                                                                                                                        <input type="text" name="account_type" id="account_type" class="form-control" id="" placeholder="Account Type">
                                                                                                                       <!-- <label for="tb-fname"></label> Account Type </label>-->
                                                                                                                    </div>
                                                                                                                 </div>
                                                                                                                 <div class="col-md-6">
                                                                                                                    <div class="form-group">
                                                                                                                            <input type="text" name="account_name" id="account_name" class="form-control"  placeholder=" Beneficiary Account Name">
                                                                                                                           <!-- <label for="tb-fname"></label> Beneficiary Account Name</label> -->
                                                                                                                        </div>
                                                                                                                     </div>
                                                                                                                
                                                                                                           

                                                                                                 <div class="col-md-12">
                                                                                                    <div class="form-group">
                                                                                                            <label class="form-label">Bank Address</label>
                                                                                                            <textarea class="form-control" rows="5" name="beneficiary_address" id="beneficiary_address"></textarea>
                                                                                                        </div>
                                                                                                  </div>
                                                                                                 
                                                                                            


                                                                           <div class="col-md-12">
                                                                                <div class="form-group ">
                                                                                        <label class="m-b-10">Over view </label>
                                                                                        <textarea id="textarea_editor" name="financial_hightlights" class=" form-control" rows="15" placeholder="text ..."></textarea>
                                                                                                </div>
                                                                             </div>
                                                                             
                                                                           <div class="col-md-12">
                                                                                <div class="form-group ">
                                                                                        <label class="m-b-10">Business Plan </label>
                                                                                        <textarea id="textarea_editor-key" name="key_hightlights" class=" form-control" rows="15" placeholder="text ..."></textarea>
                                                                                                </div>
                                                                             </div>     
                                                                             
                                                                             
                                                                                 <div class="col-md-12">
                                                                                        <div class="form-group ">
                                                                                                <label class="m-b-10">Entity Structure</label>
                                                                                                <textarea rows="15" name="description" id="textarea_editor-2" placeholder="text ..." class=" form-control" ></textarea>
                                                                                                   
                                                                                            </div>
                                                                                     </div>
                                                                                     <div class="col-md-12">
                                                                                    <div class="form-group ">
                                                                                            <label class="m-b-10">Location</label>
                                                                                            <textarea  name="location"  rows="15" placeholder="text ..." class=" form-control" ></textarea>
                                                                                       </div>
                                                                                 </div>
                                                                                      <div class="col-md-12 m-t-10">
                                                                                              <label class="m-b-10">Property Image: </label> 
                                                                                                    <div  class="dropzone"> 
                                                                                                        <div class="fallback">
                                                                                                                <input name="thumbnail_image" type="file" />
                                                                                                            </div>
                                                                                                        </div>
                                                                                       </div>
                                                                                        <div class="col-md-12 m-t-10" >
                                                                                            <label class="m-b-10">Multiple Images: </label> 
                                                                                                  <div  class="dropzone"> 
                                                                                                      <div class="fallback">
                                                                                                              <input name="slider_images[]" type="file" multiple />
                                                                                                          </div>
                                                                                                      </div>
                                                                                       </div>
                                                                                     <div class="col-md-12 m-t-10">
                                                                                              <label class="m-b-10">Subscriptions Documents: </label> 
                                                                                                    <div  class="dropzone"> 
                                                                                                        <div class="fallback">
                                                                                                                <input name="subscription_documents[]" type="file" multiple />
                                                                                                            </div>
                                                                                                        </div>
                                                                                       </div>
                                                                                      <div class="col-md-12 m-t-10" >
                                                                                            <label class="m-b-10">Offering Documents: </label> 
                                                                                                  <div  class="dropzone"> 
                                                                                                      <div class="fallback">
                                                                                                              <input name="offering_documents[]" type="file" multiple />
                                                                                                          </div>
                                                                                                      </div>
                                                                                       </div>
                                                                                       
                                                                                        <div class="col-md-12 m-t-10" >
                                                                                            <label class="m-b-10">Fund Transfer Documents: </label> 
                                                                                                  <div  class="dropzone"> 
                                                                                                      <div class="fallback">
                                                                                                              <input name="fund_documents[]" type="file" multiple />
                                                                                                          </div>
                                                                                                      </div>
                                                                                       </div>
                                                                                      
                                                                                       
                                                                                       
                                 <div class="row " style="margin:20px 0px;">
                            <div class="col-8" id="nearest-place-box">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Important Dates</label>
                                           
                                   
                                     <input type="text" name="nearest_locations[]" class="form-control">  
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <label for="">Date</label>
                                    
                                       <input type="date" class="form-control" name="distances[]"  id="date" >
                                                      
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button id="addNearestPlaceRow" type="button"  style="margin:29px 0px;" class="btn btn-success btn-sm nearest-row-btn"><i class="fas fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>
                            
                                  <div id="hidden-location-box" class="d-none">
                    <div class="delete-dynamic-location">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                   
                                   
                                     <input type="text" name="nearest_locations[]" class="form-control">    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    
                                    <input type="date" class="form-control" name="distances[]">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="button" style="margin:5px 0px; ! important" class="btn btn-danger btn-sm nearest-row-btn removeNearestPlaceRow"><i class="fas fa-trash" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>


                </div>
                        </div>
                        
                        
                                                                                       <div class="col-md-2 m-t-20">
                                                                                            <div class="d-flex no-block align-items-center">
                                                                                                   
                                                                                                    <button class="btn btn-rounded btn-outline-primary w-100 waves-effect waves-light" style="margin:auto !important">Save</button>
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
 
<style>
    
#1, #2, #3, #4 {
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

    <script>
        (function($) {
        "use strict";
        $(document).ready(function () {
            $("#title").on("focusout",function(e){
                $("#slug").val(convertToSlug($(this).val()));
            })

            $("#purpose").on("change",function(){
                var purposeId=$(this).val()
                if(purposeId==2){
                    $("#period_box").removeClass('d-none');
                }else if(purposeId==1){
                    $("#period_box").addClass('d-none');
                }
            })


            //start dynamic nearest place add and remove

            $("#addNearestPlaceRow").on("click",function(){
              
                var new_row=$("#hidden-location-box").html();
                $("#nearest-place-box").append(new_row)

            })
            $(document).on('click', '.removeNearestPlaceRow', function () {
                $(this).closest('.delete-dynamic-location').remove();
            });
            //end dynamic nearest place add and remove



        });

        })(jQuery);

        function convertToSlug(Text)
            {
                return Text
                    .toLowerCase()
                    .replace(/[^\w ]+/g,'')
                    .replace(/ +/g,'-');
            }
    </script>
    <style>
        label {
    position: relative;
    
    width: 100%;
}


}

input[type="text"]:focus, input[type="text"]:active {
    z-index: 2;
}

label input[type="text"] {
    position: relative;
}

.title {
    color: gray;
    position: absolute;
    left: 5px;
    top: 1px;
    z-index: 1;
}

.symbol {
    color: red;
}
      
 .mb0{
   margin-bottom:0px ! important
      }
      
    </style>
 
 @endsection
