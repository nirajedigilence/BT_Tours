<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;

class ProductHotelUpscales extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'product_hotel_upscales';

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
                  'product_hotel_id',
                  'name',
                  'description',
                  'cost',
                  'image',
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