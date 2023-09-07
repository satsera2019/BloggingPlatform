<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin-panel.auth.login'); // Return the login form view
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Check if the authenticated user has the "admin" role
            if (Auth::user()->hasRole('admin')) {
                return redirect()->intended(route('admin-panel.blogs.index'));
            } else {
                // If not an admin, logout and redirect with an error message
                Auth::logout();
                return back()->withInput()->withErrors(['email' => 'You are not authorized to access the admin area.']);
            }
        } else {
            return back()->withInput()->withErrors(['email' => 'Invalid login credentials']);
        }
    }

    public function logout()
    {
        Auth::logout(); // Log out the admin user
        return redirect(route('admin-panel.login.form'));
    }
}
