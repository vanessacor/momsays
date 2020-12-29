@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="title">Task List</h2>
    <div class="task-list">
        @foreach($taskList as $task)
        <x-taskCard :task="$task" />
        @endforeach
    </div>

</div>

@endsection