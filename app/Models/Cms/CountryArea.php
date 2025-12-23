<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CountryArea extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'country_areas';

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
                  'countries_id',
                  'name',
                  'excerpt',
                  'description',
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

    /**
     * Get the Country for this model.
     *
     * @return App\Models\Cms\Country
     */
    public function country()
    {
        return $this->belongsTo('App\Models\Cms\Country','countries_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function experiences()
    {
        return $this->belongsToMany('App\Models\Cms\Experience','experiences_to_country_areas','country_areas_id', 'experiences_id')->where('experiences.exp_type', '=', '3')->where('experiences.active', '=', '1');
    }


    
}
