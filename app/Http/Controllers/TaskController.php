<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function getAllTasks()
    {
        try {
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

        try {
            $tasks = Task::query()->findOrFail($id)->get()->toArray();

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
        return ['Get task with the id ' . $id];
    }
}
