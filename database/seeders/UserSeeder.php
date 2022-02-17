<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payload = [
            'full_name' => 'Administração',
            'username' => 'test@test.com.br',
            'password' => Hash::make('1234'),
            'profile' => 'administrador'
        ];
        User::create($payload);
    }
}
