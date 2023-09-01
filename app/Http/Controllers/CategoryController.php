<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($id){
        $jobs = Job::where('category_id', $id)->paginate(15);
        $categoryName = Category::where('id', $id)->first();
        return view('frontend.jobs.jobs-category', compact('jobs', 'categoryName'));
    }
}
