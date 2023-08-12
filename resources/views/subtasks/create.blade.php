@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create New Subtask</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('tasks.subtasks.store', $task->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Subtask</button>
            <a href="{{ route('tasks.index', $task->id) }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection