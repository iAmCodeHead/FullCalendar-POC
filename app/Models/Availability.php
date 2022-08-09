<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid', 'service_id', 'date', 'start', 'end'
    ];

    public function service(){
        return $this->belongsTo('App\Models\Service', 'service_id');
    }
}
