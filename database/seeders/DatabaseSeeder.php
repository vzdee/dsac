<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@gmail.com',
            'phone_number' => '(999) 359 6943',
            'gender' => 'male',
            'birth_date' => '2003-02-03',
            'password' => bcrypt('password'),
        ]);
        
        // seeders to run
        $this->call(RoleSeeder::class);
    }
}
