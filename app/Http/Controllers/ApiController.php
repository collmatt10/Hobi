<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ApiController extends Controller
{
  public function getAllMovies() {
     $movies = Movie::get()->toJson(JSON_PRETTY_PRINT);
     return response($movies, 200);
   }

    public function createMovie(Request $request) {
    $movie = new Movie;
     $movie->title = $request->title;
     $movie->director = $request->director;
     $movie->company = $request->company;
     $movie->boxoffice = $request->boxoffice;
     $movie->runtime = $request->runtime;
     $movie->body = $request->body;
     $movie->user_id = Auth::id();
     $movie->save(); // save it to the database.
     //Redirect to a specified route with flash message.
     return response()->json([
        "message" => "movie record created"
    ], 201);
    }

    public function getMovie($id) {
     if (Movie::where('id', $id)->exists()) {
       $movie = Movie::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
       return response($movie, 200);
     } else {
       return response()->json([
         "message" => "Movie not found"
       ], 404);
     }
   }


   public function updateMovie(Request $request, $id) {
     if (Movie::where('id', $id)->exists()) {
       $movie = Movie::find($id);

       $movie->name = is_null($request->name) ? $movie->name : $request->name;
       $movie->course = is_null($request->course) ? $movie->course : $request->course;
       $movie->save();

       return response()->json([
         "message" => "records updated successfully"
       ], 200);
     } else {
       return response()->json([
         "message" => "Movie not found"
       ], 404);
     }
   }
   public function deleteMovie ($id) {
    if(Movie::where('id', $id)->exists()) {
      $movie = Movie::find($id);
      $movie->delete();

      return response()->json([
        "message" => "records deleted"
      ], 202);
    } else {
      return response()->json([
        "message" => "Movie not found"
      ], 404);
    }
  }
}
