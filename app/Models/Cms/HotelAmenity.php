<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class HotelAmenity extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'hotel_amenities';

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
                  'id',
                  'name',
                  'icon',
                  //'pos',
                  'active'
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

    public static function getAll(){

        return self::get();
    }

//    /**
//     * Get the hotelsToHotelAmenity for this model.
//     *
//     * @return App\Models\HotelsToHotelAmenity
//     */
//    public function hotelsToHotelAmenity()
//    {
//        return $this->hasOne('App\Models\HotelsToHotelAmenity','hotel_amenities_id','id');
//    }

//    /**
//     * Get created_at in array format
//     *
//     * @param  string  $value
//     * @return array
//     */
//    public function getCreatedAtAttribute($value)
//    {
//        return !empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A') : null;
//    }
//
//    /**
//     * Get updated_at in array format
//     *
//     * @param  string  $value
//     * @return array
//     */
//    public function getUpdatedAtAttribute($value)
//    {
//        return !empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A') : null;
//    }
//
//    /**
//     * Get deleted_at in array format
//     *
//     * @param  string  $value
//     * @return array
//     */
//    public function getDeletedAtAttribute($value)
//    {
//        return !empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A') : null;
//    }

}
