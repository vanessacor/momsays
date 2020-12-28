<article class="card" id=" {{$task->id}}}">

    <h2 class="card-title @if($task->id%2==0) even @else odd @endif">{{ $task->title}}</h2>
    <section class="card-details">
        <p>What to do:</p>
        <p>{{ $task->what}}</p>
    </section>
    <section class="card-details">
        <p>Deadline:</p>
        <p>{{ $task->deadline}}</p>

    </section>
    <section class="card-actions">
        <form action="{{route('tasks')}}/ {{ $task->id}}" method="post">
            @csrf
            <button type="submit" class="card-btn @if($task->id%2==0) even @else odd @endif">I'll do it</button>

        </form>
    </section>

</article>