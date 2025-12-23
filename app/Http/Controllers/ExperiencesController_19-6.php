<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Cms\Country;
use App\Models\Cms\Experience;
use App\Models\Cms\ExperienceCategory;
use App\Models\Cms\ExperienceDate;
use App\Models\Cms\ExperienceCruiseDate;
use App\Models\Cms\ExperienceExtra;
use App\Models\Cms\ExperiencesToHotelsToExperienceDate;
use App\Models\Cms\Menu;
use App\Models\Cms\ExperienceImage;
use App\Models\Cms\CartExperience;
use App\Models\Cms\Brochures;
use App\Models\Cms\Reviews;
use App\Models\Cms\ReviewsDisplayCount;
use App\Models\Cms\Ship;
use App\Models\Cms\ExperiencesShipCrossings;

use App\User;
use Illuminate\Http\Request;
use App\Services\Ajax\Ajax;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
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

    public function show($id,Request $request )
    {
        $data = $request->all();
        $map = isset($data["map"])?$data["map"]:'';
        $user = Auth::user();
        $collaborators = User::role('Collaborator')->get();
        if($user){

            $row = Experience::with('experienceImages')
                ->with('experienceType')
                ->with('experienceDatesActive')
                ->with('ExperienceAttractions')
                ->with('ExperiencesToGallerys')
                ->with('countryAreas')
                ->with("experienceCategories")
                //->with(['days.dayImages', 'days.dayInclusions'])
                ->with(['days.dayImages','days.dayInclusions'])
                ->with(['ExperienceHotels' => function ($q) {
                    //$q->where('experiences_to_hotels.deleted_at', null);
                    $q->where('experiences_to_hotels.is_deleted', null);
                    $q->orderBy('pivot_standard_hotel', 'desc');
                }])
                ->with('ship.shipCabins')
                ->with("еxperiencesToHotelsToExperienceDates")
                ->where('active', '=', 1)
                ->findOrFail($id);
            // pr($row); 
            // exit();
            $row->title = $row->name;
            // pr($row->ExperienceAttractions); exit();
            if($row->url){
                return Redirect::to($row->url, 301);
            }
            //$reviews = CartExperience::with(['reviews'])->where('experiences_id',$id)->get()->toArray();
            /*reviews.experiences_id = '.$id.' or */
            $reviews = ReviewsDisplayCount::selectRaw('reviews.*,c.experience_name')->leftjoin('reviews as reviews','reviews_display_count.review_id','=','reviews.id')->leftjoin('cart_experiences as c','c.id','reviews.cart_experience_id','=','reviews.id')->whereRaw('reviews.deleted_at is NULL and (reviews_display_count.experience_id = '.$id.')')/*->orWhere('reviews.experiences_id', $id)->orWhere('reviews_display_count.experience_id', $id)*/->groupBy('reviews.id')->get()->toArray();
            //prd($reviews);
            $cartExperiences = CartExperience::where('deleted_at',null)->get()->toArray();
            $experiences = '';
            if(!empty($cartExperiences)){
                $experiences_id = array_unique(array_column($cartExperiences,'experiences_id'));
                $experiences = Experience::with('experienceDates')->with('experienceImages')->where('active', "=", 1 )->where('exp_type', "=", 1 )->whereIn('id',$experiences_id)->get()->toArray();
            }
            $brochures = Brochures::where('experience_id',$id)->first();
            $view = view('show_experience', compact('row','collaborators','reviews','brochures','experiences','map'));
            echo $view->render();
            die();
            //return view('show_experience', compact('row'));
        }else{
             $currenturl = url()->full();
            Session::put('back_url',$currenturl);
            return redirect('/login?msg=error');
            /*return redirect()->route('login')
            ->with('error','You need to be logged in to view products!');*/
        }
    }
    public function show_bowling($id,Request $request )
    {
        $data = $request->all();
        $map = isset($data["map"])?$data["map"]:'';
        $user = Auth::user();
       // $collaborators = User::role('Collaborator')->get();
        $collaborators = array();
        /*if($user){*/

            $row = Experience::with('experienceImages')
                ->with('experienceType')
                ->with('experienceDatesActive')
                ->with('ExperienceAttractions')
                ->with('ExperiencesToGallerys')
                ->with('countryAreas')
                ->with("experienceCategories")
                //->with(['days.dayImages', 'days.dayInclusions'])
                ->with(['days.dayImages','days.dayInclusions'])
                ->with(['ExperienceHotels' => function ($q) {
                    //$q->where('experiences_to_hotels.deleted_at', null);
                    $q->where('experiences_to_hotels.is_deleted', null);
                    $q->orderBy('pivot_standard_hotel', 'desc');
                }])
                ->with('ship.shipCabins')
                ->with("еxperiencesToHotelsToExperienceDates")
                ->where('active', '=', 1)
                ->findOrFail($id);
            // pr($row); 
            // exit();
            $row->title = $row->name;
            // pr($row->ExperienceAttractions); exit();
            if($row->url){
                return Redirect::to($row->url, 301);
            }
            //$reviews = CartExperience::with(['reviews'])->where('experiences_id',$id)->get()->toArray();
            /*reviews.experiences_id = '.$id.' or */
            $reviews = ReviewsDisplayCount::selectRaw('reviews.*,c.experience_name')->leftjoin('reviews as reviews','reviews_display_count.review_id','=','reviews.id')->leftjoin('cart_experiences as c','c.id','reviews.cart_experience_id','=','reviews.id')->whereRaw('reviews.deleted_at is NULL and (reviews_display_count.experience_id = '.$id.')')/*->orWhere('reviews.experiences_id', $id)->orWhere('reviews_display_count.experience_id', $id)*/->groupBy('reviews.id')->get()->toArray();
            //prd($reviews);
            $cartExperiences = CartExperience::where('deleted_at',null)->get()->toArray();
            $experiences = '';
            if(!empty($cartExperiences)){
                $experiences_id = array_unique(array_column($cartExperiences,'experiences_id'));
                $experiences = Experience::with('experienceDates')->with('experienceImages')->where('active', "=", 1 )->where('exp_type', "=", 1 )->whereIn('id',$experiences_id)->get()->toArray();
            }
            $brochures = Brochures::where('experience_id',$id)->first();
            $view = view('product.product_preview', compact('row','collaborators','reviews','brochures','experiences','map'));
            echo $view->render();
            die();
            //return view('show_experience', compact('row'));
       /* }else{
             $currenturl = url()->full();
            Session::put('back_url',$currenturl);
            return redirect('/login?msg=error');
            
        }*/
    }
    
    public function cruise_show($id,Request $request )
    {

        $data = $request->all();
        $map = isset($data["map"])?$data["map"]:'';
        $user = Auth::user();
        $collaborators = User::role('Collaborator')->get();
        $crossings = ExperiencesShipCrossings::where('experience_id',$id)->get();
       
        if($user){
            
            /*$row = Ship::with('shipImages')
                ->with('shipDates')              
                ->with('shipCabins')
                ->where('active', '=', 1)
                ->findOrFail($id);*/
            $row = Experience::with('experienceImages')
                ->with('experienceType')
                ->with('experienceCruiseDatesActive')
                ->with('ExperienceAttractions')
                ->with('ExperiencesToGallerys')
                ->with('countryAreas')
                ->with("experienceCategories")
                //->with(['days.dayImages', 'days.dayInclusions'])
                ->with(['days.dayImages','days.dayInclusions'])
               
               /* ->with(['ExperienceShips' => function ($q) {
                    //$q->where('experiences_to_hotels.deleted_at', null);
                    $q->where('experiences_to_ships.is_deleted', null);
                    
                }])*/
                ->with('ship.shipCabins')
                ->with("еxperiencesToShipsToExperienceDates")
                ->where('active', '=', 1)
                ->findOrFail($id);

            // pr($row); 
            // exit();
            $row->title = $row->name;
            // pr($row->ExperienceAttractions); exit();
            if($row->url){
                return Redirect::to($row->url, 301);
            }
            //$reviews = CartExperience::with(['reviews'])->where('experiences_id',$id)->get()->toArray();
            /*reviews.experiences_id = '.$id.' or */
            $cartExperiences = CartExperience::where('deleted_at',null)->get()->toArray();
            $experiences = '';
            if(!empty($cartExperiences)){
                $experiences_id = array_unique(array_column($cartExperiences,'experiences_id'));
                $experiences = Experience::with('experienceDates')->with('experienceImages')->where('active', "=", 1 )->where('exp_type', "=", 2 )->whereIn('id',$experiences_id)->get()->toArray();
            }
            $brochures = Brochures::where('experience_id',$id)->first();
            $view = view('show_cruise', compact('row','collaborators','experiences','map','crossings','brochures'));
            echo $view->render();
            die();
            //return view('show_experience', compact('row'));
        }else{
             $currenturl = url()->full();
            Session::put('back_url',$currenturl);
            return redirect('/login?msg=error');
            /*return redirect()->route('login')
            ->with('error','You need to be logged in to view products!');*/
        }
    }
    
    public function uploadExperience(Request $request){
        $data = $request->all();
        $experience_id = $data['experience_id'];
        $experienceImages = $data['experienceImages'];
        foreach ($experienceImages as $photo) {

            $filename = $photo->store('/public/experience_images');
            // $experience_photo = ExperiencesToExperiencesImages::create([
                // 'experiences_to_experiences_id' => $eTe->id,
            $experience_photo = ExperienceImage::create([
                'experiences_id' => $experience_id,
                'file' => str_replace('public/', '',$filename)
            ]);
        }
        return redirect()->route('experience.show',$experience_id)
            ->with('success','Image uploaded successfully');
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
    public function search(Request $request)
    {
        $countries = Country::with("countryAreas.experiences")->get();
        $experienceCategories = ExperienceCategory::getAll();
        $experienceExtras = ExperienceExtra::getAll();
        //dbg2($countries); exit();

        $data = $this->getData($request);
         $search_txt = !empty($request->search_text)?$request->search_text:'';    
        if(!empty($search_txt))
        {
            
            $exp = ExperienceExtra::whereRaw('(name like "%'.$search_txt.'%" )')->get();
            
            if(empty($exp[0]))
            {
                $experiences = Experience::with("experienceCategories")->with('experienceDates')->with('experienceCruiseDates')->with('experienceImages')->with('ExperienceAttractions')->where('active', "=", 1 )->whereRaw('(name like "%'.$search_txt.'%" or description like "%'.$search_txt.'%")')->where('exp_type', "=", 3 );
            }
            else{
                $experiences = Experience::with("experienceCategories")->with('experienceDates')->with('experienceCruiseDates')->with('experienceImages')->with('ExperienceAttractions')->where('active', "=", 1 )->where('exp_type', "=", 3 );
              
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
            $experiences = Experience::with("experienceCategories")->with('experienceDates')->with('experienceCruiseDates')->with('experienceImages')->with('ExperienceAttractions')->where('active', "=", 1 )->where('exp_type', "=", 3 );
              
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
         if(isset($data["experience_extras_id"])){
            $experience_extras_id = $data["experience_extras_id"];

            $experiences->whereHas('experienceExtras', function ($query) use ($experience_extras_id) {
                $query->whereIn('experience_extras.id', $experience_extras_id);
            });
        }
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
        $country_areas_id = [];
        if(isset($data["country_areas_id"])){
            $country_areas_id = $data["country_areas_id"];

            foreach ($countries as $k => $v){
                foreach($v->countryAreas as $kk => $vv){
                    $vv->selected = false;
                    foreach ($country_areas_id as $vvv){
                        if($vvv == $vv->id){
                            $vv->selected = true;
                            break;
                        }
                    }
                }
            }

            $experiences->whereHas('countryAreas', function ($query) use ($country_areas_id) {
                $query->whereIn('country_areas.id', $country_areas_id);
            });
        }

        if(isset($data["years"]) && isset($data["months"])){
            $years = $data["years"];
            $months = $data["months"];
            $yearMonths = [];
            foreach ($years as $v){
                foreach ($months as $vv){
                    $yearMonths[] = $v.$vv;
                }
            }

            foreach ($yearMonths as $k => $yearMonth){
                if($k === 0) {
                    $experiences->whereHas('experienceDates', function ($query) use ($yearMonth) {
                        //$query->whereBetween('2020-08-03', ['experienceDates.date_from', 'experienceDates.date_to']);
                        $query->whereRaw('? between EXTRACT(YEAR_MONTH FROM experience_dates.date_from) and EXTRACT(YEAR_MONTH FROM experience_dates.date_to)', [$yearMonth]);
                    });
                }else{
                    $experiences->orWhereHas('experienceDates', function ($query) use ($yearMonth) {
                        //$query->whereBetween('2020-08-03', ['experienceDates.date_from', 'experienceDates.date_to']);
                        $query->whereRaw('? between EXTRACT(YEAR_MONTH FROM experience_dates.date_from) and EXTRACT(YEAR_MONTH FROM experience_dates.date_to)', [$yearMonth]);
                    });
                }
            }
        }else if(isset($data["years"])){
            $years = $data["years"];
            foreach ($years as $k => $yaer){
                if($k === 0){
                    $experiences->whereHas('experienceDates', function ($query) use ($yaer) {
                        $query->whereRaw('? between EXTRACT(YEAR FROM experience_dates.date_from) and EXTRACT(YEAR FROM experience_dates.date_to)', [$yaer]);
                    });
                }else{
                    $experiences->orWhereHas('experienceDates', function ($query) use ($yaer) {
                        $query->whereRaw('? between EXTRACT(YEAR FROM experience_dates.date_from) and EXTRACT(YEAR FROM experience_dates.date_to)', [$yaer]);
                    });
                }
            }
        }else if(isset($data["months"])){
            $months = $data["months"];
            foreach ($months as $k => $month){
                if($k === 0){
                    $experiences->whereHas('experienceDates', function ($query) use ($month) {
                        $query->whereRaw('? between EXTRACT(MONTH FROM experience_dates.date_from) and EXTRACT(MONTH FROM experience_dates.date_to)', [$month]);
                    });
                }else{
                    $experiences->orWhereHas('experienceDates', function ($query) use ($month) {
                        $query->whereRaw('? between EXTRACT(MONTH FROM experience_dates.date_from) and EXTRACT(MONTH FROM experience_dates.date_to)', [$month]);
                    });
                }
            }
        }

        if(isset($data["price_from"]) && isset($data["price_to"])){
            $price_from = $data["price_from"];
            $price_to = $data["price_to"];
            if($price_from > 0){
                $experiences->whereHas('experienceDates', function ($query) use ($price_from, $price_to) {
                    $query->whereRaw('IFNULL(experience_dates.price, experiences.price) between ? AND ? ', [$price_from, $price_to]);
                });
            }

        }

        $items = $experiences->get();
        
        return view('search', compact('items', 'countries', 'experienceCategories', 'experienceExtras', 'country_areas_id'));
    }

    public function searchAjax(Request $request, Ajax $ajax) {
        $data = $this->getData($request);
        
        $experiences = Experience::with("experienceCategories")->with('experienceDates')->with('experienceImages')->where('experiences.active', "=", 1 )->where('exp_type', "=", 3 );

        if(isset($data["experience_categories_id"])){
            $experience_categories_id = $data["experience_categories_id"];

            $experiences->whereHas('experienceCategories', function ($query) use ($experience_categories_id) {
                $query->whereIn('experience_categories.id', $experience_categories_id);
            });
        }

        if(isset($data["experience_extras_id"])){
            $experience_extras_id = $data["experience_extras_id"];

            $experiences->whereHas('experienceExtras', function ($query) use ($experience_extras_id) {
                $query->whereIn('experience_extras.id', $experience_extras_id);
            });
        }
        if(isset($data["experience_date"])){
            $experience_date = $data["experience_date"];

           $output['experience_date'] == $data["experience_date"];
        }
        $country_areas_id = [];
        if(isset($data["country_areas_id"])){
            $country_areas_id = $data["country_areas_id"];

            $experiences->whereHas('countryAreas', function ($query) use ($country_areas_id) {
                $query->whereIn('country_areas.id', $country_areas_id);
            });
        }
        // $experiences->whereHas('experienceDates', function ($query) {
        //     $query->whereRaw('IFNULL(experience_dates.price, experiences.price) between ? AND ? ', [0, 2000]);
        // });
        parse_str($data["filter_serial"], $output);
        if($output['sortby'] == 'price-desc'){
            $items = $experiences->get(); 
            if(!empty($items)){
                foreach ($items as $key => $item) {
                    if(!empty($item->experienceDates)){
                        $dates_rates = array();
                        $rates = array();
                        $price = array();
                        foreach ($item->experienceDates as $k => $value) {
                            if(!empty($value->dates_rates_id)){
                                $dates_rates[] = 


DB::connection('mysql_veenus')->table('experience_dates_rates')->where('id', $value->dates_rates_id)->first();
                            }
                            $price[] = $value->price;
                        }
                        $minprice = '';
                        if(!empty($dates_rates)){
                            $rates = array_filter(array_column($dates_rates, 'rate'));
                        }else{
                            $rates[] = $item->rate;
                        }
                        if(!empty($rates)){
                            $minprice = min($rates);
                        }
                        $item->price = $minprice;
                    }
                }
	           	$items = Arr::sort($items, function($exp)
	            {
	                return $exp->price;
	            });
            }
        }elseif($output['sortby'] == 'postdate-desc'){
            $experiences->orderBy('created_at','DESC');
        	$items = $experiences->get();
        }elseif($output['sortby'] == 'mobility-desc'){
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
            'country_areas_id' => 'nullable|array',
            'country_areas_id' => 'exists:country_areas,id',
            'years' => 'nullable|array',
            'months' => 'nullable|array',
            'filter_serial' => 'nullable',
            'dates_id' => 'nullable|numeric',
            'id' => 'nullable|numeric',
        ];

        return $request->validate($rules);
    }
}
