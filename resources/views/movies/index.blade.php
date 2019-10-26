@extends('layouts.app')

@section('content')
    <h2 class="text-center">All Movies</h2>
    <ul class="list-group py-3 mb-3">
      @forelse($movies as $movie)
  <li class="list-group-item my-2">
    <h5 class="float-left">{{ $movie->title }}</h5>
     <p class="float-right">Created by: {{ $movie->user->name }}</p> {{-- from the user relationship --}}
    <div class="clearfix"></div>
    <p>{{ Str::limit($movie->body,20) }}</p>
    <small class="float-right">{{ $movie->created_at->diffForHumans() }}</small>
    <a href="{{ route('movies.show',$movie->id) }}">Read More</a>
  </li>
@empty
   <h4 class="text-center">No Movies Found!</h4>
@endforelse
    </ul>
    <div class="d-flex justify-content-center">
        {{ $movies->links() }}
    </div>
@endsection
