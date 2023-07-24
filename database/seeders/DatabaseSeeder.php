<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        DB::statement("TRUNCATE TABLE users");
        \App\Models\User::factory()->create([
            'name' => 'Nguyễn Ngọc Huy',
            'email' => 'elvizhuy@gmail.com',
            'password' => Hash::make('Daniel@D#ElviZ&HuY!9890'),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Bạch Đăng Tuấn',
            'email' => 'bachdangtuan.dev@gmail.com',
            'password' => Hash::make('Tuan!Bach@Dang#93&deV'),
        ]);
    }
}
