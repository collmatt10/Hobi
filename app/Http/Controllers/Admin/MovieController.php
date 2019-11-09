<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Movie;

class VisitController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
        $this->middleware('role:admin');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $movies = Movie::all();

       return view('admin.movies.index')->with([
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
        return view('admin.movies.create');
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

         return view('admin.movies.show')->with([
           'movie' =>$movie
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

      return view('admin.movies.edit')->with([
        'movie' => $movie
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

      $movie = Movie::findOrFail($id);
      $request->validate([
        'doctor'=>'required|max:191'. $movie->id,
        'description'=>'required|max:191',
        'patient'=>'required|max:191',$movie->id,
        'date'=>'required|max:191',
        'time'=>'required||size:13|',
        'cost'=>'required|numeric|min:0',
      ]);

      $movie->doctor = $request->input('doctor');
      $movie->description = $request->input('description');
      $movie->patient = $request->input('patient');
      $movie->date = $request->input('date');
      $movie->time = $request->input('time');
      $movie->cost = $request->input('cost');

      $movie->save();

      return redirect()->route('admin.movies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $movie = Visit::findOrFail($id);

       $movie->delete();
       return redirect()->route('admin.movies.index');

      return view('admin.movies.show')->with([
        'movie' => $movie
      ]);
    }
}
