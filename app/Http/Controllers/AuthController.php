<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserProfile;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        auth()->login($user);

        return redirect()->route('dashboard');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function dashboard()
    {
        return view('dashboard', ['user' => auth()->user()]);
    }

    public function editProfile()
    {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $profile = UserProfile::firstOrNew(['user_id' => auth()->id()]);
        $profile->father_name = $request->father_name;
        $profile->mother_name = $request->mother_name;
        $profile->save();

        return redirect()->route('dashboard')->with('success', 'Profile updated successfully.');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
