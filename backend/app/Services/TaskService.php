<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Facades\Log;

class TaskService
{
    /**
     * Create a new class instance.
     */
    public function getTasks()
    {
        return Task::get();
    }

    public function createTasks($request)
    {
        $insert['title'] = $request->title;
        $insert['description'] = $request->description;

        return Task::create($insert);
    }
    
    public function updateTask($request, $id)
    {
        $update['title'] = $request->title;
        $update['description'] = $request->description;

        return Task::where('id', $id)->update($update);
    }

    public function deleteTask($id)
    {
        return Task::where('id', $id)->delete();
    }
}
