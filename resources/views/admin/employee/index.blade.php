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
                <a href="{{route('admin.employee.create')}}" class="btn btn-sm btn-success float-end">Add Employee</a>
            </div>
            <div class="card-body">
              <table id='salek1' class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Contact Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <tbody>
                        @forelse ($employees as $employee )
                        <tr>
                            <td>{{$employee->id}}</td>

                            <td>{{$employee->full_name}}</td>
                            <td>{{$employee->employeeContact->contact_name}}</td>
                            <td>{{$employee->email}}</td>
                            <td>{{$employee->status == '1'? 'Hidden': 'visible'}}</td>
                            <td>
                                <a href="{{url('admin/employee/'.$employee->id.'/edit') }}" class="btn btn-success py-1">Edit</a>
                                <a href="{{url('admin/employee/'.$employee->id.'/delete')}}" onclick="return confirm('Are you sure delete this employee?')" class="py-1 btn btn-danger">Delete</a>

                            </td>

                        </tr>
                        @empty
                            <td colspan="6">No Employee Availabe</td>
                        @endforelse

                    </tbody>
                </thead>
              </table>
            </div>
        </div>
    </div>
</div>
@endsection
