<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'hotels';

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
                  'id',
                  'country_areas_id',
                  'name',
                  'excerpt',
                  'description',
                  'stars',
                  'phone',
                  'address',
                  'street',
                  'city',
                  'postcode',
                  'country',
                  'latitude',
                  'longitude',
                  'website',
                  'rating',
                  'email',
                  'contact_name',
                  'contact_position',
                  'contact_number',
                  'menu_url',
                  'location_link',
                  'booking_url',
                  'triadvisor_url',
                  'parking_amenity',
                  'porterage_amenity',
                  'lift_access_amenity',
                  'leisure_amenity',
                  'hotel_amenities',
                  'hotel_city',
                  'estimated_cost',
                  'distance_from_vip_miles',
                  'owner',
                  'brand',
                  'main_contact_number',
                  //'pos',
                  'active',
                  'ratesallocation',
                  'mean_arrangements',
                  'free_place',
                  'inclusions',
                  'services_facilities',
                  'terms_conditions',
                  'virtual_tour',
                  'contacts',
                  'preferred_currency',
                  'disabled_bedrooms',
                  'bedrooms_with_walk',
                  'ground_floor_rooms',
                  'house_keeping',
                  'main_menu',
                  'festive_menu'
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
     * Get the CountryArea for this model.
     *
     * @return App\Models\Cms\CountryArea
     */
    public function CountryArea()
    {
        return $this->belongsTo('App\Models\Cms\CountryArea','country_areas_id','id');
    }

    /**
     * Get the experiences for this model.
     *
     * @return App\Models\Cms\Experience
     */
    public function experiences()
    {
        //return $this->hasMany('App\Models\Cms\Experience','hotels_id','id');
        return $this->belongsToMany('App\Models\Cms\Experience', 'experiences_to_hotels','hotels_id','experiences_id');
    }

    /**
     * Get the Hotel Images.
     *
     * @return App\Models\Cms\HotelImage
     */
    public function hotelImages()
    {
        return $this->hasMany('App\Models\Cms\HotelImage','hotels_id','id')->orderBy('pos', 'asc');
    }
    public function hotelDates()
    {
        return $this->hasMany('App\Models\Cms\HotelDates','hotel_id','id')->where('deleted_at',null);
    }

    /**
     * Get the Hotel Amenities.
     *
     * @return App\Models\Cms\HotelAmenity
     */
    public function hotelAmenities()
    {
        return $this->belongsToMany('App\Models\Cms\HotelAmenity', 'hotels_to_hotel_amenities','hotels_id','hotel_amenities_id');
    }

    public function hotelRooms()
    {
        return $this->belongsToMany('App\Models\Cms\Hotel_room', 'hotels_to_hotel_rooms','hotels_id','hotel_room_id');
    }
    
    public function hotelSupplements()
    {
        return $this->belongsToMany('App\Models\Cms\Hotel_supplement', 'hotels_to_hotel_supplements','hotels_id','hotel_supplements_id');
    }

    /**
     * Get the Upscales.
     *
     * @return App\Models\Cms\Upscale
     */
    public function upscales()
    {
        return $this->belongsToMany('App\Models\Cms\Upscale', 'hotels_to_upscales','hotels_id','upscales_id')->with('upscaleImages');
    }


//    /**
//     * Get created_at in array format
//     *
//     * @param  string  $value
//     * @return array
//     */
//    public function getCreatedAtAttribute($value)
//    {
//        return !empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A') : null;
//    }
//
//    /**
//     * Get updated_at in array format
//     *
//     * @param  string  $value
//     * @return array
//     */
//    public function getUpdatedAtAttribute($value)
//    {
//        return !empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A') : null;
//    }
//
//    /**
//     * Get deleted_at in array format
//     *
//     * @param  string  $value
//     * @return array
//     */
//    public function getDeletedAtAttribute($value)
//    {
//        return !empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A') : null;
//    }

}
