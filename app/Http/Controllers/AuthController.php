<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create()
    {
        return view('Auth.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
    
        $credentials = $request->only("username", 'password');

        $user = User::where('username', $request->input("username"))->first();

        if (auth()->attempt($credentials)) {
            auth()->login($user);
            return redirect()->route('user.show', ["user" => $user])->with("success", "Successfully logged in");
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function destroy()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        
        return redirect()->route("auth.create")->with("success", "Logged out");
    }
}
