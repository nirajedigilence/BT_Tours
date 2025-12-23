<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Cms\Country;
use App\Models\Cms\Experience;
use App\Models\Cms\ExperienceCategory;
use App\Models\Cms\Menu;
use App\Models\Cms\ExperienceImage;
use App\Models\Cms\CartExperience;
use App\Models\Cms\ExperienceExtra;
use App\Models\Cms\Brochures;
use App\Models\Cms\Reviews;
use App\Models\Cms\ReviewsDisplayCount;
use App\Models\Cms\Ship;
use App\Models\Cms\ExperiencesShipCrossings;
use App\Models\Cms\BTExtraMaster;
use App\Models\Cms\BTCoachMaster;
use App\User;
use Illuminate\Http\Request;
use App\Services\Ajax\Ajax;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use App\Services\MailchimpService;
use Illuminate\Support\Facades\Http;

use Session;
class ExperiencesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index(Request $request)
    {
        $homepage = '1';
        $page_title = "Bowling Tours - Unforgettable UK Lawn Bowls Holidays Await!";
         return view('homepage', compact('homepage','page_title'));
    }
    public function privacy_policy(Request $request)
    {
        $page_title = "Privacy Policy - Bowling Tours";
        $data = array();
         return view('privacy_policy', compact('data','page_title'));
    }
    public function cookies(Request $request)
    {
        $page_title = "Lawn Bowls Cookie Policy For Better Experience Bowling Tours";
        $data = array();
         return view('cookies', compact('data','page_title'));
    }
    public function terms(Request $request)
    {
        $page_title = "Terms &amp; Conditions - Bowling Tours";
        $data = array();
         return view('terms', compact('data','page_title'));
    }
    public function about_us(Request $request)
    {
        $page_title = "Effortless Bowling Tours for Your Club - About Us";
        $data = array();
         return view('about', compact('data','page_title'));
    }
    public function contact_us(Request $request)
    {
        $page_title = "Contact Us - Bowling Tours | Call | Email | Visit us";
        $data = array();
         return view('contact', compact('data','page_title'));
    }
     //send mail
    public function send_mail(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'fullname' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
            'recaptcha_token' => 'required|string',
        ]);

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $request->input('recaptcha_token'),
            'remoteip' => $request->ip(),
        ]);

        $recaptcha = $response->json();

        if (!($recaptcha['success'] ?? false) || ($recaptcha['score'] ?? 0) < 0.5 || ($recaptcha['action'] !== 'contact')) {
            return back()->withErrors(['recaptcha' => 'reCAPTCHA verification failed. Please try again.']);
        }
       $aaa['html1'] = "
          <h3>Contact Form Submission</h3>
          <p><strong>Full Name:</strong> {$data['fullname']}</p>
          <p><strong>Email:</strong> {$data['email']}</p>
          <p><strong>Phone:</strong> {$data['phone']}</p>
          <p><strong>Message:</strong><br>" . nl2br(e($data['message'])) . "</p>
        ";
        //$aaa['email'] = 'groups@bowlingtours.co.uk';
        $aaa['email'] = 'bowlingtours@yopmail.com';
        $client = new Client();

        $response = $client->post('https://api.smtp2go.com/v3/email/send', [
            'json' => [
                'api_key' => env('SMTP2GO_API_KEY'),
                'to' => [$aaa['email']],
                'sender' => env('MAIL_FROM_ADDRESS'),
                'subject' => 'Contact Form Submission',
                'html_body' => $aaa['html1'],
                'text_body' => strip_tags($aaa['html1']),
            ],
        ]);
        if(isset($data['newsletter']))
        {
            $mailchimp = app(MailchimpService::class); // Resolve via Laravel's service container
            $mailchimp->subscribe($data['email']);
        }
        
        if ($response->getStatusCode() == 200) {
            return back()->with('success', 'Send contact form successfully');
        } else {
            return back()->with('error', 'Something went wrong');
        }
        /*Mail::send(array(), array(), function ($message) use ($aaa) {

          $message->to($aaa['email'])
            ->subject('Contact Form Submission')
            ->html($aaa['html1']); 
        });
         if (Mail::failures()) {
            return back()->with('Send contact form successfully');
        }
        else
        {
           return back()->with('Something went wrong');
        }*/
        
    }
    public function show_bowling($id,Request $request )
    {
        $data = $request->all();
        $map = isset($data["map"])?$data["map"]:'';
        $user = Auth::user();
       // $collaborators = User::role('Collaborator')->get();
        $collaborators = array();
        /*if($user){*/
             $exp = Experience::where('slug_name',$id)->first();
            $id = $exp->id;
            $row = Experience::with('experienceImages')
                //->with('experienceType')
                //->with('experienceDatesActive')
                ->with('ExperienceAttractions')
                ->with('ExperiencesToGallerys')
                ->with('countryAreas')
                ->with("experienceCategories")
                //->with(['days.dayImages', 'days.dayInclusions'])
                //->with(['days.dayImages','days.dayInclusions'])
                ->with(['ExperienceHotels' => function ($q) {
                    //$q->where('experiences_to_hotels.deleted_at', null);
                    $q->where('experiences_to_hotels.is_deleted', null);
                    $q->orderBy('pivot_standard_hotel', 'desc');
                }])
                //->with('ship.shipCabins')
                ->with("ExperiencesToFixture")
                ->where('active', '=', 1)
                ->findOrFail($id);
          
            $row->title = $row->name;
            // pr($row->ExperienceAttractions); exit();
            if($row->url){
                return Redirect::to($row->url, 301);
            }
            //$reviews = CartExperience::with(['reviews'])->where('experiences_id',$id)->get()->toArray();
            /*reviews.experiences_id = '.$id.' or */
           // $reviews = ReviewsDisplayCount::selectRaw('reviews.*,c.experience_name')->leftjoin('reviews as reviews','reviews_display_count.review_id','=','reviews.id')->leftjoin('cart_experiences as c','c.id','reviews.cart_experience_id','=','reviews.id')->whereRaw('reviews.deleted_at is NULL and (reviews_display_count.experience_id = '.$id.')')/*->orWhere('reviews.experiences_id', $id)->orWhere('reviews_display_count.experience_id', $id)*/->groupBy('reviews.id')->get()->toArray();
            //prd($reviews);
            $reviews =  array();
            $experiences = '';
            $experiences = Experience::with('experienceImages')->where('active', "=", 1 )->where('exp_type', "=", 3 )->get()->toArray();
            $brochures = Brochures::where('experience_id',$id)->first();
            $experienceCategory = ExperienceCategory::where('active','1')->where('cat_type','2')->get();
            $experienceCategoriesChecked = $row->experienceCategories;

            foreach($experienceCategory as $k => $v){
                $v->selected = false;
                foreach ($experienceCategoriesChecked as $kk => $vv){
                    if($vv->id === $v->id){
                        $v->selected = true;
                        break;
                    }
                }
            }
            $bt_settings = BTCoachMaster::first();
            $bt_extras = BTExtraMaster::get();
            //$brochures = array();
            //get club user wordpress api
            $client = new Client();
            // $updateurl = 'https://bowlingtours-staging-co-uk.stackstaging.com/wp-json/custom/v1/getClubdata'; 
            $updateurl = 'https://tours-system-com.stackstaging.com/api/get_bt_collabrator_data'; 
            $response = $client->request('get', $updateurl);
            $update_exp = json_decode($response->getBody()->getContents(), true);
            $collaborators = array();
            if(!empty($update_exp['status']))
            {
                 $collaborators = $update_exp['data'];
                
            } 
            //get exp date api
            $client = new Client();
            $updateurl = getenv('IMAGE_URL').'api/bowling_tours_dates'; 
              $response = $client->request('post', $updateurl, [
                'form_params' => [
                    'tour_id' => $id
                ],
                'auth' => ['Tours-user', 'L3tM3L00kd']
            ]);
            $update_exp = json_decode($response->getBody()->getContents(), true);
            $exp_dates = array();
            if(!empty($update_exp['status']))
            {
                 $exp_dates = $update_exp['data'];
                 
            } 
           
            $view = view('show_bowling', compact('row','collaborators','reviews','brochures','experiences','map','experienceCategory','bt_settings','bt_extras','exp_dates','collaborators'));
            echo $view->render();
            die();
            //return view('show_experience', compact('row'));
       /* }else{
             $currenturl = url()->full();
            Session::put('back_url',$currenturl);
            return redirect('/login?msg=error');
            
        }*/
    }
    
  public function getAddToCart1(Request $request){
        $data = $request->all();
        
        $exp_id = $data["exp_id"];
        $tour_type = isset($data["tour_type"])?$data["tour_type"]:'1';
        $currency = isset($data["market_option"])?$data["market_option"]:'1';
        $exp_dates_rates_id = $data["experience_dates_id"];
        $collaborator_id = isset($data["collaborator_id"]) ? $data["collaborator_id"] : '';
        $club_name = isset($data["club_name"]) ? $data["club_name"] : '';
        $created_by = isset($data["created_by"]) ? $data["created_by"] : '';
        
        $client = new Client();

        try {
            $updateurl = getenv('IMAGE_URL').'api/bowling_add_to_cart1'; 
              $response = $client->request('post', $updateurl, [
                'form_params' => [
                    'exp_id' => $data['exp_id'],
                    'tour_type' => '1',
                    'market_option' => $data['market_option'],
                    'experience_dates_id' => $data['experience_dates_id'],
                    'collaborator_id' => $data['collaborator_id']
                ],
                'auth' => ['Tours-user', 'L3tM3L00kd']
            ]);
            $data_api = json_decode($response->getBody()->getContents(), true);
          
            //return response()->json(['data' => $data]);

        } catch (\Exception $e) {
           // prd($e->getMessage());
            //return response()->json(['error' => $e->getMessage()], 500);
            $data_api = array();
        } 
        $experienceDate = !empty($data_api['experienceDate'])?$data_api['experienceDate']:array();
        $items = !empty($data_api['items'])?$data_api['items']:array();

       if(!empty($available_tour))
       {
        $view = view('partials.booking.tourdate_exist', compact('items','experienceDate','collaborator_id','exp_dates_rates_id','currency'));
       }
       else{
        $view = view('partials.booking.add_to_cart_1', compact('items','experienceDate','collaborator_id','exp_dates_rates_id','currency','tour_type','club_name','created_by'));
        
       }
        
        echo $view->render();
        die();
    }
    public function getAddToCart2(Request $request){
        $data = $this->getData($request);
        $collaborator_id = $data["collaborator_id"];
        $experiences_to_hotels_to_experience_dates_id = $data["experiences_to_hotels_to_experience_dates_id"];

        $client = new Client();

        try {
            $updateurl = getenv('IMAGE_URL').'api/bowling_add_to_cart2'; 
              $response = $client->request('post', $updateurl, [
                'form_params' => [
                    'experiences_to_hotels_to_experience_dates_id' => $data['experiences_to_hotels_to_experience_dates_id']
                ],
                'auth' => ['Tours-user', 'L3tM3L00kd']
            ]);
            $data_api = json_decode($response->getBody()->getContents(), true);
          
            //return response()->json(['data' => $data]);

        } catch (\Exception $e) {
           // prd($e->getMessage());
            //return response()->json(['error' => $e->getMessage()], 500);
            $data_api = array();
        } 

        $basePrice = $data["basePrice"];
        $basePriceSS = $data["basePriceSS"];
        $item = !empty($data_api['items'])?$data_api['items']:array();
        $view = view('partials.booking.add_to_cart_2', compact('item', 'basePrice', 'basePriceSS','collaborator_id'));
        echo $view->render();
        die();
    }

    public function getAddToCart3(Request $request){
        $data = $request->all();
        //prd($data);
        /*if(isset($request->tour_type) && $request->tour_type == 2)
        {
            $result = $this->addToCartCruise($request);
        }
        else
        {
            $result = $this->addToCart($request);
        }*/
        $client = new Client();

        try {
            $updateurl = getenv('IMAGE_URL').'api/bowling_add_to_cart3'; 
              $response = $client->request('post', $updateurl, [
                'form_params' => [
                    '_token' => $data['_token'],
                    'tour_type' => '3',
                    'collaborator_id' => $data['collaborator_id'],
                    'created_by' => $data['created_by'],
                    'currency' => $data['currency'],
                    'dates_rates_id' => $data['dates_rates_id'],
                    'basePrice' => $data['basePrice'],
                    'basePriceSS' => $data['basePriceSS'],
                    'hold_tour_days' => $data['hold_tour_days'],
                    'club_name' => $data['club_name'],
                ],
                'auth' => ['Tours-user', 'L3tM3L00kd']
            ]);
            $data_api = json_decode($response->getBody()->getContents(), true);
          
            //return response()->json(['data' => $data]);

        } catch (\Exception $e) {
            //prd($e->getMessage());
            //return response()->json(['error' => $e->getMessage()], 500);
            $data_api = array();
        } 
      // prd($data_api);
        $code = !empty($data_api['code']) ? $data_api['code'] : 400;
        $message = (!empty($data_api['status']) && $data_api['status'] == 'success') ? "Experience was successfully added." : "There was a problem adding the experience to the cart!";

        if(!empty($request->hold_tour_days))
        {
            return redirect()->route('hold-tours')
            ->with($code, $message);
           
        }
        else
        {
            return redirect('/cart?bt_tour='.$data['created_by'])->with($code, $message);
            
        }
        
    }
     public function showCart(Request $request){
        /*$created_by = Auth::user()->getAuthIdentifier();
        $cart = Cart::getCurrentUserCart(null,$created_by)->toArray();*/
        // pr($cart); exit;
        $client = new Client();

        try {
            $updateurl = getenv('IMAGE_URL').'api/show_cart'; 
              $response = $client->request('post', $updateurl, [
                'form_params' => [
                    'created_by' => $_GET['bt_tour']
                ],
                'auth' => ['Tours-user', 'L3tM3L00kd']
            ]);
            $data_api = json_decode($response->getBody()->getContents(), true);
          
            //return response()->json(['data' => $data]);

        } catch (\Exception $e) {
           // prd($e->getMessage());
            //return response()->json(['error' => $e->getMessage()], 500);
            $data_api = array();
        } 
        $cart = !empty($data_api['cart'])?$data_api['cart']:array();

        return view('booking.cart', compact('cart'));
    }
     public function finalizeCart(Request $request){
            
       $client = new Client();

        try {
            $updateurl = getenv('IMAGE_URL').'api/finalize_cart'; 
              $response = $client->request('post', $updateurl, [
                'form_params' => [
                    'created_by' => $request->created_by
                ],
                'auth' => ['Tours-user', 'L3tM3L00kd']
            ]);
            $data_api = json_decode($response->getBody()->getContents(), true);
          
            //return response()->json(['data' => $data]);

        } catch (\Exception $e) {
            
            //return response()->json(['error' => $e->getMessage()], 500);
            $data_api = array();
        } 

        $code = !empty($data_api['code'])?$data_api['code']:'error';
        $message = !empty($data_api['message'])?$data_api['message']:'There was a problem finalizing the order.';
         return redirect()->back()
            ->with($code, $message);
        
    }
    public function deleteCartExperience($id, Ajax $ajax){
        $client = new Client();

        try {
            $updateurl = getenv('IMAGE_URL').'api/delete_cart'; 
              $response = $client->request('post', $updateurl, [
                'form_params' => [
                    'id' => $id
                ],
                'auth' => ['Tours-user', 'L3tM3L00kd']
            ]);
            $data_api = json_decode($response->getBody()->getContents(), true);
          
            //return response()->json(['data' => $data]);

        } catch (\Exception $e) {
           // prd($e->getMessage());
            //return response()->json(['error' => $e->getMessage()], 500);
            $data_api = array();
        } 
       return redirect()->back()->with('success','Remove successfully');
    }
    public function sendNewsletter(Request $request)
    {
        $data = $request->all();
        prd($data);
    }
public function storeEnquiry(Request $request){
    $data = $request->all();
    
    $url = getenv('IMAGE_URL').'api/get_experience_data';
        //$url = 'https://tours-system-com.stackstaging.com/api/get_experience_data';
    
    $client = new Client();
    $updateurl = getenv('IMAGE_URL').'api/update_enquiry_data'; 
      $response = $client->request('post', $updateurl, [
        'form_params' => [
            'exp_id' => $data['exp_id'],
            'date_from' => !empty($data['date_from'])?$data['date_from']:NULL,
            'date_to' => !empty($data['date_to'])?$data['date_to']:NULL,
            'nights' => $data['nights'],
            'final_cost' => $data['final_cost'],
            'hotel_id' => $data['hotel'],
            'is_dates_flexible' => isset($data['is_dates_flexible'])?$data['is_dates_flexible']:'0',   
            'coach_required' => isset($data['coach_required'])?$data['coach_required']:'',   
            'category_id' => isset($data['category_id'])?$data['category_id']:'',   
            'group_number' => isset($data['group_number'])?$data['group_number']:'',  
            'fixture' => isset($data['fixture'])?$data['fixture']:'',
            'attraction' => !empty($data['attraction'])?implode(',',$data['attraction']):'',
            'extras' => !empty($data['extras'])?implode(',',$data['extras']):'',
            'contact_name' => $data['contact_name'],
            'bowls_club' => $data['bowls_club'],
            'email' => $data['email'],
            'contact_number' => $data['contact_number'],
            'addtional_note' => $data['addtional_note'],
            'created_at' => date('Y-m-d H:i:s'),

        ],
        'auth' => ['Tours-user', 'L3tM3L00kd']
    ]);
    $update_exp = json_decode($response->getBody()->getContents(), true);
    $exe = Experience::select('slug_name')->where('id',$data['exp_id'])->first();
    if(!empty($update_exp['status']))
    {
         return redirect('/bowling/'.$exe->slug_name)->with('success','Enquiry added successfully.');
    }   
}
    public function getPrice(Request $request){
        $data = $this->getData($request);
        $id = $data["id"];
        $dates_id = $data["dates_id"];

        $experienceDate = [];
        $price = 0;
        if($dates_id > 0){
            // $experienceDate = ExperienceDate::where("active", "=", 1)->where("id", "=", $dates_id)->first();
            if(!empty($dates_id)){
                $dates_rates = 


DB::connection('mysql_veenus')->table('experience_dates_rates')->where('id', $dates_id)->first();
                $price_euro = '';
                $price_ss_euro = '';
                if($dates_rates->currency == 1)
                {
                    $price = number_format($dates_rates->rate,2);
                    $price_ss = number_format($dates_rates->single_srs,2);
                    $currency = 1;
                    $currency_symbol = '£';
                }
                elseif($dates_rates->currency == 2)
                {
                    $price = number_format($dates_rates->rate_euro,2);
                    $price_ss = number_format($dates_rates->single_srs_euro,2);
                    $currency = 2;
                    $currency_symbol = '€';
                }
                else
                {
                    $price = number_format($dates_rates->rate,2);
                    $price_ss = number_format($dates_rates->single_srs,2);
                    $price_euro = number_format($dates_rates->rate_euro,2);
                    $price_ss_euro = number_format($dates_rates->single_srs_euro,2);
                    $currency = 3;
                    $currency_symbol = '£';
                }
                $lenghtnight = $dates_rates->nights.' nights';
            }
        }
        $experience = Experience::where("active", "=", 1)->where("id", "=", $id)->first();
        $lenghtnight = $experience->nights.' nights';
        if((!$experienceDate && $price == 0) || empty($dates_id)){
            $price = $experience->rate;
            $price_ss = $experience->srs;
            //$lenghtnight = 'Length - '.$experience->nights;
            $currency = 1;
            $currency_symbol = '£';
        }
        $result = [
            "code" => 200,
            "message" => "success",
            "priceL" => $price,
            "priceS" => $price_ss,
            "price_euro" => $price_euro,
            "price_ss_euro" => $price_ss_euro,
            "currency" => $currency,
            "currency_symbol" => $currency_symbol,
            "lenghtnight" => $lenghtnight
        ];

        return response()->json($result);

    }
    public function getCruisePrice(Request $request){
        $data = $this->getData($request);
        $id = $data["id"];
        $dates_id = $data["dates_id"];

        $experienceDate = [];
        $price = 0;
        if($dates_id > 0){
            // $experienceDate = ExperienceDate::where("active", "=", 1)->where("id", "=", $dates_id)->first();
            if(!empty($dates_id)){
                $cruise_dates = ExperienceCruiseDate::where('dates_rates_id', $dates_id)->first();
                $dates_rates = 


DB::connection('mysql_veenus')->table('experience_dates_rates')->where('id', $dates_id)->first();
                $company_id = $cruise_dates->shipDates->ship->company;
                $srs = $cruise_dates->experience->srs;
                $rate = $cruise_dates->experience->rate;
                $cost_data = 


DB::connection('mysql_veenus')->table('experience_dates_ship_crossings')->select('experience_dates_ship_crossings.cost_pound')->where('exp_date_rates_id', $dates_id)->where('company_id', $company_id)->first();
                $price_euro = '';
                $price_ss_euro = '';
                if(!empty($cost_data->cost_pound))
                {
                    $price = number_format($cost_data->cost_pound,2);
                    $price_ss = number_format($srs,2);
                    $currency = 1;
                    $currency_symbol = '£';
                }
                elseif($dates_rates->currency == 2)
                {
                    $price = number_format($dates_rates->rate_euro,2);
                    $price_ss = number_format($dates_rates->single_srs_euro,2);
                    $currency = 2;
                    $currency_symbol = '€';
                }
                else
                {
                    /*$price = number_format($dates_rates->rate,2);
                    $price_ss = number_format($dates_rates->single_srs,2);
                    $price_euro = number_format($dates_rates->rate_euro,2);
                    $price_ss_euro = number_format($dates_rates->single_srs_euro,2);
                    $currency = 3;
                    $currency_symbol = '£';*/
                    $price = number_format($rate,2);
                    $price_ss = number_format($srs,2);
                    $currency = 1;
                    $currency_symbol = '£';
                }
                $lenghtnight = $dates_rates->nights.' nights';
            }
        }
        $experience = Experience::where("active", "=", 1)->where("id", "=", $id)->first();
        $lenghtnight = $experience->nights.' nights';
        if((!$experienceDate && $price == 0) || empty($dates_id)){
            $price = $experience->rate;
            $price_ss = $experience->srs;
            //$lenghtnight = 'Length - '.$experience->nights;
            $currency = 1;
            $currency_symbol = '£';
        }
        $result = [
            "code" => 200,
            "message" => "success",
            "priceL" => $price,
            "priceS" => $price_ss,
            "price_euro" => $price_euro,
            "price_ss_euro" => $price_ss_euro,
            "currency" => $currency,
            "currency_symbol" => $currency_symbol,
            "lenghtnight" => $lenghtnight
        ];

        return response()->json($result);

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function search_old(Request $request)
    {
        //$request->search_text = 'ddsfsdfsdf';
        $url = 'https://tours-system-com.stackstaging.com/api/search_exp';
        $client = new Client();

        try {
            $response = $client->request('POST', $url, [
                'form_params' => $request,
                'auth' => ['Tours-user', 'L3tM3L00kd']
            ]);
            $items = json_decode($response->getBody()->getContents(), true);

            //return response()->json(['data' => $data]);

        } catch (\Exception $e) {
            //return response()->json(['error' => $e->getMessage()], 500);
            $items = array();
        }
        //get country
        $url = 'https://tours-system-com.stackstaging.com/api/get_countries';
        $client = new Client();

        try {
            $response = $client->request('get', $url, [
                'auth' => ['Tours-user', 'L3tM3L00kd']
            ]);
            $countries = json_decode($response->getBody()->getContents(), true);
          
            //return response()->json(['data' => $data]);

        } catch (\Exception $e) {
            //return response()->json(['error' => $e->getMessage()], 500);
            $countries = array();
        }
        //get categories
        //get country
        $url = 'https://tours-system-com.stackstaging.com/api/get_experience_categories';
        $client = new Client();

        try {
            $response = $client->request('get', $url, [
                'auth' => ['Tours-user', 'L3tM3L00kd']
            ]);
            $experienceCategories = json_decode($response->getBody()->getContents(), true);
          
            //return response()->json(['data' => $data]);

        } catch (\Exception $e) {
            //return response()->json(['error' => $e->getMessage()], 500);
            $experienceCategories = array();
        }
        //$countries = Country::with("countryAreas.experiences")->where('is_bt_country','1')->get();
        //$experienceCategories = ExperienceCategory::getAll();
        //$experienceExtras = ExperienceExtra::getAll();
        //dbg2($countries); exit();
        $experienceExtras = array();
        $data = $this->getData($request);
        $country_areas_id = [];

        $items = (object) $items['data'];
        $countries = (object) $countries['data'];
        $experienceCategories = (object) $experienceCategories['data'];
        
        return view('search', compact('items', 'countries', 'experienceCategories', 'experienceExtras', 'country_areas_id'));
    }
    public function search(Request $request)
    {
        
        $countries = Country::with("countryAreas.experiences")->where('is_bt_country','1')->get();
        $experienceCategories = ExperienceCategory::where('cat_type','2')->get();
        $experienceExtras = ExperienceExtra::getAll();
        //dbg2($countries); exit();

        $data = $this->getData($request);
         $search_txt = !empty($request->search_text)?$request->search_text:'';    
        if(!empty($search_txt))
        {
            
            $exp = ExperienceExtra::whereRaw('(name like "%'.$search_txt.'%" )')->get();
            
            if(empty($exp[0]))
            {
                $experiences = Experience::with("experienceCategories")->with('experienceImages')->with('ExperienceAttractions')->where('active', "=", 1 )->whereRaw('(name like "%'.$search_txt.'%" or description like "%'.$search_txt.'%")')->where('exp_type', "=", 3 );
            }
            else{
                $experiences = Experience::with("experienceCategories")->with('experienceImages')->with('ExperienceAttractions')->where('active', "=", 1 )->where('exp_type', "=", 3 );
              
            }
             

             if(!empty($exp[0]))
             {
                $experience_extras_id_tag = array();
                foreach($exp as $ext)
                {
                    $experience_extras_id_tag[] = $ext->id;
                }
             }

             if(!empty($experience_extras_id_tag))
             {
                $data["experience_extras_id"] = $experience_extras_id_tag;
                
             }
             
        }
        else
        {
            $experiences = Experience::with("experienceCategories")->with('experienceImages')->with('ExperienceAttractions')->where('active', "=", 1 )->where('exp_type', "=", 3 );
             
        }
     
        if(isset($data["experience_categories_id"])){
            $experience_categories_id = $data["experience_categories_id"];
            // pr($experience_categories_id);
            // exit();

            foreach($experienceCategories as $k => $v){
                $v->selected = false;
                foreach ($experience_categories_id as $vv){
                    if($vv == $v->id){
                        $v->selected = true;
                        break;
                    }
                }
            }

            $experiences->whereHas('experienceCategories', function ($query) use ($experience_categories_id) {
                $query->whereIn('experience_categories.id', $experience_categories_id);
            });
        }   
        /* if(isset($data["experience_extras_id"])){
            $experience_extras_id = $data["experience_extras_id"];

            $experiences->whereHas('experienceExtras', function ($query) use ($experience_extras_id) {
                $query->whereIn('experience_extras.id', $experience_extras_id);
            });
        }*/
        //prd($data["experience_extras_id"]);
       /* if(isset($data["experience_extras_id"])){
            $experience_extras_id = $data["experience_extras_id"];

            foreach($experienceExtras as $k => $v){
                $v->selected = false;
                foreach ($experience_extras_id as $vv){
                    if($vv == $v->id){
                        $v->selected = true;
                        break;
                    }
                }
            }

            $experiences->whereHas('experienceExtras', function ($query) use ($experience_extras_id) {
                $query->whereIn('experience_extras.id', $experience_extras_id);
            });
        }*/
        /*if(!isset($data["country_areas_id"]))
        {
            $data["country_areas_id"] = array('1','2','3','4','5','23','24','9','10','11','16','17','22','6','7','18','19','20','21');
        }*/
        $country_areas_id =[];
        $country_ar=[];
        if(!empty($data["country_areas_id"])){
            if(is_array($data["country_areas_id"]))
            {
               $country_areas_id = $data["country_areas_id"];
            }
            else
            {
                $country_areas_id[0] = $data["country_areas_id"];
            }
            //prd($country_areas_id);
           

            foreach ($countries as $k => $v){
                foreach($v->countryAreas as $kk => $vv){
                    $vv->selected = false;
                    foreach ($country_areas_id as $vvv){
                        if($vvv == $vv->id){
                            $vv->selected = true;
                            $country_ar[]=$v->id;
                            break;
                        }
                    }
                }
            }
            
            $experiences->whereHas('countryAreas', function ($query) use ($country_areas_id) {
                $query->whereIn('country_areas.id', $country_areas_id);
            });
        }
        else
        {
            if(!empty($data['country']))
            {

                $experiences->where('country',$data['country']);
                $country_ar[]=$data['country'];
            }
            
        }


        $items = $experiences->get();
        
        return view('search', compact('items', 'countries', 'experienceCategories', 'country_areas_id','country_ar'));
    }

    public function searchAjax(Request $request, Ajax $ajax) {
        $data = $this->getData($request);
        
        $experiences = Experience::with("experienceCategories")->with('experienceImages')->where('experiences.active', "=", 1 )->where('exp_type', "=", 3 );

        if(isset($data["experience_categories_id"])){
            $experience_categories_id = $data["experience_categories_id"];
            
            $experiences->whereHas('experienceCategories', function ($query) use ($experience_categories_id) {
                 

                $query->whereIn('experience_categories.id', $experience_categories_id);    
                $query->havingRaw('COUNT(DISTINCT experience_categories.id) = ?', [count($experience_categories_id)]);
            });
        }

        if(isset($data["experience_extras_id"])){
            $experience_extras_id = $data["experience_extras_id"];

            $experiences->whereHas('experienceExtras', function ($query) use ($experience_extras_id) {
                $query->whereIn('experience_extras.id', $experience_extras_id);
            });
        }
       
        $country_areas_id = [];
        $country_ar=[];
        if(isset($data["country_areas_id"])){
            $country_areas_id = $data["country_areas_id"];

            $experiences->whereHas('countryAreas', function ($query) use ($country_areas_id) {
                $query->whereIn('country_areas.id', $country_areas_id);
            });
        }
        if(!empty($data['countries_id']))
        {
            $country_ar = $data['countries_id'];
        }
        // $experiences->whereHas('experienceDates', function ($query) {
        //     $query->whereRaw('IFNULL(experience_dates.price, experiences.price) between ? AND ? ', [0, 2000]);
        // });
        parse_str($data["filter_serial"], $output);
        if(isset($output['sortby'] ) && $output['sortby'] == 'price-desc'){
            /*$items = $experiences->get(); 
            if(!empty($items)){
               
	           	$items = Arr::sort($items, function($exp)
	            {
	                return $exp->price;
	            });
            }*/
            
            $experiences->orderBy('rate','ASC');
            $items = $experiences->get();
        }elseif(isset($output['sortby'] ) && $output['sortby'] == 'postdate-desc'){
            $experiences->orderBy('created_at','DESC');
        	$items = $experiences->get();
        }elseif(isset($output['sortby'] ) && $output['sortby'] == 'mobility-desc'){
            $experiences->orderBy('mobility','ASC');
        	$items = $experiences->get();
        }else{
        	$items = $experiences->get();
        }
        // echo $items = $experiences->toSql();
        // exit();
        $filter_serial = $data["filter_serial"];
        // echo urldecode($filter_serial); exit();
        $new_url = route("search.main")."?".urlencode($filter_serial);
        return $ajax
            ->dump(false)
            ->runJavascript("window.history.replaceState('Object', 'Title', '{$new_url}');")
            ->redrawView('pageSearchContent')
            ->view('search_part-page_content', compact('items','output') );
    }

    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'price_from' => 'nullable|numeric|min:0|max:99999999.99',
            'price_to' => 'nullable|numeric|min:0|max:99999999.99',
            'experience_categories_id' => 'nullable|array',
            'experience_categories_id.*' => 'exists:experience_categories,id',
            'experience_extras_id' => 'nullable|array',
            'experience_extras_id' => 'exists:experience_extras,id',
            'country_areas_id' => 'sometimes',
            //'country_areas_id' => 'exists:country_areas,id',
            'years' => 'nullable|array',
            'months' => 'nullable|array',
            'filter_serial' => 'nullable',
            'dates_id' => 'nullable|numeric',
            'country' => 'sometimes',
            'countries_id' => 'sometimes',
            'id' => 'nullable|numeric',
        ];

        return $request->validate($rules);
    }
    public function downloadBrochureImage(Request $request ){
        
        $data = $request->all();
        //pr($data) ; die('Testing');
         $exp_id = $data['exp_id'];
         $rate_pp_new = $data['rate_pp_new'];
         $srs_pp_new = $data['srs_pp_new'];
         $brochure_tel = $data['brochure_tel'];
         $brochure_email = $data['brochure_email'];
          //$experience = Experience::findOrFail($exp_id);
        $experience = Experience::with(['getCountryAreas'])->where('id' ,$data['exp_id'])->get()->first();
        $brochures = Brochures::where('experience_id',$exp_id)->first();
        
        return response()->json([
            'status' => 'success',
            'response' => view('partials.tours.downloadBrochureImage')->with([
                'experience' => $experience,
                'rate_pp_new' => $rate_pp_new,
               'srs_pp_new' => $srs_pp_new,
               'brochure_tel' => $brochure_tel,
               'brochure_email' => $brochure_email,
                'brochures' => $brochures,
            ])->render()
        ]);
    }
}
