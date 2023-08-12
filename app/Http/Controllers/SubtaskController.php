<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Subtask;
use Illuminate\Http\Request;

class SubtaskController extends Controller
{
    public function create(Task $task)
    {
        return view('subtasks.create', compact('task'));
    }

    public function store(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
        ]);

        $task->subtasks()->create($validatedData);

        return redirect()->route('tasks.index', $task->id)
            ->with('success', 'Subtask created successfully.');
    }

    public function edit(Task $task, Subtask $subtask)
    {
        return view('subtasks.edit', compact('task', 'subtask'));
    }

    public function update(Request $request, Task $task, Subtask $subtask)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
        ]);

        $subtask->update($validatedData);

        return redirect()->route('tasks.index', $task->id)
            ->with('success', 'Subtask updated successfully.');
    }

    public function destroy(Task $task, Subtask $subtask)
    {
        $subtask->delete();

        return redirect()->route('tasks.index', $task->id)
            ->with('success', 'Subtask deleted successfully.');
    }
}
