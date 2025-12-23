<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExperienceType extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'experience_types';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'name',
                  'photos',
                  'active',
                  //'pos'
              ];

    /**
     * Get the country areas for this model.
     *
     * @return App\Models\Cms\Experience
     */
    public function experiences()
    {
        return $this->hasMany('App\Models\Cms\Experience','experience_types_id','id');
    }

}
