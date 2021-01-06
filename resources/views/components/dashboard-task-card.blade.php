<tr id=" {{$task->id}}}" class="task-row">
    <td>
        {{ $task->title}}
    </td>
    <td>{{ $task->instructions}}</td>
    <td>{{ $task->points}}</td>
    <td> @if($task->user)
        {{ $task->user->name}}
        @else
        Unassigned Task
        @endif
    </td>
    <td> @if($task->isCompleted)
        Yes
        @else
        No
        @endif
    </td>
    <td>
        {{ $task->deadline->toFormattedDateString()}}
    </td>
    <td>

        <form action="{{route('delete.task', $task)}}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="delete-btn ">Delete</button>

        </form>

    </td>
</tr>