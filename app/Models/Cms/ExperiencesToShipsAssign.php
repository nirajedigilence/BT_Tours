<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;

class ExperiencesToShipsAssign extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'experiences_to_ships';

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
                  'experience_id',
                  'name',
                  'excerpt',
                  'description',
                  'stars',
                  'built',
                  'refurbished',
                  'cabins',
                  'passengers',
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
                  'deck_plan',
                  'festive_menu',
                  'main_menu',
                  'selected_menu',
                  'other_menu',
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
    public function experiencesShipCabin()
    {
        return $this->hasMany('App\Models\Cms\ExperiencesShipCabin','experience_to_ship_id','id');
    }
     public function getHotelDetail()
    {
        return $this->hasOne('App\Models\Cms\Ship','id','ships_id');
    }
}
