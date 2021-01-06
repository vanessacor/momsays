

<article class="task-card {{$class}}" id=" {{$task->id}}}">
    <header class="task-card-title">
        <h2 >{{ $task->title}}</h2>
</header>
    <section class="task-card-details">
        <h4>What:</h4>
        <p>{{ $task->what}}</p>
    </section>
    <section class="task-card-details">
        <h4>Points:</h4>
        <p>{{ $task->points}}</p>
    </section>
    <section class="task-card-details">
        <h4>Deadline:</h4>
        <p>{{ $task->deadline->toFormattedDateString()}}</p>
    </section>
    <section class="task-card-actions">
        <form action="{{route('tasks')}}/ {{ $task->id}}" method="post">
            @csrf
            <button type="submit" class="card-btn ">I'll do it</button>

        </form>
    </section>

</article>