<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartExpericenceCP extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'cart_experiences_cp';

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
                  'cruise_hotel_id',
                  'cp_mean_arrangements',
                  'cp_eta',
                  'cp_etd',
                  'cp_important_information',
                  'cp_house_keeping',
                  'cp_tour_inclusions',
                  'cp_services_facilities',
                  'cp_excursions',
                  'cp_itinerary',
                  'cp_facility',
                  'cp_entertainments',
                  'cp_ship_details',
                  'cp_addtional_text',
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
