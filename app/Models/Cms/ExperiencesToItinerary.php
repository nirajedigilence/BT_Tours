<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExperiencesToItinerary extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'experiences_to_itinerary';

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
                    'name',
                    'description',
                    'departure_time',
                    'arrival_time'
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
    public function experiencesToItineraryImages()
    {
        return $this->hasMany('App\Models\Cms\ExperiencesToItineraryImages','experiences_to_itinerary_id','id');
    }
    public function experiencesToItineraryHighlights()
    {
        return $this->hasMany('App\Models\Cms\ExperiencesToItineraryHighlights','experiences_to_itinerary_id','id');
    }
}