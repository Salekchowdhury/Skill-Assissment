@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Employee</h3>
                <a href="{{url('generate-pdf')}}" class="btn btn-sm btn-success float-end">Report</a>
            </div>
            <div class="card-body">
                <table  class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
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
                                <td>{{$attendance->attendance->full_name}}</td>
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
