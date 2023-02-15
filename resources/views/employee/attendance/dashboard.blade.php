@extends('layouts.employee')

@section('content')
<div class="row">
    <div class="card">
        <div class="card-header">
            <h3 class="mt-2">Profile</h3>

            <div class="card-body">
                <div class="card-body">
                    <section class="content">
                        <div class="px-2">
                            <div class="row bg-light">
                                <div class="col-md-6 mt-5">
                                <img src="{{asset('uploads/employee/'.$datas->employeeDetails->image)}}" width="150px" ; height="150px" />
                                   <div class="row">
                                     <div class="col-md-12">
                                        <h4 class="my-3 text-decoration-underline">Info</h4>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="pr-3" style="font-size: 16px;">First Name:  </label>
                                            </div>
                                            <div class="col-md-9 mr-3">
                                               <p>{{ $datas->first_name }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="pr-3" style="font-size: 16px;">full Name:  </label>
                                            </div>
                                            <div class="col-md-9 mr-3">
                                               <p>{{ $datas->full_name }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="pr-3" style="font-size: 16px;"> Email:  </label>
                                            </div>
                                            <div class="col-md-9 mr-3">
                                               <p>{{ $datas->email }}</p>
                                            </div>
                                        </div>

                                     </div>
                                     <div class="col-md-12">
                                        <h4 class="my-3 text-decoration-underline">Contact</h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="pr-3" style="font-size: 16px;">Contact Name</label>
                                            </div>
                                            <div class="col-md-8 mr-3">
                                               <p>{{ $datas->employeeContact->contact_name }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="pr-3" style="font-size: 16px;">Contact Number</label>
                                            </div>
                                            <div class="col-md-8 mr-3">
                                               <p>{{ $datas->employeeContact->contact_number }}</p>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-4">
                                                <label class="pr-3" style="font-size: 16px;">Contact Email</label>
                                            </div>
                                            <div class="col-md-8 mr-3">
                                               <p>{{ $datas->employeeContact->contact_email }}</p>
                                            </div>
                                        </div>
                                     </div>
                                     <div class="col-md-12">
                                        <h4 class="my-3 text-decoration-underline">Details</h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="pr-3" style="font-size: 16px;">Father Name</label>
                                            </div>
                                            <div class="col-md-8 mr-3">
                                               <p>{{ $datas->employeeDetails->father_name }}</p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                                <label class="pr-3" style="font-size: 16px;">Mother Name</label>
                                            </div>
                                            <div class="col-md-8 mr-3">
                                               <p>{{ $datas->employeeDetails->mother_name }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                                <label class="pr-3" style="font-size: 16px;">Address</label>
                                            </div>
                                            <div class="col-md-8 mr-3">
                                               <p>{{ $datas->employeeDetails->address }}</p>
                                            </div>
                                        </div>
                                     </div>
                                    {{-- <a href=""  class="mt-2 btn btn-success w-25 ml-3 mb-2"  style="font-size: 21px;background-image: linear-gradient(#0c0970, #4cbf15); text-align: center;border: 1px solid;border-radius: 25px;" >EDIT</a> --}}




                            </div>
                        </div>


                    </section>
                    {{-- <form action="{{route('employee.attendance.store')}}" method="POST">
                        @csrf
                          <div class="tab-content">
                                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="mt-3">
                                    <div class="mb-3">
                                        <div class="row">
                                          <div class="row">
                                            <div class="col-md-4">
                                                <label>Date</label>
                                                <input type="date" disabled  value="{{$datas->full_name}}" class="form-control"/>

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
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
