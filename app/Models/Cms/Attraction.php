<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attraction extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'attractions';

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
                  'type_id',
                  'country_areas_id',
                  'name',
                  'score',
                  'distance_from_vip_miles',
                  'icon',
                  'excerpt',
                  'description',
                  'address',
                  'website',
                  'tripadvisor_url',
                  'mobility',
                  'activity_level',
                  //'pos',
                  'vip',
                  'active',
                  'big',
                  'local',
                  'reason_considaring',
                  'estimated_cost_pp',
                  'estimated_in_rate',
                  'estimated_cost_pp_euro',
                  'estimated_in_rate_euro',
                  'location_url',
                  'owner',
                  'half_full',
                  'contact_name',
                  'contact_position',
                  'main_contact_number',
                  'direct_contact_number',
                  'email',
                  'street',
                  'city',
                  'postcode',
                  'satnav_postcode',
                  'arrival_procedure',
                  'coach_parking',
                  'latitude',
                  'longitude',
                  'country',
                  'story',
                  'inclusions',
                  'confirm_description',
                  'free_place',
                  'group_size',
                  'mobility_access',
                  'terms_conditions',
                  'date',
                  'time',
                  'inclusion_name',
                  'ref_nr',
                  'attractionsAvailability',
                  'attractionsDaysAvailability',
                  'exp_inclusions',
                  'coach_dropoff',
                  'general_info',
                  'coach_parking_voucher',
                  'additional_info',

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
     * Get the Attraction Images for this model.
     *
     * @return App\Models\Cms\AttractionImage
     */
    public function attractionImages()
    {
        return $this->hasMany('App\Models\Cms\AttractionImage','attractions_id','id')->orderBy('pos', 'asc');
    }

    public function printImages()
    {
        return $this->hasMany('App\Models\Cms\PrintImages','attractions_id','id')->orderBy('pos', 'asc');
    }

    /**
     * Get the CountryArea for this model.
     *
     * @return App\Models\CountryArea
     */
    public function CountryArea()
    {
        return $this->belongsTo('App\Models\Cms\CountryArea','country_areas_id','id');
    }

    /**
     * Get the Attraction Inclusions for this model.
     *
     * @return App\Models\Cms\Inclusion
     */
    public function attractionInclusions()
    {
        return $this->belongsToMany('App\Models\Cms\Inclusion', 'attractions_to_inclusions','attractions_id','inclusions_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function experiences()
    {
        return $this->belongsToMany('App\Models\Cms\Experience','experiences_to_attractions','attractions_id', 'experiences_id');
    }
	 /**
     * Get the experience Images for this model.
     *
     * @return App\Models\Cms\ExperienceImage
     */
    public function experienceImages()
    {
      return $this->hasMany('App\Models\Cms\AttractionImage','attractions_id ','id')->orderBy('pos', 'asc');
		//return $this->hasMany('App\Models\Cms\AttractionImage')->orderBy('pos', 'asc'); 
    }
	/**
     * Get the Experience Categories for this model.
     *
     * @return App\Models\Cms\ExperienceCategory
     */
    public function experienceCategories()
    {
        return $this->belongsToMany('App\Models\Cms\ExperienceCategory', 'attractions_to_experience_categories', 'attractions_id','attractions_categories_id');
    }
	  public function countryAreas()
    {
        return $this->belongsToMany('App\Models\Cms\CountryArea', 'experiences_to_country_areas','experiences_id','country_areas_id');
    }

    public function getCountryAreas()
    {
        return $this->hasMany('App\Models\Cms\ExperiencesToCountryAreas', 'experiences_id', 'id');
    }
    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCreatedAtAttribute($value)
    {
        return !empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A') : null;
    }

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getUpdatedAtAttribute($value)
    {
        return !empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A') : null;
    }

    /**
     * Get deleted_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getDeletedAtAttribute($value)
    {
        return !empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A') : null;
    }
    public function getProductsExperienceScore()
    {
        return $this->hasOne('App\Models\Cms\ProductsExperienceScore', 'products_experience_id', 'id');
    }
    public static function getProductsExperienceLists(){
            $bookings = self::with(['getProductsExperienceScore'])
            ->where('active', '=', 1)
            ->get();
        return $bookings;
    }
    public static function getProductsExperienceListsWithPagination(){
            $bookings = self::with(['getProductsExperienceScore'])
            ->where('active', '=', 1)
            // ->get();
            ->paginate(15);
        return $bookings;
    }
	public function setCategoryAttribute($value)
    {
        $this->attributes['attractionsAvailability'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['attractionsAvailability'] = json_decode($value);
    }
}
