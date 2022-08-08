<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvailabilityController extends Controller
{
    public function practitioneravailability(){
        $availabilities = Availability::where('uid', Auth::user()->id)->latest()->get();
        return view('practitioner.availability', compact('availabilities'));
    }

    public function practitioneravailabilitycreate(Request $request){
        try {
            $input = $request->all();
            $input['uid'] = Auth::user()->id;
            Availability::create($input);
            return back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
