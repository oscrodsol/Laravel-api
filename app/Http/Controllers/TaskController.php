<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
            ], 200);
        } catch (\Exception $exception) {
            Log::error('Getting tasks ' . $exception->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error retrieving tasks'
            ], 500);
        }
    }

    public function createTask(Request $request)
    {
        try {
            Log::info("Creating task");

            $title = $request->input('title');
            $userId = $request->input('user_id');

            $task = new Task();
            $task->title = $title;
            $task->user_id = $userId;

            $task->save();

            return response()->json([
                'success' => true,
                'message' => 'Task created successfully'
            ], 200);
        } catch (\Exception $exception) {
            Log::error('Creating task ' . $exception->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error retrieving tasks'
            ], 500);
        }
    }

    public function modifyTask(Request $request, $id)
    {

        try {
            Log::info("Updating task");

            $task = Task::find($id);

            if (!$task) {
                return response()->json([
                    'success' => false,
                    'message' => "Task doesn't exist"
                ], 404);
            }

            $title = $request->input('title');
            $status = $request->input('status');
            $userId = $request->input('user_id');

            if (isset($title)) {
                $task->title = $title;
            }

            if (isset($status)) {
                $task->status = $status;
            }
            
            if (isset($userId)) {
                $task->user_id = $userId;
            }

            $task->save();

            return response()->json([
                'success' => true,
                'message' => 'Task '.$id.' updated successfully'
            ], 200);
        } catch (\Exception $exception) {
            Log::error('Updating task ' . $exception->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error updating tasks'
            ], 500);
        }
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
