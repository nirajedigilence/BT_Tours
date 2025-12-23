<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExperiencesToShipsToExperienceDate extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'experiences_to_ships_to_experience_dates';

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

    public function ship(){
        return $this->hasOneThrough(
            'App\Models\Cms\Ship',
            'App\Models\Cms\ExperiencesToShips',
            'id', // Foreign key on ExperiencesToHotels table...
            'id', // Foreign key on Hotels table...
            'experiences_to_hotels_id', // Local key on ExperiencesToHotelsToExperienceDates table...
            'ships_id' // Local key on ExperiencesToHotels table...
        );
    }
    public function experienceCruiseDates (){
        return $this->belongsTo(
            'App\Models\Cms\ExperienceCruiseDate',
            'experience_dates_id',
            'id'
        );
    }
    
    public function ShipDates()
    {
        return $this->hasOne('App\Models\Cms\ShipDates','id','hotel_dates_id');
    }
//    public function Experience()
//    {
//        return $this->belongsTo('App\Models\Cms\Experience', 'experiences_id');
//    }

}
