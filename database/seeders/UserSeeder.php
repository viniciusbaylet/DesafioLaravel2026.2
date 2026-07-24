<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'administrador',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'type' => 'admin',
            'photo' => null,
            'cep' => '05508220',
            'address' => 'Rua da Reitoria',
            'neighborhood' => 'Butantã',
            'city' => 'São Paulo',
            'state' => 'SP',
            'number' => '374',
            'complement' => null,
            'phone' => '1130913232',
            'birth_date' => '1934-01-25',
            'cpf' => '00000000000',
            'balance' => '1000000'
        ]);
    }
}