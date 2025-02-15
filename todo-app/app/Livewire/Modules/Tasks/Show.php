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

    public function delete($taskId)
    {
        $task = Task::find($taskId);

        if ($task) {
            $task->delete();
            session()->flash('message', 'Task deleted successfully!');
        } else {
            session()->flash('message', 'Task not found.');
        }
        return redirect()->route('tasks');
    }
}
