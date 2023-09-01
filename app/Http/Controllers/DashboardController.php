<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobPostRequest;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class DashboardController extends Controller
{
    public function index(){
        $jobs = Job::all();
        $companies = Company::all();
        $featuredJobs = Job::where('featured', 1)->get();
        $activeJobs = Job::where('status', 1)->get();
        $users = User::where('user_type', 'seeker')
                        ->get();
        $weeklyUsers = User::latest()
                            ->where('user_type', 'seeker')
                            ->limit(4)
                            ->get();
        $weeklyEmployee = User::latest()
                            ->where('user_type', 'employer')
                            ->limit(4)
                            ->get();

        return view('admin.index', compact('jobs', 'activeJobs', 'companies', 'users', 'featuredJobs', 'weeklyUsers', 'weeklyEmployee'));
    }


    // Get all Admin list
    public function adminlist(){
        $users = User::latest()->get();
        return view('admin.profile.index', compact('users'));
    }


    public function getAllJobs(){
        $jobs = Job::latest()->get();
        return view('admin.jobs.index', compact('jobs'));

    }

    // Job create
    public function create(){
        
        return view('admin.jobs.create');
    }




    public function edit($id){
        $job = Job::findOrFail($id);
        return view('admin.jobs.edit', compact('job'));

    }
    public function show($id){
        $job = Job::findOrFail($id);
        return view('admin.jobs.show', compact('job'));

    }

    /**
     * Update the single job
     */
    public function update(Request $request, string $id)
    {
        $job = Job::findOrFail($id);

        
        $job->update($request->all());
                
        return redirect()->back()->with('success', 'Job updated Successfully.');
    }



    /**
     *  Job in Featured table
     */
    public function jobFetureToggle($id){
        $job = Job::find($id);
        $job->featured = !$job->featured;
        $job->save();

        return redirect('/dashboard/jobs')->with('success', 'Featured Updated Successfully!');
    }

    /**
     *  Job in live/Draft
     */
    public function jobToggle($id){
        $job = Job::find($id);
        $job->status = !$job->status;
        $job->save();

        return redirect('/dashboard/jobs')->with('success', 'Status Updated Successfully!');
    }




    /**
     * Store a newly created resource in storage.
     */
    public function jobStore(JobPostRequest $request)
    {

        //$job = $request->request->all();

        $company_id = request('company_id');
        $company = Company::findOrFail($company_id);
        $user_id = $company->user_id;
      


        Job::create([
            'user_id'=> $user_id,
            'company_id'=> $company_id,
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'description' => request('description'),
            'roles' => request('roles'),
            'category_id' => request('category'),
            'position' => request('position'),
            'address' => request('address'),
            'type' => request('type'),
            'experience' => request('experience'),
            'number_of_vacancy' => request('number_of_vacancy'),
            'gender' => request('gender'),
            'salary' => request('salary'),
            'last_date' => request('last_date'),
        ]);


        return redirect()->back()->with('success', 'Job posted Successfully.');
    }




    // Job Trash method 
    public function jobTrash(){
        $jobs = Job::onlyTrashed()->get();
       return view('admin.jobs.trash', compact('jobs'));
   }

    // Job Restore method 
    public function jobRestore($id){
        Job::onlyTrashed()->where('id', $id)->restore();
        return redirect('/dashboard/jobs')->with('success', 'Job restored Successfully!');
   }




    /**
     *  Delete the single job
     */
    public function destroy(Request $request){
        $id = $request->get('id');
        $jobTrash = Job::find($id);
        $jobTrash->delete();
        return redirect('/dashboard/jobs')->with('success', 'Job Trash Successfully!');
    }


    // Job Delete permanantly method 
    public function jobDeletePermanantly(Request $request){

        $id = $request->get('id');
        Job::onlyTrashed()->where('id', $id)->forceDelete();
         return redirect('/dashboard/jobs')->with('success', 'Job Deleted Permanantly!');
    }

    // Get All Employers 
    public function getEmployers(){
        $employers = User::latest()->where('user_type', 'employer')->get();
        return view('admin.employers.index', compact('employers'));

    }


    /**
     *  employer active/deactive method
     */
    public function employerToggle($id){
        $employer = User::find($id);
        $employer->status = !$employer->status;
        $employer->save();

        return redirect('/dashboard/employers')->with('success', 'Status Updated Successfully!');
    }

    public function editEmployer($id){
        $employer = User::findOrFail($id);
        $company = Company::where('user_id', $id)->get();
        return view('admin.employers.edit', compact('employer', 'company'));

    }

    /**
     * Update the single company
     */
    public function updateEmployer(Request $request, string $id)
    {
        $employer = User::findOrFail($id);

        $request->validate([
            'address' => 'required',
            'phone'=> 'required',
            'cname'=> 'required',
            'website'=> 'required',
            'description'=> 'required|min:100|max:4000',
        
        ]);


        Company::updateOrCreate(
            ['user_id' => $id],
            [
                'address'=> request('address'),
                'phone'=> request('phone'),
                'cname'=> request('cname'),
                'website'=> request('website'),
                'description'=> request('description'),

            ]
        );



        $employer->update($request->all());
                
        return redirect()->back()->with('success', 'Info updated Successfully.');
    }


    // Employer delete method 
    public function destroyEmployer(Request $request){
        $id = $request->get('id');
        $employer = User::find($id);

        // Retrieve the old banner filename
        $oldBanner = Company::where('user_id', $id)->value('banner');


        // Delete the old banner file
        if(is_file(public_path('uploads/banner/' . $oldBanner))){
            unlink(public_path('uploads/banner/' . $oldBanner));
            
        }


        // Retrieve the old logo filename
        $oldLogo = Company::where('user_id', $id)->value('logo');
    

        // Delete the old logo file
        if(is_file(public_path('uploads/logo/' . $oldLogo))){
            unlink(public_path('uploads/logo/' . $oldLogo));
            
        }

        $employer->delete();
        return redirect('/dashboard/employers')->with('success', 'Employee Deleted Successfully!');
    }

 

    // // Get All candidates 
    public function getAllCatedidates(){
        $candidates = User::latest()->where('user_type', 'seeker')->get();
        return view('admin.candidates.index', compact('candidates'));

    }

    /**
     *  Candidate active/deactive method
     */
    public function candidateToggle($id){
        $candidate = User::find($id);
        $candidate->status = !$candidate->status;
        $candidate->save();

        return redirect('/dashboard/candidates')->with('success', 'Status Updated Successfully!');
    }


    public function editCandidate($id){
        $candidate = User::findOrFail($id);
        $profile = Profile::where('user_id', $id)->get();

        //dd($profile);
        return view('admin.candidates.edit', compact('candidate', 'profile'));

    }



    /**
     * Update the single candidate
     */
    public function updateCandidate(Request $request, string $id)
    {
        $candidate = User::findOrFail($id);

        $request->validate([
            'address' => 'required|min:20|max:255',
            'phone'=> 'required|digits:11',
            'experience'=> 'required|min:10|max:255',
            'bio'=> 'required|min:30|max:450',
        ]);


         Profile::updateOrCreate(
            ['user_id' => $id],
            [
                'address'=> request('address'),
                'phone'=> request('phone'),
                'gender'=> request('gender'),
                'dob'=> request('dob'),
                'experience'=> request('experience'),
                'bio'=> request('bio'),
            ]
        );



        $candidate->update($request->all());
                
        return redirect()->back()->with('success', 'Info updated Successfully.');
    }



    /**
     *  Delete the single Candidate
     */
    public function destroyCandidate(Request $request, string $id){
        // $id = $request->get('id');
        $CandidateTrash = User::find($id);
        $CandidateTrash->delete();
        return redirect('/dashboard/candidates')->with('success', 'Candidate Deleted Successfully!');
    }



    // Post Create method 
    public function postCreate(){
        
        return view('admin.posts.create');
    }


    // Post Store   
    public function postStore(Request $request){
        $this->validate($request, [
            'title'=> 'required|min:4|unique:posts',
            'description'=> 'required',
            'post_thumbnail'=> 'required|mimes:jpeg,jpg,png|max:1024'
        ]);


        if ($request->hasFile('post_thumbnail')) {
            $file = $request->file('post_thumbnail');
            $path = $file->store('uploads', 'public');
            Post::create([
                'title'=> $title = $request->get('title'),
                'slug' => Str::slug($title),
                'description' => $request->get('description'),
                'category_id' => $request->get('category_id'),
                'post_thumbnail' => $path,
                'status' => $request->get('status'),
            ]);
        }

        return redirect('/dashboard/posts')->with('success', 'Post created Successfully!');

    }



    // Category create
    public function categoryCreate(){
        
        return view('admin.category.create');
    }



    // Get all Category 
    public function getAllCategory(){
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }


    // Edit Category 
    public function editCategory($id){
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function updateCategory(Request $request, $id){
 
        $this->validate($request, [
            'name'=> 'required|min:4'
        ]);

        Category::where('id', $id)->update([
            'name'=> $request->get('name'),
            'slug' => Str::slug($request->get('name'))
            
        ]);

        return redirect('/dashboard/category')->with('success', 'Category updated Successfully!');

    }

    /**
     *  Delete the single Category
     */
    public function destroyCategory(Request $request, string $id){
        $Category = Category::find($id);
        $Category->delete();
        return redirect('/dashboard/category')->with('success', 'Category Deleted Successfully!');
    }
    // Category toggle method 
    public function categoryToggle($id){
        $categoryToggle = Category::find($id);
        $categoryToggle->status = !$categoryToggle->status;
        $categoryToggle->save();

        return redirect('/dashboard/category')->with('success', 'Status Updated Successfully!');
    }


    /**
     * Store a category
     */
    public function categoryStore(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required|min:4|unique:categories'
           
        ]);

        Category::create([
            'name'=> $name = $request->get('name'),
            'slug' => Str::slug($name),
            'status' => '1',

        ]);


        return redirect('/dashboard/category')->with('success', 'Category created Successfully!');
    }











    // Get all posts
    public function getAllPosts(){
        $posts = Post::latest()->get();
        return view('admin.posts.index', compact('posts'));

    }

    // post single show method 
    public function readPost($id){
        $post = Post::find($id);
        $featured = Job::where('featured', 1)->get();
        return view('admin.posts.read', compact('post', 'featured'));
    }



    // Show single post
    public function showPost($id){
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));

    }


    // Edit single post 
    public function editPost($id){
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post'));

    }

    // Update single post 
    public function updatePost(Request $request, $id){
 

        $this->validate($request, [
            'title'=> 'required|min:4',
            'description'=> 'required'
        ]);


        try{

            
            if ($request->hasFile('post_thumbnail')) {
                // Retrieve the old Cv filename
                $oldThumb = Post::where('id', $id)->value('post_thumbnail');
        
                // Delete the old Cv file
                if ($oldThumb) {
                    Storage::delete($oldThumb);
                }


                $post_thumbnail = $request->file('post_thumbnail')->store('uploads');
                //$file = $request->file('post_thumbnail');
                // $path = $file->store('uploads', 'public');
                Post::where('id', $id)->update([
                    'title'=> $request->get('title'),
                    'description' => $request->get('description'),
                    'category_id' => $request->get('category_id'),
                    'post_thumbnail' => $post_thumbnail,
                    'status' => $request->get('status'),
                ]);
            }else{
                Post::where('id', $id)->update([
                    'title'=> $request->get('title'),
                    'description' => $request->get('description'),
                    'category_id' => $request->get('category_id'),
                    'status' => $request->get('status'),
                ]);
            }
    
            return redirect('/dashboard/posts')->with('success', 'Post updated Successfully!');
        }catch(\Exception $e){
            return redirect('/dashboard/posts')->with('errors','Something goes wrong while uploading file!');
        }





    }


    // Delete single post by id
    public function postDestroy(Request $request){
        $id = $request->get('id');
        $post = Post::find($id);

        // // Retrieve the old Cv filename
        // $oldThumb = Post::where('id', $id)->value('post_thumbnail');

        // // Delete the old Cv file
        // if ($oldThumb) {
        //     Storage::delete($oldThumb);
        // }

        $post->delete();
        return redirect('/dashboard/posts')->with('success', 'Post Trash Successfully!');
    }


    // Post Restore method 
    public function postTrash(){
         $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trash', compact('posts'));
    }

    // Post Restore method 
    public function postRestore($id){
         Post::onlyTrashed()->where('id', $id)->restore();
         return redirect('/dashboard/posts')->with('success', 'Post restored Successfully!');
    }
    // Post Delete post permanantly method 
    public function postDeletePermanantly(Request $request){

        $id = $request->get('id');
        //$post = Post::find($id);


        // Retrieve the old Cv filename
        $oldThumb = Post::onlyTrashed()->where('id', $id)->value('post_thumbnail');

        // Delete the old Cv file
        if ($oldThumb) {
            Storage::delete($oldThumb);
        }

        Post::onlyTrashed()->where('id', $id)->forceDelete();
         return redirect('/dashboard/posts')->with('success', 'Post Deleted Permanantly!');
    }


    // Post toggle method 
    public function postToggle($id){
        $post = Post::find($id);
        $post->status = !$post->status;
        $post->save();

        return redirect('/dashboard/posts')->with('success', 'Status Updated Successfully!');
    }




    // Testimonial index
    public function testimonials(){
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    // Testimonial Create method 
    public function testimonialCreate(){
    
        return view('admin.testimonials.create');
    }
    
    // Testimonial Store   
    public function testimoniStore(Request $request){
        $this->validate($request, [
            'name'=> 'required|min:4',
            'profession'=> 'required|min:4',
            'content'=> 'required|max:1500',
            'video_id'=> 'required',
        ]);

        Testimonial::create([
            'name'=> $request->get('name'),
            'profession' => $request->get('profession'),
            'content' => $request->get('content'),
            'video_id' => $request->get('video_id'),
            'status' => $request->get('status'),
        ]);
        

        return redirect('/dashboard/testimonials')->with('success', 'Testimonial created Successfully!');

    }

    // Testimonial toggle method 
    public function testimoniToggle($id){
        $testimoni = Testimonial::find($id);
        $testimoni->status = !$testimoni->status;
        $testimoni->save();

        return redirect('/dashboard/testimonials')->with('success', 'Status Updated Successfully!');
    }


    public function editTestimoni($id){
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));

    }

    public function updateTestimoni(Request $request, $id){
 
        $this->validate($request, [
            'name'=> 'required|min:4',
            'profession'=> 'required|min:4',
            'content'=> 'required|max:1500',
            'video_id'=> 'required',
        ]);

        Testimonial::where('id', $id)->update([
            'name'=> $request->get('name'),
            'profession'=> $request->get('profession'),
            'content'=> $request->get('content'),
            'video_id'=> $request->get('video_id'),
            'status'=> $request->get('status'),
           
            
        ]);

        return redirect('/dashboard/testimonials')->with('success', 'Testimonial updated Successfully!');

    }


    public function destroyTestimoni(Request $request, string $id){
        $testimoni = Testimonial::find($id);
        $testimoni->delete();
        return redirect('/dashboard/testimonials')->with('success', 'Testimonial Deleted Successfully!');
    }


    // Setting method 
    public function settings(){
        return view('admin.settings.index');
    }




}
