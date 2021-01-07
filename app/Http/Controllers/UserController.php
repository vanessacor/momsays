<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $user = $request->user();
        $userTaskList = $user->tasks()->get();
        return view('users.user-tasks', ['user' => $user, 'userTaskList' => $userTaskList]);
    }
}
