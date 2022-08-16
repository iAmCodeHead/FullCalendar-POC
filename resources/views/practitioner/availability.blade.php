@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9" id="calendar">

            </div>
            <div class="col-md-3">
                <div class="row">
                    @include('errors.errors')
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
                                {{-- <div class="col-md-12 mt-3">
                                    <label for="">Date</label>
                                    <input type="date" name="date" id="date" class="form-control">
                                </div> --}}

                                <div class="col-md-12 mt-3">
                                    <label for="">Start</label>
                                    <input type="time" name="start" id="start" class="form-control">
                                </div>
      
                                   <div class="col-md-12 mt-3">
                                      <label for="">End</label>
                                      <input type="time" name="end" id="end" class="form-control">
                                  </div>

                                  <p>Choose other days</p>
                                  <div class="form-group">
                                    <label><strong>Days :</strong></label><br>
                                    <label><input type="checkbox" name="days[]" value="Monday"> Monday</label><br>
                                    <label><input type="checkbox" name="days[]" value="Tuesday"> Tuesday</label><br>
                                    <label><input type="checkbox" name="days[]" value="Wednesday"> Wednesday</label><br>
                                    <label><input type="checkbox" name="days[]" value="Thursday"> Thursday</label><br>
                                    <label><input type="checkbox" name="days[]" value="Friday"> Friday</label><br>
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
                                        {{-- <h4 style="color:ccc">{{$availability->service->name}}</h4> --}}
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



    <div id="calendarModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                    <h4 id="modalTitle" class="modal-title"></h4>
                </div>
                <div id="modalBody" class="modal-body"> </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        </div>
@endsection

@section('css')
    <style>
        .trigger{
      text-align: center;
    padding: 7px 13px;
    background: #3e3e3e;
    color: #fff;
    font-size: 15px;
    outline: none;
    border: none;
    border-radius: 5px;
    font-family: cursive;
}

.modal {
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    opacity: 0;
    visibility: hidden;
    transform: scale(1.1);
    transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
}
.modal-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 1rem 1.5rem;
    width: 24rem;
    border-radius: 0.5rem;
}
.close-button {
    float: right;
    width: 1.5rem;
    line-height: 1.5rem;
    text-align: center;
    cursor: pointer;
    border-radius: 0.25rem;
    background-color: lightgray;
}
.close-button:hover {
    background-color: darkgray;
}
.show-modal {
    opacity: 1;
    visibility: visible;
    transform: scale(1.0);
    transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
}


    </style>
@endsection


@section('js')
{{-- <script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var availabilities = @json($events);

        $('#calendar').fullCalendar({
            defaultView: 'agendaDay',
            header: {
                left: 'prev, next',
                center: 'title',
                right: 'agendaDay,agendaWeek',
            },
            events: availabilities,
            selectable: true,
            selectHelper: true,
            displayEventTime:false,
        })


        $('.fc-event').css('font-size', '10px');
        $('.fc-day').css('border', 'none');
        $('.fc-event').css('width', '80%');
        $('.fc-event').css('white-space', 'initial')
        $('.fc-month-button').css({
            'background': '#199bb5',
            'color': 'white',
            'border': 'none'
        })
        $('.fc-agendaWeek-button').css({
            'background': '#fff',
            'border':'1px solid #199bb5',
            'color': '#199bbg',
  
        })
        $('.fc-agendaDay-button').css({
            'background': '#fff',
            'border':'1px solid #199bb5',
            'color': '#199bbg',
        })

        $('.fc-day-number').css({
            'float':'none',
            'margin':'0 auto'
        })

        $('.fc-prev-button').css({
            'background': '#fff',
            'border':'1px solid #199bb5',
            'color': '#199bbg',
        })

        $('.fc-next-button').css({
            'background': '#fff',
            'border':'1px solid #199bb5',
            'color': '#199bbg',
        })

        $('.fc-today').css({
            'background': '#E4F1F4',
        })

        $('.fc-widget-content').css({
            'height':'80'
        })


    });
</script> --}}
@endsection