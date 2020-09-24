{{-- <div>
    Simplicity is the consequence of refined emotions. - Jean D'Alembert
</div> --}}

<div class="card my-4">
	<h5 class="card-header">Categories</h5>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-6">
				<ul class="list-unstyled mb-0">
					@foreach($categories as $row)
					<li>
						<a href="#">{{$row->name}}</a>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>