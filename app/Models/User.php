<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Cmgmyr\Messenger\Traits\Messagable;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpKernel\Profiler\Profile;

class User extends Authenticatable //implements MustVerifyEmail
{
    use  Notifiable, HasRoles, Messagable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'image'


    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getPictureAttribute($value){
        if($value){
            return asset(('images/'.$value));
        }else{
            return asset('images/default-img.png');
        }
    }

    protected $with = ['roles'];

     /**
     * [roles relationship roles]
     * @return [type] [description]
     */
    public function roles()
    {
       // return $this->belongsToMany('\App\Models\Role', 'role_user', 'user_id', 'role_id');
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }
}
