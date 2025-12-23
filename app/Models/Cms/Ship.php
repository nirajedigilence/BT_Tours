<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ship extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'ships';

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
                  'name',
                  'excerpt',
                  'description',
                  'stars',
                  'built',
                  'refurbished',
                  'cabins',
                  'passengers',
                  'commissioned',
                  'crew',
                  'length',
                  'beam',
                  'draught',
                  'phone',
                  'address',
                  'website',
                  'menu_link',
                  'contacts',
                  'company',
                  'coach_parking',
                  'staff_to_guest',
                  'draft',
                  'email',
                  'cabin_types',
                  'cabin_types_url',
                  'deck_plan',
                  'festive_menu',
                  'main_menu',
                  'about_text',
                  //'pos',
                  'active'
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
     * Get the experiences for this model.
     *
     * @return App\Models\Cms\Experience
     */
    public function experiences()
    {
        return $this->hasMany('App\Models\Cms\Experience', 'ships_id','id');
    }

    /**
     * Get the Ship Images.
     *
     * @return App\Models\Cms\ShipImage
     */
    public function shipImages()
    {
        return $this->hasMany('App\Models\Cms\ShipImage','ships_id','id')->orderBy('pos', 'asc');
    }

    /**
     * Get the Ship Cabins.
     *
     * @return App\Models\Cms\ShipCabin
     */
    public function shipCabins()
    {
        return $this->hasMany('App\Models\Cms\ShipCabin','ships_id','id')->orderBy('pos', 'asc');
    }

    /**
     * Get the Ship's Hotel Amenities.
     *
     * @return App\Models\Cms\HotelAmenity
     */
    public function hotelAmenities()
    {
        return $this->belongsToMany('App\Models\Cms\HotelAmenity', 'ships_to_hotel_amenities','ships_id','hotel_amenities_id');
    }
     public function ShipDates()
    {
        return $this->hasMany('App\Models\Cms\ShipDates','ship_id','id')->where('deleted_at',null);
    }
}
