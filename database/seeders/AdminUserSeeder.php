<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Café Crème',
            'email' => 'admin@cafecreme.com', // C'est votre futur identifiant
            'password' => Hash::make('MonMotDePasseSecret123'), // Changez ce mot de passe !
        ]);
    }
}
