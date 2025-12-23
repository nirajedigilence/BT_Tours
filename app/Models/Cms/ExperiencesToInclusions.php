<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;

class ExperiencesToInclusions extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'experiences_to_inclusions';

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
                  'experiences_id',
                  'inclusions_id',
                  'inclusions_text',
                  'icon_list_id',
                  'type_id'
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

    public function getInclusion()
    {
        return $this->hasOne('App\Models\Cms\Inclusion', 'id', 'inclusions_id');
    }
    public function getShipDetails()
    {
        return $this->hasOne('App\Models\Cms\ShipDetails', 'id', 'inclusions_id');
    }
    
    public function getIconList()
    {
        return $this->hasOne('App\Models\Cms\IconList', 'id', 'icon_list_id');
    }

}