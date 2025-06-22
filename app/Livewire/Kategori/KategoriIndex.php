<?php
namespace App\Livewire\Kategori;

use Livewire\Component;
use App\Models\Kategori; // Import model Kategori

class KategoriIndex extends Component
{
    public $kategoris;

    public function mount()
    {
        $this->kategoris = Kategori::all(); // Ambil semua kategori
    }

    public function delete($id)
    {
        Kategori::find($id)->delete();
        session()->flash('message', 'Kategori berhasil dihapus.');
        $this->kategoris = Kategori::all(); // Refresh daftar
    }

    public function render()
    {
        return view('livewire.kategori.kategori-index')->layout('layouts.app'); // Pastikan ada ini
    }
}

