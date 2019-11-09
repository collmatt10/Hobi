<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Auth;
class MovieController extends Controller
{

  public function __construct()
   {
       $this->middleware('auth');
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

        $user = Auth::user();
        $movies = Movie::orderBy('created_at', 'desc')->paginate(8);
        return view('movies.index', [
          'movies' => $movies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

      public function store(Request $request)
{
  //validation rules
  $rules = [
      'title' => 'required|string|unique:movies,title|min:2|max:191',
      'director'  => 'required|string|min:5|max:1000',
      'company'  => 'required|string|min:5|max:1000',
      'boxoffice'  => 'required|string|min:5|max:1000',
      'runtime'  => 'required|string|min:4|max:1000',
      'body'  => 'required|string|min:5|max:1000',
  ];
  //custom validation error messages
  $messages = [
      'title.unique' => 'Movie title should be unique', //syntax: field_name.rule
  ];
  //First Validate the form data
  $request->validate($rules,$messages);
  //Create a movie = new
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
  return redirect()
      ->route('movies.index')
      ->with('status','Created a new Movie!');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
   {
       $movie = Movie::findOrFail($id);
       return view ('movies.show', [
         'movie' =>$movie,
       ]);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
      {
          $movie = Movie::findOrFail($id);
          return view ('movies.edit', [
            'movie' =>$movie,
          ]);
      }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
  {
      $rules =[
        'title' => "required|string|unique:movies,title,{$id}|min:min:2|max:191",
        'director'  => 'required|string|min:5|max:1000',
        'company'  => 'required|string|min:5|max:1000',
        'boxoffice'  => 'required|string|min:5|max:1000',
        'runtime'  => 'required|string|min:4|max:1000',
        'body'  => 'required|string|min:5|max:1000',
      ];
      $messages = [
        'title.unique' => 'Movie title should be unique',
        ];
        $request ->validate($rules,$messages);
        //update to do
        $movie          = todo::findOrFail($id);
        $movie->title = $request->title;
        $movie->director = $request->director;
        $movie->company = $request->company;
        $movie->boxoffice = $request->boxoffice;
        $movie->runtime = $request->runtime;
        $movie->body = $request->body;
        $movie->save(); //can be used for both creating and updating
        return redirect()
            ->route('movies.show',$id)
            ->with('status','Updated the selected Movie!');
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
         $movie = Movie::findOrFail($id);
         $movie->delete();
         return redirect()
         ->route('movies.index')
         ->with('status', 'Deleted the selected Movie!');
     }

}
