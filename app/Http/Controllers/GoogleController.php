<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function google_redirect() {
        return Socialite::driver('google')->redirect();
    }
        
    public function google_callback() {
        $googleUser = Socialite::driver('google')->user();
        $user = User::whereEmail($googleUser->email)->first();
        if (!$user) {
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => Hash::make('password123'), // Bisa diubah sesuai kebutuhan
                'role_id' => 4,
                'email_verified_at' => now(),
            ]);
            Auth::login($user);
            return redirect('/home')->with('success', 'Akun berhasil dibuat! Selamat datang 🎉');
        } else {
            Auth::login($user);return redirect('/home')->with('success', 'Akun berhasil masuk! Selamat datang 🎉');
        }
    }
}
