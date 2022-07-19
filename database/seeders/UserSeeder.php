<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=> 'Daniel',
            'email'=> 'dani@gmail.com',
            'password'=> '1234'
        ]);

        DB::table('users')->insert([
            'name'=> 'Sergio',
            'email'=> 'sergio@gmail.com',
            'password'=> '1234'
        ]);
    }
}
