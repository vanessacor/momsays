@extends('layouts.app')

@section('content')

<div class="container dashboard">

    <x-title text="All Tasks" />
    <button class="dashboard-create" >
        <a href="{{route('create.task')}}" >
            New Task
        </a>
    </button>

    <div class="dashboard-tasklist">

    <table class="table">
    <thead>
      <tr>
        <th scope="col">Title</th>
        <th scope="col">What</th>
        <th scope="col">Points</th>
        <th scope="col">Assign to</th>
        <th scope="col">Completed</th>
        <th scope="col">Deadline</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach($taskList as $task)
        <x-dashboardTaskCard :task="$task" />
        @endforeach
    </div>


</div>

@endsection