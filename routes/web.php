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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





// RECRUITERS ROUTES
Route::get('/company_home', [RecruitersController::class, 'home'])->name('recruiters_homePage');
Route::get('/company_registration', [RecruitersController::class, 'registration'])->name('company_registration');
