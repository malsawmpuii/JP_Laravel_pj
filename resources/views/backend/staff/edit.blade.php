@extends('backendtemplate')
@section('title','Staff Edit')

@section('content')
<h1>Staff Edit</h1>

{{-- error --}}
@if($errors->any())
 <div class="alert alert-danger">
 	<ul>
 		@foreach($errors->all() as $error)
 			<li>{{$error}}</li>
 		@endforeach
 	</ul>
 </div>
 @endif
 
<form method="post" action="{{route('staff.update',$row->id)}}" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="form-group">
		<label for="InputName">Name:</label>
		<input type="text" name="name" class="form-control" id="InputName" value="{{$row->name}}">
	</div>
	<div class="form-group">
		<label for="InputProfile">Profile:</label>
		<input type="file" name="profile" class="form-control" id="InputProfile" value="{{$asset('$row->profile')}}">
	</div>
	<div class="form-group">
		<label for="phoneNO">Phone No:</label>
		<input type="text" name="phoneno" class="form-control" id="phoneNo" value="{{$row->phoneno}}">
	</div>
	<div class="form-group">
		<label for="Address">Address:</label>
		<textarea class="form-control" name="address" id="Address">{{$row->address}}</textarea>
	</div>
	<div class="form-group">
		<label for="Salary">Salary:</label>
		<input type="number" name="salary" class="form-control" id="Salary" value="{{$row->salary}}">
	</div>
	
	<button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection