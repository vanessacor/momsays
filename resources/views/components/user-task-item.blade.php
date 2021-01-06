<div class="item {{$class}}">
    <section class="item-card">
        <div class="points">
            <p> + {{$task->points}}</p>

        </div>
        <h3>{{$task->title}}</h3>

        <form action="{{route('taskDone', $task)}}" method="post" class="toggle">
            @csrf
            <button class="toggle-button @if($task->isCompleted) toggle-button-done  @else toggle-button-completed @endif" type="submit">
                <span className="circle"></span>
            </button>
        </form>

    </section>
</div>