<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
class CartExperiencesToCruiseHotel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'cart_experiences_to_cruise_hotel';

    /**
    * The database primary key value.
    *
    * @var string
    */
    public $timestamps = false;
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'room_id',
                  'cart_exp_id',
                  'hotel_id',
                  'inbound_outbound',
                  'from_date',
                  'to_date',
                  'created_by',
                  'created_at',
                  'updated_by',
                  'updated_at'
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
    public function hotelAmendementCD()
    {
        return $this->belongsTo('App\Models\Cms\CDHotelAmemdment','id','cruise_hotel_id');
    }
    
}
