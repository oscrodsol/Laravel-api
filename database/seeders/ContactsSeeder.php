<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'name'=> 'Alejandro',
            'email'=> 'alejandro@gmail.com',
            'phone_number'=> '+34999999999'
        ]);

        DB::table('contacts')->insert([
            'name'=> 'Antonio',
            'email'=> 'antonio@gmail.com',
            'phone_number'=> '+34888888888'
        ]);
    }
}
