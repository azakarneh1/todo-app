<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Task\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display Tasks.
     */
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'tasks' => TaskResource::collection(auth()?->user()?->tasks)
        ], 200);
        return response()->json(Task::all());
    }

    /**
     * Store a newly created Task.
     */
    public function store(Request $request)
    {
        $validated_task = $request->validate([
            'text' => 'required|string|max:255',
        ]);

        $task = auth()->user()->tasks()->create($validated_task);

        return response()->json([
            'status' => 'success',
            'message' => 'Task created successfully!',
            'data' => $task
        ], 201);
    }

    /**
     * Update the specified task.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'text' => 'required|string',
        ]);

        $task = Task::findOrFail($validated['task_id']);

        $task->update([
            'text' => $validated['text']
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Task updated successfully!',
            'data' => $task
        ], 200);
    }


    /**
     * Delete a task.
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Task deleted successfully!',
        ], 200);
    }
}
