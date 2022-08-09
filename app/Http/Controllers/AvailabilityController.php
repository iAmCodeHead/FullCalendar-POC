<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvailabilityController extends Controller
{
    public function practitioneravailability(){
        $availabilities = Availability::with('service')->where('uid', Auth::user()->id)->latest()->get();
        // dd($availabilities);
        $services = Service::all();
        return view('practitioner.availability', compact('availabilities', 'services'));
    }

    public function practitioneravailabilitycreate(Request $request){
        try {
            $input = $request->all();
            $input['uid'] = Auth::user()->id;
            $input['service_id'] = $request->service;
            Availability::create($input);
            return back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
