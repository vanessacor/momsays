@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Task List</h2>
    <section class="card-group">
        @foreach($taskList as $task)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$task->title}}</h5>
                <p class="card-text">{{$task->what}}</p>
                <form action="{{route('tasks')}}/ {{$task->id}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">do it</button>

                </form>
            </div>
        </div>
        @endforeach
    </section>

</div>

@endsection