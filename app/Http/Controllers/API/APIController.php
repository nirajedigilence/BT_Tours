<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Config;
use DB;
use URL;
use Mail;
use Hash;
use DateTime;
use Illuminate\Http\Request;
use App\Models\Cms\Country;
use App\Models\Cms\Experience;
use App\Models\Cms\CountryArea;

use Illuminate\Support\Str;

class APIController extends Controller
{
    /**
     * @var bool
     */
    public $loginAfterSignUp = true;

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
   
    public function get_countries()
    {
        $countries = Country::get();
        if(!empty($countries[0]))
        {
            return response()->json([
                'code' => 200,
                'status'   =>  'error',
                'data'      =>  $countries
            ], 200);
        }
         else
         {
            return response()->json([
                'code' => 401,
                'status'   =>  'error',
                'message'  => 'No data found',
                'data'      =>  array()
            ], 401);
         }
    }
    public function get_country_area(Request $request)
    {
        $countries = CountryArea::select('id','name','countries_id')->where('countries_id',$request->country_id)->get();
        if(!empty($countries[0]))
        {
            return response()->json([
                'code' => 200,
                'status'   =>  'error',
                'data'      =>  $countries
            ], 200);
        }
         else
         {
            return response()->json([
                'code' => 401,
                'status'   =>  'error',
                'message'  => 'No data found',
                'data'      =>  array()
            ], 401);
         }
    }
    //get show tour list
    public function get_tour_slider()
    {
        $image_url = getenv('IMAGE_URL');
        $expriences = Experience::select('id','name','excerpt','description','rate','nights','fixtures')->where('active','1')->where('show_tour','1')->get();
        $expriencesar = array();
        if(!empty($expriences[0]))
        {
            foreach ($expriences as $key => $item) {
                $expriencesar[$key]['id'] = $item->id;
                $expriencesar[$key]['name'] = $item->name;
                $expriencesar[$key]['excerpt'] = $item->excerpt;
                $expriencesar[$key]['description'] = $item->description;
                $expriencesar[$key]['rate'] = $item->rate;
                $expriencesar[$key]['nights'] = $item->nights;
                $expriencesar[$key]['fixtures'] = !empty($item->fixtures)?count(unserialize($item->fixtures)):'';
                $expriencesar[$key]['attractions'] = !empty($item->ExperienceAttractions)?count($item->ExperienceAttractions):'';

                $expriencesar[$key]['exp_image'] = !empty($item->experienceImages->offsetGet(0)->file)?$image_url."storage/".$item->experienceImages->offsetGet(0)->file:'';

            }
            
            return response()->json([
                'code' => 200,
                'status'   =>  'error',
                'data'      =>  $expriencesar
            ], 200);
        }
         else
         {
            return response()->json([
                'code' => 401,
                'status'   =>  'error',
                'message'  => 'No data found',
                'data'      =>  array()
            ], 401);
         }
    }
    
}
