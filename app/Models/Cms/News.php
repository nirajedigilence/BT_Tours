<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'news';

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
                  'h1',
                  'excerpt',
                  'description',
                  'pic',
                  'pic_header',
                  'postdate',
                  'publishdate',
                  'firstpage',
                  'accent',
                  'active',
                  //'pos',
                  'create_by',
                  'url',
                  'htaccess_url',
                  'meta_title',
                  'meta_keywords',
                  'meta_description',
                  'meta_metatags'
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
     * Get the newsImage for this model.
     *
     * @return App\Models\Cms\NewsImage
     */
    public function newsImages()
    {
        return $this->hasMany('App\Models\Cms\NewsImage','news_id','id');
    }

    public function newsCategories()
    {
        return $this->belongsToMany('App\Models\Cms\NewsCategory','news_to_news_categories','news_id', 'news_categories_id');
    }

    /**
     * Set the postdate.
     *
     * @param  string  $value
     * @return void
     */
    public function setPostdateAttribute($value)
    {
        $this->attributes['postdate'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
    }

    /**
     * Set the publishdate.
     *
     * @param  string  $value
     * @return void
     */
    public function setPublishdateAttribute($value)
    {
        $this->attributes['publishdate'] = !empty($value) ? \DateTime::createFromFormat('Y-m-d', $value) : null;
    }

    /**
     * Get postdate in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getPostdateAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

    /**
     * Get publishdate in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getPublishdateAttribute($value)
    {
        //return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
        return !empty($value) ? \DateTime::createFromFormat('Y-m-d', $value)->format('Y-m-d') : null;
    }

    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCreatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getUpdatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

    /**
     * Get deleted_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getDeletedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

}
