<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
class CartExperiencesToTourStatuses extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'cart_experiences_to_tour_statuses';

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
                  'cart_experiences_id',
                  'tour_statuses_id',
                  'completed',
                  'completed_at',
                  'due_date',
                  'sign_name',
                  'collaborator_sign',
                  'url',
                  'is_skip',
                  'step3',
                  'step4',
                  'step5',
                  'step6',
                  'step7',
                  'step8',
                  'step9',
                  'step10',
                  'pax',
                  'sgl_room_total',
                  'dbl_room_total',
                  'twn_room_total'
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
