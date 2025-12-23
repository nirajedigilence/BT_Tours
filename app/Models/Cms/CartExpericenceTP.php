<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartExpericenceTP extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'cart_experiences_tp';

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
                  'tp_parking_amenity',
                  'tp_porterage_amenity',
                  'tp_lift_access_amenity',
                  'tp_leisure_amenity',
                  'tp_mean_arrangements',
                  'tp_eta',
                  'tp_etd',
                  'tp_dinner',
                  'tp_breakfast',
                  'tp_all_meals',
                  'tp_important_information',
                  'tp_house_keeping',
                  'tp_tour_inclusions',
                  'tp_services_facilities',
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
