<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartExperiencesToAttraction extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'cart_experiences_to_attractions';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cart_exp_id',
        'experiences_id',
        'attractions_id',
        'old_attractions_id',
        'date',
        'time',
        'inclusion_name',
        'ref_nr',
        'exp_estimated_cost_pp',
        'exp_estimated_cost_pp_euro',
        'amendement_date',
        'group_name',
        'guest_nr',
        'exp_inclusions',
        'coach_dropoff',
        'coach_parking',
        'general_info',
        'additional_info',
    ];

}
