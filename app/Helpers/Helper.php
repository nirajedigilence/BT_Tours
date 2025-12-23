<?php


namespace App\Helpers;


use App\Http\Controllers\ExperiencesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StaticInfoController;
use App\Models\Cms\Htaccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class Helper
{
    public static function dbg($var){

        if ( $_SERVER["REMOTE_ADDR"] == "84.201.192.58" || $_SERVER["REMOTE_ADDR"] == "87.120.113.171" || $_SERVER["REMOTE_ADDR"] == "95.42.133.174" ){
            echo "<pre>";
            print_r($var);
            echo "</pre>";
        }

    }
    public static function dbg2($var){

        if ( $_SERVER["REMOTE_ADDR"] == "84.201.192.58" || $_SERVER["REMOTE_ADDR"] == "87.120.113.171" || $_SERVER["REMOTE_ADDR"] == "95.42.133.174" ){
            echo "<pre>";
            var_dump($var);
            echo "</pre>";
        }

    }

    /**
     * @param string $htaccess_url
     * @param string $type
     * @param int $record_id
     * @param string $lang
     * @return \Illuminate\Http\JsonResponse
     */
    public static function checkHtaccess($htaccess_url, $type = "", $record_id = 0, $lang = "en") {

        $check = Htaccess::where('htaccess_url', '=', $htaccess_url)->first();

        $result = 0;
        if ($check !== null) {
            $result = 1;

            if ($record_id == $check->record_id && $type == $check->type && $lang == $check->lang) {
                $result = 0;
            }
        }

        return $result;
    }

    /**
     * @param string $htaccess_url
     * @param string $type
     * @param int $record_id
     * @param string $lang
     * @return \Illuminate\Http\JsonResponse
     */
    public static function isHtaccessExists($htaccess_url, $type = "", $record_id = 0, $lang = "en") {

        $check = Htaccess::where('htaccess_url', '=', $htaccess_url)
            ->where('record_id', '=', $record_id)
            ->where('type', '=', $type)
            ->where('lang', '=', $lang)
            ->first();

        $result = 0;
        if ($check !== null) {
            $result = 1;
        }

        return $result;
    }

    public static function isHtaccessRecordExists($type = "", $record_id = 0, $lang = "en") {

        $check = Htaccess::where('record_id', '=', $record_id)
            ->where('type', '=', $type)
            ->where('lang', '=', $lang)
            ->first();

        $result = 0;
        if ($check !== null) {
            $result = 1;
        }

        return $result;
    }

    public static function updateHtaccess( $lang, $htaccess_url, $type, $record_id = 0 ){

        $data = array(
            "lang" => $lang,
            "htaccess_url" => $htaccess_url,
            "type" => $type,
            "record_id" => $record_id
        );

        $result = self::isHtaccessRecordExists($type, $record_id, $lang);
        if ( !$result )	{
            Htaccess::create($data);
        }else{
            $row = Htaccess::where('type', '=', $type)->where("record_id", "=", $record_id)->where("lang", "=", $lang)->first();
            if ( $row !== null ){
                $row->update($data);
            }
        }
    }

//    /**
//     * @param string $htaccess_url
//     * @param string $type
//     * @param int $record_id
//     * @return mixed
//     */
//    function checkHtaccessByRecordID($htaccess_url, $type = "" , $record_id = 0, $lang = "en"){
//
//        $check = Htaccess::where("htaccess_url", "=", $htaccess_url)->where("record_id", "=", $record_id)->where("lang", "=", $lang)->first();
//
//        return $check->id;
//    }

    public function checkHtaccessRoutes(Request $request) {

        $lang = App::getLocale();
        $htaccess_url = "/".$request->path();

        $check = Htaccess::where('htaccess_url', '=', $htaccess_url)->first();
        if($check !== null){
            $type = trim($check->type);
            $record_id = (int)$check->record_id;
            if($type && $record_id){
                $controller = "";
                switch ($type) {
                    case "info":
                        $controller = StaticInfoController::class;
                        break;
                    case "news":
                        $controller = NewsController::class;
                        break;
                    case "experience":
                        $controller = ExperiencesController::class;
                        break;
                    default:
                        $controller = "";
                }
                if(trim($controller)){
                    $instance = new $controller();
                    $instance->show($record_id);
                    return true;
                }
            }
        }
        return false;
    }
    
}
