<?php

namespace App\Http\Controllers\Critic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use App\Critic;
class HomeController extends Controller
{

  public function __construct()
  {
        $this->middleware('auth');
        $this->middleware('role:critic');
  }
  public function index()
  {
    return view('critic.home');
  }
}
