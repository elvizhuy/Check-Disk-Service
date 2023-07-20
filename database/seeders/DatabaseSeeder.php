<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Nguyen Ngoc Huy',
            'email' => 'elvizhuy@gmail.com',
            'password' => Hash::make('abcd@1234'),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Bach Dang Tuan',
            'email' => 'bachdangtuan.dev@gmail.com',
            'password' => Hash::make('abcd@1234'),
        ]);
    }
}
