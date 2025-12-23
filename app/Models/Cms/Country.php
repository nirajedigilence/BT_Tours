<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'countries';

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
                  'code',
                  'photos',
                  'active',
                  'is_tour_country',
                  'is_cruise_country',
                  'is_bt_country',
                  'assign_rivers',
                  'pos'
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

    /**
     * Get the country areas for this model.
     *
     * @return App\Models\Cms\CountryArea
     */
    public function countryAreas()
    {
        return $this->hasMany('App\Models\Cms\CountryArea','countries_id','id');
    }

//    public function experiences ()
//    {
//        return $this->hasManyThrough('App\Models\Cms\Experience', 'App\Models\Cms\CountryArea', 'countries_id', 'country_areas_id', 'id');
//    }

    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    /*public function getCreatedAtAttribute($value)
    {
        return !empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A') : null;
    }*/

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    /*public function getUpdatedAtAttribute($value)
    {
        return !empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A') : null;
    }*/

    /**
     * Get deleted_at in array format
     *
     * @param  string  $value
     * @return array
     */
    /*public function getDeletedAtAttribute($value)
    {
        return !empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A') : null;
    }*/

}
