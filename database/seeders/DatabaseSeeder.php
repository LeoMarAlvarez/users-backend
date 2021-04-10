<?php

namespace Database\Seeders;

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
        \App\Models\User::create([
            'email'=>'admin@mail.com',
            'password'=>Hash::make('123'),
            'name'=>'Test'
        ]);

        \App\Models\Usuario::factory(10)->create();
    }
}
