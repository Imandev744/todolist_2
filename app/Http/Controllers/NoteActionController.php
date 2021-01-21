<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Task;
use Illuminate\Http\Request;

class NoteActionController extends Controller
{
    public function restore(Task $task, $note)
    {
        Note::withTrashed()->find($note)->restore();

    return $this->back($task,'یادداشت یا موفقیت بازیافت شد ');

    }
    public function terminate(Task $task, $note)
    {

        Note::withTrashed()->find($note)->forceDelete();
        return $this->back($task,'یادداشت یا موفقیت حذف شد شد ');
    }
    public function back(Task $task,$message)
    {
        return redirect()->route('tasks.show',$task)->with('status',$message);
    }
}
