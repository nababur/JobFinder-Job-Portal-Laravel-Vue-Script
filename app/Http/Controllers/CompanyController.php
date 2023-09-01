<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware(['employer', 'verified'], ['except'=> array('index', 'company')]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index($id, Company $company)
    {   $jobs = Job::where('user_id', $id)->get();
        return view('frontend.company.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;

        $request->validate([
            'address' => 'required|min:20|max:450',
            'phone'=> 'required|digits:11',
            'website'=> 'required',
            'slogan'=> 'required|min:10|max:100',
            'description'=> 'required|min:100|max:4000',
        ]);


        Company::where('user_id', $user_id)->update([
            'address'=> request('address'),
            'phone'=> request('phone'),
            'website'=> request('website'),
            'slogan'=> request('slogan'),
            'description'=> request('description'),
          
        ]);


        return redirect()->back()->with('success', 'Company Info Successfully Updated.');
    }

    public function logo(Request $request)
    {
        $user_id = auth()->user()->id;
    
        $request->validate([
            'logo' => 'required|mimes:jpeg,jpg,png|max:1024',
        ]);
    
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            // Retrieve the old logo filename
            $oldLogo = Company::where('user_id', $user_id)->value('logo');
      

            // Delete the old logo file
            if(is_file(public_path('uploads/logo/' . $oldLogo))){
                unlink(public_path('uploads/logo/' . $oldLogo));
                
            }
    
            $file->move('uploads/logo/', $filename);
    
            Company::where('user_id', $user_id)->update([
                'logo' => $filename
            ]);
    
            return redirect()->back()->with('logo', 'Logo updated...');
        }
    }


    public function banner(Request $request){
        $user_id = auth()->user()->id;
        
        $request->validate([
            'banner' => 'required|mimes:jpeg,jpg,png|max:2048',
        ]);
    
        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
    
            // Retrieve the old banner filename
            $oldBanner = Company::where('user_id', $user_id)->value('banner');
      

            // Delete the old banner file
            if(is_file(public_path('uploads/banner/' . $oldBanner))){
                unlink(public_path('uploads/banner/' . $oldBanner));
                
            }
    
            $file->move('uploads/banner/', $filename);
    
            Company::where('user_id', $user_id)->update([
                'banner' => $filename
            ]);
    
            return redirect()->back()->with('banner', 'Banner updated...');
        }



    }
    /**
     * Compnay metod
     */
    public function company()
    {
        $companies = Company::latest()->paginate(12);
        return view('frontend.company.company', compact('companies'));
    }

 
}
