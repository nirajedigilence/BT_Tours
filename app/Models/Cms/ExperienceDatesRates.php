<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExperienceDatesRates extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'experience_dates_rates';

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
                  'currency',
                  'rate',
                  'single',
                  'double',
                  'twin',
                  'triple',
                  'quad',
                  'driver',
                  'srs',
                  'deposit',
                  'nights',
                  'single_srs',
                  'double_srs',
                  'twin_srs',
                  'triple_srs',
                  'quad_srs',
                  'driver_srs',
                  'rate_euro',
                  'single_euro',
                  'double_euro',
                  'twin_euro',
                  'triple_euro',
                  'quad_euro',
                  'driver_euro',
                  'srs_euro',
                  'deposit_euro',
                  'single_srs_euro',
                  'double_srs_euro',
                  'twin_srs_euro',
                  'triple_srs_euro',
                  'quad_srs_euro',
                  'driver_srs_euro',
                  'etc_ref_number',
                  'etc_free_place',
                  'etc_meal_arrangements',
                  'etc_tour_inclusions',
                  'etc_services_facilities',
                  'etc_terms_conditions',
                  'tp_ref_number',
                  'tp_eta',
                  'tp_etd',
                  'tp_dinner',
                  'tp_breakfast',
                  'tp_tour_inclusions',
                  'tds_all_meals',
                  'tds_important_information',
                  'tds_house_keeping',
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
