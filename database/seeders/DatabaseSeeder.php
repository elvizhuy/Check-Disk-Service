<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\DiskPartition::factory()->create([
            'file_system' => '/dev/null',
            'size' => '100GB',
            'used' => '43GB',
            'available' => '12GB',
            'use%' => '56%',
            'belongtoVirtualMachine' => 1,
            'created_at' => '2023-05-10 23:27:00',
            'updated_at' => '2023-05-10 16:27:00'
        ]);
    }
}
