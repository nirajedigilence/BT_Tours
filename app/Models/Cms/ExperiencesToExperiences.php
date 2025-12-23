<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExperiencesToExperiences extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'experiences_to_experiences';

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
                    'type_id',
                    'name',
                    'score',
                    'tripadvisor_url',
                    'website',
                    'mobility',
                    'description',
                    'created_at',
                    'updated_at',
                    'deleted_at'
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
    public function getExperiencesToExperiencesInclusions()
    {
        return $this->hasMany('App\Models\Cms\ExperiencesToExperiencesInclusions', 'experiences_to_experiences_id', 'id');
    }
    public function getExperiencesToExperiencesImage()
    {
        return $this->hasMany('App\Models\Cms\ExperiencesToExperiencesImages', 'experiences_to_experiences_id', 'id');
    }
}