@extends('layouts.app')

@section('content')

<div class="container">
    
    <x-title text="All Tasks" />
    <a href="{{route('create.task')}}">New Task</a>
    
    <div class="task-list">
        @foreach($taskList as $task)
        <x-dashboardTaskCard :task="$task" />
        @endforeach
    </div>


</div>

@endsection