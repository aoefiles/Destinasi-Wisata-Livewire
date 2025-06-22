<?php
namespace App\Livewire\Wisata;

use Livewire\Component;
use App\Models\Wisata;
use App\Models\Kota; // Import model Kota
use App\Models\Kategori; // Import model Kategori
use Livewire\WithPagination; // Untuk pagination

class WisataIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedKota = '';
    public $maxBiayaMasuk = '';
    public $kotas;
    public $kategoris; // Meskipun tidak digunakan sebagai filter langsung di sini, bisa berguna jika ingin menambahkannya

    protected $queryString = ['search', 'selectedKota', 'maxBiayaMasuk'];

    public function mount()
    {
        $this->kotas = Kota::all();
        $this->kategoris = Kategori::all();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSelectedKota()
    {
        $this->resetPage();
    }

    public function updatingMaxBiayaMasuk()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        Wisata::find($id)->delete();
        session()->flash('message', 'Destinasi wisata berhasil dihapus.');
    }

    public function render()
    {
        $query = Wisata::with(['kota', 'kategori']);

        // Filter berdasarkan pencarian nama/deskripsi
        if (!empty($this->search)) {
            $query->where('nama', 'like', '%' . $this->search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $this->search . '%');
        }

        // Filter berdasarkan kota
        if (!empty($this->selectedKota)) {
            $query->where('kota_id', $this->selectedKota);
        }

        // Filter berdasarkan biaya masuk maksimal
        if (!empty($this->maxBiayaMasuk)) {
            $query->where('biaya_masuk', '<=', $this->maxBiayaMasuk);
        }

        $wisatas = $query->paginate(10); // Menampilkan 10 item per halaman

            return view('livewire.wisata.wisata-index', [
                'wisatas' => $wisatas,
            ])->layout('layouts.app'); // Pastikan ada ini
    }
}
