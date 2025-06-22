<?php
namespace App\Livewire\Kota;

use Livewire\Component;
use App\Models\Kota;

class KotaIndex extends Component
{
    public $kotas;

    public function mount()
    {
        $this->kotas = Kota::all();
    }

    public function delete($id)
    {
        Kota::find($id)->delete();
        session()->flash('message', 'Kota berhasil dihapus.');
        $this->kotas = Kota::all(); // Refresh daftar
    }

    public function render()
    {
        return view('livewire.kota.kota-index')->layout('layouts.app'); // Pastikan ada ini
    }
}