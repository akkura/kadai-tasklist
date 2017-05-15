<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Task;
use Illuminate\Support\Facades;
use App\User;

class TasksController extends Controller
{
    
    
    public function index()
    {
        if(\Auth::check()){
        $user =\Auth::user();
       
        $tasks=$user->tasks()->get();
       
       return view('tasks.index',[
           'tasks' => $tasks
        ]);}
        
         else {return redirect('/login');}
    }

    public function create()
    {
       $task = new Task;
       
       return view('tasks.create',[
           'task' => $task,
        ]);
        
      
    }

   
    public function store(Request $request)
    {
        if(\Auth::check()){
      
         $this->validate($request,[
            'content' => 'required',
            'status'  => 'required',
        ]);
        
        $user =\Auth::user();
        $tasks = new Task;
        $tasks->content = $request->content;
        $tasks->status = $request->status;
        $tasks->user_id = $user->id;
        
        $tasks->save();
       
        }
        
      
        
        return redirect('/');
    }

   
    public function show($id)
    {   
        if(\Auth::check()){
        $user =\Auth::user();
       
        $task = Task::find($id);
        
        if($task->user_id == $user->id){
            return view('tasks.show',[
           'task' => $task
        ]);}
        
        }
        
          return redirect('/');
    }

   
 
    public function edit($id)
    {
       $task = Task::find($id);
       
       return view('tasks.edit',[
           'task' => $task,
        ]);
    }

   
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'content' => 'required',
            'status'  => 'required',
        ]);
        $task = Task::find($id);
        $task->content = $request->content;
        $task->status  = $request->status;
        
        $task->save();
        
        return redirect('/');
        
    }

  
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        
        return redirect('/');
    }
}
