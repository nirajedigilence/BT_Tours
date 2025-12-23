<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;

class ExperienceDateAdditionalText extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'experiences_to_dates_additional_text';

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
                  'text'
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

    /**
     * Get the Experience for this model.
     *
     * @return App\Models\Cms\Experience
     */
}