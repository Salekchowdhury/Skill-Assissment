@extends('layouts.admin')

@section('content')


    <div class="row">
        <div class="row">
            <div class="alert alert-success">
                 <div class="col-md-6">
                    @if (session('message'))
                    <h3>{{session('message')}}</h3>
                     @endif
                 </div>
                 <div class="col-md-6"></div>
                </div>
                </div>



    </div>

    @endsection
