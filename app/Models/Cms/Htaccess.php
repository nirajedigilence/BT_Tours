<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Htaccess extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'htaccess';
    //protected $softDelete = true; //No deleted_at field

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lang', 'htaccess_url', 'path', 'type', 'record_id'
    ];

    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function getHtaccessInputData(Request $request)
    {
        $rules = [
            'htaccess_url' => 'nullable|string|min:0|max:255',
            'type' => 'nullable|string|min:0|max:255',
            'record_id' => 'nullable|numeric',
            'lang_check' => 'nullable|string|min:0|max:2'
        ];

        $data = $request->validate($rules);

        return $data;
    }

}
