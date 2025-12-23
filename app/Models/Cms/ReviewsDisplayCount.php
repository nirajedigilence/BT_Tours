<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class ReviewsDisplayCount extends Model
{

    //use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'reviews_display_count';

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
                  'review_id',
                  'experience_id',
                  'display_count',
                 
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
    public function cart_experience()
    {
        return $this->hasMany('App\Models\Cms\CartExperience','reviews_display_count','cart_experience_id')->where('deleted_at',null);
    }

}
