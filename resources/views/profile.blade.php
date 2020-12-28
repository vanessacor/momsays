@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{$user->name}}</h2>
    <p>You have the following tasks</p>
    @foreach($userTaskList as $task)
    <li>{{$task->title}}</li>
    @if($task->isCompleted)
    <button class="btn btn-primary">Completed</button>
    @else
    <form action="{{route('taskDone', $task->id)}}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Done</button>

    </form>
    @endif
    @endforeach
    @endsection