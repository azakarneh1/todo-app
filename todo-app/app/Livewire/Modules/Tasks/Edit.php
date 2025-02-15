<?php

namespace App\Livewire\Modules\Tasks;

use App\Models\Task;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public $task_id, $text, $user_id;

    protected $rules = [
        'text' => 'required|string|max:255',
        'user_id' => 'required|exists:users,id',
    ];

    public function mount($task_id)
    {
        $this->task_id = $task_id;
        $task = Task::findOrFail($task_id);
        $this->text = $task->text;
        $this->user_id = $task->user_id;
    }

    public function render()
    {
        return view('livewire.modules.tasks.edit', [
            'users' => User::roleUser()->get()
        ])->layout('layouts.app');
    }

    public function update()
    {
        $this->validate();

        $task = Task::findOrFail($this->task_id);
        $task->update([
            'text' => $this->text,
            'user_id' => $this->user_id,
        ]);

        session()->flash('message', 'Task updated successfully!');
        return redirect()->route('tasks');
    }
}
