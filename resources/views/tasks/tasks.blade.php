@extends('layouts.app')

@section('content')
<div class="container">
    <x-title text="Task List" />
    <div class="task-list">
        @foreach($taskList as $task)
        <x-taskCard  :class=" $loop->odd ? 'odd' : 'even' " :task="$task" />
        @endforeach
    </div>

</div>

@endsection