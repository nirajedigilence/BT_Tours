<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartExperiencesTDS extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'cart_experiences_tds';

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
                  'cart_exp_id',
                  'exp_date_id',
                  'tds_parking_amenity',
                  'tds_porterage_amenity',
                  'tds_lift_access_amenity',
                  'tds_leisure_amenity',
                  'tds_mean_arrangements',
                  'tds_eta',
                  'tds_etd',
                  'tds_dinner',
                  'tds_breakfast',
                  'tds_all_meals',
                  'tds_important_information',
                  'tds_house_keeping',
                  'tds_tour_inclusions',
                  'created_at'
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
