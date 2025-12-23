<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CDHotelAmemdment extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'cd_hotel_amemdment';

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
                  'cd_mean_arrangements',
                  'cd_eta',
                  'cd_etd',
                  'cd_important_information',
                  'cd_house_keeping',
                  'cd_tour_inclusions',
                  'cd_services_facilities',
                  'cd_excursions',
                  'cd_itinerary',
                  'cd_facility',
                  'cd_entertainments',
                  'cd_ship_details',
                  'cd_addtional_text',
                  'cd_tour_inclusions',
                  'hotel_mean_arrangements',
                  'hotel_eta',
                  'hotel_etd',
                  'hotel_dinner',
                  'hotel_breakfast',
                  'hotel_all_meals',
                  'hotel_important_information',
                  'hotel_house_keeping',
                  'hotel_tour_inclusions',
                  'hotel_services_facilities',
                  'hotel_excursions',
                  'hotel_itinerary',
                  'hotel_facility',
                  'hotel_entertainments',
                  'hotel_tour_inclusions',
                  'hotel_sign',
                  'hotel_sign_date',
                  'mark_as_completed_tds',
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
