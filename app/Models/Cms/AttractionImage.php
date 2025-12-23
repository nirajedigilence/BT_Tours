<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttractionImage extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    protected $connection = 'mysql';
    protected $table = 'attraction_images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','attractions_id', 'file', 'name', 'description','pos'
    ];

    public function Attraction()
    {
        return $this->belongsTo('App\Models\Cms\Attraction', 'attractions_id');
    }

}
