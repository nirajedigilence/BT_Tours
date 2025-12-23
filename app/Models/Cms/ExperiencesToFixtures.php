<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExperiencesToFixtures extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'experiences_to_fixture';

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
                    'experiences_id',
                    'title',
                    'fixture_text',
                    'created_at',
                    'updated_at',
                    'deleted_at'
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


    //TODO Fix relations below
    public function ExperiencesToGalleryImagesh()
    {
        return $this->hasMany('App\Models\Cms\ExperiencesToGalleryImages','experiences_to_gallery_id','id')->orderBy('image_order');
    }
}