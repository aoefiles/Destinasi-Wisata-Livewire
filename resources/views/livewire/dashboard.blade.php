<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Wisata;
use App\Models\Kategori;
use App\Models\Kota;
use App\Models\Ulasan;
use Illuminate\Support\Facades\DB; // Import Facade DB

class Dashboard extends Component
{
    public $totalUsers;
    public $totalWisatas;
    public $totalKategoris;
    public $totalKotas;
    public $totalUlasans;
    public $averageRating;

    public function mount()
    {
        $this->loadStatistics();
    }

    public function loadStatistics()
    {
        $this->totalUsers = User::count();
        $this->totalWisatas = Wisata::count();
        $this->totalKategoris = Kategori::count();
        $this->totalKotas = Kota::count();
        $this->totalUlasans = Ulasan::count();

        // Hitung rata-rata rating, hindari division by zero
        $avgRating = Ulasan::avg('rating');
        $this->averageRating = $avgRating ? number_format($avgRating, 1) : 'N/A';
    }

    public function render()
    {
        // Pastikan layout app digunakan
        return view('livewire.dashboard')->layout('layouts.app');
    }
}
