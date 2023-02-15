<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeAttendance;
use App\Models\User;
use App\Http\Requests\EmployeeAttendaceFormRequest;
use auth;

class EmployeeController extends Controller
{
  public function dashboard()
  {
    $id = auth::user()->id;
    // dd($id);
    $datas = User::findOrfail($id);
    // $attendances = EmployeeAttendance::where('employee_id','=', $id)->get();

   return view('employee.attendance.dashboard', compact('datas'));
  }
  public function index()
  {
    $id = auth::user()->id;
    // dd($id);
    $attendances = EmployeeAttendance::where('employee_id','=', $id)->get();

   return view('employee.attendance.index', compact('attendances','id'));
  }

  public function create()
  {

    return view('employee.attendance.create');
  }

  public function store(EmployeeAttendaceFormRequest $request)
  {
    $id = auth::user()->id;

    $validatedData = $request->validated();

    $attendance = EmployeeAttendance::create([
        'employee_id'=> $id,
        'date'=> $validatedData['date'],
        'in_time'=> $validatedData['in_time'],
        'out_time'=> $validatedData['out_time'],
    ]);
      return redirect('employee/attendance/create')->with('message', 'Attendance Added Successfully');
  }

}
