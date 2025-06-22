<?php
namespace App\Livewire\Wisata;

use Livewire\Component;
use App\Models\Wisata;
use App\Models\Ulasan;
use Illuminate\Support\Facades\Auth;

class WisataDetail extends Component
{
    public Wisata $wisata;
    public $ulasans;
    public $averageRating = 0;

    // Listener untuk merefresh ulasan setelah ulasan baru ditambahkan
    protected $listeners = ['ulasanAdded' => 'refreshUlasans'];

    public function mount(Wisata $wisata)
    {
        $this->wisata = $wisata->load(['kota', 'kategori', 'ulasans.user']);
        $this->loadUlasans();
    }

    public function loadUlasans()
    {
        $this->ulasans = $this->wisata->ulasans()->latest()->get(); // Ambil ulasan terbaru
        $this->calculateAverageRating();
    }

    public function refreshUlasans()
    {
        $this->wisata->refresh(); // Pastikan model wisata terbaru
        $this->loadUlasans();
    }

    public function calculateAverageRating()
    {
        if ($this->ulasans->count() > 0) {
            $this->averageRating = $this->ulasans->avg('rating');
        } else {
            $this->averageRating = 0;
        }
    }

    public function render()
    {
        return view('livewire.wisata.wisata-detail')->layout('layouts.app'); // Pastikan ada ini
    }
}
