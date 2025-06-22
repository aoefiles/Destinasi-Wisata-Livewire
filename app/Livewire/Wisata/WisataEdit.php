<?php
namespace App\Livewire\Wisata;

use Livewire\Component;
use App\Models\Wisata;
use App\Models\Kota;
use App\Models\Kategori;
use Livewire\Attributes\Rule;

class WisataEdit extends Component
{
    public Wisata $wisata;

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

    public function mount(Wisata $wisata)
    {
        $this->wisata = $wisata;
        $this->nama = $wisata->nama;
        $this->deskripsi = $wisata->deskripsi;
        $this->kota_id = $wisata->kota_id;
        $this->kategori_id = $wisata->kategori_id;
        $this->biaya_masuk = $wisata->biaya_masuk;

        $this->kotas = Kota::all();
        $this->kategoris = Kategori::all();
    }

    public function update()
    {
        $this->validate();

        $this->wisata->update([
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi,
            'kota_id' => $this->kota_id,
            'kategori_id' => $this->kategori_id,
            'biaya_masuk' => $this->biaya_masuk,
        ]);

        session()->flash('message', 'Destinasi wisata berhasil diperbarui.');
        return $this->redirect('/wisata', navigate: true);
    }

    public function render()
    {
        return view('livewire.wisata.wisata-edit')->layout('layouts.app'); // Pastikan ada ini
    }
}
