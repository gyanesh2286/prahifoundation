<?php

namespace Kjjdion\LaravelAdminPanel\Models;

use Illuminate\Database\Eloquent\Model;
use Kjjdion\LaravelAdminPanel\Traits\DynamicFillable;
use Kjjdion\LaravelAdminPanel\Traits\UserTimezone;

class Member extends Model
{   
    protected $table   = 'members';
    use DynamicFillable, UserTimezone;
    
}