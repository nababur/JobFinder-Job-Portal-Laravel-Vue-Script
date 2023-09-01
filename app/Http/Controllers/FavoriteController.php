<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Save Job in favorite table
     */
    public function saveJob(Request $request,$id)
    {
    	$jobId = Job::find($id);
    	$jobId->favorites()->attach(auth()->user()->id);
    	return redirect()->back();
    }
    /**
     * Un Save Job in favorite table
     */
    public function unSaveJob(Request $request,$id)
    {
    	$jobId = Job::find($id);
    	$jobId->favorites()->detach(auth()->user()->id);
    	return redirect()->back();
    }


}
