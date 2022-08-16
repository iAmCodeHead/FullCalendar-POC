<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvailabilityController extends Controller
{
    public function practitioneravailability(){
        $availabilities = Availability::where('uid', Auth::user()->id)->latest()->get();
        // dd($availabilities);
        $services = Service::all();
        $daysOfWeek = ['Sunday'=>'0','Monday'=>'1','Tuesday'=>'2','Wednesday'=>'3','Thursday'=>'4','Friday'=>'5','Saturday'=>'6'];
        $events = [];
        foreach ($availabilities as $event) {
            $row = [];
            // $row['daysOfWeek'] = [$daysOfWeek[$event->day]];
            $row['start'] = $event->start;
            $row['end'] = $event->end;
            $events[] = $row;
        }

        // dd($events);
        return view('practitioner.availability', compact('availabilities', 'services', 'events'));
    }


    public function fetchavailability(Request $request){
        $start = Carbon::create($request->start)->toTimeString();
        $end = Carbon::create($request->end)->toTimeString();

        $availabilities = Availability::where('uid', Auth::user()->id)->latest()->get();
        $daysOfWeek = ['Sunday'=>'0','Monday'=>'1','Tuesday'=>'2','Wednesday'=>'3','Thursday'=>'4','Friday'=>'5','Saturday'=>'6'];
        $events = [];
        foreach ($availabilities as $event) {
            $row = [];
            $row['id'] = $event->id;
            $row['daysOfWeek'] = $daysOfWeek[$event->day];
            $row['startTime'] = $event->start;
            $row['endTime'] = $event->end;
            $row['overlap'] = false;
            $events[] = $row;
        }
            return response()->json($events);
    }
    public function practitioneravailabilitycreate(Request $request){
        try {
            $input = $request->all();
            $unavailableDays = [];
            foreach($input['days'] as  $day){
                $input['uid'] = Auth::user()->id;
                $input['day'] = $day;
                $input['start'] = $input['start'];
                $input['end'] = $input['end'];

                // dd(Availability::checkAvailability($day, $request->start));
                if(!Availability::checkAvailability($day, $request->start)){
                    Availability::create($input);
                    // dd(Availability::checkAvailability($day, $request->start));

                }
                else{
                    array_push($unavailableDays, $day);
                }
            }



            if(count($unavailableDays) > 0){
                return back()->withError(json_encode($unavailableDays)."These days already have scheduled time");
            }

            return back()->withSuccess('availablity created');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
