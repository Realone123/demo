<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\HomeSection;
use App\Blog;
use App\Testimonial;
use App\About;
use App\AboutSection;
use App\Partner;
use App\BlogCategory;
use App\ContactUs;
use App\Setting;
use App\BlogComment;
use App\Rules\Captcha;
use App\ContactInformation;
use App\Propertyimportantdates;
use App\Investments;
use App\Location;
use App\Listing;
use App\Day;
use App\Aminity;
use App\Wishlist;
use App\ListingReview;
use App\Subscribe;
use App\ConditionPrivacy;
use App\EmailTemplate;
use App\SeoText;
use App\BannerImage;
use App\NotificationText;
use App\ValidationText;
use App\ManageText;
use App\Navigation;
use App\CustomPage;
use App\PropertyImage;
use Storage;
use Str;
use Mail;
use Session;
use App\Mail\SubscribeUsNotification;
use Auth;
use App\Order;
use App\CustomPaginator;
use App\Admin;
use App\User;
use App\Helpers\MailHelper;
use App\Overview;
use App\Service;
use App\Faq;
use App\Property;
use App\Package;
use App\PropertyType;
use App\City;
use App\CountryState;

use App\PropertyAminity;
use App\PropertyReview;
use App\PrivacyPolicy;
use DB;
use Schema;
use File;
use Illuminate\Pagination\Paginator;


class HomeController extends Controller
{

    public function index(){
       
         // soriting data
        $paginate_qty=CustomPaginator::where('id',2)->first()->qty;
        // check order type
        $orderBy="desc";
        
        $sliders =Slider::orderBy('id','asc')->where('status',1)->get();
        $aboutUs = About::first();
        $overviews=Overview::where('status',1)->get();
        // $properties=Property::where('status','Open')->orwhere('status','Fully Funded')->where('property_status',1)->orderBy('id',$orderBy)->paginate($paginate_qty);
         $properties=Property::where('property_status',1)->orderBy('status',$orderBy)->paginate($paginate_qty);
            
        $sections=HomeSection::all();
        $services=Service::where('status',1)->get();
        $currency=Setting::first();
        $seo_text=SeoText::find(1);
        $service_bg=BannerImage::find(23);
        $agents=User::where('status',1)->orderBy('id','desc')->get();
        $orders=Order::where(['status'=>1])->get();
        $blogs=Blog::where(['status'=>1,'show_homepage'=>1])->get();
        $default_profile_image=BannerImage::find(15);
        $testimonials=Testimonial::where('status',1)->get();
        $propertyTypes=PropertyType::where('status',1)->orderBy('type','asc')->get();
        $cities=City::where('status',1)->orderBy('name','asc')->get();
        $feature_image=BannerImage::find(23);
        $testimonial_bg=BannerImage::find(25);
        $agent_bg=BannerImage::find(26);
        $websiteLang=ManageText::all();

        return view('user.index',compact('sliders', 'aboutUs',     'blogs','seo_text','sections','currency','overviews','services','default_profile_image','testimonials','properties','agents','orders','feature_image','propertyTypes','cities','websiteLang','testimonial_bg','agent_bg','service_bg'));
    }



    public function aboutUs(){
        $about=About::first();
        $banner_image=BannerImage::find(2);
        $overviews=Overview::where('status',1)->get();
        $partners=Partner::where('status',1)->get();
        $sections=AboutSection::all();
        $seo_text=SeoText::find(3);
        $menus=Navigation::all();
        $websiteLang=ManageText::all();
        return view('user.about-us',compact('about','banner_image','overviews','partners','sections','seo_text','menus','websiteLang'));
    }
     public function howitWorks(){
        $about=About::first();
        $banner_image=BannerImage::find(2);
        $overviews=Overview::where('status',1)->get();
        $partners=Partner::where('status',1)->get();
        $sections=AboutSection::all();
        $seo_text=SeoText::find(3);
        $menus=Navigation::all();
        $websiteLang=ManageText::all();
        return view('user.howitworks',compact('about','banner_image','overviews','partners','sections','seo_text','menus','websiteLang'));
    }

    //  public function faq(){
    //     $about=About::first();
    //     $banner_image=BannerImage::find(2);
    //     $overviews=Overview::where('status',1)->get();
    //     $partners=Partner::where('status',1)->get();
    //     $sections=AboutSection::all();
    //     $seo_text=SeoText::find(3);
    //     $menus=Navigation::all();
    //     $websiteLang=ManageText::all();
    //     return view('user.faq',compact('about','banner_image','overviews','partners','sections','seo_text','menus','websiteLang'));
    // }
    public function blog(){
        Paginator::useBootstrap();
        $banner_image=BannerImage::find(5);
        $paginator=CustomPaginator::where('id',1)->first()->qty;
        $blogs=Blog::where('status',1)->orderBy('id','desc')->paginate($paginator);
        $seo_text=SeoText::find(6);
        $menus=Navigation::all();
        $websiteLang=ManageText::all();
        return view('user.blog.index',compact('banner_image','blogs','seo_text','menus','websiteLang'));
    }

    public function blogDetails($slug){

        $blog=Blog::where(['slug'=>$slug,'status'=>1])->first();
        if($blog){
            $blog->view +=1;
            $blog->save();

            $blogCategories=BlogCategory::where('status',1)->get();
            $popularBlogs=Blog::where('id','!=',$blog->id)->orderBy('view','desc')->get()->take(4);
            $commentSetting=Setting::first();
            $banner_image=BannerImage::find(5);
            $menus=Navigation::all();
            $default_profile_image=BannerImage::find(15);
            $websiteLang=ManageText::all();
            $blogComments = BlogComment::where(['blog_id' => $blog->id, 'status' => 1])->paginate(10);
            return view('user.blog.show',compact('blog','blogCategories','popularBlogs','commentSetting','banner_image','menus','default_profile_image','websiteLang','blogComments'));
        }else{
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','something')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'error');

            return back()->with($notification);
        }

    }


        public function blogCategory($slug,Request $request){
            Paginator::useBootstrap();
            $category=BlogCategory::where(['slug'=>$slug,'status'=>1])->first();
            if(!$category){
                return back();
            }

            $paginator=CustomPaginator::where('id',1)->first()->qty;
            $blogs=Blog::where(['blog_category_id'=>$category->id,'status'=>1])->paginate($paginator);
            $blogs=$blogs->appends($request->all());
            $banner_image=BannerImage::find(5);
            $seo_text=SeoText::find(6);
            $menus=Navigation::all();
            $websiteLang=ManageText::all();
            return view('user.blog.index',compact('blogs','banner_image','menus','seo_text','websiteLang'));
        }

        public function blogSearch(Request $request){
            Paginator::useBootstrap();
            $rules = [
                'search'=>'required',
            ];


            $this->validate($request, $rules);
            $paginator=CustomPaginator::where('id',1)->first()->qty;
            $blogs=Blog::where('title','LIKE','%'.$request->search.'%')->paginate($paginator);
            $blogs=$blogs->appends($request->all());
            $seo_text=SeoText::find(6);
            $banner_image=BannerImage::find(5);
            $menus=Navigation::all();
            $websiteLang=ManageText::all();
            return view('user.blog.index',compact('blogs','seo_text','banner_image','menus','websiteLang'));
        }

        public function blogComment(Request $request,$blogId){

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
                'email'=>'required|email',
                'comment'=>'required',
                'g-recaptcha-response'=>new Captcha()
            ];
            $customMessages = [
                'name.required' => $valid_lang->where('lang_key','name')->first()->custom_text,
                'email.required' => $valid_lang->where('lang_key','email')->first()->custom_text,
                'comment.required' => $valid_lang->where('lang_key','comment')->first()->custom_text,
            ];
            $this->validate($request, $rules, $customMessages);

            $comment=new BlogComment();
            $comment->blog_id=$blogId;
            $comment->name=$request->name;
            $comment->email=$request->email;
            $comment->comment=$request->comment;
            $comment->save();


            $notification=array(
                'messege'=>'Commented Successufully',
                'alert-type'=>'success'
            );

        return back()->with($notification);
    }

    public function faq(){
        $faqs=Faq::where('status',1)->get();
        $banner_image=BannerImage::find(19);
        $faq_image=BannerImage::find(20);

        $seo_text=SeoText::find(8);
        $menus=Navigation::all();

        return view('user.faq',compact('banner_image','faqs','faq_image','seo_text','menus'));

    }

 public function knowledge (){
        $faqs=Faq::where('status',1)->get();
        $banner_image=BannerImage::find(19);
        $faq_image=BannerImage::find(20);

        $seo_text=SeoText::find(8);
        $menus=Navigation::all();

        return view('user.knowledge',compact('banner_image','faqs','faq_image','seo_text','menus'));

    }
   
   public function legal (){
        $faqs=Faq::where('status',1)->get();
        $banner_image=BannerImage::find(19);
        $faq_image=BannerImage::find(20);

        $seo_text=SeoText::find(8);
        $menus=Navigation::all();

        return view('user.legal',compact('banner_image','faqs','faq_image','seo_text','menus'));

    }
    public function contactUs(){
        $contact=ContactInformation::first();
        $contactSetting=Setting::first();
        $seo_text=SeoText::find(7);
        $banner_image=BannerImage::find(6);
        $menus=Navigation::all();
        $websiteLang=ManageText::all();
        return view('user.contact-us',compact('contact','contactSetting','seo_text','banner_image','menus','websiteLang'));
    }


    public function termsCondition(){
        $termsCondtion=ConditionPrivacy::first();
        $banner_image=BannerImage::find(9);
        $menus=Navigation::all();

        return view('user.terms-condition',compact('termsCondtion','banner_image','menus'));
    }



    public function privacyPolicy(){
        $privacy = PrivacyPolicy::first();
        $banner_image=BannerImage::find(10);
        $menus=Navigation::all();
        return view('user.privacy-policy',compact('privacy','banner_image','menus'));
    }



    // manage subsciber
    public function subscribeUs(Request $request){
        $valid_lang=ValidationText::all();
        $rules = [
            'email'=>'required|email',
        ];
        $customMessages = [
            'email.required' => $valid_lang->where('lang_key','email')->first()->custom_text
        ];
        $this->validate($request, $rules, $customMessages);


        $isSubsriber=Subscribe::where('email',$request->email)->count();
        if($isSubsriber ==0){
            $subscribe=Subscribe::create([
                'email'=>$request->email,
                'verify_token'=>Str::random(25)
            ]);

            MailHelper::setMailConfig();

            $template=EmailTemplate::where('id',4)->first();
            $message=$template->description;
            $subject=$template->subject;
            Mail::to($subscribe->email)->send(new SubscribeUsNotification($subscribe,$message,$subject));

            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','subscribe')->first()->custom_text;
            return response()->json(['success'=>$notification]);
        }else{
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','already_subscribe')->first()->custom_text;
            return response()->json(['error'=>$notification]);
        }

    }

    public function subscriptionVerify($token){
        $subscribe=Subscribe::where('verify_token',$token)->first();
        if($subscribe){
            $subscribe->status=1;
            $subscribe->verify_token=null;
            $subscribe->save();

            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','verified')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'success');

            return redirect()->to('/')->with($notification);
        }else{
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','invalid_token')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'error');

            return redirect()->to('/')->with($notification);
        }
    }


    public function customPage($slug){
        $page=CustomPage::where('slug',$slug)->first();
        if(!$page){
            return back();
        }
        $banner_image=BannerImage::find(17);
        $menus=Navigation::all();
        return view('user.custom-page',compact('page','banner_image','menus'));
    }


    public function agent(){
        Paginator::useBootstrap();
        $banner_image=BannerImage::find(21);
        $paginate_qty=CustomPaginator::where('id',3)->first()->qty;
        $agents=User::where('status',1)->orderBy('id','desc')->paginate($paginate_qty);
        $orders=Order::where(['status'=>1])->get();
        $default_profile_image=BannerImage::find(15);
        $seo_text=SeoText::find(5);
        $menus=Navigation::all();
        $websiteLang=ManageText::all();
        return view('user.agent.index',compact('banner_image','menus','agents','orders','default_profile_image','seo_text','websiteLang'));
    }

    public function agentDetails(Request $request){
        Paginator::useBootstrap();
        $user_type='';
        if(!$request->user_type){
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','something')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->route('home')->with($notification);
        }else{
            $user_type=$request->user_type;
        }


        if($user_type ==1 || $user_type ==2){
            if($request->user_name){
                if($user_type==1){

                    $user=Admin::where(['status'=>1,'slug'=>$request->user_name])->first();
                    if(!$user){
                        $notify_lang=NotificationText::all();
                        $notification=$notify_lang->where('lang_key','something')->first()->custom_text;
                        $notification=array('messege'=>$notification,'alert-type'=>'error');
                        return redirect()->route('home')->with($notification);
                    }

                    $paginate_qty=CustomPaginator::where('id',2)->first()->qty;
                    $banner_image=BannerImage::find(1);
                    $default_image=BannerImage::find(18);
                    $menus=Navigation::all();
                    $currency=Setting::first();
                    $setting=Setting::first();
                    $properties=Property::where(['status'=>1,'admin_id'=>$user->id])->paginate($paginate_qty);
                    $popluarProperties=Property::where('status',1)->orderBy('views','desc')->get();
                    $properties=$properties->appends($request->all());

                    $default_profile_image=BannerImage::find(15);
                    $websiteLang=ManageText::all();
                    return view('user.agent.show',compact('properties','banner_image','default_image','menus','currency','user','setting','user_type','popluarProperties','default_profile_image','websiteLang'));

                }else{
                    $user=User::where(['status'=>1,'slug'=>$request->user_name])->first();
                    if(!$user){
                        $notify_lang=NotificationText::all();
                        $notification=$notify_lang->where('lang_key','something')->first()->custom_text;
                        $notification=array('messege'=>$notification,'alert-type'=>'error');
                        return redirect()->route('home')->with($notification);
                    }

                    $paginate_qty=CustomPaginator::where('id',2)->first()->qty;
                    $banner_image=BannerImage::find(18);
                    $default_image=BannerImage::find(15);
                    $menus=Navigation::all();
                    $currency=Setting::first();
                    $setting=Setting::first();
                    $properties=Property::where(['status'=>1,'user_id'=>$user->id])->paginate($paginate_qty);
                    $properties=$properties->appends($request->all());
                    $popluarProperties=Property::where('status',1)->orderBy('views','desc')->get();
                    $default_profile_image=BannerImage::find(15);
                    $websiteLang=ManageText::all();
                    return view('user.agent.show',compact('properties','banner_image','default_image','menus','currency','user','setting','user_type','popluarProperties','default_profile_image','websiteLang'));
                }
            }else{
                $notify_lang=NotificationText::all();
                $notification=$notify_lang->where('lang_key','something')->first()->custom_text;
                $notification=array('messege'=>$notification,'alert-type'=>'error');
                return redirect()->route('home')->with($notification);
            }
        }else{
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','something')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->route('home')->with($notification);
        }
    }



    public function pricingPlan(){
        $packages=Package::where('status',1)->orderBy('package_order','asc')->get();
        $seo_text=SeoText::find(4);
        $banner_image=BannerImage::find(3);
        $menus=Navigation::all();
        $currency=Setting::first();
        $websiteLang=ManageText::all();
        return view('user.price-plan',compact('packages','seo_text','banner_image','menus','currency','websiteLang'));
    }


    public function properties(Request $request){
       
        Paginator::useBootstrap();

        // check page type, page type means grid view or list view
        $page_type='';
        if(!$request->page_type){
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','something')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->route('home')->with($notification);
        }else{
            if($request->page_type=='list_view'){
                $page_type=$request->page_type;
            }else if($request->page_type=='grid_view'){
                $page_type=$request->page_type;
            }else{
                $notify_lang=NotificationText::all();
                $notification=$notify_lang->where('lang_key','something')->first()->custom_text;
                $notification=array('messege'=>$notification,'alert-type'=>'error');
                return redirect()->route('home')->with($notification);
            }
        }
        // end page type

       
        // soriting data
        $paginate_qty=CustomPaginator::where('id',2)->first()->qty;
        // check order type
        $orderBy="desc";
        $orderByView=false;
        
        // end check order type
        // start query
       $propertysearch=Property::where(function($query) use ($request){
                                
            if($request->property_type != null){
                 $query->where('property_type_id',$request->property_type);
            }
            if($request->city_id != null){
                $query->where('city_id',$request->city_id);
                // $propertysearch=Property::where(['city_id'=>$request->city_id,'property_status'=>1,'status'=>'Fully Funded'])->orderBy('id',$orderBy)->paginate($paginate_qty);
            }
            if($request->search != null){
                $query->where('title','LIKE','%'.$request->search.'%');
               //  $propertysearch=Property::where('title','LIKE','%'.$request->search.'%')->where('property_status',1)->where('status','Fully Funded')->orderBy('id',$orderBy)->paginate($paginate_qty);
            }
           $query->where('property_status',1);
          }) ->orderBy('status',$orderBy)
        ->paginate($paginate_qty);

        $properties=$propertysearch->appends($request->all());

     //  print_r($properties); exit;
        $banner_image=BannerImage::find(1);
        $default_image=BannerImage::find(15);
        $menus=Navigation::all();
        $currency=Setting::first();
        $seo_text=SeoText::find(2);
        $propertyTypes=PropertyType::where('status',1)->orderBy('type','asc')->get();
        $cities=City::where('status',1)->orderBy('name','asc')->get();
         $states=CountryState::where('status',1)->orderBy('name','asc')->get();
        
        $aminities=Aminity::where('status',1)->orderBy('aminity','asc')->get();
        $websiteLang=ManageText::all();

       
        return view('user.property.index',compact('properties','banner_image','default_image','menus','currency','page_type','seo_text','propertyTypes','states','cities','aminities','websiteLang'));
    }

    public function searchinvetors(Request $request){
      
        Paginator::useBootstrap();

   

       
        // soriting data
        $paginate_qty=CustomPaginator::where('id',2)->first()->qty;
        // check order type
        $orderBy="desc";
        $orderByView=false;
        
        // end check order type
        // start query
       $investorssearch=User::whereHas('investments',function($query) use ($request){
             
             if($request->property_id != null){
                 $query->where('property_id',$request->property_id);
            }
            
                                
            if($request->user_id != null){
                 $query->where('user_id',$request->user_id);
            }
            
           $query->groupby('user_id');
          })
        ->paginate($paginate_qty);

        $allinvestors=$investorssearch->appends($request->all());
       // print_r($allinvestors); exit;

       $users=$allinvestors;
        
        $properties=Property::all();
        $websiteLang=ManageText::all();
        $confirmNotify=$websiteLang->where('lang_key','are_you_sure')->first()->custom_text;

       
         return view('admin.user.index',compact('properties','allinvestors','users','websiteLang','confirmNotify'));
         }
     public function searchreceipts(Request $request){
         
        Paginator::useBootstrap();

        $paginate_qty=CustomPaginator::where('id',2)->first()->qty;
        // check order type
        $orderBy="desc";
        $orderByView=false;
        
        // end check order type
        // start query
       $investorssearch=User::where(function($query) use ($request){
                                
            if($request->user_id != null){
                 
                  $query->where('name','LIKE','%'.$request->user_id.'%');
              
            }
            
           
          })
        ->paginate($paginate_qty);

        $users=$investorssearch->appends($request->all());

      // $users=User::all();
          $properties=Property::all();
         $settings=Setting::first();
        $websiteLang=ManageText::all();
        return view('admin.email.create',compact('users','properties','settings','websiteLang'));
         }         


      public function downloadListingFile($file){
        $filepath= public_path() . "/uploads/custom-documents/".$file;
        return response()->download($filepath);
    }

    public function propertDetails($slug){
        $property=Property::where(['property_status'=>1,'slug'=>$slug])->first();
        if($property){

            $property->views=$property->views +1;
            $property->save();
            $similarProperties=Property::where(['status'=>1,'property_type_id'=>$property->property_type_id])->where('id', '!=',$property->id)->get()->take(3);
            $slider_image=PropertyImage::where('property_id',$property->id)->get();
            $important_dates=Propertyimportantdates::where('property_id',$property->id)->get();
            $banner_image=BannerImage::find(1);
            $default_image=BannerImage::find(15);
            $menus=Navigation::all();
            $currency=Setting::first();
            $setting=Setting::first();
            $websiteLang=ManageText::all();
            $propertyReviews = PropertyReview::where(['property_id' => $property->id, 'status' => 1])->paginate(10);
            return view('user.property.show',compact('important_dates','property','slider_image','banner_image','default_image','menus','currency','setting','similarProperties','websiteLang','propertyReviews'));
        }else{
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','something')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }
    }


  

    public function searchPropertyPage(Request $request){

        Paginator::useBootstrap();

        // check page type, page type means grid view or list view
        $page_type='';
        if(!$request->page_type){
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','something')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->route('home')->with($notification);
        }else{
            if($request->page_type=='list_view'){
                $page_type=$request->page_type;
            }else if($request->page_type=='grid_view'){
                $page_type=$request->page_type;
            }else{
                $notify_lang=NotificationText::all();
                $notification=$notify_lang->where('lang_key','something')->first()->custom_text;
                $notification=array('messege'=>$notification,'alert-type'=>'error');
                return redirect()->route('home')->with($notification);
            }
        }
        // end page type

       
        // soriting data
        $paginate_qty=CustomPaginator::where('id',2)->first()->qty;
        // check order type
        $orderBy="desc";
        $orderByView=false;
        
        // end check order type
        // start query
       $propertysearch=Property::where(function($query) use ($request){
                                
            if($request->property_type != null){
                 $query->where('property_type_id',$request->property_type);
            }
            if($request->city_id != null){
                $query->where('city_id',$request->city_id);
                // $propertysearch=Property::where(['city_id'=>$request->city_id,'property_status'=>1,'status'=>'Fully Funded'])->orderBy('id',$orderBy)->paginate($paginate_qty);
            }
            if($request->search != null){
                $query->where('title','LIKE','%'.$request->search.'%');
               //  $propertysearch=Property::where('title','LIKE','%'.$request->search.'%')->where('property_status',1)->where('status','Fully Funded')->orderBy('id',$orderBy)->paginate($paginate_qty);
            }
           $query->where('property_status',1)->where('status','Fully Funded')->orwhere('status','Open');
          }) ->orderBy('id',$orderBy)
        ->paginate($paginate_qty);

        $properties=$propertysearch->appends($request->all());

      // print_r($properties); exit;
        $banner_image=BannerImage::find(1);
        $default_image=BannerImage::find(15);
        $menus=Navigation::all();
        $currency=Setting::first();
        $seo_text=SeoText::find(2);
        $propertyTypes=PropertyType::where('status',1)->orderBy('type','asc')->get();
        $cities=City::where('status',1)->orderBy('name','asc')->get();
         $states=CountryState::where('status',1)->orderBy('name','asc')->get();
        
        $aminities=Aminity::where('status',1)->orderBy('aminity','asc')->get();
        $websiteLang=ManageText::all();
        return view('user.profile.property.investnow',compact('properties','banner_image','default_image','menus','currency','page_type','seo_text','propertyTypes','states','cities','aminities','websiteLang'));
   }
   
    public function searchPostPropertyPage(Request $request){

         Paginator::useBootstrap();
        $user=Auth::guard('web')->user();
        // check page type, page type means grid view or list view
        $page_type='';
        if(!$request->page_type){
            $notify_lang=NotificationText::all();
            $notification=$notify_lang->where('lang_key','something')->first()->custom_text;
            $notification=array('messege'=>$notification,'alert-type'=>'error');
            return redirect()->route('home')->with($notification);
        }else{
            if($request->page_type=='list_view'){
                $page_type=$request->page_type;
            }else if($request->page_type=='grid_view'){
                $page_type=$request->page_type;
            }else{
                $notify_lang=NotificationText::all();
                $notification=$notify_lang->where('lang_key','something')->first()->custom_text;
                $notification=array('messege'=>$notification,'alert-type'=>'error');
                return redirect()->route('home')->with($notification);
            }
        }
        // end page type

       
        // soriting data
        $paginate_qty=CustomPaginator::where('id',2)->first()->qty;
        // check order type
        $orderBy="desc";
        $orderByView=false;
        
        // end check order type
        // start query
       $closedproperties1=Investments::whereHas('property',function($query) use ($request){
                                
            if($request->property_type != null){
                 $query->where('property_type_id',$request->property_type);
            }
            if($request->city_id != null){
                $query->where('city_id',$request->city_id);
                // $propertysearch=Property::where(['city_id'=>$request->city_id,'property_status'=>1,'status'=>'Fully Funded'])->orderBy('id',$orderBy)->paginate($paginate_qty);
            }
            if($request->search != null){
                $query->where('title','LIKE','%'.$request->search.'%');
               //  $propertysearch=Property::where('title','LIKE','%'.$request->search.'%')->where('property_status',1)->where('status','Fully Funded')->orderBy('id',$orderBy)->paginate($paginate_qty);
            }
           $query->where('property_status',1);
          }) ->where('status','Closed')->where('user_id',$user->id)->orderBy('id',$orderBy)
        ->paginate($paginate_qty);

        $closedproperties=$closedproperties1->appends($request->all());

      // print_r($properties); exit;
        $banner_image=BannerImage::find(1);
        $default_image=BannerImage::find(15);
        $menus=Navigation::all();
        $currency=Setting::first();
        $seo_text=SeoText::find(2);
        $propertyTypes=PropertyType::where('status',1)->orderBy('type','asc')->get();
        $cities=City::where('status',1)->orderBy('name','asc')->get();
         $states=CountryState::where('status',1)->orderBy('name','asc')->get();
        
        $aminities=Aminity::where('status',1)->orderBy('aminity','asc')->get();
        $websiteLang=ManageText::all();
        return view('user.profile.property.pastoffering',compact('closedproperties','states','cities','banner_image','default_image','menus','currency','page_type','seo_text','propertyTypes','cities','aminities','websiteLang'));
   }


}
