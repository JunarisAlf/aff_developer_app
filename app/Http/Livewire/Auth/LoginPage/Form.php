<?php

namespace App\Http\Livewire\Auth\LoginPage;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Form extends Component{
    public $email, $password;
    public function login(){
        $validated = $this->validate([
            'email'         => 'required|string',
            'password'      => 'required|string'
        ]);
        if (Auth::attempt($validated)) {
            session()->regenerate();
            return to_route('admin.dashboard');
        }
        $this->resetExcept('email');
        session()->flash('error', 'Login Gagal! Email atau Password Salah!');
    }
    public function render(){
        return view('livewire.auth.login-page.form');
    }
}
