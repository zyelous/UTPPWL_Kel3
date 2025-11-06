<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Jalankan semua seeder untuk mengisi data awal.
     */
    public function run(): void
    {
        // Jalankan Seeder Secara Berurutan
        $this->call([
            UserSeeder::class,
            
        ]);
    }
}
