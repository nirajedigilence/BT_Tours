<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'days';

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
        'experiences_id',
        'country_areas_id',
        'day_number',
        'name',
        'departure',
        'arrival',
        'excerpt',
        'description',
        'address',
        'website',
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
     * Get the Day Images.
     *
     * @return App\Models\Cms\DayImage
     */
    public function dayImages()
    {
        return $this->hasMany('App\Models\Cms\DayImage','days_id','id')->orderBy('pos', 'asc');
    }

    /**
     * Get the CountryArea for this model.
     *
     * @return App\Models\Cms\CountryArea
     */
    public function countryArea()
    {
        return $this->belongsTo('App\Models\Cms\CountryArea','country_areas_id','id');
    }

    /**
     * Get the Day Inclusions (Highlights) for this model.
     *
     * @return App\Models\Cms\Inclusion
     */
    public function dayInclusions()
    {
        return $this->belongsToMany('App\Models\Cms\Inclusion', 'days_to_inclusions','days_id','inclusions_id');
    }

    /**
     * Get the experience for this model.
     *
     * @return App\Models\Cms\Experience
     */
    public function experience()
    {
        return $this->belongsTo('App\Models\Cms\Experience', 'experiences_id','id');
    }

}
