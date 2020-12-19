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
        $tasks=auth()->user()->tasks;

        return view('tasks.index')->withTasks($tasks);
    }


    public function create()
    {
        return view('tasks.create');
    }


    public function store(CreateTaskRequest $request)
    {
//        $task= auth()->user()->tasks()->create($request->all());

        $task=auth()->user()->tasks()->create([

            'title'=>$request->title,
            'done'=>$request->get('done',false)

        ]);
        return redirect()->action('TaskController@index')
            ->with('status','با موفقیت انجام شد.');

    }


    public function show(Task $task)
    {
       if($task->user_id == auth()->id())
           return $task;
       else
           return abort(404);
    }


    public function edit(Task $task)
    {
//        return view('tasks.edit',compact('task'))
        return view('tasks.edit')->withTask($task);
    }


    public function update(UpdateTaskRequest $request, Task $task)
    {
            if($task->user_id != auth()->id())
                return abort(404);
            else
        $task->update($request->validated());
        return redirect()->action('TaskController@index')
            ->with('status','با موفقیت بروزرسانی شد');

//      $task=$this->update([
//          'title'=> $request->get('title'),
//          'done'=>$request->get('done')
//      ]);
//      $task->update($request->all());


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
