<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecruitersController;


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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





// RECRUITERS ROUTES
Route::middleware(['auth','role:2', 'verified'])->group(function(){
    // Recruiters homepage
    Route::get('/company_home', [RecruitersController::class, 'home'])->name('recruiters_homePage');
    // Company Profile
    Route::get('/company_profile', [RecruitersController::class, 'registration'])->name('company_registration');
});

