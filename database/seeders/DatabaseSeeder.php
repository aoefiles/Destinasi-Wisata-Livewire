<?php
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            KategoriSeeder::class,
            KotaSeeder::class,
            // Tambahkan seeder lain di sini jika ada
        ]);
    }
}