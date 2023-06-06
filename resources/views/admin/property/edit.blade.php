@extends('layouts.admin.layout')
@section('title')
<title>{{ $websiteLang->where('lang_key','property')->first()->custom_text }}</title>
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
                        <h4 class="text-themecolor">All Properties</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Edit Properties</li>
                            </ol>
                            <a href="{{ route('admin.property.create') }}" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle  padd5"></i>Add </a>
                        
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
                                <div class="col-md-12">
                                       <form action="{{ route('admin.property.update',$property->id) }}" method="POST" enctype="multipart/form-data" id="hockey">
                                        @csrf
                                        @method('patch') 
                                                      <div class="row p-10">
                                                                   <div class="col-md-6">
                                                                            <div class="form-group mb0">
                                                                             
                                                                            <input type="text"  name="title"  id="title" class="form-control"  value="{{ $property->title }}" placeholder="Enter Property Name">
                                                                           
                                                                    </div>
                                                                   </div>
                                                                 
                                                            <div class="col-lg-6">
                                                                    <div class="form-group mb0">
                                         <select name="property_type" id="property_type"  class="form-control select2" onchange="showHide(this)">
                                                                                  <option hidden Required>Select Investment Type</option>                              
                                      
                                        @foreach ($propertyTypes as $item)
                                        <option {{ $property->property_type_id==$item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->type }}</option>
                                        @endforeach
                                     </select>
                                                                        </div>
                                                                  
                                                                </div>


                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                  <!--  <div class="dropdown-options padd0">-->
                                                                            <div class="show-hide" id="1" @if($property->property_type_id == 1) style="display :block;" @else style="display :none;" @endif>
                                                                                    <div class="row p-10">
                                                                                            <div class="col-md-6">
                                                                                                    <div class="form-group">
                                                                                                            <input type="text" name="occupancy" id="occupancy" value="{{ $property->occupancy }}" class="form-control"  placeholder="Enter Occupancy">
                                                                                                                   
                                                                                                             
                                                                                                    </div>
                                                                                                 </div>
      
                                                                                               
                                                                                                     
                                                                                                    <div class="col-md-6">
                                                                                                            <div class="form-group mb0">
                                                                                                                    <input type="text" name="equity" value="{{ $property->equity }}" class="form-control"  placeholder="Enter Equity">
                                                                                                                    
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        
                                                                                                </div>  
                                                                               
                                                                            </div>
                                                                            <div class="show-hide" id="2" @if($property->property_type_id == 2) style="display :block;" @else style="display :none;" @endif>
                                                                                     <div class="row p-10">
                                                                                           
                                                                                                        <div class="col-md-6">
                                                                                                                <div class="form-group mb0">
                                                                                                                        <input type="text" name="investment_period" value="{{ $property->investment_period }}" class="form-control"  placeholder="Enter Investment Period">
                                      
                                                                                                                        
                                                                                                                </div>
                                                                                                            </div>
                                                                                                </div> 
                                                                            </div>
                                                                            <div class="show-hide" id="3" @if($property->property_type_id == 3) style="display :block;" @else style="display :none;" @endif>
                                                                               <div class="row p-10">
                                                                                            
                                                                                                </div>        
                                                                            </div>
                                                                            <div class="show-hide" id="4" @if($property->property_type_id == 4) style="display :block;" @else style="display :none;" @endif>
                                                                                        <div class="row p-10">
                                                                                                <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                                <input type="text" class="form-control" name="no_of_units" value="{{ $property->no_of_unit }}" placeholder="Enter Number of Units">
                                                                                                                
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-6">
                                                                                                            <div class="form-group">
                                                                                                                   <input type="text" name="years_built" value="{{ $property->years_built }}" class="form-control"  placeholder="Enter Year(s) Built (reno)">
                                                                                                                   
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        
                                                                                                        <div class="col-md-6">
                                                                                                                <div class="form-group">
                                                                                                                       <input type="text" name="utilities" value="{{ $property->utilities }}" class="form-control"  placeholder="Enter Utilities">
                                     
                                                                                                                        
                                                                                                                </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-6">
                                                                                                                <div class="form-group">
                                                                                                                       <input type="text" name="roofs" value="{{ $property->roofs }}" class="form-control"  placeholder="Enter Roofs">
                                                                                                                        
                                                                                                                </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-6">
                                                                                                                <div class="form-group">
                                                                                                                        <input type="text" name="total_rentable" value="{{ $property->total_rentable }}" class="form-control"  placeholder="Enter Total Rentable Sq Ft">
                                                                                                                        
                                                                                                                </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-6">
                                                                                                                <div class="form-group">
                                                                                                                         <input type="text" name="buildings" value="{{ $property->buildings }}" class="form-control"  placeholder="Enter Buildings">
                                                                                                                        
                                                                                                                </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-6">
                                                                                                                <div class="form-group">
                                                                                                                        <input type="text" name="exterior" value="{{ $property->exterior }}" class="form-control"  placeholder="Enter Exterior">
                                                                                                                        
                                                                                                                </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-6">
                                                                                                                <div class="form-group">
                                                                                                                       <input type="text" name="interier_upgrades" value="{{ $property->interier_upgrades }}" class="form-control"  placeholder="Enter Interier Upgrades">
                                      
                                                                                                                        
                                                                                                                </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-6">
                                                                                                                <div class="form-group">
                                                                                                                      <input type="text" name="tenent_rentention" value="{{ $property->tenent_rentention }}" class="form-control"  placeholder="Enter Tenent Rentention">
                                     
                                                                                                                        
                                                                                                                </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-6">
                                                                                                                <div class="form-group mb0">
                                                                                                                       <input type="text" name="new_revenue_streams" value="{{ $property->new_revenue_streams }}" class="form-control"  placeholder="Enter New Revenue Streams">
                                      
                                                                                                                       
                                                                                                                </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-6">
                                                                                                                <div class="form-group mb0">
                                                                                                                      <input type="text" name="reduce_cost" value="{{ $property->reduce_cost }}" class="form-control"  placeholder="Enter Reduce cost">
                                                                                                                        
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
                                        <!--<option value="">{{ $websiteLang->where('lang_key','select_city')->first()->custom_text }}</option>-->
                                        @foreach ($cities as $item)
                                        <option {{ $property->city_id==$item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name.', '.$item->countryState->name.', '.$item->countryState->country->name }}</option>
                                        @endforeach
                                    </select>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                  <div class="col-md-6">
                                                                        <div class="form-group">
                                                                                <input type="text" name="address" value="{{ $property->address }}" class="form-control" placeholder="Enter Address">
                                                                                
                                                                        </div>
                                                                     </div>            
                                                                   <div class="col-md-6">
                                                                        <div class="form-group">
                                                                                <input type="text" name="phone" value="{{ $property->phone }}" class="form-control" id="" placeholder="Enter Phone">
                                                                                
                                                                        </div>
                                                                     </div>
                                                                  <div class="col-md-6">
                                                                        <div class="form-group">
                                                                                <input type="email" name="email" value="{{ $property->email }}" class="form-control" id="" placeholder="Enter Email">
                                                                                
                                                                        </div>
                                                                      </div>

                                                                    <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                    <input type="text" name="price" class="form-control" value="{{ $property->price }}" placeholder="Enter Price">
                                                                                    
                                                                            </div>
                                                                        </div>
                                                                         <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                                    <input type="text" name="no_of_shares" value="{{ $property->no_of_shares }}" class="form-control"  placeholder="Enter Number of Shares">
                                                                                                                    
                                                                                                        </div>
                                                                                                        </div>
                                                                        <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                        <input type="text" name="area" value="{{ $property->area }}" class="form-control" id="" placeholder="Enter Total Area(Square Feet)">
                                                                                        
                                                                                </div>
                                                                          </div>
                                                                         <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                        <input type="text"  name="total_return" value="{{ $property->total_return }}" class="form-control" id="" placeholder="Enter Total Return">
                                                                                        
                                                                                </div>
                                                                         </div>
                                                                         <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                        <input type="text" name="holding_period" value="{{ $property->holding_period }}" class="form-control" id="" placeholder="Enter Project Duration">
                                                                                        
                                                                                </div>
                                                                           </div>
                                                                         <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                        <input type="text"  name="unit" value="{{ $property->number_of_unit }}"  class="form-control" id="" placeholder="Enter Total Unit">
                                                                                        
                                                                                </div>
                                                                         </div>

                                                                         <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                        <input type="text" name="offering_size" value="{{ $property->offering_size }}"  class="form-control" id="" placeholder="Enter Offering Size">
                                                                                        
                                                                                </div>
                                                                         </div>
                                                                         <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                        <input type="text" name="min_investment" value="{{ $property->min_investment }}" class="form-control" id="" placeholder="Enter Minimum Investment">
                                                                                        
                                                                                    </div>
                                                                          </div>
                                                                         <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                        <input type="text" name="capital_raising" value="{{ $property->capital_raising }}" class="form-control" id="" placeholder="Enter Capital Raising">
                                                                                        
                                                                                    </div>
                                                                              
                                                                         </div>
                                                                                           <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                        <input type="cost_pershare" name="cost_pershare" value="{{ $property->cost_pershare }}" class="form-control" id="" placeholder="Cost Per share">
                                                                                       <!-- <label for="tb-fname"></label>  </label>-->
                                                                                    </div>
                                                                                    </div>
                                                                           <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                        <input type="text" name="expected_return" value="{{ $property->expected_return }}" class="form-control" id="" placeholder="Enter Expected Returns">
                                                                                        
                                                                                    </div>
                                                                              
                                                                         </div>
                                                                           <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                        <input type="text" name="target_irr" value="{{ $property->target_irr }}" class="form-control" id="" placeholder="Enter Target  IRR">
                                                                                        
                                                                                    </div>
                                                                                  
                                                                           </div>
                                                                           <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                        <input type="text" name="target_arr" value="{{ $property->target_arr }}"  class="form-control" id="" placeholder="Enter Target ARR">
                                                                                        
                                                                                    </div>
                                                                             
                                                                           </div>
                                                                           <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                        <input type="text" name="yield" value="{{ $property->yield }}" class="form-control" id="" placeholder="Enter Yield">
                                                                                        
                                                                                    </div>
                                                                            </div>
                                                                          

                                                                           <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                        <select name="status" id="status" class="form-control select2">
                                                                                                <option hidden Required value="Open">Select Status *</option>
                                                                                            <optgroup>
                                                                                                     <option value="Open" {{ $property->status=="Open" ? 'selected' : '' }}>Open</option>
                                                                                                     <option value="Fully Funded" {{ $property->status=="Fully Funded" ? 'selected' : '' }}>Fully Funded</option>
                                                                                                    <option value="Closed" {{ $property->status=="Closed" ? 'selected' : '' }}>Closed</option>
                                                                                              </optgroup>
                                                                                         </select>
                                                                                    </div>
                                                                               </div>

                                                                              

                                                                                           <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                    <input type="text" value="{{ $property->receiving_bank }}" name="receiving_bank" id="receiving_bank" class="form-control" id="" placeholder="Enter Receiving Bank">
                                                                                                    
                                                                                                </div>
                                                                                             </div>
                                                                                            <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                    <input type="text" value="{{ $property->bank_address }}" name="bank_address" id="bank_address" class="form-control" id="" placeholder="Enter Bank Address">
                                                                                                    
                                                                                                </div>
                                                                                             </div>
                                                                                            
                                                                                                 <div class="col-md-6">
                                                                                                    <div class="form-group">
                                                                                                            <input type="text" value="{{ $property->wire_transfer }}" name="wire_transfer" id="wire_transfer" class="form-control" id="" placeholder="Enter Wire Transfer Routing Number">
                                                                                                            <label for="tb-fname">  </label>
                                                                                                        </div>
                                                                                                     </div>

                                                                                                     <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                                <input type="text" value="{{ $property->ach_bank_number }}" name="ach_bank_number" id="ach_bank_number" class="form-control" id="" placeholder="Enter ACH Routing Number">
                                                                                                                
                                                                                                            </div>
                                                                                                         </div>
                                                                                                
                                                                                                         <div class="col-md-6">
                                                                                                            <div class="form-group">
                                                                                                                    <input type="text" value="{{ $property->account_number }}" name="account_number" id="account_number"  class="form-control" id="" placeholder="Enter Account Number">
                                                                                                                    <label for="tb-fname">  </label>
                                                                                                                </div>
                                                                                                             </div>

                                                                                                             <div class="col-md-6">
                                                                                                                <div class="form-group">
                                                                                                                        <input type="text" value="{{ $property->account_type }}" name="account_type" id="account_type" class="form-control" id="" placeholder="Enter Account Type">
                                                                                                                        
                                                                                                                    </div>
                                                                                                                 </div>
                                                                                                                 <div class="col-md-6">
                                                                                                                    <div class="form-group">
                                                                                                                            <input type="text" value="{{ $property->account_name }}" name="account_name" id="account_name" class="form-control"  placeholder="Enter Beneficiary Account Name">
                                                                                                                            
                                                                                                                        </div>
                                                                                                                     </div>
                                                                                                                
                                                                                                           

                                                                                                 <div class="col-md-12">
                                                                                                    <div class="form-group">
                                                                                                            <label class="form-label">Bank Address</label>
                                                                                                            <textarea class="form-control" rows="5" name="beneficiary_address" id="beneficiary_address">{{ $property->beneficiary_address }}</textarea>
                                                                                                        </div>
                                                                                                  </div>
                                                                                                 
                                                                                            


                                                                           <div class="col-md-12">
                                                                                <div class="form-group ">
                                                                                        <label class="m-b-10">Over View </label>
                                                                                        <textarea id="textarea_editor" name="financial_hightlights" class=" form-control" rows="15" placeholder="Enter text ...">{{ $property->financial_hightlights }}</textarea>
                                                                                                </div>
                                                                             </div>
                                                                             
                                                                           <div class="col-md-12">
                                                                                <div class="form-group ">
                                                                                        <label class="m-b-10">Business Plan </label>
                                                                                        <textarea id="textarea_editor-key" name="key_hightlights" class=" form-control" rows="15" placeholder="Enter text ...">{{ $property->key_hightlights }}</textarea>
                                                                                                </div>
                                                                             </div>     
                                                                             
                                                                            
                                                                                 <div class="col-md-12">
                                                                                        <div class="form-group ">
                                                                                                <label class="m-b-10">Entity Structure</label>
                                                                                                <textarea rows="15" name="description" id="textarea_editor-2" placeholder="Enter text ..." class=" form-control" >{{ $property->description }}</textarea>
                                                                                                   
                                                                                            </div>
                                                                                     </div>
                                                                         
                                                                                 <div class="col-md-12">
                                                                                    <div class="form-group ">
                                                                                            <label class="m-b-10">Location</label>
                                                                                            <textarea  name="location"  rows="15" placeholder="Enter text ..." class=" form-control" >{{ $property->google_map_embed_code }}</textarea>
                                                                                       </div>
                                                                                 </div>
                                                                                     
                                                                                      <div class="col-md-12 m-t-10">
                                                                                              <label class="m-b-10">Property Image: </label> 
                                                                                                    <div  class="dropzone"> 
                                                                                                        <div class="fallback">
                                                                                                             <img style="margin:10px 0px;" class="property-slider-img" src="{{ asset($property->thumbnail_image) }}" alt="" height="150" width="250"> <br>
                                                                                                                <input name="thumbnail_image" type="file" />
                                                                                                            </div>
                                                                                                        </div>
                                                                                       </div>
                                                                                        <div class="col-md-12 m-t-10" >
                                                                                            <label class="m-b-10">Select Multiple Images: </label> 
                                                                                                  <div  class="dropzone"> 
                                                                                                      <div class="fallback">
                                                                                                          <table class="table table-bordered">
                                                                                                                        @foreach ($property->propertyImages as $item)
                                    <tr class="slider-tr-{{ $item->id }}">
                                        <td> <img class="property-slider-img" src="{{ asset($item->image) }}"  alt="" height="150" width="250"> <a onclick="deleteSliderImg('{{ $item->id }}')" href="javascript:;" class="btn btn-danger btn-sm"><i class="fas fa-trash    "></i></a></td>
                                    </tr>
                                    @endforeach
                                    </table>
                                                                                                              <input name="slider_images[]" type="file" multiple />
                                                                                                          </div>
                                                                                                      </div>
                                                                                       </div>
                                                                                     <div class="col-md-12 m-t-10">
                                                                                              <label class="m-b-10">Select Subscriptions Documents: </label> 
                                                                                                    <div  class="dropzone"> 
                                                                                                        <div class="fallback">
                                                                                                             <table class="table table-bordered">
                                                                                                                        @foreach($SubscriptionsDoc as $item)
                                    <tr class="pdf-file-col-{{ $item->id }}">
                                        <td>
                                            <span>{{$item->document}}</span> </td><td>
                                         <a onclick="deletePdfFile('{{ $item->id }}')" href="javascript:;" class="btn btn-danger btn-sm"><i class="fas fa-trash    "></i></a></td>
                                    </tr>
                                    @endforeach
                                    </table>
                                                                                                                <input name="subscription_documents[]" type="file" multiple />
                                                                                                            </div>
                                                                                                        </div>
                                                                                       </div>
                                                                                      <div class="col-md-12 m-t-10" >
                                                                                            <label class="m-b-10">Select Offering Documents: </label> 
                                                                                                  <div  class="dropzone"> 
                                                                                                      <div class="fallback">
                                                                                                          <table class="table table-bordered">
                                                                                                                        @foreach($OfferingDoc as $item)
                                    <tr class="pdf-file-col-{{ $item->id }}">
                                        <td>
                                            <span>{{$item->document}}</span> </td><td>
                                         <a onclick="deletePdfFile('{{ $item->id }}')" href="javascript:;" class="btn btn-danger btn-sm"><i class="fas fa-trash    "></i></a></td>
                                    </tr>
                                    @endforeach
                                    </table>
                                                                                                              <input name="offering_documents[]" type="file" multiple />
                                                                                                          </div>
                                                                                                      </div>
                                                                                       </div>
                                                                                       
                                                                                           <div class="col-md-12 m-t-10" >
                                                                                            <label class="m-b-10">Fund Transfer Documents: </label> 
                                                                                                  <div  class="dropzone"> 
                                                                                                      <div class="fallback">
                                                                                                           <table class="table table-bordered">
                                                                                                                        @foreach($FundDoc as $item)
                                    <tr class="pdf-file-col-{{ $item->id }}">
                                        <td>
                                            <span>{{$item->document}}</span> </td><td>
                                         <a onclick="deletePdfFile('{{ $item->id }}')" href="javascript:;" class="btn btn-danger btn-sm"><i class="fas fa-trash    "></i></a></td>
                                    </tr>
                                    @endforeach
                                    </table>
                                                                                                              <input name="fund_documents[]" type="file" multiple />
                                                                                                          </div>
                                                                                                      </div>
                                                                                       </div>
                                                                                      
                                                                                      
                                                                                       
                                                                                       
                                
                               
                                                                                       
                                                                                       
                        <div class="row " style="margin:20px 0px;">
                            <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Important Dates</label>
                             
                                 <table class="table table-bordered">
                                  
                                  @foreach ($property->propertyImportantdates as $item)
                                    <tr class="datesimp-tr-{{ $item->id }}">
                                        <td>
                                            <input type="text"   value="{{$item->name}}" class="form-control" readonly>  
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" value="{{$item->date}}" readonly >
                                                      
                                         </td>
                                         <td>
                                    <a onclick="deleteImpDate('{{ $item->id }}')" href="javascript:;" class="btn btn-danger btn-sm"><i class="fas fa-trash    "></i></a></td>
                                    </tr>
                                    @endforeach
                                    </table>
                                    </div>
                                    </div>
                            
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
                                                                                                   
                                                                                                    <button class="btn btn-rounded btn-outline-primary w-100 waves-effect waves-light" style="margin:auto !important">Update</button>
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
    
#1, #3, #4, #2 {
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
    </style>
 
    <script>
        
        function deleteSliderImg(id){
            // project demo mode check
            var isDemo="{{ env('PROJECT_MODE') }}"
            var demoNotify="{{ env('NOTIFY_TEXT') }}"
            if(isDemo==0){
                toastr.error(demoNotify);
                return;
            }
            // end

            $.ajax({
                type: 'GET',
                url: "{{ url('admin/property-slider-img/') }}"+"/"+ id,
                success: function (response) {
                    if(response.success){
                        toastr.success(response.success)
                        $(".slider-tr-"+id).remove()
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
        
        
        function deleteImpDate(id){
         

            $.ajax({
                type: 'GET',
                url: "{{ url('admin/property-impdates/') }}"+"/"+ id,
                success: function (response) {
                    if(response.success){
                        toastr.success(response.success)
                        $(".datesimp-tr-"+id).remove()
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
     
        function deletePdfFile(id){

        

            $.ajax({
                type: 'GET',
                url: "{{ url('admin/property-delete-pdf/') }}"+"/"+ id,
                success: function (response) {
                    if(response.success){
                        toastr.success(response.success)
                        $(".pdf-file-col-"+id).remove()
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }

function deleteVideo(id){

        

            $.ajax({
                type: 'GET',
                url: "{{ url('admin/property-delete-video/') }}"+"/"+ id,
                success: function (response) {
                    if(response.success){
                        toastr.success(response.success)
                        $(".video-file-col-"+id).remove()
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
    </script>

<style>
   .mb0{
   margin-bottom:0px ! important
      }
</style>
  
 
 
 @endsection
