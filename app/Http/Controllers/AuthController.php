<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Return the login form view
    }

    public function showRegisterForm()
    {
        return view('auth.register'); // Return the Register form view
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->hasRole('admin') || $user->hasRole('user') || $user->hasRole('editor')) {
                return redirect()->intended(route('blogs.index'));
            } else {
                // If not an admin, logout and redirect with an error message
                Auth::logout();
                return back()->withInput()->withErrors(['email' => 'You are not authorized to access the admin area.']);
            }
        } else {
            return back()->withInput()->withErrors(['email' => 'Invalid login credentials']);
        }
    }

    public function register(CreateUserRequest $request)
    {
        $user = User::create($request->validated());
        $user->assignRole('user');
        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        return redirect()->route('blogs.index')->with('success', 'User created successfully');
    }

    public function logout()
    {
        Auth::logout(); // Log out the admin user
        return redirect(route('login.form'));
    }
}
