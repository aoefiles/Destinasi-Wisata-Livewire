<?php
namespace App\Livewire\Wisata;

use Livewire\Component;
use App\Models\Wisata;
use App\Models\Kota;
use App\Models\Kategori;
use Livewire\Attributes\Rule;

class WisataCreate extends Component
{
    #[Rule('required|min:5')]
    public $nama = '';

    #[Rule('required|min:10')]
    public $deskripsi = '';

    #[Rule('required|exists:kotas,id')]
    public $kota_id = '';

    #[Rule('required|exists:kategoris,id')]
    public $kategori_id = '';

    #[Rule('required|numeric|min:0')]
    public $biaya_masuk = 0;

    public $kotas;
    public $kategoris;

    public function mount()
    {
        $this->kotas = Kota::all();
        $this->kategoris = Kategori::all();
    }

    public function store()
    {
        $this->validate();

        Wisata::create([
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi,
            'kota_id' => $this->kota_id,
            'kategori_id' => $this->kategori_id,
            'biaya_masuk' => $this->biaya_masuk,
        ]);

        session()->flash('message', 'Destinasi wisata berhasil ditambahkan.');
        return $this->redirect('/wisata', navigate: true);
    }

   public function render()
    {
        return view('livewire.wisata.wisata-create')->layout('layouts.app'); // Pastikan ada ini
    }
}
