<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'products';

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
                  'product_number',
                  'name',
                  'notes',
                  'country_id',
                  'country_area_id',
                  'is_prototype',
                  'average_tour_score',
                  'total_profit_margin',
                  'total_cost',
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
    public function getProductsSection()
    {
        return $this->hasMany('App\Models\Cms\ProductsSection', 'products_id', 'id')->orderBy('sections_type', 'ASC');
    }

    public function getCountry()
    {
        return $this->hasOne('App\Models\Cms\Country', 'id', 'country_id');
    }
    public function getCountryArea()
    {
        return $this->hasOne('App\Models\Cms\CountryArea', 'id', 'country_area_id');
    }

    public static function getProductsLists(){
            $bookings = self::with(['getProductsSection.getProductsInclusion'])
            // $bookings = self::with(['getProductsSection'])
            // ->select(DB::raw('*, (SELECT name FROM users WHERE id = user_id) AS userName'))
            // ->where('user_id', '=', $user_id)
            ->where('status', '=', 1)
            // ->where('id', '=', 2)
            ->get();
            // ->paginate(5);
        return $bookings;
    }
    public static function getProduct($id){
            $bookings = self::with(['getProductsSection.getProductsInclusion', 'getProductsSection.getProductsImages'])
            ->where('status', '=', 1)
            ->where('id', $id)
            ->first();
        return $bookings;
    }
    public static function getProductsListsByPrototype($is_prototype){
            $bookings = self::with(['getProductsSection.getProductsInclusion', 'getCountry', 'getCountryArea'])
            ->where('status', '=', 1)
            ->where('is_prototype', '=', $is_prototype)
            ->get();
        return $bookings;
    }
    public static function getProductsListsByCollaborator($productIds){
            $bookings = self::with(['getProductsSection.getProductsInclusion', 'getCountry', 'getCountryArea'])
            ->where('status', '=', 1)
            ->whereIn('id', $productIds)
            ->get();
        return $bookings;
    }

}
