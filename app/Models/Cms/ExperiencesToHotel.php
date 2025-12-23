<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExperiencesToHotel extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'experiences_to_hotels';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'experiences_id',
        'hotels_id',
        'standard_hotel',
        'parking_amenity',
        'porterage_amenity',
        'lift_access_amenity',
        'leisure_amenity',
        'parking_amenity_url',
        'porterage_amenity_url',
        'lift_access_amenity_url',
        'leisure_amenity_url',
        'tour_amenities',
        'tour_amenities_url',
        'about_hotel',
    ];

    public function ExperiencesToHotelsToExperienceDateRecords()
    {
        return $this->hasMany('App\Models\Cms\ExperiencesToHotelsToExperienceDate','experiences_to_hotels_id','id');
    }
    public function getHotelDetail()
    {
        return $this->hasOne('App\Models\Cms\Hotel','id','hotels_id');
    }

}
