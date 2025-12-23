<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Upscale extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'upscales';

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
                  'icon',
                  'price',
                  'excerpt',
                  'description',
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

    /**
     * Get the Hotel Images.
     *
     * @return App\Models\Cms\UpscaleImage
     */
    public function upscaleImages()
    {
        return $this->hasMany('App\Models\Cms\UpscaleImage','upscales_id','id')->orderBy('pos', 'asc');
    }

//    /**
//     * Get the hotelsToUpscale for this model.
//     *
//     * @return App\Models\HotelsToUpscale
//     */
//    public function hotelsToUpscale()
//    {
//        return $this->hasOne('App\Models\HotelsToUpscale','upscales_id','id');
//    }


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
