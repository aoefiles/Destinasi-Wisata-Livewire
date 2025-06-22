<?php
namespace App\Livewire\Kota;

use Livewire\Component;
use App\Models\Kota;
use Livewire\Attributes\Rule;

class KotaCreate extends Component
{
    #[Rule('required|min:3|unique:kotas,nama_kota')]
    public $nama_kota = '';

    public function store()
    {
        $this->validate();

        Kota::create([
            'nama_kota' => $this->nama_kota,
        ]);

        session()->flash('message', 'Kota berhasil ditambahkan.');
        return $this->redirect('/kota', navigate: true);
    }

    public function render()
    {
        return view('livewire.kota.kota-create')->layout('layouts.app'); // Pastikan ada ini
    }
}
