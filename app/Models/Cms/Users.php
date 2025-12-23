<?php

namespace App\Models\Cms;

use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
class Users extends Authenticatable
{
    
    use  Notifiable;
    //use Authenticatable;
    protected $connection = 'mysql';
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_user',
        'name',
        'first_name',
        'last_name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'title',
        'telephone',
        'title',
        'telephone',
        'access_section',
        'allow_booking',
        'preferred_currency',
        'turn_off_sign_doc',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public  function  getJWTIdentifier() {
        return  $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
}
