<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid', 'service_id', 'day', 'date', 'start', 'end'
    ];

    public function service(){
        return $this->belongsTo('App\Models\Service', 'service_id');
    }

    public static function checkAvailability($day, $time){
        $time = Carbon::create($time)->toTimeString();
        $availability = Availability::where('day', $day)->where(function ($query) use ($time){
            $query->whereTime('start', '<=', $time)->whereTime('end', '>=', $time);
        })->exists();
        return $availability;
    }

    
}
