<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;

class Hotel_room extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'hotel_rooms';

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
                  'name',
                  'short_name',
                  'icon',
                  'pos',
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
//     * Get created_at in array format
//     *
//     * @param  string  $value
//     * @return array
//     */
//    public function getCreatedAtAttribute($value)
//    {
//        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
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
//        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
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
//        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
//    }

}
