<?php


use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::middleware('admin')->prefix('dashboard')->group(function () { 
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard'); 
    Route::get('/admins', [DashboardController::class, 'adminlist'])->name('dashboard.admin'); 
    Route::get('/job/show/{id}', [DashboardController::class, 'show'])->name('adminShow');
    Route::get('/jobs', [DashboardController::class, 'getAllJobs'])->name('adminJobs');
    Route::get('/job/create', [DashboardController::class, 'create'])->name('adminCreate');
    Route::post('/job/create', [DashboardController::class, 'jobStore'])->name('adminJobStore');
    Route::get('/job/edit/{id}', [DashboardController::class, 'edit'])->name('adminEdit');
    Route::post('/job/edit/{id}', [DashboardController::class, 'update'])->name('adminUpdate');
    Route::get('/job/featured/{id}', [DashboardController::class, 'jobFetureToggle'])->name('adminJobFeatureToggle');
    Route::get('/job/toggle/{id}', [DashboardController::class, 'jobToggle'])->name('adminJobToggle');

    Route::get('/job/trash', [DashboardController::class, 'jobTrash'])->name('adminJobTrash');
    Route::get('/job/trash/{id}', [DashboardController::class, 'jobRestore'])->name('adminJobRestore');
    Route::post('/job/delete', [DashboardController::class, 'destroy'])->name('adminDelete');
    
    Route::post('/job/trash/permanant', [DashboardController::class, 'jobDeletePermanantly'])->name('adminJobDelPermanent');
    // All Candidates
    Route::get('/candidates', [DashboardController::class, 'getAllCatedidates'])->name('adminCandidates');
    Route::get('/candidate/toggle/{id}', [DashboardController::class, 'candidateToggle'])->name('adminCanToggle');
    
    Route::get('/candidate/edit/{id}', [DashboardController::class, 'editCandidate'])->name('adminEditCan');
    Route::post('/candidate/edit/{id}', [DashboardController::class, 'updateCandidate'])->name('adminCanUpdate');
    
    Route::post('/candidate/delete/{id}', [DashboardController::class, 'destroyCandidate'])->name('adminCanDelete');

    // All Employer
    Route::get('/employers', [DashboardController::class, 'getEmployers'])->name('adminEmployers');
    Route::get('/employer/toggle/{id}', [DashboardController::class, 'employerToggle'])->name('employerToggle');
    
    Route::get('/employer/edit/{id}', [DashboardController::class, 'editEmployer'])->name('adminEditEmp');
    Route::post('/employer/edit/{id}', [DashboardController::class, 'updateEmployer'])->name('adminEmpUpdate');
    
    Route::post('/employer/delete', [DashboardController::class, 'destroyEmployer'])->name('adminEmpDelete');
    // All Categroy
    Route::get('/category', [DashboardController::class, 'getAllCategory'])->name('adminCategory');
    Route::get('/category/create', [DashboardController::class, 'categoryCreate'])->name('adminCatCreate');
    Route::post('/category/create', [DashboardController::class, 'categoryStore'])->name('adminCatStore');
    Route::get('/category/toggle/{id}', [DashboardController::class, 'categoryToggle'])->name('adminCatToggle');
    Route::get('/category/edit/{id}', [DashboardController::class, 'editCategory'])->name('adminEditCat');
    Route::post('/category/edit/{id}', [DashboardController::class, 'updateCategory'])->name('adminCatUpdate');
    Route::post('/category/delete/{id}', [DashboardController::class, 'destroyCategory'])->name('adminCatDelete');

    // All Categroy
    Route::get('/category', [DashboardController::class, 'getAllCategory'])->name('adminCategory');
    Route::get('/category/create', [DashboardController::class, 'categoryCreate'])->name('adminCatCreate');
    Route::post('/category/create', [DashboardController::class, 'categoryStore'])->name('adminCatStore');
    Route::get('/category/toggle/{id}', [DashboardController::class, 'categoryToggle'])->name('adminCatToggle');
    Route::get('/category/edit/{id}', [DashboardController::class, 'editCategory'])->name('adminEditCat');
    Route::post('/category/edit/{id}', [DashboardController::class, 'updateCategory'])->name('adminCatUpdate');
    Route::post('/category/delete/{id}', [DashboardController::class, 'destroyCategory'])->name('adminCatDelete');
    // Posts Route 
    Route::get('/posts', [DashboardController::class, 'getAllPosts'])->name('adminPosts');
    Route::get('/post/create', [DashboardController::class, 'postCreate'])->name('adminPostCreate');
    Route::post('/post/create', [DashboardController::class, 'postStore'])->name('adminPostStore');
    Route::post('/post/destroy', [DashboardController::class, 'postDestroy'])->name('adminPostDestroy');
    Route::get('/post/edit/{id}', [DashboardController::class, 'editPost'])->name('adminPostEdit');
    Route::post('/post/edit/{id}', [DashboardController::class, 'updatePost'])->name('adminPostUpdate');
    Route::get('/post/show/{id}', [DashboardController::class, 'showPost'])->name('adminPostShow');
    
    Route::get('/post/trash', [DashboardController::class, 'postTrash'])->name('adminPostTrash');
    Route::get('/post/trash/{id}', [DashboardController::class, 'postRestore'])->name('adminPostRestore');
    
    Route::post('/post/trash/permanant', [DashboardController::class, 'postDeletePermanantly'])->name('adminPostDelPermanent');
    
    Route::get('/post/toggle/{id}', [DashboardController::class, 'postToggle'])->name('adminPostToggle');
    
    
    // Testimonial Route 
    Route::get('/testimonials', [DashboardController::class, 'testimonials'])->name('adminTestimonials');
    Route::get('/testimonial/create', [DashboardController::class, 'testimonialCreate'])->name('adminTestimonial');
    Route::post('/testimonial/create', [DashboardController::class, 'testimoniStore'])->name('adminTestimoniStore');
    
    Route::get('/testimonial/toggle/{id}', [DashboardController::class, 'testimoniToggle'])->name('adminTestiToggle');
    Route::get('/testimonial/edit/{id}', [DashboardController::class, 'editTestimoni'])->name('adminTestiEdit');
    Route::post('/testimonial/edit/{id}', [DashboardController::class, 'updateTestimoni'])->name('adminTestiUpdate');
    Route::post('/testimonial/delete/{id}', [DashboardController::class, 'destroyTestimoni'])->name('adminTestiDelete');
    
    // Setting route 
    Route::get('/settings', [DashboardController::class, 'settings'])->name('dashboard.settings');



});


// Single post route
Route::get('/post/{id}/{slug}', [DashboardController::class, 'readPost'])->name('adminPostRead');