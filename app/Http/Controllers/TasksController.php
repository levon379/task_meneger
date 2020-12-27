<?php

namespace App\Http\Controllers;

use App\User;
use App\Tasks;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TasksController extends Controller {

    public function getTasks() {
        $tasks = Tasks::all();

        return view('task/tasks')->with('tasks', $tasks);
    }

    public function editTask($id) {
        $task = Tasks::findOrFail($id);
        return view('task/task_edit')->with('task', $task);
    }

    public function deleteTask($id) {
        Tasks::find($id)->delete();
        return redirect('tasks')->with('success', 'Hello');
    }

    public function updateTask($id, Request $req) {

        $task = Tasks::findOrFail($id);
        $data = Tasks::find($id);
        $data->title = $req->input('title');
        $data->description = $req->input('description');
        $data->choices = $req->input('choices');
        $data->user_id = $req->input('user_id');
        $data->save();
        return redirect()->back()->with('task', $task);
    }

    public function CreateTask(Request $req) {

        return view('task/task_create');
    }

    public function saveTask(Request $req) {
        Tasks::create([
            'title' => $req->title,
            'description' => $req->description,
            'user_id' => $req->user_id,
            'choices' => $req->choices,
        ]);


        return redirect('/tasks');
    }

////My task
    public function updateMyTask($id, Request $req) {

        $task = Tasks::findOrFail($id);
        $data = Tasks::find($id);
        $data->choices = $req->input('choices');
        $data->save();
        return redirect()->back()->with('task', $task);
    }

    public function showeditTask($id = null, Request $request ) {
        //all my tasks
       
        if ($id != null) {
            $id = $request->id;
        }
        else{
            $id = Auth::user()->id;
        }

        $tasks = DB::table('tasks')
                ->where('user_id', '=', $id)
                ->get();
        //dd($task);

        return view('task/show_task_edit')->with('tasks', $tasks);
    }

}
