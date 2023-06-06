<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CustomFileManager;
use App\NotificationText;
use App\ManageText;
use Image;
use File;
use Str;

class FileManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {
        $images = CustomFileManager::orderBy('id','desc')->get();
        $websiteLang = ManageText::all();
        return view('admin.file_manager', compact('images','websiteLang'));
    }

    public function store(Request $request){
        $rules = [
            'title'=>'required',
            'image'=>'required'
        ];
        $this->validate($request, $rules);

        $fileManager = new CustomFileManager();
        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $file_name = 'file-manager-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $file_name = 'uploads/custom-images/'.$file_name;
            Image::make($request->image)
                ->save(public_path().'/'.$file_name);
        }

        $path_name = route('home');
        $fileManager->title = $request->title;
        $fileManager->image = $path_name.'/public/'.$file_name;
        $fileManager->save();

        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','create')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

        return redirect()->back()->with($notification);
    }

    public function destroy($id){
        $fileManager = CustomFileManager::find($id);
        $old_image = $fileManager->image;
        $fileManager->delete();
        if($old_image){
            if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
        }

        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','delete')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}
