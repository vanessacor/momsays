@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Task List</h2>
    <div>
        @foreach($taskList as $task)
        <x-taskCard :task="$task" />
        @endforeach
    </div>

</div>

@endsection