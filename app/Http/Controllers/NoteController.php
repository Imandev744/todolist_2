<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatNoteReQuest;
use App\Models\Note;
use App\Models\Task;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Task $task ,CreatNoteReQuest $request)
    {
            $note=$task->notes()->create($request->validated());

        return redirect()->route('tasks.show',$task)->withNote($note);
    }


    public function show(Task $task ,Note $note)
    {
        //
    }


    public function edit(Task $task ,Note $note)
    {
        //
    }


    public function update(Task $task ,Request $request, Note $note)
    {
        //
    }


    public function destroy(Task $task ,Note $note)
    {
        $note->delete();
        return redirect()->route('tasks.show',$task)->with('status','حذف نوت با موفقیت انجام شد');
    }
}
