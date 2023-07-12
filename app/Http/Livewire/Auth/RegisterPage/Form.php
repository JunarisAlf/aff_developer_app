<?php

namespace App\Http\Livewire\Auth\RegisterPage;

use App\Models\User;
use Exception;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component {
    use WithFileUploads;
    public $email, $wa_number, $full_name, $file, $password, $password_confirmation;
    public function rules(){
        return [
            'full_name'         => 'required|string',
            'wa_number'         => 'required|string|starts_with:628|unique:users,wa_number',
            'email'             => 'required|string|unique:users,email',
            'file'              => 'required|image|mimes:jpeg,png,jpg|max:1024',
            'password'          => 'required|string|min:8|confirmed',
        ];
    }
    public function register(){
        $validated = $this->validate();
        $img_filename = Str::random(40) . '.' . $this->file->getClientOriginalExtension();
        $this->file->storeAs('public/profile', $img_filename);
        $validated['profile_image'] = $img_filename;
        $validated['role'] = 'marketing';
        try{
            User::create($validated);
            $this->reset();
            session()->flash('success', 'Akun berhasil dibuat! Hubungi admin untuk mengaktifkan akun anda');
        }catch(Exception $e){
            dd($e);
            session()->flash('error', 'Server ERROR!');
        }
    }

    public function render() {
        return view('livewire.auth.register-page.form');
    }
}
