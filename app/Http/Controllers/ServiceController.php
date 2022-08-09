<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'practitioner']);
    }

    public function index(){
        $services = Service::with('users')->where('uid', Auth::user()->id)->latest()->get();
        $clients = User::where('role', 'user')->latest()->get();
        $availability = Availability::select('date')->get();
        $data = [];
        foreach($availability as $date){
          array_push($data, 
            Carbon::parse($date->date)->format('m/d/Y'));
        }

        return view('services.index', compact('services', 'clients', 'data'));
    }

    public function create(){
        return view('services.create');
    }

    public function save(Request $request){
        try {
            $input = $request->all();
            $input['uid'] = Auth::user()->id;
            Service::create($input);
            return redirect()->route('services');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function get(Request $request){
        $service = Service::where('id',$request->id)->first()->name;
        return response()->json($service);
    }

}
