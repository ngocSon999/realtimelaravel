<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->truncate();
        DB::table('users')->insert([
           'name' => 'NNT',
           'email' => 'admin1@admin.com',
           'password' => Hash::make(123456)
        ]);
    }
}
