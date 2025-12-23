<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Self_;
use DB;

class Company extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'company';

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
        'company_name',
        'general_email',
        'phone_number',
        'street',
        'town_city',
        'postcode',
        'country',
        'about',
        'active',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];

    
}
