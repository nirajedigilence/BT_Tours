<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EnquiriesMessage extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'enquiries_messages';

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
                  'enquiry_id',
                  'message',
                  'user_id',
                  'read'
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
     * Get the Enquiry for this model.
     *
     * @return App\Models\Enquiry
     */
    public function Enquiry()
    {
        return $this->belongsTo('App\Models\Enquiry','enquiry_id','id');
    }

    /**
     * Get the user for this model.
     *
     * @return App\Models\User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
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
    public static function getCurrentMessages($equiry_id){
        $messages = [];
        if (Auth::check()){
            $user_id = Auth::user()->getAuthIdentifier();

            $messages = 

DB::table('enquiries_messages')
                ->select(DB::raw('*, (SELECT name FROM users WHERE id = user_id) AS userName'))
                ->where('enquiry_id', '=', $equiry_id)
                ->orderBy('created_at', 'desc')
                ->get();
        }
        return $messages;
    }

}
