<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;

class ExperiencesToHotelAssign extends Model
{
   
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
        'experiences_id',
        'hotels_id',
        'standard_hotel',
        'parking_amenity',
        'porterage_amenity',
        'lift_access_amenity',
        'leisure_amenity',
        'tour_amenities',
        'about_hotel',
        'selected_menu',
        'other_menu'
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
