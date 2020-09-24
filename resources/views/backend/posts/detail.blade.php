@extends('backendtemplate')
@section('title','Post Detail')

@section('content')
	<div class="row">
		<h1>Post Detail</h1>
	<a href="{{route('posts.index')}}" class="btn btn-primary my-3">Back</a>
	<div class="col-md-12">
		<img src="{{$posts->photo}}" alt="Staff Profile" class="w-25">
	<p>Title: {{$posts->title}}</p>
	<p>Category: {{$posts->category}}</p>
	</div>
	</div>
@endsection