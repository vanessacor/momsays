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
    Route::post('/tasks/{id}', [App\Http\Controllers\TaskController::class, 'assign',])->name('task.assign_user');
    Route::get('/user/{id}/tasks', [App\Http\Controllers\UserController::class, 'index'])->name('user.tasks');
    Route::post('/user/{task}', [App\Http\Controllers\TaskController::class, 'toggleCompletion'])->name('task.mark_done');
});

Route::middleware('adult')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\TaskController::class, 'dashboardIndex'])->name('dashboard.tasks');
    Route::get('/dashboard/create', [App\Http\Controllers\TaskController::class, 'create'])->name('create.task');
    Route::post('/dashboard/create', [App\Http\Controllers\TaskController::class, 'store',])->name('save.task');
    Route::put('/dashboard/{task}', [App\Http\Controllers\TaskController::class, 'update',])->name('update.task');
    Route::delete('/dashboard/{task}', [App\Http\Controllers\TaskController::class, 'destroy',])->name('delete.task');
});
