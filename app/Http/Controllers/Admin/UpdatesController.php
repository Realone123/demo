<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Property;
use App\Updates;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BannerImage;
use App\ManageText;
use App\NotificationText;
use App\Setting;

use Image;
use File;
class UpdatesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        
        $updates=Updates::join('properties', 'properties.id', '=', 'updates.property_id')->select('updates.*','properties.title')->get();
        $websiteLang=ManageText::all();
        return view('admin.adminupdates.index',compact('updates','websiteLang'));
    }

   
     public function create()
    {
        $properties=Property::all();
        $cities=City::where('status',1)->get();
        
        $websiteLang=ManageText::all();
        return view('admin.adminupdates.create',compact('properties','cities','websiteLang'));
    }
    public function store(Request $request)
    {
     

        $this->validate($request,[
            'subject'=>'required',
            'property_id'=>'required',
        ]);
        $updates=new Updates();
        $updates->property_id=$request->property_id;
        $updates->subject=$request->subject;
        $updates->description=$request->description;
        $updates->save();

        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','create')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

       return redirect()->route('admin.adminupdates.index')->with($notification);
    }

   public function edit($id)
    {
       
        $updates=Updates::find($id);
      
       // $users=User::all();
          $properties=Property::all();
         $settings=Setting::first();
       
        $websiteLang=ManageText::all();
        return view('admin.adminupdates.edit',compact('updates','properties','settings','websiteLang'));
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

        return redirect()->route('admin.adminupdates.index')->with($notification);
    }


 public function adminviewupdates($id)
    {
        
       $updates=Updates::join('properties', 'properties.id', '=', 'updates.property_id')->where('updates.id',$id)->select('updates.*','properties.title','properties.thumbnail_image')->first();
        
      
      
        $websiteLang=ManageText::all();
        $settings=Setting::first();
        return view('admin.adminupdates.update-details',compact('updates','settings','websiteLang'));
       
    }
    public function destroy($id)
    {
        
         $order=Updates::find($id);
        if($order){
            $order->delete();
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','delete')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'success');
            return redirect()->route('admin.adminupdates.index')->with($notification);
        }
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
