<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'title'=> 'Hola decir hola',
            'status'=> true,
            'user_id'=> '1'
        ]);

        DB::table('tasks')->insert([
            'title'=> 'Adios decir adios',
            'status'=> false,
            'user_id'=> '2'
        ]);
    }
}
