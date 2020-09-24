@extends('backendtemplate')
@section('title','Staff List')

@section('content')
	<div class="row">
		<h1>Staff Detail</h1>
	<a href="{{route('staff.index')}}" class="btn btn-primary my-3">Back</a>
	<div class="col-md-12">
		<img src="{{$staff->profile}}" alt="Staff Profile" class="w-25">
	<p>Name: {{$staff->name}}</p>
	<p>Phone No: {{$staff->phoneno}}</p>
	<p>Salary: {{$staff->salary}}</p>
	<p>Address: {{$staff->address}}</p>
	<p>Department:{{$staff->department->name}}</p>
	<p>Department:{{$staff->position->name}}</p>

	</div>
	</div>
@endsection