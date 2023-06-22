<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/email/verify';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'fname' => ['required', 'string', 'max:255'],
            // 'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //password must contain at least one uppercase letter, one lowercase letter, and one digit character.
            'password' => [
                'required',
                'min:8',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                'confirmed'
            ]
            // 'phone-number' =>['integer', 'max:20'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        //dd($data);
        return User::create([
            // 'fname' => $data['fname'],
            // 'lname' => $data['lname'],
            'email' => $data['email'],
            'role_id'=>$data['role'],
            'password' => Hash::make($data['password']),
            
        ]);
    }

	/**
	 * Where to redirect users after registration.
	 * 
	 * @return string
	 */
	public function getRedirectTo() {
		return $this->redirectTo;
	}
	
	/**
	 * Where to redirect users after registration.
	 * 
	 * @param string $redirectTo Where to redirect users after registration.
	 * @return self
	 */
	public function setRedirectTo($redirectTo): self {
		$this->redirectTo = $redirectTo;
		return $this;
	}
}
