<article id=" {{$task->id}}}">

    <h2 class="card-title">{{ $task->title}}</h2>

    <section class="card-details">
        <h4>What:</h4>
        <p>{{ $task->what}}</p>
    </section>
    <section class="card-details">
        <h4>Points:</h4>
        <p>{{ $task->points}}</p>
    </section>
    <section class="card-details">
        <h4>User:</h4>
    @if($task->user)
        <p>{{ $task->user->name}}</p>
    @else 
    <p>Unassigned Task</p>
    @endif
    </section>
    <section class="card-details">
        <h4>Deadline:</h4>
        <p>{{ $task->deadline->toFormattedDateString()}}</p>
    </section>
    <section class="card-actions">
        <form action="{{route('delete.task', $task)}}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="card-btn ">Delete</button>

        </form>
    </section>

</article>