<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use App\Models\Booking;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function practitionerbookings(){
        return view('practitioner.booking');
    }

    public function practitionerbookclient(Request $request){
        // dd($request->all());
        $time = Carbon::create($request->start)->toTimeString();

        $service = Service::where('name', $request->service)->first();
        $availability = Availability::whereDate('date', Carbon::create($request->date)->toDateString())->where(function ($query) use ($time){
            $query->whereTime('start', '<=', $time)->whereTime('end', '>=', $time);
        })->exists();

        if($availability){
                $booking = Booking::whereDate('date', Carbon::create($request->date)->toDateString())->where(function ($query) use ($time){
                $query->whereTime('start', '<=', $time)->whereTime('end', '>=', $time);
            })->exists();

            if($booking){
                dd('already booked by someone else');
            }
            else{
                dd('go on');
            }
        }
        else{

            dd('Not Available at selected time');
        }

 
        $input = $request->all();
        $input['uid'] = Auth::user()->id;
        $input['service_id']= $service->id;
        $input['title']= $request->title;
        $input['date'] = $request->date;

        $input['start'] =   Carbon::parse($request->start);
        $input['end'] = Carbon::parse($request->start)->addMinutes($service->duration);
        $booking = Booking::create($input);
    }

    public function fetchbooking(Request $request){
        $booking = Booking::leftJoin('services', function($join) {
        $join->on('bookings.service_id', '=', 'services.id');})
        ->whereDate('start', '>=', $request->start)->whereDate('end', '<=', $request->end)->get(['bookings.id', 'services.name as title', 'bookings.start', 'bookings.end']);
        return response()->json($booking);
    }
}
