<?php

namespace App\Livewire\Modules\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Edit extends Component
{
    public User $user;
    public $name, $email, $role, $password;

    public function render()
    {
        return view('livewire.modules.users.edit')->layout('layouts.app');
    }

    public function mount($user_id)
    {
        $this->user = User::find($user_id);

        if (!$this->user) {
            session()->flash('error', 'User not found.');
            return redirect()->route('users');
        }

        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->role = $this->user->role;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'role' => 'required|string|in:admin,user',
            'password' => 'nullable|min:8',
        ]);

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'password' => $this->password ? Hash::make($this->password) : $this->user->password,
        ]);

        session()->flash('message', 'User updated successfully!');
        return redirect()->route('users');
    }
}
