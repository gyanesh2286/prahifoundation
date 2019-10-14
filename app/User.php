<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kjjdion\LaravelAdminPanel\Traits\AdminUser;
use Kjjdion\LaravelAdminPanel\Traits\DynamicFillable;
use Kjjdion\LaravelAdminPanel\Traits\UserTimezone;
use Kjjdion\LaravelAdminPanel\Models\RoleUser;
use Kjjdion\LaravelAdminPanel\Models\Role;
use Kjjdion\LaravelAdminPanel\Models\PermissionUser;
use App\Media;

class User extends Authenticatable
{
    use Notifiable, AdminUser, DynamicFillable, UserTimezone;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password','father_name','mother_name','education','full_address','aadhaar_no','district','state','dob','email','mobile_no'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public  function getDobAttribute($value){
        return date('d/m/Y',strtotime($value));
    }
    public  function setDobAttribute($value){
        return date('Y/m/d',strtotime($value));
    }
    public  function getCreatedAtAttribute($value){
        return date('d/m/Y',strtotime($value));
    }

    public function roleUser(){
        return $this->hasOne(RoleUser::class);
    }
    public function role(){
        return $this->hasOne(Role::class);
    }
    public function userPermissions()
    {
        return $this->hasMany(PermissionUser::class);
    }
    public function media(){
        return $this->morphMany(Media::class, 'mediable');
    } 
    public function getGovtRegdNo(){
        return 'MAH/21021/JAL'.'<br>'.'JAL/135/2019';
    }
}
