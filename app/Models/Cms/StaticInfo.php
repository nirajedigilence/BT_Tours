<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaticInfo extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'static_info';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'id_menu', 'h1', 'link_text', 'excerpt', 'description', 'url', 'htaccess_url', 'pos', 'firstpage', 'pic_1', 'pic_1_name', 'pic_2', 'pic_2_name', 'menu_id', 'meta_title', 'meta_description', 'meta_keywords', 'meta_metatags', 'contactform', 'dont_open', 'html_class', /*'user_id',*/ 'active'
    ];

    public function parentActive() {
        return $this->hasMany(self::class, 'id', 'id_menu')->where('active', '=', 1)->orderBy('pos');
    }

    public function children()
    {
        return $this->hasMany(self::class , 'id_menu', 'id')->orderBy('pos');
    }

    public function childrenActive()
    {
        return $this->hasMany(self::class , 'id_menu', 'id')->where('active', '=', 1)->orderBy('pos');
    }

    public function staticImages()
    {
        return $this->hasMany('App\Models\Cms\StaticImage','info_id','id');
    }

}
