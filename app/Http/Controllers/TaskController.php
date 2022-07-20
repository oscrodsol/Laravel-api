<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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

            $validator = Validator::make($request->all(), [
                'title' => ['required', 'string'],
                'user_id' => ['required']
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()
                ]);
            }

            $title = $request->input('title');
            $status = $request->input('status');
            $userId = $request->input('user_id');


            $task->title = $title;
            $task->status = $status;
            $task->user_id = $userId;

            $task->save();

            return response()->json([
                'success' => true,
                'message' => 'Task ' . $id . ' updated successfully'
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
        try {
            Log::info('Delete task with the id ' . $id);

            $task = Task::find($id);

            if (!$task) {
                return response()->json([
                    'success' => false,
                    'message' => "The task doesn't exist"
                ], 200);
            }

            $task->delete();

            return response()->json([
                'success' => true,
                'message' => 'Task ' . $id . ' deleted successfully'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting tasks'
            ], 500);
        }
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
