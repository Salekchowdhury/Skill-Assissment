@extends('layouts.employee')

@section('content')
<div class="row">
    <div class="card">
        <div class="card-header">
            <h3 class="mt-2">Add Attendance</h3>
            <div class="card-body">
                <div class="card-body">
                    <?php
                        $dt = new DateTime();
                      $tody =  $dt->format('Y-m-d');
                        ?>
                    <form action="{{route('employee.attendance.store')}}" method="POST">
                        @csrf
                          <div class="tab-content">
                                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="mt-3">
                                    <div class="mb-3">
                                        <div class="row">
                                          <div class="row">
                                            <div class="col-md-4">
                                                <label>Date</label>
                                                <input type="date" disabled  value="{{$tody}}" class="form-control"/>
                                                <input type="hidden"  value="{{$tody}}" name="date"/>
                                                @error('date') <small class="text-danger">{{$message}}</small> @enderror
                                            </div>
                                             <div class="col-md-4">
                                                <label>In Time</label>
                                                <input type="time" name="in_time" class="form-control"/>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Out Time</label>
                                                <input type="time" name="out_time" class="form-control"/>
                                            </div>
                                          </div>
                                        </div>

                                       @error('time') <small class="text-danger">{{$message}}</small> @enderror
                                    </div>
                                 </div>
                               </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
