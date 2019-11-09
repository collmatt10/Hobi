@extends('layouts.app')
@section('content')
  <h3 class="text-center">{{$movie->title}}</h3>
    <p>{{$movie->director}}</p>
      <p>{{$movie->company}}</p>
        <p>{{$movie->runtime}}</p>
          <p>{{$movie->boxoffice}}</p>
            <p>{{$movie->body}}</p>


    <br>
    <a href="{{route('movies.edit',$movie->id)}}" class="btn btn-primary float-left">Update</a>
    <a href="#" class="btn btn-danger float-right" data-toggle="modal" data-target="#delete-modal">Delete</a>
    <div class="clearfix"></div>
    <div class="modal fade" id="delete-modal">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Movie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="document.querySelector('#delete-form').submit()">Proceed</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        </div>
    </div>
    <form method="POST" id="delete-form" action="{{route('movies.destroy',$movie->id)}}">
        @csrf
        @method('DELETE')
    </form>
@endsection
