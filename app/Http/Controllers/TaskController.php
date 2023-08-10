<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    // public function store(Request $request)
    // {
    //     $task = new Task();
    //     $task->title = $request->input('title');
    //     $task->description = $request->input('description');
    //     $task->save();

    //     return redirect()->route('tasks.index');
    // }


    public function store(Request $request) {
        // dd($request->file('image'));
        $formFields = $request->validate([
            'title' => 'required',    
            'description' => 'required',
            
        ]);

      
       

        if($request -> hasFile('image')) {
            $formFields['image'] = $request -> file('image') -> store('logos', 'public');
        }
       

        Task::create($formFields);


        return redirect(route('tasks.index'))->with('message', 'Listing created successfully!');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task]);
    }

    public function update(Request $request, Task $task)
    {
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
