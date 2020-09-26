@extends('backendtemplate')
@section('title','Post Detail')

@section('content')
	<div class="row">
		<h1>Post Detail</h1>
	<a href="{{route('posts.index')}}" class="btn btn-primary my-3">Back</a>
	<div class="col-md-12">
		<img src="{{$post->photo}}" alt="Post Photo" class="w-25">
	<h3>Title: {{$post->title}}</h3>
	<h3>Category: {{$post->category->name}}</h3>
	<h3>{!! $post->content !!}</h3>
	</div>
	</div>
@endsection