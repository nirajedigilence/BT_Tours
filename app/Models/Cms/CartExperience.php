<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CartExperience extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'cart_experiences';

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
                'carts_id',
                'completed',
                'tour_type',
                'is_hold',
                'hold_days',
                'dates_rates_id',
                'cruise_dates_rates_id',
                'old_date_rate_id',
                'restored_date',
                'experiences_to_hotels_to_experience_dates_id',
                'experiences_id',
                'hotels_id',
                'experience_dates_id',
                'experience_name',
                'hotel_name',
                'nights',
                'date_from',
                'date_to',
                'currency',
                'standard_price',
                'standard_price_ss',
                'price',
                'price_ss',
                'upscales_price',
                'total_price',
                'single',
                'double',
                'twin',
                'cancel_tour_document',
                'selling_price',
                'srs_price',
                'held_last_date',
                'held_last_time',
                'display_on_print',
                'driver_room_type',
                'driver_name',
                'courier_name',
                'driver_contact',
                'driver_paying',
                'driver_paying1',
                'driver_cost',
                'driver_cost1',
                'driver_second_cost',
                'driver_second_cost1',
                'driver_room_type1',
                'driver_name1',
                'courier_name1',
                'driver_contact1',
                'driver_paying_second',
                'driver_paying_second1',
                'cancel_date',
                'created_by','signed_document','is_resign','resign_notes','resign_notes_date'
                ,'cart_map_url','amendment_text','invoice_sent_finance','xero_contact_id','xero_invoice_id','xero_amount',
                'xero_deposit_invoice_id','xero_deposit_amount','xepo_deposit_paid','xepo_invoice_paid','deposit_invoice_data','invoice_data','xero_invoice_data','deposit_invoice_sent_finance','hotel_amenities',
                'parking_amenity',
                'porterage_amenity',
                'lift_access_amenity',
                'leisure_amenity',
                'tds_mean_arrangements',
                'tp_eta',
                'tp_etd',
                'tp_dinner',
                'tp_breakfast',
                'tp_tour_inclusions',
                'tds_all_meals',
                'tds_important_information',
                'tds_house_keeping',
                'free_place',
                'meal_arrangements',
                'terms_conditions',
                'entertainments',
                'itinerary',
                'excursions',
                'addtional_text',
                'ship_details',
                'is_completed_tds',
                'overnight_inbound',
                'overnight_outbound',
                'crossing_inbound',
                'crossing_outbound',
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
     * Get the Cart.
     *
     * @return App\Models\Cms\Cart
     */
    public function cart()
    {
        return $this->belongsTo('App\Models\Cms\Cart','carts_id','id');
    }
    public function crossing_inbound_data()
    {
        return $this->belongsTo('App\Models\Cms\ShipCrossings','crossing_inbound','id');
    }
    public function crossing_outbound_data()
    {
        return $this->belongsTo('App\Models\Cms\ShipCrossings','crossing_outbound','id');
    }
    /**
     * Get the ExperiencesToHotelsToExperienceDate.
     *
     * @return App\Models\Cms\ExperiencesToHotelsToExperienceDate
     */
    public function experiencesToHotelsToExperienceDate()
    {
        return $this->belongsTo('App\Models\Cms\ExperiencesToHotelsToExperienceDate','experiences_to_hotels_to_experience_dates_id','id');
    }
    public function DriverRoomType1()
    {
        return $this->belongsTo('App\Models\Cms\ShipCabin','driver_room_type','id');
    }
    public function DriverRoomType2()
    {
        return $this->belongsTo('App\Models\Cms\ShipCabin','driver_room_type1','id');
    }
   

    /**
     * Get the experience Images for this model.
     *
     * @return App\Models\Cms\ExperienceImage
     */
    public function experienceImages()
    {
        return $this->hasMany('App\Models\Cms\ExperienceImage','experiences_id','experiences_id')->orderBy('pos', 'asc');
    }

    /**
     * Get the Upscales.
     *
     * @return App\Models\Cms\Upscale
     */
    public function upscales()
    {
        return $this->belongsToMany('App\Models\Cms\Upscale', 'cart_experience_to_upscales','cart_experiences_id','upscales_id')->with('upscaleImages');
    }

    public function experiencesToExperiences()
    {
        return $this->hasMany('App\Models\Cms\ExperiencesToExperiences', 'experiences_id','experiences_id');
    }
    public function experiencesToAttraction()
    {
        return $this->hasMany('App\Models\Cms\ExperiencesToAttraction', 'experiences_id','experiences_id');
    }
    public function cartExperiencesToHotelCruiseOutbound()
    {
        return $this->hasMany('App\Models\Cms\CartExperiencesToCruiseHotel', 'cart_exp_id','id')->where('inbound_outbound','2');
    }
    public function cartExperiencesToHotelCruiseInbound()
    {
        return $this->hasMany('App\Models\Cms\CartExperiencesToCruiseHotel', 'cart_exp_id','id')->where('inbound_outbound','1');
    }
    public function cartExperiencesToAttraction()
    {
        return $this->hasMany('App\Models\Cms\CartExperiencesToAttraction', 'cart_exp_id','id');
    }
    /**
     * Get the Cart Experience Tour statuses.
     *
     * @return App\Models\Cms\TourStatus
     */
    public function tourStatuses()
    {
        return $this->belongsToMany('App\Models\Cms\TourStatus', 'cart_experiences_to_tour_statuses','cart_experiences_id','tour_statuses_id')
            ->withPivot('id','completed','completed_at','due_date','sign_name','collaborator_sign','url','is_skip','step3','step4','step5','step6','step7','step8','step9','step10','pax','sgl_room_total','dbl_room_total','twn_room_total')
            ->orderBy('pos');
    }
    public function tourStatusesCruise()
    {
        return $this->belongsToMany('App\Models\Cms\TourStatusCruise', 'cart_experiences_to_tour_statuses_cruise','cart_experiences_id','tour_statuses_id')
            ->withPivot('id','completed','completed_at','due_date','sign_name','collaborator_sign','url','is_skip','step3','step4','step5','step6','step7','step8','step9','step10','pax','sgl_room_total','dbl_room_total','twn_room_total')
            ->orderBy('pos');
    }
    public function tourStatusesCompleted()
    {
        return $this->belongsToMany('App\Models\Cms\TourStatus', 'cart_experiences_to_tour_statuses','cart_experiences_id','tour_statuses_id')
            ->withPivot('id','tour_statuses_id','completed','due_date','sign_name','collaborator_sign','url','is_skip','step3','step4','step5','step6','step7','step8','step9','step10','pax','sgl_room_total','dbl_room_total','twn_room_total')
            ->wherePivot('tour_statuses_id', '=', 11)
            ->orderBy('pos');
    }
    public function tourStatusesCruiseCompleted()
    {
        return $this->belongsToMany('App\Models\Cms\TourStatusCruise', 'cart_experiences_to_tour_statuses','cart_experiences_id','tour_statuses_id')
            ->withPivot('id','tour_statuses_id','completed','due_date','sign_name','collaborator_sign','url','is_skip','step3','step4','step5','step6','step7','step8','step9','step10','pax','sgl_room_total','dbl_room_total','twn_room_total')
            ->wherePivot('tour_statuses_id', '=', 11)
            ->orderBy('pos');
    }
    public static function addToCurrentUserCart(){
        $cart = [];
        if (Auth::check() && Auth::user()->hasRole("Collaborator")){
            $user_id = Auth::user()->getAuthIdentifier();

            $cartExperience = self::updateOrCreate(
                ['cart_id' => $user_id, 'experiences_to_hotels_to_experience_dates_id' => 0],
                ['user_id' => $user_id, 'finalized' => 0]
            );
        }
        return $cart;
    }
    public function reviews()
    {
        return $this->hasMany('App\Models\Cms\Reviews','cart_experience_id','id')->where('deleted_at',null);
    }
    public function tournotes()
    {
        return $this->hasMany('App\Models\Cms\ToursNotes','cart_id','id')->where('parent_id','0');
    }
}
