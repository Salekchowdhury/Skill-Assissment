<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeFormRequest;
use App\Models\Employee;
use App\Models\EmployeeContact;
use App\Models\EmployeeDetails;
use App\Models\EmployeeAttendance;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function index()
    {
     $employees = User::where('role_as', '!=',  '1')->get();
     return view ('admin.employee.index', compact('employees'));
    }

    public function create()
    {
     return view ('admin.employee.create');
    }

     public function store(EmployeeFormRequest $request)
    {
      $validatedData = $request->validated();

      $employee = User::create([
               'first_name'=>$validatedData['first_name'],
               'full_name'=>$validatedData['full_name'],
               'email'=>$validatedData['email'],
               'password'=>Hash::make($validatedData['password']),
               'role_as'=>$request->role_as,
               'status'=>$request->status? '1':'0',
      ]);

      $employee->employeeContact()->create([
            'employee_id'=>$employee->id,
            'contact_name'=>$validatedData['contact_name'],
            'contact_number'=>$validatedData['contact_number'],
            'contact_email'=>$validatedData['contact_email'],
      ]);

      if($request->hasFile('image')){
       $file = $request->file('image');
       $ext = $file->getClientOriginalExtension();
       $fileName = time().'.'.$ext;

       $file->move('uploads/employee/', $fileName);

    }
      $employee->employeeDetails()->create([
            'employee_id'=>$employee->id,
            'father_name'=>$validatedData['father_name'],
            'mother_name'=>$validatedData['mother_name'],
            'address'=>$validatedData['address'],
            'image'=>$fileName,

      ]);

     return redirect('admin/employee/create')->with('message', 'Added Employee Successfully');
    }

    public function edit(int $employee)
    {
       $employee = User::findOrFail($employee);

       return view('admin/employee/edit',compact('employee'));
    }

    public function update(EmployeeFormRequest $request, int $employee)
    {
      $validatedData = $request->validated();

      $employeeData = User::findOrFail($employee);
     //  dd($employeeData);
      if($employeeData){
         $employeeData->update([
             'first_name'=>$validatedData['first_name'],
             'full_name'=>$validatedData['full_name'],
             'email'=>$validatedData['email'],
             'password'=>$validatedData['password'],
             'status'=>$request->status? '1':'0',
         ]);
         $employeeData->employeeContact()->update([
             'contact_name'=>$validatedData['contact_name'],
             'contact_number'=>$validatedData['contact_number'],
             'contact_email'=>$validatedData['contact_email'],
         ]);
         if($request->hasFile('image')){

          $path = 'uploads/employee/'.$employeeData->employeeDetails->image;
          if(File::exists($path)){
              File::delete($path);
          }
          $file = $request->file('image');
          $ext = $file->getClientOriginalExtension();
          $fileName = time().'.'.$ext;

          $file->move('uploads/employee/', $fileName);

       }
         $employeeData->employeeDetails()->update([
             'father_name'=>$validatedData['contact_name'],
             'mother_name'=>$validatedData['contact_number'],
             'address'=>$validatedData['contact_email'],
             'image'=>$fileName,
         ]);
      }
      return redirect('admin/employee')->with('message', 'Updated Employee Successfully');

    }

    public function delete(int $employee_id)
    {
      $employee = User::findOrFail($employee_id);
      $employee->delete();
      return redirect('admin/employee')->with('message', 'Deleted Employee Successfully');

    }

    public function attendance_list()
    {
        $attendances = EmployeeAttendance::all();
        return view ('admin.employee.attendanceList', compact('attendances'));
    }
}
