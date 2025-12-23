<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;

class ExperiencesToGalleryImages extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'experiences_to_gallery_images';

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
                    'experiences_to_gallery_id',
                    'image_name',
                    'image_order',
                    'images',
                    'created_at',
                    'updated_at'
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
}