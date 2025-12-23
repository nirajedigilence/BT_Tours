<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExperienceCruiseDatesRates extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'experience_cruise_dates_rates';

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
                  'rate_type',
                  'currency',
                  'rate',
                  'srs',
                  'deposit',
                  'nights',
                  'deposit_pound',
                  'deposit_pound2',
                  'cost_overnight_pound',
                  'add_overnight_ss',
                  'deposit_euro',
                  'deposit_euro2',
                  'cost_overnight_euro',
                  'add_overnight_ss_euro',
                  'cost_crossing_po_pound',
                  'cost_crossing_eurotunnel_pound',
                  'cost_crossing_bri_pound',
                  'cost_crossing_bri_dfd',
                  'free_place',
                  'meal_arrangements',
                  'entertainments',
                  'terms_conditions',
                  'itinerary',
                  'excursions',
                  'facility',
                  'eta',
                  'etd',
                  'important_information',
                  'mark_as_completed_cc',
                  'mark_as_completed_etc',
                  'sign_name_etc',
                  'mark_as_completed_tp',
                  'ratesallocation',
                  'mark_as_completed_tds',
                  'sign_name_tds',
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

   
}
