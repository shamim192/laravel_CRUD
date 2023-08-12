

@extends('layouts.app')

@section('content')
    <h1>Task List</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create New Task</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td><img src="{{ asset('storage/' . $task->image) }}" alt="Product Image" class="img-thumbnail" width="100"></td>
                    <td>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        <a href="{{ route('tasks.subtasks.create', $task->id) }}" class="btn btn-primary">Add Subtask</a>
                    </td>
                    <td>
                        <div class="mt-4">
                            <h3>Subtasks</h3>
                            @if ($task->subtasks->isEmpty())
                                <p>No subtasks available.</p>
                            @else
                                <ul>
                                    @foreach ($task->subtasks as $subtask)
                                        <li>{{ $subtask->title }} @if ($subtask->completed) (Completed) @endif</li>
                                    @endforeach
                                </ul>
                            @endif
                           
                        </div>
                    </td>
                </tr>
            @endforeach

            {{-- <div class="mt-4">
                <h3>Subtasks</h3>
                @if ($task->subtasks->isEmpty())
                    <p>No subtasks available.</p>
                @else
                    <ul>
                        @foreach ($task->subtasks as $subtask)
                            <li>{{ $subtask->title }} @if ($subtask->completed) (Completed) @endif</li>
                        @endforeach
                    </ul>
                @endif
               
            </div> --}}
        </div>
        </tbody>
    </table>
@endsection
