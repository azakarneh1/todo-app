<?php

namespace App\Livewire\Modules\Tasks;

use App\Models\Task;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Show extends Component
{
    public $emailFilter = '';

    public function render()
    {
        $cacheKey = 'tasks_page_' . trim($this->emailFilter) . '_page_' . request('page', 1);

        $tasks = Cache::remember($cacheKey, now()->addMinutes(10), function () {
            return Task::when($this->emailFilter, function ($query) {
                return $query->whereHas('user', function ($query) {
                    return $query->where('email', 'like', '%' . trim($this->emailFilter) . '%');
                });
            })->paginate(10);
        });

        return view('livewire.modules.tasks.show', [
            'tasks' => $tasks,
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
