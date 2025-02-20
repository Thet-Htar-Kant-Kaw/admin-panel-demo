<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::insert([
            [
                'name' => 'Thet Htar',
                'email' => 'tkaw.extl@ooredoo.com.mm',
                'password' => Hash::make('oml@2025'),
                'created_at' => now(),
            ],
            [
                'name' => 'Chaw Su',
                'email' => 'chlaing.extl@ooredoo.com.mm',
                'password' => Hash::make('oml@2025'),
                'created_at' => now(),
            ],
        ]);
    }
}
