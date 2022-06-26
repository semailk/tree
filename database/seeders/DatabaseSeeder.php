<?php

namespace Database\Seeders;

use App\Models\Certificate;
use Illuminate\Database\Seeder;
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
        $user = \App\Models\User::factory([
             'password' => Hash::make('adminadmin'),
             'email' => 'admin@example.com'
         ])->create();

         Certificate::factory(['user_id' => $user->id])->count(50)->create();
    }
}
