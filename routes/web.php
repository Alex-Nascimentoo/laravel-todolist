<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main;

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

Route::get('/',[Main::class, "home"])->name('home');

//creating new task
Route::get('new_task', [Main::class, "newTask"])->name("new_task");
Route::post('new_task_submit',[Main::class, "newTaskSubmit"])->name("new_task_submit");

//task done || not done
Route::get('task_done/{id}',[Main::class,"taskStatus"])->name("task_status");

//editing task
Route::get('task_edit/{id}',[Main::class,"editTask"])->name('editTask');
Route::post('task_submit_edit',[Main::class,"submitEdit"])->name('submitEdit');

//task visible || invisible
Route::get('change_visibility/{id}',[Main::class,"changeVisibility"])->name('changeVisibility');
Route::get('check_invisible_tasks',[Main::class,"invisibleTasks"])->name('invisibleTasks');