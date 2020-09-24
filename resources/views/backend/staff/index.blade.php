@extends('backendtemplate')
@section('title','Staff List')

@section('content')
<div class="row">
	<h1>Staff List</h1>
	<div class="col-md-12">
		<a href="{{route('staff.create')}}" class="btn btn-success my-3">Add New Staff</a>
	<table class="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Phone</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1; @endphp
			@foreach($staff as $row)
			<tr>
				<td>{{$i++}}</td>
				<td>{{$row->name}}</td>
				<td>{{$row->phoneno}}</td>
				<td>
					<a href="{{route('staff.show',$row->id)}}" class="btn btn-info">Detail</a>
					<a href="{{route('staff.edit',$row->id)}}" class="btn btn-warning">Edit</a>
				<form method="post" action="{{route('staff.destroy',$row->id)}}" onsubmit="return confirm('Are you sure to delete?')" class="d-inline-block">
					@csrf
					@method('DELETE')
					<input type="submit" name="btnSubmit" value="DELETE" class="btn btn-danger"> 
				</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	</div>
</div>
@endsection