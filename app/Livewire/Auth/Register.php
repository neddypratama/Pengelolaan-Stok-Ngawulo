<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Register extends Component
{
    public $name, $email, $password, $password_confirmation;

    public function rules() {
        return [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed']
        ];
    }
    
    public function render()
    {
        return view('livewire.auth.register')->extends('layouts2.app')->section('content');
    }

    public function registerUser() {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'role_id' => 4,
        ]);

        Auth::login($user, true);
        // event(new Registered($user));
        return redirect()->to('/email/verify');
    }
}
