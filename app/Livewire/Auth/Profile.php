<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Profile extends Component
{
    public $name, $email, $password_old, $password, $password_confirmation;

    public function mount()
    {
        $user = auth()->user();
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function editProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
        ]);

        auth()->user()->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('status', 'Profil berhasil diperbarui.');
        return redirect()->route('profile');
    }

    public function ubahPassword()
    {
        $this->validate([
            'password_old' => 'required|min:8',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($this->password_old, $user->password)) {
            session()->flash('error', 'Password lama salah!');
            return redirect()->route('profile');
        }

        $user->update([
            'password' => Hash::make($this->password),
        ]);

        session()->flash('status', 'Password berhasil diperbarui.');
        
        // Reset input form
        $this->reset(['password_old', 'password', 'password_confirmation']);
        return redirect()->route('profile');
    }

    public function render()
    {
        return view('livewire.auth.profile')->extends('layouts1.app')->section('content');
    }
}
