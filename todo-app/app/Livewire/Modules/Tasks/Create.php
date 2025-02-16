<?php

namespace App\Livewire\Modules\Tasks;

use App\Events\NotificationEvent;
use App\Models\Task;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public $text, $user_id;

    protected $rules = [
        'text' => 'required|string|max:255',
        'user_id' => 'required|exists:users,id',
    ];

    public function render()
    {
        return view('livewire.modules.tasks.create', [
            'users' => User::roleUser()->get()
        ])->layout('layouts.app');
    }

    public function store()
    {
        $this->validate();

        Task::create([
            'text' => $this->text,
            'user_id' => $this->user_id,
        ]);

        event(new NotificationEvent($this->user_id, "New Task Assigned to you!"));

        session()->flash('message', 'Task created successfully!');
        return redirect()->route('tasks');
    }
}
