<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\PDF;
use Illuminate\Support\Facades\Cookie;

function pr($array) {
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
function prd($arr)
    {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
        die;
    } 
    function getBtUserValue1() {
         //$bt_user = Cache::get('bt_user');
         $bt_user = array();
        return $bt_user['user_id'] ?? null;
    }
    /*function getUserData() {
        $bt_user = Session::get('user');

        return $bt_user['data'] ?? array();
    }*/
    function getUserData1() {
        //$bt_user = Cache::get('bt_user');
        $bt_user = array();
        return $bt_user['data'] ?? null;
    }
    function getBtUserValue() {
        $bt_user = json_decode(Cookie::get('bt_user'), true);

        if (empty($bt_user) || !is_array($bt_user)) {
            return null;
        }

        return $bt_user['user_id'] ?? null;
    }

    function getUserData() {
        $bt_user = json_decode(Cookie::get('bt_user'), true);

        if (empty($bt_user) || !is_array($bt_user)) {
            return null;
        }

        return $bt_user['data'] ?? null;
    }
    function encrept_code($plaintext, $key = null)
    {
        if (!$key) {
            $appKey = config('app.key');
            if (strpos($appKey, 'base64:') === 0) {
                $key = substr(base64_decode(substr($appKey, 7)), 0, 16);
            } else {
                $key = substr($appKey, 0, 16);
            }
        }

        $iv = random_bytes(16);
        $ciphertext = openssl_encrypt($plaintext, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv);
        return rtrim(strtr(base64_encode($iv . $ciphertext), '+/', '-_'), '=');
    }

    function decrept_code($encoded, $key = null)
    {
        if (!$key) {
            $appKey = config('app.key');
            if (strpos($appKey, 'base64:') === 0) {
                $key = substr(base64_decode(substr($appKey, 7)), 0, 16);
            } else {
                $key = substr($appKey, 0, 16);
            }
        }

        $data = base64_decode(strtr($encoded, '-_', '+/'));
        $iv = substr($data, 0, 16);
        $ciphertext = substr($data, 16);
        return openssl_decrypt($ciphertext, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv);
    }
function readMoreHelper($string, $chars = 50)
{
    return strlen($string) >= $chars ? substr($string, 0, $chars - 5) . ' ...' :
        $string;
}

function getOneMonthOldDate($date = '')
{
    return date("d/m/Y", strtotime( $date. "-1 month" ) );
}

function convert2YMD($date = '')
{
    $var = $date;
    $date = str_replace('-', '/', $var);

    return date('Y-m-d', strtotime($date));
}
function convert2DMY($date = '')
{
    $var = $date;
    $date = str_replace('-', '/', $var);

    return date('d/m/Y', strtotime($date));
}

function convert2DMYForHotelDates($date = '')
{
    $var = $date;
    $date = str_replace('-', '/', $var);

    return date("D d F'y", strtotime($date));
}

function convert2DMYCmt($date = '')
{
    $var = $date;
    $date = str_replace('-', '/', $var);

    return date('d F yy', strtotime($date));
}

function convert2DMYNotes($date = '')
{
    $var = $date;
    $date = str_replace('-', '/', $var);

    return date('H:i d/m/yy', strtotime($date));
}

function getLoginUserId(){
    $user = Auth::user();
    $id = Auth::id();
    return $id;    
}

function getUserNames($id){

    $userInfo = 


DB::connection('mysql_veenus')->table('users')
        ->where('id', $id)
        ->first();
    return $userInfo->name;
}

function getCntForProductByPrototype($id){

    $userId = 


DB::connection('mysql_veenus')->table('products')
        ->where('is_prototype', $id)
        ->where('status', '1')
        ->where('deleted_at', NULL)
        ->get()->count();
    return $userId;
}
function getCntForExperiences($id){
    $userId = 


DB::connection('mysql_veenus')->table('experiences')
        ->where('tour_id', $id)
        //->where('active', '1')
        ->where('deleted_at', NULL)
        ->get()->count();
    return $userId;
}

function messageReadForEnquiries($enquiry_id){
    $userId = getLoginUserId();
    


DB::connection('mysql_veenus')->table('enquiries_messages')
        ->where('enquiry_id', $enquiry_id)
        ->where('user_id',"!=", $userId)  
        ->update(array('read' => '1'));  
    return true;
}
function getCurrency($cart_exp_id){
    $cartsDB = 


DB::connection('mysql_veenus')->table('cart_experiences')->select("currency")->where("id", $cart_exp_id)->first();
    if($cartsDB->currency == '2')
    {
         $currency_symbol = '€';
    }
    else
    {
         $currency_symbol = '£';
    }
    return $currency_symbol;
    // return $user_id;
}
function getCurrencySymbol($currency){
    if($currency == '2')
    {
         $currency_symbol = '€';
    }
    else
    {
         $currency_symbol = '£';
    }
    return $currency_symbol;
    // return $user_id;
}
function getUserName($cart_id){
    $cartsDB = 


DB::connection('mysql_veenus')->table('carts')->select("user_id")->where("id", $cart_id)->first();

    $locationsDB = 


DB::connection('mysql_veenus')->table('users')->select("name")->where("id", $cartsDB->user_id)->first();
    // return $cartsDB->user_id;
    return $locationsDB->name;
    // return $user_id;
}

function getCountryAreaName($country_area_id){
    $countryAreaName = 


DB::connection('mysql_veenus')->table('country_areas')->select("*")->where("id", $country_area_id)->first();
    if(!empty($countryAreaName->countries_id))
    {
        $countryName = 


DB::connection('mysql_veenus')->table('countries')->select("*")->where("id", $countryAreaName->countries_id)->first();

        return $countryName->name.' - '.$countryAreaName->name;
        // return $country_id;
    }
    else
    {
        return '';
    }
    
}

function getCancellationReasons(){
    $cancellationReasonsDB = 


DB::connection('mysql_veenus')->table('cancellation_reasons')->select("*")->where("active", "1")->get();
    return $cancellationReasonsDB;
}

function getHotelDetail($id){
    $cancellationReasonsDB = 


DB::connection('mysql_veenus')->table('hotels')->select("*")->where("id", $id)->first();
    return $cancellationReasonsDB;
}
function getCartExperiencesDetail($id){
    $cancellationReasonsDB = 


DB::connection('mysql_veenus')->table('cart_experiences')->select("*")->where("id", $id)->first();
    return $cancellationReasonsDB;
}

function messageReadOrNotForEnquiries($enquiry_id){
    $userId = getLoginUserId();
    $locationsDB = 


DB::connection('mysql_veenus')->table('enquiries_messages')->select("*")->where("user_id","!=", $userId)->where("enquiry_id", $enquiry_id)->get();
    $isRead = '';
    foreach($locationsDB as $k => $v){
        if($v->read == '0'){
           $isRead = '1';
        }
    }        
    return $isRead;
}

function getProductLikeOrUnlike($product_id){
    $userId = getLoginUserId();
    $productShareData = 


DB::connection('mysql_veenus')->table('product_like_unlike')->select("*")->where("user_id", $userId)->where("product_id", $product_id)->first();
    if($productShareData){
        return $productShareData->like_unlike;
    }else{
        return '';
    }
}

function getProductLikes($product_id){
    $userId = getLoginUserId();
    $productShareData = 


DB::connection('mysql_veenus')->table('product_like_unlike')->select("*")->where("product_id", $product_id)->where("like_unlike", '1')->get();
    $cnt = 0;
    foreach ($productShareData as $key => $value) {
        if($value->like_unlike == '1'){
            $cnt++;
        }
    }
    return $cnt;
}
function getProductUnlikes($product_id){
    $userId = getLoginUserId();
    $productShareData = 


DB::connection('mysql_veenus')->table('product_like_unlike')->select("*")->where("product_id", $product_id)->where("like_unlike", '2')->get();
    $cnt = 0;
    foreach ($productShareData as $key => $value) {
        if($value->like_unlike == '2'){
            $cnt++;
        }
    }
    return $cnt;
}


function getLocationName($enquiry_id){
    $locationsDB = 


DB::connection('mysql_veenus')->table('enquiries_locations')->select("area_id")->distinct()->where("enquiry_id", $enquiry_id)->get();
    $locations = Array();
    foreach($locationsDB as $k => $v){
        $locTmp = 


DB::connection('mysql_veenus')->table('country_areas')->select(DB::raw("name, (SELECT name FROM countries WHERE id = countries_id) AS country_name"))->distinct()->where("id", $v->area_id)->get();
        $locations[] = $locTmp;
        //$experienceCatsIds[] = $v->experience_id;
    }
    // return $locations;
    $retuVal = '';
    foreach ($locations as $location) {
        foreach ($location as $itmL) {
            $retuVal .= $itmL->name .', '.$itmL->country_name;
        }
    }
    return $retuVal;
}
function dbg($var){

    if ( $_SERVER["REMOTE_ADDR"] == "84.201.192.58" || $_SERVER["REMOTE_ADDR"] == "87.120.113.171" || $_SERVER["REMOTE_ADDR"] == "95.42.133.174" ){
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    }

}
function dbg2($var){

    if ( $_SERVER["REMOTE_ADDR"] == "84.201.192.58" || $_SERVER["REMOTE_ADDR"] == "87.120.113.171" || $_SERVER["REMOTE_ADDR"] == "95.42.133.174" ){
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
    }

}
function allRoomType()
{
    $locationsDB = 


DB::connection('mysql_veenus')->table('hotel_rooms')->where("active", '1')->get();
    /*$array = array(
        '1' => 'Single',
        '2' => 'Double',
        '3' => 'Twin',
        '4' => 'Triple',
        '5' => 'Quadruple',
    );
    asort($array);
    if ($id != "") {
        if (isset($array[$id])) {
            return $array[$id];
        }

        return "";
    } else {
        return $array;
    }*/
    return $locationsDB;
}
function getGeoCode($address)
{
        // geocoding api url
        /*$url = "http://maps.google.com/maps/api/geocode/json?address=$address&key=AIzaSyB2c32DXA3HPKVco4aHZ-8iM353g5LkaGE";
        // send api request
        $geocode = file_get_contents($url);
        $json = json_decode($geocode);*/
        //$address = "Sedgemoor+Way+Daventry+NN11+0SG+Sedgemoor+Way+Daventry+NN11+0SG+England";
        $address = str_replace(' ', '+', $address);
        $address = str_replace(',', '+', $address);

        //echo $address;
        if(!empty($address))
        {
            $url = "https://maps.google.com/maps/api/geocode/json?address=$address&key=AIzaSyCkNHRH55QL_F2bK3tZXDdhuUXE49ksG0Y";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $response = curl_exec($ch);
            curl_close($ch);
            $response_a = json_decode($response);
            //pr($response_a);exit;
            if(!empty($response_a))
            {
                $lat = !empty($response_a->results[0]->geometry->location->lat)?$response_a->results[0]->geometry->location->lat:'';
                $long = !empty($response_a->results[0]->geometry->location->lng)?$response_a->results[0]->geometry->location->lng:'';
            }
        }
        else
        {
            $lat = '';
            $long = '';
        }
        
        

        $data['lat'] = !empty($lat)?$lat:'';
        $data['lng'] = !empty($long)?$long:'';
        //pr($data);exit;
        return $data;
}
/*function check_subaccount_access($access_id)
{
    $user = Auth::user();
    $access = $user->access_section;
    $access_array = !empty($access)?explode(',',$access):array();
    //pr($access_array);
    if(!empty($access_array) && in_array($access_id,$access_array))
    {
        return true;
    }
    else
    {
        if(empty($user->parent_user))
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }

}*/
function check_subaccount_access($access_id)
{
    $userdata = Session::get('sub_account_data');
    if(isset($userdata) && !empty($userdata))
    {
        $user =  


DB::connection('mysql_veenus')->table('users')->where("id",$userdata['id'])->first();
        if(!empty($user->parent_user))
        {
            $sub_account_data = array(
                'id' =>$user->id,
                'parent_user' =>$user->parent_user,
                'name' =>$user->name,
                'email' =>$user->email,
                'title' =>$user->title,
                'turn_off_sign_doc' =>$user->turn_off_sign_doc,
                'access_section' =>$user->access_section
            );
            Session::put('sub_account_data',$sub_account_data);
        }
    }
    
    $user = Session::get('sub_account_data');
    if(isset($user) && !empty($user))
    {
        $access = $user['access_section'];
        $access_array = !empty($access)?explode(',',$access):array();
        //pr($access_array);
        if(!empty($access_array) && in_array($access_id,$access_array))
        {
            return true;
        }
        else
        {
            if(empty($user['parent_user']))
            {
                return true;
            }
            else
            {
                return false;
            }
            
        }
    }
    else
    {
        return true;
    }

}
function check_superuser_access($access_id)
{
     $user = Auth::user();

    $access = $user->access_section;
    if(!empty($access))
    {
        $access_array = !empty($access)?explode(',',$access):array();
    
        if(!empty($access_array) && in_array($access_id,$access_array))
        {
            return true;
        }
        else
        {
             return false;
            
        }
    }
    else
    {
         return true;
        
    }

}
function check_allow_booking()
{
     $userdata = Session::get('sub_account_data');
    if(isset($userdata) && !empty($userdata))
    {
        $user =  


DB::connection('mysql_veenus')->table('users')->where("id",$userdata['id'])->first();

        $allow_booking = $user->allow_booking;
        if(!empty($allow_booking) && $allow_booking == 1)
        {
            return true;
        }
        else
        {
            if(!empty($allow_booking) && $allow_booking == 2)
            {
                return false;
            }
            else
            {
             return true;
            }
            
        }
    }else
    {
     return true;
    }

}
function summarize($text, $length, $append = '...', $splitOnWholeWords = true)
{
    // If the length of text is shorter than the input text nothing needs to be done
    // and we can just return the input text
    if (strlen($text) <= $length) return $text;
    // initialize the $split variable
    $split = 0;
    if ($splitOnWholeWords) // If we want to split on whole words ...
    {
        // initialze variables
        $i = 0; $lplus1 = $length + 1;
        // Keep scanning the string for spaces until we end up on a position
        // in the string that is larger than $length
        while (($i = strpos($text, ' ', $i + 1)) < $lplus1)
        {
            if ($i === false) break; // There are no more spaces in the string
            $split = $i; // Split the string after $split characters
        }
    }
    else // ... otherwise, if we don't want to split on whole words
        $split = $length;

    // Take the found portion of the string and append $append
    return substr($text, 0, $split).$append;
}
function truncate ($str, $length) {

    if (strlen($str) > $length) {
        $str = substr($str, 0, $length+1);
        $pos = strrpos($str, ' ');
        $str = substr($str, 0, ($pos > 0)? $pos : $length);
    }
    return $str;
}
function breakStr($string,$length){
    $stringAry      =   explode("||",wordwrap($string, $length, "||"));
    foreach($stringAry as $key=>$val){
        //print '['.$key.'] Character length <strong>('.strlen($val).')</strong><br />';
    }
    return $stringAry;
}
function get_exp_mobility($mobility)
{
    $m_array = array('1'=>'1 - Low','2'=>'2 - Low with steps','3'=>'3 - Medium','4'=>'4 - High','5'=>'5 - Active');
    return $m_array[$mobility];
}
function get_total_pax($cart_exp_id,$guest=''){
  $cart_experience = 


DB::connection('mysql_veenus')->table('cart_experiences')->where("id", $cart_exp_id)->get();
 $cartExperiencesToRoomsAll = App\Models\Cms\CartExperiencesToRooms::with('cartExperiencesToRoomsRequests')->whereIn('room_request_status',['self','approved'])->where("cart_exp_id", $cart_exp_id)->whereRaw('(cancellation_request_status IS NULL or cancellation_request_status = "declined")')->get();
$rooms_ppl = 0;
$rooms_sold = 0;
 foreach ($cartExperiencesToRoomsAll as $key => $value) {
   
    /*if(empty($value->cancellation_request_status) || $value->cancellation_request_status == 'declined')
    {*/
            //pr($value);
            if($value->paid == 1 || $value->deposit == 1){
                $ple = 1;
                if($value->room_id == 1)
                {
                    $ple = 1;
                }
                else if($value->room_id == 2 || $value->room_id == 3)
                {
                    $ple = 2;
                }
                else if($value->room_id == 4)
                {
                    $ple = 3;
                }
                else if($value->room_id == 5)
                {   
                    $ple = 4;
                }
                //$rooms_ppl = $rooms_ppl+$ple;
                $rooms_sold = $rooms_sold+1;
                if(!empty($value->names)){
                    $names = array_filter(explode(',', $value->names));
                    $rooms_ppl  = $rooms_ppl+count($names);
                }
            }
        }
        //$d_cnt = (!empty($cart_experience[0]->driver_name) && ($cart_experience[0]->driver_room_type == '2' || $cart_experience[0]->driver_room_type == '3'))?'1':'0';
        /*$d_cnt = 0;
        if(!empty($cart_experience[0]->driver_paying) && $cart_experience[0]->driver_paying == 1)
        {
            $d_cnt += 1;
        }
        if(!empty($cart_experience[0]->driver_paying_second)  && $cart_experience[0]->driver_paying_second == 1)
        {
            $d_cnt += 1;
        }
        
        if(!empty($cart_experience[0]->driver_room_type) && $cart_experience[0]->driver_room_type == 1 && !empty($cart_experience[0]->driver_name))
        {
            $driver_count +=1;
        }*/
        $cart_experience[0]->driver_room_type = (!empty($cart_experience[0]->driver_room_type) && $cart_experience[0]->driver_room_type == 2 || $cart_experience[0]->driver_room_type == 3)?'2':$cart_experience[0]->driver_room_type;
         $cart_experience[0]->driver_room_type1 = (!empty($cart_experience[0]->driver_room_type1) && $cart_experience[0]->driver_room_type1 == 2 || $cart_experience[0]->driver_room_type1 == 3)?'2':$cart_experience[0]->driver_room_type1; 
        $driver_count = 0;
        $courier_count = 0;
        if(!empty($cart_experience[0]->driver_name) && !empty($cart_experience[0]->driver_name1))
        {
            $driver_count =2;
        }
        else
        {
            if(!empty($cart_experience[0]->driver_name))
            {
                $driver_count =1;
            }
            
        }
        //pr($cart_experience[0]);
        if(!empty($cart_experience[0]->courier_name) && !empty($cart_experience[0]->courier_name1) && $cart_experience[0]->driver_room_type == 2  && $cart_experience[0]->driver_room_type1 == 2)
        {
            $courier_count =2;
        }
        else
        { 
               if(!empty($cart_experience[0]->courier_name) && ($cart_experience[0]->driver_room_type == 2))
                {
                    $courier_count +=1;
                }
                if(!empty($cart_experience[0]->courier_name1) && ($cart_experience[0]->driver_room_type1 == 2) )
                {
                    $courier_count +=1;
                }
           
        }
        $driver_str = '';
        $courier_str = '';
        if(!empty($driver_count) || !empty($courier_count))
        {
            if(!empty($guest))
            {

                $driver_str = !empty($driver_count)?' + '.$driver_count.' driver':'';
                $courier_str = !empty($courier_count)?' + '.$courier_count.' courier':'';
            }
            else
            {     
                $driver_str = !empty($driver_count)?' + '.$driver_count.'Dr':'';
                $courier_str = !empty($courier_count)?' + '.$courier_count.'Cr':'';
            }
            
        }
       // $d_cnt = (!empty($cart_experience[0]->driver_paying) && !empty($cart_experience[0]->driver_paying_second))?'2':(!empty($cart_experience[0]->driver_paying)?'1':0);
        if(!empty($guest))
        {

            return $rooms_ppl.' guests '.$driver_str.$courier_str;
        }
        else
        {     
            return $rooms_ppl.' pax '.$driver_str.$courier_str;
        }
    /*}*/
        
}
function get_avg_score($reviews){

        if(!empty($reviews->submitted_review))
        {
            $submitted_review = unserialize($reviews->submitted_review);
               $total = 5;
               $que_1 =  !empty($submitted_review['hotels'][0]['que_1'])?$submitted_review['hotels'][0]['que_1']:0;
               $que_2 =  !empty($submitted_review['hotels'][0]['que_2'])?$submitted_review['hotels'][0]['que_2']:0;
               $que_3 =  !empty($submitted_review['hotels'][0]['que_3'])?$submitted_review['hotels'][0]['que_3']:0;
               $que_4 =  !empty($submitted_review['hotels'][0]['que_4'])?$submitted_review['hotels'][0]['que_4']:0;
               $avg_total = 0;
                if(!empty($submitted_review['experiences'])){
                    foreach ($submitted_review['experiences'] as $key => $v) {
                        $avg_total += $v['ans'];
                        $total +=1;
                    }
                }
                $overvie_que_1 =  !empty($submitted_review['hotels'][0]['que_1'])?$submitted_review['hotels'][0]['que_1']:0;
                $avg_total = $avg_total + $que_1 + $que_2 +$que_3 +$que_4+$overvie_que_1;
              /* echo $avg_total = $avg_total + $que_1 + $que_2 +$que_3 +$que_4+$overvie_que_1;
                echo '/';
               echo $total_all = $total*4;*/
                return  round($avg_total/$total);
        }
       
}
function get_total_room($cart_exp_id,$exp_date_id){
    $sngSCntsec1 = 0;
	$dblSCntsec1 = 0;
	$twnSCntsec1 = 0;
	$trpSCntsec1 = 0;
	$qrdSCntsec1 = 0;

    $sngSCntLinkSec1 = 0;
    $dblSCntLinkSec1 = 0;
    $twnSCntLinkSec1 = 0;
    $trpSCntLinkSec1 = 0;
    $qrdSCntLinkSec1 = 0;
    $cartExperiencesToRoomsAllSec = App\Models\Cms\CartExperiencesToMultiRooms::with('cartExperiencesToRoomsRequests')->whereIn('room_request_status',['self','approved'])->where("cart_exp_id", $cart_exp_id)->where("exp_date_id", $exp_date_id)->get();
    foreach ($cartExperiencesToRoomsAllSec as $key => $valuer) {
        //($value->room_id == '1' && $value->status == '1')

        if($valuer->room_id == '1' && $valuer->is_link == 0 && $valuer->cancellation_request_status == null){
            $sngSCntLinkSec1++;
        }else if($valuer->room_id == '2'  && $valuer->is_link == 0 && $valuer->cancellation_request_status == null){
            $dblSCntLinkSec1++;
        }else if($valuer->room_id == '3'  && $valuer->is_link == 0 && $valuer->cancellation_request_status == null){
            $twnSCntLinkSec1++;
        }else if($valuer->room_id == '4'  && $valuer->is_link == 0 && $valuer->cancellation_request_status == null){
            $trpSCntLinkSec1++; 
        }else if($valuer->room_id == '5'  && $valuer->is_link == 0 && $valuer->cancellation_request_status == null){ 
            $qrdSCntLinkSec1++;
        }
        if($valuer->room_id == '1' && $valuer->cancellation_request_status == null){
            $sngSCntsec1++;
        }else if($valuer->room_id == '2'  && $valuer->cancellation_request_status == null){
            $dblSCntsec1++;
        }else if($valuer->room_id == '3'  && $valuer->cancellation_request_status == null){
            $twnSCntsec1++;
        }else if($valuer->room_id == '4'  && $valuer->cancellation_request_status == null){
            $trpSCntsec1++; 
        }else if($valuer->room_id == '5'  && $valuer->cancellation_request_status == null){ 
            $qrdSCntsec1++;
        }
    }
    return array('single'=>$sngSCntsec1,'double'=>$dblSCntsec1,'twin'=>$twnSCntsec1,'triple'=>$trpSCntsec1,'qurd'=>$qrdSCntsec1,'singleLink'=>$sngSCntLinkSec1,'doubleLink'=>$dblSCntLinkSec1,'twinLink'=>$twnSCntLinkSec1,'tripleLink'=>$trpSCntLinkSec1,'qurdLink'=>$qrdSCntLinkSec1);
}

function check_primary_room($primary_id){
    $sngSCntsec1 = 0;
	$dblSCntsec1 = 0;
	$twnSCntsec1 = 0;
	$trpSCntsec1 = 0;
	$qrdSCntsec1 = 0;
    $cartExperiencesToRoomsAllSec = App\Models\Cms\CartExperiencesToMultiRooms::where("primary_room_id", $primary_id)->get()->toArray();
   
   return !empty($cartExperiencesToRoomsAllSec)?count($cartExperiencesToRoomsAllSec):'0';
}

function check_linkprimary_room($primary_id){
   
    $cartExperiencesToRoomsAllSec = App\Models\Cms\CartExperiencesToMultiRooms::where("primary_room_id", $primary_id)->get();
    $secondary = 1;
    $over_night =1;
    $sngSCntLinkstr1 = '';
    if(!empty($cartExperiencesToRoomsAllSec[0]))
    {
        foreach ($cartExperiencesToRoomsAllSec as $key => $valuer) {

            if($valuer->is_link == 0){
               $sngSCntLinkstr1 .= ($valuer->experience_type == 2)?"Secondary ".$secondary++.", ":"Overnight ".$over_night++.", ";
            }
            else
            {
                ($valuer->experience_type == 2)?$secondary++:$over_night++;
            }
           }
    }
   
   return $sngSCntLinkstr1;
}
function get_primary_room($cart_exp_id,$room_id)
{
    $cartExperiencesToRoomsAllSec = App\Models\Cms\CartExperiencesToRooms::with('cartExperiencesToRoomsRequests')->whereIn('room_request_status',['self','approved'])->where("cart_exp_id", $cart_exp_id)->where("room_id", $room_id)->get();
    $rooms = array();
    if(!empty($cartExperiencesToRoomsAllSec))
    {
        foreach($cartExperiencesToRoomsAllSec as $row)
        {
            if($row->cancellation_request_status == null){
                $rooms[]=$row->id;
            }
            
        }
    }
    return $rooms;

}
function get_total_room_count($cart_exp_id,$exp_date_id,$room_id){
    $sngSCntsec1 = 0;
    $dblSCntsec1 = 0;
    $twnSCntsec1 = 0;
    $trpSCntsec1 = 0;
    $qrdSCntsec1 = 0;

    $sngSCntLinkSec1 = 0;
    $dblSCntLinkSec1 = 0;
    $twnSCntLinkSec1 = 0;
    $trpSCntLinkSec1 = 0;
    $qrdSCntLinkSec1 = 0;
    $cartExperiencesToRoomsAllSec = App\Models\Cms\CartExperiencesToMultiRooms::with('cartExperiencesToRoomsRequests')->whereIn('room_request_status',['self','approved'])->where("cart_exp_id", $cart_exp_id)->where("exp_date_id", $exp_date_id)->where("room_id", $room_id)->get();
    foreach ($cartExperiencesToRoomsAllSec as $key => $valuer) {
        //($value->room_id == '1' && $value->status == '1')

        if($valuer->cancellation_request_status == null){
            $sngSCntLinkSec1++;
        }
        
    }
    return $sngSCntLinkSec1;
}
function get_days($date)
{
    $create_time = strtotime($date);
    //$create_time = "1496592689";
    $current_time = time();

    $dtCurrent = DateTime::createFromFormat('U', $current_time);
    $dtCreate = DateTime::createFromFormat('U', $create_time);
    $diff = $dtCurrent->diff($dtCreate);
    
    $interval = $diff->format("%y years %m month %d days");
    //$interval = $diff->format("%y years %m months %d days %h hours %i minutes %s seconds");
    $interval = preg_replace('/(^0| 0) (years|months|days|hours|minutes|seconds)/', '', $interval);
    return !empty($interval)?$interval:'0 days';
}
function get_minutes($date)
{
    $create_time = strtotime($date);
    $current_time = time();
    $minutes = floor(($current_time - $create_time) / 60);

    return ($minutes <= 0) ? 0 : $minutes;
}
function get_hotel_date($cart_exp_id)
{
    $cart_experience = App\Models\Cms\CartExperience::with('experiencesToHotelsToExperienceDate')->where("id", $cart_exp_id)->first();
    
    $experience = App\Models\Cms\Experience::with(['еxperiencesToHotelsToExperienceDates'])->where('id' ,$cart_experience->experiences_id)->get()->first();
    $hotel = array();
    $hotel_name = array();
    if(!empty($experience->еxperiencesToHotelsToExperienceDates)){
        foreach ($experience->еxperiencesToHotelsToExperienceDates as $key => $value) {
            if(isset($value->experienceDate->dates_rates_id) && $value->experienceDate->dates_rates_id == $cart_experience->dates_rates_id){

                    
                $hotel[] = !empty($value->hotel['name'])?$value->hotel['name']:'';

                
            }
        }
    }
    $experienceDate = App\Models\Cms\ExperienceDate::where('dates_rates_id', $cart_experience->dates_rates_id)->where('experiences_id', $cart_experience->experiences_id)->orderBy('date_from','ASC')->get()->toArray();
       $e_dates = array();
        if(!empty($experienceDate)){
            foreach ($experienceDate as $key => $value) {
                if(!empty($value['dates_rates_id'])){
                    $e_dates['date_from'][] = strtotime($value['date_from']);
                    $e_dates['date_to'][] = strtotime($value['date_to']);
                }
            } 
        }
        if ( !empty( $e_dates['date_from'] ) ) {
            $_dateMin = min($e_dates['date_from']);
        }else{
            $_dateMin = 0 ;
        }
        if ( !empty( $e_dates['date_to'] ) ) {
             $_dateMax = max($e_dates['date_to']);
        }else{
            $_dateMax = 0 ;
        }
       
        $diff = $_dateMax - $_dateMin; 
        $nights = round($diff / 86400);
        return array('hotel_name'=>implode(',',$hotel),'date_from'=>date("D d M", $_dateMin) ,'date_to'=>date("D d M 'y", $_dateMax)  ,'nights'=>$nights);
}
function get_ship_date($cart_exp_id)
{
    $cart_experience = App\Models\Cms\CartExperience::where("id", $cart_exp_id)->first();
    
    $experienceCruise = App\Models\Cms\ExperienceCruiseDate::where('dates_rates_id' ,$cart_experience->cruise_dates_rates_id)->get()->first();
    
    $hotel = array();
    $hotel[] = !empty($experienceCruise->shipDates->ship->name)?$experienceCruise->shipDates->ship->name:'';
    $experienceDate = App\Models\Cms\ExperienceCruiseDate::where('dates_rates_id', $cart_experience->cruise_dates_rates_id)->where('experiences_id', $cart_experience->experiences_id)->orderBy('date_from','ASC')->get()->toArray();
       $e_dates = array();
        if(!empty($experienceDate)){
            foreach ($experienceDate as $key => $value) {
                if(!empty($value['dates_rates_id'])){
                    $e_dates['date_from'][] = strtotime($value['date_from']);
                    $e_dates['date_to'][] = strtotime($value['date_to']);
                }
            } 
        }
        if ( !empty( $e_dates['date_from'] ) ) {
            $_dateMin = min($e_dates['date_from']);
        }else{
            $_dateMin = 0 ;
        }
        if ( !empty( $e_dates['date_to'] ) ) {
             $_dateMax = max($e_dates['date_to']);
        }else{
            $_dateMax = 0 ;
        }
       
        $diff = $_dateMax - $_dateMin; 
        $nights = round($diff / 86400);
        return array('hotel_name'=>implode(',',$hotel),'date_from'=>date("D d M", $_dateMin) ,'date_to'=>date("D d M 'y", $_dateMax) ,'date_from_org'=>date("Y-m-d", $_dateMin),'date_to_org'=>date("Y-m-d", $_dateMax)  ,'nights'=>$nights);
}
function download_hotel_tds($cart_exp_id)
{
     if(!empty($cart_exp_id))
        {
             $cart_exp_id = $cart_id;
                $cart_experience = App\Models\Cms\CartExperience::with('experiencesToHotelsToExperienceDate','cartExperiencesToAttraction')->where("id", $cart_exp_id)->first();

                $cartExperiencesToRooms = App\Models\Cms\CartExperiencesToRooms::with('cartExperiencesToRoomsRequests')->where("cart_exp_id", $cart_exp_id)->get();
                
                // $hotel_id = $cart_experience->hotels_id;
                $experience = App\Models\Cms\Experience::with(['getCountryAreas'])->where('id' ,$cart_experience->experiences_id)->get()->first();
                $hotel = array();
                $exToHotel = array();
                if(!empty($experience->еxperiencesToHotelsToExperienceDates)){
                    foreach ($experience->еxperiencesToHotelsToExperienceDates as $key => $value) {
                        if(isset($value->experienceDate->dates_rates_id) && $value->experienceDate->dates_rates_id == $cart_experience->dates_rates_id){
                            $hotel[$key] = $value->hotel;
                            $hotel[$key]['exToHotel'] = App\Models\Cms\ExperiencesToHotel::where('hotels_id', $value->hotel->id)->where('experiences_id', $experience->id)->first();
                        }
                    }
                }
                $rooms_sold = 0;
                $rooms_ppl = 0;
                
                // $hotels = 


                DB::connection('mysql_veenus')->table('hotels')->where("id", $hotel_id)->get();
                                // $hotel_rooms = 


                DB::connection('mysql_veenus')->table('hotels_to_hotel_rooms')->where("hotels_id", $hotel_id)->get();
                                $cartExeToTour = 


                DB::connection('mysql_veenus')->table('cart_experiences_to_tour_statuses')->where("cart_experiences_id", $cart_exp_id)->where('tour_statuses_id', '1')->first();
                                // foreach($hotel_rooms as $k => $v){
                                    
                                    $room_info = 


                DB::connection('mysql_veenus')->table('hotel_rooms')->get();
                                    $cart_experience_rooms = 


                DB::connection('mysql_veenus')->table('cart_experiences_to_rooms')->where([
                                            ['cart_exp_id', '=', $cart_exp_id],
                                            // ['room_id', '=', $v->hotel_room_id],
                                        ])->orderBy('status', 'desc')->orderBy('specials', "desc")->get();
                                    $cart_experience_rooms_count = 


                DB::connection('mysql_veenus')->table('cart_experiences_to_rooms')->where([
                                            ['cart_exp_id', '=', $cart_exp_id],
                                            // ['room_id', '=', $v->hotel_room_id],
                                        ])->count();
                                        
                                    $cart_experience_rooms_sold = 


                DB::connection('mysql_veenus')->table('cart_experiences_to_rooms')->where([
                                            ['cart_exp_id', '=', $cart_exp_id],
                                            // ['room_id', '=', $v->hotel_room_id],
                                            ['status', '=', 1],
                                        ])->count();
                                    $v = array("roomInfo" => $room_info, "roomPPL" => $cart_experience_rooms, "taken" => $cart_experience_rooms_count, "sold" => $cart_experience_rooms_sold);
                                    $hotel_rooms = $v;
                                    $rooms_sold = $rooms_sold+$cart_experience_rooms_sold;
                                    
                                // }
                                $tourStatuses = App\Models\Cms\TourStatus::getAll();
                                $roomRequests = App\Models\Cms\RoomRequests::where("status", '1')->get();
                                $dates_rates = 


                DB::connection('mysql_veenus')->table('experience_dates_rates')->where('id', $cart_experience->dates_rates_id)->first();
                                $cartExperiencesToRooms = array();
                                 if(!empty($cart_experience->id))
                                 {
                                    $cartExperiencesToRooms = App\Models\Cms\CartExperiencesToRooms::with('cartExperiencesToRoomsRequests')->where("cart_exp_id", $cart_experience->id)->get();
                                 }
                                        //print_r($hotel_rooms);
                                // return view('partials.booking.editDocusign', compact('hotel_rooms', 'cart_experience', 'rooms_ppl', 'rooms_sold', 'cartExperiencesToRooms', 'roomRequests', 'tourStatuses') );
                                $hotelAmemdment = 


                DB::connection('mysql_veenus')->table('tds_hotel_amemdment')->where("cart_exp_id", $cart_exp_id)->first();
                                $experienceDates = App\Models\Cms\ExperienceDate::where('dates_rates_id', $cart_experience->dates_rates_id)->where('experiences_id', $cart_experience->experiences_id)->orderBy('date_from','ASC')->get()->toArray();
                                $signature_list = App\Models\Cms\SignatureName::where('status','1')->orderBy('id','DESC')->get();
                                $data = array('cart_exp_id' => $cart_exp_id,
                                             'experience' => $experience,
                                            'experienceDate' => $experienceDates,
                                            'dates_rates' => $dates_rates,
                                            'cart_experience' => $cart_experience,
                                            'cartExperiencesToRooms' => $cartExperiencesToRooms,
                                            'hotel' => $hotel,
                                            'signature_list'=>$signature_list,
                                            'hotelAmemdment' => $hotelAmemdment,
                                            'experienceDates' => $experienceDates,
                                        'print'=>'0');
                                $pdf = PDF::loadView('partials.booking.downloadTDSpdf', $data);
                                //$filename = $cart_experience->experience_name.'.pdf';
                                $filenamezip = "TD - ".$cart_experience->experience_name." ".date("D d M Y", strtotime($cart_experience->date_from))." - ".date("D d M Y", strtotime($cart_experience->date_to));
                                $filename = $filenamezip.".pdf";
                                $pdf->getDomPDF()->set_option("enable_php", true);
                                session()->forget('download_cart_id');
                                return $pdf->download($filename);
                        }
}
function get_profit_margin($nights,$coach_hire_cost,$avg_cost_fixture)
{
    $coachHireDays = $nights;
    $fixtureCount = $nights;
    $coachHire = !empty($coach_hire_cost)?$coach_hire_cost:0;
    $avg_cost_fixture = !empty($avg_cost_fixture)?$avg_cost_fixture:0;
    $hotelRate = 0;
    $totalPassengers = 30;
    $singleRooms = 0;
    $ssRate = 0;
    $freeWithSS = 0;
    $freePPsharing = 0;
    $crossingCost = 0;
    $otherCosts = 0;
    $porterage = 0;
    $attraction = 0;
    $hotelMain = $totalPassengers * $hotelRate * $nights;
    $hotelSS = $singleRooms * $ssRate * $nights;
    $coach = $coachHire * $coachHireDays;
    $fixtures = $avg_cost_fixture * $fixtureCount;
     $totalIN = $hotelMain + $hotelSS + $coach + $fixtures + $freeWithSS + $freePPsharing + $crossingCost + $otherCosts + $porterage + $attraction;
     $billedPassengers = $totalPassengers;
     

      $totalINPP = $totalIN / $billedPassengers;
      
       $convert = 1;
       
       $totalINConv = $totalIN / $convert;
       $profitpoints25 = 2500;
      $rrRate3 = (($totalINConv + $profitpoints25) / $totalPassengers);
      return round($rrRate3,2);
}
?>
