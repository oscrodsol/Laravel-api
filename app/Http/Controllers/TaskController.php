<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function getAllTasks()
    {
        try {

            //Ejemplo con query builder

            $tasks = Task::query()->get()->toArray();


            return response()->json([
                'success' => true,
                'message' => 'Tasks retrieved successfully',
                'data' => $tasks
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Error retrieving ' . $exception->getMessage()
            ]);
        }
    }

    public function createTask()
    {
        return ['Create task'];
    }

    public function modifyTask($id)
    {
        return ['Modify task with the id ' . $id];
    }

    public function deleteTask($id)
    {
        return ['Delete task with the id ' . $id];
    }

    public function getTaskById($id)
    {
        return ['Get task with the id ' . $id];
    }
}
