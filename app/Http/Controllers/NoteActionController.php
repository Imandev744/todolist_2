<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Task;
use Illuminate\Http\Request;

class NoteActionController extends Controller
{
    public function restore(Task $task,Note $note)
    {
    $note->restore();

    return $this->back($task,'یادداشت یا موفقیت بازیافت شد ');

    }
    public function terminate(Task $task,Note $note)
    {
        $note->forceDelete();

        return $this->back($task,'یادداشت یا موفقیت بازیافت شد ');
    }
    public function back(Task $task,$message)
    {


        return redirect()->route('tasks.show',$task)->with('status',$message);
    }
}
