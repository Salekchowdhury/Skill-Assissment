@extends('layouts.employee')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Attendance</h3>
                <a href="{{route('employee.attendance.create')}}" class="btn btn-sm btn-success ">Add Attendance</a>
                <a href="{{url('generate-pdf/'.$id.'/employee')}}" class="btn btn-sm btn-success  ">Report</a>
            </div>
            <div class="card-body">
              <table id='salek1' class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>In Time</th>
                        <th>Out Time</th>
                        <th>Hours</th>
                        <th>Date</th>
                    </tr>
                    <tbody>
                        @forelse ($attendances as $attendance )
                    <?php

                        $in_time = strtotime($attendance->in_time);
                        $out_time = strtotime($attendance->out_time);
                        $hrs = abs($out_time - $in_time)/3600;
                    ?>
                        <tr>
                            <td>{{$attendance->id}}</td>
                            <td>{{$attendance->in_time}}</td>
                            <td>{{$attendance->out_time}}</td>
                            <td>{{$hrs}}</td>
                            <td>{{$attendance->date}}</td>

                        </tr>
                        @empty
                            <td colspan="5">No Attendance Availabe</td>
                        @endforelse

                    </tbody>
                </thead>
              </table>
            </div>
        </div>
    </div>
</div>
@endsection
