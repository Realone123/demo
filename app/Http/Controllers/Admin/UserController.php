<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Updates;
use App\Order;
use App\Wishlist;
use App\Listing;
use App\ListingReview;
use App\ListingAminity;
use App\ListingVideo;
use App\ManageText;
use App\ListingImage;
use Image;
use File;
use Hash;
use Str;
use Mail;
use App\Mail\UserVerification;
use App\NotificationText;
use App\EmailTemplate;
use App\Helpers\MailHelper;
use App\ValidationText;
use App\BannerImage;
use App\Property;
use App\PropertyReview;
use App\Investments;
use DB;
use App\LogActivity;

class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    public function index(){
        $users=User::join('investments', 'investments.user_id', '=', 'users.id')->groupby('investments.user_id')->get('users.*');
        $properties=Property::all();
        $websiteLang=ManageText::all();
        $confirmNotify=$websiteLang->where('lang_key','are_you_sure')->first()->custom_text;
       // $allinvestors=Investments::with('user')->select('users.*','investments.investment_amount')->paginate(10);
        $allinvestors = User::join('investments', 'investments.user_id', '=', 'users.id')->groupby('investments.user_id')->select('users.*')->paginate(20);
                        
                                 
        //  $allinvestments=Investments::where('status','Approved')
        //                           ->select(DB::raw("sum(investment_amount) as investment_amount,property_id,user_id"))
        
        //                              ->groupBy('user_id')
        //                              ->get(); 
                                                                  
                                     
                                     
       // $allinvestments = Investments::groupBy('user_id')->get();                
                        
        //print_r($allinvestments); exit;
        return view('admin.user.index',compact('properties','allinvestors','users','websiteLang','confirmNotify'));
    }

     public function leads(){
        $allleads=User::all();
        $verifiedleads=User::where('status',1)->get();
        $pendingleads=User::where('status',0)->get();
        
        $websiteLang=ManageText::all();
        $confirmNotify=$websiteLang->where('lang_key','are_you_sure')->first()->custom_text;
        return view('admin.user.leads',compact('allleads','verifiedleads','pendingleads','websiteLang','confirmNotify'));
    }
    
     public function leadsview($id)
    {
       
        $user=User::find($id);
        $default_image=BannerImage::find(15);
        $agent_default_profile=BannerImage::find(18);
        $totalinvestments=Investments::where(['user_id'=>$user->id])->where('investments.status','Approved')->get();
        
      //  $updates=Updates::all();
        
        $updates = Updates::join('properties', 'properties.id', '=', 'updates.property_id')
              ->join('investments', 'investments.property_id', '=', 'updates.property_id')
              
            ->where('investments.user_id', $user->id)
           
            ->get(['updates.*', 'properties.title','properties.thumbnail_image']);
          //  print_r($updates); exit;
         $userlogs = LogActivity::where(['email_id'=>$user->email])->latest()->get();
        
        $websiteLang=ManageText::all();
        return view('admin.user.leads_view',compact('user','updates','default_image','agent_default_profile','websiteLang','totalinvestments','userlogs'));
       
    }
  
      public function investorsview($id)
    {
       
        $user=User::find($id);
        $default_image=BannerImage::find(15);
        $agent_default_profile=BannerImage::find(18);
        $totalinvestments=Investments::where(['user_id'=>$user->id])->get();
        
      //  $updates=Updates::all();
        
        $updates = Updates::join('properties', 'properties.id', '=', 'updates.property_id')
              ->join('investments', 'investments.property_id', '=', 'updates.property_id')
              
            ->where('investments.user_id', $user->id)
           
            ->get(['updates.*', 'properties.title','properties.thumbnail_image']);
          //  print_r($updates); exit;
        
        $websiteLang=ManageText::all();
        return view('admin.user.investors_view',compact('user','updates','default_image','agent_default_profile','websiteLang','totalinvestments'));
       
    }
    public function show($id){
        $user=User::find($id);
        if($user){
            $websiteLang=ManageText::all();
            $default_profile_image=BannerImage::find(15);
            return view('admin.user.show',compact('user','websiteLang','default_profile_image'));
        }else{
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','something')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'error');


            return redirect()->route('admin.agents')->with($notification);
        }

    }
    
     public function create(){
        $websiteLang=ManageText::all();
        return view('admin.user.create',compact('websiteLang'));
    }


   public function store(Request $request)
    {


        $valid_lang=ValidationText::all();
        $rules = [
            'name'=>'required',
            'email'=>'required|unique:users',
             'phone'=>'required',
            
        ];
        $customMessages = [
            'name.required' => $valid_lang->where('lang_key','name')->first()->custom_text,
            'email.required' => $valid_lang->where('lang_key','email')->first()->custom_text,
            'phone.required' => $valid_lang->where('lang_key','phone')->first()->custom_text,
            
        ];
        
        $password=Str::random(10);
        $this->validate($request, $rules, $customMessages);

        $user=User::create([
            'name'=>$request->name,
            'lastname'=>$request->lastname,
           'phone'=>$request->phone,
          'address'=>$request->address,
            'slug'=>Str::slug($request->name),
            'email'=>$request->email,
          'status'=>'1',
            'password'=>Hash::make($password),
            'email_verified_token'=>Str::random(100)
        ]);

        MailHelper::setMailConfig();

        $template=EmailTemplate::where('id',4)->first();
        $message=$template->description;
        $subject=$template->subject;
        $message=str_replace('{{user_name}}',$user->name,$message);
        $message=str_replace('{{password}}',$password,$message);

        \Mail::to($user->email)->send(new UserVerification($user,$message,$subject));

        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','create')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

        return redirect()->route('admin.agents')->with($notification);

        
    }
    public function destroy($id){

        

        $user=User::where('id',$id)->first();
        $user_image=$user->image;
        $user_banner_image=$user->banner_image;

        Investments::where('user_id',$id)->delete();
        Wishlist::where('user_id',$id)->delete();
        PropertyReview::where('user_id',$id)->delete();


        $user->delete();
        if($user_image){
            if(File::exists(public_path().'/'.$user_image)) unlink(public_path().'/'.$user_image);
        }
        if($user_banner_image){
            if(File::exists(public_path().'/'.$user_banner_image)) unlink(public_path().'/'.$user_banner_image);
        }



        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','delete')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');


        return back()->with($notification);

    }


    public function changeStatus($id){
        $user=User::find($id);
        if($user->status==1){
            $user->status=0;
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','inactive')->first()->custom_text;
            $message=$notification;
        }else{
            $user->status=1;
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','active')->first()->custom_text;
            $message=$notification;
        }
        $user->save();
        return response()->json($message);

    }
    
     public function changeleadStatus($id){
        
        $user=User::find($id);
        if($user->status===0){
            $user->status=1;
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','active')->first()->custom_text;
            $message=$notification;
        }else{
           
            $user->status=0;
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','inactive')->first()->custom_text;
            $message=$notification;
        }
        $user->save();
        return response()->json($message);
        
      

    }
}
