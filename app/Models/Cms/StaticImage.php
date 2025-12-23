<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;

class StaticImage extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'static_images';
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'info_id', 'file', 'name', 'description'
    ];

    public function staticInfo()
    {
        return $this->belongsTo('App\Models\Cms\StaticInfo', 'info_id');
    }

}
