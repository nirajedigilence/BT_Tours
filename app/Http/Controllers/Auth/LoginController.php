<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Session;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->redirectTo = $this->redirectTo();
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo( ) {
        $back_url = Session::get('back_url');
        if(!empty($back_url))
        {
            return($back_url);
        }
        else
        {
             if (Auth::check() && Auth::user()->hasRole("Collaborator")) {
                $user = Auth::user();
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
                    Auth::loginUsingId($user->parent_user);
                }
                return(route('account-alerts'));
                // return(route('account-collaborator'));
                // return(route('home'));
            }
            elseif (Auth::check() && Auth::user()->hasRole('Super Admin')) {
               
                return(route('account-alerts'));
                // return(route('bespoke-enquiries'));
                // return(route('home'));
            }
            elseif (Auth::check() && Auth::user()->hasRole('Hotel')) {
                return(route('account-hotel'));
                // return(route('home'));
            }
            else {
                return(route('cms'));
            }
        }
       
    }
}
