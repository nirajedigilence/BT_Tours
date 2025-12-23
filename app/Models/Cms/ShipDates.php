<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShipDates extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'ship_dates';

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
                  'ship_id',
                  'date_in',
                  'date_out',
                  'embarkation',
                  'disembarkation',
                  'time_in',
                  'time_out',
                  'night',
                  'river',
                  'routes',
                  'ss_after_value',
                  'ss_after_show',
                  'contract',
                  'sign_name_hc',
                  'hc_sign_date',
                  'display_euro_rate',
                  'hc_free_place',
                  'hc_mean_arrangements',
                  'hc_services_facilities',
                  'hc_terms_conditions',
                  'hc_inclusions',
                  'hc_entertainments',
                  'market_option',
                  'cancel_notes',
                  'cancel_file',
                  'status',
                  'created_by',
                  'updated_by',
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
    public function ship()
    {
        return $this->belongsTo('App\Models\Cms\Ship','ship_id','id');
    }
    public function shipDatesRates()
    {
        return $this->hasMany('App\Models\Cms\ShipDatesRatesAllocation', 'ship_dates_id', 'id');
    }
    public function shipDatesExcursions()
    {
        return $this->hasMany('App\Models\Cms\ShipDatesExcursions', 'ship_dates_id', 'id');
    }
    public function shipDatesSupplements()
    {
        return $this->hasMany('App\Models\Cms\ShipDatesSupplements', 'ship_dates_id', 'id');
    }
    public function hotelDatesAmenities()
    {
        return $this->hasMany('App\Models\Cms\HotelDatesAmenities', 'hotel_dates_id', 'id');
    }

    public function hotelDatesAmenitiesSync()
    {
        return $this->belongsToMany('App\Models\Cms\HotelAmenity', 'hotel_dates_amenities','hotel_dates_id','amenities_id');
    }
}
