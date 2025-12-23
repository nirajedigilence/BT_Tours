<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductHotel extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'product_hotel';

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
                    'cost',
                    'star_rating',
                    'country_id ',
                    'country_area_id',
                    'town_city',
                    'brand',
                    'owner',
                    'website_url',
                    'contact_number',
                    'menu_url',
                    'location_link',
                    'booking_url',
                    'triadvisor_url',
                    'about',
                    'product_score',
                    'product_score_total',
                    'status',
                    'created_by',
                    'updated_by'
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

    /**
     * Get the country areas for this model.
     *
     * @return App\Models\Cms\CountryArea
     */
    public function getProductHotelScore()
    {
        return $this->hasOne('App\Models\Cms\ProductHotelScore', 'product_hotel_id', 'id');
    }

    public function getProductHotelImages()
    {
        return $this->hasMany('App\Models\Cms\ProductHotelImages', 'product_hotel_id', 'id');
    }
    public function getProductHotelAmenities()
    {
        return $this->hasMany('App\Models\Cms\ProductHotelAmenities', 'product_hotel_id', 'id');
    }
    public function getProductHotelUpscales()
    {
        return $this->hasMany('App\Models\Cms\ProductHotelUpscales', 'product_hotel_id', 'id');
    }

    public static function getProductsHotelWithPagination(){
            $bookings = self::with(['getProductHotelScore'])
            ->where('status', '=', 1)
            // ->get();
            ->paginate(15);
        return $bookings;
    }
}