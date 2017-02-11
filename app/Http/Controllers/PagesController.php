<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct()
    {
      parent::__construct();
    }
    public function home()
    {
      $signedIn = Auth::check();
      return view("pages.home", compact("signedIn"));
    }
}
