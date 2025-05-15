@extends('layouts.layout')

@section('todolist')
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="container mt-4">
        <!-- Search Bar -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Type here" aria-label="Task input">
                    <a href="{{route('todolist.create')}}"><button class="btn btn-success" type="button">Add</button></a>
                </div>
            </div>
        </div>
        
        <!-- Task List -->
        @foreach($tasks as $task)
        <div class="mt-4">
            <div class="container">
                <div class="row">
                    <!-- Task 1 -->
                    <div class="alert alert-light d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1">{{$task->task}}</h5>
                            <p class="mb-1">{{$task->tanggal}}</p>
                        </div>
                        <div>
                            <button class="btn btn-sm btn-secondary" title="Detail">View</button>
                            <a href="{{route('todolist.edit', $task->id)}}" class="btn btn-sm btn-warning" title="Edit">Edit</a>
                            <form action="{{ route('todolist.destroy', $task->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Are you sure done with this task?')">Done</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

