<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExperienceMapImage extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'experience_map_images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'experiences_id', 'file', 'name', 'description'
    ];

    public function Experience()
    {
        return $this->belongsTo('App\Models\Cms\Experience', 'experiences_id');
    }

}
