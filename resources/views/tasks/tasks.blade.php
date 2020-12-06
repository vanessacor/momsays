@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Task List</h2>
    <section class="card-group">
        @foreach($taskList as $task)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$task->what}}</h5>
                <p class="card-text">{{$task->how}}</p>
                <form action="{{route('tasks')}}/{{$task->id}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">add</button>

                </form>
            </div>
        </div>
        @endforeach
    </section>

</div>

@endsection