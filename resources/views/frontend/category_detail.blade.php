@extends('frontendtemplate')
@section('content')

<h1 class="my-4">Post Your 
	<small>information here</small>
</h1>

<!-- Blog Post -->
@foreach($posts as $row)
<div class="card mb-4">
	<img class="card-img-top w-100" src="{{$row->photo}}" alt="Card image cap">
	<div class="card-body">
		<h2 class="card-title">{{$row->title}}</h2>
		<p class="card-text">{{$row->content}}</p>
		{{-- <a href="{{route('frontside/detail',$row->id)}}" class="btn btn-primary">Read More &rarr;</a> --}}
		<a href="{{route('detailpage',$row->id)}}" class="btn btn-primary">Read More &rarr;</a> 
	</div>
	<div class="card-footer text-muted">
		Posted on January 1, 2020 by
		<a href="{{route('homepage')}}">Fairy princess's blog</a>
	</div>
</div>			
@endforeach
<!-- Pagination -->
<ul class="pagination justify-content-center mb-4">
	<li class="page-item">
		<a class="page-link" href="#">&larr; Older</a>
	</li>
	<li class="page-item disabled">
		<a class="page-link" href="#">Newer &rarr;</a>
	</li>
</ul>
@endsection
