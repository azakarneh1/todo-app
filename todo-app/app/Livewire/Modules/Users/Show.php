<?php

namespace App\Livewire\Modules\Users;

use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        return view('livewire.modules.users.show', [
            'users' => User::all(),
        ]);
    }

    public function delete($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->delete();
            session()->flash('message', 'User deleted successfully!');
        } else {
            session()->flash('message', 'User not found.');
        }
        return redirect()->route('users');
    }
}
