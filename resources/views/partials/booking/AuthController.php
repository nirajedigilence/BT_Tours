<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rule;
class AuthController extends Controller
{
    
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'first_name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users',
            'password' => 'sometimes|string|min:8',
            'mobilenumber' => 'sometimes',
            /*'mobilenumber' => [
        'required',$request->mobilenumber,
        Rule::unique('users'),
    ],*/
            //'user_type' => 'required',
        ]);

        /*if($validator->fails()){
            return response()->json($validator->errors());       
        }*/
        if(empty($request->first_name) || empty($request->mobilenumber) || empty($request->password))
        {
            $msg1 = '';
            
            if(empty($request->first_name))
            {
                $msg1 .= 'first name,';
            }
            if(empty($request->mobilenumber))
            {
                $msg1 .= 'mobile,';
            }
            if(empty($request->password))
            {
                $msg1 .= 'password,';
            }
            return response()
                    ->json(['status'=>'error','message' => 'Please enter '.rtrim($msg1,',').' required fields.'], 401);
        }
        $emailData = User::where('email',$request->email)->first();
        if(!empty($emailData))
        {
             return response()
                    ->json(['status'=>'error','message' => 'The email has already been taken.'], 401);
        }
        $mData = User::where('mobilenumber',$request->mobilenumber)->first();
        if(!empty($mData))
        {
             return response()
                    ->json(['status'=>'error','message' => 'The mobile number has already been taken.'], 401);
        }
        $user_refferal = $request->refferal_code;
        $userData = User::where('refferal_code',$user_refferal)->first();
        
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobilenumber' => $request->mobilenumber,
            //'user_type' => $request->user_type,
            'password' => Hash::make($request->password),
            'parent_id' => !empty($userData->id)?$userData->id:'',

         ]);
        $user->syncRoles('User');
        $digits = 4;
        $rand_num = rand(pow(10, $digits-1), pow(10, $digits)-1);
        User::where('id',$user->id)->update(array('refferal_code'=>'TU'.strtoupper($request->first_name).$user->id.$rand_num)); 
        //$token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['status'=>'success','message' => 'Register successfully.','data' => $user ]);
    }
    public function check_refferal_code(Request $request)
    {
        if(!empty($request['refferal_code']))
        {
            $user = User::where('refferal_code', $request['refferal_code'])->first();
            if(!empty($user))
            {
                return response()
                    ->json(['status'=>'success','message' => 'Refferal code exist','code' => 200]);
            }
            else{
                 return response()
                    ->json(['status'=>'error','message' => 'Refferal code not exist.'], 401);
            }
        }
        else
        {
            return response()
                    ->json(['status'=>'error','message' => 'Refferal code field required.'], 401);
        }
    }

    public function login(Request $request)
    {
        
        if (!Auth::attempt($request->only('mobilenumber', 'password')))
        {
            return response()
                ->json(['status'=>'error','message' => 'Invalid mobile or password'], 401);
        }
        
        $user = User::where('mobilenumber', $request['mobilenumber'])->firstOrFail();
        
        //$token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['status'=>'success','token'=>$user->id,'token'=>Crypt::encryptString($user->id),'message' => 'Hi '.$user->name.', welcome to home' ]);
    }

    // method for user logout and delete token
    public function logout()
    {
        //auth()->user()->tokens()->delete();
        return response()
            ->json(['status'=>'success','message' => 'You have successfully logged out and the token was successfully deleted' ]);
       
    }
}