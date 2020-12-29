@php
    $classList = ["red", "green", "blue", "yellow", "orange", "pink"];
    $randomIndex = array_rand($classList, 1);
    $class = $classList[$randomIndex];
@endphp

<article class="card {{$class}}" id=" {{$task->id}}}">

    <h2 class="card-title">{{ $task->title}}</h2>
    <section class="card-details">
        <h4>What:</h4>
        <p>{{ $task->what}}</p>
    </section>
    <section class="card-details">
        <h4>Deadline:</h4>
        <p>{{ $task->deadline}}</p>

    </section>
    <section class="card-actions">
        <form action="{{route('tasks')}}/ {{ $task->id}}" method="post">
            @csrf
            <button type="submit" class="card-btn ">I'll do it</button>

        </form>
    </section>

</article>