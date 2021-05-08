<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
                    'name' => 'Admin',
                    'email' => 'admin@gmail.com',
                    'role' => 1,
                    'password' => bcrypt('123456789'),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
    }
}
