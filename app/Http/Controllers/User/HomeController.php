<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

  public function __construct()
  {
        $this->middleware('auth');
        $this->middleware('role:user');
  }
  public function index()
  {
    return view('user.home');
  }
}
