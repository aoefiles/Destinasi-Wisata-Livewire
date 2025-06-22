<?php
namespace App\Livewire\Kota;

use Livewire\Component;
use App\Models\Kota;
use Livewire\Attributes\Rule;

class KotaEdit extends Component
{
    public Kota $kota;

    #[Rule('required|min:3|unique:kotas,nama_kota')]
    public $nama_kota = '';

    public function mount(Kota $kota)
    {
        $this->kota = $kota;
        $this->nama_kota = $kota->nama_kota;
    }

    public function update()
    {
        $this->validate([
            'nama_kota' => 'required|min:3|unique:kotas,nama_kota,' . $this->kota->id,
        ]);

        $this->kota->update([
            'nama_kota' => $this->nama_kota,
        ]);

        session()->flash('message', 'Kota berhasil diperbarui.');
        return $this->redirect('/kota', navigate: true);
    }

    public function render()
    {
        return view('livewire.kota.kota-edit')->layout('layouts.app'); // Pastikan ada ini
    }
}
