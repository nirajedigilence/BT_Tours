<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductsExperience extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'products_experience';

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
                    'cost',
                    'considering',
                    'score',
                    'tripadvisor_url',
                    'website',
                    'map',
                    'mobility',
                    'story',
                    'experience',
                    'created_by',
                    'updated_by',
                    'status',
                    'sections_id',
                    'name'
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

    public function getProductsExperienceScore()
    {
        return $this->hasOne('App\Models\Cms\ProductsExperienceScore', 'products_experience_id', 'id');
    }
    public function getProductsExperienceInclusion()
    {
        return $this->hasMany('App\Models\Cms\ProductsExperienceInclusion', 'products_experience_id', 'id');
    }
    public function getProductsExperienceImages()
    {
        return $this->hasMany('App\Models\Cms\ProductsExperienceImage', 'products_experience_id', 'id');
    }

    public static function getProductsExperienceLists(){
            $bookings = self::with(['getProductsExperienceScore'])
            ->where('status', '=', 1)
            ->get();
        return $bookings;
    }
    public static function getProductsExperienceListsWithPagination(){
            $bookings = self::with(['getProductsExperienceScore'])
            ->where('status', '=', 1)
            // ->get();
            ->paginate(15);
        return $bookings;
    }
}
