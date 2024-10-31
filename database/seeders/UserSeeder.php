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
            'name' => 'Fatimatus Zahro',
            'email' => 'zahro@gmail.com',
            'password' => Hash::make('123'),
        ]);
        User::create([
            'name' => 'Mohammad Fiki',
            'email' => 'fiki@gmail.com',
            'password' => Hash::make('123'),
        ]);
    }
}
