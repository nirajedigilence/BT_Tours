<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConfirmationTemplate extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'confirmation_template';

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
                  'experience_id',
                  'template_name',
                  'hc_meal_arrangements',
                  'hc_free_place',
                  'hc_inclusions',
                  'hc_services_facilities',
                  'hc_terms_conditions',
                  'ect_confirm_additional_info',
                  'ect_confirm_description',
                  'ect_free_place',
                  'ect_group_size',
                  'ect_mobility_access',
                  'ect_terms_conditions',       
                  'ect_terms_conditions',       
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


}
