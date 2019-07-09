<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
  public function welcome()
  {
      return view('welcome');
  }

  public function redirect_home()
  {
      return redirect('/');
  }

  public function tech()
  {
      return view('tech-stuff');
  }

  public function policy()
  {
      return view('policy');
  }

}
