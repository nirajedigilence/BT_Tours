<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brochures extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'brochures';

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
                  'id',
                  'experience_id',
                  'hotel_id',
                  'rate_pp',
                  'srs_pp',
                  'image_1',
                  'image_2',
                  'image_3',
                  'textarea_1',
                  'textarea_2',
                  'textarea_3',
                  'textarea_4',
                  'textarea_5',
                  'textarea_6',
                  'inclusions',
                  'dates',
                  'breakfast',
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
