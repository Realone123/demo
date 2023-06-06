<?php

namespace App\Http\Controllers\Admin;

use App\Investments;
use App\Email;
use App\Receipt;
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
use App\Package;
use App\Helpers\MailHelper;
use App\Mail\PaymentAccept;
use Mail;

class AdminEmailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
       
        $emails=Email::all();
     
        $settings=Setting::first();
        $websiteLang=ManageText::all();
        return view('admin.email.index',compact('emails','settings','websiteLang'));
    }
 public function emailview($id)
    {
        $emails=Email::where('id',$id)->orderBy('id','desc')->first();
        $receipts=Receipt::join('users', 'users.id', '=', 'receipts.user_id')
          ->where('email_id',$id)->get();
        
        $settings=Setting::first();
        $websiteLang=ManageText::all();
        return view('admin.email.email_view',compact('emails','settings','receipts','websiteLang'));
    }

    public function create()
    {
         $users=User::all();
          $properties=Property::all();
         $settings=Setting::first();
        $websiteLang=ManageText::all();
        return view('admin.email.create',compact('users','properties','settings','websiteLang'));
    }


    public function store(Request $request)
    {
  
        $valid_lang=ValidationText::all();

        $rules = [
            'subject'=>'required',
          ];


        $customMessages = [
            'subject.required' => "enter subject",
             ];


        $this->validate($request, $rules, $customMessages);

       
          $email=new Email();
         
        $admin=Auth::guard('admin')->user();
      
        $email->subject=$request->subject;
        $email->message=$request->message;
        
       

        $email->save();
        // // // property end
        
        if($request->allusers){

         $users=User::all();
       //  print_r(); exit;
        MailHelper::setMailConfig();
       
        $message=$request->message;
        $subject=$request->subject;
       // $message=str_replace('{{user_name}}',$request->title,$message);
        foreach($users as $user){
             
            $emailreceipts=new Receipt();
            $emailreceipts->email_id=$email->id;
             $emailreceipts->user_id=$users->id;
            
            $emailreceipts->save();
            
        $message=str_replace('{{user_name}}',$request->subject,$message);
        Mail::to($user->email)->send(new PaymentAccept($message,$subject));
        }
            }
            elseif($request->user_id){
               
            $userslist=$request->user_id;
            foreach($userslist as $list){
                
               $users=User::where('id',$list)->first(); 
            $emailreceipts=new Receipt();
            $emailreceipts->email_id=$email->id;
             $emailreceipts->user_id=$users->id;
            
            $emailreceipts->save();
            
         MailHelper::setMailConfig();
       
        $message=$request->message;
        $subject=$request->subject;
       
        $message=str_replace('{{user_name}}',$request->subject,$message);
        Mail::to($users->email)->send(new PaymentAccept($message,$subject));
       
        }
                
            }
        
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','create')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

        return redirect()->route('admin.email.index')->with($notification);
   
        

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
              $file_name= $orignal_name;
          
            // $file_name= 'property-file-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$file_ext;
            $file_path=$file_name;
            $file->move(public_path().'/uploads/custom-documents/',$file_path);
             $propertyDocument->investment_id=$id;
             $propertyDocument->doc_name="Investment Documents";
            $propertyDocument->document=$file_path;
            $propertyDocument->save();

        }
   }
     }

       
        
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','update')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

        return redirect()->route('admin.userinvestments.index')->with($notification);

    }


   
    public function destroy($id){



        $order=Email::find($id);
        if($order){
            $order->delete();
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','delete')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'success');
            return redirect()->route('admin.email.index')->with($notification);
        }else{
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','something')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->route('admin.email.index')->with($notification);
        }
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
