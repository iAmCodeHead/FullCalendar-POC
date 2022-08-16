<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailabilityService extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid', 'availabiltiy_id', 'service_id'
    ];
}
