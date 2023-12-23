<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required',
        ]);
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role'),
        ]);
        $user->save();
        return redirect()->route('home')->with('success', 'Registration confirmed successfully');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user) {
                $userRole = $user->role;
                // $userId = $user->id;
                $userEmail = $user->email;
                if ($userRole == 0) {
                    return redirect()->route('studentProfile', ['email' => $userEmail]);
                }
                return redirect()->route('student_table');
            }
            return redirect('/');
        }
        return redirect()->route('login')->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
