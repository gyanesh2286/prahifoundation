<?php

namespace Kjjdion\LaravelAdminPanel\Models;

use Illuminate\Database\Eloquent\Model;
use Kjjdion\LaravelAdminPanel\Traits\DynamicFillable;
use Kjjdion\LaravelAdminPanel\Traits\UserTimezone;

class RoleUser extends Model
{   
    protected $table   = 'role_user';
    use DynamicFillable, UserTimezone;
    
}