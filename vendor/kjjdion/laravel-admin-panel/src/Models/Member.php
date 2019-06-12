<?php

namespace Kjjdion\LaravelAdminPanel\Models;

use Illuminate\Database\Eloquent\Model;
use Kjjdion\LaravelAdminPanel\Traits\DynamicFillable;
use Kjjdion\LaravelAdminPanel\Traits\UserTimezone;
use Kjjdion\LaravelAdminPanel\Models\District;
use App\Media;
use Carbon\Carbon;

class Member extends Model
{   
    protected $table   = 'members';
    use DynamicFillable, UserTimezone;
    
    public  function getAgeAttribute($value){
        return Carbon::parse($value)->age;
    }
    public  function getDateOfIssueAttribute($value){
        return date('d/m/Y',strtotime($value));
    }
    
    public function user(){
        return $this->belongsTo(\App\User::class);
    }
    
    public function district(){
        return $this->belongsTo(District::class);
    }
    public function media(){
        return $this->morphMany(Media::class, 'mediable');
    }
}