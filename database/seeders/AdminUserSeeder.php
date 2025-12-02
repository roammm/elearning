<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $email = 'admin@a';
        $exists = DB::table('users')->where('email', $email)->exists();
        if (! $exists) {
            DB::table('users')->insert([
                'name' => 'Admin',
                'email' => $email,
                'phone' => '0000000000',
                'password' => Hash::make('root12'),
                'role' => 'admin',
            ]);
        } else {
            // Update existing admin user to have admin role and password
            DB::table('users')->where('email', $email)->update([
                'role' => 'admin',
                'password' => Hash::make('root12'),
            ]);
        }
    }
}


