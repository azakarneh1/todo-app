<?php

namespace App\Livewire\Modules\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public $name, $email, $role, $password;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'role' => 'required|string|in:admin,user',
        'password' => 'required|min:8',
    ];

    public function render()
    {
        return view('livewire.modules.users.create')->layout('layouts.app');
    }

    public function store()
    {
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('message', 'User created successfully!');
        return redirect()->route('users');
    }
}
