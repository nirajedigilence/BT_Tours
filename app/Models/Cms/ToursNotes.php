<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ToursNotes extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'tours_notes';

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
                  'parent_id',
                  'initials',
                  'note',
                  'category',
                  'user_type',
                  'cart_id',
                  'tour_file',
                  'is_alert',
                  'request_by',
                  'created_at',
                  'created_by',
                  'updated_at',
                  'updated_by'
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
    public function users(){
      return $this->belongsTo(Users::class,'created_by');
    }
    public function notes(){
      return $this->belongsTo(ToursNotes::class);
    }
    public function replies(){
      return $this->hasMany(ToursNotes::class,'parent_id');
    }
}
