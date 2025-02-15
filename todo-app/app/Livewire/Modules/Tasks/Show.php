<?php

namespace App\Livewire\Modules\Tasks;

use App\Models\Task;
use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        return view('livewire.modules.tasks.show', [
            'tasks' => Task::all(),
        ]);
    }
}
