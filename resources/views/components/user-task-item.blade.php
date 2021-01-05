@php
$classList = ["red", "green", "blue", "yellow", "orange", "pink"];
$randomIndex = array_rand($classList, 1);
$class = $classList[$randomIndex];
@endphp

<div class="item {{$class}}">
    <section class="item-card">
        <div class="points">
            <p> + {{$task->points}}</p>

        </div>
        <h3>{{$task->title}}</h3>

        <form action="{{route('taskDone', $task->id)}}" method="post" class="toggle">
            @csrf
            <button class="toggle-button @if($task->isCompleted) toggle-button-completed @else toggle-button-done @endif" type="submit">
                <span className="circle"></span>
            </button>
        </form>

    </section>
</div>