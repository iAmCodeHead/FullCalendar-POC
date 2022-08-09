@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <span style="font-size:25px">Services</span>
                        <a href="{{route('services.create')}}" class="btn btn-primary btn-md ml-auto" style="float:right">New Services</a>
                    </div>
                  <div class="card-body">
                    @include('errors.errors')
                    @forelse ($services as $service)
                        <div class="card mb-3">
                          <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><b>Name</b></p>
                                    <p>{{$service->name}}</p>
                                </div>
                                <div class="col-md-2">
                                    <p><b>Duration</b></p>
                                    <p>{{$service->duration}} mins</p>
                                </div>
                                <div class="col-md-2">
                                    <p><b>Price</b></p>
                                    <p>$ {{$service->price}}</p>
                                </div>
                                <div class="col-md-2">
                              
                                    <p>
                                        {{-- <a href="{{route('practitioner.book.client')}}" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" class="btn btn-success mt-3">Book A Client</a> --}}
                                        <button type="button" class="btn btn-primary mt-3 book_client" data-bs-toggle="modal" data-id="{{$service->id}}" data-bs-target="#exampleModal">
                                            Book a client
                                        </button>
                                    </p>
                                </div>
                            </div>
                          </div>
                        </div>
                    @empty
                       <p class="text-center">No service found!</p>
                    @endforelse
                  </div>
                </div>
            </div>
        </div>
    </div>



  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Book a client</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('book.client')}}" method="post">
            @csrf
            <div class="modal-body">
                <div class="col-md-12">
                    <label for="service">Service</label>
                    <input type="text" name="service" id="service" class="form-control">
                </div>
                <div class="col-md-12 mt-2">
                  <label for="service">Select Client</label>
                  <select name="client" id="client" class="form-control">
                    <option value="">Choose Client</option>
                    @forelse ($clients as $user)
                          <option value="{{$user->id}}">{{$user->name}}</option>
                    @empty
                        
                    @endforelse
                  </select>
              </div>
              <div class="col-md-12">
                <div class="label">
                  Title
                </div>
                <input type="text" name="title" id="title" class="form-control">
              </div>
              <div class="row">
                <div class="col-md-6 mt-3">
                  <label for="">Date</label>
                  <input type="text" name="date" id="datepicker"  class="form-control form-control-sm">
                </div>

              <div class="col-md-6 mt-3">
                  <label for="">Time</label>
                  <input type="datetime-local" name="start" id="start" class="form-control form-control-sm">
              </div>
              </div>

                <div class="col-md-12 mt-3">
                    <label for="">Message</label>
                    <textarea name="message" id="message" class="form-control" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>

    
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('.book_client').on('click', function(){
                var id = $(this).attr('data-id');
                console.log(id);
                $.ajax({
                    method: 'get',
                    url:"{{route('services.get')}}",
                    data:{id:id},
                    success: function(data){
                        console.log(data);
                        $('#service').val(data);
                    }
                });
            });


            // availableDates = ["03/04/019", "07/05/2018", "10/06/2018", "10/31/2018", "08/01/2018"];
            availableDates = [<?php echo '"'.implode('","', $data).'"' ?>],
            console.log(availableDates)
            // holidays_dates = { "08/02/2018": "sgsdf", "10/27/2018": "home sick", "07/20/2018": "fcg", "07/26/2018": "i dont know", "08/25/2018": "home sick" }
            // console.log($availableDates)

          function available(date) {

              var moth = String(date.getMonth() + 1);
              if (moth.length == 1) {
                  moth = "0" + moth;
              }

              var dat = String(date.getDate());
              if (dat.length == 1) {
                  dat = "0" + dat;
              }
              dmy = moth + "/" + dat + "/" + date.getFullYear();

              if ($.inArray(dmy, availableDates) != -1)    {
                  return [true, ""];
              } else {
                  return [false, ""];
              }
          }


          $("#datepicker").datepicker({
              beforeShowDay: function (dt) {
                  return available(dt);
              },
              changeMonth: true,
              changeYear: true,
              dateFormat: 'mm/dd/yy',
          });
        })
    </script>
@endsection