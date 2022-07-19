<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getAllUsers(){
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
                'message' => 'Error retrieving '.$exception->getMessage()
            ]);
        }
    }

    public function createUser(){
        return ['Create user'];
    }

    public function modifyUser($id){
        return ['Modify user with the id '.$id];
    }

    public function deleteUser($id){
        return ['Delete user with the id '.$id];
    }

    public function getUserById($id){
        return ['Get user with the id '.$id];
    }
}
