@extends('layouts.app')

@section('content')

<div class="container">
    <x-title text="My Tasks" />
    <h4>My Current points: {{$user->points}}</h4>
    @foreach($userTaskList as $task)
        <x-userTaskItem :class=" $loop->odd ? 'odd' : 'even' " :task="$task" />
    @endforeach
    
@endsection