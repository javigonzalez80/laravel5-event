<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
	public function __construct()
	{
		$this->middleware('auth');
	} 
	
	/**
	 * Display Dashboard.
	 *
	 * @return Response
	 */
	public function dashboard()
	{
		return view('admin.dashboard');
	}
}
