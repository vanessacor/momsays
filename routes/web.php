<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('tasks');
});

Auth::routes();


Route::middleware('auth')->group(function () {
    Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks');
    Route::post('/tasks/{id}', [App\Http\Controllers\TaskController::class, 'assign',])->name('tasksPost');
    Route::get('/user/{id}/tasks', [App\Http\Controllers\UserController::class, 'index'])->name('userTasks');
    Route::post('/user/{task}', [App\Http\Controllers\TaskController::class, 'toggleCompletion'])->name('taskDone');
});

Route::middleware('adult')->group(function () {
    Route::get('/adults/create', [App\Http\Controllers\TaskController::class, 'create'])->name('create.task');
    Route::post('/adults/create', [App\Http\Controllers\TaskController::class, 'store',])->name('save.task');
});
