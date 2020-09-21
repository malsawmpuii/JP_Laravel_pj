@extends('backendtemplate')
@section('title','Staff List')

@section('content')
	<h1>Staff Detail</h1>
	<a href="{{route('staff.index')}}">Back</a>
	<img src="{{$staff->profile}}" alt="Staff Profile">
	<p>Name: {{$staff->name}}</p>
	<p>Phone No: {{$staff->phoneno}}</p>
	<p>Salary: {{$staff->salary}}</p>
	<p>Address: {{$staff->address}}</p>
@endsection