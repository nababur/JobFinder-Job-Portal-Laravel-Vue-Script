<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $adminRole = Auth::user()->roles()->pluck('name');
        if ($adminRole->contains('admin')) {
            return redirect()->to('/dashboard')->with('success', 'Admin Logged in Successfully.');
           
      
        }

        if (auth::user()->user_type=='employer') {
            return redirect()->to('/company/create');
        }


        $jobs = Auth::user()->favorites;
        return view('home', compact('jobs'));
    }
}
