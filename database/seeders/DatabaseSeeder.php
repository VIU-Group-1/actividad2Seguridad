<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'surnames' => 'Surnames',
            'dni' => '12345678Z',
            'email' => 'test@example.com',
            'password' => '123456789',
            'telephone' => '666333999',
            'country' => 'Italia',
            'aboutYou' => 'Soy un usuario de prueba.'
        ]);
    }
}
