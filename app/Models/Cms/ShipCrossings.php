<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;

class ShipCrossings extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'ship_crossings';

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
        'crossing_type',
        'company_id',
        'company_name',
        'routes',
        'est_crossing_duration',
        'crossing_times',
        'inclusions',
        'route',
        'in_out',
        'overnight',
        'cost_pound',
        'cost_euro',
        'cost_ss_pound',
        'cost_ss_euro',
        'created_by',
       
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

    public static function getAll(){

        return self::get();
    }

    /**
     * Get the Ship for this model.
     *
     * @return App\Models\Cms\Ship
     */
    public function ship()
    {
        return $this->belongsTo('App\Models\Cms\Ship', 'ships_id','id');
    }

}
