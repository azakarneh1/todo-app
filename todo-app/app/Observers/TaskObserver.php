<?php

namespace App\Observers;

use App\Models\Task;
use Illuminate\Support\Facades\Cache;

class TaskObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(Task $task): void
    {
        $this->flushCache();
    }

    /**
     * Handle the Task "updated" event.
     */
    public function updated(Task $task): void
    {
        $this->flushCache();
    }

    /**
     * Handle the Task "deleted" event.
     */
    public function deleted(Task $task): void
    {
        $this->flushCache();
    }

    /**
     * Handle the Task "restored" event.
     */
    public function restored(Task $task): void
    {
        $this->flushCache();
    }

    /**
     * Handle the Task "force deleted" event.
     */
    public function forceDeleted(Task $task): void
    {
        $this->flushCache();
    }

    protected function flushCache()
    {
        Cache::forget('tasks_page_' . trim(request()->input('emailFilter')) . '_page_' . request('page', 1));
    }
}
