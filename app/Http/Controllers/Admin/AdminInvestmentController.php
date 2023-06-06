<?php

namespace App\Http\Controllers\Admin;

use App\Investments;
use App\Property;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ListingCategory;
use App\City;
use App\User;
use App\PropertyPurpose;
use App\Aminity;
use App\PropertyAminity;
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

use App\NotificationText;

use App\EmailTemplate;
use App\Package;
use App\Helpers\MailHelper;
use App\Mail\Sendmailtemplate;
use Mail;

class AdminInvestmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
       $totalinvestments=Investments::join('properties', 'properties.id', '=', 'investments.property_id')
                                     ->join('users', 'users.id', '=', 'investments.user_id')
                                    // ->where('investments.status','Approved')
                                     ->orderBy('id','desc')
                                   ->get(['investments.*','users.name','properties.title']); 
      
     // $investments=Investments::groupBy('user_id')->get();
          $investments= Investments::join('properties', 'properties.id', '=', 'investments.property_id')
                                     ->join('users', 'users.id', '=', 'investments.user_id')
                                   //  ->where('investments.status','Approved')
                                     ->groupBy('investments.user_id')
                                     ->orderBy('id','desc')
                                   ->get(['investments.*','users.name','properties.title']); 
                                    
 //print_r($investments); exit;
        $settings=Setting::first();
        $websiteLang=ManageText::all();
        return view('admin.investment.index',compact('totalinvestments','investments','settings','websiteLang'));
    }
 public function propertyDetails($id)
    {
        $properties=Property::where('id',$id)->orderBy('id','desc')->first();
        $slider_image=PropertyImage::where('property_id',$id)->get();
        
        $settings=Setting::first();
        $websiteLang=ManageText::all();
        return view('admin.property.property_details',compact('properties','settings','slider_image','websiteLang'));
    }

    public function create()
    {
         $users=User::all();
          $properties=Property::all();
         $settings=Setting::first();
        $websiteLang=ManageText::all();
        
        return view('admin.investment.create',compact('users','properties','settings','websiteLang'));
    }


    public function store(Request $request)
    {
      
        $valid_lang=ValidationText::all();

        $rules = [
           
            'user_id'=>'required',
            'property_id'=>'required',
            'investment_amount'=>'required|integer|min:25000,lte:cash',
            'date'=>'required',
            'mode_of_payment'=>'required',
            'status'=>'required',
            
            
        ];


        $customMessages = [
            'user_id.required' => "Please select investor",
            'property_id.required' =>"Please select property",
            'investment_amount.required' =>"Enter investment amount",
            'date.required' =>"Select date",
            'mode_of_payment.required' =>"Select mode of payment",
            'status.required' =>"Select Status",
           
        ];


        $this->validate($request, $rules, $customMessages);

        // Investments::create([
        //     'investor_id' => $request['user_id'],
        //     'property_id' => $request['property_id'],
        //     'investment_amount' =>$request['investment_amount'],
        // ]);
     // print_r($request->all()); exit;
          $property=new Investments();
         
        $admin=Auth::guard('admin')->user();
      
        $property->user_id=$request->user_id;
        $property->property_id=$request->property_id;
         $property_type=Property::where('id',$request->property_id)->first();
        $property->property_type_id=$property_type->property_type_id;
        $property->investment_amount=$request->investment_amount;
        $property->date=$request->date;
        $property->invested_date=$request->invested_date;
        $property->mode_of_payment=$request->mode_of_payment;
        $property->description=$request->description;
         
        $property->status=$request->status;
       

        $property->save();
        // // // property end

       
       
            // multiple documents
        if($request->file('multiple_documents')){
            $files=$request->multiple_documents;
            foreach($files as $file){
                if($file != null){
                    $propertyDocument=new PropertyDocument();
             
            $file_ext=$file->getClientOriginalExtension();
            $orignal_name=  $file->getClientOriginalName();
            $path = public_path('uploads/custom-documents/'.$request->property_id);

           if(!File::isDirectory($path)){
              File::makeDirectory($path, 0777, true, true);
               }
            $file_name= $orignal_name;
            $file_path=$file_name;
            $file->move($path,$file_path);
             $propertyDocument->property_id=$request->property_id;
              $propertyDocument->user_id=$request->user_id;;
             $propertyDocument->doc_name="Investment Documents";
            $propertyDocument->document=$file_path;
            $propertyDocument->save();

        }
   }
     }
       
        
        $user=User::find($request->user_id);
        MailHelper::setMailConfig();
       
        $template=EmailTemplate::where('id',8)->first();
        
        $message=$template->description;
        $subject=$template->subject;
       // $message=str_replace('{{user_name}}',$request->title,$message);
        
        $message=str_replace('{{user_name}}',$user->name,$message);
        $message=str_replace('{{property_name}}',$property_type->title,$message);
        Mail::to($user->email)->send(new Sendmailtemplate($message,$subject));
        
        
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','update')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

        return redirect()->route('admin.userinvestments.index')->with($notification);

    }


    public function show(Property $property)
    {
        //
    }


    public function edit($id)
    {
        $investment=Investments::where('id',$id)->first();
        $users=User::all();
          $properties=Property::all();
         $settings=Setting::first();
       
        $websiteLang=ManageText::all();
        return view('admin.investment.edit',compact('investment','users','properties','settings','websiteLang'));
    }


   public function update(Request $request, $id)
    {
     
         $property_type=Property::where('id',$request->property_id)->first();
       
       Investments::where('id',$id)->update([
            'user_id'=>$request->user_id,
            'property_id'=>$request->property_id,
             'property_type_id'=>$property_type->property_type_id,
              'investment_amount'=>$request->investment_amount,
              'date'=>$request->date,
                'invested_date'=>$request->invested_date,
        'mode_of_payment'=>$request->mode_of_payment,
        'description'=>$request->description,
               'status'=>$request->status,

        ]);
       
       
          
            // multiple documents
        if($request->file('multi_documents')){
   
            $files=$request->multi_documents;
               foreach($files as $file){
                if($file != null){
                    $propertyDocument=new PropertyDocument();
             
            $file_ext=$file->getClientOriginalExtension();
            $orignal_name=  $file->getClientOriginalName();
            $path = public_path('uploads/custom-documents/'.$request->property_id);

           if(!File::isDirectory($path)){
              File::makeDirectory($path, 0777, true, true);
               }
            $file_name= $orignal_name;
            $file_path=$file_name;
            $file->move($path,$file_path);
             $propertyDocument->investment_id=$id;
             $propertyDocument->property_id=$request->property_id;
              $propertyDocument->user_id=$request->user_id;
             $propertyDocument->doc_name="Investment Documents";
            $propertyDocument->document=$file_path;
            $propertyDocument->save();

        }
   }
     }

       
        $user=User::find($request->user_id);
        MailHelper::setMailConfig();
        if($request->status == "Approved"){
        $template=EmailTemplate::where('id',8)->first();
        }else{
         $template=EmailTemplate::where('id',9)->first();   
        }
        $message=$template->description;
        $subject=$template->subject;
       // $message=str_replace('{{user_name}}',$request->title,$message);
        
        $message=str_replace('{{user_name}}',$user->name,$message);
        $message=str_replace('{{property_name}}',$property_type->title,$message);
        Mail::to($user->email)->send(new Sendmailtemplate($message,$subject));
        
        
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','update')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

        return redirect()->route('admin.userinvestments.index')->with($notification);

    }


    public function destroy(Property $property)
    {
        // project demo mode check
        if(env('PROJECT_MODE')==0){
            $notification=array(
                'messege'=>env('NOTIFY_TEXT'),
                'alert-type'=>'error'
            );

            return redirect()->back()->with($notification);
        }
        // end

        $old_thumbnail=$property->thumbnail_image;
        $old_banner=$property->banner_image;
        $old_pdf=$property->file;
        PropertyAminity::where('property_id',$property->id)->delete();
        WishList::where('property_id',$property->id)->delete();
        PropertyReview::where('property_id',$property->id)->delete();
        PropertyNearestLocation::where('property_id',$property->id)->delete();
        foreach($property->propertyImages as $image){
            if(File::exists(public_path().'/'.$image->image)) unlink(public_path().'/'.$image->image);
        }
        PropertyImage::where('property_id',$property->id)->delete();


        if($old_pdf){
            if(File::exists(public_path().'/'.'uploads/custom-images/'.$old_pdf)) unlink(public_path().'/'.'uploads/custom-images/'.$old_pdf);
        }
        if(File::exists(public_path().'/'.$old_thumbnail)) unlink(public_path().'/'.$old_thumbnail);
        if(File::exists(public_path().'/'.$old_banner)) unlink(public_path().'/'.$old_banner);

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

    public function deletePdfFile($id){

        $property=Property::find($id);
        $old_file= $property->file;
        $property->file=null;
        $property->save();
        $old_file= "uploads/custom-images/".$old_file;
        if(File::exists(public_path().'/'.$old_file)) unlink(public_path().'/'.$old_file);

        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','delete')->first()->custom_text;

        return response()->json(['success'=>$notification]);
    }

    public function changeStatus($id){
        $property=Property::find($id);
        if($property->status==1){
            $property->status=0;
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','inactive')->first()->custom_text;
            $message=$notification;
        }else{
            $property->status=1;
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
