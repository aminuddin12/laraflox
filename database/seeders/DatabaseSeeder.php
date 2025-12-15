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
        // Panggil seeder Permission terlebih dahulu
        $this->call(RolePermissionSeeder::class);

        // User::factory(10)->create();

        // Buat Super Admin
        $superAdmin = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
        ]);
        $superAdmin->assignRole('super-admin');

        // Buat Writer user
        $writer = User::factory()->create([
            'name' => 'Writer User',
            'email' => 'writer@example.com',
        ]);
        $writer->assignRole('writer');

        // Buat Regular user (tanpa role spesifik atau role default jika ada)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
