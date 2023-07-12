<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecruitersController;
use App\Http\Controllers\JobseekerController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// })->name('jobSeekersHome');

Route::get('/', [RecruitersController::class, 'viewJobPost']);

Auth::routes([
    'verify' => true
]);


// RECRUITERS ROUTES
Route::middleware(['auth', 'role:2', 'verified'])->group(function () {
    // Recruiters homepage
    Route::get('/recruiter_home', [RecruitersController::class, 'home'])->name('RecruitersHomePage.show');
    // create recruiters profile
    Route::post('/recruiterProfile', [RecruitersController::class, 'createProfile'])->name('RecruiterProfile.create');
    // Recruiters Profile form
    Route::get('/recruiter_profile', [RecruitersController::class, 'registration'])->name('company_registration');
    // Recruiters profile page
    Route::get('/recruiterProfile', [RecruitersController::class, 'showProfile'])->name('RecruiterProfile.show');
    // Show update profile page
    Route::get('/updateProfileForm', [RecruitersController::class, 'updateProfileForm'])->name('EditRecruiterProfile.show');
    // Update Organisation Profile
    Route::post('/updateProfile', [RecruitersController::class, 'updateProfile'])->name('RecruiterProfile.update');
    // Show Job Post Form
    Route::get('/jobPost', [RecruitersController::class, 'postAJob'])->name('JobPostForm.show');
    // Create Job Post
    Route::post('/createJobPost', [RecruitersController::class, 'createAJobPost'])->name('JobPost.create');
    // Show recent job posts
    Route::get('/recentPosts', [RecruitersController::class, 'recentJobPosts'])->name('jobPosts.show');
    // Close job post
    Route::post('/closeJobPost', [RecruitersController::class, 'closeJobPost'])->name('JobPost.close');
});

// JOBSEEKER ROUTES
Route::middleware(['auth', 'role:3', 'verified'])->group(function () {
    // open the create profile page
    Route::get('/myprofile', [JobseekerController::class, 'myprofile'])->name('my_profile.view');
    // create jobseeker profile
    Route::post('/myprofile', [JobseekerController::class, 'createProfile'])->name('my_profile.create');
    // view profile of the created jobseeker profile
    Route::get('/viewprofile', [JobseekerController::class, 'viewProfile'])->name('view_profile.view');
    // apply for job
    Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');

});