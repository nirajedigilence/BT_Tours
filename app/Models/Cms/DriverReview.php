<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DriverReview extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'driver_review';

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
                  'cart_exp_id',
                  'experience_id',
                  'user_id',
                  'hotel_procudure',
                  'hotel_cleanliness',
                  'hotel_quality_food',
                  'hotel_service',
                  'rate_itinearary',
                  'mobility_requirement',
                  'mobility_requirement_text',
                  'changes_on_tour',
                  'changes_on_tour_text',
                  'final_score',
                  'review_experience'
              ];

    
}
