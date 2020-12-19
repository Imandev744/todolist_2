<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
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

    }


    public function edit(Task $task)
    {
//        return view('tasks.edit',compact('task'));
        return view('tasks.edit')->withTask($task);
    }


    public function update(UpdateTaskRequest $request, Task $task)
    {
      $task->update($request->validated());
//      $task=$this->update([
//          'title'=> $request->get('title'),
//          'done'=>$request->get('done')
//      ]);
//      $task->update($request->all());
//
      return redirect()->action('TaskController@index')
          ->with('status','با موفقیت بروزرسانی شد');
    }

    public function destroy(Task $task)
    {

        $task->delete();
        return redirect()->action('TaskController@index')
            ->with('status','حذف با موفقیت انجام شد');
    }


    // delete model without alert
    public function delete(Task $task)
    {
//         dd($task);
        $task->delete();
        return redirect()->action('TaskController@index')
            ->with('status','حذف با موفقیت انجام شد');
    }
}
