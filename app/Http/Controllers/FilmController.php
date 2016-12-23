<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Film;
use Illuminate\Auth\AuthManager;
use App\Http\Controllers\Controller;

class FilmController extends Controller
{
	
	public function index(Request $request)
	{
		return view('index')->with('film', Film::get());
	}
	
}
