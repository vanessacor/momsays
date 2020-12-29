@extends('layouts.app')

@section('content')
<div class="container">
    <x-title text="Task List" />
    <div class="task-list">
        @foreach($taskList as $task)
        <x-taskCard :task="$task" />
        @endforeach
    </div>

</div>

@endsection