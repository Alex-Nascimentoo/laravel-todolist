<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class Main extends Controller
{
    public function home(){

        //get available tasks
        $tasks = Task::where('visible', 1)->orderBy('created_at','desc')->get();

        return view('home',['tasks' => $tasks]);
    }

    public function newTask(){
        return view('new_task');
    }

    public function newTaskSubmit(Request $request){
        //get the new task title
        $newTask = $request->input('text_new_task');
        
        //save new task to the database
        $task = new Task();
        $task->task = $newTask;
        $task->save();

        //back to the main page
        return redirect()->route('home');
    }

    public function taskStatus($id){
        //update task to done
        $task = Task::find($id);

        if($task->done == null){
            $task->done = new \Datetime();
        }else{
            $task->done = null;
        } 
        $task->save();
        return redirect()->route('home');
    }

    public function editTask($id){
        $task = Task::find($id);
        return view('editTask',['task'=> $task]);
    }

    public function submitEdit(Request $request){
        //get the task id
        $id = $request->input('task_id');
        $editTask = $request->input('text_edit');

        //save the edits
        $task = Task::find($id);
        $task->task = $editTask;
        $task->save();
        
        //redirect to home
        return redirect()->route('home');
    }

    public function invisibleTasks(Request $request){
        $tasks = Task::where('visible', 0)->get();
        return view('invisibleTasks', ['tasks'=> $tasks]);
    }

    public function changeVisibility($id){
        $task = Task::find($id);
        $page = '';
        if($task->visible == 1){
            $task->visible = 0;
            $page = 'home';
        }else{
            $task->visible = 1;
            $page = 'invisibleTasks';
        }
        
        $task->save();        
        return redirect()->route($page);
    }
}
