@extends('layouts.app')

@section('content')
<div class="container">
    <x-title text="Task List" />
    <div class="task-list">
        @foreach($taskList as $task)
        <x-taskCard :task="$task" />
        @endforeach
    </div>
@if(Auth::User()->role == 'adult')
    <a href="{{route('create.task')}}">New Task</a>
@endif
</div>

@endsection