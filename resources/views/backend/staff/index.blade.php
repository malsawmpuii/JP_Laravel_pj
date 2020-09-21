@extends('backendtemplate')
@section('title','Staff List')

@section('content')
	<h1>Staff List</h1>
	<a href="{{route('staff.create')}}">Add New Staff</a>
	<table>
		<thead>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Phone</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($staff as $row)
			<tr>
				<td>{{$row->id}}</td>
				<td>{{$row->name}}</td>
				<td>{{$row->phoneno}}</td>
				<td>
					<a href="{{route('staff.show',$row->id)}}">Detail</a>
					<a href="{{route('staff.edit',$row->id)}}">Edit</a>
				<form>
					@csrf
					@method('DELETE')
					<input type="submit" name="" value="DELETE" class="d-inline-block btn btn-danger">
				</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection