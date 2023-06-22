<?php

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

Route::get('/', function () {
    return view('index');
})->name('jobSeekersHome');


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
    // TODO: Update Organisation Profile
});

// JOBSEEKER ROUTES
Route::middleware(['auth', 'role:3', 'verified'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('jobseeker-home');
    // create jobseeker myprofile
    // Route::get('/myprofile', [JobseekerController::class, 'showProfile'])->name('my_profile.show');
    Route::get('/myprofile', function () {
        return view('jobseeker.myprofile');
    })->name('jobSeekersmyProfile');
    // create jobseeker profile
    Route::post('/myprofile', [JobseekerController::class, 'createProfile'])->name('my_profile.create');
    // view profile
    Route::get('/viewprofile', function () {
        return view('jobseeker.viewprofile');
    })->name('jobSeekersProfile');

    Route::get('/viewdata/{userId}', function ($id) {
        $data = DB::table('jobseekers')->where('userId', $id)->first();
        return view('jobseeker.viewprofile', ['data' => $data]);
    })->name('jobSeekersProfileview');;

    Route::get('/viewprofile', [JobseekerController::class, 'fetchtest']);

});