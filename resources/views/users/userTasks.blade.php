@extends('layouts.app')

@section('content')

<div class="container">
    <x-title text="My Tasks" />
    @foreach($userTaskList as $task)
        <x-userTaskItem :task="$task" />
    @endforeach
    
@endsection