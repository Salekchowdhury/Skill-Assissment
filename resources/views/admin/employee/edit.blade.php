@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Employee</h3>
                    @if ($errors->any())
                    <div class="alert alert-warning">
                @foreach ($errors->all() as $error )
                    <div>{{$error}}</div>
                @endforeach
                    </div>
                @endif
                    <a href="{{route('admin.employee.index')}}" class="btn btn-sm btn-primary float-end">Back</a>
                </div>
                @if (session('message'))
                <h3 class="alert alert-success">{{session('message')}}</h3>
            @endif
                <div class="card-body">
                    <form action="{{url('admin/employee/'.$employee->id.'/update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                Employee</button>
                            </li>
                            <li class="nav-item" role="presentation">

                              <button class="nav-link" id="Details-tab" data-bs-toggle="tab" data-bs-target="#Details-tab-pane" type="button" role="tab" aria-controls="Details-tab-pane" aria-selected="false">
                                Employee Details</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="Contact-tab" data-bs-toggle="tab" data-bs-target="#Contact-tab-pane" type="button" role="tab" aria-controls="Contact-tab-pane" aria-selected="false">
                                Employee Contact</button>
                            </li>
                          </ul>

                          <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="mt-3">
                                    <div class="mb-3">
                                        <label>First Name</label>
                                        <input type="text" value="{{$employee->first_name}}" name="first_name" class="form-control"/>
                                       @error('first_name') <small class="text-danger">{{$message}}</small> @enderror

                                    </div>
                                    <div class="mb-3">
                                        <label>Full Name</label>
                                        <input type="text" value="{{$employee->full_name}}" name="full_name" class="form-control"/>
                                       @error('full_name') <small class="text-danger">{{$message}}</small> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" value="{{$employee->email}}" name="email" class="form-control"/>
                                        @error('email') <small class="text-danger">{{$message}}</small> @enderror

                                    </div>
                                        <div class="mb-3">
                                            <label>Password</label>
                                            <input type="text" value="{{$employee->password}}" name="password" class="form-control"/>
                                            @error('password') <small class="text-danger">{{$message}}</small> @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <input type="checkbox" name="status" {{$employee->status == '1'? 'checked' : ''}} />
                                        </div>
                                 </div>
                               </div>
                               <div class="tab-pane fade show " id="Details-tab-pane" role="tabpanel" aria-labelledby="Details-tab" tabindex="0">
                                   <div class="mt-3">
                                        <div class="mb-3">
                                            <label>Father Name</label>
                                            <input type="text" value="{{$employee->employeeDetails->father_name}}" name="father_name" class="form-control"/>
                                            @error('father_name') <small class="text-danger">{{$message}}</small> @enderror

                                        </div>
                                        <div class="mb-3">
                                            <label> Mother Name</label>
                                            <input type="text" value="{{$employee->employeeDetails->mother_name}}" name="mother_name" class="form-control"/>
                                            @error('mother_name') <small class="text-danger">{{$message}}</small> @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label>Address</label>
                                            <input type="text" value="{{$employee->employeeDetails->address}}" name="address" class="form-control"/>
                                            @error('address') <small class="text-danger">{{$message}}</small> @enderror
                                        </div>
                                        <div class="mt-3">
                                            <div class="mb-3">
                                                <label>Employee Image</label>
                                                <input type="file" name="image" accept="image/*" class="form-control"/>
                                                <img src="{{asset('uploads/employee/'.$employee->employeeDetails->image)}}" width="60px" ; height="60px" />

                                            </div>
                                        </div>
                                   </div>
                               </div>
                               <div class="tab-pane fade show " id="Contact-tab-pane" role="tabpanel" aria-labelledby="Contact-tab" tabindex="0">
                                <div class="mt-3">
                                     <div class="mb-3">
                                         <label>Contact Name</label>
                                         <input type="text" value="{{$employee->employeeContact->contact_name}}" name="contact_name" class="form-control"/>
                                         @error('contact_name') <small class="text-danger">{{$message}}</small> @enderror

                                        </div>
                                     <div class="mb-3">
                                         <label> Contact number</label>
                                         <input type="number" value="{{$employee->employeeContact->contact_number}}" name="contact_number" class="form-control"/>
                                         @error('contact_number') <small class="text-danger">{{$message}}</small> @enderror

                                        </div>

                                     <div class="mb-3">
                                         <label>Contact Email</label>
                                         <input type="email" value="{{$employee->employeeContact->contact_email}}" name="contact_email" class="form-control"/>
                                         @error('contact_email') <small class="text-danger">{{$message}}</small> @enderror
                                        </div>
                                </div>
                            </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success">Update</button>
                              </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
