@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Subtask</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('tasks.subtasks.update', [$task->id, $subtask->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $subtask->title) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Subtask</button>
            <a href="{{ route('tasks.index', $task->id) }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
