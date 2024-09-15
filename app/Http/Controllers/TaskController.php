<?php

namespace App\Http\Controllers;

use App\Events\TaskAssigned;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'assigned_to' => $request->assigned_to,  // userId của người được giao
            'assigned_by' => auth()->id(),
        ]);

        broadcast(new TaskAssigned($task, $task->assigned_to))->toOthers();

        return response()->json(['message' => 'Task created and notification sent!']);
    }
}
