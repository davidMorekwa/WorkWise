<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/';
    // protected function redirectTo()
    // {
    //     if(Auth::user()->role_id == 1){ // Admin User
    //         return redirect('/admin');
    //     } else if( Auth::user()->role_id == 2){ // Recruiter
    //         return redirect()->route('RecruitersHomePage.show');
    //     } else if(Auth::user()->role_id == 3){ // Job seeker
    //         return redirect('/');
    //     } else {
    //         return abort(403, 'Unidentified User');
    //     }
    // }
}
