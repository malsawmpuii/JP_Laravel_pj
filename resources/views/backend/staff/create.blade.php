@extends('backendtemplate')
@section('title','Staff Create')

@section('content')
<div class="row">
	<h1>Staff Create</h1>
	<div class="col-md-12">

		<a href="{{route('staff.index')}}" class="btn btn-primary my-3">Back</a>

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
		
		<form method="post" action="{{route('staff.store')}}" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="InputDepartment">Department:</label>
				<select name="department" class="form-control">
					<optgroup label="Choose Department">
						@foreach($departments as $row)
						<option value="{{$row->id}}">{{$row->name}}</option>
						@endforeach
					</optgroup>
				</select>
			</div>

			<div class="form-group">
				<label for="InputPosition">Position:</label>
				<select name="position" class="form-control">
					<optgroup label="Choose Position">
						@foreach($positions as $row)
						<option value="{{$row->id}}">{{$row->name}}</option>
						@endforeach
					</optgroup>
				</select>
			</div>
			<div class="form-group">
				<label for="InputName">Name:</label>
				<input type="text" name="name" class="form-control" id="InputName">
			</div>
			<div class="form-group">
				<label for="InputProfile">Profile:</label>
				<input type="file" name="profile" class="form-control-file" id="InputProfile">
			</div>
			<div class="form-group">
				<label for="phoneNO">Phone No:</label>
				<input type="text" name="phoneno" class="form-control" id="phoneNo">
			</div>
			<div class="form-group">
				<label for="Address">Address:</label>
				<textarea class="form-control" name="address" id="Address"></textarea>
			</div>
			<div class="form-group">
				<label for="Salary">Salary:</label>
				<input type="number" name="salary" class="form-control" id="Salary">
			</div>
			
			<button type="submit" class="btn btn-success">Create</button>
		</form>
	</div>
</div>
@endsection