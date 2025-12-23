<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;

class ExperiencesToAttraction extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'experiences_to_attractions';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'experiences_id',
        'attractions_id',
        'old_attractions_id',
        'exp_estimated_cost_pp',
        'exp_estimated_cost_pp_euro',
        'amendement_date'
    ];

}
