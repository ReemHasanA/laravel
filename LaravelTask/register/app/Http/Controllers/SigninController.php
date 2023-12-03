<?php

namespace App\Http\Controllers;
use App\Models\User;


use Illuminate\Http\Request;

class SigninController extends Controller
{
    public function index()
    {
        // Your code to return the sign-up view
        return view('Auth.signin');
    }
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',  
            'role_id' => 'required',  
        ];
        $data = $request->validate($rules);
        User::create($data);


        return redirect('/');
    }
}
