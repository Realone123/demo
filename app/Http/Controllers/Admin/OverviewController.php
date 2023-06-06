<?php

namespace App\Http\Controllers\Admin;

use App\Overview;
use App\ManageText;
use App\ValidationText;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use File;
use App\NotificationText;
class OverviewController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $overviews=Overview::all();
        $websiteLang=ManageText::all();
        return view('admin.overview.index',compact('overviews','websiteLang'));
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
            'name'=>'required',
            'quantity'=>'required',
            'icon'=>'required'
        ];
        $customMessages = [
            'name.required' => $valid_lang->where('lang_key','name')->first()->custom_text,
            'quantity.required' => $valid_lang->where('lang_key','qty')->first()->custom_text,
            'icon.required' => $valid_lang->where('lang_key','icon')->first()->custom_text,
            'description.required' => $valid_lang->where('lang_key','des')->first()->custom_text,
            'image.required' => $valid_lang->where('lang_key','img')->first()->custom_text,
        ];
        $this->validate($request, $rules, $customMessages);


        $overview=new Overview();

        $overview->name=$request->name;
        $overview->qty=$request->quantity;
        $overview->icon=$request->icon;
        $overview->status=$request->status;
        $overview->save();

        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','create')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

        return back()->with($notification);
    }


    public function update(Request $request, Overview $overview)
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
            'name'=>'required',
            'quantity'=>'required',
            'icon'=>'required',
        ];
        $customMessages = [
            'name.required' => $valid_lang->where('lang_key','name')->first()->custom_text,
            'quantity.required' => $valid_lang->where('lang_key','qty')->first()->custom_text,
            'icon.required' => $valid_lang->where('lang_key','icon')->first()->custom_text,
            'description.required' => $valid_lang->where('lang_key','des')->first()->custom_text,
        ];
        $this->validate($request, $rules, $customMessages);



        $overview->name=$request->name;
        $overview->qty=$request->quantity;
        $overview->icon=$request->icon;
        $overview->status=$request->status;
        $overview->save();

        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','update')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

        return back()->with($notification);
    }


    public function destroy(Overview $overview)
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

        $overview->delete();
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','delete')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

        return back()->with($notification);

    }



    public function changeStatus($id){
        $overview=Overview::find($id);
        if($overview->status==1){
            $overview->status=0;
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','inactive')->first()->custom_text;
            $message=$notification;
        }else{
            $overview->status=1;
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','active')->first()->custom_text;
            $message=$notification;
        }
        $overview->save();
        return response()->json($message);

    }
}
