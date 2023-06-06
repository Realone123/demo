<?php

namespace App\Http\Controllers\User;

use App\Property;
use App\Investments;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use App\PropertyVideo;
use App\Package;
use App\ListingCategory;
use App\City;
use App\CountryState;

use App\PropertyPurpose;
use App\Aminity;
use App\PropertyAminity;
use App\PropertyImage;
use App\PropertyDocument;
use App\PropertyType;
use App\WishList;
use App\NearestLocation;
use App\Updates;
use Str;
use File;
use ZipArchive;
use Image;
use PDF;
use Mail;
use App\Setting;
use App\PropertyNearestLocation;
use App\Order;
use App\Helpers\MailHelper;
use App\EmailTemplate;
use App\Mail\PaymentAccept;
use App\PropertyReview;
use App\ManageText;
use App\ValidationText;
use App\NotificationText;
use Illuminate\Pagination\Paginator;
class PropertyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        Paginator::useBootstrap();
        $user=Auth::guard('web')->user();
       $activeproperties=Property::where('status','Open')->orwhere('status','Fully Funded')->orderBy('id','desc')->paginate(10);
       //$properties=Investments::where('user_id',$user->id)->where('status','open')->orderBy('id','desc')->paginate(10);
     // print_r($properties); exit;
       $closedproperties=Property::where('status','Closed')->orderBy('id','desc')->paginate(10);
      
      
        $orders=Investments::where(['user_id'=>$user->id])->get();
        $propertytypes1= Investments::select(DB::raw("sum(investment_amount) as investment_amount"))->where(['user_id'=>$user->id,'property_type_id'=>'1','status'=>'Approved'])
        ->first();
       $propertytypes2= Investments::select(DB::raw("sum(investment_amount) as investment_amount"))->where(['user_id'=>$user->id,'property_type_id'=>'2','status'=>'Approved'])
        ->first();
       $propertytypes3= Investments::select(DB::raw("sum(investment_amount) as investment_amount"))->where(['user_id'=>$user->id,'property_type_id'=>'3','status'=>'Approved'])
        ->first();    
       $propertytypes4= Investments::select(DB::raw("sum(investment_amount) as investment_amount"))->where(['user_id'=>$user->id,'property_type_id'=>'4','status'=>'Approved'])
        ->first(); 
       $contruction=$propertytypes1->investment_amount;
       $cashflow=$propertytypes2->investment_amount;
       $land=$propertytypes3->investment_amount;
       $multifamily=$propertytypes4->investment_amount;
     
      // echo $cashflow; exit;
        $activeOrder=Investments::where(['user_id'=>$user->id,'status'=>"Approved"])->get();
        
        //  $properties=Property::orderBy('id','desc')->paginate(10);
        $settings=Setting::first();
        $websiteLang=ManageText::all();
        
        $property_type_count=Investments::join('property_types', 'property_types.id', '=', 'investments.property_type_id')
        ->select(DB::raw("property_types.type as type ,COUNT(*) as count,sum(investment_amount) as investment_amount,property_types.color"))
        
        ->where('investments.status','Approved')->where('investments.user_id',$user->id)
       
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
          // $data_color=json_encode(rgba(255,0,0,1),rgba(255,0,0,1),rgba(255,0,0,1),rgba(255,0,0,1));
      }
     // print_r($data_type); exit;
        return view('user.profile.property.index',compact('total_sum','contruction','cashflow','land','multifamily','data_type','data_amount','property_type_count','closedproperties','activeproperties','orders','propertytypes1','propertytypes2','propertytypes3','propertytypes4','activeOrder','settings','websiteLang'));
    }
    
      public function investnow()
    {
        Paginator::useBootstrap();
        $user=Auth::guard('web')->user();
      //  $propertyTypeslist=PropertyType::where('status',1)->get();
       $properties=Property::where('status','Open')->orwhere('status','Fully Funded')->orderBy('id','desc')->paginate(10);
     //  $properties=Investments::where('status','open')->orderBy('id','desc')->paginate(10);
      
       $closedproperties=Investments::where('status','manage')->orderBy('id','desc')->paginate(10);
      
      
        $orders=Investments::where(['user_id'=>$user->id])->get();
        $propertyTypes=PropertyType::where('status',1)->orderBy('type','asc')->get();
        
       //print_r($propertytypes); exit;
        $activeOrder=Investments::where(['user_id'=>$user->id,'status'=>"Approved"])->get();
        //  $properties=Property::orderBy('id','desc')->paginate(10);
        $settings=Setting::first();
        $websiteLang=ManageText::all();
        $cities=City::where('status',1)->orderBy('name','asc')->get();
        $states=CountryState::where('status',1)->orderBy('name','asc')->get();
         //print_r($properties); exit;
        return view('user.profile.property.investnow',compact('cities','states','propertyTypes','closedproperties','properties','orders','activeOrder','settings','websiteLang'));
    }


      public function investprogress($id)
    {
        Paginator::useBootstrap();
        $user=Auth::guard('web')->user();
       // $propertyDocuments=PropertyDocument::where('user_id',$user->id)->get();
       $myinvestments=Investments::where(['user_id'=>$user->id,'property_id'=>$id,'status'=>"Approved"])->first();
      // print_r($myinvestments); exit;
        $propertyDocuments = PropertyDocument::join('properties', 'properties.id', '=', 'property_documents.property_id')
              //->join('investments', 'investments.property_id', '=', 'property_documents.property_id')
               ->join('property_types', 'property_types.id', '=', 'properties.property_type_id')
            ->where('properties.id', $id)
            ->where('property_documents.doc_name','!=', "Fund Transfer Documents")
            
            ->get(['property_documents.*', 'properties.min_investment','property_types.type']);
        
      // print_r($propertyDocuments); exit;
     $properties=Property::where('id',$id)->orderBy('id','desc')->first();
      
      
        $settings=Setting::first();
        $websiteLang=ManageText::all();
         //print_r($properties); exit;
        return view('user.profile.property.investprogress',compact('myinvestments','propertyDocuments','properties','settings','websiteLang'));
    }

   public function investprogress2($id)
    {
        Paginator::useBootstrap();
        $user=Auth::guard('web')->user();
       // $propertyDocuments=PropertyDocument::where('user_id',$user->id)->get();
       
        $propertyDocuments = PropertyDocument::join('properties', 'properties.id', '=', 'property_documents.property_id')
              //->join('investments', 'investments.property_id', '=', 'property_documents.property_id')
               ->join('property_types', 'property_types.id', '=', 'properties.property_type_id')
            ->where('properties.id', $id)
            
            ->get(['property_documents.*', 'properties.min_investment','property_types.type']);
        
      // print_r($propertyDocuments); exit;
     $properties=Property::where('id',$id)->orderBy('id','desc')->first();
      
      
        $settings=Setting::first();
        $websiteLang=ManageText::all();
         //print_r($properties); exit;
        return view('user.profile.property.investprogress2',compact('propertyDocuments','properties','settings','websiteLang'));
    }
    
      public function investupdate2($id)
    {
        Paginator::useBootstrap();
        $user=Auth::guard('web')->user();
       // $propertyDocuments=PropertyDocument::where('user_id',$user->id)->get();
       
        $propertyDocuments = PropertyDocument::join('properties', 'properties.id', '=', 'property_documents.property_id')
              //->join('investments', 'investments.property_id', '=', 'property_documents.property_id')
               ->join('property_types', 'property_types.id', '=', 'properties.property_type_id')
            ->where('properties.id', $id)
            
            ->get(['property_documents.*', 'properties.min_investment','property_types.type']);
        
     $investment=Investments::where('id',$id)->first();
     $properties=Property::where('id',$investment->property_id)->orderBy('id','desc')->first();
      
      
        $settings=Setting::first();
        $websiteLang=ManageText::all();
         //print_r($properties); exit;
        return view('user.profile.property.investprogress2',compact('investment','propertyDocuments','properties','settings','websiteLang'));
    }
    
     public function investprogress3(Request $request)
    {
        
         $valid_lang=ValidationText::all();
        $rules = [
            'min_amount'=>'required|integer|min:25000,lte:cash',
       
        ];
        $customMessages = [
            'min_amount.required' => "Please enter minimum investment $25000",
            
        ];
        $this->validate($request, $rules, $customMessages);
        
        $property_id=$request->property_id;
         $investment_id=$request->investment_id;
        $min_amount=$request->min_amount;
        Paginator::useBootstrap();
        $user=Auth::guard('web')->user();
        $properties=Property::where('id',$property_id)->orderBy('id','desc')->first();
        $settings=Setting::first();
        $websiteLang=ManageText::all();
        
          $propertyDocuments = PropertyDocument::join('properties', 'properties.id', '=', 'property_documents.property_id')
              //->join('investments', 'investments.property_id', '=', 'property_documents.property_id')
               ->join('property_types', 'property_types.id', '=', 'properties.property_type_id')
            ->where('properties.id', $property_id)
            ->where('property_documents.doc_name', "Fund Transfer Documents")
            
            ->get(['property_documents.*', 'properties.min_investment','property_types.type']);
            
             
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','create')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

        
        return view('user.profile.property.investprogress3',compact('propertyDocuments','property_id','investment_id','min_amount','settings','websiteLang','properties'))->with($notification);
    }


    
    
      public function addinvestment(Request $request)
    {
        
         
        $user=Auth::guard('web')->user();
        $today= date('Y-m-d'); 
      
         $setting=Setting::first();
        // print_r($setting); exit;
     
       $investment_id=$request->investment_id; 
        $property_type=Property::where('id',$request->property_id)->first();
        $property_type_id=$property_type->property_type_id;
       
     
        $data['user_id'] = $user->id;
        $data['property_id'] = $request->property_id;
        $data['investment_amount'] = $request->min_amount;
        $data['property_type_id'] = $property_type_id;
        $data['invested_date'] = $today;
        
        $data['status'] = "Pending";
        // $data = $request->all(); 
      
       $investment= Investments::where('property_id',$request->property_id)->where('user_id',$user->id)->get();
      if(count($investment) ==0){
      
        $property1=Investments::updateOrCreate(['id' => $investment_id], $data);  
      
        MailHelper::setMailConfig();
        $template=EmailTemplate::where('id',6)->first();
        $message=$template->description;
        $subject=$template->subject;
        $message=str_replace('{{user_name}}',$user->name,$message);
        $message=str_replace('{{property_name}}',$property_type->title,$message);
        $message=str_replace('{{amount}}',$request->min_amount,$message);
        Mail::to($setting->email)->send(new PaymentAccept($message,$subject));
      //  Mail::to($user->email)->send(new PaymentAccept($message,$subject));
        
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','payment_accept')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');
         return redirect()->route('user.pendinginvestments');
      }else{
         $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','payment_accept')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');
         return redirect()->route('user.pendinginvestments');
      }
        // return redirect()->route('user.MyInvestments')->withInput(['tab'=>'profile7']);;
       //return back()->withInput(['tab'=>'kt_tabs_7_1']);

    }


      public function pastoffering()
    {
        Paginator::useBootstrap();
        $user=Auth::guard('web')->user();
      // $properties=Property::where('user_id',$user->id)->orderBy('id','desc')->paginate(10);
       $properties=Investments::where('user_id',$user->id)->where('status','Approved')->orderBy('id','desc')->paginate(10);
      
       $closedproperties=Property::where('status','Closed')->orderBy('id','desc')->paginate(10);
     // print_r($closedproperties); exit;
        $propertyTypes=PropertyType::where('status',1)->get();
        $orders=Investments::where(['user_id'=>$user->id])->get();
        
       //print_r($propertytypes); exit;
        $activeOrder=Investments::where(['user_id'=>$user->id,'status'=>"open"])->get();
        //  $properties=Property::orderBy('id','desc')->paginate(10);
        
         $cities=City::where('status',1)->orderBy('name','asc')->get();
        $states=CountryState::where('status',1)->orderBy('name','asc')->get();
        $settings=Setting::first();
        $websiteLang=ManageText::all();
         //print_r($properties); exit;
        return view('user.profile.property.pastoffering',compact('states','cities','propertyTypes','closedproperties','properties','orders','activeOrder','settings','websiteLang'));
    }

   public function viewupdates($id)
    {
        Paginator::useBootstrap();
        $user=Auth::guard('web')->user();
        $updates=Updates::find($id);
        
        $today = date('Y-m-d');
        $futureDate = "2022-09-30";
        $difference = strtotime($futureDate) - strtotime($today);
        $days = abs($difference/(60 * 60)/24);
      
        $websiteLang=ManageText::all();
        $settings=Setting::first();
        return view('user.profile.property.update-details',compact('updates','settings','websiteLang'));
       
    }

     public function propertyDetails($id)
    {
        Paginator::useBootstrap();
        $user=Auth::guard('web')->user();
         $properties=Property::where('id',$id)->orderBy('id','desc')->first();
        $slider_image=PropertyImage::where('property_id',$id)->get();
         $propertyDocuments = PropertyDocument::where('property_id',$id)->get();
         $propertyVideos =PropertyVideo::where('property_id',$id)->get();
        $settings=Setting::first();
        $websiteLang=ManageText::all();
        return view('user.profile.property.propertyDetails',compact('properties','propertyVideos','settings','slider_image','websiteLang','propertyDocuments'));
    }


    public function accreditationstore(Request $request)
    {

        $user=Auth::guard('web')->user();
       
           // multiple documents
        if($request->file('accreditation_file')){
            $files=$request->accreditation_file;
            foreach($files as $file){
                echo "sdfds"; exit;
                if($file != null){
                    $propertyDocument=new PropertyDocument();
             
            $file_ext=$file->getClientOriginalExtension();
            $orignal_name=  $file->getClientOriginalName();
            //   $file_name= $orignal_name.'-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$file_ext;
             $file_name= $orignal_name;
            $file_path=$file_name;
            $file->move(public_path().'/uploads/custom-documents/',$file_path);
             $propertyDocument->property_id=$property->id;
             $propertyDocument->doc_name="Accreditation Documents";
            $propertyDocument->document=$file_path;
            $propertyDocument->save();

        }
   }
     }
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','create')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

      //  return redirect()->route('admin.userinvestments.index')->with($notification);

    }

    public function documentslist()
    {
        
       $user=Auth::guard('web')->user();
       // $propertyDocuments=PropertyDocument::where('user_id',$user->id)->get();
       
        $subscriptionDocuments = PropertyDocument::join('properties', 'properties.id', '=', 'property_documents.property_id')
              ->join('investments', 'investments.property_id', '=', 'property_documents.property_id')
               ->join('property_types', 'property_types.id', '=', 'properties.property_type_id')
            ->where('investments.user_id', $user->id)
            ->where('property_documents.doc_name', "Subscription Documents")
            
            ->get(['property_documents.*', 'properties.title','property_types.type','investments.status']);
        
         $offeringDocuments = PropertyDocument::join('properties', 'properties.id', '=', 'property_documents.property_id')
              ->join('investments', 'investments.property_id', '=', 'property_documents.property_id')
               ->join('property_types', 'property_types.id', '=', 'properties.property_type_id')
            ->where('investments.user_id', $user->id)
            ->where('property_documents.doc_name', "Offering Documents")
            
            ->get(['property_documents.*', 'properties.title','property_types.type','investments.status']);
            
        $investmentDocuments = PropertyDocument::join('investments', 'investments.id', '=', 'property_documents.investment_id')
               ->join('properties', 'properties.id', '=', 'investments.property_id')
            ->where('investments.user_id', $user->id)
            ->where('property_documents.doc_name', "Investment Documents")
            
            ->get(['property_documents.*', 'properties.title','investments.status']);
            
         $taxDocuments = PropertyDocument::where('property_documents.user_id', $user->id)
            ->where('property_documents.doc_name', "Tax Documents")
            
            ->get(['property_documents.*']);
        
         $accredationDocuments = PropertyDocument::join('properties', 'properties.id', '=', 'property_documents.property_id')
              ->join('investments', 'investments.property_id', '=', 'property_documents.property_id')
               ->join('property_types', 'property_types.id', '=', 'properties.property_type_id')
            ->where('investments.user_id', $user->id)
            ->where('property_documents.doc_name', "Accreditation Documents")
            
            ->get(['property_documents.*', 'properties.title','property_types.type','investments.status']);
         
            
         $updates = Updates::join('properties', 'properties.id', '=', 'updates.property_id')
              ->join('investments', 'investments.property_id', '=', 'updates.property_id')
              
            ->where('investments.user_id', $user->id)
           
            ->get(['updates.*', 'properties.title','properties.thumbnail_image']);
            
     //   print_r($propertyDocuments); exit;
        $cities=City::where('status',1)->get();
        $purposes=PropertyPurpose::where('status',1)->get();
        $aminities=Aminity::where('status',1)->get();
        $nearest_locatoins=NearestLocation::where('status',1)->get();
        $websiteLang=ManageText::all();
          $settings=Setting::first();
         
        return view('user.profile.property.documents',compact('accredationDocuments','taxDocuments','investmentDocuments','subscriptionDocuments','offeringDocuments','updates','cities','purposes','aminities','nearest_locatoins','settings','websiteLang'));
    }
    
    public function showdocuments($id)
    {
        echo "sdsdsd"; exit;
        $filepath= public_path() . "/uploads/custom-documents/".$id;
        return response()->view($filepath);
        
      }
    public function userupdates()
    {
       
        $updates=Updates::join('properties', 'properties.id', '=', 'updates.property_id')->orderBy('id','desc')->select('updates.*','properties.title')->get();
      
            $websiteLang=ManageText::all();
          $settings=Setting::first();
        return view('user.profile.property.updates',compact('updates','settings','websiteLang'));
    }
    public function testingcreate3()
    {
       
        $propertyTypes=PropertyType::where('status',1)->get();
        $cities=City::where('status',1)->get();
        $purposes=PropertyPurpose::where('status',1)->get();
        $aminities=Aminity::where('status',1)->get();
        $nearest_locatoins=NearestLocation::where('status',1)->get();
        $websiteLang=ManageText::all();
          $settings=Setting::first();
        return view('user.profile.property.distributions',compact('propertyTypes','cities','purposes','aminities','nearest_locatoins','settings','websiteLang'));
    }
 public function testingcreate4()
    {
       
        $propertyTypes=PropertyType::where('status',1)->get();
        $cities=City::where('status',1)->get();
        $purposes=PropertyPurpose::where('status',1)->get();
        $aminities=Aminity::where('status',1)->get();
        $nearest_locatoins=NearestLocation::where('status',1)->get();
        $websiteLang=ManageText::all();
          $settings=Setting::first();
        return view('user.profile.property.investnow',compact('propertyTypes','cities','purposes','aminities','nearest_locatoins','settings','websiteLang'));
    }

    public function downloadListingFile($id,$file){
        $filepath= public_path() . "/uploads/custom-documents/".$id.'/'.$file;
        return response()->download($filepath);
    }
    
      public function alldownloadListingFile($id){
          
           $propertyDocuments = Property::find($id);
         
         $zip = new ZipArchive;

        $fileName = $propertyDocuments->title.'_Allfiles.zip';

        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
        {
            // Folder files to zip and download
            // files folder must be existing to your public folder
            $files = File::files(public_path('uploads/custom-documents/'.$id));

            // loop the files result
            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }

            $zip->close();
        }

        // Download the generated zip
        return response()->download(public_path($fileName));
    }
    
  
   

    public function create()
    {
      
        $user=Auth::guard('web')->user();
        $order=Order::where(['user_id'=>$user->id,'status'=>1])->first();
        if(!$order){
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','something')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'error');

            return redirect()->route('user.dashboard')->with($notification);
        }


        $isExpired=false;
        if($order->expired_date != null){
            if(date('Y-m-d') > $order->expired_date){
                $isExpired=true;
            }
        }

        if($isExpired==true){
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','expired_package')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'error');

            return redirect()->route('user.dashboard')->with($notification);
        }

        $expired_date= $order->expired_date==null ? -1 : $order->expired_date;

        $propertyTypes=PropertyType::where('status',1)->get();
        $cities=City::where('status',1)->get();
        $purposes=PropertyPurpose::where('status',1)->get();
        $aminities=Aminity::where('status',1)->get();
        $nearest_locatoins=NearestLocation::where('status',1)->get();
        $package=Package::find($order->package_id);
        if($package){
            if($package->number_of_property==-1){
                $existFeaturedProperty=Property::where(['user_id'=>$user->id,'is_featured'=>1])->count();
                $existTopProperty=Property::where(['user_id'=>$user->id,'top_property'=>1])->count();
                $existUrgentProperty=Property::where(['user_id'=>$user->id,'urgent_property'=>1])->count();

                $websiteLang=ManageText::all();
                return view('user.profile.property.create',compact('propertyTypes','cities','purposes','aminities','nearest_locatoins','expired_date','package','existFeaturedProperty','existTopProperty','existUrgentProperty','websiteLang'));
            }else if($package->number_of_property > 0){
                $existFeaturedProperty=Property::where(['user_id'=>$user->id,'is_featured'=>1])->count();
                $existTopProperty=Property::where(['user_id'=>$user->id,'top_property'=>1])->count();
                $existUrgentProperty=Property::where(['user_id'=>$user->id,'urgent_property'=>1])->count();

                $existProperty=Property::where(['user_id'=>$user->id])->count();
                if($package->number_of_property > $existProperty){
                    $websiteLang=ManageText::all();
                    return view('user.profile.property.create',compact('propertyTypes','cities','purposes','aminities','nearest_locatoins','expired_date','package','existFeaturedProperty','existTopProperty','existUrgentProperty','websiteLang'));
                }else{
                    $notify_lang=NotificationText::all();
                    $notification=$notify_lang->where('lang_key','max_property')->first()->custom_text;
                    $notification=array('messege'=>$notification,'alert-type'=>'error');

                    return redirect()->route('user.dashboard')->with($notification);
                }

            }else{
                $notify_lang=NotificationText::all();
                $notification=$notify_lang->where('lang_key','something')->first()->custom_text;
                $notification=array('messege'=>$notification,'alert-type'=>'error');

                return redirect()->route('user.dashboard')->with($notification);
            }
        }else{
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','something')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'error');

            return redirect()->route('user.dashboard')->with($notification);
        }

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
            'title'=>'required|unique:properties',
            'slug'=>'required|unique:properties',
            'property_type'=>'required',
            'city'=>'required',
            'address'=>'required',
            'email'=>'required|email',
            'purpose'=>'required',
            'price'=>'required|numeric',
            'area'=>'required|numeric',
            'unit'=>'required|numeric',
            'room'=>'required|numeric',
            'bedroom'=>'required|numeric',
            'floor'=>'required|numeric',
            "banner_image"    => "required|file",
            'thumbnail_image'=>'required|file',
            "slider_images"    => "required",
            'description'=>'required',
            "pdf_file" => "mimes:pdf|max:10000"
        ];
        $customMessages = [
            'title.required' => $valid_lang->where('lang_key','title')->first()->custom_text,
            'title.unique' => $valid_lang->where('lang_key','unique_title')->first()->custom_text,
            'slug.required' => $valid_lang->where('lang_key','slug')->first()->custom_text,
            'slug.unique' => $valid_lang->where('lang_key','unique_slug')->first()->custom_text,
            'property_type.required' => $valid_lang->where('lang_key','property_type')->first()->custom_text,
            'city.required' => $valid_lang->where('lang_key','city')->first()->custom_text,
            'address.required' => $valid_lang->where('lang_key','address')->first()->custom_text,
            'email.required' => $valid_lang->where('lang_key','email')->first()->custom_text,
            'purpose.required' => $valid_lang->where('lang_key','purpose')->first()->custom_text,
            'price.required' => $valid_lang->where('lang_key','price')->first()->custom_text,
            'area.required' => $valid_lang->where('lang_key','area')->first()->custom_text,
            'unit.required' => $valid_lang->where('lang_key','unit')->first()->custom_text,
            'room.required' => $valid_lang->where('lang_key','room')->first()->custom_text,
            'bedroom.required' => $valid_lang->where('lang_key','bedroom')->first()->custom_text,
            'floor.required' => $valid_lang->where('lang_key','floor')->first()->custom_text,
            'banner_image.required' => $valid_lang->where('lang_key','banner_img')->first()->custom_text,
            'thumbnail_image.required' => $valid_lang->where('lang_key','thumb_img')->first()->custom_text,
            'slider_images.required' => $valid_lang->where('lang_key','slider_img')->first()->custom_text,
            'description.required' => $valid_lang->where('lang_key','des')->first()->custom_text,
        ];
        $this->validate($request, $rules, $customMessages);


        $video_link='';
        if(preg_match('/https:\/\/www\.youtube\.com\/watch\?v=[^&]+/', $request->video_link)) {
            $video_link=$request->video_link;
        }

        $property=new Property();

        $user=Auth::guard('web')->user();
        $property->user_type=0;
        $property->user_id=$user->id;
        $property->title=$request->title;
        $property->expired_date=$request->expired_date==-1 ? null : $request->expired_date;
        $property->slug=$request->slug;
        $property->property_type_id=$request->property_type;
        $property->city_id=$request->city;
        $property->address=$request->address;
        $property->phone=$request->phone;
        $property->email=$request->email;
        $property->website=$request->website;
        $property->property_purpose_id=$request->purpose;
        $property->price=$request->price;
        $property->period=$request->period ? $request->period : null;
        $property->area=$request->area;
        $property->number_of_unit=$request->unit;
        $property->number_of_room=$request->room;
        $property->number_of_bedroom=$request->bedroom;
        $property->number_of_bathroom=$request->bathroom;
        $property->number_of_floor=$request->floor;
        $property->number_of_kitchen=$request->kitchen;
        $property->number_of_parking=$request->parking;
        $property->video_link=$video_link;
        $property->google_map_embed_code=$request->google_map_embed_code;
        $property->description=$request->description;
        $property->status=0;
        $property->is_featured=$request->featured ? $request->featured : 0;
        $property->urgent_property=$request->urgent_property ? $request->urgent_property : 0;
        $property->top_property=$request->top_property ? $request->top_property : 0;
        $property->seo_title=$request->seo_title ? $request->seo_title : $request->title;
        $property->seo_description=$request->seo_description ? $request->seo_description : $request->title;

        // pdf file
        if($request->file('pdf_file')){
            $file=$request->pdf_file;
            $file_ext=$file->getClientOriginalExtension();
            $file_name= 'property-file-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$file_ext;
            $file_path=$file_name;
            $file->move(public_path().'/uploads/custom-images/',$file_path);

            $property->file=$file_path;
        }

        //thumbnail image
        if($request->file('thumbnail_image')){
            $thumbnail_image=$request->thumbnail_image;
            $thumbnail_extention=$thumbnail_image->getClientOriginalExtension();
            $thumb_name= 'property-thumb-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$thumbnail_extention;
            $thumb_path='uploads/custom-images/'.$thumb_name;

            Image::make($thumbnail_image)
                ->save(public_path().'/'.$thumb_path);
                $property->thumbnail_image=$thumb_path;

        }


        // banner image image
        if($request->file('banner_image')){
            $banner_image=$request->banner_image;
            $banner_ext=$banner_image->getClientOriginalExtension();
            $banner_name= 'listing-banner-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$banner_ext;
            $banner_path='uploads/custom-images/'.$banner_name;
            Image::make($banner_image)
                ->save(public_path().'/'.$banner_path);
                $property->banner_image=$banner_path;

        }
        $property->save();
        // property end

         // insert aminity
         if($request->aminities){
            foreach($request->aminities as $amnty){
                $aminity= new PropertyAminity();
                $aminity->property_id=$property->id;
                $aminity->aminity_id=$amnty;
                $aminity->save();
            }
        }

        // insert nearest place
        $exist_location=[];
        if($request->nearest_locations){
            foreach($request->nearest_locations as $index => $location){
                if($location){
                    if($request->distances[$index]){
                        if(!in_array($location, $exist_location)){
                            $nearest_location= new PropertyNearestLocation();
                            $nearest_location->property_id=$property->id;
                            $nearest_location->nearest_location_id=$location;
                            $nearest_location->distance=$request->distances[$index];
                            $nearest_location->save();
                        }
                        $exist_location[]=$location;

                    }
                }
            }
        }


        // slider image
        if($request->file('slider_images')){
            $images=$request->slider_images;
            foreach($images as $image){
                if($image != null){
                    $propertyImage=new PropertyImage();
                    $slider_ext=$image->getClientOriginalExtension();
                    // for small image
                    $slider_image= 'property-slide-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$slider_ext;
                    $slider_path='uploads/custom-images/'.$slider_image;

                    Image::make($image)
                        ->save(public_path().'/'.$slider_path);

                    $propertyImage->image=$slider_path;
                    $propertyImage->property_id=$property->id;
                    $propertyImage->save();

                }
            }
        }

        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','create')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

        return redirect()->route('user.my.properties')->with($notification);


    }



    public function edit($id)
    {
        $user=Auth::guard('web')->user();
        $property=Property::find($id);
        if(!$property){
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','something')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'error');

            return redirect()->route('user.my.properties')->with($notification);
        }
        if($property->user_id !=$user->id){
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','something')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'error');

            return redirect()->route('user.my.properties')->with($notification);
        }


        $propertyTypes=PropertyType::where('status',1)->get();
        $cities=City::where('status',1)->get();
        $purposes=PropertyPurpose::where('status',1)->get();
        $aminities=Aminity::where('status',1)->get();
        $nearest_locatoins=NearestLocation::where('status',1)->get();


        $order=Order::where(['user_id'=>$user->id,'status'=>1])->first();
        if(!$order){
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','something')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'error');

            return redirect()->route('user.dashboard')->with($notification);
        }

        $package=Package::find($order->package_id);
        $existFeaturedProperty=Property::where(['user_id'=>$user->id,'is_featured'=>1])->count();
        $existTopProperty=Property::where(['user_id'=>$user->id,'top_property'=>1])->count();
        $existUrgentProperty=Property::where(['user_id'=>$user->id,'urgent_property'=>1])->count();

        $websiteLang=ManageText::all();
        return view('user.profile.property.edit',compact('propertyTypes','cities','purposes','aminities','nearest_locatoins','property','package','existFeaturedProperty','existTopProperty','existUrgentProperty','websiteLang'));
    }


    public function update(Request $request,$id)
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

        $property=Property::find($id);
        $valid_lang=ValidationText::all();

        $rules = [
            'title'=>'required|unique:properties,title,'.$property->id,
            'slug'=>'required|unique:properties,slug,'.$property->id,
            'property_type'=>'required',
            'city'=>'required',
            'address'=>'required',
            'email'=>'required|email',
            'purpose'=>'required',
            'price'=>'required|numeric',
            'area'=>'required|numeric',
            'unit'=>'required|numeric',
            'room'=>'required|numeric',
            'bedroom'=>'required|numeric',
            'bathroom'=>'required|numeric',
            'floor'=>'required|numeric',
            'description'=>'required',
            "pdf_file" => "mimes:pdf|max:10000"
        ];


        $customMessages = [
            'title.required' => $valid_lang->where('lang_key','title')->first()->custom_text,
            'title.unique' => $valid_lang->where('lang_key','unique_title')->first()->custom_text,
            'slug.required' => $valid_lang->where('lang_key','slug')->first()->custom_text,
            'slug.unique' => $valid_lang->where('lang_key','unique_slug')->first()->custom_text,
            'property_type.required' => $valid_lang->where('lang_key','property_type')->first()->custom_text,
            'city.required' => $valid_lang->where('lang_key','city')->first()->custom_text,
            'address.required' => $valid_lang->where('lang_key','address')->first()->custom_text,
            'email.required' => $valid_lang->where('lang_key','email')->first()->custom_text,
            'purpose.required' => $valid_lang->where('lang_key','purpose')->first()->custom_text,
            'price.required' => $valid_lang->where('lang_key','price')->first()->custom_text,
            'area.required' => $valid_lang->where('lang_key','area')->first()->custom_text,
            'unit.required' => $valid_lang->where('lang_key','unit')->first()->custom_text,
            'room.required' => $valid_lang->where('lang_key','room')->first()->custom_text,
            'bedroom.required' => $valid_lang->where('lang_key','bedroom')->first()->custom_text,
            'floor.required' => $valid_lang->where('lang_key','floor')->first()->custom_text,
            'banner_image.required' => $valid_lang->where('lang_key','banner_img')->first()->custom_text,
            'thumbnail_image.required' => $valid_lang->where('lang_key','thumb_img')->first()->custom_text,
            'slider_images.required' => $valid_lang->where('lang_key','slider_img')->first()->custom_text,
            'description.required' => $valid_lang->where('lang_key','des')->first()->custom_text,
        ];


        $this->validate($request, $rules, $customMessages);

        $video_link='';
        if(preg_match('/https:\/\/www\.youtube\.com\/watch\?v=[^&]+/', $request->video_link)) {
            $video_link=$request->video_link;
        }
        $user=Auth::guard('web')->user();
        $property->title=$request->title;
        $property->slug=$request->slug;
        $property->property_type_id=$request->property_type;
        $property->city_id=$request->city;
        $property->address=$request->address;
        $property->phone=$request->phone;
        $property->email=$request->email;
        $property->website=$request->website;
        $property->property_purpose_id=$request->purpose;
        $property->price=$request->price;
        $property->period=$request->period ? $request->period : null;
        $property->area=$request->area;
        $property->number_of_unit=$request->unit;
        $property->number_of_room=$request->room;
        $property->number_of_bedroom=$request->bedroom;
        $property->number_of_bathroom=$request->bathroom;
        $property->number_of_floor=$request->floor;
        $property->number_of_kitchen=$request->kitchen;
        $property->number_of_parking=$request->parking;
        $property->video_link=$video_link;
        $property->google_map_embed_code=$request->google_map_embed_code;
        $property->description=$request->description;
        $property->is_featured=$request->featured ? $request->featured : 0;
        $property->urgent_property=$request->urgent_property ? $request->urgent_property : 0;
        $property->top_property=$request->top_property ? $request->top_property : 0;
        $property->seo_title=$request->seo_title ? $request->seo_title : $request->title;
        $property->seo_description=$request->seo_description ? $request->seo_description : $request->title;

        // pdf file
        if($request->file('pdf_file')){
            $file=$request->pdf_file;
            $old_file=$property->file;
            $file_ext=$file->getClientOriginalExtension();
            $file_name= 'property-file-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$file_ext;
            $file_path=$file_name;
            $file->move(public_path().'/uploads/custom-images/',$file_path);
            $property->file=$file_path;
            $property->save();

            if($old_file){
                if(File::exists(public_path().'/'."uploads/custom-images/".$old_file)) unlink(public_path().'/'."uploads/custom-images/".$old_file);

            }
        }


        //thumbnail image
        if($request->file('thumbnail_image')){
            $old_thumbnail=$property->thumbnail_image;
            $thumbnail_image=$request->thumbnail_image;
            $thumbnail_extention=$thumbnail_image->getClientOriginalExtension();
            $thumb_name= 'property-thumb-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$thumbnail_extention;
            $thumb_path='uploads/custom-images/'.$thumb_name;
            Image::make($thumbnail_image)
                ->save(public_path().'/'.$thumb_path);

            $property->thumbnail_image=$thumb_path;
            $property->save();
            if(File::exists(public_path().'/'.$old_thumbnail)) unlink(public_path().'/'.$old_thumbnail);
        }

        // banner image image
        if($request->file('banner_image')){
            $old_banner=$property->banner_image;
            $banner_image=$request->banner_image;
            $banner_ext=$banner_image->getClientOriginalExtension();
            $banner_name= 'listing-banner-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$banner_ext;
            $banner_path='uploads/custom-images/'.$banner_name;

            Image::make($banner_image)
            ->save(public_path().'/'.$banner_path);


            $property->banner_image=$banner_path;
            $property->save();
            if(File::exists(public_path().'/'.$old_banner)) unlink(public_path().'/'.$old_banner);
        }
        $property->save();
        // property end


        // for aminity
        $old_aminities=$property->propertyAminities;
        if($request->aminities){
            foreach($request->aminities as $amnty){
                $aminity= new PropertyAminity();
                $aminity->property_id=$property->id;
                $aminity->aminity_id=$amnty;
                $aminity->save();
            }

            if($old_aminities->count()>0){
                foreach($old_aminities as $old_aminity){
                    $old_aminity->delete();
                }
            }
        }else{
            if($old_aminities->count()>0){
                foreach($old_aminities as $old_aminity){
                    $old_aminity->delete();
                }
            }
        }



        // insert nearest place
        $old_nearest_locations=$property->propertyNearestLocations;
        $exist_location=[];
        $new_nearest_location=false;
        if($request->nearest_locations){
            foreach($request->nearest_locations as $index => $location){
                if($location){
                    if($request->distances[$index]){
                        if(!in_array($location, $exist_location)){
                            $nearest_location= new PropertyNearestLocation();
                            $nearest_location->property_id=$property->id;
                            $nearest_location->nearest_location_id=$location;
                            $nearest_location->distance=$request->distances[$index];
                            $nearest_location->save();
                            $new_nearest_location=true;
                        }
                        $exist_location[]=$location;

                    }
                }
            }

            if($new_nearest_location){
                if($old_nearest_locations->count() > 0){
                    foreach($old_nearest_locations as $old_location){
                        $old_location->delete();
                    }
                }
            }
        }else{
            if($old_nearest_locations->count() > 0){
                foreach($old_nearest_locations as $old_location){
                    $old_location->delete();
                }
            }

        }

        // slider image
        if($request->file('slider_images')){
            $images=$request->slider_images;
            foreach($images as $image){
                if($image != null){
                    $propertyImage=new PropertyImage();
                    $slider_ext=$image->getClientOriginalExtension();
                    // for small image
                    $slider_image= 'property-slide-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$slider_ext;
                    $slider_path='uploads/custom-images/'.$slider_image;
                    Image::make($image)
                        ->save(public_path().'/'.$slider_path);

                    $propertyImage->image=$slider_path;
                    $propertyImage->property_id=$property->id;
                    $propertyImage->save();

                }
            }
        }

        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','update')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');

        return redirect()->route('user.my.properties')->with($notification);
    }

    public function destroy($id)
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

        $property=Property::find($id);
        $old_thumbnail=$property->thumbnail_image;
        $old_banner=$property->banner_image;
        $old_pdf=$property->file;
        PropertyAminity::where('property_id',$property->id)->delete();
        WishList::where('property_id',$property->id)->delete();
        PropertyReview::where('property_id',$property->id)->delete();
        PropertyNearestLocation::where('property_id',$property->id)->delete();

        foreach($property->propertyImages as $image){
            if(File::exists(public_path().'/'.$image->image)) unlink(public_path().'/'.$image->image);
        }
        PropertyImage::where('property_id',$property->id)->delete();


        if($old_pdf){
            if(File::exists(public_path().'/'.'uploads/custom-images/'.$old_pdf)) unlink(public_path().'/'.'uploads/custom-images/'.$old_pdf);
        }
        if(File::exists(public_path().'/'.$old_thumbnail)) unlink(public_path().'/'.$old_thumbnail);
        if(File::exists(public_path().'/'.$old_banner)) unlink(public_path().'/'.$old_banner);

        $property->delete();
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','delete')->first()->custom_text;
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('user.my.properties')->with($notification);
    }



    public function propertySliderImage($id){
        $image=PropertyImage::find($id);
        $old_image=$image->image;
        $image->delete();
        if(File::exists(public_path().'/'.$old_image)) unlink(public_path().'/'.$old_image);

        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','delete')->first()->custom_text;
        return response()->json(['success'=>$notification]);
    }

    public function deletePdfFile($id){

        $property=Property::find($id);
        $old_file= $property->file;
        $property->file=null;
        $property->save();
        $old_file= "uploads/custom-images/".$old_file;
        if(File::exists(public_path().'/'.$old_file)) unlink(public_path().'/'.$old_file);
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','delete')->first()->custom_text;
        return response()->json(['success'=>$notification]);
    }


    public function existNearestLocation($id){
        $nearest_location=PropertyNearestLocation::find($id);
        $nearest_location->delete();
        $notify_lang=NotificationText::all();
        $notification=$notify_lang->where('lang_key','delete')->first()->custom_text;
        return response()->json(['success'=>$notification]);
    }

    public function existSliderImage($id){
        $count=PropertyImage::where('property_id',$id)->count();
        return $count;
    }

    public function findExistNearestLocation($id){
        $location=PropertyNearestLocation::where(['property_id'=>$id])->count();
        return $location;
    }
}
