<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inclusion extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'inclusions';

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
                  'name',
                  'description',
                  'htaccess_url',
                  'meta_title',
                  'meta_description',
                  'meta_keywords',
                  'meta_metatags',
                  //'pos',
                  'active'
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function experiences()
    {
        return $this->belongsToMany('App\Models\Cms\Experiences','experiences_to_inclusions','inclusions_id', 'experiences_id');
    }

    public static function getAll(){

        return self::get();
    }


//    /**
//     * Get created_at in array format
//     *
//     * @param  string  $value
//     * @return array
//     */
//    public function getCreatedAtAttribute($value)
//    {
//        return !empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A') : null;
//    }
//
//    /**
//     * Get updated_at in array format
//     *
//     * @param  string  $value
//     * @return array
//     */
//    public function getUpdatedAtAttribute($value)
//    {
//        return !empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A') : null;
//    }
//
//    /**
//     * Get deleted_at in array format
//     *
//     * @param  string  $value
//     * @return array
//     */
//    public function getDeletedAtAttribute($value)
//    {
//        return !empty($value) ? \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A') : null;
//    }

}
