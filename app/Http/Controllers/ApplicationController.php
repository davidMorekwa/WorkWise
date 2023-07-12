<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        // $data = $request->validate([
        //     'resume' => 'required|file|mimes:pdf|max:2048',
        // ]);

        $resumePath = $request->file('resume')->store('resumes');

        // $application = Application::create([
        //     'resume' => $resumePath,
        // ]);


        // Perform any additional actions or notifications as needed

        // return redirect()->back()->with('success', 'Application submitted successfully.');

        return Application::create([
            'resume' => $resumePath,
        ]);
    }

    // protected function create(array $data)
    // {
    //     //dd($data);
    //     return Application::create([
    //         'fname' => $data['fname'],
    //         'lname' => $data['lname'],
    //         'email' => $data['email'],
    //         'role_id'=>$data['role'],
    //         'phone_number'=>$data['phone_number'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }
}