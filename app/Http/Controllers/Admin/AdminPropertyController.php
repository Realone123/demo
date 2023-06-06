<?php

namespace App\Http\Controllers\Admin;
use App\Investments;
use App\Property;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ListingCategory;
use App\City;
use App\PropertyPurpose;
use DB;
use App\PropertyImage;
use App\PropertyDocument;
use App\PropertyVideo;
use App\PropertyType;
use App\WishList;
use App\NearestLocation;

use App\PropertyReview;
use Str;
use File;
use Image;
use Auth;
use App\Setting;
use App\ManageText;
use App\ValidationText;
use App\PropertyNearestLocation;
use App\Propertyimportantdates;
use App\NotificationText;
use App\User;
use App\EmailTemplate;
use App\Package;
use App\Helpers\MailHelper;
use App\Mail\Sendmailtemplate;
use Mail;

class AdminPropertyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $properties=Property::orderBy('id','desc')->get();
         $openproperties=Property::where('user_type',1)->where('status','Open')->orderBy('id','desc')->get();
        $fullyfundedproperties=Property::where('user_type',1)->where('status','Fully Funded')->orderBy('id','desc')->get();
        $closedproperties=Property::where('user_type',1)->where('status','Closed')->orderBy('id','desc')->get();
        //$closedproperties=Investments::where('status','manage')->orderBy('id','desc')->paginate(10);
      
        $settings=Setting::first();
        $websiteLang=ManageText::all();
        return view('admin.property.index',compact('closedproperties','properties','openproperties','fullyfundedproperties','settings','websiteLang'));
    }
 public function propertyDetails($id)
    {
        $properties=Property::where('id',$id)->orderBy('id','desc')->first();
        $slider_image=PropertyImage::where('property_id',$id)->get();
        
         $properties=Property::where('id',$id)->orderBy('id','desc')->first();
        $slider_image=PropertyImage::where('property_id',$id)->get();
         $propertyDocuments = PropertyDocument::where('property_id',$id)->get();
        
        $settings=Setting::first();
        $websiteLang=ManageText::all();
        return view('admin.property.property_details',compact('propertyDocuments','properties','settings','slider_image','websiteLang'));
    }

    public function create()
    {
        $propertyTypes=PropertyType::where('status',1)->get();
        $cities=City::where('status',1)->get();
        $purposes=PropertyPurpose::where('status',1)->get();
       
        $nearest_locatoins=NearestLocation::where('status',1)->get();
        $websiteLang=ManageText::all();
        return view('admin.property.create',compact('propertyTypes','cities','purposes','nearest_locatoins','websiteLang'));
    }

  public function property_liveupdate($id)
    {

       $property=Property::where('id',$id)->orderBy('id','desc')->first(); 
     
        
       $propertycount=DB::connection('mysql2')->table('properties')->where('title',$property->title)->get();
       if(count($propertycount)==0){
    $liveproperty=DB::connection('mysql2')->table('properties')->insert(['title' => $property->title,
        'thumbnail_image'=>$property->thumbnail_image,
        'slug'=>trim($property->title),
      'property_type_id'=>$property->property_type_id,
      'city_id'=>$property->city_id,
      'address'=>$property->address,
      'phone'=>$property->phone,
      'email'=>$property->email,
      
      'price'=>$property->price,
      'period'=>$property->period ? $property->period : null,
      'area'=>$property->area,
      'number_of_unit'=>$property->unit,
      'offering_size'=>$property->offering_size,
      'min_investment'=>$property->min_investment,
       'capital_raising'=>$property->capital_raising,
      'expected_return'=>$property->expected_return,
       'cost_pershare'=>$property->cost_pershare,
      'target_irr'=>$property->target_irr,
      'target_arr'=>$property->target_arr,
      'yield'=>$property->yield,
        
      'no_of_shares'=>$property->no_of_shares,
      'equity'=>$property->equity,
      'investment_period'=>$property->investment_period,
      'no_of_units'=>$property->no_of_units,
      'years_built'=>$property->years_built,
      'occupancy'=>$property->occupancy,
      'utilities'=>$property->utilities,
      'roofs'=>$property->roofs,
      'total_rentable'=>$property->total_rentable,
      'buildings'=>$property->buildings,
      'exterior'=>$property->exterior,
      'interier_upgrades'=>$property->interier_upgrades,
      'tenent_rentention'=>$property->tenent_rentention,
      'new_revenue_streams'=>$property->new_revenue_streams,
      'reduce_cost'=>$property->reduce_cost,
        
         
      'total_return'=>$property->total_return,
      'holding_period'=>$property->holding_period,
      
      'financial_hightlights'=>$property->financial_hightlights,
       'key_hightlights'=>$property->key_hightlights,
       'google_map_embed_code'=>$property->location,
      
      'description'=>$property->description,
      'status'=>$property->status,
        
       'receiving_bank'=>$property->receiving_bank,
       'bank_address'=>$property->bank_address,
       'wire_transfer'=>$property->wire_transfer,
       'ach_bank_number'=>$property->ach_bank_number,
       'account_number'=>$property->account_number,
       'account_type'=>$property->account_type,
       'account_name'=>$property->account_name,
       'beneficiary_address'=>$property->beneficiary_address,
    
      'seo_title'=>$property->seo_title ? $property->seo_title : $property->title,
      'seo_description'=>$property->seo_description ? $property->seo_description : $property->title,


        ]);
       
      }else{
        $liveproperty= DB::connection('mysql2')->table('properties')->where('title', $property->title)->update(['title' => $property->title,
        'thumbnail_image'=>$property->thumbnail_image,
        'slug'=>trim($property->title),
      'property_type_id'=>$property->property_type_id,
      'city_id'=>$property->city_id,
      'address'=>$property->address,
      'phone'=>$property->phone,
      'email'=>$property->email,
      
      'price'=>$property->price,
      'period'=>$property->period ? $property->period : null,
      'area'=>$property->area,
      'number_of_unit'=>$property->unit,
      'offering_size'=>$property->offering_size,
      'min_investment'=>$property->min_investment,
       'capital_raising'=>$property->capital_raising,
      'expected_return'=>$property->expected_return,
       'cost_pershare'=>$property->cost_pershare,
      'target_irr'=>$property->target_irr,
      'target_arr'=>$property->target_arr,
      'yield'=>$property->yield,
        
      'no_of_shares'=>$property->no_of_shares,
      'equity'=>$property->equity,
      'investment_period'=>$property->investment_period,
      'no_of_units'=>$property->no_of_units,
      'years_built'=>$property->years_built,
      'occupancy'=>$property->occupancy,
      'utilities'=>$property->utilities,
      'roofs'=>$property->roofs,
      'total_rentable'=>$property->total_rentable,
      'buildings'=>$property->buildings,
      'exterior'=>$property->exterior,
      'interier_upgrades'=>$property->interier_upgrades,
      'tenent_rentention'=>$property->tenent_rentention,
      'new_revenue_streams'=>$property->new_revenue_streams,
      'reduce_cost'=>$property->reduce_cost,
        
         
      'total_return'=>$property->total_return,
      'holding_period'=>$property->holding_period,
      
      'financial_hightlights'=>$property->financial_hightlights,
       'key_hightlights'=>$property->key_hightlights,
       'google_map_embed_code'=>$property->location,
      
      'description'=>$property->description,
      'status'=>$property->status,
        
       'receiving_bank'=>$property->receiving_bank,
       'bank_address'=>$property->bank_address,
       'wire_transfer'=>$property->wire_transfer,
       'ach_bank_number'=>$property->ach_bank_number,
       'account_number'=>$property->account_number,
       'account_type'=>$property->account_type,
       'account_name'=>$property->account_name,
       'beneficiary_address'=>$property->beneficiary_address,
    
      'seo_title'=>$property->seo_title ? $property->seo_title : $property->title,
      'seo_description'=>$property->seo_description ? $property->seo_description : $property->title,
        ]);
      }
      $livepropertycount=DB::connection('mysql2')->table('properties')->where('title',$property->title)->first();   
    // print_r($livepropertycount->id); exit;
       //thumbnail image
        if($property->thumbnail_image){
           
         File::copy((public_path()."/".$property->thumbnail_image),"/home/realonei/domains/realoneinvest.com/public_html/public/".$property->thumbnail_image);
        }
        
        
         // slider image
         
         $sliderimg=PropertyImage::where('property_id',$id)->get();
        
        if(count($sliderimg)>0){
            
            foreach($sliderimg as $image){
               
                // $propertycount=DB::connection('mysql2')->table('property_images')->where('image',$image->image)->get();
                // if(count($propertycount) == 0){
                   File::copy((public_path()."/".$image->image),"/home/realonei/domains/realoneinvest.com/public_html/public/".$image->image);
   
                $slider_img=DB::connection('mysql2')->table('property_images')->insert(['image' => $image->image,
                    'property_id' => $livepropertycount->id,
                   ]);

                // }
            }
        }
        
        
            // subscription documents
            
         $property_docs=PropertyDocument::where('property_id',$id)->get();
         
        if(count($property_docs)>0){
            
            foreach($property_docs as $docs){
                // $propertycount=DB::connection('mysql2')->table('property_documents')->where('document',$docs->document)->get();
                // if(count($propertycount) == 0){
                    $path ="/home/realonei/domains/realoneinvest.com/public_html/public/uploads/custom-documents/".$id;

           if(!File::isDirectory($path)){
              File::makeDirectory($path, 0777, true, true);
               }
                    
                   File::copy((public_path().'/uploads/custom-documents/'.$id."/".$docs->document),"/home/realonei/domains/realoneinvest.com/public_html/public/uploads/custom-documents/".$id."/".$docs->document);
   
                $slider_img=DB::connection('mysql2')->table('property_documents')->insert(['doc_name' => $docs->doc_name,
                    'document' => $docs->document,
                    'property_id' => $livepropertycount->id,
                   ]);

                // }
            }
        }    
       
        
    
      //  print_r($property); exit;
        
        // property end

        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','create')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

        return redirect()->route('admin.property.index')->with($notification);
    }
  
    public function store(Request $request)
    {
      
      
        
        $valid_lang=ValidationText::all();

        $rules = [
            'title'=>'required',
            
            'property_type'=>'required',
           // 'city'=>'required',
           // 'address'=>'required',
           // 'email'=>'required|email',
            
           // 'price'=>'required',
           
            
            'thumbnail_image'=>'required|file',
           
           // 'description'=>'required',
             'status'=>'required',
            
            // "offering_documents" => "mimes:pdf|max:10000"
        ];


        $customMessages = [
            'title.required' => $valid_lang->where('lang_key','title')->first()->custom_text,
           // 'title.unique' => $valid_lang->where('lang_key','unique_title')->first()->custom_text,
            // 'slug.required' => $valid_lang->where('lang_key','slug')->first()->custom_text,
            // 'slug.unique' => $valid_lang->where('lang_key','unique_slug')->first()->custom_text,
             'property_type.required' => $valid_lang->where('lang_key','property_type')->first()->custom_text,
            // 'city.required' => $valid_lang->where('lang_key','city')->first()->custom_text,
           // 'address.required' => $valid_lang->where('lang_key','address')->first()->custom_text,
           // 'email.required' => $valid_lang->where('lang_key','email')->first()->custom_text,
            // 'purpose.required' => $valid_lang->where('lang_key','purpose')->first()->custom_text,
           //  'price.required' => $valid_lang->where('lang_key','price')->first()->custom_text,
            
             'thumbnail_image.required' => $valid_lang->where('lang_key','thumb_img')->first()->custom_text,
            // 'slider_images.required' => $valid_lang->where('lang_key','slider_img')->first()->custom_text,
           //  'description.required' => $valid_lang->where('lang_key','des')->first()->custom_text,
              'status.required' => $valid_lang->where('lang_key','status')->first()->custom_text,
        ];


        $this->validate($request, $rules, $customMessages);

        
        $property=new Property();
        $admin=Auth::guard('admin')->user();
        $property->admin_id=$admin->id;
        $property->title=$request->title;
        $property->slug=trim($request->title);
        $property->property_type_id=$request->property_type;
        $property->city_id=$request->city;
        $property->address=$request->address;
        $property->phone=$request->phone;
        $property->email=$request->email;
      
        $property->price=$request->price;
        $property->period=$request->period ? $request->period : null;
        $property->area=$request->area;
        $property->number_of_unit=$request->unit;
        $property->offering_size=$request->offering_size;
        $property->min_investment=$request->min_investment;
        $property->capital_raising=$request->capital_raising;
        $property->expected_return=$request->expected_return;
        $property->target_irr=$request->target_irr;
        $property->target_arr=$request->target_arr;
        $property->yield=$request->yield;
        
        $property->no_of_shares=$request->no_of_shares;
        $property->equity=$request->equity;
        $property->investment_period=$request->investment_period;
        $property->no_of_units=$request->no_of_units;
        $property->years_built=$request->years_built;
        $property->occupancy=$request->occupancy;
        $property->utilities=$request->utilities;
        $property->roofs=$request->roofs;
        $property->total_rentable=$request->total_rentable;
        $property->buildings=$request->buildings;
        $property->exterior=$request->exterior;
        $property->interier_upgrades=$request->interier_upgrades;
        $property->tenent_rentention=$request->tenent_rentention;
        $property->new_revenue_streams=$request->new_revenue_streams;
        $property->reduce_cost=$request->reduce_cost;
           $property->cost_pershare=$request->cost_pershare;
         
        $property->total_return=$request->total_return;
        $property->holding_period=$request->holding_period;
        $property->financial_hightlights=$request->financial_hightlights;
         $property->key_hightlights=$request->key_hightlights;
         $property->google_map_embed_code=$request->location;
      
        $property->description=$request->description;
        $property->status=$request->status;
        
         $property->receiving_bank=$request->receiving_bank;
         $property->bank_address=$request->bank_address;
         $property->wire_transfer=$request->wire_transfer;
         $property->ach_bank_number=$request->ach_bank_number;
         $property->account_number=$request->account_number;
         $property->account_type=$request->account_type;
         $property->account_name=$request->account_name;
         $property->beneficiary_address=$request->beneficiary_address;
    
        $property->seo_title=$request->seo_title ? $request->seo_title : $request->title;
        $property->seo_description=$request->seo_description ? $request->seo_description : $request->title;


    


        //thumbnail image
        if($request->file('thumbnail_image')){
            $thumbnail_image=$request->thumbnail_image;
            $thumbnail_extention=$thumbnail_image->getClientOriginalExtension();
              $orignal_name=  $thumbnail_image->getClientOriginalName();
            $thumb_name= $orignal_name.'-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$thumbnail_extention;
            $thumb_path='uploads/custom-images/'.$thumb_name;

            Image::make($thumbnail_image)
                ->save(public_path()."/".$thumb_path);
            $property->thumbnail_image=$thumb_path;

        }

      
        $property->save();
        // property end

        

       

        // slider image
        if($request->file('slider_images')){
            $images=$request->slider_images;
            foreach($images as $image){
                if($image != null){
                    $propertyImage=new PropertyImage();
                    $slider_ext=$image->getClientOriginalExtension();
                     $orignal_name=  $image->getClientOriginalName();
                    // for small image
                    $slider_image= $orignal_name.'-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$slider_ext;
                    $slider_path='uploads/custom-images/'.$slider_image;

                    Image::make($image)
                        ->save(public_path()."/".$slider_path);

                    $propertyImage->image=$slider_path;
                    $propertyImage->property_id=$property->id;
                    $propertyImage->save();

                }
            }
        }
       
       
            // multiple documents
        if($request->file('subscription_documents')){
            $files=$request->subscription_documents;
            foreach($files as $file){
                if($file != null){
                    $propertyDocument=new PropertyDocument();
             
            $file_ext=$file->getClientOriginalExtension();
            $orignal_name=  $file->getClientOriginalName();
            //   $file_name= $orignal_name.'-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$file_ext;
              $path = public_path('uploads/custom-documents/'.$property->id);

           if(!File::isDirectory($path)){
              File::makeDirectory($path, 0777, true, true);
               }
             $file_name1= preg_replace('/[0-9]+/', '', $orignal_name);
            $file_name= str_replace('()', '', $file_name1);
            $file_path=$file_name;
            $file->move($path,$file_path);
             $propertyDocument->property_id=$property->id;
             $propertyDocument->doc_name="Subscription Documents";
            $propertyDocument->document=$file_path;
            $propertyDocument->save();

        }
   }
     }
     
     
          // multiple documents
        if($request->file('offering_documents')){
            $files=$request->offering_documents;
            foreach($files as $file){
                if($file != null){
                    $propertyDocument=new PropertyDocument();
             
            $file_ext=$file->getClientOriginalExtension();
            $orignal_name=  $file->getClientOriginalName();
            $path = public_path('uploads/custom-documents/'.$property->id);

           if(!File::isDirectory($path)){
              File::makeDirectory($path, 0777, true, true);
               }
             $file_name1= preg_replace('/[0-9]+/', '', $orignal_name);
            $file_name= str_replace('()', '', $file_name1);
            $file_path=$file_name;
            $file->move($path,$file_path);
             $propertyDocument->property_id=$property->id;
             $propertyDocument->doc_name="Offering Documents";
            $propertyDocument->document=$file_path;
            $propertyDocument->save();

        }
   }
     }
     
        // multiple documents
        if($request->file('fund_documents')){
            $files=$request->fund_documents;
            foreach($files as $file){
                if($file != null){
                    $propertyDocument=new PropertyDocument();
             
            $file_ext=$file->getClientOriginalExtension();
            $orignal_name=  $file->getClientOriginalName();
            //  $file_name= $orignal_name.'-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$file_ext;
          
            // $file_name= 'property-file-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$file_ext;
            
             $path = public_path('uploads/custom-documents/'.$property->id);

           if(!File::isDirectory($path)){
              File::makeDirectory($path, 0777, true, true);
               }
            $file_name1= preg_replace('/[0-9]+/', '', $orignal_name);
            $file_name= str_replace('()', '', $file_name1);
            $file_path=$file_name;
            $file->move($path,$file_path);
             $propertyDocument->property_id=$property->id;
             $propertyDocument->doc_name="Fund Transfer Documents";
            $propertyDocument->document=$file_path;
            $propertyDocument->save();

        }
   }
     }
     
     
             // insert nearest place
        $exist_location=[];
        if($request->nearest_locations){
            foreach($request->nearest_locations as $index => $location){
                if($location){
                    if($request->distances[$index]){
                        if(!in_array($location, $exist_location)){
                            $nearest_location= new Propertyimportantdates();
                            $nearest_location->property_id=$property->id;
                            $nearest_location->name=$location;
                            $nearest_location->date=$request->distances[$index];
                            $nearest_location->save();
                        }
                        $exist_location[]=$location;

                    }
                }
            }
        }

          // multiple videos
        if($request->file('multi_videos')){
            $images=$request->multi_videos;
            foreach($images as $image){
                if($image != null){
                    $propertyImage=new PropertyVideo();
                    $slider_ext=$image->getClientOriginalExtension();
                    $orignal_name=  $image->getClientOriginalName();
              // for small image
                    $slider_image= $orignal_name.'-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$slider_ext;
                    $slider_path='uploads/custom-videos/'.$slider_image;
                    Image::make($image)
                    ->save(public_path().'/'.$slider_path);

                    $propertyImage->video=$slider_path;
                    $propertyImage->property_id=$property->id;
                    $propertyImage->save();

                }
            }
        }
        
        
          
        
         $users=User::all();
       //  print_r(); exit;
        MailHelper::setMailConfig();
        $template=EmailTemplate::where('id',7)->first();
        $message=$template->description;
        $subject=$template->subject;
       // $message=str_replace('{{user_name}}',$request->title,$message);
        foreach($users as $user){
        $message=str_replace('{{user_name}}',$user->name,$message);
        $message=str_replace('{{property_name}}',$property->title,$message);
       // Mail::to($user->email)->send(new Sendmailtemplate($message,$subject));
        }
    //  Mail::to("rajanimogalturi@gmail.com,kdbhagavn13@gmail.com")->send(new PaymentAccept($message,$subject));
        
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','create')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

        return redirect()->route('admin.property.index')->with($notification);

    }

   public function addproperty_sendmail($id)
    {
         $property=Property::where('id',$id)->orderBy('id','desc')->first(); 
     
       $users=User::all();
       //  print_r(); exit;
        MailHelper::setMailConfig();
        $template=EmailTemplate::where('id',7)->first();
        $message=$template->description;
        $subject=$template->subject;
       // $message=str_replace('{{user_name}}',$request->title,$message);
        foreach($users as $user){
        $message=str_replace('{{user_name}}',$user->name,$message);
        $message=str_replace('{{property_name}}',$property->title,$message);
        Mail::to($user->email)->send(new Sendmailtemplate($message,$subject));
        }
      
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','create')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

        return redirect()->route('admin.property.index')->with($notification);
     
       
    }

    public function show(Property $property)
    {
        //
    }


    public function edit(Property $property)
    {
       
        $propertyTypes=PropertyType::where('status',1)->get();
        $cities=City::where('status',1)->get();
        $purposes=PropertyPurpose::where('status',1)->get();
        $SubscriptionsDoc=PropertyDocument::where('property_id',$property->id)->where('doc_name',"Subscription Documents")->get();
        $OfferingDoc=PropertyDocument::where('property_id',$property->id)->where('doc_name',"Offering Documents")->get();
       $FundDoc=PropertyDocument::where('property_id',$property->id)->where('doc_name',"Fund Transfer Documents")->get();
       
        $important_dates=Propertyimportantdates::where('property_id',$property->id)->get();
        $websiteLang=ManageText::all();
        return view('admin.property.edit',compact('property','SubscriptionsDoc','OfferingDoc','FundDoc','propertyTypes','cities','purposes','important_dates','websiteLang'));
    }


    public function update(Request $request, Property $property)
    {

        $valid_lang=ValidationText::all();

        $rules = [
           // 'title'=>'required|unique:properties,title,'.$property->id,
            // 'slug'=>'required|unique:properties,slug,'.$property->id,
            // 'property_type'=>'required',
             'title'=>'required',
            // 'address'=>'required',
            // 'email'=>'required|email',
            // 'purpose'=>'required',
            // 'price'=>'required|numeric',
            // 'area'=>'required',
            // 'unit'=>'required',
            // 'room'=>'required',
            // 'bedroom'=>'required',
            // 'bathroom'=>'required',
            // 'floor'=>'required',
            // 'description'=>'required',
           //  'status'=>'required',
            // 'featured'=>'required',
            // 'urgent_property'=>'required',
            // "pdf_file" => "mimes:pdf|max:10000"
        ];


        $customMessages = [
            'title.required' => $valid_lang->where('lang_key','title')->first()->custom_text,
           
          //  'title.unique' => $valid_lang->where('lang_key','unique_title')->first()->custom_text,
            // 'slug.required' => $valid_lang->where('lang_key','slug')->first()->custom_text,
            // 'slug.unique' => $valid_lang->where('lang_key','unique_slug')->first()->custom_text,
            // 'property_type.required' => $valid_lang->where('lang_key','property_type')->first()->custom_text,
            // 'city.required' => $valid_lang->where('lang_key','city')->first()->custom_text,
            // 'address.required' => $valid_lang->where('lang_key','address')->first()->custom_text,
            // 'email.required' => $valid_lang->where('lang_key','email')->first()->custom_text,
            // 'purpose.required' => $valid_lang->where('lang_key','purpose')->first()->custom_text,
            // 'price.required' => $valid_lang->where('lang_key','price')->first()->custom_text,
            // 'area.required' => $valid_lang->where('lang_key','area')->first()->custom_text,
            // 'unit.required' => $valid_lang->where('lang_key','unit')->first()->custom_text,
            // 'room.required' => $valid_lang->where('lang_key','room')->first()->custom_text,
            // 'bedroom.required' => $valid_lang->where('lang_key','bedroom')->first()->custom_text,
            // 'floor.required' => $valid_lang->where('lang_key','floor')->first()->custom_text,
            // 'banner_image.required' => $valid_lang->where('lang_key','banner_img')->first()->custom_text,
            // 'thumbnail_image.required' => $valid_lang->where('lang_key','thumb_img')->first()->custom_text,
            // 'slider_images.required' => $valid_lang->where('lang_key','slider_img')->first()->custom_text,
            // 'description.required' => $valid_lang->where('lang_key','des')->first()->custom_text,
            //  'status.required' => $valid_lang->where('lang_key','status')->first()->custom_text,
        ];


        $this->validate($request, $rules, $customMessages);



      $admin=Auth::guard('admin')->user();
        $property->admin_id=$admin->id;
        $property->title=$request->title;
        $property->slug=trim($request->title);
        $property->property_type_id=$request->property_type;
        $property->city_id=$request->city;
        $property->address=$request->address;
        $property->phone=$request->phone;
        $property->email=$request->email;
      
        $property->price=$request->price;
        $property->period=$request->period ? $request->period : null;
        $property->area=$request->area;
        $property->number_of_unit=$request->unit;
        $property->offering_size=$request->offering_size;
        $property->min_investment=$request->min_investment;
         $property->capital_raising=$request->capital_raising;
        $property->expected_return=$request->expected_return;
         $property->cost_pershare=$request->cost_pershare;
        $property->target_irr=$request->target_irr;
        $property->target_arr=$request->target_arr;
        $property->yield=$request->yield;
        
        $property->no_of_shares=$request->no_of_shares;
        $property->equity=$request->equity;
        $property->investment_period=$request->investment_period;
        $property->no_of_units=$request->no_of_units;
        $property->years_built=$request->years_built;
        $property->occupancy=$request->occupancy;
        $property->utilities=$request->utilities;
        $property->roofs=$request->roofs;
        $property->total_rentable=$request->total_rentable;
        $property->buildings=$request->buildings;
        $property->exterior=$request->exterior;
        $property->interier_upgrades=$request->interier_upgrades;
        $property->tenent_rentention=$request->tenent_rentention;
        $property->new_revenue_streams=$request->new_revenue_streams;
        $property->reduce_cost=$request->reduce_cost;
        
         
        $property->total_return=$request->total_return;
        $property->holding_period=$request->holding_period;
      
        $property->financial_hightlights=$request->financial_hightlights;
         $property->key_hightlights=$request->key_hightlights;
         $property->google_map_embed_code=$request->location;
      
        $property->description=$request->description;
        $property->status=$request->status;
        
         $property->receiving_bank=$request->receiving_bank;
         $property->bank_address=$request->bank_address;
         $property->wire_transfer=$request->wire_transfer;
         $property->ach_bank_number=$request->ach_bank_number;
         $property->account_number=$request->account_number;
         $property->account_type=$request->account_type;
         $property->account_name=$request->account_name;
         $property->beneficiary_address=$request->beneficiary_address;
    
        $property->seo_title=$request->seo_title ? $request->seo_title : $request->title;
        $property->seo_description=$request->seo_description ? $request->seo_description : $request->title;




        //thumbnail image
        if($request->file('thumbnail_image')){
            $old_thumbnail=$property->thumbnail_image;
            $thumbnail_image=$request->thumbnail_image;
            $thumbnail_extention=$thumbnail_image->getClientOriginalExtension();
             $orignal_name=  $thumbnail_image->getClientOriginalName();
            $thumb_name= $orignal_name.'-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$thumbnail_extention;
            $thumb_path='uploads/custom-images/'.$thumb_name;
            Image::make($thumbnail_image)
                ->save(public_path().'/'.$thumb_path);

            $property->thumbnail_image=$thumb_path;
            $property->save();
            if(File::exists(public_path().'/'.$old_thumbnail)) unlink(public_path().'/'.$old_thumbnail);
        }

      
        $property->save();
        // property end


         // slider image
        if($request->file('slider_images')){
            $images=$request->slider_images;
            foreach($images as $image){
                if($image != null){
                    $propertyImage=new PropertyImage();
                    $slider_ext=$image->getClientOriginalExtension();
                     $orignal_name=  $image->getClientOriginalName();
                    // for small image
                    $slider_image= $orignal_name.'-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$slider_ext;
                    $slider_path='uploads/custom-images/'.$slider_image;

                    Image::make($image)
                        ->save(public_path()."/".$slider_path);

                    $propertyImage->image=$slider_path;
                    $propertyImage->property_id=$property->id;
                    $propertyImage->save();

                }
            }
        }
       
       
            // multiple documents
        if($request->file('subscription_documents')){
            $files=$request->subscription_documents;
                 foreach($files as $file){
                if($file != null){
                    $propertyDocument=new PropertyDocument();
             
            $file_ext=$file->getClientOriginalExtension();
            $orignal_name=  $file->getClientOriginalName();
            $path = public_path('uploads/custom-documents/'.$property->id);

           if(!File::isDirectory($path)){
              File::makeDirectory($path, 0777, true, true);
               }
            $file_name1= preg_replace('/[0-9]+/', '', $orignal_name);
            $file_name= str_replace('()', '', $file_name1);
            $file_path=$file_name;
            $file->move($path,$file_path);
             $propertyDocument->property_id=$property->id;
             $propertyDocument->doc_name="Subscription Documents";
            $propertyDocument->document=$file_path;
            $propertyDocument->save();

        }
   }
     }
     
     
          // multiple documents
        if($request->file('offering_documents')){
            $files=$request->offering_documents;
                 foreach($files as $file){
                if($file != null){
                    $propertyDocument=new PropertyDocument();
             
            $file_ext=$file->getClientOriginalExtension();
            $orignal_name=  $file->getClientOriginalName();
            $path = public_path('uploads/custom-documents/'.$property->id);

           if(!File::isDirectory($path)){
              File::makeDirectory($path, 0777, true, true);
               }
            $file_name1= preg_replace('/[0-9]+/', '', $orignal_name);
            $file_name= str_replace('()', '', $file_name1);
            $file_path=$file_name;
            $file->move($path,$file_path);
             $propertyDocument->property_id=$property->id;
             $propertyDocument->doc_name="Offering Documents";
            $propertyDocument->document=$file_path;
            $propertyDocument->save();

        }
   }
     }
     
      // multiple documents
        if($request->file('fund_documents')){
            $files=$request->fund_documents;
            foreach($files as $file){
                if($file != null){
                    $propertyDocument=new PropertyDocument();
             
            $file_ext=$file->getClientOriginalExtension();
            $orignal_name=  $file->getClientOriginalName();
            //  $file_name= $orignal_name.'-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$file_ext;
          
            // $file_name= 'property-file-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$file_ext;
            
             $path = public_path('uploads/custom-documents/'.$property->id);

           if(!File::isDirectory($path)){
              File::makeDirectory($path, 0777, true, true);
               }
             $file_name1= preg_replace('/[0-9]+/', '', $orignal_name);
            $file_name= str_replace('()', '', $file_name1);
            $file_path=$file_name;
            $file->move($path,$file_path);
             $propertyDocument->property_id=$property->id;
             $propertyDocument->doc_name="Fund Transfer Documents";
            $propertyDocument->document=$file_path;
            $propertyDocument->save();

        }
   }
     }
     
     
             // insert nearest place
        $exist_location=[];
        if($request->nearest_locations){
            foreach($request->nearest_locations as $index => $location){
                if($location){
                    if($request->distances[$index]){
                        if(!in_array($location, $exist_location)){
                            $nearest_location= new Propertyimportantdates();
                            $nearest_location->property_id=$property->id;
                            $nearest_location->name=$location;
                            $nearest_location->date=$request->distances[$index];
                            $nearest_location->save();
                        }
                        $exist_location[]=$location;

                    }
                }
            }
        }

          // multiple videos
      
        if($request->file('multi_videos')){
            $files=$request->multi_videos;
            foreach($files as $file){
                if($file != null){
                    $propertyDocument=new PropertyVideo();
             
            $file_ext=$file->getClientOriginalExtension();
            $orignal_name=  $file->getClientOriginalName();
            //  $file_name= $orignal_name.'-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$file_ext;
          
            // $file_name= 'property-file-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$file_ext;
            
             $path = public_path('uploads/custom-videos/'.$property->id);

           if(!File::isDirectory($path)){
              File::makeDirectory($path, 0777, true, true);
               }
            $file_name= $orignal_name;
            $file_path=$file_name;
            $file->move($path,$file_path);
             $propertyDocument->property_id=$property->id;
           
            $propertyDocument->video=$file_path;
            $propertyDocument->save();

        }
   }
     }
        

        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','update')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

        return redirect()->route('admin.property.index')->with($notification);
    }


    public function destroy(Property $property)
    {
       

        $old_thumbnail=$property->thumbnail_image;
        
        $old_pdf=$property->offering_documents;
        
      //  WishList::where('property_id',$property->id)->delete();
      //  PropertyReview::where('property_id',$property->id)->delete();
      //  PropertyNearestLocation::where('property_id',$property->id)->delete();
        foreach($property->propertyImages as $image){
            if(File::exists(public_path().'/'.$image->image)) unlink(public_path().'/'.$image->image);
        }
        PropertyImage::where('property_id',$property->id)->delete();


        if($old_pdf){
            if(File::exists(public_path().'/'.'uploads/custom-documents/'.$old_pdf)) unlink(public_path().'/'.'uploads/custom-documents/'.$old_pdf);
        }
        if(File::exists(public_path().'/'.$old_thumbnail)) unlink(public_path().'/'.$old_thumbnail);
       
        $property->delete();
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','delete')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);

    }


    public function propertySliderImage($id){
        $image=PropertyImage::find($id);
        $old_image=$image->image;
        $image->delete();
        if(File::exists(public_path().'/'.$old_image)) unlink(public_path().'/'.$old_image);

        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','delete')->first()->custom_text;

        return response()->json(['success'=>$notification]);
    }
    
     public function propertyImpdates($id){
        $image=Propertyimportantdates::find($id);
        
        $image->delete();
       
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','delete')->first()->custom_text;

        return response()->json(['success'=>$notification]);
    }


    public function deletePdfFile($id){

        $property=PropertyDocument::find($id);
        $old_file= $property->document;
       
        $property->delete();
        $old_file= "uploads/custom-documents/".$property->property_id."/".$old_file;
      
        if(File::exists(public_path().'/'.'uploads/custom-documents/'.$old_file)) unlink(public_path().'/'.'uploads/custom-documents/'.$old_file);
   
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','delete')->first()->custom_text;

        return response()->json(['success'=>$notification]);
    }
    
    public function deleteVideo($id){

        $property=PropertyVideo::find($id);
        $old_file= $property->video;
       
        $property->delete();
        $old_file= "uploads/custom-videos/".$property->property_id."/".$old_file;
      
        if(File::exists(public_path().'/'.'uploads/custom-videos/'.$old_file)) unlink(public_path().'/'.'uploads/custom-videos/'.$old_file);
   
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','delete')->first()->custom_text;

        return response()->json(['success'=>$notification]);
    }

    public function changeStatus($id){
        $property=Property::find($id);
        if($property->property_status==1){
            $property->property_status=0;
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','inactive')->first()->custom_text;
            $message=$notification;
        }else{
            $property->property_status=1;
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','active')->first()->custom_text;
            $message=$notification;
        }
        $property->save();
        return response()->json($message);

    }

    public function existNearestLocation($id){
        $nearest_location=PropertyNearestLocation::find($id);
        $nearest_location->delete();

        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','delete')->first()->custom_text;

        return response()->json(['success'=>$notification]);
    }





    public function agentProperty(){
        $properties=Property::where('user_type',0)->orderBy('id','desc')->get();
        $settings=Setting::first();
        $websiteLang=ManageText::all();
        return view('admin.property.agent-property',compact('properties','settings','websiteLang'));
    }
}
