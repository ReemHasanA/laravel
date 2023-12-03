<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function sign_up(Request $request){
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string'
        ]);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id'=>2
        ]);
        $token = $user->createToken('apiToken')->plainTextToken;
        // return response()->json([

            $res = [
                'user' => $user,
                'token' => $token
            ];
            return response()->json($res, 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication successful
            // $request->session()->start();
            
            $req=[
                'email'=> $request->email,
                'id'=>Auth::user()->id,
            ];
            // $request->session()->regenerate();

           return response()->json($req,201);
        } else {
            return response()->json("Your provided credentials do not match in our records.");
            // back()->withErrors([
            //         'email' => '',
            //     ])->onlyInput('email');

        }

        
        //
    }

    public function logout(){
             Auth::logout();
        //auth()->user()->tokens()->delete();
        return [
            'message' => 'user logged out'
        ];
    }
// Route::post('/login', [AuthController::class, 'login']);
}
