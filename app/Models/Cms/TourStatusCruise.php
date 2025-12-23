<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourStatusCruise extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'tour_statuses_cruise';

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
                  'name',
                  'percent',
                  'active',
                  //'pos'
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
     * Get the cart experiences for this model.
     *
     * @return App\Models\Cms\CartExperience
     */
    public function cartExperiences()
    {
        return $this->belongsToMany('App\Models\Cms\CartExperience', 'cart_experiences_to_tour_statuses','tour_statuses_id','cart_experiences_id');
    }

}
