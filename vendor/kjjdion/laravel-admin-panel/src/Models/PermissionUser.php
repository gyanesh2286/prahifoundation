<?php

namespace Kjjdion\LaravelAdminPanel\Models;

use Illuminate\Database\Eloquent\Model;
use Kjjdion\LaravelAdminPanel\Traits\DynamicFillable;
use Kjjdion\LaravelAdminPanel\Traits\UserTimezone;

class PermissionUser extends Model
{
    protected $table   = 'permission_user';
    use DynamicFillable, UserTimezone;
    
    // roles relationship
    public function userPermissions()
    {
        return $this->belongsToMany(config('lap.models.role'));
    }

    // users relationship
    public function user()
    {
        return $this->belongsToMany(config('auth.providers.users.model'));
    }
    
}