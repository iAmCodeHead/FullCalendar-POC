@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">

            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                              Create Availability Slots
                            </div>
                            <div class="card-body">
                              <form action="{{route('practitioner.availability.create')}}" method="post">
                                @csrf
                                <div class="col-md-12 mt-3">
                                    <label for="">Service</label>
                                    <select name="service" id="service" class="form-control">
                                      @foreach ($services as $service)
                                      <option value="{{$service->id}}">{{$service->name}}</option>
                                      @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="">Date</label>
                                    <input type="date" name="date" id="date" class="form-control">
                                </div>

                                <div class="col-md-12 mt-3">
                                    <label for="">Start</label>
                                    <input type="datetime-local" name="start" id="start" class="form-control">
                                </div>
      
                                   <div class="col-md-12 mt-3">
                                      <label for="">End</label>
                                      <input type="datetime-local" name="end" id="end" class="form-control">
                                  </div>
      
                                  <button type="submit" class="btn btn-md btn-primary mt-3">Submit</button>
                              </form>
                            </div>
                          </div> 
                    </div>
                    <div class="col-md-12 mt-5">
                        <div class="card">
                          <div class="card-header">
                            Availabilty Slots
                          </div>
                          <div class="card-body">
                            @forelse ($availabilities as $availability)
                                <div class="row">
                                    <div class="col-md-9">
                                        <h4 style="color:ccc">{{$availability->service->name}}</h4>
                                    <p style="color:ccc">{{\Carbon\carbon::parse($availability->date)->format('M d Y')}}</p>
                                    <p>{{\Carbon\carbon::parse($availability->start)->format('H:i A')}} - {{\Carbon\carbon::parse($availability->end)->format('H:i A')}} </p>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="" class="btn btn-sm btn-info">Edit</a>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center">No slot available</p>
                            @endforelse
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection