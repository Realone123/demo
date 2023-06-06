<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\User;
use DB;
use App\ContactMessage;
use App\Setting;
use App\ManageText;
use App\Property;
use App\NotificationText;
use App\EmailTemplate;
use App\Package;
use App\Helpers\MailHelper;
use App\Mail\PaymentAccept;
use App\Investments;
use Mail;
class AdminReportController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $allleads=User::all();
        $verifiedleads=User::where('status',1)->get();
        $pendingleads=User::where('status',0)->get();
        
        $allinvestors = User::join('investments', 'investments.user_id', '=', 'users.id')->groupby('investments.user_id')->get();
        // $allinvestments = Investments::groupBy('user_id')->get();
        // $totalinvestments=Investments::all();
        
        $totalinvestments=User::join('investments', 'investments.user_id', '=', 'users.id')->groupby('investments.user_id')
                            ->select(DB::raw("sum(investments.investment_amount) as investment_amount,investments.property_id,investments.user_id,users.*"))->get();
      
     // $investments=Investments::groupBy('user_id')->get();
          $allinvestments= Investments::join('properties', 'properties.id', '=', 'investments.property_id')
                                     ->join('users', 'users.id', '=', 'investments.user_id')
                                     ->where('investments.status','Approved')
                                     ->groupBy('investments.user_id')
                                   ->get(['investments.*','users.name','properties.title']); 
        
       
        $activeproperties=Property::where('status','Open')->orwhere('status','Fully Fundend')->orderBy('id','desc')->paginate(10);
        $closedproperties=Property::where('status','Closed')->orderBy('id','desc')->paginate(10);
        $activeInvestments=Investments::where(['status'=>"Approved"])->get();
        $pendingInvestments=Investments::where(['status'=>"Pending"])->get();
        
        $websiteLang=ManageText::all();
        $currency=Setting::first();
        $confirmNotify=$websiteLang->where('lang_key','are_you_sure')->first()->custom_text;
        return view('admin.report.index',compact('activeInvestments','pendingInvestments','totalinvestments','allinvestors','allinvestments','allleads','verifiedleads','pendingleads','websiteLang','currency','confirmNotify'));
    }

    public function pendingOrder(){
        $orders=Order::where(['payment_status'=>0])->orderBy('id','desc')->get();
        $websiteLang=ManageText::all();
        $currency=Setting::first();
        $confirmNotify=$websiteLang->where('lang_key','are_you_sure')->first()->custom_text;
        return view('admin.order.pending-order',compact('orders','websiteLang','currency','confirmNotify'));
    }


    public function pendingPayment($id){
        $order=Order::find($id);
        $websiteLang=ManageText::all();
        if($order){
            $currency=Setting::first();
            return view('admin.order.payment-accept',compact('order','websiteLang','currency'));
        }else{
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','something')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->route('admin.pending-order')->with($notification);
        }
    }


    public function paymentAccept($id){
        $order=Order::find($id);
        $user=$order->user;
        $oldOrders=Order::where('user_id',$user->id)->update(['status'=>0]);
        $order->payment_status=1;
        $order->status=1;
        $order->save();

        $package=Package::find($order->package_id);
        // active and  in-active minimum limit listing
        $userProperties=Property::where('user_id',$user->id)->orderBy('id','desc')->get();
        if($userProperties->count() !=0){
            if($package->number_of_property !=-1){
                foreach($userProperties as $index => $listing){
                    if(++$index <= $package->number_of_property){
                        $listing->status=1;
                        $listing->save();
                    }else{
                        $listing->status=0;
                        $listing->save();
                    }
                }
            }elseif($package->number_of_property ==-1){
                foreach($userProperties as $index => $listing){
                    $listing->status=1;
                    $listing->save();
                }
            }
        }
        // end inactive

        // setup expired date
        if($userProperties->count() != 0){
            foreach($userProperties as $index => $listing){
                $listing->expired_date=$order->expired_date;
                $listing->save();
            }
        }

        MailHelper::setMailConfig();
        $template=EmailTemplate::where('id',8)->first();
        $message=$template->description;
        $subject=$template->subject;
        $message=str_replace('{{user_name}}',$user->name,$message);
        Mail::to($user->email)->send(new PaymentAccept($message,$subject));

        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','payment_accept')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.order-show',$id)->with($notification);

    }




    public function show($id){
        $order=Order::find($id);
        $websiteLang=ManageText::all();
        if($order){
            $currency=Setting::first();
            return view('admin.order.show',compact('order','websiteLang','currency'));
        }else{
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','something')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->route('admin.order')->with($notification);
        }
    }


    public function destroy($id){


        // project demo mode check
        if(env('PROJECT_MODE')==0){
            $notification=array('messege'=>env('NOTIFY_TEXT'),'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }
        // end

        $order=Order::find($id);
        if($order){
            $order->delete();
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','delete')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'success');
            return redirect()->route('admin.order')->with($notification);
        }else{
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','something')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->route('admin.order')->with($notification);
        }
    }







}
