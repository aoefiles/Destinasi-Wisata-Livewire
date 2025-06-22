<?php
namespace App\Livewire\Wisata;

use Livewire\Component;
use App\Models\Wisata;
use App\Models\Kota;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class WisataPopuler extends Component
{
    use WithPagination;

    public $selectedKota = '';
    public $maxBiayaMasuk = '';
    public $kotas;

    protected $queryString = ['selectedKota', 'maxBiayaMasuk'];

    public function mount()
    {
        $this->kotas = Kota::all();
    }

    public function updatingSelectedKota()
    {
        $this->resetPage();
    }

    public function updatingMaxBiayaMasuk()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Wisata::query()
            ->select('wisatas.*')
            ->selectRaw('AVG(ulasans.rating) as average_rating')
            ->leftJoin('ulasans', 'wisatas.id', '=', 'ulasans.wisata_id')
            ->groupBy('wisatas.id')
            ->orderByDesc('average_rating')
            ->with(['kota', 'kategori']); // Load relasi kota dan kategori

        // Filter berdasarkan kota
        if (!empty($this->selectedKota)) {
            $query->where('wisatas.kota_id', $this->selectedKota);
        }

        // Filter berdasarkan biaya masuk maksimal
        if (!empty($this->maxBiayaMasuk)) {
            $query->where('wisatas.biaya_masuk', '<=', $this->maxBiayaMasuk);
        }

        $wisatas = $query->paginate(10); // Menampilkan 10 item per halaman

         return view('livewire.wisata.wisata-populer', [
            'wisatas' => $wisatas,
        ])->layout('layouts.app'); // Pastikan ada ini
    }
}
