{{-- <div>
    Be present above all else. - Naval Ravikant
</div> --}}
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
	    <a href="#">Start Bootstrap</a>
	  </div>
	</div>			
 @endforeach

 
