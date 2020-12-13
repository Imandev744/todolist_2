<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {
        $tasks=Task::all();

        return view('tasks.index')->withTasks($tasks);
    }


    public function create()
    {
        return view('tasks.create');
    }


    public function store(CreateTaskRequest $request)
    {
//        $task= auth()->user()->tasks()->create($request->all());

        $task=Task::create([
            'user_id'=>1,
            'title'=>$request->title,
            'done'=>$request->get('done',false)

        ]);
        return redirect()->action('TaskController@index')
            ->with('status','با موفقیت انجام شد.');

    }


    public function show(Task $task)
    {
        //
    }


    public function edit(Task $task)
    {
        //
    }


    public function update(Request $request, Task $task)
    {
        //
    }


    public function destroy(Task $task)
    {
        //
    }
}
