<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $taskList = Task::doesntHave('user')->orderBy('deadline', 'asc')->get();
        return view('tasks.tasks', ['taskList' => $taskList]);
    }


    public function dashboardIndex()
    {
        $taskList = Task::orderBy('deadline', 'asc')->get();
        return view('dashboard.task-list', ['taskList' => $taskList]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function assign(Request $request, $id)
    {
        $user = $request->user();

        $task = Task::find($id);
        $user->addTask($task);
        return redirect()->route('user.tasks', $user->id);
    }

    public function toggleCompletion(Request $request, Task $task)
    {
        $user = $request->user();

        $task->toggleCompletion();
        if ($task->isCompleted) {
            $user->addPoints($task->points);
            return back();
        }

        $user->removePoints($task->points);
        return back();
    }

    public function create()
    {
        return view('tasks.task-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param   \App\Http\Requests\StoreTaskRequest  $request 
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        $request->validated();
        Task::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Task  $task
     * @param   \App\Http\Requests\StoreTaskRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(Task $task, StoreTaskRequest $request)
    {
        $request->validated();

        $task->update($request->all());
        return redirect()->route('dashboard.tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('dashboard.tasks');
    }
}
