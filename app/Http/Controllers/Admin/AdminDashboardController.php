<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Investments;
use App\User;
use App\Subscribe;
use App\ManageText;
use Carbon\Carbon;
use App\Order;
use App\Setting;
Use App\Property;
class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){

        // start manage chart
        $data=array();
        $start = new Carbon('first day of this month');
        $last = new Carbon('last day of this month');
        $first_date=$start->format('Y-m-d');
        $last_date=$last->format('Y-m-d');
        $today=date('Y-m-d');
        $length=date('d')-$start->format('d');
        for($i=1; $i<=$length+1; $i++){

            $date = '';
            if($i==1) $date=$first_date;
            else $date = $start->addDays(1)->format('Y-m-d');

            $sum=Order::whereDate('created_at',$date)->sum('amount_real_currency');
            $data[] = $sum;
        }
        $data=json_encode($data);
        // end manage chart




       // $orders=Order::where('payment_status',1)->count();
        $properties=Property::all();
        $openproperties=Property::where('status','Open')->orderBy('id','desc')->get();
        $fullproperties=Property::where('status','Fully Funded')->orderBy('id','desc')->get();
        $closedproperties=Property::where('status','Fully Funded')->orderBy('id','desc')->get();
        $users=User::all();
        $leads=User::orderBy('id','desc')->paginate(2);
        $subscriberQty=Subscribe::where('status',1)->count();


        $lastDayofMonth = \Carbon\Carbon::now()->endOfMonth()->toDateString();

        $monthlyEarning=Order::whereBetween('purchase_date', array($first_date,$lastDayofMonth))->where('payment_status',1)->sum('amount_real_currency');
        $totalEarning=Order::where('payment_status',1)->sum('amount_real_currency');
        $allinvestments=Investments::with('users')->count();
        $totalinvestments=Investments::all();
       
        $activeproperties=Property::where('status','Open')->orwhere('status','Fully Funded')->orderBy('id','desc')->paginate(10);
        $closedproperties=Property::where('status','Closed')->orderBy('id','desc')->paginate(10);
        $activeInvestments=Investments::where(['status'=>"Approved"])->get();
        $pendingInvestments=Investments::where(['status'=>"Pending"])->get();
        $websiteLang=ManageText::all();
        $currency=Setting::first();
        
        $topinvestments=Investments::join('users', 'users.id', '=', 'investments.user_id')
                                   
                                     ->groupBy('investments.user_id')
                                   ->orderBy('investment_amount','desc')->groupBy('user_id')->paginate(2);
        
         $propertytypes1= Investments::select(DB::raw("sum(investment_amount) as investment_amount"))->where(['property_type_id'=>'1','status'=>'Approved'])
        ->first();
       $propertytypes2= Investments::select(DB::raw("sum(investment_amount) as investment_amount"))->where(['property_type_id'=>'2','status'=>'Approved'])
        ->first();
       $propertytypes3= Investments::select(DB::raw("sum(investment_amount) as investment_amount"))->where(['property_type_id'=>'3','status'=>'Approved'])
        ->first();    
       $propertytypes4= Investments::select(DB::raw("sum(investment_amount) as investment_amount"))->where(['property_type_id'=>'4','status'=>'Approved'])
        ->first(); 
       $contruction=$propertytypes1->investment_amount;
       $cashflow=$propertytypes2->investment_amount;
       $land=$propertytypes3->investment_amount;
       $multifamily=$propertytypes4->investment_amount;
        
        $property_type_count=Investments::join('property_types', 'property_types.id', '=', 'investments.property_type_id')
        ->select(DB::raw("property_types.type as type ,COUNT(*) as count,sum(investment_amount) as investment_amount,property_types.color"))
        
        ->where('investments.status','Approved')
       
        ->groupBy('investments.property_type_id')
        ->orderBy('property_types.type','asc')->get();
     
      if(count($property_type_count)>0){
         foreach ($property_type_count as $type) {
            
            $dataPoints["type"][] = $type['type'];
            $dataPoints["amount"][] = $type['investment_amount'];
             $dataPoints["color"][] = $type['color'];
                
            
        }

        $total_sum=array_sum($dataPoints["amount"]);
        $data_type=json_encode($dataPoints["type"]);
        $data_amount=json_encode($dataPoints["amount"]);
         $data_color=json_encode($dataPoints["color"]);
      }else{
          $data_type=json_encode(["Construction","Cashflow","Land","Multi Family"]);
          $data_amount=json_encode([0,0,0,0]);
          $total_sum="80000";
          $data_color="";
      }
      
        return view('admin.dashboard',compact('total_sum','contruction','cashflow','land','multifamily','data_color','data_type','data_amount','property_type_count','closedproperties','activeproperties','topinvestments','leads','totalinvestments','openproperties','fullproperties','closedproperties','allinvestments','activeInvestments','pendingInvestments','properties','users','subscriberQty','websiteLang','data','currency','monthlyEarning','totalEarning'));
    }
}
