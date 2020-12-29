@extends('layouts.app')

@section('content')

<div class="container">
    <h4>My Tasks</h4>
    <p>Get Them Done!</p>
    @foreach($userTaskList as $task)
    <x-userTaskItem :task="$task" />
    @endforeach
    @endsection