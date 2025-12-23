<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductsExperienceScore extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'products_experience_score';

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
                    'products_experience_id',
                    'brand',
                    'brand_value',
                    'visuals',
                    'visuals_value',
                    'exclusive_access',
                    'exclusive_access_value',
                    'combination',
                    'combination_value',
                    'shelf_life',
                    'shelf_life_value',
                    'location',
                    'location_value',
                    'date_limited',
                    'date_limited_value',
                    'product_score',
                    'product_score_total',
                    'created_by',
                    'updated_by',
                    'status'
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
     * Get the country areas for this model.
     *
     * @return App\Models\Cms\CountryArea
     */


}
