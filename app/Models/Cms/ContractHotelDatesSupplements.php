<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;

class ContractHotelDatesSupplements extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'contract_hotel_dates_supplements';

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
                  'hotel_dates_id',
                  'supplements',
                  'price',
                  'price_out',
                  'price_euro_in',
                  'price_euro_out',
                  'price_type'
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
