@extends('backendtemplate')
@section('title','Post Edit')

@section('content')
<h1>Post Edit</h1>
{{-- Error --}}
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

{{-- Form --}}
<form method="post" action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  <a href="{{route('posts.index')}}" class="btn btn-primary my-3">Back</a>

  <div class="form-group">
    <label for="InputDepartment">Categories:</label>
    <select name="category" class="form-control">
      <optgroup label="Choose Department">
        @foreach($categories as $row)
        <option value="{{$row->id}}"
          @if($row->id== $post->category_id)
          {{'selected'}}
          @endif
          >{{$row->name}}</option>
        }
        @endforeach
      </optgroup>
    </select>
  </div>

  <div class="form-group">
    <label for="InputTitle">Title:</label>
    <input type="text" name="title" class="form-control" id="InputTitle" value="{{$post->title}}">
  </div>

  <div class="form-group">
    <label for="InputPhoto">Photo:</label>
    <img src="{{asset($post->photo)}}" alt="Post Photo" class="w-25">
   <input type="hidden" name="oldprofile" value="{{$post->photo}}">

  </div>

  <div class="form-group">
    <label for="summernote">Content:</label>
    <textarea class="form-control" name="content" id="summernote">{{$post->content}}</textarea>
  </div>

  <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection

@section('script')
<script type="text/javascript">
  $('#summernote').summernote({
    placeholder: 'Your Content Here!',
    tabsize: 2,
    height: 200
  });
</script>
@endsection