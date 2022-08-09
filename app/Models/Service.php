<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid', 'name', 'duration', 'price'
    ];

    public function users(){
       return $this->belongsTo('App\Models\User', 'uid');
    }

    public function availability(){
        return $this->hasMany('App\Models\Availability');
    }

}
