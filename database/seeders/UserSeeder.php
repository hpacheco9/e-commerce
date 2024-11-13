<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory()->count(40)->create();

        DB::table('users')->insert([
            [
                'id' => 1,
                'email' => 'miguel@gmail.com',
                'name' => 'Miguel Rego',
                'password' => Hash::make('123456789'),
                'nif' => '123456789',
                'isAdmin' => 0,
                'rua' => 'Rua das Flores',
                'codigoPostal' => '1234-567',
                'porta' => '1A',
                'email_verified_at' => now(),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'email' => 'user2@example.com',
                'name' => 'Bob Johnson',
                'password' => Hash::make('password123'),
                'nif' => '987654321',
                'isAdmin' => 1,
                'rua' => 'Avenida da Liberdade',
                'codigoPostal' => '8901-234',
                'porta' => '2B',
                'email_verified_at' => now(),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
