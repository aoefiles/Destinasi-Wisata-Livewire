<?php
namespace App\Livewire\Kategori;

use Livewire\Component;
use App\Models\Kategori;
use Livewire\Attributes\Rule; // Untuk validasi

class KategoriCreate extends Component
{
    #[Rule('required|min:3|unique:kategoris,nama_kategori')]
    public $nama_kategori = '';

    public function store()
    {
        $this->validate(); // Jalankan validasi

        Kategori::create([
            'nama_kategori' => $this->nama_kategori,
        ]);

        session()->flash('message', 'Kategori berhasil ditambahkan.');
        return $this->redirect('/kategori', navigate: true); // Redirect ke halaman index
    }

    public function render()
    {
        return view('livewire.kategori.kategori-create')->layout('layouts.app'); // Pastikan ada ini
    }
}

