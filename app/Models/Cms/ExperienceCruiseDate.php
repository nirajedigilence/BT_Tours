<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExperienceCruiseDate extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'experience_cruise_dates';

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
                  'experiences_id',
                  'dates_rates_id',
                  'hotel_date_id',
                  'type_id',
                  'experience_type',
                  'date_from',
                  'date_to',
                  'price',
                  'price_ss',
                  'nights',
                  'cancellation_days',
                  'description',
                  'sell_date',
                  'price_gbp',
                  'srs_gbp',
                  'price_euro',
                  'srs_euro',
                  'deposit_gbp',
                  'deposit_euro',
                  'pos',
                  'active',
                  'mark_as_completed',
                  'mark_as_completed_tp',
                  'hc_ref_number',
                  'hc_free_place',
                  'hc_mean_arrangements',
                  'hc_services_facilities',
                  'hc_terms_conditions',
                  'hc_inclusions',
                  'sign_name_hc',
                  'display_euro_rate',
                  'display_pound_rate',
                  'market_option',
                  'unbooked',
                  'unbooked_date',
                  'is_date_hold',
                  'hold_date',
                  'ratesallocation'
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
     * Get the Experience for this model.
     *
     * @return App\Models\Cms\Experience
     */
    public function experience()
    {
        return $this->belongsTo('App\Models\Cms\Experience','experiences_id','id');
    }
    public function shipDates()
    {
        return $this->belongsTo('App\Models\Cms\ShipDates','hotel_date_id','id');
    }
    /*public function cabinRates()
    {
        return $this->hasMany('App\Models\Cms\ExperiencesShipDatesCabinRates','experience_cruise_dates_id','id');
    }*/
    public function cabinRates()
    {
        return $this->hasMany('App\Models\Cms\ShipDatesRatesAllocation','ship_dates_id','hotel_date_id');
    }
    /**
     * Set the date_from.
     *
     * @param  string  $value
     * @return void
     */
    public function setDateFromAttribute($value)
    {
        $this->attributes['date_from'] = !empty($value) ? \DateTime::createFromFormat('Y-m-d', $value) : null;
    }

    /**
     * Set the date_to.
     *
     * @param  string  $value
     * @return void
     */
    public function setDateToAttribute($value)
    {
        $this->attributes['date_to'] = !empty($value) ? \DateTime::createFromFormat('Y-m-d', $value) : null;
    }

    /**
     * Get date_from in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getDateFromAttribute($value)
    {
        return !empty($value) ? \DateTime::createFromFormat('Y-m-d', $value)->format('Y-m-d') : null;
    }

    /**
     * Get date_to in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getDateToAttribute($value)
    {
        return !empty($value) ? \DateTime::createFromFormat('Y-m-d', $value)->format('Y-m-d') : null;
    }

    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCreatedAtAttribute($value)
    { //dbg2($value); exit();
        return !empty($value) ? \DateTime::createFromFormat('Y-m-d\TH:i:s.000000\Z', $value)->format('j/n/Y g:i A') : null;
    }

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getUpdatedAtAttribute($value)
    {
        return !empty($value) ? \DateTime::createFromFormat('Y-m-d\TH:i:s.000000\Z', $value)->format('j/n/Y g:i A') : null;
    }

    /**
     * Get deleted_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getDeletedAtAttribute($value)
    {
        return !empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A') : null;
    }

}
