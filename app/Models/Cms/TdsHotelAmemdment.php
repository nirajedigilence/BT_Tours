<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TdsHotelAmemdment extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'tds_hotel_amemdment';

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
                  'tds_services_facilities',
                  'hotel_parking_amenity',
                  'hotel_porterage_amenity',
                  'hotel_lift_access_amenity',
                  'hotel_leisure_amenity',
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
