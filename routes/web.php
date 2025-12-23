<?php
use Dcblogdev\Xero\Facades\Xero;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('home');
//});
//cron

Route::get('/update_experience_data', [App\Http\Controllers\Cron\CronController::class, 'update_experience_data'])->name('update_experience_data');
Route::get('/update_bt_settings', [App\Http\Controllers\Cron\CronController::class, 'update_bt_settings'])->name('update_bt_settings');
Route::get('/create_slug', [App\Http\Controllers\Cron\CronController::class, 'create_slug'])->name('create_slug');

Route::get('/', 'ExperiencesController@index')->name('homepage')->middleware('less');
Route::get('/search', 'ExperiencesController@search')->name('search.main')->middleware('less');
Route::get('/about-us', 'ExperiencesController@about_us')->name('about-us')->middleware('less');
Route::get('/contact-us', 'ExperiencesController@contact_us')->name('contact-us')->middleware('less');
Route::post('/contact-us/send-mail', 'ExperiencesController@send_mail')->name('send-mail')->middleware('less');

Route::get('/terms-conditions', 'ExperiencesController@terms')->name('terms')->middleware('less');
Route::get('/privacy-policy', 'ExperiencesController@privacy_policy')->name('privacy-policy')->middleware('less');
Route::get('/cookies', 'ExperiencesController@cookies')->name('cookies')->middleware('less');
Route::get('/bowling/{slug}','ExperiencesController@show_bowling')
    ->name('bowling.show')->middleware('less');
Route::get('/search-ajax', 'ExperiencesController@searchAjax')->name('search.main.ajax');
Route::post('/experience/store-enquiry','ExperiencesController@storeEnquiry')
    ->name('experience.store-enquiry');
Route::post('/subscribe','NewsletterController@subscribe')
    ->name('newsletter.subscribe');
Route::post('/experience/get-price','ExperiencesController@getPrice')
    ->name('experience.get.price');
    
Route::post('/download_brochure_image', 'ExperiencesController@downloadBrochureImage')
        ->name('download-brochure-image')->middleware('less');
Route::post('/experience/get-cruise-price','ExperiencesController@getCruisePrice')
    ->name('experience.get.cruiseprice');    


Route::get('/access-denied', 'HomeController@accessDeniedPage')->name('access-denied')->middleware('less');
Route::get('/sign-up', 'HomeController@signUpPage')->name('sign-up')->middleware('less');

Route::get('/add-to-cart-1', 'ExperiencesController@getAddToCart1')->name('add-to-cart-1');
Route::get('/add-to-cart-2', 'ExperiencesController@getAddToCart2')->name('add-to-cart-2');
Route::post('/add-to-cart-3', 'ExperiencesController@getAddToCart3')->name('add-to-cart-3');
Route::get('/hold-tours', 'CartController@getHoldTours')
        ->name('hold-tours')->middleware('less');   

 Route::get('/finalize-cart', 'ExperiencesController@finalizeCart')
        ->name('finalize-cart');
Route::get('/cart', 'ExperiencesController@showCart')->name('show-cart')->middleware('less');    
Route::get('/delete-cart-experience/{id}/{id1}', 'ExperiencesController@deleteCartExperience')
        ->name('delete-cart-experience')
        ->where('id', '[0-9]+');    
Route::get('/proxy-image', function (\Illuminate\Http\Request $request) {
    $url = $request->query('url');

    if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
        abort(404);
    }

    $client = new \GuzzleHttp\Client();
    try {
        $response = $client->get($url);
        $content = $response->getBody()->getContents();
        $mime = $response->getHeader('Content-Type')[0];
        
        return response($content)->header('Content-Type', $mime);
    } catch (\Exception $e) {
        abort(404);
    }
});