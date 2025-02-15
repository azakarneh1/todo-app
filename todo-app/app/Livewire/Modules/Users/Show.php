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
}
