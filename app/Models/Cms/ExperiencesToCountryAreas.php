<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;

class ExperiencesToCountryAreas extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'experiences_to_country_areas';
    public $timestamps = false;

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
                    'experiences_id',
                    'country_areas_id',
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


    //TODO Fix relations below
    public function CountryArea()
    {
        return $this->hasOne('App\Models\Cms\CountryArea', 'id', 'country_areas_id');
    }
}