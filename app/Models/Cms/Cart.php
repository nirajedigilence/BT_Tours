<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Self_;
use DB;

class Cart extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'carts';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'finalized',
        'finalized_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    public static function getAll(){

        return self::get();
    }

    /**
     * Get the Hotel Images.
     *
     * @return App\Models\Cms\CartExperience
     */
    public function cartExperiences()
    {
        return $this->hasMany('App\Models\Cms\CartExperience','carts_id','id')->where('deleted_at', null)->orderBy('created_at', 'desc');
    }
    /**
     * Get the Hotel Images.
     *
     * @return App\Models\Cms\CartExperience
     */
    public function cartExperiencesCompleted()
    {
        return $this->hasMany('App\Models\Cms\CartExperience','carts_id','id')
            ->where('completed', '=', 1)
            ->orderBy('created_at', 'desc');
    }
    /**
     * Get the Hotel Images.
     *
     * @return App\Models\Cms\CartExperience
     */
    public function cartExperiencesNotCompleted()
    {
        return $this->hasMany('App\Models\Cms\CartExperience','carts_id','id')
            ->where('completed', '=', 0)
            ->orderBy('created_at', 'desc');
    }

    public static function getCurrentUserCart($user_id = null,$created_id = null){
        $cart = [];
        // if (Auth::check() && Auth::user()->hasRole("Collaborator")){
        if (Auth::check()){
            if(empty($user_id)){
                $user_id = Auth::user()->getAuthIdentifier();
            }

//            $cart = self::where('user_id', '=', $user_id)->where('finalized', '=', 0);
//            if($cart === null){
//                Cart::create([
//                    'user_id' => $user_id,
//                    'finalized' => 0
//                ]);
//            }
//            $cart = self::with('cartExperiences.upscales')->where('user_id', '=', $user_id)->where('finalized', '=', 0);
            $cart_experiences = 

DB::table('cart_experiences')->where('created_by',$user_id)->where('is_hold','0')->get()->toArray();
            $ids = array();
            if(!empty($cart_experiences)){
                $ids = array_unique(array_column($cart_experiences, 'carts_id'));
            }
            
            if(!empty($created_id)){
                $cart = self::with(['cartExperiences.upscales','cartExperiences.experienceImages'])->where('finalized',0)->whereIn('id',$ids)->get();
            }else{
                $cart = self::with(['cartExperiences.upscales','cartExperiences.experienceImages'])
                    ->firstOrCreate(['user_id' => $user_id, 'finalized' => 0]);
            }
                // pr($cart); exit();
       
        return $cart;
        }else{
            return false;

        }
    }

    public static function getCurrentUserCartApi($user_id = null,$created_id = null){
        $cart = [];
        // if (Auth::check() && Auth::user()->hasRole("Collaborator")){
        
            if(empty($user_id)){
                $user_id = Auth::user()->getAuthIdentifier();
            }

//            $cart = self::where('user_id', '=', $user_id)->where('finalized', '=', 0);
//            if($cart === null){
//                Cart::create([
//                    'user_id' => $user_id,
//                    'finalized' => 0
//                ]);
//            }
//            $cart = self::with('cartExperiences.upscales')->where('user_id', '=', $user_id)->where('finalized', '=', 0);
            $cart_experiences = 

            DB::table('cart_experiences')->where('created_by',$user_id)->where('is_hold','0')->get()->toArray();
            $ids = array();
            if(!empty($cart_experiences)){
                $ids = array_unique(array_column($cart_experiences, 'carts_id'));
            }
            
            if(!empty($created_id)){
                $cart = self::with(['cartExperiences.upscales','cartExperiences.experienceImages'])->where('finalized',0)->whereIn('id',$ids)->get();
            }else{
                $cart = self::with(['cartExperiences.upscales','cartExperiences.experienceImages'])
                    ->firstOrCreate(['user_id' => $user_id, 'finalized' => 0]);
            }
                // pr($cart); exit();
       
        return $cart;
        
    }
     public static function getCurrentUserCartHold($user_id = null,$created_id = null,$cart_exp_id = null){
        $cart = [];

        // if (Auth::check() && Auth::user()->hasRole("Collaborator")){
        if (Auth::check()){
            if(empty($user_id)){
                $user_id = Auth::user()->getAuthIdentifier();
            }

//            $cart = self::where('user_id', '=', $user_id)->where('finalized', '=', 0);
//            if($cart === null){
//                Cart::create([
//                    'user_id' => $user_id,
//                    'finalized' => 0
//                ]);
//            }
//            $cart = self::with('cartExperiences.upscales')->where('user_id', '=', $user_id)->where('finalized', '=', 0);
            $cart_experiences = 

DB::table('cart_experiences')->where('id',$cart_exp_id)->get()->toArray();
            $ids = array();
            if(!empty($cart_experiences)){
                $ids = array_unique(array_column($cart_experiences, 'carts_id'));
            }
            
            if(!empty($created_id)){
                $cart = self::with(['cartExperiences.upscales','cartExperiences.experienceImages'])->whereIn('id',$ids)->get();

            }else{
                $cart = self::with(['cartExperiences.upscales','cartExperiences.experienceImages'])
                    ->firstOrCreate(['user_id' => $user_id, 'finalized' => 0]);
            }
                
       
        return $cart;
        }else{
            return false;

        }
    }
    public static function getCurrentUserBookings(){
        $bookings = [];
        if (Auth::check() && Auth::user()->hasRole("Collaborator")){
            $user_id = Auth::user()->getAuthIdentifier();

            $bookings = self::with(['cartExperiencesNotCompleted.upscales', 'cartExperiencesNotCompleted.experiencesToExperiences','cartExperiencesNotCompleted.experienceImages','cartExperiencesNotCompleted.tourStatuses'])
                ->where('user_id', '=', $user_id)
                ->where('finalized', '=', 1)
                ->orderBy('finalized_at','desc')
                ->get();

                /*$bookings = self::selectRaw('carts.*,cart_experiences.*')->with(['cartExperiencesNotCompleted.upscales', 'cartExperiencesNotCompleted.experiencesToExperiences','cartExperiencesNotCompleted.experienceImages','cartExperiencesNotCompleted.tourStatuses'])
                ->leftjoin('cart_experiences as cart_experiences', 'cart_experiences.carts_id', '=', 'carts.id')
                ->where('carts.user_id', '=', $user_id)
                ->where('carts.finalized', '=', 1)
                ->orderBy('cart_experiences.experience_name','desc')
                ->get();*/
        }
        return $bookings;
    }
    public static function getCurrentUserBookingsSuperUser($sort_column='',$sort_by=''){
        $bookings = [];
        $sort_by = !empty($sort_by)?$sort_by:'desc';
        $sort_column = !empty($sort_column)?$sort_column:'carts.finalized_at';
       
        if (Auth::check() && (Auth::user()->hasRole("Super Admin") || Auth::user()->hasRole("Admin")) ){
            // $user_id = Auth::user()->getAuthIdentifier();
            if(isset($_GET['collb_id']) && !empty($_GET['collb_id'])){
                /*$bookings = self::with(['cartExperiencesNotCompleted.upscales', 'cartExperiencesNotCompleted.experiencesToExperiences', 'cartExperiencesNotCompleted.experienceImages','cartExperiencesNotCompleted.tourStatuses'])
                ->where('user_id', '=', $_GET['collb_id'])
                ->where('finalized', '=', 1)
                ->where('deleted_at', null)
                ->get();*/
                $bookings = CartExperience::selectRaw('cart_experiences.*,carts.finalized_at,carts.user_id,users.name AS colobratorName')->with([/*'upscales', 'experiencesToExperiences','experienceImages',*/'tourStatuses'])
                 ->leftjoin('carts as carts', 'cart_experiences.carts_id', '=', 'carts.id')
                 ->leftjoin('users as users', 'carts.user_id', '=', 'users.id')
                ->where('carts.finalized', '=', 1)
                ->where('cart_experiences.completed', '=', 0)
                ->where('cart_experiences.tour_type', '=', 1)
                ->where('carts.deleted_at', null)
                ->where('carts.user_id', '=', $_GET['collb_id'])
                ->orderBy($sort_column,$sort_by)
                //->orderBy('carts.finalized_at','desc')
                //->groupBy('cart_experiences.id')
                ->get();

            }else{
                  $bookings = CartExperience::selectRaw('cart_experiences.*,carts.finalized_at,carts.user_id,users.name AS colobratorName')->with([/*'upscales', 'experiencesToExperiences','experienceImages',*/'tourStatuses'])
                 ->leftjoin('carts as carts', 'cart_experiences.carts_id', '=', 'carts.id')
                 ->leftjoin('users as users', 'carts.user_id', '=', 'users.id')
                ->where('carts.finalized', '=', 1)
                ->where('cart_experiences.completed', '=', 0)
                ->where('cart_experiences.tour_type', '=', 1)
                ->where('carts.deleted_at', null)
                ->orderBy($sort_column,$sort_by)
                //->groupBy('cart_experiences.id')
                ->get();
                
               /* foreach($bookings as $item)
                {
                    $cart_id[]=$item['id'];
                }
                prd($cart_id);

            $bookings = self::with(['cartExperiencesNotCompleted.upscales', 'cartExperiencesNotCompleted.experiencesToExperiences', 'cartExperiencesNotCompleted.experienceImages','cartExperiencesNotCompleted.tourStatuses'])
                 ->select(DB::raw('*, (SELECT name FROM users WHERE id = user_id) AS colobratorName'))
                // ->where('user_id', '=', $user_id)
                // ->where('id', '=', 21)
                ->where('finalized', '=', 1)
                ->where('deleted_at', null)
                ->get();*/
            }
        }
        return $bookings;
    }
    public static function getCurrentUserBookingsCollaboratorCruise($sort_column='',$sort_by=''){
        $bookings = [];
        $sort_by = !empty($sort_by)?$sort_by:'desc';
        $sort_column = !empty($sort_column)?$sort_column:'carts.finalized_at';
       if (Auth::check() && Auth::user()->hasRole("Collaborator")){
            $user_id = Auth::user()->getAuthIdentifier();
            // $user_id = Auth::user()->getAuthIdentifier();
            if(isset($_GET['collb_id']) && !empty($_GET['collb_id'])){
                /*$bookings = self::with(['cartExperiencesNotCompleted.upscales', 'cartExperiencesNotCompleted.experiencesToExperiences', 'cartExperiencesNotCompleted.experienceImages','cartExperiencesNotCompleted.tourStatuses'])
                ->where('user_id', '=', $_GET['collb_id'])
                ->where('finalized', '=', 1)
                ->where('deleted_at', null)
                ->get();*/
                $bookings = CartExperience::selectRaw('cart_experiences.*,carts.finalized_at,carts.user_id,users.name AS colobratorName')->with([/*'upscales', 'experiencesToExperiences','experienceImages',*/'tourStatuses'])
                 ->leftjoin('carts as carts', 'cart_experiences.carts_id', '=', 'carts.id')
                 ->leftjoin('users as users', 'carts.user_id', '=', 'users.id')
                ->where('carts.finalized', '=', 1)
                ->where('cart_experiences.completed', '=', 0)
                ->where('cart_experiences.tour_type', '=', 2)
                ->where('carts.deleted_at', null)
                ->where('carts.user_id', '=', $_GET['collb_id'])
                ->orderBy($sort_column,$sort_by)
                //->orderBy('carts.finalized_at','desc')
                //->groupBy('cart_experiences.id')
                ->get();

            }else{
                  $bookings = CartExperience::selectRaw('cart_experiences.*,carts.finalized_at,carts.user_id,users.name AS colobratorName')->with([/*'upscales', 'experiencesToExperiences','experienceImages',*/'tourStatuses'])
                 ->leftjoin('carts as carts', 'cart_experiences.carts_id', '=', 'carts.id')
                 ->leftjoin('users as users', 'carts.user_id', '=', 'users.id')
                ->where('carts.finalized', '=', 1)
                ->where('carts.user_id', '=', $user_id)
                ->where('cart_experiences.completed', '=', 0)
                ->where('cart_experiences.tour_type', '=', 2)
                ->where('carts.deleted_at', null)
                ->orderBy($sort_column,$sort_by)
                //->groupBy('cart_experiences.id')
                ->get();
                
               /* foreach($bookings as $item)
                {
                    $cart_id[]=$item['id'];
                }
                prd($cart_id);

            $bookings = self::with(['cartExperiencesNotCompleted.upscales', 'cartExperiencesNotCompleted.experiencesToExperiences', 'cartExperiencesNotCompleted.experienceImages','cartExperiencesNotCompleted.tourStatuses'])
                 ->select(DB::raw('*, (SELECT name FROM users WHERE id = user_id) AS colobratorName'))
                // ->where('user_id', '=', $user_id)
                // ->where('id', '=', 21)
                ->where('finalized', '=', 1)
                ->where('deleted_at', null)
                ->get();*/
            }
        }
        return $bookings;
    }
    public static function getCurrentUserBookingsSuperUserCruise($sort_column='',$sort_by=''){
        $bookings = [];
        $sort_by = !empty($sort_by)?$sort_by:'desc';
        $sort_column = !empty($sort_column)?$sort_column:'carts.finalized_at';
       
        if (Auth::check() && (Auth::user()->hasRole("Super Admin") || Auth::user()->hasRole("Admin")) ){
            // $user_id = Auth::user()->getAuthIdentifier();
            if(isset($_GET['collb_id']) && !empty($_GET['collb_id'])){
                /*$bookings = self::with(['cartExperiencesNotCompleted.upscales', 'cartExperiencesNotCompleted.experiencesToExperiences', 'cartExperiencesNotCompleted.experienceImages','cartExperiencesNotCompleted.tourStatuses'])
                ->where('user_id', '=', $_GET['collb_id'])
                ->where('finalized', '=', 1)
                ->where('deleted_at', null)
                ->get();*/
                $bookings = CartExperience::selectRaw('cart_experiences.*,carts.finalized_at,carts.user_id,users.name AS colobratorName')->with([/*'upscales', 'experiencesToExperiences','experienceImages',*/'tourStatuses'])
                 ->leftjoin('carts as carts', 'cart_experiences.carts_id', '=', 'carts.id')
                 ->leftjoin('users as users', 'carts.user_id', '=', 'users.id')
                ->where('carts.finalized', '=', 1)
                ->where('cart_experiences.completed', '=', 0)
                ->where('cart_experiences.tour_type', '=', 2)
                ->where('carts.deleted_at', null)
                ->where('carts.user_id', '=', $_GET['collb_id'])
                ->orderBy($sort_column,$sort_by)
                //->orderBy('carts.finalized_at','desc')
                //->groupBy('cart_experiences.id')
                ->get();

            }else{
                  $bookings = CartExperience::selectRaw('cart_experiences.*,carts.finalized_at,carts.user_id,users.name AS colobratorName')->with([/*'upscales', 'experiencesToExperiences','experienceImages',*/'tourStatuses'])
                 ->leftjoin('carts as carts', 'cart_experiences.carts_id', '=', 'carts.id')
                 ->leftjoin('users as users', 'carts.user_id', '=', 'users.id')
                ->where('carts.finalized', '=', 1)
                ->where('cart_experiences.completed', '=', 0)
                ->where('cart_experiences.tour_type', '=', 2)
                ->where('carts.deleted_at', null)
                ->orderBy($sort_column,$sort_by)
                //->groupBy('cart_experiences.id')
                ->get();
                
               /* foreach($bookings as $item)
                {
                    $cart_id[]=$item['id'];
                }
                prd($cart_id);

            $bookings = self::with(['cartExperiencesNotCompleted.upscales', 'cartExperiencesNotCompleted.experiencesToExperiences', 'cartExperiencesNotCompleted.experienceImages','cartExperiencesNotCompleted.tourStatuses'])
                 ->select(DB::raw('*, (SELECT name FROM users WHERE id = user_id) AS colobratorName'))
                // ->where('user_id', '=', $user_id)
                // ->where('id', '=', 21)
                ->where('finalized', '=', 1)
                ->where('deleted_at', null)
                ->get();*/
            }
        }
        return $bookings;
    }
    
    public static function getExportData($sort_column='',$sort_by=''){
        $bookings = [];
        

       $bookings = CartExperience::selectRaw('cart_experiences.*,carts.finalized_at,carts.user_id,users.name AS colobratorName')->with([/*'upscales', 'experiencesToExperiences','experienceImages',*/'tourStatuses'])
                 ->leftjoin('carts as carts', 'cart_experiences.carts_id', '=', 'carts.id')
                 ->leftjoin('users as users', 'carts.user_id', '=', 'users.id')
                ->where('carts.finalized', '=', 1)
                //->where('cart_experiences.completed', '=', 0)
                ->where('carts.deleted_at', null)
                //->orderBy($sort_column,$sort_by)
                //->groupBy('cart_experiences.id')
                ->get();
        return $bookings;
    }
    public static function getCurrentUserBookingsSuperUserHolds($sort_column='',$sort_by=''){
        $bookings = [];
        $sort_by = !empty($sort_by)?$sort_by:'desc';
        $sort_column = !empty($sort_column)?$sort_column:'carts.finalized_at';
       
         if (Auth::check() && (Auth::user()->hasRole("Super Admin") || Auth::user()->hasRole("Admin") || Auth::user()->hasRole("Collaborator")) ){
            if(Auth::user()->hasRole("Collaborator"))
            {
                $_GET['collb_id'] = Auth::user()->getAuthIdentifier();
            }
            // $user_id = Auth::user()->getAuthIdentifier();
            if(isset($_GET['collb_id']) && !empty($_GET['collb_id'])){
                /*$bookings = self::with(['cartExperiencesNotCompleted.upscales', 'cartExperiencesNotCompleted.experiencesToExperiences', 'cartExperiencesNotCompleted.experienceImages','cartExperiencesNotCompleted.tourStatuses'])
                ->where('user_id', '=', $_GET['collb_id'])
                ->where('finalized', '=', 1)
                ->where('deleted_at', null)
                ->get();*/
                $bookings = CartExperience::selectRaw('cart_experiences.*,carts.finalized_at,carts.user_id,users.name AS colobratorName')->with(['upscales', 'experiencesToExperiences','experienceImages','tourStatuses'])
                 ->leftjoin('carts as carts', 'cart_experiences.carts_id', '=', 'carts.id')
                 ->leftjoin('users as users', 'carts.user_id', '=', 'users.id')
                ->where('cart_experiences.is_hold', '=', 1)
                ->where('cart_experiences.completed', '=', 0)
                ->where('cart_experiences.tour_type', '=', 1)
                ->where('carts.deleted_at', null)
                ->where('carts.user_id', '=', $_GET['collb_id'])
                ->orderBy($sort_column,$sort_by)
                //->orderBy('carts.finalized_at','desc')
                //->groupBy('cart_experiences.id')
                ->get();
            }else{
                  $bookings = CartExperience::selectRaw('cart_experiences.*,carts.finalized_at,carts.user_id,users.name AS colobratorName')->with(['upscales', 'experiencesToExperiences','experienceImages','tourStatuses'])
                 ->leftjoin('carts as carts', 'cart_experiences.carts_id', '=', 'carts.id')
                 ->leftjoin('users as users', 'carts.user_id', '=', 'users.id')
                ->where('cart_experiences.is_hold', '=', 1)
                ->where('cart_experiences.completed', '=', 0)
                ->where('cart_experiences.tour_type', '=', 1)
                ->where('carts.deleted_at', null)
                ->orderBy($sort_column,$sort_by)
                //->groupBy('cart_experiences.id')
                ->get();
               
               /* foreach($bookings as $item)
                {
                    $cart_id[]=$item['id'];
                }
                prd($cart_id);

            $bookings = self::with(['cartExperiencesNotCompleted.upscales', 'cartExperiencesNotCompleted.experiencesToExperiences', 'cartExperiencesNotCompleted.experienceImages','cartExperiencesNotCompleted.tourStatuses'])
                 ->select(DB::raw('*, (SELECT name FROM users WHERE id = user_id) AS colobratorName'))
                // ->where('user_id', '=', $user_id)
                // ->where('id', '=', 21)
                ->where('finalized', '=', 1)
                ->where('deleted_at', null)
                ->get();*/
            }
        }
        return $bookings;
    }
    public static function getCompetedUserBookingsSuperUser($sort_column='',$sort_by=''){
        $bookings = [];
        $sort_by = !empty($sort_by)?$sort_by:'desc';
        $sort_column = !empty($sort_column)?$sort_column:'carts.finalized_at';
       
        if (Auth::check() && (Auth::user()->hasRole("Super Admin") || Auth::user()->hasRole("Admin")) ){
            // $user_id = Auth::user()->getAuthIdentifier();
            if(isset($_GET['collb_id']) && !empty($_GET['collb_id'])){
                /*$bookings = self::with(['cartExperiencesNotCompleted.upscales', 'cartExperiencesNotCompleted.experiencesToExperiences', 'cartExperiencesNotCompleted.experienceImages','cartExperiencesNotCompleted.tourStatuses'])
                ->where('user_id', '=', $_GET['collb_id'])
                ->where('finalized', '=', 1)
                ->where('deleted_at', null)
                ->get();*/
                $bookings = CartExperience::selectRaw('cart_experiences.*,carts.finalized_at,carts.user_id,users.name AS colobratorName')->with(['upscales', 'experiencesToExperiences','experienceImages','tourStatuses'])
                 ->leftjoin('carts as carts', 'cart_experiences.carts_id', '=', 'carts.id')
                 ->leftjoin('users as users', 'carts.user_id', '=', 'users.id')
                ->where('carts.finalized', '=', 1)
                //->where('cart_experiences.completed', '=', 0)
                ->where('cart_experiences.tour_type', '=', 1)
                ->where('carts.deleted_at', null)
                ->where('carts.user_id', '=', $_GET['collb_id'])
                ->orderBy($sort_column,$sort_by)
                //->orderBy('carts.finalized_at','desc')
                //->groupBy('cart_experiences.id')
                ->get();
            }else{
                  $bookings = CartExperience::selectRaw('cart_experiences.*,carts.finalized_at,carts.user_id,users.name AS colobratorName')->with(['upscales', 'experiencesToExperiences','experienceImages','tourStatuses'])
                 ->leftjoin('carts as carts', 'cart_experiences.carts_id', '=', 'carts.id')
                 ->leftjoin('users as users', 'carts.user_id', '=', 'users.id')
                ->where('carts.finalized', '=', 1)
                //->where('cart_experiences.completed', '=', 0)
                ->where('cart_experiences.tour_type', '=', 1)
                ->where('carts.deleted_at', null)
                ->orderBy($sort_column,$sort_by)
                //->groupBy('cart_experiences.id')
                ->get();
                //prd($bookings);
               /* foreach($bookings as $item)
                {
                    $cart_id[]=$item['id'];
                }
                prd($cart_id);

            $bookings = self::with(['cartExperiencesNotCompleted.upscales', 'cartExperiencesNotCompleted.experiencesToExperiences', 'cartExperiencesNotCompleted.experienceImages','cartExperiencesNotCompleted.tourStatuses'])
                 ->select(DB::raw('*, (SELECT name FROM users WHERE id = user_id) AS colobratorName'))
                // ->where('user_id', '=', $user_id)
                // ->where('id', '=', 21)
                ->where('finalized', '=', 1)
                ->where('deleted_at', null)
                ->get();*/
            }
        }
        return $bookings;
    }
     public static function getCurrentUserBookingsCollabratorUser($sort_column='',$sort_by=''){
        $bookings = [];
        $sort_by = !empty($sort_by)?$sort_by:'desc';
        $sort_column = !empty($sort_column)?$sort_column:'carts.finalized_at';
       
      if (Auth::check() && Auth::user()->hasRole("Collaborator")){
            $user_id = Auth::user()->getAuthIdentifier();
            if(isset($_GET['collb_id']) && !empty($_GET['collb_id'])){
                
                $bookings = CartExperience::selectRaw('cart_experiences.*,carts.finalized_at,carts.user_id,users.name AS colobratorName')->with(['upscales', 'experiencesToExperiences','experienceImages','tourStatuses'])
                 ->leftjoin('carts as carts', 'cart_experiences.carts_id', '=', 'carts.id')
                 ->leftjoin('users as users', 'carts.user_id', '=', 'users.id')
                  ->where('carts.user_id', '=', $user_id)
                ->where('carts.finalized', '=', 1)
                ->where('cart_experiences.completed', '=', 0)
                ->where('cart_experiences.tour_type', '=', 1)
                ->where('carts.deleted_at', null)
                ->where('carts.user_id', '=', $_GET['collb_id'])
                ->orderBy($sort_column,$sort_by)
                //->orderBy('carts.finalized_at','desc')
                //->groupBy('cart_experiences.id')
                ->get();
            }else{
                  $bookings = CartExperience::selectRaw('cart_experiences.*,carts.finalized_at,carts.user_id,users.name AS colobratorName')->with(['upscales', 'experiencesToExperiences','experienceImages','tourStatuses'])
                 ->leftjoin('carts as carts', 'cart_experiences.carts_id', '=', 'carts.id')
                 ->leftjoin('users as users', 'carts.user_id', '=', 'users.id')
                 ->where('carts.user_id', '=', $user_id)
                ->where('carts.finalized', '=', 1)
                ->where('cart_experiences.completed', '=', 0)
                ->where('cart_experiences.tour_type', '=', 1)
                ->where('carts.deleted_at', null)
                ->orderBy($sort_column,$sort_by)
                //->groupBy('cart_experiences.id')
                ->get();
                //prd($bookings);
               /* foreach($bookings as $item)
                {
                    $cart_id[]=$item['id'];
                }
                prd($cart_id);

            $bookings = self::with(['cartExperiencesNotCompleted.upscales', 'cartExperiencesNotCompleted.experiencesToExperiences', 'cartExperiencesNotCompleted.experienceImages','cartExperiencesNotCompleted.tourStatuses'])
                 ->select(DB::raw('*, (SELECT name FROM users WHERE id = user_id) AS colobratorName'))
                // ->where('user_id', '=', $user_id)
                // ->where('id', '=', 21)
                ->where('finalized', '=', 1)
                ->where('deleted_at', null)
                ->get();*/
            }
        }
        return $bookings;
    }    
    public static function getCurrentUserBookingsSuperUserByID($id){
        $bookings = [];
        if (Auth::check() && (Auth::user()->hasRole("Super Admin") || Auth::user()->hasRole("Admin")) ){
            // $user_id = Auth::user()->getAuthIdentifier();
            if(isset($_GET['collb_id']) && !empty($_GET['collb_id'])){
                $bookings = self::with(['cartExperiencesNotCompleted.upscales', 'cartExperiencesNotCompleted.experiencesToExperiences', 'cartExperiencesNotCompleted.experienceImages','cartExperiencesNotCompleted.tourStatuses'])
                ->where('user_id', '=', $_GET['collb_id'])
                ->where('id', '=', $id)
                ->where('finalized', '=', 1)
                ->where('deleted_at', null)
                ->get();
            }else{

            $bookings = self::with(['cartExperiencesNotCompleted.upscales', 'cartExperiencesNotCompleted.experiencesToExperiences', 'cartExperiencesNotCompleted.experienceImages','cartExperiencesNotCompleted.tourStatuses'])
                 ->select(DB::raw('*, (SELECT name FROM users WHERE id = user_id) AS colobratorName'))
                // ->where('user_id', '=', $user_id)
                // ->where('id', '=', 21)
                ->where('finalized', '=', 1)
                ->where('id', '=', $id)
                ->where('deleted_at', null)
                ->get();
            }
        }
        else
        {
             $bookings = self::with(['cartExperiencesNotCompleted.upscales', 'cartExperiencesNotCompleted.experiencesToExperiences', 'cartExperiencesNotCompleted.experienceImages','cartExperiencesNotCompleted.tourStatuses'])
                 ->select(DB::raw('*, (SELECT name FROM users WHERE id = user_id) AS colobratorName'))
                // ->where('user_id', '=', $user_id)
                // ->where('id', '=', 21)
                ->where('finalized', '=', 1)
                ->where('id', '=', $id)
                ->where('deleted_at', null)
                ->get();
        }
        return $bookings;
    }
    public static function getCurrentUserBookingsSuperUserByIDCruise($id){
        $bookings = [];
        if (Auth::check() && (Auth::user()->hasRole("Super Admin") || Auth::user()->hasRole("Admin")) ){
            // $user_id = Auth::user()->getAuthIdentifier();
            if(isset($_GET['collb_id']) && !empty($_GET['collb_id'])){
                $bookings = self::with(['cartExperiencesNotCompleted.upscales', 'cartExperiencesNotCompleted.experiencesToExperiences', 'cartExperiencesNotCompleted.experienceImages','cartExperiencesNotCompleted.tourStatusesCruise'])
                ->where('user_id', '=', $_GET['collb_id'])
                ->where('id', '=', $id)
                ->where('finalized', '=', 1)
                ->where('deleted_at', null)
                ->get();
            }else{

            $bookings = self::with(['cartExperiencesNotCompleted.upscales', 'cartExperiencesNotCompleted.experiencesToExperiences', 'cartExperiencesNotCompleted.experienceImages','cartExperiencesNotCompleted.tourStatusesCruise'])
                 ->select(DB::raw('*, (SELECT name FROM users WHERE id = user_id) AS colobratorName'))
                // ->where('user_id', '=', $user_id)
                // ->where('id', '=', 21)
                ->where('finalized', '=', 1)
                ->where('id', '=', $id)
                ->where('deleted_at', null)
                ->get();
            }
        }
        else
        {
             $bookings = self::with(['cartExperiencesNotCompleted.upscales', 'cartExperiencesNotCompleted.experiencesToExperiences', 'cartExperiencesNotCompleted.experienceImages','cartExperiencesNotCompleted.tourStatuses'])
                 ->select(DB::raw('*, (SELECT name FROM users WHERE id = user_id) AS colobratorName'))
                // ->where('user_id', '=', $user_id)
                // ->where('id', '=', 21)
                ->where('finalized', '=', 1)
                ->where('id', '=', $id)
                ->where('deleted_at', null)
                ->get();
        }
        return $bookings;
    }
   
     public static function getHoldUserBookingsSuperUserByID($id){
        $bookings = [];
        $sort_by = !empty($sort_by)?$sort_by:'desc';
        $sort_column = !empty($sort_column)?$sort_column:'carts.finalized_at';
       
        if (Auth::check() && (Auth::user()->hasRole("Super Admin") || Auth::user()->hasRole("Admin")) ){
            // $user_id = Auth::user()->getAuthIdentifier();
            if(isset($_GET['collb_id']) && !empty($_GET['collb_id'])){
              
                $bookings = CartExperience::selectRaw('cart_experiences.*,carts.finalized_at,carts.user_id,users.name AS colobratorName')->with(['upscales', 'experiencesToExperiences','experienceImages','tourStatuses'])
                 ->leftjoin('carts as carts', 'cart_experiences.carts_id', '=', 'carts.id')
                 ->leftjoin('users as users', 'carts.user_id', '=', 'users.id')
                ->where('cart_experiences.is_hold', '=', 1)
                ->where('cart_experiences.completed', '=', 0)
                ->where('cart_experiences.tour_type', '=', 1)
                ->where('carts.deleted_at', null)
                ->where('cart_experiences.id', '=', $id)
                ->where('carts.user_id', '=', $_GET['collb_id'])
                ->orderBy($sort_column,$sort_by)
                //->orderBy('carts.finalized_at','desc')
                //->groupBy('cart_experiences.id')
                ->get();
            }else{
                  $bookings = CartExperience::selectRaw('cart_experiences.*,carts.finalized_at,carts.user_id,users.name AS colobratorName')->with(['upscales', 'experiencesToExperiences','experienceImages','tourStatuses'])
                 ->leftjoin('carts as carts', 'cart_experiences.carts_id', '=', 'carts.id')
                 ->leftjoin('users as users', 'carts.user_id', '=', 'users.id')
                ->where('cart_experiences.is_hold', '=', 1)
                ->where('cart_experiences.completed', '=', 0)
                ->where('cart_experiences.tour_type', '=', 1)
                ->where('carts.deleted_at', null)
                 ->where('cart_experiences.id', '=', $id)
                ->orderBy($sort_column,$sort_by)
                //->groupBy('cart_experiences.id')
                ->get();
               
           
        }
        return $bookings;
        }
    }
    public static function getCompletedUserBookingsSuperUserByID($id){
        $bookings = [];
        if (Auth::check() && (Auth::user()->hasRole("Super Admin") || Auth::user()->hasRole("Admin")) ){
            // $user_id = Auth::user()->getAuthIdentifier();
            if(isset($_GET['collb_id']) && !empty($_GET['collb_id'])){
                $bookings = self::with(['cartExperiencesCompleted.upscales', 'cartExperiencesCompleted.experiencesToExperiences', 'cartExperiencesCompleted.experienceImages','cartExperiencesCompleted.tourStatuses'])
                ->where('user_id', '=', $_GET['collb_id'])
                ->where('id', '=', $id)
                ->where('finalized', '=', 1)
                ->where('deleted_at', null)
                ->get();
            }else{

            $bookings = self::with(['cartExperiencesCompleted.upscales', 'cartExperiencesCompleted.experiencesToExperiences', 'cartExperiencesCompleted.experienceImages','cartExperiencesCompleted.tourStatuses'])
                 ->select(DB::raw('*, (SELECT name FROM users WHERE id = user_id) AS colobratorName'))
                // ->where('user_id', '=', $user_id)
                // ->where('id', '=', 21)
                ->where('finalized', '=', 1)
                ->where('id', '=', $id)
                ->where('deleted_at', null)
                ->get();
            }
        }
        return $bookings;
    }
    public static function getCompletedBookings(){
        $bookings = [];
        if (Auth::check() && Auth::user()->hasRole("Super Admin")){
            // $user_id = Auth::user()->getAuthIdentifier();
            if(isset($_GET['collb_id']) && !empty($_GET['collb_id'])){
                $bookings = self::with(['cartExperiencesCompleted.upscales','cartExperiencesCompleted.experienceImages','cartExperiencesCompleted.tourStatuses'])->where('user_id', '=', $_GET['collb_id'])
                ->where('finalized', '=', 1)
                ->get();
            }else{

                $bookings = self::with(['cartExperiencesCompleted.upscales','cartExperiencesCompleted.experienceImages','cartExperiencesCompleted.tourStatuses'])
                // ->where('user_id', '=', $user_id)
                ->where('finalized', '=', 1)
                ->get();
            }
        }
        return $bookings;
    }
    public static function getCancelledBookings(){
        $bookings = [];
        if (Auth::check() && Auth::user()->hasRole("Super Admin")){
            // $user_id = Auth::user()->getAuthIdentifier();

            // $bookings = self::with(['cartExperiencesCompleted.upscales','cartExperiencesCompleted.experienceImages','cartExperiencesCompleted.tourStatuses'])
            $bookings = self::with(['cartExperiencesNotCompleted.upscales','cartExperiencesNotCompleted.experienceImages','cartExperiencesNotCompleted.tourStatuses'])
            ->select(DB::raw('*, (SELECT name FROM users WHERE id = user_id) AS colobratorName'))
                // ->where('user_id', '=', $user_id)
                ->where('finalized', '=', 1)
                ->get();
        }
       // prd( $bookings);
        return $bookings;
    }

    public static function getCurrentUserCompletedBookings(){
        $bookings = [];
        if (Auth::check() && Auth::user()->hasRole("Collaborator")){
            $user_id = Auth::user()->getAuthIdentifier();

            $bookings = self::with(['cartExperiencesCompleted.upscales','cartExperiencesCompleted.experienceImages','cartExperiencesCompleted.tourStatuses'])
                ->where('user_id', '=', $user_id)
                ->where('finalized', '=', 1)
                ->get();
        }
        return $bookings;
    }
    public static function getCancelledBookingsByUser(){
        $bookings = [];
             $user_id = Auth::user()->getAuthIdentifier();

            // $bookings = self::with(['cartExperiencesCompleted.upscales','cartExperiencesCompleted.experienceImages','cartExperiencesCompleted.tourStatuses'])
            $bookings = self::with(['cartExperiencesNotCompleted.upscales','cartExperiencesNotCompleted.experienceImages','cartExperiencesNotCompleted.tourStatuses'])
                 ->where('user_id', '=', $user_id)
                ->where('finalized', '=', 1)
                ->get();
               
        return $bookings;
    }
}
