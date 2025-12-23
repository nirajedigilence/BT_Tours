<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experience extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'experiences';

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
                    'tour_id',
                    'experience_types_id',
                    'ships_id',
                    'exp_type',
                    'country',
                    'rivers',
                    'name',
                    'slug_name',
                    'excerpt',
                    'description',
                    'hotel_label_1',
                    'hotel_label_2',
                    'itinerary',
                    'price',
                    'price_ss',
                    'firstpage',
                    'active',
                    'htaccess_url',
                    'meta_title',
                    'meta_keywords',
                    'meta_description',
                    'meta_metatags',
                    'vip',
                    'local',
                    'big',
                    'mobility',
                    'show_tour',
                    'fixtures',
                    'accommodation',
                    'fixture_option',
                    'map_url',
                    'video_title',
                    'video',
                    'created_by',
                    'updated_by',
                    'half_full',
                    'reason_considaring',
                    'estimated_cost_pp',
                    'estimated_in_rate',
                    'website_url',
                    'tripadvisor_url',
                    'location_url',
                    'owner',
                    'length',
                    'contact_name',
                    'contact_position',
                    'main_contact_number',
                    'direct_contact_number',
                    'email',
                    'address',
                    'street',
                    'city',
                    'postcode',
                    'story',
                    'veenus_score',
                    'inclusions',
                    'eta',
                    'etd',
                    'dinner',
                    'breakfast',
                    'tour_inclusions',
                    'terms_conditions',
                    'free_place',
                    'meal_arrangements',
                    'ref_number',
                    'enquiry_rate',
                    'currency',
                    'rate',
                    'srs',
                    'nights',
                    'can_deadline',
                    'coach_hire_cost',
                    'avg_cost_fixture',
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

    /**
     * Get the experience Images for this model.
     *
     * @return App\Models\Cms\ExperienceImage
     */
    public function experienceImages()
    {
        return $this->hasMany('App\Models\Cms\ExperienceImage','experiences_id','id')->orderBy('pos', 'asc');
    }
    public function experienceMapImages()
    {
        return $this->hasMany('App\Models\Cms\ExperienceMapImage','experiences_id','id')->orderBy('pos', 'asc');
    }

    /**
     * Get the experience Days.
     *
     * @return App\Models\Cms\Day
     */
    public function days()
    {
        return $this->hasMany('App\Models\Cms\Day','experiences_id','id')->orderBy('day_number', 'asc');
    }

//    public function getExperienceImageMain()
//    {
//        return $this->experienceImages()->first();
//    }

    /**
     * Get the ExperienceType.
     *
     * @return App\Models\Cms\ExperienceType
     */
    public function experienceType()
    {
        return $this->belongsTo('App\Models\Cms\ExperienceType','experience_types_id','id');
    }

    /**
     * Get the cruise Ship.
     *
     * @return App\Models\Cms\Ship
     */
    public function ship()
    {
        return $this->belongsTo('App\Models\Cms\Ship','ships_id','id');
    }

    public function еxperiencesToHotelsToExperienceDates(){
        return $this->hasManyThrough(
            'App\Models\Cms\ExperiencesToHotelsToExperienceDate',
            'App\Models\Cms\ExperiencesToHotel',
            'experiences_id', // Foreign key on ExperiencesToHotel table...
            'experiences_to_hotels_id', // Foreign key on ExperiencesToHotelsToExperienceDate table...
            'id', // Local key on Experiences table...
            'id' // Local key on ExperiencesToHotel table...
        )
        ->with('hotel')
        ->with('experienceDate')
        ->with('HotelDates');
    }
    public function еxperiencesToShipsToExperienceDates(){
        return $this->hasManyThrough(
            'App\Models\Cms\ExperiencesToShipsToExperienceDate',
            'App\Models\Cms\ExperiencesToShips',
            'experience_id', // Foreign key on ExperiencesToHotel table...
            'experiences_to_hotels_id', // Foreign key on ExperiencesToHotelsToExperienceDate table...
            'id', // Local key on Experiences table...
            'id' // Local key on ExperiencesToHotel table...
        )
        ->with('ship')
        ->with('experienceCruiseDates')
        ->with('ShipDates');
    }
    public function getеxperienceHotelsByExperienceDate($experience_dates_id){
        return $this->with('еxperiencesToHotelsToExperienceDates')
        ->where('experience_dates_id', '=', $experience_dates_id);
    }

    /**
     * Get the experience Files for this model.
     *
     * @return App\Models\Cms\ExperienceFile
     */
    public function experienceFiles()
    {
        return $this->hasMany('App\Models\Cms\ExperienceFile','experiences_id','id');
    }

    /**
     * Get the experience Dates for this model.
     *
     * @return App\Models\Cms\ExperienceDate
     */
    public function experienceDates()
    {
        return $this->hasMany('App\Models\Cms\ExperienceDate','experiences_id','id');
    }
    public function experienceCruiseDates()
    {
        return $this->hasMany('App\Models\Cms\ExperienceCruiseDate','experiences_id','id');
    }
    public function experienceDates1()
    {
        return $this->hasMany('App\Models\Cms\ExperienceDate','experiences_id','id')->where('experience_dates.type_id', '1');
    }
    public function experienceDates2()
    {
        return $this->hasMany('App\Models\Cms\ExperienceDate','experiences_id','id')->where('experience_dates.type_id', '2');
    }
    public function experiencesToItinerary()
    {
        return $this->hasMany('App\Models\Cms\ExperiencesToItinerary','experiences_id','id');
    }
    public function ExperienceDateAdditionalTexts()
    {
        return $this->hasMany('App\Models\Cms\ExperienceDateAdditionalText','experiences_id','id');
    }
    public function ExperiencesToGallerys()
    {
        return $this->hasMany('App\Models\Cms\ExperiencesToGallery','experiences_id','id');
    }
    public function ExperiencesToFixture()
    {
        return $this->hasMany('App\Models\Cms\ExperiencesToFixtures','experiences_id','id');
        
    }
    public function ExperiencesToReviews()
    {
        return $this->hasMany('App\Models\Cms\ExperiencesToReviews','experiences_id','id');
    }
    /**
     * Get the experience Dates for this model.
     *
     * @return App\Models\Cms\ExperienceDate
     */
    public function experienceDatesActive()
    {
        return $this->hasMany('App\Models\Cms\ExperienceDate','experiences_id','id')->where('active', '=', '1');
    }
    public function experienceCruiseDatesActive()
    {
        return $this->hasMany('App\Models\Cms\ExperienceCruiseDate','experiences_id','id')->where('active', '=', '1');
    }
    /**
     * Get the Experience Categories for this model.
     *
     * @return App\Models\Cms\ExperienceCategory
     */
    public function experienceCategories()
    {
        return $this->belongsToMany('App\Models\Cms\ExperienceCategory', 'experiences_to_experience_categories', 'experiences_id','experience_categories_id');
    }

    /**
     * Get the Country Areas for this model.
     *
     * @return App\Models\Cms\CountryArea
     */
    public function countryAreas()
    {
        return $this->belongsToMany('App\Models\Cms\CountryArea', 'experiences_to_country_areas','experiences_id','country_areas_id');
    }

    public function getCountryAreas()
    {
        return $this->hasMany('App\Models\Cms\ExperiencesToCountryAreas', 'experiences_id', 'id');
    }
	 public function experiencesToAttraction()
    {
        return $this->hasMany('App\Models\Cms\ExperiencesToAttraction', 'experiences_id','experiences_id');
    }
	 public function getExperiencesToInclusionsNew()
    {
        return $this->hasMany('App\Models\Cms\ExperiencesToInclusions', 'experiences_id', 'id');
    }
    public function getExperiencesToInclusionsBlueBar()
    {
        return $this->hasMany('App\Models\Cms\ExperiencesToInclusions', 'experiences_id', 'id')->where('type_id','1');
    }
    public function getExperiencesToInclusionsShip()
    {
        return $this->hasMany('App\Models\Cms\ExperiencesToInclusions', 'experiences_id', 'id')->where('type_id','2');
    }
    public function getExperiencesToInclusionsShipNew()
    {
        return $this->hasMany('App\Models\Cms\ExperiencesToInclusions', 'experiences_id', 'id')->where('type_id','3');
    }
    public function getExperiencesToRoutes()
    {
        return $this->hasMany('App\Models\Cms\ExperiencesToRoutes', 'experiences_id', 'id');
    }

    
    public function getExperiencesToExperiences()
    {
        return $this->hasMany('App\Models\Cms\ExperiencesToExperiences', 'experiences_id', 'id');
    }
  
    /**
     * Get the Experience Extras for this model.
     *
     * @return App\Models\Cms\ExperienceExtra
     */
    public function experienceExtras()
    {
        return $this->belongsToMany('App\Models\Cms\ExperienceExtra', 'experiences_to_experience_extras','experiences_id','experience_extras_id');
    }

    /**
     * Get the Experience Inclusions for this model.
     *
     * @return App\Models\Cms\ExperienceInclusion
     */
    public function ExperienceInclusions()
    {
        return $this->belongsToMany('App\Models\Cms\Inclusion', 'experiences_to_inclusions','experiences_id','inclusions_id');
    }

    /**
     * Get the Experience Attractions for this model.
     *
     * @return App\Models\Cms\ExperienceAttraction
     */
    public function ExperienceAttractions()
    {
        return $this->belongsToMany('App\Models\Cms\Attraction', 'experiences_to_attractions','experiences_id','attractions_id')
            ->with('attractionImages');
            //->with('attractionInclusions');
    }

    /**
     * Get the Experience Hotel.
     *
     * @return App\Models\Cms\Hotel
     */
    public function ExperienceHotels()
    {
        //return $this->hasOne('App\Models\Cms\Hotel', 'id','hotels_id')->with('hotelImages');
        return $this->belongsToMany('App\Models\Cms\Hotel', 'experiences_to_hotels','experiences_id','hotels_id')
            ->with('hotelImages')
            ->with('hotelAmenities')
            ->with('upscales')
            ->withPivot('id','standard_hotel','selected_menu','other_menu');
    }
    public function ExperienceShips()
    {
        //return $this->hasOne('App\Models\Cms\Hotel', 'id','hotels_id')->with('hotelImages');
        return $this->belongsToMany('App\Models\Cms\Ship', 'experiences_to_ships','experience_id','ships_id')
            ->with('shipImages')
            ->withPivot('id','selected_menu','other_menu');
    }

//    /**
//     * Get created_at in array format
//     *
//     * @param  string  $value
//     * @return array
//     */
//    public function getCreatedAtAttribute($value)
//    {
//        return !empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A') : null;
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
//        return !empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A') : null;
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
//        return !empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A') : null;
//    }

}
