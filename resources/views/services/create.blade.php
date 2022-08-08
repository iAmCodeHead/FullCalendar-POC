@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
        
                <div class="card">
                    <div class="card-header">New Service</div>
                    <div class="card-body">
                      <form action="" method="post">
                          @csrf
                             <div class="col-md-12 mt-3">
                              <label for="">Name</label>
                              <input type="text" name="name" id="name" class="form-control">
                             </div>
              
                             <div class="col-md-12 mt-3">
                              <label for="">Duration (mins)</label>
                              <input type="number" name="duration" id="duration" class="form-control">
                             </div>

                             <div class="col-md-12 mt-3">
                                <label for="">Price</label>
                                <input type="text" name="price" id="price" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-md btn-primary mt-3">Submit</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection