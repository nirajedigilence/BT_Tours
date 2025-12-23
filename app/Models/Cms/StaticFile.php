<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaticFile extends Model
{

    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'static_files';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'info_id', 'file', 'name'
    ];

    public function staticInfo()
    {
        return $this->belongsTo('App\Models\Cms\StaticInfo', 'info_id');
    }

}
