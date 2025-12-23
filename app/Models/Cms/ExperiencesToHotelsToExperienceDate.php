<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExperiencesToHotelsToExperienceDate extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'experiences_to_hotels_to_experience_dates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'experiences_to_hotels_id',
        'experience_dates_id',
        'hotel_dates_id',
        'nights',
        'price',
        'price_ss',
        'active',
    ];

    public function hotel (){
        return $this->hasOneThrough(
            'App\Models\Cms\Hotel',
            'App\Models\Cms\ExperiencesToHotel',
            'id', // Foreign key on ExperiencesToHotels table...
            'id', // Foreign key on Hotels table...
            'experiences_to_hotels_id', // Local key on ExperiencesToHotelsToExperienceDates table...
            'hotels_id' // Local key on ExperiencesToHotels table...
        );
    }
    public function experienceDate (){
        return $this->belongsTo(
            'App\Models\Cms\ExperienceDate',
            'experience_dates_id',
            'id'
        );
    }
    public function HotelDates()
    {
        return $this->hasOne('App\Models\Cms\HotelDates','id','hotel_dates_id');
    }
//    public function Experience()
//    {
//        return $this->belongsTo('App\Models\Cms\Experience', 'experiences_id');
//    }

}
