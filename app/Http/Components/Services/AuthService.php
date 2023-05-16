<?php

namespace App\Http\Components\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function adminLogin($request)
    {
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            if($user->role != 'admin') {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'You are not authorized to access this page.',
                ]);
            }else{
                return $this->redirectAdmin();
            }
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function redirectAdmin()
    {
    
        if (Auth::check()) {
            $user = Auth::user();
            if($user->role == 'admin') {
                return redirect()->route('admin.dashboard.index');
            }else{
                return redirect()->route('admin.login')->with('error', 'You are not authorized to access this page.');
            }
        }
    }
}