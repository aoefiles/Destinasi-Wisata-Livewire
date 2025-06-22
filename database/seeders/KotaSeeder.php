<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kota; // Import model

class KotaSeeder extends Seeder
{
    public function run(): void
    {
        Kota::create(['nama_kota' => 'Bandung']);
        Kota::create(['nama_kota' => 'Yogyakarta']);
        Kota::create(['nama_kota' => 'Bali']);
        Kota::create(['nama_kota' => 'Jakarta']);
        Kota::create(['nama_kota' => 'Surabaya']);
    }
}
