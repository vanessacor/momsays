@php
    $classList = ["red", "green", "blue", "yellow", "orange", "pink"];
    $randomIndex = array_rand($classList, 1);
    $class = $classList[$randomIndex];
@endphp

<div class="item {{$class}}">
    <section class="item-card">
        <h3>{{$task->title}}</h3>
        @if($task->isCompleted)
        <h4 class="item-card-completed">Completed</h4>
        @else
        <form action="{{route('taskDone', $task->id)}}" method="post" class="item-card-done">
            @csrf
            <button type="submit" >Done</button>
        </form>
        @endif
    </section>
</div>