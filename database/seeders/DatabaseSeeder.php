<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'Admin Admin',
            'email' => 'cruiselinemanagement@admin.com',
            'password' => Hash::make('123456'),
            'role_id' => 1
        ]);

        DB::table('roles')->insert([
            ['name' => 'Admin', 'slug' => 'admin'],
            ['name' => 'Agent', 'slug' => 'agent'],
            ['name' => 'Customer', 'slug' => 'customer'],
        ]);
    }
}
