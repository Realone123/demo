<?php

namespace App\Http\Controllers\User;
use App\Investments;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Property;
use App\PropertyReview;
use App\Wishlist;
use App\ManageText;
use App\Order;
use App\Setting;
use App\PropertyAminity;
use App\PropertyImage;
use App\PropertyDocument;
use App\PropertyType;
use Auth;
use App\CustomPaginator;
use Illuminate\Pagination\Paginator;
class MyInvestmentsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function MyInvestments(){
        Paginator::useBootstrap();
        $paginate_qty=CustomPaginator::where('id',2)->first()->qty;
        $user=Auth::guard('web')->user();
        $properties=Property::where(['user_id'=>$user->id])->get();
        $publishProperty=0;
        $expiredProperty=0;
        $clientReviews=0;
        $myReviews=PropertyReview::where('user_id',$user->id)->get();
        $wishlists=Wishlist::where('user_id',$user->id)->get();
        $totalinvestments=Investments::where(['user_id'=>$user->id,'status'=>"Approved"])->get();
        $MyActiveInvestments=Investments::where(['user_id'=>$user->id,'status'=>"Approved"])->orderBy('id','desc')->paginate(10);
        $MyPastInvestments=Investments::where(['user_id'=>$user->id,'status'=>"Closed"])->get();
        $MyPendingInvestments=Investments::where(['user_id'=>$user->id,'status'=>"Pending"])->paginate($paginate_qty);
     //  print_r($activeOrder); exit;
        $currency=Setting::first();
        foreach($properties as $property){
            if($property->status==1){
                if($property->expired_date==null){
                    $publishProperty +=1;
                }elseif($property->expired_date >= date('Y-m-d')){
                    $publishProperty +=1;
                }else{
                    $expiredProperty +=1;
                }
            }else{
                $expiredProperty +=1;
            }

            $clientReviews+= $property->reviews->count();
        }

        $websiteLang=ManageText::all();
        return view('user.profile.MyInvestments',compact('expiredProperty','publishProperty','myReviews','clientReviews','wishlists','MyActiveInvestments','totalinvestments','MyPendingInvestments','MyPastInvestments','currency','websiteLang'));
    }
    
     public function rejectinvestments(){
        Paginator::useBootstrap();
        $paginate_qty=CustomPaginator::where('id',2)->first()->qty;
        $user=Auth::guard('web')->user();
        $properties=Property::where(['user_id'=>$user->id])->get();
        $publishProperty=0;
        $expiredProperty=0;
        $clientReviews=0;
        $myReviews=PropertyReview::where('user_id',$user->id)->get();
        $wishlists=Wishlist::where('user_id',$user->id)->get();
        $totalinvestments=Investments::where(['user_id'=>$user->id,'status'=>"Approved"])->get();
        $MyActiveInvestments=Investments::where(['user_id'=>$user->id,'status'=>"Approved"])->orderBy('id','desc')->paginate(10);
        $rejectInvestments=Investments::where(['user_id'=>$user->id,'status'=>"Rejected"])->orderBy('id','desc')->paginate(10);
        $MyPastInvestments=Investments::where(['user_id'=>$user->id,'status'=>"Closed"])->get();
        $MyPendingInvestments=Investments::where(['user_id'=>$user->id,'status'=>"Pending"])->paginate($paginate_qty);
     //  print_r($activeOrder); exit;
        $currency=Setting::first();
        foreach($properties as $property){
            if($property->status==1){
                if($property->expired_date==null){
                    $publishProperty +=1;
                }elseif($property->expired_date >= date('Y-m-d')){
                    $publishProperty +=1;
                }else{
                    $expiredProperty +=1;
                }
            }else{
                $expiredProperty +=1;
            }

            $clientReviews+= $property->reviews->count();
        }

        $websiteLang=ManageText::all();
        return view('user.profile.rejectinvestments',compact('expiredProperty','publishProperty','myReviews','clientReviews','wishlists','MyActiveInvestments','rejectInvestments','totalinvestments','MyPendingInvestments','MyPastInvestments','currency','websiteLang'));
    }
    
     public function activeinvestments(){
         Paginator::useBootstrap();
        $paginate_qty=CustomPaginator::where('id',2)->first()->qty;
        $user=Auth::guard('web')->user();
        $properties=Property::where(['user_id'=>$user->id])->get();
        $publishProperty=0;
        $expiredProperty=0;
        $clientReviews=0;
        $myReviews=PropertyReview::where('user_id',$user->id)->get();
        $wishlists=Wishlist::where('user_id',$user->id)->get();
        $totalinvestments=Investments::where(['user_id'=>$user->id,'status'=>"Approved"])->get();
        $MyActiveInvestments=Investments::where(['user_id'=>$user->id,'status'=>"Approved"])->orderBy('id','desc')->paginate(10);
        $MyPastInvestments=Investments::where(['user_id'=>$user->id,'status'=>"Closed"])->get();
        $MyPendingInvestments=Investments::where(['user_id'=>$user->id,'status'=>"Pending"])->paginate($paginate_qty);
     //  print_r($activeOrder); exit;
        $currency=Setting::first();
        foreach($properties as $property){
            if($property->status==1){
                if($property->expired_date==null){
                    $publishProperty +=1;
                }elseif($property->expired_date >= date('Y-m-d')){
                    $publishProperty +=1;
                }else{
                    $expiredProperty +=1;
                }
            }else{
                $expiredProperty +=1;
            }

            $clientReviews+= $property->reviews->count();
        }

        $websiteLang=ManageText::all();
        return view('user.profile.activeinvestments',compact('expiredProperty','publishProperty','myReviews','clientReviews','wishlists','MyActiveInvestments','totalinvestments','MyPendingInvestments','MyPastInvestments','currency','websiteLang'));
       }
    
    public function pendinginvestments(){
        Paginator::useBootstrap();
        $paginate_qty=CustomPaginator::where('id',2)->first()->qty;
        $user=Auth::guard('web')->user();
        $properties=Property::where(['user_id'=>$user->id])->get();
        $publishProperty=0;
        $expiredProperty=0;
        $clientReviews=0;
        $myReviews=PropertyReview::where('user_id',$user->id)->get();
        $wishlists=Wishlist::where('user_id',$user->id)->get();
        $totalinvestments=Investments::where(['user_id'=>$user->id,'status'=>"Approved"])->get();
        $MyActiveInvestments=Investments::where(['user_id'=>$user->id,'status'=>"Approved"])->orderBy('id','desc')->paginate(10);
        $MyPastInvestments=Investments::where(['user_id'=>$user->id,'status'=>"Closed"])->get();
        $MyPendingInvestments=Investments::where(['user_id'=>$user->id,'status'=>"Pending"])->paginate($paginate_qty);
     //  print_r($activeOrder); exit;
        $currency=Setting::first();
        foreach($properties as $property){
            if($property->status==1){
                if($property->expired_date==null){
                    $publishProperty +=1;
                }elseif($property->expired_date >= date('Y-m-d')){
                    $publishProperty +=1;
                }else{
                    $expiredProperty +=1;
                }
            }else{
                $expiredProperty +=1;
            }

            $clientReviews+= $property->reviews->count();
        }

        $websiteLang=ManageText::all();
        return view('user.profile.pendinginvestments',compact('expiredProperty','publishProperty','myReviews','clientReviews','wishlists','MyActiveInvestments','totalinvestments','MyPendingInvestments','MyPastInvestments','currency','websiteLang'));
       }
    
     public function pastinvestments(){
         Paginator::useBootstrap();
        $paginate_qty=CustomPaginator::where('id',2)->first()->qty;
        $user=Auth::guard('web')->user();
        $properties=Property::where(['user_id'=>$user->id])->get();
        $publishProperty=0;
        $expiredProperty=0;
        $clientReviews=0;
        $myReviews=PropertyReview::where('user_id',$user->id)->get();
        $wishlists=Wishlist::where('user_id',$user->id)->get();
        $totalinvestments=Investments::where(['user_id'=>$user->id,'status'=>"Approved"])->get();
        $MyActiveInvestments=Investments::where(['user_id'=>$user->id,'status'=>"Approved"])->orderBy('id','desc')->paginate(10);
        $MyPastInvestments=Investments::where(['user_id'=>$user->id,'status'=>"Closed"])->get();
        $MyPendingInvestments=Investments::where(['user_id'=>$user->id,'status'=>"Pending"])->paginate($paginate_qty);
     //  print_r($activeOrder); exit;
        $currency=Setting::first();
        foreach($properties as $property){
            if($property->status==1){
                if($property->expired_date==null){
                    $publishProperty +=1;
                }elseif($property->expired_date >= date('Y-m-d')){
                    $publishProperty +=1;
                }else{
                    $expiredProperty +=1;
                }
            }else{
                $expiredProperty +=1;
            }

            $clientReviews+= $property->reviews->count();
        }

        $websiteLang=ManageText::all();
        return view('user.profile.pastinvestments',compact('expiredProperty','publishProperty','myReviews','clientReviews','wishlists','MyActiveInvestments','totalinvestments','MyPendingInvestments','MyPastInvestments','currency','websiteLang'));
      }
      public function investDetails($id)
    {
        Paginator::useBootstrap();
        $user=Auth::guard('web')->user();
        
         $investment_details=Investments::find($id);
       //  print_r($investment_details); exit;
         $properties=Property::where('id',$investment_details->property_id)->orderBy('id','desc')->first();
        $slider_image=PropertyImage::where('property_id',$investment_details->property_id)->get();
         $propertyDocuments = PropertyDocument::where('property_id',$investment_details->property_id)->get();
        $settings=Setting::first();
        $websiteLang=ManageText::all();
        return view('user.profile.invest-details',compact('investment_details','properties','settings','slider_image','websiteLang','propertyDocuments'));
    }
}
