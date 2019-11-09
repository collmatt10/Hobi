@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
        Edit Movie
        </div>
        <div class="card-body">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{route('admin.movies.update', $movie->id)}}" >
        <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group">
            <label for ="title">Title </label>
            <input type="text" class="form-control" id="title" name="title" value="{{old('title', $movie->title)}}"/>
          </div>

          <div class="form-group">
            <label for ="director">Director </label>
            <input type="text" class="form-control" id="director" name="director" value="{{old('director', $movie->director)}}"/>
          </div>

          <div class="form-group">
            <label for ="company">Company </label>
            <input type="text" class="form-control" id="company" name="company" value="{{old('company', $movie->company)}}"/>
          </div>

          <div class="form-group">
            <label for ="boxoffice">Box-Office </label>
            <input type="text" class="form-control" id="boxoffice" name="boxoffice" value="{{old('boxoffice', $movie->boxoffice)}}"/>
          </div>

          <div class="form-group">
            <label for ="runtime">Runtime </label>
            <input type="text" class="form-control" id="runtime" name="runtime" value="{{old('runtime', $movie->runtime)}}"/>
          </div>

          <div class="form-group"description
            <label for ="description">Description </label>
            <input type="text" class="form-control" id="description" name="description" value="{{old('description', $movie->description)}}"/>
          </div>

          <a href="{{route ('admin.movies.index')}}" class="btn btn-link">Cancel</a>
          <button type="submit" class="btn btn-primary float-right">Submit</button>


        </form>
      </div>

    </div>

  </div>

</div>
</div>

@endsection
