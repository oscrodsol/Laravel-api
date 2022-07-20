<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function getAllUsers()
    {
        try {
            //Ejemplo con query builder
            /*  $users = DB::table('users')
                ->select('id', 'name', 'email')
                ->get()
                ->toArray();
            */

            $users = User::query()->select('name')->get()->toArray();


            return response()->json([
                'success' => true,
                'message' => 'Users retrieved successfully',
                'data' => $users
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Error retrieving ' . $exception->getMessage()
            ]);
        }
    }

    public function createUser(Request $request)
    {
        try {
            Log::info("Creating user");

            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');

            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = $password;

            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'User created successfully'
            ], 200);
        } catch (\Exception $exception) {
            Log::error('Creating user ' . $exception->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error retrieving user'
            ], 500);
        }
    }

    public function modifyUser($id)
    {
        return ['Modify user with the id ' . $id];
    }

    public function deleteUser($id)
    {
        return ['Delete user with the id ' . $id];
    }

    public function getUserById($id)
    {
        return ['Get user with the id ' . $id];
    }
}
