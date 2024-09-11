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
            'password' => '123456789Aa.',
            'telephone' => '+34666333999',
            'country' => 'Italia',
            'aboutYou' => 'Soy un usuario de prueba.'
        ]);

        User::factory()->create([
            'name' => 'User VIU',
            'surnames' => 'VIU Apellidos',
            'dni' => '03692774D',
            'email' => 'seguridadweb@campusviu.es',
            'password' => bcrypt('S3gur1d4d?W3b'), // Asegúrate de usar bcrypt para cifrar la contraseña
            'telephone' => '+34666111222',
            'country' => 'España',
            'aboutYou' => 'Soy un usuario de prueba VIU.'
        ]);
    }
}
