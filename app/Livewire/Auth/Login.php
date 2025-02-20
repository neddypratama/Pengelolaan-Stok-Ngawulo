<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;

class Login extends Component
{
    public $email, $password, $remember;

    public function rules() {
        return [
            'email' => ['required', 'email'],
            'password' => ['required']
        ];
    }
    public function render()
    {
        return view('livewire.auth.login')->extends('layouts2.app')->section('content');
    }

    public function loginUser() {
        $this->validate();
        $key = strtolower($this->email) . '|'. request()->ip();
 
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $this->addError('email', __('auth.throttle', [
                'seconds' => RateLimiter::availableIn($key),
            ]));
            return null;
        }
        
        if (!Auth::attempt($this->only(['email', 'password']), $this->remember)) {
            RateLimiter::hit($key);
            $this->addError('email', __('auth.failed'));
            return null;
        }

        $user = User::whereEmail($this->email)->first();
        if ($user->email_verified_at == null) {
            return redirect()->to('/email/verify');
        } else {
            return redirect()->to('/home');
        }
    }
}
