<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori; // Import model

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        Kategori::create(['nama_kategori' => 'Pegunungan']);
        Kategori::create(['nama_kategori' => 'Pantai']);
        Kategori::create(['nama_kategori' => 'Sejarah']);
        Kategori::create(['nama_kategori' => 'Kuliner']);
        Kategori::create(['nama_kategori' => 'Edukasi']);
    }
}