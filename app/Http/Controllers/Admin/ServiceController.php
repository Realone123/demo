<?php

namespace App\Http\Controllers\Admin;

use App\Service;
use App\ManageText;
use App\ValidationText;
use App\NotificationText;
use App\BannerImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use File;
class ServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $services=Service::all();
        $websiteLang=ManageText::all();
        $feature_image=BannerImage::find(23);
        return view('admin.service.index',compact('services','websiteLang','feature_image'));
    }


    public function store(Request $request)
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


        $valid_lang=ValidationText::all();
        $rules = [
            'title'=>'required',
            'icon'=>'required',
            'description'=>'required',
        ];
        $customMessages = [
            'title.required' => $valid_lang->where('lang_key','title')->first()->custom_text,
            'icon.required' => $valid_lang->where('lang_key','icon')->first()->custom_text,
            'description.required' => $valid_lang->where('lang_key','des')->first()->custom_text,
        ];
        $this->validate($request, $rules, $customMessages);


        $service=new Service();
        $service->title=$request->title;
        $service->icon=$request->icon;
        $service->description=$request->description;
        $service->status=$request->status;
        $service->save();
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','create')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

        return redirect()->back()->with($notification);

    }


    public function update(Request $request, Service $service)
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

        $valid_lang=ValidationText::all();
        $rules = [
            'title'=>'required',
            'icon'=>'required',
            'description'=>'required',
        ];
        $customMessages = [
            'title.required' => $valid_lang->where('lang_key','title')->first()->custom_text,
            'icon.required' => $valid_lang->where('lang_key','icon')->first()->custom_text,
            'description.required' => $valid_lang->where('lang_key','des')->first()->custom_text,
        ];
        $this->validate($request, $rules, $customMessages);

        $service->title=$request->title;
        $service->icon=$request->icon;
        $service->description=$request->description;
        $service->status=$request->status;
        $service->save();
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','update')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

        return redirect()->back()->with($notification);
    }

    public function destroy(Service $service)
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

        $service->delete();
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','delete')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

        return redirect()->back()->with($notification);
    }


    public function changeStatus($id){
        $service=Service::find($id);
        if($service->status==1){
            $service->status=0;
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','inactive')->first()->custom_text;
            $message=$notification;
        }else{
            $service->status=1;
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','active')->first()->custom_text;
            $message=$notification;
        }
        $service->save();
        return response()->json($message);

    }


    public function serviceBgImage(Request $request){
        // project demo mode check
        if(env('PROJECT_MODE')==0){
            $notification=array(
                'messege'=>env('NOTIFY_TEXT'),
                'alert-type'=>'error'
            );

            return redirect()->back()->with($notification);
        }
        // end

        $valid_lang=ValidationText::all();
        $rules = [
            'title'=>'required',
            'description'=>'required',
        ];
        $customMessages = [
            'title.required' => $valid_lang->where('lang_key','title')->first()->custom_text,
            'description.required' => $valid_lang->where('lang_key','des')->first()->custom_text,
        ];
        $this->validate($request, $rules, $customMessages);


        $feature_image=BannerImage::find(23);

        if($request->image) {
            $old_image=$feature_image->image;
            $image=$request->image;
            $extention=$image->getClientOriginalExtension();
            $name= 'faq-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_path='uploads/website-images/'.$name;
            Image::make($image)
                ->save(public_path().'/'.$image_path);

            $feature_image->image=$image_path;
            $feature_image->save();

            if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
        }

        $feature_image->title = $request->title;
        $feature_image->description = $request->description;
        $feature_image->save();


        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','update')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

        return back()->with($notification);

    }
}
