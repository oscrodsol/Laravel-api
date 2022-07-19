<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return 'Bienvenido a mi app';
});

Route::get('/users', function () {
    try {
        $users = DB::table('users')
            // ->select('id', 'name', 'email')
            ->select('title')
            ->get()
            ->toArray();

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
});

Route::post('/users', function () {
    return ['post'];
});

Route::put('/users', function () {
    return ['put'];
});

Route::delete('/users', function () {
    return ['delete'];
});
