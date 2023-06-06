<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Property;
use App\Updates;
use App\PropertyDocument;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BannerImage;
use App\ManageText;
use App\NotificationText;
use App\Setting;
use App\Investments;
use App\User;
use Image;
use File;
class DocumentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
           
        $subscriptionDocuments = PropertyDocument::join('properties', 'properties.id', '=', 'property_documents.property_id')
              
               ->join('property_types', 'property_types.id', '=', 'properties.property_type_id')
            
            ->where('property_documents.doc_name', "Subscription Documents")
            
            ->get(['property_documents.*', 'properties.title','property_types.type']);
        
         $offeringDocuments = PropertyDocument::join('properties', 'properties.id', '=', 'property_documents.property_id')
            
               ->join('property_types', 'property_types.id', '=', 'properties.property_type_id')
           
            ->where('property_documents.doc_name', "Offering Documents")
            
            ->get(['property_documents.*', 'properties.title','property_types.type']);
            
        $investmentDocuments = PropertyDocument::join('investments', 'investments.id', '=', 'property_documents.investment_id')
               ->join('properties', 'properties.id', '=', 'investments.property_id')
            
            ->where('property_documents.doc_name', "Investment Documents")
            
            ->get(['property_documents.*', 'properties.title','investments.status']);
            
        $taxDocuments = PropertyDocument::where('property_documents.doc_name', "Tax Documents")
            
            ->get(['property_documents.*']);
        
         $accredationDocuments = PropertyDocument::join('properties', 'properties.id', '=', 'property_documents.property_id')
              ->join('investments', 'investments.property_id', '=', 'property_documents.property_id')
               ->join('property_types', 'property_types.id', '=', 'properties.property_type_id')
           
            ->where('property_documents.doc_name', "Accreditation Documents")
            
            ->get(['property_documents.*', 'properties.title','property_types.type','investments.status']);
         
           
     
        $websiteLang=ManageText::all();
        return view('admin.documents.index',compact('accredationDocuments','taxDocuments','investmentDocuments','subscriptionDocuments','offeringDocuments','websiteLang'));
    }

   
     public function create()
    {
        $properties=Property::all();
        $users=User::join('investments', 'investments.user_id', '=', 'users.id')->groupby('investments.user_id')->get('users.*');
        $cities=City::where('status',1)->get();
        
        $websiteLang=ManageText::all();
        return view('admin.documents.create',compact('properties','users','websiteLang'));
    }
    public function store(Request $request)
    {
    //  if($request->investors_id){
    //  $investment=Investments::find($request->investors_id);
    //  }
        
          if($request->file('tax_documents')){
            $files=$request->tax_documents;
            foreach($files as $file){
               
                if($file != null){
                    $propertyDocument=new PropertyDocument();
             
            $file_ext=$file->getClientOriginalExtension();
            $orignal_name=  $file->getClientOriginalName();
            
            $path = public_path('uploads/custom-documents/'.$request->investors_id);

           if(!File::isDirectory($path)){
              File::makeDirectory($path, 0777, true, true);
               }
            $file_name1= preg_replace('/[0-9]+/', '', $orignal_name);
            $file_name= str_replace('()', '', $file_name1);
            $file_path=$file_name;
            $file->move($path,$file_path);
              
             $propertyDocument->user_id=$request->investors_id;
            // $propertyDocument->investment_id=$investment->id;
             $propertyDocument->doc_name="Tax Documents";
            $propertyDocument->document=$file_path;
            $propertyDocument->save();

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
              $path = public_path('uploads/custom-documents/'.$request->property_id);

           if(!File::isDirectory($path)){
              File::makeDirectory($path, 0777, true, true);
               }
             $file_name1= preg_replace('/[0-9]+/', '', $orignal_name);
            $file_name= str_replace('()', '', $file_name1);
            $file_path=$file_name;
            $file->move($path,$file_path);
             $propertyDocument->property_id=$request->property_id;
             $propertyDocument->doc_name="Subscription Documents";
            $propertyDocument->document=$file_path;
            $propertyDocument->save();

        }
   }
     }
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','create')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

        return redirect()->back()->with($notification);
    }

   public function edit($id)
    {
        $documents=PropertyDocument::find($id);
       $properties=Property::all();
        $users=User::all();
        $cities=City::where('status',1)->get();
        
       
         $settings=Setting::first();
       
        $websiteLang=ManageText::all();
        return view('admin.documents.edit',compact('documents','users','properties','settings','websiteLang'));
    }



 public function update(Request $request, $id)
    {
    

        $this->validate($request,[
            'subject'=>'required',
            'property_id'=>'required',
        ]);

        
         Updates::where('id',$id)->update([
            
            'property_id'=>$request->property_id,
             'subject'=>$request->subject,
              'description'=>$request->description,


        ]);

        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','create')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

        return redirect()->back()->with($notification);
    }


 public function adminviewupdates($id)
    {
        
        $updates=Updates::find($id);
        
        $today = date('Y-m-d');
        $futureDate = "2022-09-30";
        $difference = strtotime($futureDate) - strtotime($today);
        $days = abs($difference/(60 * 60)/24);
      
        $websiteLang=ManageText::all();
        $settings=Setting::first();
        return view('user.profile.property.update-details',compact('updates','settings','websiteLang'));
       
    }
    public function destroy(Faq $faq)
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
        $faq->delete();
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','delete')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

        return redirect()->back()->with($notification);
    }


    public function changeStatus($id){
        $faq=Faq::find($id);
        if($faq->status==1){
            $faq->status=0;
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','inactive')->first()->custom_text;
            $message=$notification;
        }else{
            $faq->status=1;
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','active')->first()->custom_text;
            $message=$notification;
        }
        $faq->save();
        return response()->json($message);

    }


    public function faqImage(Request $request){


        // project demo mode check
        if(env('PROJECT_MODE')==0){
            $notification=array(
                'messege'=>env('NOTIFY_TEXT'),
                'alert-type'=>'error'
            );

            return redirect()->back()->with($notification);
        }
        // end

        $this->validate($request,[
            'image'=>'required'
        ]);

        $faq_image=BannerImage::find(20);

        $old_image=$faq_image->image;
        $image=$request->image;
        $extention=$image->getClientOriginalExtension();
        $name= 'faq-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
        $image_path='uploads/website-images/'.$name;
        Image::make($image)
            ->save(public_path().'/'.$image_path);

        $faq_image->image=$image_path;
        $faq_image->save();

        if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);

        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','update')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

        return back()->with($notification);
    }
}
