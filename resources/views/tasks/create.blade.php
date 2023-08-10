

@extends('layouts.app')

@section('content')
    <h1>Create New Task</h1>
    <form action="{{ route('tasks.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value={{old('title')}}  />
            @error('title')
          <p class="alert alert-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description"  class="form-control" rows="3" value={{old('description')}}></textarea>
            @error('description')
          <p class="alert alert-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="image" id="image" class="form-control-file">
      </div>
  
          @error('image')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create Task</button>
    </form>
@endsection
