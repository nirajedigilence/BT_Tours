<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
class CartExperiencesToRooms extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'cart_experiences_to_rooms';

    /**
    * The database primary key value.
    *
    * @var string
    */
    public $timestamps = false;
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'room_id',
                  'cart_exp_id',
                  'names',
                  'specials',
                  'addtional_comment',
                  'guest_name',
                  'room_note',
                  'room_requests',
                  'room_type_status',
                  'room_request_status',
                  'request_status_updated_date',
                  'is_dismiss',
                  'status',
                  'is_direct_added',
                  'swap_request',
                  'swap_request_text',
                  'swap_request_from',
                  'swap_request_status',
                  'swap_init',
                  'swap_note',
                  'cancellation_request_status',
                  'cancellation_init',
                  'cancellation_note',
                  'room_request_status',
                  'declined_reason',
                  'is_optional_room',
                  'xero_paid',
                  'invoice_no',
                  'created_by'
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

    public function cartExperiencesToRoomsRequests()
    {
        return $this->hasMany('App\Models\Cms\CartExperiencesToRoomsRequests','cart_experiences_to_rooms_id','id');
    }
}
