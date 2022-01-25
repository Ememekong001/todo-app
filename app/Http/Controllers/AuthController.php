<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUser;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function index(){
        return view('register');
    }

    public function registerUser(RegisterUser $request){

        $user = new User();
        $user->name = $request->input('name');
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('dashboard')->with('success', 'User created successfully');

    }

    public function loginShow(){
        return view('login');
    }


    public function loginUser(LoginRequest $request){

        $credentials = $request->only(
        [
            'email',
            'password',
        ]);
        if( Auth::attempt([
            'email'=>$credentials['email'],
            'password'=>$credentials['password'],
        ]));

        return redirect('dashboard')->with('success', 'User created successfully');
    }

    public function logoutUser(){
        Auth::logout();

        return redirect('login')->with('success', 'User logged out');
    }
}
