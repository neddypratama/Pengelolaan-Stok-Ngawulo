<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}

// <?php

// namespace App\Http\Controllers;

// use App\Models\User;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
// use Laravel\Socialite\Facades\Socialite;

// class AuthController extends Controller
// {
//     public function login(Request $request) {
//         $request->validate([
//             'email' => 'required|email|max:50',
//             'password' => 'required|min:8',
//         ]);
//         if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
//             return redirect('/dashboard')->with('success', 'Akun berhasil masuk! Selamat datang 🎉');
//         }
//         return back()->with('error', 'Email atau Password salah!');
//     }

//     function register(Request $request) {
//         $request->validate([
//             'name' => 'required|max:50',
//             'email' => 'required|email|max:50',
//             'password' => 'required|min:8|confirmed',
//         ]);

//         $user = User::create([
//             'name' => $request->name,
//             'email' => $request->email,
//             'password' => Hash::make($request->password),
//             'status' => "verify",
//             'role_id' => 4,
//         ]);
//         Auth::login($user);
//         return redirect('/dashboard')->with('success', 'Akun berhasil dibuat! Selamat datang 🎉');
//     }

//     public function google_redirect() {
//         return Socialite::driver('google')->redirect();
//     }

//     public function google_callback() {
//         $googleUser = Socialite::driver('google')->user();
//         $user = User::whereEmail($googleUser->email)->first();
//         if (!$user) {
//             $user = User::create([
//                 'name' => $googleUser->name,
//                 'email' => $googleUser->email,
//                 'password' => Hash::make('password123'), // Bisa diubah sesuai kebutuhan
//                 'role_id' => 4,
//                 'email_verified_at' => now(),
//                 'status' => "actived",
//             ]);
//             Auth::login($user);
//             return redirect('/dashboard')->with('success', 'Akun berhasil dibuat! Selamat datang 🎉');
//         } else {
//             Auth::login($user);
//             return redirect('/dashboard')->with('success', 'Akun berhasil masuk! Selamat datang 🎉');
//         }
//     }

//     public function logout() {
//         Auth::logout();
//         return redirect('/login');
//     }
// }
