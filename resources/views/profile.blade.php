@extends('layouts.app')

@section('content')
<div class="container">
<h2>{{$user->name}}</h2>
<p>You have the following tasks</p>
@foreach($user->tasks as $task)
    <li>{{$task->what}}</li>
    
@endforeach
@endsection