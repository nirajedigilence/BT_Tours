<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;

class ShipDatesRatesAllocation extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'ship_dates_rates_allocation';

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
                  'exp_date_rates_id',
                  'ship_dates_id',
                  'cabin_id',
                  'cabin_type',
                  'no_cabin',
                  'rate_pound',
                  'ss_pound',
                  'ss_after_pound',
                  'rate_euro',
                  'ss_euro',
                  'ss_after_euro',
                  'ss_percentage',
                  'ss_after_percentage',
                  'overnight_ss',
                  'crossing_route_ss',
                  'overnight_ss_after',
                  'crossing_route_ss_after',
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


}
