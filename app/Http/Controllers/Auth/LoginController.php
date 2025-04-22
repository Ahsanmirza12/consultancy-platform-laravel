<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials, $request->remember)) {
            $user = Auth::user();
    
            switch (strtolower($user->role)) {
                case 'admin':
                    return redirect()->route('dashboard',)->with('success', 'Login Successfully!');

                case 'user':
                    return redirect()->route('packages.create')->with('success', 'Login Successfully!');
                default:
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'Unauthorized role.');
            }
        }
    
        return redirect()->route('login')->with('error', 'Invalid email or password.');

    }
    




   public function logout(Request $request)
{
    // Logout the user
    Auth::logout();

    // Invalidate the session
    $request->session()->invalidate();

    // Regenerate the session token
    $request->session()->regenerateToken();

    // Redirect to login page with a success message
    return redirect('/login')->with('message', 'Logged out successfully!');
}

}

