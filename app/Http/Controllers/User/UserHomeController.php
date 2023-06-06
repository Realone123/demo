<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Updates;
use App\Property;
use Auth;
use Image;
use File;
use App\Setting;
use App\ListingReview;
use App\NotificationText;
use App\ValidationText;
use App\ManageText;
use App\Navigation;
use App\BannerImage;
use Hash;
use App\ListingPackage;
use App\ListingClaime;
use App\PropertyReview;
use App\Package;
use Str;
use App\Investments;
use App\Rules\Captcha;
use Illuminate\Pagination\Paginator;
class UserHomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function ListingPackage(){
        $notify=$this->notify->where('id',32)->first()->custom_text;
        $menus=Navigation::all();
        $listingPackages=ListingPackage::where('status',1)->get();
        $currency=Setting::first();
        $websiteLang=ManageText::all();
        return view('user.profile.package',compact('websiteLang','menus','notify','listingPackages','currency'));
    }
    public function clientReview(){
        Paginator::useBootstrap();
        $user=Auth::guard('web')->user();

        $clientReviews=PropertyReview::join('properties','properties.id','property_reviews.property_id')->join('users','users.id','property_reviews.user_id')
        ->where('properties.user_id',$user->id)->where('property_reviews.status',1)->select('property_reviews.*','properties.id as proper_id','properties.thumbnail_image','properties.slug','properties.title','users.image as user_image','users.name','users.slug as user_slug')->paginate(10);
        $agent_default_profile=BannerImage::find(15);
        $websiteLang=ManageText::all();
        return view('user.profile.client-review',compact('clientReviews','agent_default_profile','websiteLang'));
    }


    public function myReview(){
        Paginator::useBootstrap();
        $user=Auth::guard('web')->user();
        $myReviews=PropertyReview::where(['user_id'=>$user->id,'status'=>1])->orderBy('id','desc')->paginate(10);
        $websiteLang=ManageText::all();
        return view('user.profile.review',compact('myReviews','websiteLang'));
    }

    public function editReview($id){
        $user=Auth::guard('web')->user();
        $review=PropertyReview::where(['user_id'=>$user->id,'id'=>$id])->first();
        if($review){
            $websiteLang=ManageText::all();
            return view('user.profile.review-edit',compact('review','websiteLang'));
        }else{
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','something')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->route('user.my-review')->with($notification);
        }
    }

    public function deleteReview($id){
        // project demo mode check
        if(env('PROJECT_MODE')==0){
            $notification=array(
                'messege'=>env('NOTIFY_TEXT'),
                'alert-type'=>'error'
            );

            return redirect()->back()->with($notification);
        }
        // end

        $user=Auth::guard('web')->user();
        $review=PropertyReview::where(['user_id'=>$user->id,'id'=>$id])->first();
        if($review){
            $review->delete();
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','delete')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'success');
            return redirect()->route('user.my-review')->with($notification);

        }else{
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','something')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->route('user.my-review')->with($notification);
        }
    }



    public function myaccount(){
        $user=Auth::guard('web')->user();
        $default_image=BannerImage::find(15);
        $agent_default_profile=BannerImage::find(18);
        $websiteLang=ManageText::all();
        return view('user.profile.myaccount',compact('user','default_image','agent_default_profile','websiteLang'));
    }
     public function profiles()
    {
       
        $user=Auth::guard('web')->user();
        $default_image=BannerImage::find(15);
        $agent_default_profile=BannerImage::find(18);
        $totalinvestments=Investments::join('properties', 'properties.id', '=', 'investments.property_id')
                                     ->where(['investments.user_id'=>$user->id])->where('investments.status','Approved')
                                     
                                     ->get();
        
      //  $updates=Updates::all();
        
        $updates = Updates::join('properties', 'properties.id', '=', 'updates.property_id')
              ->join('investments', 'investments.property_id', '=', 'updates.property_id')
              
            ->where('investments.user_id', $user->id)
           
            ->get(['updates.*', 'properties.title','properties.thumbnail_image']);
          //  print_r($updates); exit;
        
        $websiteLang=ManageText::all();
        return view('user.profile.profiles',compact('user','updates','default_image','agent_default_profile','websiteLang','totalinvestments'));
       
    }
  
    public function updateProfileBanner(Request $request){

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
            'banner_image'=>'required',
        ];
        $customMessages = [
            'banner_image.required' => $valid_lang->where('lang_key','banner_img')->first()->custom_text,
        ];
        $this->validate($request, $rules, $customMessages);

        $user=Auth::guard('web')->user();

        if($request->file('banner_image')){
            $old_banner_image=$user->banner_image;
            $banner_image=$request->banner_image;
            $banner_ext=$banner_image->getClientOriginalExtension();
            $banner_name= 'profile-banner-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$banner_ext;
            $banner_path='uploads/custom-images/'.$banner_name;
            Image::make($banner_image)
                ->save(public_path().'/'.$banner_path);

            $user->banner_image=$banner_path;
            $user->save();
            if($old_banner_image){
                if(File::exists(public_path().'/'.$old_banner_image)) unlink(public_path().'/'.$old_banner_image);
            }

        }

        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','update')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('user.my-profile')->with($notification);
    }

    public function myaccountUpdate(Request $request){
  

        $user=Auth::guard('web')->user();

        $valid_lang=ValidationText::all();
        $rules = [
            'name'=>'required|unique:users,name,'.$user->id,
            'email'=>'required|email',
        ];
        $customMessages = [
            'name.required' => $valid_lang->where('lang_key','name')->first()->custom_text,
            'name.unique' => $valid_lang->where('lang_key','unique_name')->first()->custom_text,
            'email.required' => $valid_lang->where('lang_key','email')->first()->custom_text,
        ];
        $this->validate($request, $rules, $customMessages);


        $user=Auth::guard('web')->user();

        // for profile image
        if($request->file('profile_image')){
            $old_image=$user->image;
            $image=$request->profile_image;
            $image_extention=$image->getClientOriginalExtension();
            $image_name= 'user-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$image_extention;
            $image_path='uploads/custom-images/'.$image_name;
            Image::make($image)
                ->save(public_path().'/'.$image_path);

            $user->image=$image_path;
            $user->save();
            if($old_image){
                if(File::exists(public_path().'/'.$old_image))  unlink(public_path().'/'.$old_image);
            }

        }

        $user->name=$request->name;
        $user->slug=Str::slug($request->name);
        $user->phone=$request->phone;
         $user->address=$request->address;
        $user->about_hear=$request->about_hear;
        $user->investment_capacity=$request->investment_capacity;
        $user->date_of_birth=$request->date_of_birth;
        $user->bank_name=$request->bank_name;
        $user->account_number=$request->account_number;
       
        $user->bank_address=$request->bank_address;
       
        $user->save();

        $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','update')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('user.myaccount')->with($notification);
    }

    public function updatePassword(Request $request){
      
       
        $valid_lang=ValidationText::all();
        $rules = [
            'current_password'=>'required',
            'password'=>'required|min:3',
        ];
        $customMessages = [
            'current_password.required' => $valid_lang->where('lang_key','current_pass')->first()->custom_text,
            'password.unique' => $valid_lang->where('lang_key','pass')->first()->custom_text,
            //'password.confirmed' => $valid_lang->where('lang_key','confirm_pass')->first()->custom_text,
            'password.min' => $valid_lang->where('lang_key','min_pass')->first()->custom_text,
        ];
        $this->validate($request, $rules, $customMessages);




        $user=Auth::guard('web')->user();
        if(Hash::check($request->current_password,$user->password)){
            $user->password=Hash::make($request->password);
            $user->save();
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','pass')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'success');

            return redirect()->route('logout')->with("success","Password successfully changed!");
        }else{
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','old_pass')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'error');
           // return redirect()->route('user.myaccount')->with($notification);
            return redirect()->back()->with("error","Your current password does not matches with the password.");
        }


    }


    public function storeReview(Request $request){

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
            'property_id'=>'required',
            'service_rating'=>'required',
            'location_rating'=>'required',
            'money_rating'=>'required',
            'clean_rating'=>'required',
            'avarage_rating'=>'required',
            'comment'=>'required',
            'g-recaptcha-response'=>new Captcha()
        ];
        $customMessages = [
            'comment.required' => $valid_lang->where('lang_key','comment')->first()->custom_text,
        ];
        $this->validate($request, $rules, $customMessages);


        $user=Auth::guard('web')->user();

        $isExist=PropertyReview::where(['user_id'=>$user->id,'property_id'=>$request->property_id])->count();

        if($isExist==0){
            $review=new PropertyReview();
            $review->user_id=$user->id;
            $review->property_id=$request->property_id;
            $review->service_rating=$request->service_rating;
            $review->location_rating=$request->location_rating;
            $review->money_rating=$request->money_rating;
            $review->clean_rating=$request->clean_rating;
            $review->avarage_rating=$request->avarage_rating;
            $review->comment=$request->comment;
            $review->status=0;
            $review->save();

            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','review_submit')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'success');
            return redirect()->back()->with($notification);
        }{
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','review')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }


    }

    public function updateReview(Request $request,$id){

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
            'property_id'=>'required',
            'service_rating'=>'required',
            'location_rating'=>'required',
            'money_rating'=>'required',
            'clean_rating'=>'required',
            'avarage_rating'=>'required',
            'comment'=>'required'
        ];
        $customMessages = [
            'comment.required' => $valid_lang->where('lang_key','comment')->first()->custom_text,
        ];
        $this->validate($request, $rules, $customMessages);


        $user=Auth::guard('web')->user();


        $review=PropertyReview::find($id);
        $review->service_rating=$request->service_rating;
        $review->location_rating=$request->location_rating;
        $review->money_rating=$request->money_rating;
        $review->clean_rating=$request->clean_rating;
        $review->avarage_rating=$request->avarage_rating;
        $review->comment=$request->comment;
        $review->save();

        $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','update')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('user.my-review')->with($notification);


    }


    public function pricingPlan(){
        $packages=Package::where('status',1)->orderBy('package_order','asc')->get();
        $currency=Setting::first();
        $websiteLang=ManageText::all();
        return view('user.profile.pricing-plan',compact('packages','currency','websiteLang'));
    }

}
