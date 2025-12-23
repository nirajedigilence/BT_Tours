<?php

namespace App\Http\Middleware;

use Closure;

class CompileLess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $compileLess = env('COMPILE_LESS', 'false');
        $compressLessCss = env('COMPRESS_LESS_CSS', 'false');

        if($compileLess){
            try{
                $lessFile = resource_path()."/less/style.less";
                $cssFile = public_path()."/css/style.css";

                \Less_Autoloader::register();

                $options = array( 'compress'=>$compressLessCss );

                $parser = new \Less_Parser($options);
                $appUrl = env('APP_URL', 'http://localhost');
                $parser->parseFile( $lessFile, $appUrl);
                $css = $parser->getCss();
                file_put_contents($cssFile,$css);

            } catch (\Exception $e){
                //TODO error handler
                //dbg2($e->getMessage()); exit();
            }
        }


        return $next($request);
    }
}
