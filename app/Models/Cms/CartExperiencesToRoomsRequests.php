<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
class CartExperiencesToRoomsRequests extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'cart_experiences_to_rooms_requests';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
    public $timestamps = false;
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'cart_experiences_to_rooms_id',
                   'upgrade_name',
                  'upgrade_cost',
                  'upgrade_cost_out',
                  'upgrade_cost_type',
                  'upgrade_request_sup_status',
                  'room_requests_id','xero_paid','invoice_no','created_by'
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
