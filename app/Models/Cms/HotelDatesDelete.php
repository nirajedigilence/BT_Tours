<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HotelDatesDelete extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'hotel_dates';

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
                  'hotel_id',
                  'date_in',
                  'date_out',
                  'night',
                  'rate_dbb',
                  'rate_dbl',
                  'rate_twn',
                  'rate_trp',
                  'rate_qrd',
                  'rate_dr',
                  'date_srs',
                  'date_srs_dbl',
                  'date_srs_twn',
                  'date_srs_trp',
                  'date_srs_qrd',
                  'date_srs_dr',
                  'rate_dbb_euro',
                  'rate_twn_euro',
                  'rate_dbl_euro',
                  'rate_trp_euro',
                  'rate_qrd_euro',
                  'rate_dr_euro',
                  'date_srs_euro',
                  'date_srs_dbl_euro',
                  'date_srs_twn_euro',
                  'date_srs_dbl_euro',
                  'date_srs_trp_euro',
                  'date_srs_qrd_euro',
                  'date_srs_dr_euro',
                  'free_srs',
                  'commission_id',
                  'sgl',
                  'dbl',
                  'twn',
                  'trp',
                  'qrd',
                  'sgl_dr',
                  'meal_basic_id',
                  'sgl_srs',
                  'dbl_srs',
                  'twn_srs',
                  'trp_srs',
                  'qrd_srs',
                  'dr_srs',
                  'cancellation_days',
                  'events',
                  'event_date',
                  'event_type',
                  'contract',
                  'veenus_contract',
                  'hc_free_place',
                  'hc_mean_arrangements',
                  'hc_services_facilities',
                  'hc_terms_conditions',
                  'hc_inclusions',
                  'ratesallocation',
                  'sign_name_hc',
                  'hc_sign_date',
                  'display_euro_rate',
                  'market_option',
                  'cancel_file',
                  'cancel_notes',
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
    public function hotelDatesAmenities()
    {
        return $this->hasMany('App\Models\Cms\HotelDatesAmenities', 'hotel_dates_id', 'id');
    }

    public function hotelDatesAmenitiesSync()
    {
        return $this->belongsToMany('App\Models\Cms\HotelAmenity', 'hotel_dates_amenities','hotel_dates_id','amenities_id');
    }
}
