<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Slider;
use App\ManageText;
use Illuminate\Http\Request;
use Image;
use File;

use App\NotificationText;
use App\ValidationText;
class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $sliders=Slider::orderBy('serial','asc')->get();
        $websiteLang=ManageText::all();
        return view('admin.slider.index',compact('sliders','websiteLang'));
    }

    public function store(Request $request){

        if(env('PROJECT_MODE')==0){
            $notification=array(
                'messege'=>env('NOTIFY_TEXT'),
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }

        $valid_lang=ValidationText::all();
        $rules = [
            'title'=>'required',
            'serial'=>'required|numeric',
            'image'=>'required'
        ];
        $customMessages = [
            'title.required' => $valid_lang->where('lang_key','title')->first()->custom_text,
            'serial.required' => $valid_lang->where('lang_key','serial')->first()->custom_text,
            'image.required' => $valid_lang->where('lang_key','img')->first()->custom_text,
        ];
        $this->validate($request, $rules, $customMessages);

        $slider = new Slider();
        if($request->image){

            $image=$request->image;
            $extention=$image->getClientOriginalExtension();
            $name= 'slider-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_path='uploads/custom-images/'.$name;
            Image::make($image)
                ->save(public_path().'/'.$image_path);
        }

        $slider->image = $image_path;
        $slider->title = $request->title;
        $slider->serial = $request->serial;
        $slider->status = $request->status;
        $slider->save();

        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','create')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return back()->with($notification);

    }

    public function update(Request $request, $id)
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
            'serial'=>'required|numeric'
        ];
        $customMessages = [
            'title.required' => $valid_lang->where('lang_key','title')->first()->custom_text,
            'serial.required' => $valid_lang->where('lang_key','serial')->first()->custom_text,
        ];
        $this->validate($request, $rules, $customMessages);

        $slider=Slider::find($id);

        if($request->image){
            $old_slider=$slider->image;
            $image=$request->image;
            $extention=$image->getClientOriginalExtension();
            $name= 'home-page-banner-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_path='uploads/custom-images/'.$name;
            Image::make($image)
                ->save(public_path().'/'.$image_path);

                $slider->image=$image_path;
                $slider->save();
                if(File::exists(public_path().'/'.$old_slider)) unlink(public_path().'/'.$old_slider);
        }

        $slider->title = $request->title;
        $slider->serial = $request->serial;
        $slider->status = $request->status;
        $slider->save();

        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','update')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return back()->with($notification);
    }

    public function destroy($id) {
        $slider = Slider::find($id);
        $exist_slider = $slider->image;
        $slider->delete();
        if(File::exists(public_path().'/'.$exist_slider)) unlink(public_path().'/'.$exist_slider);
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','delete')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return back()->with($notification);
    }

    public function changeStatus($id){
        $slider = Slider::find($id);
        if($slider->status==1){
            $slider->status=0;
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','inactive')->first()->custom_text;
            $message=$notification;
        }else{
            $slider->status=1;
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','active')->first()->custom_text;
            $message=$notification;
        }
        $slider->save();
        return response()->json($message);

    }


}
